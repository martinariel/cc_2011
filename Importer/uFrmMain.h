//---------------------------------------------------------------------------

#ifndef uFrmMainH
#define uFrmMainH
//---------------------------------------------------------------------------
#include <Classes.hpp>
#include <Controls.hpp>
#include <StdCtrls.hpp>
#include <Forms.hpp>
#include <Ribbon.hpp>
#include <RibbonLunaStyleActnCtrls.hpp>
#include <ActnCtrls.hpp>
#include <ActnMan.hpp>
#include <ToolWin.hpp>
#include <ActnList.hpp>
#include <ImgList.hpp>
#include <PlatformDefaultStyleActnCtrls.hpp>
#include <RibbonObsidianStyleActnCtrls.hpp>
#include <Dialogs.hpp>
#include "uFrmFolder.h"
//---------------------------------------------------------------------------
class TFormMain : public TForm
{
__published:	// IDE-managed Components
	TRibbon *Ribbon1;
	TGroupBox *GroupBox1;
	TMemo *mEstado;
	TRibbonPage *RibbonPage1;
	TRibbonGroup *RibbonGroup1;
	TRibbonGroup *RibbonGroup2;
	TActionList *ActionList1;
	TAction *acAnalizarScout;
	TImageList *ImageList1;
	TAction *acImportarArchivos;
	TAction *acAnalizarCasting;
	TAction *acImportarCasting;
	TActionManager *ActionManager1;
	TOpenDialog *opendialog;
	void __fastcall acAnalizarScoutExecute(TObject *Sender);
	void __fastcall acImportarArchivosExecute(TObject *Sender);
	void __fastcall acAnalizarCastingExecute(TObject *Sender);
	void __fastcall acImportarCastingExecute(TObject *Sender);
	void __fastcall FormCreate(TObject *Sender);
private:	// User declarations
public:		// User declarations
	__fastcall TFormMain(TComponent* Owner);
};
//---------------------------------------------------------------------------
extern PACKAGE TFormMain *FormMain;
//---------------------------------------------------------------------------
#endif
