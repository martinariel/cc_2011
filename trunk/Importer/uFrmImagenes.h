//---------------------------------------------------------------------------

#ifndef uFrmImagenesH
#define uFrmImagenesH
//---------------------------------------------------------------------------
#include <Classes.hpp>
#include <Controls.hpp>
#include <StdCtrls.hpp>
#include <Forms.hpp>
#include "uFrmFolder.h"
#include <ComCtrls.hpp>
#include <list.h>
//---------------------------------------------------------------------------
class TFrmImagenes : public TForm
{
__published:	// IDE-managed Components
	TLabel *Label1;
	TEdit *edDirectorio;
	TButton *Button1;
	TLabel *Label3;
	TEdit *edAncho;
	TLabel *Label2;
	TEdit *edAlto;
	TUpDown *upAncho;
	TUpDown *UpDown1;
	TProgressBar *ProgressBar1;
	TButton *btnProcesar;
	void __fastcall Button1Click(TObject *Sender);
	void __fastcall btnProcesarClick(TObject *Sender);
	void __fastcall FormShow(TObject *Sender);
private:	// User declarations

	void getFolders ( list<AnsiString>* result , const AnsiString& root );

public:		// User declarations
	__fastcall TFrmImagenes(TComponent* Owner);
};
//---------------------------------------------------------------------------
extern PACKAGE TFrmImagenes *FrmImagenes;
//---------------------------------------------------------------------------
#endif
