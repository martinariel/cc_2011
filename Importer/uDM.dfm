object DM: TDM
  OldCreateOrder = False
  OnCreate = DataModuleCreate
  OnDestroy = DataModuleDestroy
  Height = 497
  Width = 733
  object DWConnection: TADOConnection
    ConnectionString = 
      'FILE NAME=C:\Users\mfernandez\Documents\CC1\CC\Importer\CCImport' +
      'er.udl;'
    LoginPrompt = False
    Provider = 'MSDASQL.1'
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
    Left = 272
    Top = 56
  end
  object FTP: TIdFTP
    IPVersion = Id_IPv4
    ProxySettings.ProxyType = fpcmNone
    ProxySettings.Port = 0
    Left = 360
    Top = 56
  end
  object tSinonimos: TADOTable
    Connection = DWConnection
    CursorType = ctStatic
    TableName = 'sinonimos'
    Left = 48
    Top = 152
    object tSinonimosORIGEN: TStringField
      FieldName = 'ORIGEN'
      Size = 50
    end
    object tSinonimosDESTINO: TStringField
      FieldName = 'DESTINO'
      Size = 50
    end
  end
  object tScoutImport: TADOTable
    Connection = DWConnection
    CursorType = ctStatic
    TableName = 'scout_import'
    Left = 160
    Top = 160
    object tScoutImportID: TAutoIncField
      FieldName = 'ID'
      ReadOnly = True
    end
    object tScoutImportCODIGO: TIntegerField
      FieldName = 'CODIGO'
    end
    object tScoutImportEDAD: TIntegerField
      FieldName = 'EDAD'
    end
    object tScoutImportPESO: TIntegerField
      FieldName = 'PESO'
    end
    object tScoutImportALTURA: TIntegerField
      FieldName = 'ALTURA'
    end
    object tScoutImportNOMBRE: TStringField
      FieldName = 'NOMBRE'
      Size = 100
    end
    object tScoutImportFECHA_NACIMIENTO: TStringField
      FieldName = 'FECHA_NACIMIENTO'
      Size = 12
    end
    object tScoutImportFECHA_SCOUT: TStringField
      FieldName = 'FECHA_SCOUT'
      Size = 12
    end
    object tScoutImportLUGAR_SCOUT: TStringField
      FieldName = 'LUGAR_SCOUT'
      Size = 45
    end
    object tScoutImportOBSERVACIONES: TStringField
      FieldName = 'OBSERVACIONES'
      Size = 255
    end
    object tScoutImportACTIVIDADES: TStringField
      FieldName = 'ACTIVIDADES'
      Size = 255
    end
    object tScoutImportEMAIL: TStringField
      FieldName = 'EMAIL'
      Size = 100
    end
    object tScoutImportTELEFONO: TStringField
      FieldName = 'TELEFONO'
      Size = 45
    end
    object tScoutImportCELULAR: TStringField
      FieldName = 'CELULAR'
      Size = 45
    end
    object tScoutImportNACIONALIDAD: TStringField
      FieldName = 'NACIONALIDAD'
      Size = 45
    end
    object tScoutImportIDIOMAS: TStringField
      FieldName = 'IDIOMAS'
      Size = 255
    end
    object tScoutImportXLS_FILE: TStringField
      FieldName = 'XLS_FILE'
      Size = 255
    end
    object tScoutImportANIO: TIntegerField
      FieldName = 'ANIO'
    end
    object tScoutImportMES: TStringField
      FieldName = 'MES'
    end
    object tScoutImportCODIGO_AGRUPADOR: TStringField
      FieldName = 'CODIGO_AGRUPADOR'
      Size = 45
    end
    object tScoutImportDIA: TStringField
      FieldName = 'DIA'
      Size = 45
    end
  end
end
