//---------------------------------------------------------------------------

#ifndef uDMH
#define uDMH
//---------------------------------------------------------------------------
#include <Classes.hpp>
#include <Controls.hpp>
#include <StdCtrls.hpp>
#include <Forms.hpp>
#include <ADODB.hpp>
#include <DB.hpp>
#include <list.h>
#include <map.h>

#include <iostream>
#include <string>
#include <fstream>

#include "ColumnsDefs.h"
#include "ScoutPerson.h"


//---------------------------------------------------------------------------

class MediaFile
{
public:
	int code;
	AnsiString path;
	AnsiString name;
};

//---------------------------------------------------------------------------

class TDM : public TDataModule
{
__published:	// IDE-managed Components
	TADOConnection *DWConnection;
	TADOConnection *XLSConnection;
	TADOQuery *XLSQuery;

	void __fastcall DataModuleCreate(TObject *Sender);
	void __fastcall DataModuleDestroy(TObject *Sender);

private:	// User declarations

	list<MediaFile*>* mediaList;

	map<AnsiString,AnsiString>* columnsMatch;
	map<AnsiString,int> scoutMatched;
	AnsiString currentXLS;

	AnsiString anio;
	AnsiString codigo;
	AnsiString mes;
	AnsiString dia;

	void clearMediaList( void );

	bool connectXLS      ( const AnsiString& fileName  );
	void loadMediaList   ( const AnsiString& path );
	void iterateScouting ( const AnsiString& path , int level = 0 );
	void loadCurrentScouting ( void );

	int extractPersonCode ( const AnsiString& fullString );

	bool isMediaFolder ( const AnsiString& name );
	bool isMediaFile   ( const AnsiString& name );

	void log ( const AnsiString& msg );

	void loadColumnsMatch ( void );

	void clearScoutColumnsMatched ( void );

	void saveScoutPerson ( ScoutPerson* sp );

public:		// User declarations
	__fastcall TDM(TComponent* Owner);
};
//---------------------------------------------------------------------------
extern PACKAGE TDM *DM;
//---------------------------------------------------------------------------
#endif
