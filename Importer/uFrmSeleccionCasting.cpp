//---------------------------------------------------------------------------

#include <vcl.h>
#pragma hdrstop

#include "uFrmSeleccionCasting.h"
//---------------------------------------------------------------------------
#pragma package(smart_init)
#pragma resource "*.dfm"
TFrmSeleccionCasting *FrmSeleccionCasting;
//---------------------------------------------------------------------------
__fastcall TFrmSeleccionCasting::TFrmSeleccionCasting(TComponent* Owner)
	: TForm(Owner)
{
}
//---------------------------------------------------------------------------
void __fastcall TFrmSeleccionCasting::Button3Click(TObject *Sender)
{
	if ( OD->Execute() )
	{
		edArchivo->Text = OD->FileName;
	}
}
//---------------------------------------------------------------------------

void TFrmSeleccionCasting::cargar ( void )
{
	edArchivo->Text    = "";
	edProyecto->Text   = "";
	cmbAnio->ItemIndex = -1;
}

//---------------------------------------------------------------------------

void __fastcall TFrmSeleccionCasting::FormCreate(TObject *Sender)
{
	cmbAnio->Items->Clear();

	int anio = StrToInt ( Now().FormatString("YYYY") );

	for ( int i = 2006 ; i <= anio ; i++ )
	{
		cmbAnio->Items->Add( IntToStr ( i ) );
	}
}
//---------------------------------------------------------------------------
