object FrmImagenes: TFrmImagenes
  Left = 0
  Top = 0
  BorderStyle = bsDialog
  Caption = 'Procesar Im'#225'genes'
  ClientHeight = 119
  ClientWidth = 443
  Color = clBtnFace
  Font.Charset = DEFAULT_CHARSET
  Font.Color = clWindowText
  Font.Height = -11
  Font.Name = 'Tahoma'
  Font.Style = []
  OldCreateOrder = False
  Position = poDesktopCenter
  OnShow = FormShow
  PixelsPerInch = 96
  TextHeight = 13
  object Label1: TLabel
    Left = 8
    Top = 13
    Width = 50
    Height = 13
    Caption = 'Directorio:'
  end
  object Label3: TLabel
    Left = 144
    Top = 48
    Width = 6
    Height = 13
    Caption = 'x'
  end
  object Label2: TLabel
    Left = 8
    Top = 48
    Width = 42
    Height = 13
    Caption = 'Tama'#241'o:'
  end
  object edDirectorio: TEdit
    Left = 64
    Top = 10
    Width = 289
    Height = 21
    ReadOnly = True
    TabOrder = 0
  end
  object Button1: TButton
    Left = 359
    Top = 8
    Width = 75
    Height = 25
    Caption = 'Seleccionar ...'
    TabOrder = 1
    OnClick = Button1Click
  end
  object edAncho: TEdit
    Left = 64
    Top = 45
    Width = 49
    Height = 21
    TabOrder = 2
    Text = '640'
  end
  object edAlto: TEdit
    Left = 168
    Top = 45
    Width = 49
    Height = 21
    TabOrder = 3
    Text = '480'
  end
  object upAncho: TUpDown
    Left = 113
    Top = 45
    Width = 16
    Height = 21
    Associate = edAncho
    Max = 10000
    Increment = 128
    Position = 640
    TabOrder = 4
    Thousands = False
  end
  object UpDown1: TUpDown
    Left = 217
    Top = 45
    Width = 16
    Height = 21
    Associate = edAlto
    Max = 10000
    Increment = 128
    Position = 480
    TabOrder = 5
    Thousands = False
  end
  object ProgressBar1: TProgressBar
    Left = 8
    Top = 86
    Width = 427
    Height = 25
    Step = 1
    TabOrder = 6
  end
  object btnProcesar: TButton
    Left = 359
    Top = 43
    Width = 75
    Height = 25
    Caption = 'Procesar'
    TabOrder = 7
    OnClick = btnProcesarClick
  end
end
