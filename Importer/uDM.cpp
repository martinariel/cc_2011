//---------------------------------------------------------------------------

#include <vcl.h>
#include <DateUtils.hpp>
#pragma hdrstop

#include "uDM.h"
#include "uFrmMain.h"
//---------------------------------------------------------------------------
#pragma package(smart_init)
#pragma resource "*.dfm"
TDM *DM;
//---------------------------------------------------------------------------
__fastcall TDM::TDM(TComponent* Owner) : TDataModule(Owner)
{
	TIniFile* ini = new TIniFile ( ChangeFileExt ( Application->ExeName , ".ini" ) );

	// WEB SETTINGS

	urlCastProcess  = ini->ReadString ("WEB" , "CAST"   , "http://localhost/cc/webApp/load_cast.php"  );
	urlScoutProcess = ini->ReadString ("WEB" , "SCOUT"  , "http://localhost/cc/webApp/load_scout.php" );

	// FTP SETTINGS

	ftpServer   = ini->ReadString ( "FTP" , "SERVER"   , "LOCALHOST" );
	ftpUser     = ini->ReadString ( "FTP" , "USER"     , "ROOT"      );
	ftpPassword = ini->ReadString ( "FTP" , "PASSWORD" , "ROOT"      );

	DWConnection->ConnectionString = ini->ReadString ( "BASE", "CONEXION" , "" );
	DWConnection->Open();

	mediaList     = new list<MediaFile*>();
	columnsMatch  = new map<AnsiString,AnsiString>();
	tablesMatch   = new map<AnsiString,bool>();
	foundedTables = new TStringList();

	processedFiles = new TStringList();

	loadColumnsMatch();
	loadTablesMatch();

	analisis = false;

	delete ini;
}
//---------------------------------------------------------------------------

bool esNumero ( const AnsiString& stri )
{
	for ( int i = 0 ; i < stri.Length() ; i++ )
	{
		char ch = stri[i+1];
		if ( isdigit ( ch ) )
			return true;
	}
	return false;
}

//---------------------------------------------------------------------------

void __fastcall TDM::DataModuleDestroy(TObject *Sender)
{
	DWConnection->Close();
	clearMediaList();

	delete mediaList;
	delete columnsMatch;
	delete tablesMatch;
	delete foundedTables;
	delete processedFiles;
}

//--------------------------------------------------------------------------
bool TDM::isFileProcessed ( const AnsiString& file ) const
{
	if ( processedFiles->Count == 0 && FileExists( ChangeFileExt ( Application->ExeName  , ".archivos_procesados" ) ) )
	{
		processedFiles->LoadFromFile( ChangeFileExt ( Application->ExeName  , ".archivos_procesados" ) );
	}

	return processedFiles->IndexOf ( file ) >= 0 ;
}

//--------------------------------------------------------------------------

void TDM::addProcessedFile ( const AnsiString& file )
{
	processedFiles->Add( file );

	ofstream fileProcessed ( ChangeFileExt ( Application->ExeName  , ".archivos_procesados" ).c_str() , ios::app ) ;

	fileProcessed << file.c_str() << std::endl;

	fileProcessed.close();
}

//---------------------------------------------------------------------------

bool TDM::connectXLS ( const AnsiString& fileName )
{
	try
	{
		if ( XLSConnection->Connected )
			XLSConnection->Close();

		XLSConnection->ConnectionString = "Provider=Microsoft.Jet.OLEDB.4.0; Data Source=" +
										  fileName + ";Extended Properties='Excel 8.0;HDR=NO;IMEX=1'";

		XLSConnection->Open();

		return true;
	}
	catch ( ... )
	{
		return false;
	}
}

//---------------------------------------------------------------------------

void TDM::setAnalisis ( bool value )
{
	this->analisis = value;
}

//---------------------------------------------------------------------------

void TDM::log ( const AnsiString& msg )
{
	Application->ProcessMessages();
	mEstado->Lines->Add ( msg );
}

//---------------------------------------------------------------------------

void TDM::logError ( const AnsiString& error )
{
	ofstream errorLog ( ChangeFileExt(Application->ExeName, ".error.log" ).c_str() , ios::app );

	errorLog << error.c_str() << std::endl;

	log ( error );

	errorLog.close();
}

//---------------------------------------------------------------------------

void TDM::setLogMemo ( TMemo* memo )
{
	mEstado = memo;
}

//---------------------------------------------------------------------------

wchar_t* toWChar (const AnsiString& Str)
{
  wchar_t* str = new wchar_t[Str.WideCharBufSize()];
  return Str.WideChar(str, Str.WideCharBufSize());
}

//---------------------------------------------------------------------------

