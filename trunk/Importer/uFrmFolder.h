//---------------------------------------------------------------------------

#ifndef uFrmFolderH
#define uFrmFolderH
//---------------------------------------------------------------------------
#include <Classes.hpp>
#include <Controls.hpp>
#include <StdCtrls.hpp>
#include <Forms.hpp>
#include <FileCtrl.hpp>
//---------------------------------------------------------------------------
class TFrmFolder : public TForm
{
__published:	// IDE-managed Components
	TDirectoryListBox *DirectoryListBox1;
	TButton *Aceptar;
	TButton *Button1;
	TDriveComboBox *DriveComboBox1;
private:	// User declarations
public:		// User declarations
	__fastcall TFrmFolder(TComponent* Owner);
};
//---------------------------------------------------------------------------
extern PACKAGE TFrmFolder *FrmFolder;
//---------------------------------------------------------------------------
#endif
