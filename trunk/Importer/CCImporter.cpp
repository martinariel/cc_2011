//---------------------------------------------------------------------------

#include <vcl.h>
#pragma hdrstop
#include <tchar.h>
//---------------------------------------------------------------------------
USEFORM("uFrmFolder.cpp", FrmFolder);
USEFORM("uDM.cpp", DM); /* TDataModule: File Type */
USEFORM("uFrmMain.cpp", FormMain);
USEFORM("uFrmImagenes.cpp", FrmImagenes);
USEFORM("uFrmSinonimos.cpp", FrmSinonimos);
//---------------------------------------------------------------------------
WINAPI _tWinMain(HINSTANCE, HINSTANCE, LPTSTR, int)
{
	try
	{
		Application->Initialize();
		Application->MainFormOnTaskBar = true;
		Application->CreateForm(__classid(TDM), &DM);
		Application->CreateForm(__classid(TFormMain), &FormMain);
		Application->CreateForm(__classid(TFrmFolder), &FrmFolder);
		Application->CreateForm(__classid(TFrmImagenes), &FrmImagenes);
		Application->CreateForm(__classid(TFrmSinonimos), &FrmSinonimos);
		Application->Run();
	}
	catch (Exception &exception)
	{
		Application->ShowException(&exception);
	}
	catch (...)
	{
		try
		{
			throw Exception("");
		}
		catch (Exception &exception)
		{
			Application->ShowException(&exception);
		}
	}
	return 0;
}
//---------------------------------------------------------------------------