void TDM::uploadMediaList ( void )
{
	if ( analisis)
		return;


	log ( "   -  Procesando Imagenes. " );

	AnsiString t = ExtractFilePath (Application->ExeName ) + "proceso";

	if ( !DirectoryExists(t) )
		CreateDir( t );

	for ( list<MediaFile*>::const_iterator it = mediaList->begin() ; it != mediaList->end() ; ++it )
	{
		MediaFile* mf = *it;
		AnsiString destino = t + "\\" + ExtractFileName ( mf->path );
		CopyFileTo(mf->path , destino );
		mf->path = destino;
		Application->ProcessMessages();
	}

	AnsiString comando  = "-quality 80 -resize 640x480 *.jpg";
	AnsiString opcion   = "open";
	AnsiString programa =  "mogrify";

	SHELLEXECUTEINFO ShExecInfo;

	ShExecInfo.cbSize       = sizeof(SHELLEXECUTEINFO);
	ShExecInfo.fMask        = SEE_MASK_NOCLOSEPROCESS;
	ShExecInfo.hwnd         = FormMain->Handle;
	ShExecInfo.lpVerb 	    = toWChar ( opcion );
	ShExecInfo.lpFile 	    = toWChar( programa );
	ShExecInfo.lpParameters = toWChar ( comando );
	ShExecInfo.lpDirectory  = toWChar ( t );
	ShExecInfo.nShow        = SW_HIDE;
	ShExecInfo.hInstApp     = NULL;

	ShellExecuteEx(&ShExecInfo);
	WaitForSingleObject(ShExecInfo.hProcess,INFINITE);

	log ( "   -  Subiendo Archivos de media al FTP Server. " );

	for ( list<MediaFile*>::const_iterator it = mediaList->begin() ; it != mediaList->end() ; ++it )
	{

		MediaFile* mf = *it;

		if ( mf->code < 0 )
			continue;

		try
		{


			if ( FTP->Connected())
				FTP->Disconnect();

			FTP->Host     = ftpServer;
			FTP->Username = ftpUser;
			FTP->Password = ftpPassword;

			FTP->Connect();

			UnicodeString origin = mf->path;
			UnicodeString dest = IntToStr( mf->code ) + "_" + mf->name;

			FTP->Put ( origin , UpperCase ( dest ) );


			Application->ProcessMessages();
		}
		catch (  ... )
		{
			if ( FTP->Connected())
				FTP->Disconnect();

			FTP->Host     = ftpServer;
			FTP->Username = ftpUser;
			FTP->Password = ftpPassword;

			FTP->Connect();

			UnicodeString origin = mf->path;
			UnicodeString dest = IntToStr( mf->code ) + "_" + mf->name;

			FTP->Put ( origin , UpperCase ( dest ) );


			Application->ProcessMessages()  ;
        }


	}

	if ( FTP->Connected())
		FTP->Disconnect();

	for ( list<MediaFile*>::const_iterator it = mediaList->begin() ; it != mediaList->end() ; ++it )
	{
		DeleteFileA( (*it)->path.c_str() );
		Application->ProcessMessages();
	}

	FTP->Disconnect();
}

//---------------------------------------------------------------------------

void TDM::notifyCastLoad ( void )
{
	if ( analisis )
		return;

	log ( "   -  Match de personas. " );

	HTTP->Get( urlCastProcess );
}

//---------------------------------------------------------------------------

void TDM::notifyScoutLoad ( void )
{
	if ( analisis )
		return;

	log ( "   -  Match de personas. " );

	HTTP->Get( urlScoutProcess );
}

//---------------------------------------------------------------------------

bool TDM::isDayFolder ( const AnsiString& name )
{
	UnicodeString us = LowerCase ( name );

	return ( us[1] != '.' &&
			(
				Pos( "dia" , us ) > 0 ||
				Pos( "d�a" , us ) > 0 ||
				( us.Length() > 2 && us[1] == 'd' && isdigit ( us[2] ) )

			)
	);
}

//---------------------------------------------------------------------------

AnsiString TDM::mapString ( const AnsiString& Column , const AnsiString& defaultValue )
{
	return ( indexMatched[ Column ] != -1 ) ?
		UpperCase( Trim(XLSQuery->Fields->Fields[ indexMatched[ Column ] ]->AsString) ) : (UnicodeString)defaultValue ;
}

//---------------------------------------------------------------------------

int TDM::mapInteger ( const AnsiString& Column , int defaultValue )
{
	return ( indexMatched[ Column ] != -1 ) ?
		StrToIntDef ( XLSQuery->Fields->Fields[ indexMatched[ Column    ] ]->AsString , defaultValue ) : defaultValue;
}

//---------------------------------------------------------------------------

AnsiString TDM::mapDate ( const AnsiString& Column )
{
	int matchColumn = indexMatched [Column];
	if ( matchColumn == -1 )
		return "";
	else
	{
		AnsiString dt = mapString ( Column );

		if ( !dt.IsEmpty() && IsNumeric ( dt ) )
		{
			TDateTime td = EncodeDate ( 1900, 1 , 1 );

			int days = StrToIntDef ( dt , 1 );

			td = IncDay ( td , days - 2 );

			dt = FormatDateTime ( "dd/mm/yyyy" , td );
		}

		return dt;

	}
}

//---------------------------------------------------------------------------

