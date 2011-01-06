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

	iterateScouting ( "G:\\01 importacion masiva de datos\\01 scouting");
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
					//3 - Proceso el excel
					loadCurrentScouting();
				}
				catch (...)
				{
					log ( "ERROR LECTURA XLS : " + path + "\\" + sr.Name );
				}

				XLSConnection->Close();
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

void TDM::saveScoutPerson ( ScoutPerson* sp )
{
	// TODO
}

//---------------------------------------------------------------------------

void TDM::loadCurrentScouting ( void )
{
	if ( XLSQuery->Active )
		XLSQuery->Close();

	XLSQuery->SQL->Text = "Select * from [Hoja1$]";

	UnicodeString empty = "";

	try
	{
		XLSQuery->Open();
	}
	catch ( ... )
	{
		XLSQuery->SQL->Text = "Select * from [Sheet1$]";
		XLSQuery->Open();
	}

	ofstream notMatchedLog ( ChangeFileExt(Application->ExeName, ".scout_not_match" ).c_str() , ios::app );

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


				if ( notMatchedColumns->size() > 0 )
					notMatchedLog << currentXLS.c_str() << "  -------------------------------------------- " << std::endl;

				//Output to disk the non-matched columns
				for ( list<AnsiString>::const_iterator it = notMatchedColumns->begin() ; it != notMatchedColumns->end() ; ++it )
				{
					notMatchedLog << (*it).c_str() << std::endl;
				}
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

			sp->code = ( scoutMatched[ COLUMN_CODE ] != -1 ) ?
				extractPersonCode ( XLSQuery->Fields->Fields[ scoutMatched[ COLUMN_CODE ] ]->AsString )  : -1;

			sp->age    = ( scoutMatched[ COLUMN_AGE ] != -1 ) ?
				StrToIntDef ( XLSQuery->Fields->Fields[ scoutMatched[ COLUMN_AGE    ] ]->AsString , -1 ) : -1;

			sp->weight = ( scoutMatched[ COLUMN_WEIGHT ] != -1  ) ?
				StrToIntDef ( XLSQuery->Fields->Fields[ scoutMatched[ COLUMN_WEIGHT ] ]->AsString , -1 ) : -1;

			t = ( scoutMatched[ COLUMN_HEIGHT ] != -1  ) ?
				XLSQuery->Fields->Fields[ scoutMatched[ COLUMN_HEIGHT ] ]->AsString : (UnicodeString) "-1" ;

			sp->height = StrToFloatDef( t , 0 ) * 100; //cm

			sp->date =  ( scoutMatched[ COLUMN_DATE ] != -1 ) ?
				XLSQuery->Fields->Fields[ scoutMatched[ COLUMN_DATE ] ]->AsString  : empty ;

			sp->name =  ( scoutMatched[ COLUMN_NAME ] != -1 ) ?
				XLSQuery->Fields->Fields[ scoutMatched[ COLUMN_NAME ] ]->AsString  : empty ;

			sp->place =  ( scoutMatched[ COLUMN_PLACE ] != -1 ) ?
				XLSQuery->Fields->Fields[ scoutMatched[ COLUMN_PLACE ] ]->AsString  : empty ;

			sp->observations =  ( scoutMatched[ COLUMN_OBSERVATIONS ] != -1 ) ?
				XLSQuery->Fields->Fields[ scoutMatched[ COLUMN_OBSERVATIONS ] ]->AsString : empty ;

			sp->telephone =  ( scoutMatched[ COLUMN_TELEPHONE ] != -1 ) ?
				XLSQuery->Fields->Fields[ scoutMatched[ COLUMN_TELEPHONE ] ]->AsString  : empty ;

			sp->celphone =  ( scoutMatched[ COLUMN_CELPHONE ] != -1 ) ?
				XLSQuery->Fields->Fields[ scoutMatched[ COLUMN_CELPHONE ] ]->AsString  : empty ;

			sp->borndate =  ( scoutMatched[ COLUMN_BORNDATE ] != -1 ) ?
				XLSQuery->Fields->Fields[ scoutMatched[ COLUMN_BORNDATE ] ]->AsString  : empty ;

			// A la base de datos
			saveScoutPerson ( sp );

			delete sp;
		}

		XLSQuery->Next();

	}

	notMatchedLog.close();

	XLSQuery->Close();

	delete notMatchedColumns;
}

