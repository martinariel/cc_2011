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
#include <IdBaseComponent.hpp>
#include <IdComponent.hpp>
#include <IdExplicitTLSClientServerBase.hpp>
#include <IdFTP.hpp>
#include <IdTCPClient.hpp>
#include <IdTCPConnection.hpp>
#include <IniFiles.hpp>
#include <IdHTTP.hpp>

#include <iostream>
#include <string>
#include <fstream>

#include "ColumnsDefs.h"
#include "ScoutPerson.h"
#include "CastPerson.h"


#define DEBUG_TO_DISC


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
	TIdFTP *FTP;
	TADOTable *tSinonimos;
	TStringField *tSinonimosORIGEN;
	TStringField *tSinonimosDESTINO;
	TADOTable *tScoutImport;
	TAutoIncField *tScoutImportID;
	TIntegerField *tScoutImportCODIGO;
	TIntegerField *tScoutImportEDAD;
	TIntegerField *tScoutImportPESO;
	TIntegerField *tScoutImportALTURA;
	TStringField *tScoutImportNOMBRE;
	TStringField *tScoutImportFECHA_NACIMIENTO;
	TStringField *tScoutImportFECHA_SCOUT;
	TStringField *tScoutImportLUGAR_SCOUT;
	TStringField *tScoutImportOBSERVACIONES;
	TStringField *tScoutImportACTIVIDADES;
	TStringField *tScoutImportEMAIL;
	TStringField *tScoutImportTELEFONO;
	TStringField *tScoutImportCELULAR;
	TStringField *tScoutImportNACIONALIDAD;
	TStringField *tScoutImportIDIOMAS;
	TStringField *tScoutImportXLS_FILE;
	TIntegerField *tScoutImportANIO;
	TStringField *tScoutImportMES;
	TStringField *tScoutImportCODIGO_AGRUPADOR;
	TStringField *tScoutImportDIA;
	TIdHTTP *HTTP;

	void __fastcall DataModuleCreate(TObject *Sender);
	void __fastcall DataModuleDestroy(TObject *Sender);

private:	// User declarations

	// Configuration parameters

	// FTP
	AnsiString ftpServer;
	AnsiString ftpUser;
	AnsiString ftpPassword;

	// Web Processes
	AnsiString urlScoutProcess;
	AnsiString urlCastProcess;

	// ----------------------------

	list<MediaFile*>* mediaList;

	map<AnsiString,AnsiString>* columnsMatch;
	map<AnsiString,int> indexMatched;
	AnsiString currentXLS;

	AnsiString anio;
	AnsiString codigo;
	AnsiString mes;
	AnsiString dia;

    bool analisis;

	void clearMediaList( void );

	bool connectXLS      ( const AnsiString& fileName  );
	void loadMediaList   ( const AnsiString& path );

	void loadCurrentScouting ( void );
	void loadCurrentCast ( void );

	int extractPersonCode ( const AnsiString& fullString );

	bool isMediaFolder ( const AnsiString& name );
	bool isMediaFile   ( const AnsiString& name );

	void loadColumnsMatch ( void );

	void clearScoutColumnsMatched ( void );

    void mapScoutPerson ( ScoutPerson* sp );
	void saveScoutPerson ( ScoutPerson* sp );

	void mapCastPerson ( CastPerson* cp );
	void saveScoutPerson ( CastPerson* cp );

	void clearTable ( const AnsiString& tableName );

	void uploadMediaList( void );

	void notifyScoutLoad ( void );
	void notifyCastLoad ( void );

	TMemo* mEstado;

	bool isDayFolder ( const AnsiString& name );

public:

	// User declarations

	__fastcall TDM(TComponent* Owner);

	void setAnalisis ( bool value );

	void log ( const AnsiString& msg );
	void setLogMemo ( TMemo* memo );



	// Carga los datos de scouting a partir del path raiz.
	//
	void iterateScouting ( const AnsiString& path , int level = 0 );

	// Carga los datos de casting a partir del path raiz.
	// TODO: Crear una clase GenericLoader como Template Method y crear
	// dos clases derivadas ScoutLoader y CastLoader así no duplicamos código.
	// hace falta ahora? no , realmente no.
	void iterateCasting ( const AnsiString& path , int level = 0 );

};
//---------------------------------------------------------------------------
extern PACKAGE TDM *DM;
//---------------------------------------------------------------------------
#endif