void TDM::mapCastPerson ( CastPerson* sp )
{
	sp->code   = mapInteger ( COLUMN_CODE   );
	sp->age    = mapInteger ( COLUMN_AGE    );
	sp->weight = mapInteger ( COLUMN_WEIGHT );

	AnsiString t = ( indexMatched[ COLUMN_HEIGHT ] != -1  ) ?
		XLSQuery->Fields->Fields[ indexMatched[ COLUMN_HEIGHT ] ]->AsString :
		(UnicodeString) "-1" ;

	sp->height = StrToFloatDef( t , 0 ) * 100; //cm

	sp->name 		 = mapString  ( COLUMN_NAME 	    );
	sp->shirtSize 	 = mapString  ( COLUMN_SHIRT_SIZE 	);
	sp->observations = mapString  ( COLUMN_OBSERVATIONS );
	sp->telephone 	 = mapString  ( COLUMN_TELEPHONE 	);
	sp->celphone 	 = mapString  ( COLUMN_CELPHONE 	);
	sp->birthday 	 = mapDate    ( COLUMN_BORNDATE 	);
	sp->document 	 = mapString  ( COLUMN_DOCUMENT 	);
	sp->pantsSize    = mapString  ( COLUMN_PANTS_SIZE 	);
	sp->sizes 		 = mapString  ( COLUMN_SIZES 		);
	sp->shoeSize     = mapInteger ( COLUMN_SHOE_SIZE 	);
	sp->agency       = mapString  ( COLUMN_AGENCY 		);
	sp->email		 = mapString  ( COLUMN_EMAIL 		);
}

//---------------------------------------------------------------------------

void TDM::saveCastPerson ( CastPerson* sp )
{
	if ( analisis )
		return;

	AnsiString t = Trim(sp->name);

	if ( t.IsEmpty() )
		return;

	tCastImport->Append();

	tCastImportagencia->Value = sp->agency;
	tCastImportaltura->Value  = sp->height;
	tCastImportanio->Value    = StrToIntDef ( anio , -1 );
	tCastImportcalzado->Value = sp->shoeSize;
	tCastImportcamisa->Value  = sp->shirtSize;
	tCastImportcasting->Value = Trim(UpperCase(codigo));
	tCastImportcodigo->Value  = sp->code;
	tCastImportdni->Value     = sp->document;
	tCastImportedad->Value    = sp->age;

	tCastImportfecha_casting->Value    = sp->date;
	tCastImportfecha_nacimiento->Value = sp->birthday;
	tCastImportmedidas->Value          = sp->sizes;
	tCastImportnombre->Value           = sp->name;
	tCastImportobservaciones->Value    = sp->observations;
	tCastImportpantalon->Value         = sp->pantsSize;
	tCastImportpeso->Value             = sp->weight;
	tCastImportdia->Value              = Trim(UpperCase(dia));
	tCastImportcelular->Value		   = sp->celphone;
	tCastImporttelefono->Value		   = sp->telephone;
	tCastImportemail->Value			   = sp->email;

	tCastImport->Post();

}

//---------------------------------------------------------------------------

void TDM::matchAndLoadCast ( void )
{
	#ifdef DEBUG_TO_DISC
	ofstream notMatchedLog ( ChangeFileExt(Application->ExeName, ".cast_not_match"  ).c_str() , ios::app );
	ofstream mediaListLog  ( ChangeFileExt(Application->ExeName, ".media_list"      ).c_str() , ios::app );
	#endif

	clearScoutColumnsMatched();

	bool f_schema = false;
	int schema_match_count = 0;
	list<AnsiString>* notMatchedColumns = new list<AnsiString>();

	AnsiString t;

	while ( !XLSQuery->Eof )
	{
		if ( !f_schema )
		{
			matchColumns ( &schema_match_count , notMatchedColumns );

			if ( !f_schema && schema_match_count > 4 )
			{
				f_schema = true;

				#ifdef DEBUG_TO_DISC
				//Output the non-matched columns to disk
				if ( notMatchedColumns->size() > 0 )
				{
					notMatchedLog << currentXLS.c_str() << "  -------------------------------------------- " << std::endl;

					for ( list<AnsiString>::const_iterator it = notMatchedColumns->begin() ; it != notMatchedColumns->end() ; ++it )
						notMatchedLog << (*it).c_str() << std::endl;
				}

				// Output the medialist to disc
				mediaListLog << currentXLS.c_str() << "  ---------------------------------------------------- " << std::endl;
				mediaListLog << "Size: " << mediaList->size() << std::endl;
				for ( list<MediaFile*>::const_iterator it = mediaList->begin() ; it != mediaList->end() ; ++it )
					mediaListLog << (*it)->code << " = " << (*it)->name.c_str() << std::endl;
				#endif
			}
			else
			{
				clearScoutColumnsMatched();
				schema_match_count = 0;
			}
		}
		else
		{
			CastPerson* sp = new CastPerson();

			// Get the values
			mapCastPerson ( sp );

			if ( sp->observations.Length() < 4 )
				sp->observations = "";

			if ( sp->height > 1000 )
				sp->height /= 100;

			AnsiString tel, cel;

			tel = sp->telephone;
			cel = sp->celphone;

			if ( tel.Length() > 8 )
			{
				if ( tel[1] == '1' && tel[2] == '5' )
				{
					if ( cel.IsEmpty() )
					{
						sp->celphone  = sp->telephone;
						sp->telephone = "";
					}
					else
					{
						AnsiString aux = sp->telephone;
						sp->telephone  = sp->celphone;
						sp->celphone   = aux;
					}
				}
			}

			if ( sp->code > 0 && !analisis )
				saveCastPerson( sp );

			if ( esNumero ( sp->agency ) )
				logError ( "Error " + IntToStr ( sp->code) + " " + currentXLS  );

			delete sp;
		}

		XLSQuery->Next();
	}

	#ifdef DEBUG_TO_DISC
	notMatchedLog.close();
	mediaListLog.close();
	#endif

	XLSQuery->Close();

	delete notMatchedColumns;
}

