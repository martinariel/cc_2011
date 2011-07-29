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
  object Ribbon1: TRibbon
    Left = 0
    Top = 0
    Width = 724
    Height = 143
    ActionManager = ActionManager1
    Caption = 'Casting Club Importer'
    ShowHelpButton = False
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
        Width = 113
        Height = 86
        ActionManager = ActionManager1
        Caption = 'Casting'
        GroupIndex = 1
      end
      object RibbonGroup3: TRibbonGroup
        Left = 196
        Top = 3
        Width = 109
        Height = 86
        ActionManager = ActionManager1
        Caption = 'Utilidades'
        GroupIndex = 2
      end
    end
  end
  object ActionList1: TActionList
    Images = ImageList1
    Left = 320
    Top = 320
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
    object acProcesarImagenes: TAction
      Caption = 'Procesar Im'#225'genes'
      OnExecute = acProcesarImagenesExecute
    end
    object accImportarCastingIndividual: TAction
      Caption = 'Importar archivo'
      OnExecute = accImportarCastingIndividualExecute
    end
  end
  object ImageList1: TImageList
    Left = 472
    Top = 320
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
            Caption = '2 - I&mportar'
          end
          item
            Action = accImportarCastingIndividual
            Caption = '&3 - Importar archivo'
          end>
        ActionBar = RibbonGroup2
      end
      item
        Items = <
          item
            Action = AccSinonimos
            Caption = '&Sin'#243'nimos'
          end
          item
            Action = acProcesarImagenes
            Caption = '&Procesar Im'#225'genes'
          end>
        ActionBar = RibbonGroup3
      end>
    LinkedActionLists = <
      item
        ActionList = ActionList1
        Caption = 'ActionList1'
      end>
    Left = 552
    Top = 320
    StyleName = 'Ribbon - Obsidian'
    object AccSinonimos: TAction
      Caption = 'Sin'#243'nimos'
      OnExecute = AccSinonimosExecute
    end
  end
  object opendialog: TOpenDialog
    Left = 400
    Top = 320
  end
end
