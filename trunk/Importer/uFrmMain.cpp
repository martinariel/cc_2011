//---------------------------------------------------------------------------

#include <vcl.h>
#pragma hdrstop

#include "uFrmMain.h"
#include "uDM.h"

//---------------------------------------------------------------------------
#pragma package(smart_init)
#pragma resource "*.dfm"
TFormMain *FormMain;
//---------------------------------------------------------------------------
__fastcall TFormMain::TFormMain(TComponent* Owner)
	: TForm(Owner)
{
}
//---------------------------------------------------------------------------
void __fastcall TFormMain::acAnalizarScoutExecute(TObject *Sender)
{
	//
	DM->setAnalisis(true);
	DM->iterateScouting ( "G:\\01 importacion masiva de datos\\01 scouting");
	DM->log ( " ----------------------------------------------------------------------------------------------------------------------" );
	DM->log ( " ----------------------------------------------------------------------------------------------------------------------" );
	DM->log ( " ----------------------------------------------------------------------------------------------------------------------" );
	DM->log ( "  SCOUTING: Analisis de archivos finalizado.");
	DM->log ( "   VERIFIQUE LOS ARCHIVOS CCImporter.error.log y CCImporter.scout_not_match " );
}
//---------------------------------------------------------------------------

void __fastcall TFormMain::acImportarArchivosExecute(TObject *Sender)
{
	DM->setAnalisis(false);
	DM->iterateScouting ( "G:\\01 importacion masiva de datos\\01 scouting");
	DM->log ( " ----------------------------------------------------------------------------------------------------------------------" );
	DM->log ( " ----------------------------------------------------------------------------------------------------------------------" );
	DM->log ( " ----------------------------------------------------------------------------------------------------------------------" );
	DM->log ( "  SCOUTING: Carga masiva finalizada.");
}
//---------------------------------------------------------------------------

void __fastcall TFormMain::acAnalizarCastingExecute(TObject *Sender)
{
	DM->setAnalisis(true);
	DM->iterateCasting ( "G:\\01 importacion masiva de datos\\02 casting");
	DM->log ( " ----------------------------------------------------------------------------------------------------------------------" );
	DM->log ( " ----------------------------------------------------------------------------------------------------------------------" );
	DM->log ( " ----------------------------------------------------------------------------------------------------------------------" );
	DM->log ( "  CASTING: Analisis de archivos finalizado.");
	DM->log ( "   VERIFIQUE LOS ARCHIVOS CCImporter.error.log y CCImporter.cast_not_match " );
}
//---------------------------------------------------------------------------

void __fastcall TFormMain::acImportarCastingExecute(TObject *Sender)
{
	DM->setAnalisis(false);
	DM->iterateCasting ( "G:\\01 importacion masiva de datos\\02 casting");
	DM->log ( " ----------------------------------------------------------------------------------------------------------------------" );
	DM->log ( " ----------------------------------------------------------------------------------------------------------------------" );
	DM->log ( " ----------------------------------------------------------------------------------------------------------------------" );
	DM->log ( "  CASTING: Carga masiva finalizada.");
}
//---------------------------------------------------------------------------

void __fastcall TFormMain::FormCreate(TObject *Sender)
{
	DM->setLogMemo ( mEstado );
}
//---------------------------------------------------------------------------