//---------------------------------------------------------------------------

void TDM::loadCast ( const AnsiString& pAnio , const AnsiString& pCodigo , const AnsiString& xls )
{
	if ( !FileExists( xls ) )
		return;

	anio       = pAnio;
	codigo     = pCodigo;
	currentXLS = xls;

	loadCurrentCast();

	log (  "Finalizado");
}

//---------------------------------------------------------------------------

void TDM::loadCurrentCast ( void )
{
	UnicodeString a = currentXLS;

	if ( analisis || !isFileProcessed( currentXLS ) )
	{
		if ( connectXLS ( currentXLS ) )
		{
			try
			{
				openXLSSheet();

				log ( "-------------------------------------------------------------------------------------------------" );
				log ( "Procesando " + currentXLS );
				log ( "" );

				if ( !analisis )
				{
					log ( "   - Vaciando tabla de Proceso." );
					clearTable ( "cast_import" );
					tCastImport->Open();
				}

				loadMediaList ( ExtractFilePath ( currentXLS ) );

				matchAndLoadCast();

				uploadMediaList();

				XLSConnection->Close();

				if ( !analisis )
					tCastImport->Close();

				notifyCastLoad();

				if ( !analisis )
					addProcessedFile ( currentXLS );

			}
			catch ( Exception& e )
			{
				logError ( " ************ ERROR: loadCurrentCast, " + e.Message );
			}
		}
		else
		{
			logError ( " ********* ERROR: conectarse a " + currentXLS );
		}
	}
	else
	{
		log ( currentXLS + " YA HA SIDO PROCESADO");
	}
}

//---------------------------------------------------------------------------

void TDM::iterateCasting ( const AnsiString& pAnio , const AnsiString& path , int level )
{
	TSearchRec sr;
	TSearchRec srAux;

	anio = pAnio;

	if ( level < 2 )
	{
		if ( FindFirst ( path + "\\*.*", faDirectory, sr) == 0)
		{
			do
			{
				if ( sr.Name[1] == '.')
					continue;

				switch ( level )
				{
				case 1:
					codigo = sr.Name;
					break;
				}
				iterateCasting ( pAnio , path + "\\" + sr.Name , level + 1 );
			}
			while (FindNext(sr) == 0);
			FindClose(sr);
		}
	}
	else if ( level == 2 )
	{
		if ( DirectoryExists( path + "\\casting\\" ) )
		{
			iterateCasting ( pAnio, path +  "\\casting\\" , level + 1 );
		}
		else if ( DirectoryExists ( path + "\\direccion\\casting\\produccion" ) )
		{
			iterateCasting ( pAnio, path + "\\direccion\\casting\\produccion" , level + 1 );
		}
		else if ( DirectoryExists ( path + "\\direcci�n\\casting\\producci�n" ) )
		{
			iterateCasting ( pAnio, path + "\\direcci�n\\casting\\producci�n" , level + 1 );
		}
		else if ( DirectoryExists ( path + "\\direcci�n\\casting\\produccion" ) )
		{
			iterateCasting ( pAnio, path + "\\direcci�n\\casting\\produccion" , level + 1 );
		}
		else if ( DirectoryExists ( path + "\\direccion\\casting\\producci�n" ) )
		{
			iterateCasting ( pAnio, path + "\\direccion\\casting\\producci�n" , level + 1 );
		}
		else if ( DirectoryExists ( path + "\\direccion\\casting\\" ) )
		{
			iterateCasting ( pAnio, path + "\\direccion\\casting\\" , level + 1 );
		}
		else if ( DirectoryExists ( path + "\\direcci�n\\casting\\" ) )
		{
			iterateCasting ( pAnio, path + "\\direcci�n\\casting\\" , level + 1 );
		}
		else
		{
			// TODO a disco
			log ( path );
			log ( path + " NO encontrado LEVEL 3");
		}
	}
	else if ( level == 3 )
	{

		bool dayFound = false;

		if ( FindFirst ( path + "\\*.*", faDirectory, sr) == 0)
		{
			do
			{
				if ( !isDayFolder ( sr.Name ) && DirectoryExists( path + "\\" + sr.Name  ) )
				{
					continue;
				}

				dia = sr.Name;

				// Si lo es, si o si tengo que encontrar un xls adentro, quizas haya mas directorios que recorrer.

				if ( FindFirst ( path + "\\" + sr.Name + "\\*.xls" , faArchive , srAux ) == 0 )
				{
					currentXLS =  path + "\\" + sr.Name + "\\" + srAux.Name;
					//log ( "DIA op1: " + currentXLS );

					// Load current XLS
					loadCurrentCast();

					dayFound = true;
				}
				else
				{
					// 	Me fijo si existe en la carpeta "produccion"
					FindClose ( srAux );

					if ( FindFirst ( path + "\\" + sr.Name + "\\produccion\\*.xls" , faArchive , srAux ) == 0 )
					{
						currentXLS = path + "\\" + sr.Name + "\\produccion\\" + srAux.Name;
						dayFound = true;
						loadCurrentCast();
					}
					else if ( FindFirst ( path + "\\" + sr.Name + "\\producci�n\\*.xls" , faArchive , srAux ) == 0 )
					{
						currentXLS = path + "\\" + sr.Name + "\\producci�n\\" + srAux.Name;
						dayFound = true;
						loadCurrentCast();
					}
					else if ( FindFirst ( path + "\\" + sr.Name + "\\producci�n\\producci�n\\*.xls" , faArchive , srAux ) == 0 )
					{
						currentXLS = path + "\\" + sr.Name + "\\producci�n\\producci�n\\" + srAux.Name;
						dayFound = true;
						loadCurrentCast();
					}
					else if ( FindFirst ( path + "\\" + sr.Name + "\\producci�n\\produccion\\*.xls" , faArchive , srAux ) == 0 )
					{
						currentXLS = path + "\\" + sr.Name + "\\producci�n\\produccion\\" + srAux.Name;
						dayFound = true;
						loadCurrentCast();
					}
					else if ( FindFirst ( path + "\\" + sr.Name + "\\produccion\\producci�n\\*.xls" , faArchive , srAux ) == 0 )
					{
						currentXLS = path + "\\" + sr.Name + "\\produccion\\producci�n\\" + srAux.Name;
						dayFound = true;
						loadCurrentCast();
					}
					else if ( FindFirst ( path + "\\" + sr.Name + "\\produccion\\produccion\\*.xls" , faArchive , srAux ) == 0 )
					{
						currentXLS = path + "\\" + sr.Name + "\\produccion\\produccion\\" + srAux.Name;
						dayFound = true;
						loadCurrentCast();
					}
				}
				FindClose ( srAux );
			}
			while (FindNext(sr) == 0);
			FindClose(sr);
		}

		if ( !dayFound )
		{
			if ( FindFirst ( path + "\\*.xls" , faArchive , sr ) == 0 )
			{

				//log ( "SIN DIAS: " + path + sr.Name );
				currentXLS =  path + "\\" + sr.Name;

				// load current XLS
				loadCurrentCast();
			}
			else
			{
				log ( "VERIFICAR: " + path );
			}
			FindClose ( sr );

		}

	}
}

