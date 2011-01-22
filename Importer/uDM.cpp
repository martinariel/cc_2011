//---------------------------------------------------------------------------

#include <vcl.h>
#include <DateUtils.hpp>
#pragma hdrstop

#include "uDM.h"
//---------------------------------------------------------------------------
#pragma package(smart_init)
#pragma resource "*.dfm"
TDM *DM;
//---------------------------------------------------------------------------
__fastcall TDM::TDM(TComponent* Owner)
	: TDataModule(Owner)
{
	TIniFile* ini = new TIniFile ( ChangeFileExt ( Application->ExeName , ".ini" ) );

	// WEB SETTINGS

	urlCastProcess  = ini->ReadString ("WEB" , "CAST"   , "http://localhost/cc/webApp/load_cast.php"  );
	urlScoutProcess = ini->ReadString ("WEB" , "SCOUT"  , "http://localhost/cc/webApp/load_scout.php" );

	// FTP SETTINGS

	ftpServer   = ini->ReadString ( "FTP" , "SERVER"   , "LOCALHOST" );
	ftpUser     = ini->ReadString ( "FTP" , "USER"     , "ROOT" );
	ftpPassword = ini->ReadString ( "FTP" , "PASSWORD" , "ROOT" );

	//DWConnection->ConnectionString = "FILE NAME=" + ChangeFileExt(Application->ExeName, ".udl" );
	DWConnection->Open();

	mediaList     = new list<MediaFile*>();
	columnsMatch  = new map<AnsiString,AnsiString>();
	tablesMatch   = new map<AnsiString,bool>();
	foundedTables = new TStringList();

	loadColumnsMatch();
	loadTablesMatch();

	analisis = false;

	delete ini;
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

	if ( mEstado->Lines->Count == 200 )
	{
	  //	mEstado->Lines->Clear();
	}

	mEstado->Lines->Add ( msg );
}

//---------------------------------------------------------------------------

void TDM::setLogMemo ( TMemo* memo )
{
	mEstado = memo;
}

//---------------------------------------------------------------------------

void TDM::uploadMediaList ( void )
{
	if ( analisis || 1 == 1)
		return;

	log ( "   -  Subiendo Archivos de media al FTP Server. " );

	if ( FTP->Connected())
		FTP->Disconnect();

	FTP->Host     = ftpServer;
	FTP->Username = ftpUser;
	FTP->Password = ftpPassword;

	FTP->Connect();

	for ( list<MediaFile*>::const_iterator it = mediaList->begin() ; it != mediaList->end() ; ++it )
	{
		MediaFile* mf = *it;

		UnicodeString origin = mf->path;
		UnicodeString dest = IntToStr( mf->code ) + "_" + mf->name;

		FTP->Put ( origin , dest );
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
				Pos( "día" , us ) > 0 ||
				( us.Length() > 2 && us[1] == 'd' && isdigit ( us[2] ) )

			)
	);
}

//---------------------------------------------------------------------------

AnsiString TDM::mapString ( const AnsiString& Column , const AnsiString& defaultValue )
{
	return ( indexMatched[ Column ] != -1 ) ?
		XLSQuery->Fields->Fields[ indexMatched[ Column ] ]->AsString  : (UnicodeString)defaultValue ;
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
	sp->code   = mapInteger ( COLUMN_CODE );
	sp->age    = mapInteger ( COLUMN_AGE );
	sp->weight = mapInteger ( COLUMN_WEIGHT );

	AnsiString t = ( indexMatched[ COLUMN_HEIGHT ] != -1  ) ?
		XLSQuery->Fields->Fields[ indexMatched[ COLUMN_HEIGHT ] ]->AsString :
		(UnicodeString) "-1" ;

	sp->height = StrToFloatDef( t , 0 ) * 100; //cm

	//sp->date =

	sp->name 		 = mapString  ( COLUMN_NAME );
	sp->shirtSize 	 = mapString  ( COLUMN_SHIRT_SIZE );
	sp->observations = mapString  ( COLUMN_OBSERVATIONS );
	sp->telephone 	 = mapString  ( COLUMN_TELEPHONE );
	sp->celphone 	 = mapString  ( COLUMN_CELPHONE );
	sp->birthday 	 = mapDate    ( COLUMN_BORNDATE );
	sp->document 	 = mapString  ( COLUMN_DOCUMENT );
	sp->pantsSize    = mapString  ( COLUMN_PANTS_SIZE );
	sp->sizes 		 = mapString  ( COLUMN_SIZES );
	sp->shoeSize     = mapInteger ( COLUMN_SHOE_SIZE );
	sp->agency       = mapString  ( COLUMN_AGENCY );
}

