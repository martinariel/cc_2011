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

	iterateScouting ( "G:\\01 importacion masiva de datos\\01 scouting");
}
//---------------------------------------------------------------------------
void __fastcall TDM::DataModuleDestroy(TObject *Sender)
{
	DWConnection->Close();
	clearMediaList();
	delete mediaList;
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
				//2 - Cargo la lista de media
				loadMediaList ( path );

				//3 - Proceso el excel
				loadCurrentScouting();

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

void TDM::loadCurrentScouting ( void )
{
	if ( XLSQuery->Active )
		XLSQuery->Close();

	 XLSQuery->SQL->Text = "Select * from [Hoja1$]";
	 XLSQuery->Open();

	 while ( !XLSQuery->Eof )
	 {

	 	AnsiString t;
		for ( int i = 0 ; i < XLSQuery->FieldCount ; i++ )
		{
			t = XLSQuery->Fields->Fields[i]->AsString;
		}

	 	XLSQuery->Next();
	 }
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