//--------------------------------------------------------------------------

AnsiString getParent ( const AnsiString& path )
{
	return ExpandFileName( path + "\\.." );
}

//--------------------------------------------------------------------------

void TDM::iterateScouting ( const AnsiString& path , int level )
{
	TSearchRec sr;

	AnsiString pathCodigo = getParent ( path       );
	AnsiString pathAnio   = getParent ( pathCodigo );

	anio   = ExtractFileName ( pathAnio   );
	codigo = ExtractFileName ( pathCodigo );
	mes    = ExtractFileName ( path       );
	dia    = "";

	int anioNumero = StrToIntDef ( anio , -1 );

	if ( anioNumero < 0 )
	{
		log ( "Path Incorrecto!!!" );
		return;
	}

	//1 - Busco el excel
	if ( FindFirst ( path + "\\*.xls" , faArchive , sr )  == 0 )
	{
		if ( connectXLS( path + "\\" + sr.Name ) )
		{
			currentXLS = path + "\\" + sr.Name;

			try
			{

				log ( "-------------------------------------------------------------------------------------------------" );
				log ( "Procesando " + currentXLS );
				log ( "" );

				if ( analisis || !isFileProcessed ( currentXLS ) )
				{

					//2 - Cargo la lista de media
					loadMediaList ( path );

					//3 Vacio la tabla de proceso
					if ( !analisis )
					{
						log ( "   -  Limpiando tabla de proceso. " );
						clearTable ( "scout_import") ;
						tScoutImport->Open();
					}

					//4 - Proceso el excel
					loadCurrentScouting();

					////5 - subida FTP
					uploadMediaList();

					if ( !analisis )
						tScoutImport->Close();

					XLSConnection->Close();

					//6 - Notifico a la aplicaci�n web para que procese.
					notifyScoutLoad();

					if ( !analisis ) addProcessedFile( currentXLS );
				}
				else
				{
					log ( currentXLS + " YA HA SIDO PROCESADO");
				}
			}
			catch (...)
			{
				logError ( "************* ERROR LECTURA XLS : " + path + "\\" + sr.Name );
			}
		}
		else
		{
			logError ( "************ ERROR APERTURA XLS : " + path + "\\" + sr.Name );
		}
	}

}

//---------------------------------------------------------------------------

void TDM::loadMediaList ( const AnsiString& path )
{
	clearMediaList();

	log ( "   -  Cargando Media. " );

	loadMediaListRecursive ( path , mediaList );

	// Terminamos de cargar la media list, ahora completamos los personcode utilizando la "regex"

	for ( list<MediaFile*>::iterator i = mediaList->begin() ; i != mediaList->end(); ++i )
	{
		MediaFile* mf = *i;
		mf->code = extractPersonCode ( mf->name );
	}

	int size = mediaList->size();

	log ( "        Cantidad Archivos:" + IntToStr ( size ) );
}

