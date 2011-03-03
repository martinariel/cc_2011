//---------------------------------------------------------------------------

#include <vcl.h>
#pragma hdrstop

#include "uFrmSinonimos.h"
#include "uDM.h"
//---------------------------------------------------------------------------
#pragma package(smart_init)
#pragma resource "*.dfm"
TFrmSinonimos *FrmSinonimos;
//---------------------------------------------------------------------------
__fastcall TFrmSinonimos::TFrmSinonimos(TComponent* Owner)
	: TForm(Owner)
{
}
//---------------------------------------------------------------------------
void __fastcall TFrmSinonimos::FormCreate(TObject *Sender)
{
	DM->tSinonimos->Open();
}
//---------------------------------------------------------------------------

void __fastcall TFrmSinonimos::FormDestroy(TObject *Sender)
{
	DM->tSinonimos->Close();
}
//---------------------------------------------------------------------------

void __fastcall TFrmSinonimos::Button2Click(TObject *Sender)
{

	DM->tSinonimos->Insert();
	DM->tSinonimosorigen->Value = Edit1->Text;
	DM->tSinonimosdestino->Value = Edit2->Text;
	DM->tSinonimos->Post();
}
//---------------------------------------------------------------------------

