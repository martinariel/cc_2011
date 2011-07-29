object FrmSeleccionCasting: TFrmSeleccionCasting
  Left = 0
  Top = 0
  BorderStyle = bsDialog
  Caption = 'Seleccione el casting ...'
  ClientHeight = 150
  ClientWidth = 535
  Color = clBtnFace
  Font.Charset = DEFAULT_CHARSET
  Font.Color = clWindowText
  Font.Height = -11
  Font.Name = 'Tahoma'
  Font.Style = []
  OldCreateOrder = False
  Position = poDesktopCenter
  OnCreate = FormCreate
  PixelsPerInch = 96
  TextHeight = 13
  object Label1: TLabel
    Left = 40
    Top = 25
    Width = 23
    Height = 13
    Caption = 'A'#241'o:'
  end
  object Label2: TLabel
    Left = 16
    Top = 52
    Width = 47
    Height = 13
    Caption = 'Proyecto:'
  end
  object Label3: TLabel
    Left = 23
    Top = 79
    Width = 40
    Height = 13
    Caption = 'Archivo:'
  end
  object Button1: TButton
    Left = 371
    Top = 120
    Width = 75
    Height = 25
    Caption = 'Aceptar'
    ModalResult = 1
    TabOrder = 0
  end
  object Button2: TButton
    Left = 452
    Top = 120
    Width = 75
    Height = 25
    Caption = 'Cancelar'
    ModalResult = 2
    TabOrder = 1
  end
  object cmbAnio: TComboBox
    Left = 69
    Top = 22
    Width = 145
    Height = 21
    TabOrder = 2
  end
  object edProyecto: TEdit
    Left = 69
    Top = 49
    Width = 458
    Height = 21
    TabOrder = 3
  end
  object edArchivo: TEdit
    Left = 69
    Top = 76
    Width = 429
    Height = 21
    ReadOnly = True
    TabOrder = 4
  end
  object Button3: TButton
    Left = 504
    Top = 74
    Width = 23
    Height = 25
    Caption = '...'
    TabOrder = 5
    OnClick = Button3Click
  end
  object OD: TOpenDialog
    Filter = 'Archivos Excel|*.xls'
    Left = 80
    Top = 112
  end
end
