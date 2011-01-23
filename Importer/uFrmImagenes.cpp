//---------------------------------------------------------------------------

#include <vcl.h>
#pragma hdrstop

#include "uFrmImagenes.h"
//---------------------------------------------------------------------------
#pragma package(smart_init)
#pragma resource "*.dfm"
TFrmImagenes *FrmImagenes;
//---------------------------------------------------------------------------
__fastcall TFrmImagenes::TFrmImagenes(TComponent* Owner)
	: TForm(Owner)
{
}
//---------------------------------------------------------------------------
void __fastcall TFrmImagenes::Button1Click(TObject *Sender)
{
	if ( FrmFolder->ShowModal() == mrOk )
	{
		edDirectorio->Text = FrmFolder->DirectoryListBox1->Directory;
	}

}

//---------------------------------------------------------------------------

void TFrmImagenes::getFolders ( list<AnsiString>* result , const AnsiString& root )
{
	TSearchRec sr;

	if ( DirectoryExists ( root ) )
		result->push_back ( root );

	if ( FindFirst ( root + "\\*.*", faDirectory, sr) == 0)
	{
		do
		{
			if ( sr.Name[1] == '.')
				continue;

			getFolders ( result , root + "\\" + sr.Name );

		}
		while (FindNext(sr) == 0);
	}

	FindClose ( sr );
}

//---------------------------------------------------------------------------

wchar_t* toWChar (const AnsiString& Str)
{
  wchar_t* str = new wchar_t[Str.WideCharBufSize()];
  return Str.WideChar(str, Str.WideCharBufSize());
  delete str;
}

//---------------------------------------------------------------------------
void __fastcall TFrmImagenes::btnProcesarClick(TObject *Sender)
{
	if ( !edDirectorio->Text.IsEmpty() && DirectoryExists( edDirectorio->Text ) )
	{
		list<AnsiString>* dirs = new list<AnsiString>();

		getFolders ( dirs , edDirectorio->Text );

		ProgressBar1->Min = 0;
		ProgressBar1->Max = dirs->size();

		AnsiString comando = "-resize " + edAncho->Text + "x" + edAlto->Text + " *.jpg";
		AnsiString opcion  = "open";
		AnsiString programa =  "mogrify";

		for ( list<AnsiString>::const_iterator it = dirs->begin() ; it != dirs->end() ; ++it )
		{
			AnsiString t = *it;
			ProgressBar1->StepIt();

			SHELLEXECUTEINFO ShExecInfo;

			ShExecInfo.cbSize = sizeof(SHELLEXECUTEINFO);
			ShExecInfo.fMask = SEE_MASK_NOCLOSEPROCESS;
			ShExecInfo.hwnd = Handle;
			ShExecInfo.lpVerb = toWChar ( opcion );
			ShExecInfo.lpFile = toWChar( programa );
			ShExecInfo.lpParameters = toWChar ( comando );
			ShExecInfo.lpDirectory = toWChar ( t );
			ShExecInfo.nShow = SW_HIDE;
			ShExecInfo.hInstApp = NULL;

			ShellExecuteEx(&ShExecInfo);
			WaitForSingleObject(ShExecInfo.hProcess,INFINITE);

			Application->ProcessMessages();
		}

		delete dirs;
	}
}
//---------------------------------------------------------------------------
void __fastcall TFrmImagenes::FormShow(TObject *Sender)
{
	ProgressBar1->Position = 0;
}
//---------------------------------------------------------------------------
