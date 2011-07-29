//---------------------------------------------------------------------------

#include <vcl.h>
#pragma hdrstop

#include "uFrmMain.h"
#include "uDM.h"
#include "uFrmSinonimos.h"

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

		DM->setAnalisis     ( false  );
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
		AnsiString anio   = ExtractFileName ( folder );

		int anioNumero = StrToIntDef ( anio , -1 );
		int anioInt = StrToInt ( Now().FormatString("YYYY") );

		if ( anioNumero < 2000 || anioNumero > anioInt )
		{
			ShowMessage ( "Debe seleccionar una carpeta de año." );
			return;
		}

		DM->setAnalisis(true);
		DM->iterateCasting ( anio , folder );
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
		AnsiString anio   = ExtractFileName ( folder );

		int anioNumero = StrToIntDef ( anio , -1 );
		int anioInt = StrToInt ( Now().FormatString("YYYY") );

		if ( anioNumero < 2000 || anioNumero > anioInt )
		{
			ShowMessage ( "Debe seleccionar una carpeta de año." );
			return;
		}

		DM->setAnalisis(false);
		DM->iterateCasting ( anio , folder );
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

void __fastcall TFormMain::AccSinonimosExecute(TObject *Sender)
{
	FrmSinonimos->ShowModal();
}
//---------------------------------------------------------------------------

void __fastcall TFormMain::Button1Click(TObject *Sender)
{
	int a = DM->extractPersonCode("CLARA KOVACIC (3).JPG");

	a++;

}
//---------------------------------------------------------------------------

void __fastcall TFormMain::accImportarCastingIndividualExecute(TObject *Sender)
{
	FrmSeleccionCasting->cargar();
	if ( FrmSeleccionCasting->ShowModal() == mrOk )
	{
		AnsiString archivo  = FrmSeleccionCasting->edArchivo->Text;
		AnsiString proyecto = FrmSeleccionCasting->edProyecto->Text;
		AnsiString anio     = FrmSeleccionCasting->cmbAnio->Text;

		if ( anio.IsEmpty() || archivo.IsEmpty() || proyecto.IsEmpty() )
			return;

		DM->loadCast ( anio , proyecto , archivo );

	}
}
//---------------------------------------------------------------------------