//---------------------------------------------------------------------------

void TDM::loadMediaListRecursive ( const AnsiString& path , list<MediaFile*>* results )
{
	TSearchRec sr;

	if ( FindFirst ( path + "\\*.*", faAnyFile, sr) == 0)
	{
		do
		{
			if ( !isMediaFolder ( sr.Name ) )
				continue;

			if (  isMediaFile ( sr.Name ) && FileExists( path + "\\" + sr.Name ) )
			{
				MediaFile* mf = new MediaFile();
				mf->path = path + "\\" + sr.Name;
				mf->name = sr.Name;
				results->push_back( mf );
			}
			else if ( DirectoryExists( path + "\\" + sr.Name ) )
			{
				loadMediaListRecursive ( path + "\\" + sr.Name , results );
			}
		}
		while ( FindNext ( sr ) == 0 );
		FindClose(sr);
	}
}

//---------------------------------------------------------------------------

void TDM::clearTable ( const AnsiString& tableName )
{
	DWConnection->Execute ( "TRUNCATE TABLE " + tableName );
}

//---------------------------------------------------------------------------

void TDM::saveScoutPerson ( ScoutPerson* sp )
{
	if ( analisis || sp->code < 0 )
		return;

	if ( sp->observations.Length() < 4 ) sp->observations = "";

	if ( sp->height > 1000 )
		sp->height /= 100;

	AnsiString tel, cel;

	tel = sp->telephone;
	cel = sp->celphone;

	if ( tel.Length() > 8 )
	{
		if ( tel[1] == '1' && tel[2] == '5' )
		{
			if ( cel.IsEmpty() )
			{
				sp->celphone  = sp->telephone;
				sp->telephone = "";
			}
			else
			{
				AnsiString aux = sp->telephone;
				sp->telephone  = sp->celphone;
				sp->celphone   = aux;
			}
		}
	}

	tScoutImport->Append();

	tScoutImportactividades->Value  		= sp->activities;
	tScoutImportaltura->Value    			= sp->height;
	tScoutImportcelular->Value   			= sp->celphone;
	tScoutImportcodigo->Value    			= sp->code;
	tScoutImportedad->Value         		= sp->age;
	tScoutImportemail->Value       			= sp->email;
	tScoutImportfecha_nacimiento->Value 	= sp->borndate;
	tScoutImportfecha_scout->Value          = sp->date;
	tScoutImportidiomas->Value              = sp->languages;
	tScoutImportlugar_scout->Value          = sp->place;
	tScoutImportnacionalidad->Value         = sp->nacionality;
	tScoutImportnombre->Value               = sp->name;
	tScoutImportobservaciones->Value        = sp->observations;
	tScoutImportpeso->Value  			    = sp->weight;
	tScoutImporttelefono->Value             = sp->telephone;


	/// Datos de cabecera ( o como llegue a cada una de las personas)
	tScoutImportxls_file->Value         = currentXLS;
	tScoutImportanio->Value             = StrToInt ( anio );
	tScoutImportmes->Value              = Trim(UpperCase(mes   ));
	tScoutImportdia->Value     			= Trim(UpperCase(dia   ));
	tScoutImportcodigo_agrupador->Value = Trim(UpperCase(codigo));

	tScoutImportCOLOR_OJOS->Value       = Trim ( UpperCase ( sp->eyes   ) );
	tScoutImportCOLOR_PELO->Value       = Trim ( UpperCase ( sp->hair   ) );
	tScoutImportCONTEXTURA->Value		= Trim ( UpperCase ( sp->size   ) );
	tScoutImportAGENCIA->Value          = Trim ( UpperCase ( sp->agency ) );
	tScoutImportTEZ->Value				= Trim ( UpperCase ( sp->skin   ) );

	tScoutImport->Post();
}

//---------------------------------------------------------------------------

void TDM::mapScoutPerson ( ScoutPerson* sp )
{
	UnicodeString empty = "";
	AnsiString t;

	sp->code = ( indexMatched[ COLUMN_CODE ] != -1 ) ?
				extractPersonCode ( XLSQuery->Fields->Fields[ indexMatched[ COLUMN_CODE ] ]->AsString )  : -1;

	sp->age    = mapInteger ( COLUMN_AGE );
	sp->weight = mapInteger ( COLUMN_WEIGHT );

	t = ( indexMatched[ COLUMN_HEIGHT ] != -1  ) ?
		XLSQuery->Fields->Fields[ indexMatched[ COLUMN_HEIGHT ] ]->AsString : (UnicodeString) "-1" ;

	sp->height = StrToFloatDef( t , 0 ) * 100; //cm

	sp->date         = mapString ( COLUMN_DATE 			);
	sp->name         = mapString ( COLUMN_NAME 			);
	sp->place        = mapString ( COLUMN_PLACE 		);
	sp->observations = mapString ( COLUMN_OBSERVATIONS 	);
	sp->telephone    = mapString ( COLUMN_TELEPHONE 	);
	sp->celphone     = mapString ( COLUMN_CELPHONE 		);
	sp->borndate     = mapString ( COLUMN_BORNDATE 		);
	sp->email        = mapString ( COLUMN_EMAIL 		);
	sp->activities   = mapString ( COLUMN_ACTIVITIES 	);
	sp->nacionality  = mapString ( COLUMN_NACIONALITY 	);
	sp->languages    = mapString ( COLUMN_LANGUAGES 	);
	sp->skin		 = mapString ( COLUMN_SKIN		    );
	sp->size		 = mapString ( COLUMN_SIZE			);
	sp->eyes		 = mapString ( COLUMN_EYES			);
	sp->hair		 = mapString ( COLUMN_HAIR			);
	sp->agency		 = mapString ( COLUMN_AGENCY        );

}

