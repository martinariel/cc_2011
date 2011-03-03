object DM: TDM
  OldCreateOrder = False
  OnDestroy = DataModuleDestroy
  Height = 234
  Width = 591
  object DWConnection: TADOConnection
    ConnectionString = 
      'Provider=MSDASQL.1;Password=1234;Persist Security Info=True;User' +
      ' ID=import;Data Source=cc;Initial Catalog=cc'
    LoginPrompt = False
    Provider = 'MSDASQL.1'
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
    TableName = 'sinonimo'
    Left = 48
    Top = 104
    object tSinonimosorigen: TStringField
      FieldName = 'origen'
      Size = 50
    end
    object tSinonimosdestino: TStringField
      FieldName = 'destino'
      Size = 55
    end
    object tSinonimosid: TAutoIncField
      FieldName = 'id'
      ReadOnly = True
    end
  end
  object tScoutImport: TADOTable
    Connection = DWConnection
    CursorType = ctStatic
    TableName = 'scout_import'
    Left = 144
    Top = 112
    object tScoutImportid: TAutoIncField
      FieldName = 'id'
      ReadOnly = True
    end
    object tScoutImportcodigo: TIntegerField
      FieldName = 'codigo'
    end
    object tScoutImportedad: TIntegerField
      FieldName = 'edad'
    end
    object tScoutImportpeso: TIntegerField
      FieldName = 'peso'
    end
    object tScoutImportaltura: TIntegerField
      FieldName = 'altura'
    end
    object tScoutImportnombre: TStringField
      FieldName = 'nombre'
      Size = 100
    end
    object tScoutImportfecha_nacimiento: TStringField
      FieldName = 'fecha_nacimiento'
      Size = 12
    end
    object tScoutImportfecha_scout: TStringField
      FieldName = 'fecha_scout'
      Size = 12
    end
    object tScoutImportlugar_scout: TStringField
      FieldName = 'lugar_scout'
      Size = 45
    end
    object tScoutImportobservaciones: TStringField
      FieldName = 'observaciones'
      Size = 255
    end
    object tScoutImportactividades: TStringField
      FieldName = 'actividades'
      Size = 255
    end
    object tScoutImportemail: TStringField
      FieldName = 'email'
      Size = 100
    end
    object tScoutImporttelefono: TStringField
      FieldName = 'telefono'
      Size = 45
    end
    object tScoutImportcelular: TStringField
      FieldName = 'celular'
      Size = 45
    end
    object tScoutImportnacionalidad: TStringField
      FieldName = 'nacionalidad'
      Size = 45
    end
    object tScoutImportidiomas: TStringField
      FieldName = 'idiomas'
      Size = 255
    end
    object tScoutImportxls_file: TStringField
      FieldName = 'xls_file'
      Size = 255
    end
    object tScoutImportanio: TIntegerField
      FieldName = 'anio'
    end
    object tScoutImportmes: TStringField
      FieldName = 'mes'
    end
    object tScoutImportcodigo_agrupador: TStringField
      FieldName = 'codigo_agrupador'
      Size = 45
    end
    object tScoutImportdia: TStringField
      FieldName = 'dia'
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
    ConnectionString = 
      'Provider=MSDASQL.1;Persist Security Info=False;User ID=root;Data' +
      ' Source=cc;Initial Catalog=webapp'
    CursorType = ctStatic
    TableName = 'cast_import'
    Left = 368
    Top = 24
    object tCastImportcodigo: TIntegerField
      FieldName = 'codigo'
    end
    object tCastImportnombre: TStringField
      FieldName = 'nombre'
      Size = 100
    end
    object tCastImportagencia: TStringField
      FieldName = 'agencia'
      Size = 45
    end
    object tCastImportpantalon: TStringField
      FieldName = 'pantalon'
      Size = 45
    end
    object tCastImportcamisa: TStringField
      FieldName = 'camisa'
      Size = 45
    end
    object tCastImportcalzado: TIntegerField
      FieldName = 'calzado'
    end
    object tCastImportaltura: TIntegerField
      FieldName = 'altura'
    end
    object tCastImportpeso: TIntegerField
      FieldName = 'peso'
    end
    object tCastImportfecha_nacimiento: TStringField
      FieldName = 'fecha_nacimiento'
      Size = 45
    end
    object tCastImportfecha_casting: TStringField
      FieldName = 'fecha_casting'
      Size = 45
    end
    object tCastImportcasting: TStringField
      FieldName = 'casting'
      Size = 45
    end
    object tCastImportanio: TIntegerField
      FieldName = 'anio'
    end
    object tCastImportmedidas: TStringField
      FieldName = 'medidas'
      Size = 45
    end
    object tCastImportdni: TStringField
      FieldName = 'dni'
      Size = 45
    end
    object tCastImportobservaciones: TMemoField
      FieldName = 'observaciones'
      BlobType = ftMemo
    end
    object tCastImportedad: TIntegerField
      FieldName = 'edad'
    end
    object tCastImportdia: TStringField
      FieldName = 'dia'
      Size = 45
    end
    object tCastImporttelefono: TStringField
      FieldName = 'telefono'
      Size = 45
    end
    object tCastImportcelular: TStringField
      FieldName = 'celular'
      Size = 45
    end
    object tCastImportemail: TStringField
      FieldName = 'email'
      Size = 45
    end
  end
end
