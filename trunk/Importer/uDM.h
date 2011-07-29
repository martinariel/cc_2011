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
	TADOTable *tScoutImport;
	TIdHTTP *HTTP;
	TADOTable *tCastImport;
	TAutoIncField *tScoutImportid;
	TIntegerField *tScoutImportcodigo;
	TIntegerField *tScoutImportedad;
	TIntegerField *tScoutImportpeso;
	TIntegerField *tScoutImportaltura;
	TStringField *tScoutImportnombre;
	TStringField *tScoutImportfecha_nacimiento;
	TStringField *tScoutImportfecha_scout;
	TStringField *tScoutImportlugar_scout;
	TStringField *tScoutImportobservaciones;
	TStringField *tScoutImportactividades;
	TStringField *tScoutImportemail;
	TStringField *tScoutImporttelefono;
	TStringField *tScoutImportcelular;
	TStringField *tScoutImportnacionalidad;
	TStringField *tScoutImportidiomas;
	TStringField *tScoutImportxls_file;
	TIntegerField *tScoutImportanio;
	TStringField *tScoutImportmes;
	TStringField *tScoutImportcodigo_agrupador;
	TStringField *tScoutImportdia;
	TStringField *tSinonimosorigen;
	TStringField *tSinonimosdestino;
	TAutoIncField *tSinonimosid;
	TIntegerField *tCastImportcodigo;
	TStringField *tCastImportnombre;
	TStringField *tCastImportagencia;
	TStringField *tCastImportpantalon;
	TStringField *tCastImportcamisa;
	TIntegerField *tCastImportcalzado;
	TIntegerField *tCastImportaltura;
	TIntegerField *tCastImportpeso;
	TStringField *tCastImportfecha_nacimiento;
	TStringField *tCastImportfecha_casting;
	TStringField *tCastImportcasting;
	TIntegerField *tCastImportanio;
	TStringField *tCastImportmedidas;
	TStringField *tCastImportdni;
	TMemoField *tCastImportobservaciones;
	TStringField *tCastImporttelefono;
	TStringField *tCastImportcelular;
	TStringField *tCastImportemail;
	TIntegerField *tCastImportedad;
	TStringField *tCastImportdia;
	TAutoIncField *tCastImportid;
	void __fastcall DataModuleDestroy(TObject *Sender);

private:	// User declarations


	TStringList* processedFiles;
	bool isFileProcessed ( const AnsiString& file ) const;
	void addProcessedFile ( const AnsiString&  file );

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
	map<AnsiString,bool>* tablesMatch;

	TStringList* foundedTables;

	map<AnsiString,int> indexMatched;
	AnsiString currentXLS;

	AnsiString anio;
	AnsiString codigo;
	AnsiString mes;
	AnsiString dia;

    bool analisis;

	void clearMediaList( void );

	// Reads a Column in the XLS File as String
	AnsiString mapString ( const AnsiString& Column , const AnsiString& defaultValue = "" );

	// Reads a Column in the XLS File as Integer
	int mapInteger ( const AnsiString& Column , int defaultValue = -1 );

	// Attemps to read a Column in the xls file as DD/MM/YYYY sTRING Date.
	AnsiString mapDate ( const AnsiString& Column );

	// Returns in schema_match_count the number of columns the could be matched in the
	// current row.
    void matchColumns ( int* schema_match_count, list<AnsiString>* notMatchedColumns );

	// Connects XLSConnection to fileName
	bool connectXLS ( const AnsiString& fileName  );

	// Loads into the medialist all the media files in the current directory and subdirectories
	// note: only first level, NOT recursive.
	void loadMediaList   ( const AnsiString& path );

	void loadMediaListRecursive ( const AnsiString& path , list<MediaFile*>* results );

	// Attemps to open Hoja1 or Sheet1
	void openXLSSheet ( void );

	// Opens the Datasheet by scaning all and matching with the sinonimes.
	void openXLSSheetBySinomy ( void );

	// Loads the currentXLS as a Scouting file
	void loadCurrentScouting ( void );

	// Loads the currentXLS as a Casting file
	void loadCurrentCast ( void );
	void matchAndLoadCast ( void );

	// Checks if a folder name is a media valid folder.
	bool isMediaFolder ( const AnsiString& name );

	// Checks if a file (by extension) is a valid media file.
	bool isMediaFile   ( const AnsiString& name );

	void logError ( const AnsiString& error );

	void loadColumnsMatch ( void );
	void loadTablesMatch ( void );

	void clearScoutColumnsMatched ( void );

    void mapScoutPerson ( ScoutPerson* sp );
	void saveScoutPerson ( ScoutPerson* sp );

	void mapCastPerson ( CastPerson* cp );
	void saveCastPerson ( CastPerson* cp );

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
	void iterateCasting ( const AnsiString& pAnio, const AnsiString& path , int level = 0 );

	void loadCast ( const AnsiString& anio , const AnsiString& codigo , const AnsiString& xls );

	// Extracts the first integer in a string
	int extractPersonCode ( const AnsiString& fullString );

};
//---------------------------------------------------------------------------
extern PACKAGE TDM *DM;
//---------------------------------------------------------------------------
#endif
