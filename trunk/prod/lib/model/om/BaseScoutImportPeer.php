<?php


/**
 * Base static class for performing query and update operations on the 'scout_import' table.
 *
 * 
 *
 * This class was autogenerated by Propel 1.5.6 on:
 *
 * Fri Mar  4 00:48:22 2011
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseScoutImportPeer {

	/** the default database name for this class */
	const DATABASE_NAME = 'propel';

	/** the table name for this class */
	const TABLE_NAME = 'scout_import';

	/** the related Propel class for this table */
	const OM_CLASS = 'ScoutImport';

	/** A class that can be returned by this peer. */
	const CLASS_DEFAULT = 'lib.model.ScoutImport';

	/** the related TableMap class for this table */
	const TM_CLASS = 'ScoutImportTableMap';
	
	/** The total number of columns. */
	const NUM_COLUMNS = 21;

	/** The number of lazy-loaded columns. */
	const NUM_LAZY_LOAD_COLUMNS = 0;

	/** the column name for the ID field */
	const ID = 'scout_import.ID';

	/** the column name for the CODIGO field */
	const CODIGO = 'scout_import.CODIGO';

	/** the column name for the EDAD field */
	const EDAD = 'scout_import.EDAD';

	/** the column name for the PESO field */
	const PESO = 'scout_import.PESO';

	/** the column name for the ALTURA field */
	const ALTURA = 'scout_import.ALTURA';

	/** the column name for the NOMBRE field */
	const NOMBRE = 'scout_import.NOMBRE';

	/** the column name for the FECHA_NACIMIENTO field */
	const FECHA_NACIMIENTO = 'scout_import.FECHA_NACIMIENTO';

	/** the column name for the FECHA_SCOUT field */
	const FECHA_SCOUT = 'scout_import.FECHA_SCOUT';

	/** the column name for the LUGAR_SCOUT field */
	const LUGAR_SCOUT = 'scout_import.LUGAR_SCOUT';

	/** the column name for the OBSERVACIONES field */
	const OBSERVACIONES = 'scout_import.OBSERVACIONES';

	/** the column name for the ACTIVIDADES field */
	const ACTIVIDADES = 'scout_import.ACTIVIDADES';

	/** the column name for the EMAIL field */
	const EMAIL = 'scout_import.EMAIL';

	/** the column name for the TELEFONO field */
	const TELEFONO = 'scout_import.TELEFONO';

	/** the column name for the CELULAR field */
	const CELULAR = 'scout_import.CELULAR';

	/** the column name for the NACIONALIDAD field */
	const NACIONALIDAD = 'scout_import.NACIONALIDAD';

	/** the column name for the IDIOMAS field */
	const IDIOMAS = 'scout_import.IDIOMAS';

	/** the column name for the XLS_FILE field */
	const XLS_FILE = 'scout_import.XLS_FILE';

	/** the column name for the ANIO field */
	const ANIO = 'scout_import.ANIO';

	/** the column name for the MES field */
	const MES = 'scout_import.MES';

	/** the column name for the CODIGO_AGRUPADOR field */
	const CODIGO_AGRUPADOR = 'scout_import.CODIGO_AGRUPADOR';

	/** the column name for the DIA field */
	const DIA = 'scout_import.DIA';

	/**
	 * An identiy map to hold any loaded instances of ScoutImport objects.
	 * This must be public so that other peer classes can access this when hydrating from JOIN
	 * queries.
	 * @var        array ScoutImport[]
	 */
	public static $instances = array();


	// symfony behavior
	
	/**
	 * Indicates whether the current model includes I18N.
	 */
	const IS_I18N = false;

	/**
	 * holds an array of fieldnames
	 *
	 * first dimension keys are the type constants
	 * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
	 */
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'Codigo', 'Edad', 'Peso', 'Altura', 'Nombre', 'FechaNacimiento', 'FechaScout', 'LugarScout', 'Observaciones', 'Actividades', 'Email', 'Telefono', 'Celular', 'Nacionalidad', 'Idiomas', 'XlsFile', 'Anio', 'Mes', 'CodigoAgrupador', 'Dia', ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('id', 'codigo', 'edad', 'peso', 'altura', 'nombre', 'fechaNacimiento', 'fechaScout', 'lugarScout', 'observaciones', 'actividades', 'email', 'telefono', 'celular', 'nacionalidad', 'idiomas', 'xlsFile', 'anio', 'mes', 'codigoAgrupador', 'dia', ),
		BasePeer::TYPE_COLNAME => array (self::ID, self::CODIGO, self::EDAD, self::PESO, self::ALTURA, self::NOMBRE, self::FECHA_NACIMIENTO, self::FECHA_SCOUT, self::LUGAR_SCOUT, self::OBSERVACIONES, self::ACTIVIDADES, self::EMAIL, self::TELEFONO, self::CELULAR, self::NACIONALIDAD, self::IDIOMAS, self::XLS_FILE, self::ANIO, self::MES, self::CODIGO_AGRUPADOR, self::DIA, ),
		BasePeer::TYPE_RAW_COLNAME => array ('ID', 'CODIGO', 'EDAD', 'PESO', 'ALTURA', 'NOMBRE', 'FECHA_NACIMIENTO', 'FECHA_SCOUT', 'LUGAR_SCOUT', 'OBSERVACIONES', 'ACTIVIDADES', 'EMAIL', 'TELEFONO', 'CELULAR', 'NACIONALIDAD', 'IDIOMAS', 'XLS_FILE', 'ANIO', 'MES', 'CODIGO_AGRUPADOR', 'DIA', ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'codigo', 'edad', 'peso', 'altura', 'nombre', 'fecha_nacimiento', 'fecha_scout', 'lugar_scout', 'observaciones', 'actividades', 'email', 'telefono', 'celular', 'nacionalidad', 'idiomas', 'xls_file', 'anio', 'mes', 'codigo_agrupador', 'dia', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, )
	);

	/**
	 * holds an array of keys for quick access to the fieldnames array
	 *
	 * first dimension keys are the type constants
	 * e.g. self::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
	 */
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Codigo' => 1, 'Edad' => 2, 'Peso' => 3, 'Altura' => 4, 'Nombre' => 5, 'FechaNacimiento' => 6, 'FechaScout' => 7, 'LugarScout' => 8, 'Observaciones' => 9, 'Actividades' => 10, 'Email' => 11, 'Telefono' => 12, 'Celular' => 13, 'Nacionalidad' => 14, 'Idiomas' => 15, 'XlsFile' => 16, 'Anio' => 17, 'Mes' => 18, 'CodigoAgrupador' => 19, 'Dia' => 20, ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('id' => 0, 'codigo' => 1, 'edad' => 2, 'peso' => 3, 'altura' => 4, 'nombre' => 5, 'fechaNacimiento' => 6, 'fechaScout' => 7, 'lugarScout' => 8, 'observaciones' => 9, 'actividades' => 10, 'email' => 11, 'telefono' => 12, 'celular' => 13, 'nacionalidad' => 14, 'idiomas' => 15, 'xlsFile' => 16, 'anio' => 17, 'mes' => 18, 'codigoAgrupador' => 19, 'dia' => 20, ),
		BasePeer::TYPE_COLNAME => array (self::ID => 0, self::CODIGO => 1, self::EDAD => 2, self::PESO => 3, self::ALTURA => 4, self::NOMBRE => 5, self::FECHA_NACIMIENTO => 6, self::FECHA_SCOUT => 7, self::LUGAR_SCOUT => 8, self::OBSERVACIONES => 9, self::ACTIVIDADES => 10, self::EMAIL => 11, self::TELEFONO => 12, self::CELULAR => 13, self::NACIONALIDAD => 14, self::IDIOMAS => 15, self::XLS_FILE => 16, self::ANIO => 17, self::MES => 18, self::CODIGO_AGRUPADOR => 19, self::DIA => 20, ),
		BasePeer::TYPE_RAW_COLNAME => array ('ID' => 0, 'CODIGO' => 1, 'EDAD' => 2, 'PESO' => 3, 'ALTURA' => 4, 'NOMBRE' => 5, 'FECHA_NACIMIENTO' => 6, 'FECHA_SCOUT' => 7, 'LUGAR_SCOUT' => 8, 'OBSERVACIONES' => 9, 'ACTIVIDADES' => 10, 'EMAIL' => 11, 'TELEFONO' => 12, 'CELULAR' => 13, 'NACIONALIDAD' => 14, 'IDIOMAS' => 15, 'XLS_FILE' => 16, 'ANIO' => 17, 'MES' => 18, 'CODIGO_AGRUPADOR' => 19, 'DIA' => 20, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'codigo' => 1, 'edad' => 2, 'peso' => 3, 'altura' => 4, 'nombre' => 5, 'fecha_nacimiento' => 6, 'fecha_scout' => 7, 'lugar_scout' => 8, 'observaciones' => 9, 'actividades' => 10, 'email' => 11, 'telefono' => 12, 'celular' => 13, 'nacionalidad' => 14, 'idiomas' => 15, 'xls_file' => 16, 'anio' => 17, 'mes' => 18, 'codigo_agrupador' => 19, 'dia' => 20, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, )
	);

	/**
	 * Translates a fieldname to another type
	 *
	 * @param      string $name field name
	 * @param      string $fromType One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
	 *                         BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
	 * @param      string $toType   One of the class type constants
	 * @return     string translated name of the field.
	 * @throws     PropelException - if the specified name could not be found in the fieldname mappings.
	 */
	static public function translateFieldName($name, $fromType, $toType)
	{
		$toNames = self::getFieldNames($toType);
		$key = isset(self::$fieldKeys[$fromType][$name]) ? self::$fieldKeys[$fromType][$name] : null;
		if ($key === null) {
			throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(self::$fieldKeys[$fromType], true));
		}
		return $toNames[$key];
	}

	/**
	 * Returns an array of field names.
	 *
	 * @param      string $type The type of fieldnames to return:
	 *                      One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
	 *                      BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
	 * @return     array A list of field names
	 */

	static public function getFieldNames($type = BasePeer::TYPE_PHPNAME)
	{
		if (!array_key_exists($type, self::$fieldNames)) {
			throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
		}
		return self::$fieldNames[$type];
	}

	/**
	 * Convenience method which changes table.column to alias.column.
	 *
	 * Using this method you can maintain SQL abstraction while using column aliases.
	 * <code>
	 *		$c->addAlias("alias1", TablePeer::TABLE_NAME);
	 *		$c->addJoin(TablePeer::alias("alias1", TablePeer::PRIMARY_KEY_COLUMN), TablePeer::PRIMARY_KEY_COLUMN);
	 * </code>
	 * @param      string $alias The alias for the current table.
	 * @param      string $column The column name for current table. (i.e. ScoutImportPeer::COLUMN_NAME).
	 * @return     string
	 */
	public static function alias($alias, $column)
	{
		return str_replace(ScoutImportPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	/**
	 * Add all the columns needed to create a new object.
	 *
	 * Note: any columns that were marked with lazyLoad="true" in the
	 * XML schema will not be added to the select list and only loaded
	 * on demand.
	 *
	 * @param      Criteria $criteria object containing the columns to add.
	 * @param      string   $alias    optional table alias
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function addSelectColumns(Criteria $criteria, $alias = null)
	{
		if (null === $alias) {
			$criteria->addSelectColumn(ScoutImportPeer::ID);
			$criteria->addSelectColumn(ScoutImportPeer::CODIGO);
			$criteria->addSelectColumn(ScoutImportPeer::EDAD);
			$criteria->addSelectColumn(ScoutImportPeer::PESO);
			$criteria->addSelectColumn(ScoutImportPeer::ALTURA);
			$criteria->addSelectColumn(ScoutImportPeer::NOMBRE);
			$criteria->addSelectColumn(ScoutImportPeer::FECHA_NACIMIENTO);
			$criteria->addSelectColumn(ScoutImportPeer::FECHA_SCOUT);
			$criteria->addSelectColumn(ScoutImportPeer::LUGAR_SCOUT);
			$criteria->addSelectColumn(ScoutImportPeer::OBSERVACIONES);
			$criteria->addSelectColumn(ScoutImportPeer::ACTIVIDADES);
			$criteria->addSelectColumn(ScoutImportPeer::EMAIL);
			$criteria->addSelectColumn(ScoutImportPeer::TELEFONO);
			$criteria->addSelectColumn(ScoutImportPeer::CELULAR);
			$criteria->addSelectColumn(ScoutImportPeer::NACIONALIDAD);
			$criteria->addSelectColumn(ScoutImportPeer::IDIOMAS);
			$criteria->addSelectColumn(ScoutImportPeer::XLS_FILE);
			$criteria->addSelectColumn(ScoutImportPeer::ANIO);
			$criteria->addSelectColumn(ScoutImportPeer::MES);
			$criteria->addSelectColumn(ScoutImportPeer::CODIGO_AGRUPADOR);
			$criteria->addSelectColumn(ScoutImportPeer::DIA);
		} else {
			$criteria->addSelectColumn($alias . '.ID');
			$criteria->addSelectColumn($alias . '.CODIGO');
			$criteria->addSelectColumn($alias . '.EDAD');
			$criteria->addSelectColumn($alias . '.PESO');
			$criteria->addSelectColumn($alias . '.ALTURA');
			$criteria->addSelectColumn($alias . '.NOMBRE');
			$criteria->addSelectColumn($alias . '.FECHA_NACIMIENTO');
			$criteria->addSelectColumn($alias . '.FECHA_SCOUT');
			$criteria->addSelectColumn($alias . '.LUGAR_SCOUT');
			$criteria->addSelectColumn($alias . '.OBSERVACIONES');
			$criteria->addSelectColumn($alias . '.ACTIVIDADES');
			$criteria->addSelectColumn($alias . '.EMAIL');
			$criteria->addSelectColumn($alias . '.TELEFONO');
			$criteria->addSelectColumn($alias . '.CELULAR');
			$criteria->addSelectColumn($alias . '.NACIONALIDAD');
			$criteria->addSelectColumn($alias . '.IDIOMAS');
			$criteria->addSelectColumn($alias . '.XLS_FILE');
			$criteria->addSelectColumn($alias . '.ANIO');
			$criteria->addSelectColumn($alias . '.MES');
			$criteria->addSelectColumn($alias . '.CODIGO_AGRUPADOR');
			$criteria->addSelectColumn($alias . '.DIA');
		}
	}

	/**
	 * Returns the number of rows matching criteria.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @return     int Number of matching rows.
	 */
	public static function doCount(Criteria $criteria, $distinct = false, PropelPDO $con = null)
	{
		// we may modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(ScoutImportPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			ScoutImportPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
		$criteria->setDbName(self::DATABASE_NAME); // Set the correct dbName

		if ($con === null) {
			$con = Propel::getConnection(ScoutImportPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
		// symfony_behaviors behavior
		foreach (sfMixer::getCallables(self::getMixerPreSelectHook(__FUNCTION__)) as $sf_hook)
		{
		  call_user_func($sf_hook, 'BaseScoutImportPeer', $criteria, $con);
		}

		// BasePeer returns a PDOStatement
		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; // no rows returned; we infer that means 0 matches.
		}
		$stmt->closeCursor();
		return $count;
	}
	/**
	 * Method to select one object from the DB.
	 *
	 * @param      Criteria $criteria object used to create the SELECT statement.
	 * @param      PropelPDO $con
	 * @return     ScoutImport
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
	{
		$critcopy = clone $criteria;
		$critcopy->setLimit(1);
		$objects = ScoutImportPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	/**
	 * Method to do selects.
	 *
	 * @param      Criteria $criteria The Criteria object used to build the SELECT statement.
	 * @param      PropelPDO $con
	 * @return     array Array of selected Objects
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelect(Criteria $criteria, PropelPDO $con = null)
	{
		return ScoutImportPeer::populateObjects(ScoutImportPeer::doSelectStmt($criteria, $con));
	}
	/**
	 * Prepares the Criteria object and uses the parent doSelect() method to execute a PDOStatement.
	 *
	 * Use this method directly if you want to work with an executed statement durirectly (for example
	 * to perform your own object hydration).
	 *
	 * @param      Criteria $criteria The Criteria object used to build the SELECT statement.
	 * @param      PropelPDO $con The connection to use
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 * @return     PDOStatement The executed PDOStatement object.
	 * @see        BasePeer::doSelect()
	 */
	public static function doSelectStmt(Criteria $criteria, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(ScoutImportPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		if (!$criteria->hasSelectClause()) {
			$criteria = clone $criteria;
			ScoutImportPeer::addSelectColumns($criteria);
		}

		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);
		// symfony_behaviors behavior
		foreach (sfMixer::getCallables(self::getMixerPreSelectHook(__FUNCTION__)) as $sf_hook)
		{
		  call_user_func($sf_hook, 'BaseScoutImportPeer', $criteria, $con);
		}


		// BasePeer returns a PDOStatement
		return BasePeer::doSelect($criteria, $con);
	}
	/**
	 * Adds an object to the instance pool.
	 *
	 * Propel keeps cached copies of objects in an instance pool when they are retrieved
	 * from the database.  In some cases -- especially when you override doSelect*()
	 * methods in your stub classes -- you may need to explicitly add objects
	 * to the cache in order to ensure that the same objects are always returned by doSelect*()
	 * and retrieveByPK*() calls.
	 *
	 * @param      ScoutImport $value A ScoutImport object.
	 * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
	 */
	public static function addInstanceToPool(ScoutImport $obj, $key = null)
	{
		if (Propel::isInstancePoolingEnabled()) {
			if ($key === null) {
				$key = (string) $obj->getId();
			} // if key === null
			self::$instances[$key] = $obj;
		}
	}

	/**
	 * Removes an object from the instance pool.
	 *
	 * Propel keeps cached copies of objects in an instance pool when they are retrieved
	 * from the database.  In some cases -- especially when you override doDelete
	 * methods in your stub classes -- you may need to explicitly remove objects
	 * from the cache in order to prevent returning objects that no longer exist.
	 *
	 * @param      mixed $value A ScoutImport object or a primary key value.
	 */
	public static function removeInstanceFromPool($value)
	{
		if (Propel::isInstancePoolingEnabled() && $value !== null) {
			if (is_object($value) && $value instanceof ScoutImport) {
				$key = (string) $value->getId();
			} elseif (is_scalar($value)) {
				// assume we've been passed a primary key
				$key = (string) $value;
			} else {
				$e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or ScoutImport object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
				throw $e;
			}

			unset(self::$instances[$key]);
		}
	} // removeInstanceFromPool()

	/**
	 * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
	 *
	 * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
	 * a multi-column primary key, a serialize()d version of the primary key will be returned.
	 *
	 * @param      string $key The key (@see getPrimaryKeyHash()) for this instance.
	 * @return     ScoutImport Found object or NULL if 1) no instance exists for specified key or 2) instance pooling has been disabled.
	 * @see        getPrimaryKeyHash()
	 */
	public static function getInstanceFromPool($key)
	{
		if (Propel::isInstancePoolingEnabled()) {
			if (isset(self::$instances[$key])) {
				return self::$instances[$key];
			}
		}
		return null; // just to be explicit
	}
	
	/**
	 * Clear the instance pool.
	 *
	 * @return     void
	 */
	public static function clearInstancePool()
	{
		self::$instances = array();
	}
	
	/**
	 * Method to invalidate the instance pool of all tables related to scout_import
	 * by a foreign key with ON DELETE CASCADE
	 */
	public static function clearRelatedInstancePool()
	{
	}

	/**
	 * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
	 *
	 * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
	 * a multi-column primary key, a serialize()d version of the primary key will be returned.
	 *
	 * @param      array $row PropelPDO resultset row.
	 * @param      int $startcol The 0-based offset for reading from the resultset row.
	 * @return     string A string version of PK or NULL if the components of primary key in result array are all null.
	 */
	public static function getPrimaryKeyHashFromRow($row, $startcol = 0)
	{
		// If the PK cannot be derived from the row, return NULL.
		if ($row[$startcol] === null) {
			return null;
		}
		return (string) $row[$startcol];
	}

	/**
	 * Retrieves the primary key from the DB resultset row 
	 * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
	 * a multi-column primary key, an array of the primary key columns will be returned.
	 *
	 * @param      array $row PropelPDO resultset row.
	 * @param      int $startcol The 0-based offset for reading from the resultset row.
	 * @return     mixed The primary key of the row
	 */
	public static function getPrimaryKeyFromRow($row, $startcol = 0)
	{
		return (int) $row[$startcol];
	}
	
	/**
	 * The returned array will contain objects of the default type or
	 * objects that inherit from the default.
	 *
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function populateObjects(PDOStatement $stmt)
	{
		$results = array();
	
		// set the class once to avoid overhead in the loop
		$cls = ScoutImportPeer::getOMClass(false);
		// populate the object(s)
		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key = ScoutImportPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj = ScoutImportPeer::getInstanceFromPool($key))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj->hydrate($row, 0, true); // rehydrate
				$results[] = $obj;
			} else {
				$obj = new $cls();
				$obj->hydrate($row);
				$results[] = $obj;
				ScoutImportPeer::addInstanceToPool($obj, $key);
			} // if key exists
		}
		$stmt->closeCursor();
		return $results;
	}
	/**
	 * Populates an object of the default type or an object that inherit from the default.
	 *
	 * @param      array $row PropelPDO resultset row.
	 * @param      int $startcol The 0-based offset for reading from the resultset row.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 * @return     array (ScoutImport object, last column rank)
	 */
	public static function populateObject($row, $startcol = 0)
	{
		$key = ScoutImportPeer::getPrimaryKeyHashFromRow($row, $startcol);
		if (null !== ($obj = ScoutImportPeer::getInstanceFromPool($key))) {
			// We no longer rehydrate the object, since this can cause data loss.
			// See http://www.propelorm.org/ticket/509
			// $obj->hydrate($row, $startcol, true); // rehydrate
			$col = $startcol + ScoutImportPeer::NUM_COLUMNS;
		} else {
			$cls = ScoutImportPeer::OM_CLASS;
			$obj = new $cls();
			$col = $obj->hydrate($row, $startcol);
			ScoutImportPeer::addInstanceToPool($obj, $key);
		}
		return array($obj, $col);
	}
	/**
	 * Returns the TableMap related to this peer.
	 * This method is not needed for general use but a specific application could have a need.
	 * @return     TableMap
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function getTableMap()
	{
		return Propel::getDatabaseMap(self::DATABASE_NAME)->getTable(self::TABLE_NAME);
	}

	/**
	 * Add a TableMap instance to the database for this peer class.
	 */
	public static function buildTableMap()
	{
	  $dbMap = Propel::getDatabaseMap(BaseScoutImportPeer::DATABASE_NAME);
	  if (!$dbMap->hasTable(BaseScoutImportPeer::TABLE_NAME))
	  {
	    $dbMap->addTableObject(new ScoutImportTableMap());
	  }
	}

	/**
	 * The class that the Peer will make instances of.
	 *
	 * If $withPrefix is true, the returned path
	 * uses a dot-path notation which is tranalted into a path
	 * relative to a location on the PHP include_path.
	 * (e.g. path.to.MyClass -> 'path/to/MyClass.php')
	 *
	 * @param      boolean $withPrefix Whether or not to return the path with the class name
	 * @return     string path.to.ClassName
	 */
	public static function getOMClass($withPrefix = true)
	{
		return $withPrefix ? ScoutImportPeer::CLASS_DEFAULT : ScoutImportPeer::OM_CLASS;
	}

	/**
	 * Method perform an INSERT on the database, given a ScoutImport or Criteria object.
	 *
	 * @param      mixed $values Criteria or ScoutImport object containing data that is used to create the INSERT statement.
	 * @param      PropelPDO $con the PropelPDO connection to use
	 * @return     mixed The new primary key.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doInsert($values, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(ScoutImportPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; // rename for clarity
		} else {
			$criteria = $values->buildCriteria(); // build Criteria from ScoutImport object
		}

		if ($criteria->containsKey(ScoutImportPeer::ID) && $criteria->keyContainsValue(ScoutImportPeer::ID) ) {
			throw new PropelException('Cannot insert a value for auto-increment primary key ('.ScoutImportPeer::ID.')');
		}


		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		try {
			// use transaction because $criteria could contain info
			// for more than one table (I guess, conceivably)
			$con->beginTransaction();
			$pk = BasePeer::doInsert($criteria, $con);
			$con->commit();
		} catch(PropelException $e) {
			$con->rollBack();
			throw $e;
		}

		return $pk;
	}

	/**
	 * Method perform an UPDATE on the database, given a ScoutImport or Criteria object.
	 *
	 * @param      mixed $values Criteria or ScoutImport object containing data that is used to create the UPDATE statement.
	 * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
	 * @return     int The number of affected rows (if supported by underlying database driver).
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doUpdate($values, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(ScoutImportPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$selectCriteria = new Criteria(self::DATABASE_NAME);

		if ($values instanceof Criteria) {
			$criteria = clone $values; // rename for clarity

			$comparison = $criteria->getComparison(ScoutImportPeer::ID);
			$value = $criteria->remove(ScoutImportPeer::ID);
			if ($value) {
				$selectCriteria->add(ScoutImportPeer::ID, $value, $comparison);
			} else {
				$selectCriteria->setPrimaryTableName(ScoutImportPeer::TABLE_NAME);
			}

		} else { // $values is ScoutImport object
			$criteria = $values->buildCriteria(); // gets full criteria
			$selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
		}

		// set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		return BasePeer::doUpdate($selectCriteria, $criteria, $con);
	}

	/**
	 * Method to DELETE all rows from the scout_import table.
	 *
	 * @return     int The number of affected rows (if supported by underlying database driver).
	 */
	public static function doDeleteAll($con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(ScoutImportPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		$affectedRows = 0; // initialize var to track total num of affected rows
		try {
			// use transaction because $criteria could contain info
			// for more than one table or we could emulating ON DELETE CASCADE, etc.
			$con->beginTransaction();
			$affectedRows += BasePeer::doDeleteAll(ScoutImportPeer::TABLE_NAME, $con, ScoutImportPeer::DATABASE_NAME);
			// Because this db requires some delete cascade/set null emulation, we have to
			// clear the cached instance *after* the emulation has happened (since
			// instances get re-added by the select statement contained therein).
			ScoutImportPeer::clearInstancePool();
			ScoutImportPeer::clearRelatedInstancePool();
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Method perform a DELETE on the database, given a ScoutImport or Criteria object OR a primary key value.
	 *
	 * @param      mixed $values Criteria or ScoutImport object or primary key or array of primary keys
	 *              which is used to create the DELETE statement
	 * @param      PropelPDO $con the connection to use
	 * @return     int 	The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
	 *				if supported by native driver or if emulated using Propel.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	 public static function doDelete($values, PropelPDO $con = null)
	 {
		if ($con === null) {
			$con = Propel::getConnection(ScoutImportPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
			// invalidate the cache for all objects of this type, since we have no
			// way of knowing (without running a query) what objects should be invalidated
			// from the cache based on this Criteria.
			ScoutImportPeer::clearInstancePool();
			// rename for clarity
			$criteria = clone $values;
		} elseif ($values instanceof ScoutImport) { // it's a model object
			// invalidate the cache for this single object
			ScoutImportPeer::removeInstanceFromPool($values);
			// create criteria based on pk values
			$criteria = $values->buildPkeyCriteria();
		} else { // it's a primary key, or an array of pks
			$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(ScoutImportPeer::ID, (array) $values, Criteria::IN);
			// invalidate the cache for this object(s)
			foreach ((array) $values as $singleval) {
				ScoutImportPeer::removeInstanceFromPool($singleval);
			}
		}

		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		$affectedRows = 0; // initialize var to track total num of affected rows

		try {
			// use transaction because $criteria could contain info
			// for more than one table or we could emulating ON DELETE CASCADE, etc.
			$con->beginTransaction();
			
			$affectedRows += BasePeer::doDelete($criteria, $con);
			ScoutImportPeer::clearRelatedInstancePool();
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Validates all modified columns of given ScoutImport object.
	 * If parameter $columns is either a single column name or an array of column names
	 * than only those columns are validated.
	 *
	 * NOTICE: This does not apply to primary or foreign keys for now.
	 *
	 * @param      ScoutImport $obj The object to validate.
	 * @param      mixed $cols Column name or array of column names.
	 *
	 * @return     mixed TRUE if all columns are valid or the error message of the first invalid column.
	 */
	public static function doValidate(ScoutImport $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(ScoutImportPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(ScoutImportPeer::TABLE_NAME);

			if (! is_array($cols)) {
				$cols = array($cols);
			}

			foreach ($cols as $colName) {
				if ($tableMap->containsColumn($colName)) {
					$get = 'get' . $tableMap->getColumn($colName)->getPhpName();
					$columns[$colName] = $obj->$get();
				}
			}
		} else {

		}

		return BasePeer::doValidate(ScoutImportPeer::DATABASE_NAME, ScoutImportPeer::TABLE_NAME, $columns);
	}

	/**
	 * Retrieve a single object by pkey.
	 *
	 * @param      int $pk the primary key.
	 * @param      PropelPDO $con the connection to use
	 * @return     ScoutImport
	 */
	public static function retrieveByPK($pk, PropelPDO $con = null)
	{

		if (null !== ($obj = ScoutImportPeer::getInstanceFromPool((string) $pk))) {
			return $obj;
		}

		if ($con === null) {
			$con = Propel::getConnection(ScoutImportPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria = new Criteria(ScoutImportPeer::DATABASE_NAME);
		$criteria->add(ScoutImportPeer::ID, $pk);

		$v = ScoutImportPeer::doSelect($criteria, $con);

		return !empty($v) > 0 ? $v[0] : null;
	}

	/**
	 * Retrieve multiple objects by pkey.
	 *
	 * @param      array $pks List of primary keys
	 * @param      PropelPDO $con the connection to use
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function retrieveByPKs($pks, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(ScoutImportPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$objs = null;
		if (empty($pks)) {
			$objs = array();
		} else {
			$criteria = new Criteria(ScoutImportPeer::DATABASE_NAME);
			$criteria->add(ScoutImportPeer::ID, $pks, Criteria::IN);
			$objs = ScoutImportPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

	// symfony behavior
	
	/**
	 * Returns an array of arrays that contain columns in each unique index.
	 *
	 * @return array
	 */
	static public function getUniqueColumnNames()
	{
	  return array();
	}

	// symfony_behaviors behavior
	
	/**
	 * Returns the name of the hook to call from inside the supplied method.
	 *
	 * @param string $method The calling method
	 *
	 * @return string A hook name for {@link sfMixer}
	 *
	 * @throws LogicException If the method name is not recognized
	 */
	static private function getMixerPreSelectHook($method)
	{
	  if (preg_match('/^do(Select|Count)(Join(All(Except)?)?|Stmt)?/', $method, $match))
	  {
	    return sprintf('BaseScoutImportPeer:%s:%1$s', 'Count' == $match[1] ? 'doCount' : $match[0]);
	  }
	
	  throw new LogicException(sprintf('Unrecognized function "%s"', $method));
	}

} // BaseScoutImportPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseScoutImportPeer::buildTableMap();