//---------------------------------------------------------------------------

void TDM::saveCastPerson ( CastPerson* sp )
{

	if ( analisis )
		return;

	tCastImport->Append();

	tCastImportAGENCIA->Value = sp->agency;
	tCastImportALTURA->Value  = sp->height;
	tCastImportANIO->Value    = StrToIntDef ( anio , -1 );
	tCastImportCALZADO->Value = sp->shoeSize;
	tCastImportCAMISA->Value  = sp->shirtSize;
	tCastImportCASTING->Value = codigo;
	tCastImportCODIGO->Value  = sp->code;
	tCastImportDNI->Value     = sp->document;
	tCastImportEDAD->Value    = sp->age;

	tCastImportFECHA_CASTING->Value    = sp->date;
	tCastImportFECHA_NACIMIENTO->Value = sp->birthday;
	tCastImportMEDIDAS->Value          = sp->sizes;
	tCastImportNOMBRE->Value           = sp->name;
	tCastImportOBSERVACIONES->Value    = sp->observations;
	tCastImportPANTALON->Value         = sp->pantsSize;
	tCastImportPESO->Value             = sp->weight;
	tCastImportDIA->Value              = dia;

	tCastImport->Post();

}

//---------------------------------------------------------------------------

void TDM::matchAndLoadCast ( void )
{
	#ifdef DEBUG_TO_DISC
	ofstream notMatchedLog ( ChangeFileExt(Application->ExeName, ".cast_not_match" ).c_str() , ios::app );
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
			CastPerson* sp = new CastPerson();

			// Get the values
			mapCastPerson ( sp );

			if ( sp->code > 0 )
				saveCastPerson( sp );

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

void TDM::loadCurrentCast ( void )
{
	if ( connectXLS ( currentXLS ) )
	{
		try
		{
			openXLSSheet();

			if ( !analisis )
			{
				log ( "VACIANDO TABLA DE PROCESO." );
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

		}
		catch ( ... )
		{
			log ( "ERROR" );
		}
	}
	else
	{
		log ( " ERROR al conectarse a: " + currentXLS );
	}
}

//---------------------------------------------------------------------------

void TDM::iterateCasting ( const AnsiString& path , int level )
{
	TSearchRec sr;
	TSearchRec srAux;

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
				case 0: anio   = sr.Name; break;
				case 1: codigo = sr.Name; break;
				}
				iterateCasting ( path + "\\" + sr.Name , level + 1 );
			}
			while (FindNext(sr) == 0);
			FindClose(sr);
		}	}	else if ( level == 2 )	{		if ( DirectoryExists( path + "\\casting\\" ) )
		{
			iterateCasting ( path +  "\\casting\\" , level + 1 );
		}
		else if ( DirectoryExists ( path + "\\direccion\\casting\\" ) )
		{
			iterateCasting ( path + "\\direccion\\casting\\" , level + 1 );
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
					// 	Me fijo si existe en la carpeta "direccion"
					FindClose ( srAux );

                    if ( FindFirst ( path + "\\" + sr.Name + "\\direccion\\*.xls" , faArchive , srAux ) == 0 )
					{
						currentXLS = path + "\\" + sr.Name + "direccion\\" + srAux.Name;

						dayFound = true;

						//log ( "DIA op2: " + currentXLS );

						// Load current XLS
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

void TDM::iterateScouting ( const AnsiString& path , int level )
{
	TSearchRec sr;

	if ( level < 4 )
	{
		if ( FindFirst ( path + "\\*.*", faDirectory, sr) == 0)
		{
			do
			{
				if ( sr.Name[1] == '.')
					continue;

				switch ( level )
				{
				case 0: anio   = sr.Name; break;
				case 1: codigo = sr.Name; break;
				case 2:	mes    = sr.Name; break;
				case 3: dia    = sr.Name; break;
				}
				iterateScouting ( path + "\\" + sr.Name , level + 1 );
			}
			while (FindNext(sr) == 0);
			FindClose(sr);
		}	}	else	{		//1 - Busco el excel
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

					//2 - Cargo la lista de media
					loadMediaList ( path );

					//3 Vacio la tabla de proceso
					if ( !analisis )
					{
						log ( "   -  Limpiando tabla de proceso. " );
						clearTable("scout_import");
						tScoutImport->Open();
					}

					//
					//4 - Proceso el excel
					loadCurrentScouting();

					//5 - subida FTP
					uploadMediaList();

					if ( !analisis )
						tScoutImport->Close();

					XLSConnection->Close();

					//6 - Notifico a la aplicación web para que procese.
					notifyScoutLoad();
				}
				catch (...)
				{
					log ( "************* ERROR LECTURA XLS : " + path + "\\" + sr.Name );
				}
			}
			else
			{
				log ( "************ ERROR APERTURA XLS : " + path + "\\" + sr.Name );
			}
		}
    }}

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
				mf->path = path + "\\" + sr.Name + "\\" + sr.Name;
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
	if ( analisis )
		return;

	tScoutImport->Append();

	tScoutImportACTIVIDADES->Value      = sp->activities;
	tScoutImportALTURA->Value           = sp->height;
	tScoutImportCELULAR->Value          = sp->celphone;
	tScoutImportCODIGO->Value           = sp->code;
	tScoutImportEDAD->Value             = sp->age;
	tScoutImportEMAIL->Value            = sp->email;
	tScoutImportFECHA_NACIMIENTO->Value = sp->borndate;
	tScoutImportFECHA_SCOUT->Value      = sp->date;
	tScoutImportIDIOMAS->Value          = sp->languages;
	tScoutImportLUGAR_SCOUT->Value      = sp->place;
	tScoutImportNACIONALIDAD->Value     = sp->nacionality;
	tScoutImportNOMBRE->Value           = sp->name;
	tScoutImportOBSERVACIONES->Value    = sp->observations;
	tScoutImportPESO->Value   			= sp->weight;
	tScoutImportTELEFONO->Value         = sp->telephone;

	/// Datos de cabecera ( o como llegue a cada una de las personas)
	tScoutImportXLS_FILE->Value         = currentXLS;
	tScoutImportANIO->Value             = StrToInt ( anio );
	tScoutImportMES->Value              = mes;
	tScoutImportDIA->Value     			= dia;
	tScoutImportCODIGO_AGRUPADOR->Value = codigo;

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

	sp->date         = mapString ( COLUMN_DATE );
	sp->name         = mapString ( COLUMN_NAME );
	sp->place        = mapString ( COLUMN_PLACE );
	sp->observations = mapString ( COLUMN_OBSERVATIONS );
	sp->telephone    = mapString ( COLUMN_TELEPHONE );
	sp->celphone     = mapString ( COLUMN_CELPHONE );
	sp->borndate     = mapString ( COLUMN_BORNDATE );
	sp->email        = mapString ( COLUMN_EMAIL );
	sp->activities   = mapString ( COLUMN_ACTIVITIES );
	sp->nacionality  = mapString ( COLUMN_NACIONALITY );
	sp->languages    = mapString ( COLUMN_LANGUAGES );
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
		log ( "ERROR: Hoja de calculo no encontrada, " + currentXLS );

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
	catch ( ... )
	{

		try
		{
			XLSQuery->SQL->Text = "Select * from [Sheet1$]";
			XLSQuery->Open();
		}
		catch ( ... )
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
	return ( name[1] != '.' );
}
//---------------------------------------------------------------------------

bool TDM::isMediaFile ( const AnsiString& name )
{
	UnicodeString us = LowerCase ( name );

	return (
		Pos( ".jpg" , us ) > 0 ||
		Pos( ".gif" , us ) > 0 ||
		Pos( ".png" , us ) > 0 ||
		Pos( ".mov" , us ) > 0 ||
		Pos( ".mpg" , us ) > 0 ||
		Pos( ".mpeg", us ) > 0 ||
		Pos( ".avi" , us ) > 0
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
		M [ tSinonimosORIGEN->Value ] = tSinonimosDESTINO->Value;
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
}


