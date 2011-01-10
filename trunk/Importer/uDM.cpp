//---------------------------------------------------------------------------

#include <vcl.h>
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
}
//---------------------------------------------------------------------------
void __fastcall TDM::DataModuleCreate(TObject *Sender)
{
	DWConnection->ConnectionString = "FILE NAME=" + ChangeFileExt(Application->ExeName, ".udl" );
	DWConnection->Open();

	mediaList = new list<MediaFile*>();
	columnsMatch = new map<AnsiString,AnsiString>();

	loadColumnsMatch();

	tScoutImport->Open();

	iterateScouting ( "G:\\01 importacion masiva de datos\\01 scouting");

	tScoutImport->Close();
}
//---------------------------------------------------------------------------
void __fastcall TDM::DataModuleDestroy(TObject *Sender)
{
	DWConnection->Close();
	clearMediaList();
	delete mediaList;
	delete columnsMatch;
}
//---------------------------------------------------------------------------

bool TDM::connectXLS ( const AnsiString& fileName )
{
	try
	{
		if ( XLSConnection->Connected )
			XLSConnection->Close();

		XLSConnection->ConnectionString = "Provider=Microsoft.Jet.OLEDB.4.0; Data Source=" + fileName + ";Extended Properties='Excel 8.0;HDR=NO;IMEX=1'";
		XLSConnection->Open();

		return true;
	}
	catch ( ... )
	{
		return false;
	}
}

//---------------------------------------------------------------------------

void TDM::log ( const AnsiString& msg )
{
}

//---------------------------------------------------------------------------

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

				//2 - Cargo la lista de media
				loadMediaList ( path );
				try
				{
					//clearTable("SCOUT_IMPORT");
					//tScoutImport->Open();

					//3 - TODO: Vacio la tabla de proceso
					//4 - Proceso el excel
					loadCurrentScouting();

					//tScoutImport->Close();

					XLSConnection->Close();
				}
				catch (...)
				{
					log ( "ERROR LECTURA XLS : " + path + "\\" + sr.Name );
				}
			}
			else
			{
				log ( "ERROR APERTURA XLS : " + path + "\\" + sr.Name );
			}
		}
    }}

//---------------------------------------------------------------------------