//---------------------------------------------------------------------------

void TDM::openXLSSheetBySinomy ( void )
{

	foundedTables->Clear();

	XLSConnection->GetTableNames(foundedTables);

	bool found = false;
	AnsiString tableName;

	if ( foundedTables->Count == 1 )
	{
		found = true;
		tableName = UpperCase ( Trim ( foundedTables->Strings[0] ) );

	}
	else
	{
		for ( int i = 0 ; i < foundedTables->Count ; i++ )
		{
			tableName = UpperCase( Trim (  foundedTables->Strings[i] ));
			// Search in the map
			map<AnsiString,bool>::const_iterator it = tablesMatch->find ( tableName );
			found = it != tablesMatch->end();
			if ( found ) break;
		}
	}

	if ( found )
	{
		XLSQuery->SQL->Text = "Select * from ["+tableName+"]";
		XLSQuery->Open();
	}
	else
	{
		logError ( "ERROR: Hoja de calculo no encontrada, " + currentXLS );

		#ifdef DEBUG_TO_DISC
		ofstream notMatchedLog ( ChangeFileExt(Application->ExeName, ".tables_not_match" ).c_str() , ios::app );

		notMatchedLog << currentXLS.c_str() << std::endl;

		for ( int i = 0 ; i < foundedTables->Count ; i++ )
		{
			tableName = foundedTables->Strings[i];
			notMatchedLog << tableName.c_str() << std::endl;
		}
		notMatchedLog.close();

		#endif

		throw new EConvertError ( "Sin match de tabla" );

	}
}

//---------------------------------------------------------------------------

void TDM::openXLSSheet ( void )
{
	if ( XLSQuery->Active )
		XLSQuery->Close();

	XLSQuery->SQL->Text = "Select * from [Hoja1$]";

	try
	{
		XLSQuery->Open();
	}
	catch ( Exception& e )
	{
        ShowMessage ( e.Message );
		try
		{
			XLSQuery->SQL->Text = "Select * from [Sheet1$]";
			XLSQuery->Open();
		}
		catch ( Exception& e )
		{
			// intento por sinonimos de hojas de xls, motherfuckers!
			openXLSSheetBySinomy ();
		}
	}
}

//---------------------------------------------------------------------------

void TDM::matchColumns ( int* schema_match_count, list<AnsiString>* notMatchedColumns )
{
	AnsiString t;

	for ( int i = 0 ; i < XLSQuery->FieldCount ; i++ )
	{
		t = XLSQuery->Fields->Fields[i]->AsString;

		if ( t != NULL && !t.IsEmpty() )
		{
			t = Trim( UpperCase(t) );
			t = StringReplace ( t , "  " , " " , TReplaceFlags() << rfReplaceAll );
			t = StringReplace ( t , "�" , "�" , TReplaceFlags() << rfReplaceAll );
			t = StringReplace ( t , "�" , "�" , TReplaceFlags() << rfReplaceAll );
			t = StringReplace ( t , "�" , "�" , TReplaceFlags() << rfReplaceAll );
			t = StringReplace ( t , "�" , "�" , TReplaceFlags() << rfReplaceAll );
			t = StringReplace ( t , "�" , "�" , TReplaceFlags() << rfReplaceAll );


			map<AnsiString,AnsiString>::iterator found = columnsMatch->find ( t );
			if ( found != columnsMatch->end() )
			{
				indexMatched[ (*found).second ] = i;
				++(*schema_match_count);
			}
			else
			{
				notMatchedColumns->push_back( t );
			}
		}
	}
}

//---------------------------------------------------------------------------

