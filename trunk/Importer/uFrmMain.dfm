object FormMain: TFormMain
  Left = 0
  Top = 0
  Caption = 'Casting Club Importer'
  ClientHeight = 433
  ClientWidth = 724
  Color = clBtnFace
  Font.Charset = DEFAULT_CHARSET
  Font.Color = clWindowText
  Font.Height = -11
  Font.Name = 'Tahoma'
  Font.Style = []
  OldCreateOrder = False
  OnCreate = FormCreate
  PixelsPerInch = 96
  TextHeight = 13
  object Ribbon1: TRibbon
    Left = 0
    Top = 0
    Width = 724
    Height = 143
    ActionManager = ActionManager1
    Caption = 'Casting Club Importer'
    Tabs = <
      item
        Caption = 'Importaci'#243'n'
        Page = RibbonPage1
      end>
    DesignSize = (
      724
      143)
    StyleName = 'Ribbon - Obsidian'
    object RibbonPage1: TRibbonPage
      Left = 0
      Top = 50
      Width = 723
      Height = 93
      Caption = 'Importaci'#243'n'
      Index = 0
      object RibbonGroup1: TRibbonGroup
        Left = 4
        Top = 3
        Width = 75
        Height = 86
        ActionManager = ActionManager1
        Caption = 'Scouting'
        GroupIndex = 0
      end
      object RibbonGroup2: TRibbonGroup
        Left = 81
        Top = 3
        Width = 72
        Height = 86
        ActionManager = ActionManager1
        Caption = 'Casting'
        GroupIndex = 1
      end
    end
  end
  object GroupBox1: TGroupBox
    Left = 0
    Top = 143
    Width = 724
    Height = 290
    Align = alClient
    Caption = 'Estado'
    TabOrder = 1
    object mEstado: TMemo
      Left = 2
      Top = 15
      Width = 720
      Height = 273
      Align = alClient
      ReadOnly = True
      ScrollBars = ssVertical
      TabOrder = 0
    end
  end
  object ActionList1: TActionList
    Images = ImageList1
    Left = 320
    Top = 248
    object acAnalizarScout: TAction
      Caption = 'Analizar Archivos'
      OnExecute = acAnalizarScoutExecute
    end
    object acImportarArchivos: TAction
      Caption = 'Importar'
      OnExecute = acImportarArchivosExecute
    end
    object acAnalizarCasting: TAction
      Caption = 'Analizar'
      OnExecute = acAnalizarCastingExecute
    end
    object acImportarCasting: TAction
      Caption = 'Importar'
      OnExecute = acImportarCastingExecute
    end
  end
  object ImageList1: TImageList
    Left = 360
    Top = 224
  end
  object ActionManager1: TActionManager
    ActionBars = <
      item
        Items = <
          item
            Action = acAnalizarScout
            Caption = '&1 - Analizar'
          end
          item
            Action = acImportarArchivos
            Caption = '&2 - Importar'
          end>
        ActionBar = RibbonGroup1
      end
      item
        Items = <
          item
            Action = acAnalizarCasting
            Caption = '&1 - Analizar'
          end
          item
            Action = acImportarCasting
            Caption = '&2- Importar'
          end>
        ActionBar = RibbonGroup2
      end>
    LinkedActionLists = <
      item
        ActionList = ActionList1
        Caption = 'ActionList1'
      end>
    Left = 528
    Top = 264
    StyleName = 'Ribbon - Obsidian'
  end
  object opendialog: TOpenDialog
    Left = 400
    Top = 320
  end
end