void TDM::loadMediaList ( const AnsiString& path )
{
	TSearchRec sr;
	clearMediaList();

	if ( FindFirst ( path + "\\*.*", faDirectory, sr) == 0)
	{
		do
		{
			if ( !isMediaFolder ( sr.Name ) )
				continue;

			TSearchRec srMedia;

			if ( FindFirst ( path + "\\" + sr.Name + "\\*.*", faArchive, srMedia) == 0)
			{
				do
				{
					if ( isMediaFile ( srMedia.Name ) )
					{
						MediaFile* mf = new MediaFile();
						mf->path = path + "\\" + sr.Name + "\\" + srMedia.Name;
						mf->name = srMedia.Name;
						mediaList->push_back( mf );
					}
				}
				while ( FindNext(srMedia) == 0 );
			}
		}
		while ( FindNext ( sr ) == 0 );
		FindClose(sr);
	}

	// Terminamos de cargar la media list, ahora completamos los personcode utilizando la "regex"

	for ( list<MediaFile*>::iterator i = mediaList->begin() ; i != mediaList->end(); ++i )
	{
		MediaFile* mf = *i;
		mf->code = extractPersonCode ( mf->name );
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

	sp->code = ( scoutMatched[ COLUMN_CODE ] != -1 ) ?
				extractPersonCode ( XLSQuery->Fields->Fields[ scoutMatched[ COLUMN_CODE ] ]->AsString )  : -1;

	sp->age    = ( scoutMatched[ COLUMN_AGE ] != -1 ) ?
		StrToIntDef ( XLSQuery->Fields->Fields[ scoutMatched[ COLUMN_AGE    ] ]->AsString , -1 ) : -1;

	sp->weight = ( scoutMatched[ COLUMN_WEIGHT ] != -1  ) ?
		StrToIntDef ( XLSQuery->Fields->Fields[ scoutMatched[ COLUMN_WEIGHT ] ]->AsString , -1 ) : -1;

	t = ( scoutMatched[ COLUMN_HEIGHT ] != -1  ) ?
		XLSQuery->Fields->Fields[ scoutMatched[ COLUMN_HEIGHT ] ]->AsString : (UnicodeString) "-1" ;

	sp->height = StrToFloatDef( t , 0 ) * 100; //cm

	sp->date = ( scoutMatched[ COLUMN_DATE ] != -1 ) ?
		XLSQuery->Fields->Fields[ scoutMatched[ COLUMN_DATE ] ]->AsString  : empty ;

	sp->name = ( scoutMatched[ COLUMN_NAME ] != -1 ) ?
		XLSQuery->Fields->Fields[ scoutMatched[ COLUMN_NAME ] ]->AsString  : empty ;

	sp->place = ( scoutMatched[ COLUMN_PLACE ] != -1 ) ?
		XLSQuery->Fields->Fields[ scoutMatched[ COLUMN_PLACE ] ]->AsString  : empty ;

	sp->observations = ( scoutMatched[ COLUMN_OBSERVATIONS ] != -1 ) ?
		XLSQuery->Fields->Fields[ scoutMatched[ COLUMN_OBSERVATIONS ] ]->AsString : empty ;

	sp->telephone = ( scoutMatched[ COLUMN_TELEPHONE ] != -1 ) ?
		XLSQuery->Fields->Fields[ scoutMatched[ COLUMN_TELEPHONE ] ]->AsString  : empty ;

	sp->celphone = ( scoutMatched[ COLUMN_CELPHONE ] != -1 ) ?
		XLSQuery->Fields->Fields[ scoutMatched[ COLUMN_CELPHONE ] ]->AsString  : empty ;

	sp->borndate = ( scoutMatched[ COLUMN_BORNDATE ] != -1 ) ?
		XLSQuery->Fields->Fields[ scoutMatched[ COLUMN_BORNDATE ] ]->AsString  : empty ;

	sp->email = ( scoutMatched[ COLUMN_EMAIL ] != -1 ) ?
		XLSQuery->Fields->Fields[ scoutMatched[ COLUMN_EMAIL ] ]->AsString  : empty ;

	sp->activities = ( scoutMatched[ COLUMN_ACTIVITIES ] != -1 ) ?
		XLSQuery->Fields->Fields[ scoutMatched[ COLUMN_ACTIVITIES ] ]->AsString  : empty ;

	sp->nacionality = ( scoutMatched[ COLUMN_NACIONALITY ] != -1 ) ?
		XLSQuery->Fields->Fields[ scoutMatched[ COLUMN_NACIONALITY ] ]->AsString  : empty ;

	sp->languages = ( scoutMatched[ COLUMN_LANGUAGES ] != -1 ) ?
		XLSQuery->Fields->Fields[ scoutMatched[ COLUMN_LANGUAGES ] ]->AsString  : empty ;
}

//---------------------------------------------------------------------------

void TDM::loadCurrentScouting ( void )
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
		XLSQuery->SQL->Text = "Select * from [Sheet1$]";
		XLSQuery->Open();
	}


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
						scoutMatched[ (*found).second ] = i;
						++schema_match_count;
					}
					else
					{
						notMatchedColumns->push_back( t );
					}
				}
			}

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
	scoutMatched[COLUMN_CODE] 	      = -1;
	scoutMatched[COLUMN_DATE] 	      = -1;
	scoutMatched[COLUMN_NAME] 	      = -1;
	scoutMatched[COLUMN_BORNDATE]     = -1;
	scoutMatched[COLUMN_AGE]          = -1;
	scoutMatched[COLUMN_TELEPHONE]    = -1;
	scoutMatched[COLUMN_CELPHONE]     = -1;
	scoutMatched[COLUMN_HEIGHT]       = -1;
	scoutMatched[COLUMN_WEIGHT]       = -1;
	scoutMatched[COLUMN_OBSERVATIONS] = -1;
	scoutMatched[COLUMN_PLACE]        = -1;
	scoutMatched[COLUMN_EMAIL]        = -1;
	scoutMatched[COLUMN_ACTIVITIES]   = -1;
	scoutMatched[COLUMN_NACIONALITY]  = -1;
	scoutMatched[COLUMN_LANGUAGES]    = -1;
}