//---------------------------------------------------------------------------

bool TDM::isMediaFolder ( const AnsiString& name )
{
	UnicodeString us = LowerCase ( name );

	return (
		name[1] != '.' &&
		(
			Pos ( "foto "   , us ) > 0 ||
			Pos ( "fotos "  , us ) > 0 ||
			Pos ( "video "  , us ) > 0 ||
			Pos ( "videos " , us ) > 0 ||
			Pos ( "qt  "    , us ) > 0
		)
	);
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
	//TODO: Cargar del disco.
	// SINONIMOS DE COLUMNAS.
	map<AnsiString,AnsiString>& M = *columnsMatch;

	M["Nº"] 			   	= COLUMN_CODE;
	M["Nª"]                 = COLUMN_CODE;
	M["CODIGO"]             = COLUMN_CODE;
	M["CóDIGO"]             = COLUMN_CODE;
	M["NRO"]                = COLUMN_CODE;
	M["NúMERO"]             = COLUMN_CODE;
	M["FECHA DE SCOUTING"]  = COLUMN_DATE;
	M["FECHA SCOUTING"]     = COLUMN_DATE;
	M["FECHA SCOUT"]        = COLUMN_DATE;
	M["FECHA"]              = COLUMN_DATE;
	M["FECHA DE SCOUT"]     = COLUMN_DATE;
	M["FECHS DE SCOUT"]     = COLUMN_DATE;
	M["DIA DE SCOUT"]       = COLUMN_DATE;
	M["NOMBRE Y APELLIDO"]  = COLUMN_NAME;
	M["NOMBRE"]             = COLUMN_NAME;
	M["FECHA NAC"] 	        = COLUMN_BORNDATE;
	M["FECHA NAC."] 	    = COLUMN_BORNDATE;
	M["FECHA DE NAC"] 	    = COLUMN_BORNDATE;
	M["FECHA DE NAC."] 	    = COLUMN_BORNDATE;
	M["EDAD"]			    = COLUMN_AGE;
	M["TELEFONO"]		    = COLUMN_TELEPHONE;
	M["TELéFONO"]		    = COLUMN_TELEPHONE;
	M["TEL"]		        = COLUMN_TELEPHONE;
	M["TEL."]		        = COLUMN_TELEPHONE;
	M["CELULAR"] 		    = COLUMN_CELPHONE;
	M["CELU"] 		        = COLUMN_CELPHONE;
	M["CEL"] 		        = COLUMN_CELPHONE;
	M["MOVI"] 		        = COLUMN_CELPHONE;
	M["MOVIL"] 		        = COLUMN_CELPHONE;
	M["MOVIL."] 		    = COLUMN_CELPHONE;
	M["ALTURA"] 		    = COLUMN_HEIGHT;
	M["ALLTURA"] 		    = COLUMN_HEIGHT;
	M["ALT"] 		        = COLUMN_HEIGHT;
	M["ALT."] 		        = COLUMN_HEIGHT;
	M["PESO"] 		        = COLUMN_WEIGHT;
	M["PESO."] 		        = COLUMN_WEIGHT;
	M["OBSERVACIONES"] 	    = COLUMN_OBSERVATIONS;
	M["OBS"] 	            = COLUMN_OBSERVATIONS;
	M["OBS."] 	            = COLUMN_OBSERVATIONS;
	M["LUGAR SCOUTING"]     = COLUMN_PLACE;
	M["LUGAR DE SCOUTING"]  = COLUMN_PLACE;
	M["LUGAR DE SCOUT"]     = COLUMN_PLACE;
	M["LUBAR DE SCOUT"]     = COLUMN_PLACE;
	M["LUGAR SCOUT"]        = COLUMN_PLACE;
	M["LUGAR SCOUT."]       = COLUMN_PLACE;
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
}

