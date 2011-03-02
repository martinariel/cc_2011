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
	UnicodeString archivo;

	FrmFolder->Caption = "Seleccione el directorio de Scouting ... ";
	if ( FrmFolder->ShowModal() == mrOk )
	{

		AnsiString folder = FrmFolder->DirectoryListBox1->Directory;


		archivo = ExtractFilePath ( Application->ExeName ) + "\\CCImporter.error.log";

		if ( FileExists(archivo) )
			DeleteFileW ( archivo );

		archivo = ExtractFilePath ( Application->ExeName ) + "\\CCImporter.scout_not_match";
		if ( FileExists(archivo) )
			DeleteFileW ( archivo );

		DM->setAnalisis(true);
		DM->iterateScouting (folder);
		DM->log ( " ----------------------------------------------------------------------------------------------------------------------" );
		DM->log ( " ----------------------------------------------------------------------------------------------------------------------" );
		DM->log ( " ----------------------------------------------------------------------------------------------------------------------" );
		DM->log ( "  SCOUTING: Analisis de archivos finalizado.");
		DM->log ( "   VERIFIQUE LOS ARCHIVOS CCImporter.error.log y CCImporter.scout_not_match " );
	}

}
//---------------------------------------------------------------------------

void __fastcall TFormMain::acImportarArchivosExecute(TObject *Sender)
{

	FrmFolder->Caption = "Seleccione el directorio de Scouting ... ";
	if ( FrmFolder->ShowModal() == mrOk )
	{

		AnsiString folder = FrmFolder->DirectoryListBox1->Directory;

		DM->setAnalisis(false);
		DM->iterateScouting ( folder );
		DM->log ( " ----------------------------------------------------------------------------------------------------------------------" );
		DM->log ( " ----------------------------------------------------------------------------------------------------------------------" );
		DM->log ( " ----------------------------------------------------------------------------------------------------------------------" );
		DM->log ( "  SCOUTING: Carga masiva finalizada.");
	}
}
//---------------------------------------------------------------------------

void __fastcall TFormMain::acAnalizarCastingExecute(TObject *Sender)
{
	UnicodeString archivo;

	FrmFolder->Caption = "Seleccione el directorio de Casting ... ";
	if ( FrmFolder->ShowModal() == mrOk )
	{

		archivo = ExtractFilePath ( Application->ExeName ) + "\\CCImporter.cast_not_match";
		if ( FileExists(archivo) )
			DeleteFileW ( archivo );

		archivo = ExtractFilePath ( Application->ExeName ) + "\\CCImporter.error.log";
		if ( FileExists(archivo) )
			DeleteFileW ( archivo );

		AnsiString folder = FrmFolder->DirectoryListBox1->Directory;
		DM->setAnalisis(true);
		DM->iterateCasting ( folder );
		DM->log ( " ----------------------------------------------------------------------------------------------------------------------" );
		DM->log ( " ----------------------------------------------------------------------------------------------------------------------" );
		DM->log ( " ----------------------------------------------------------------------------------------------------------------------" );
		DM->log ( "  CASTING: Analisis de archivos finalizado.");
		DM->log ( "   VERIFIQUE LOS ARCHIVOS CCImporter.error.log y CCImporter.cast_not_match " );
	}
}
//---------------------------------------------------------------------------

void __fastcall TFormMain::acImportarCastingExecute(TObject *Sender)
{
	FrmFolder->Caption = "Seleccione el directorio de Casting ... ";
	if ( FrmFolder->ShowModal() == mrOk )
	{
		AnsiString folder = FrmFolder->DirectoryListBox1->Directory;
		DM->setAnalisis(false);
		DM->iterateCasting ( folder );
		DM->log ( " ----------------------------------------------------------------------------------------------------------------------" );
		DM->log ( " ----------------------------------------------------------------------------------------------------------------------" );
		DM->log ( " ----------------------------------------------------------------------------------------------------------------------" );
		DM->log ( "  CASTING: Carga masiva finalizada.");
	}
}
//---------------------------------------------------------------------------

void __fastcall TFormMain::FormCreate(TObject *Sender)
{
	DM->setLogMemo ( mEstado );
}
//---------------------------------------------------------------------------

void __fastcall TFormMain::acProcesarImagenesExecute(TObject *Sender)
{
	FrmImagenes->ShowModal();
}
//---------------------------------------------------------------------------

