//---------------------------------------------------------------------------

#ifndef uFrmSeleccionCastingH
#define uFrmSeleccionCastingH
//---------------------------------------------------------------------------
#include <Classes.hpp>
#include <Controls.hpp>
#include <StdCtrls.hpp>
#include <Forms.hpp>
#include <Dialogs.hpp>
//---------------------------------------------------------------------------
class TFrmSeleccionCasting : public TForm
{
__published:	// IDE-managed Components
	TButton *Button1;
	TButton *Button2;
	TLabel *Label1;
	TLabel *Label2;
	TLabel *Label3;
	TComboBox *cmbAnio;
	TEdit *edProyecto;
	TEdit *edArchivo;
	TButton *Button3;
	TOpenDialog *OD;
	void __fastcall Button3Click(TObject *Sender);
	void __fastcall FormCreate(TObject *Sender);
private:	// User declarations
public:		// User declarations
	__fastcall TFrmSeleccionCasting(TComponent* Owner);
	void cargar ( void );
};
//---------------------------------------------------------------------------
extern PACKAGE TFrmSeleccionCasting *FrmSeleccionCasting;
//---------------------------------------------------------------------------
#endif
