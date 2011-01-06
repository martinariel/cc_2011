object DM: TDM
  OldCreateOrder = False
  OnCreate = DataModuleCreate
  OnDestroy = DataModuleDestroy
  Height = 497
  Width = 733
  object DWConnection: TADOConnection
    ConnectionString = 
      'FILE NAME=C:\Users\mfernandez\Documents\CC1\CC\Importer\CCImport' +
      'er.udl'
    LoginPrompt = False
    Provider = 'C:\Users\mfernandez\Documents\CC1\CC\Importer\CCImporter.udl'
    Left = 48
    Top = 56
  end
  object XLSConnection: TADOConnection
    LoginPrompt = False
    Left = 168
    Top = 56
  end
  object XLSQuery: TADOQuery
    Connection = XLSConnection
    Parameters = <>
    Left = 264
    Top = 64
  end
end
