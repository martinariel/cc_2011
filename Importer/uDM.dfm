object DM: TDM
  OldCreateOrder = False
  OnDestroy = DataModuleDestroy
  Height = 234
  Width = 591
  object DWConnection: TADOConnection
    Connected = True
    ConnectionString = 
      'Provider=MSDASQL.1;Persist Security Info=False;User ID=root;Data' +
      ' Source=cc;Initial Catalog=webapp;'
    LoginPrompt = False
    Left = 40
    Top = 24
  end
  object XLSConnection: TADOConnection
    LoginPrompt = False
    Left = 128
    Top = 24
  end
  object XLSQuery: TADOQuery
    Connection = XLSConnection
    Parameters = <>
    Left = 216
    Top = 24
  end
  object FTP: TIdFTP
    IPVersion = Id_IPv4
    ProxySettings.ProxyType = fpcmNone
    ProxySettings.Port = 0
    Left = 296
    Top = 24
  end
  object tSinonimos: TADOTable
    Connection = DWConnection
    CursorType = ctStatic
    TableName = 'sinonimos'
    Left = 48
    Top = 104
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
    Left = 144
    Top = 112
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
  object HTTP: TIdHTTP
    AllowCookies = True
    ProxyParams.BasicAuthentication = False
    ProxyParams.ProxyPort = 0
    Request.ContentLength = -1
    Request.ContentRangeEnd = -1
    Request.ContentRangeStart = -1
    Request.ContentRangeInstanceLength = -1
    Request.Accept = 'text/html, */*'
    Request.BasicAuthentication = False
    Request.UserAgent = 'Mozilla/3.0 (compatible; Indy Library)'
    Request.Ranges.Units = 'bytes'
    Request.Ranges = <>
    HTTPOptions = [hoForceEncodeParams]
    Left = 456
    Top = 40
  end
  object tCastImport: TADOTable
    Connection = DWConnection
    CursorType = ctStatic
    TableName = 'cast_import'
    Left = 368
    Top = 24
    object tCastImportCODIGO: TIntegerField
      FieldName = 'CODIGO'
    end
    object tCastImportNOMBRE: TStringField
      FieldName = 'NOMBRE'
      Size = 100
    end
    object tCastImportAGENCIA: TStringField
      FieldName = 'AGENCIA'
      Size = 45
    end
    object tCastImportPANTALON: TStringField
      FieldName = 'PANTALON'
      Size = 45
    end
    object tCastImportCAMISA: TStringField
      FieldName = 'CAMISA'
      Size = 45
    end
    object tCastImportCALZADO: TIntegerField
      FieldName = 'CALZADO'
    end
    object tCastImportALTURA: TIntegerField
      FieldName = 'ALTURA'
    end
    object tCastImportPESO: TIntegerField
      FieldName = 'PESO'
    end
    object tCastImportFECHA_NACIMIENTO: TStringField
      FieldName = 'FECHA_NACIMIENTO'
      Size = 45
    end
    object tCastImportFECHA_CASTING: TStringField
      FieldName = 'FECHA_CASTING'
      Size = 45
    end
    object tCastImportCASTING: TStringField
      FieldName = 'CASTING'
      Size = 45
    end
    object tCastImportANIO: TIntegerField
      FieldName = 'ANIO'
    end
    object tCastImportMEDIDAS: TStringField
      FieldName = 'MEDIDAS'
      Size = 45
    end
    object tCastImportDNI: TStringField
      FieldName = 'DNI'
      Size = 45
    end
    object tCastImportOBSERVACIONES: TStringField
      FieldName = 'OBSERVACIONES'
      Size = 45
    end
    object tCastImportEDAD: TIntegerField
      FieldName = 'EDAD'
    end
    object tCastImportDIA: TStringField
      FieldName = 'DIA'
      Size = 45
    end
  end
end