void TDM::loadCurrentScouting ( void )
{
	 openXLSSheet();

	#ifdef DEBUG_TO_DISC
	ofstream notMatchedLog ( ChangeFileExt(Application->ExeName, ".scout_not_match" ).c_str() , ios::app );
	ofstream mediaListLog  ( ChangeFileExt(Application->ExeName, ".media_list"      ).c_str() , ios::app );
	#endif

	clearScoutColumnsMatched();

	bool f_schema = false;
	int schema_match_count = 0;
	list<AnsiString>* notMatchedColumns = new list<AnsiString>();

	AnsiString t;

	while ( !XLSQuery->Eof )
	{
		if ( !f_schema )
		{

			matchColumns ( &schema_match_count , notMatchedColumns );

			if ( !f_schema && schema_match_count > 4 )
			{
				f_schema = true;

				#ifdef DEBUG_TO_DISC
				//Output the non-matched columns to disk
				if ( notMatchedColumns->size() > 0 )
				{
					notMatchedLog << currentXLS.c_str() << "  -------------------------------------------- " << std::endl;

					for ( list<AnsiString>::const_iterator it = notMatchedColumns->begin() ; it != notMatchedColumns->end() ; ++it )
						notMatchedLog << (*it).c_str() << std::endl;
				}

				// Output the medialist to disc
				mediaListLog << currentXLS.c_str() << "  ---------------------------------------------------- " << std::endl;
				mediaListLog << "Size: " << mediaList->size() << std::endl;
				for ( list<MediaFile*>::const_iterator it = mediaList->begin() ; it != mediaList->end() ; ++it )
					mediaListLog << (*it)->code << " = " << (*it)->name.c_str() << std::endl;
				#endif
			}
			else
			{
				clearScoutColumnsMatched();
				schema_match_count = 0;
			}
		}
		else if ( !analisis )
		{
			ScoutPerson* sp = new ScoutPerson();

			// Get the values
			mapScoutPerson ( sp );

			if ( sp->code > 0 )
				saveScoutPerson( sp );

			delete sp;

		}
		XLSQuery->Next();
	}

	#ifdef DEBUG_TO_DISC
	notMatchedLog.close();
	mediaListLog.close();
	#endif

	XLSQuery->Close();

	delete notMatchedColumns;
}

//---------------------------------------------------------------------------

bool TDM::isMediaFolder ( const AnsiString& name )
{
	int posicion = Pos ( "callback" , LowerCase( name ) );
	return ( name[1] != '.' && posicion == 0 );
}
//---------------------------------------------------------------------------

bool TDM::isMediaFile ( const AnsiString& name )
{
	UnicodeString us = LowerCase ( name );

	return (
		Pos ( ".jpg" , us ) > 0 ||
		Pos ( ".gif" , us ) > 0 ||
		Pos ( ".png" , us ) > 0 ||
		Pos ( ".pdf" , us ) > 0 ||
		Pos ( ".doc" , us ) > 0 ||
		Pos ( ".mp3" , us ) > 0 ||
		Pos ( ".mov" , us ) > 0
	);

}

//---------------------------------------------------------------------------

void TDM::clearMediaList ( void )
{
	for ( list<MediaFile*>::const_iterator i = mediaList->begin() ; i != mediaList->end() ; ++i )
		delete *i;

	mediaList->clear();
}

//---------------------------------------------------------------------------


int TDM::extractPersonCode ( const AnsiString& fullString )
{
	AnsiString temp;
	for ( int i = 0 ; i < fullString.Length() ; i++ )
	{
		if ( i > 7 )
			break;

		char ch = fullString[i+1];
		if ( !isdigit(ch) )
			if ( temp.Length() > 0 )
				break;
			else
				continue;
		temp += ch;
	}
	return ( temp.Length() > 0 ) ? StrToInt ( temp ) : -1;
}

//---------------------------------------------------------------------------

void TDM::loadTablesMatch ( void )
{
	// SINONIMOS DE TABLAS ( Hojas de calculo XLS )
	map<AnsiString,bool>& M = *tablesMatch;

	M["'LISTA PARA CONVOCAR$'"] = true;

}

//---------------------------------------------------------------------------

void TDM::loadColumnsMatch ( void )
{
	// SINONIMOS DE COLUMNAS.
	map<AnsiString,AnsiString>& M = *columnsMatch;
	tSinonimos->Open();

	while ( !tSinonimos->Eof )
	{
		M [ tSinonimosorigen->Value ] = tSinonimosdestino->Value;
		tSinonimos->Next();
	}
	tSinonimos->Close();
}

//---------------------------------------------------------------------------

void TDM::clearScoutColumnsMatched ( void )
{
	indexMatched[COLUMN_CODE] 	      = -1;
	indexMatched[COLUMN_DATE] 	      = -1;
	indexMatched[COLUMN_NAME] 	      = -1;
	indexMatched[COLUMN_BORNDATE]     = -1;
	indexMatched[COLUMN_AGE]          = -1;
	indexMatched[COLUMN_TELEPHONE]    = -1;
	indexMatched[COLUMN_CELPHONE]     = -1;
	indexMatched[COLUMN_HEIGHT]       = -1;
	indexMatched[COLUMN_WEIGHT]       = -1;
	indexMatched[COLUMN_OBSERVATIONS] = -1;
	indexMatched[COLUMN_PLACE]        = -1;
	indexMatched[COLUMN_EMAIL]        = -1;
	indexMatched[COLUMN_ACTIVITIES]   = -1;
	indexMatched[COLUMN_NACIONALITY]  = -1;
	indexMatched[COLUMN_LANGUAGES]    = -1;
	indexMatched[COLUMN_SHIRT_SIZE]   = -1;
	indexMatched[COLUMN_SHOE_SIZE]    = -1;
	indexMatched[COLUMN_PANTS_SIZE]   = -1;
	indexMatched[COLUMN_DOCUMENT]     = -1;
	indexMatched[COLUMN_AGENCY]       = -1;
	indexMatched[COLUMN_SIZES]        = -1;
	indexMatched[COLUMN_HAIR]		  = -1;
	indexMatched[COLUMN_EYES]		  = -1;
	indexMatched[COLUMN_SIZE]		  = -1;
	indexMatched[COLUMN_SKIN]		  = -1;
}
