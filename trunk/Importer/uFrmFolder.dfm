object FrmFolder: TFrmFolder
  Left = 0
  Top = 0
  BorderStyle = bsDialog
  Caption = 'Seleccione el directorio ...'
  ClientHeight = 361
  ClientWidth = 317
  Color = clBtnFace
  Font.Charset = DEFAULT_CHARSET
  Font.Color = clWindowText
  Font.Height = -11
  Font.Name = 'Tahoma'
  Font.Style = []
  OldCreateOrder = False
  Position = poDesktopCenter
  PixelsPerInch = 96
  TextHeight = 13
  object DirectoryListBox1: TDirectoryListBox
    Left = 8
    Top = 33
    Width = 301
    Height = 293
    TabOrder = 0
  end
  object Aceptar: TButton
    Left = 153
    Top = 332
    Width = 75
    Height = 25
    Caption = 'Aceptar'
    ModalResult = 1
    TabOrder = 1
  end
  object Button1: TButton
    Left = 234
    Top = 332
    Width = 75
    Height = 25
    Caption = 'Cancelar'
    ModalResult = 2
    TabOrder = 2
  end
  object DriveComboBox1: TDriveComboBox
    Left = 8
    Top = 8
    Width = 301
    Height = 19
    DirList = DirectoryListBox1
    TabOrder = 3
  end
end
