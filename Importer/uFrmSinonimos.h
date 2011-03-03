//---------------------------------------------------------------------------

#ifndef uFrmSinonimosH
#define uFrmSinonimosH
//---------------------------------------------------------------------------
#include <Classes.hpp>
#include <Controls.hpp>
#include <StdCtrls.hpp>
#include <Forms.hpp>
#include <DB.hpp>
#include <ExtCtrls.hpp>
#include <DBGrids.hpp>
#include <Grids.hpp>
#include <DBCtrls.hpp>
#include <Mask.hpp>
//---------------------------------------------------------------------------
class TFrmSinonimos : public TForm
{
__published:	// IDE-managed Components
	TPanel *Panel1;
	TDBGrid *DBGrid1;
	TButton *Button2;
	TDataSource *DataSource1;
	TEdit *Edit1;
	TEdit *Edit2;
	TLabel *Label1;
	TLabel *Label2;
	void __fastcall FormCreate(TObject *Sender);
	void __fastcall FormDestroy(TObject *Sender);
	void __fastcall Button2Click(TObject *Sender);
private:	// User declarations
public:		// User declarations
	__fastcall TFrmSinonimos(TComponent* Owner);
};
//---------------------------------------------------------------------------
extern PACKAGE TFrmSinonimos *FrmSinonimos;
//---------------------------------------------------------------------------
#endif
