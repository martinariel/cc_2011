object FrmSinonimos: TFrmSinonimos
  Left = 0
  Top = 0
  Caption = 'Sin'#243'nimos'
  ClientHeight = 259
  ClientWidth = 440
  Color = clBtnFace
  Font.Charset = DEFAULT_CHARSET
  Font.Color = clWindowText
  Font.Height = -11
  Font.Name = 'Tahoma'
  Font.Style = []
  OldCreateOrder = False
  OnCreate = FormCreate
  OnDestroy = FormDestroy
  PixelsPerInch = 96
  TextHeight = 13
  object Panel1: TPanel
    Left = 0
    Top = 218
    Width = 440
    Height = 41
    Align = alBottom
    TabOrder = 0
    ExplicitLeft = 128
    ExplicitTop = 136
    ExplicitWidth = 185
    object Label1: TLabel
      Left = 185
      Top = 12
      Width = 40
      Height = 13
      Caption = 'Destino:'
    end
    object Label2: TLabel
      Left = 6
      Top = 12
      Width = 36
      Height = 13
      Caption = 'Origen:'
    end
    object Button2: TButton
      Left = 358
      Top = 6
      Width = 75
      Height = 25
      Caption = 'Nuevo'
      TabOrder = 0
      OnClick = Button2Click
    end
    object Edit1: TEdit
      Left = 48
      Top = 9
      Width = 121
      Height = 21
      CharCase = ecUpperCase
      TabOrder = 1
    end
    object Edit2: TEdit
      Left = 231
      Top = 9
      Width = 121
      Height = 21
      CharCase = ecUpperCase
      TabOrder = 2
    end
  end
  object DBGrid1: TDBGrid
    Left = 0
    Top = 0
    Width = 440
    Height = 218
    Align = alClient
    DataSource = DataSource1
    TabOrder = 1
    TitleFont.Charset = DEFAULT_CHARSET
    TitleFont.Color = clWindowText
    TitleFont.Height = -11
    TitleFont.Name = 'Tahoma'
    TitleFont.Style = []
    Columns = <
      item
        Expanded = False
        FieldName = 'origen'
        Title.Caption = 'Origen'
        Width = 157
        Visible = True
      end
      item
        Expanded = False
        FieldName = 'destino'
        Title.Caption = 'Destino'
        Width = 175
        Visible = True
      end>
  end
  object DataSource1: TDataSource
    DataSet = DM.tSinonimos
    Left = 216
    Top = 136
  end
end
