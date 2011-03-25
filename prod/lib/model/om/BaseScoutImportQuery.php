<?php


/**
 * Base class that represents a query for the 'scout_import' table.
 *
 * 
 *
 * This class was autogenerated by Propel 1.5.6 on:
 *
 * Fri Mar  4 00:48:23 2011
 *
 * @method     ScoutImportQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ScoutImportQuery orderByCodigo($order = Criteria::ASC) Order by the codigo column
 * @method     ScoutImportQuery orderByEdad($order = Criteria::ASC) Order by the edad column
 * @method     ScoutImportQuery orderByPeso($order = Criteria::ASC) Order by the peso column
 * @method     ScoutImportQuery orderByAltura($order = Criteria::ASC) Order by the altura column
 * @method     ScoutImportQuery orderByNombre($order = Criteria::ASC) Order by the nombre column
 * @method     ScoutImportQuery orderByFechaNacimiento($order = Criteria::ASC) Order by the fecha_nacimiento column
 * @method     ScoutImportQuery orderByFechaScout($order = Criteria::ASC) Order by the fecha_scout column
 * @method     ScoutImportQuery orderByLugarScout($order = Criteria::ASC) Order by the lugar_scout column
 * @method     ScoutImportQuery orderByObservaciones($order = Criteria::ASC) Order by the observaciones column
 * @method     ScoutImportQuery orderByActividades($order = Criteria::ASC) Order by the actividades column
 * @method     ScoutImportQuery orderByEmail($order = Criteria::ASC) Order by the email column
 * @method     ScoutImportQuery orderByTelefono($order = Criteria::ASC) Order by the telefono column
 * @method     ScoutImportQuery orderByCelular($order = Criteria::ASC) Order by the celular column
 * @method     ScoutImportQuery orderByNacionalidad($order = Criteria::ASC) Order by the nacionalidad column
 * @method     ScoutImportQuery orderByIdiomas($order = Criteria::ASC) Order by the idiomas column
 * @method     ScoutImportQuery orderByXlsFile($order = Criteria::ASC) Order by the xls_file column
 * @method     ScoutImportQuery orderByAnio($order = Criteria::ASC) Order by the anio column
 * @method     ScoutImportQuery orderByMes($order = Criteria::ASC) Order by the mes column
 * @method     ScoutImportQuery orderByCodigoAgrupador($order = Criteria::ASC) Order by the codigo_agrupador column
 * @method     ScoutImportQuery orderByDia($order = Criteria::ASC) Order by the dia column
 *
 * @method     ScoutImportQuery groupById() Group by the id column
 * @method     ScoutImportQuery groupByCodigo() Group by the codigo column
 * @method     ScoutImportQuery groupByEdad() Group by the edad column
 * @method     ScoutImportQuery groupByPeso() Group by the peso column
 * @method     ScoutImportQuery groupByAltura() Group by the altura column
 * @method     ScoutImportQuery groupByNombre() Group by the nombre column
 * @method     ScoutImportQuery groupByFechaNacimiento() Group by the fecha_nacimiento column
 * @method     ScoutImportQuery groupByFechaScout() Group by the fecha_scout column
 * @method     ScoutImportQuery groupByLugarScout() Group by the lugar_scout column
 * @method     ScoutImportQuery groupByObservaciones() Group by the observaciones column
 * @method     ScoutImportQuery groupByActividades() Group by the actividades column
 * @method     ScoutImportQuery groupByEmail() Group by the email column
 * @method     ScoutImportQuery groupByTelefono() Group by the telefono column
 * @method     ScoutImportQuery groupByCelular() Group by the celular column
 * @method     ScoutImportQuery groupByNacionalidad() Group by the nacionalidad column
 * @method     ScoutImportQuery groupByIdiomas() Group by the idiomas column
 * @method     ScoutImportQuery groupByXlsFile() Group by the xls_file column
 * @method     ScoutImportQuery groupByAnio() Group by the anio column
 * @method     ScoutImportQuery groupByMes() Group by the mes column
 * @method     ScoutImportQuery groupByCodigoAgrupador() Group by the codigo_agrupador column
 * @method     ScoutImportQuery groupByDia() Group by the dia column
 *
 * @method     ScoutImportQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ScoutImportQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ScoutImportQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ScoutImport findOne(PropelPDO $con = null) Return the first ScoutImport matching the query
 * @method     ScoutImport findOneOrCreate(PropelPDO $con = null) Return the first ScoutImport matching the query, or a new ScoutImport object populated from the query conditions when no match is found
 *
 * @method     ScoutImport findOneById(int $id) Return the first ScoutImport filtered by the id column
 * @method     ScoutImport findOneByCodigo(int $codigo) Return the first ScoutImport filtered by the codigo column
 * @method     ScoutImport findOneByEdad(int $edad) Return the first ScoutImport filtered by the edad column
 * @method     ScoutImport findOneByPeso(int $peso) Return the first ScoutImport filtered by the peso column
 * @method     ScoutImport findOneByAltura(int $altura) Return the first ScoutImport filtered by the altura column
 * @method     ScoutImport findOneByNombre(string $nombre) Return the first ScoutImport filtered by the nombre column
 * @method     ScoutImport findOneByFechaNacimiento(string $fecha_nacimiento) Return the first ScoutImport filtered by the fecha_nacimiento column
 * @method     ScoutImport findOneByFechaScout(string $fecha_scout) Return the first ScoutImport filtered by the fecha_scout column
 * @method     ScoutImport findOneByLugarScout(string $lugar_scout) Return the first ScoutImport filtered by the lugar_scout column
 * @method     ScoutImport findOneByObservaciones(string $observaciones) Return the first ScoutImport filtered by the observaciones column
 * @method     ScoutImport findOneByActividades(string $actividades) Return the first ScoutImport filtered by the actividades column
 * @method     ScoutImport findOneByEmail(string $email) Return the first ScoutImport filtered by the email column
 * @method     ScoutImport findOneByTelefono(string $telefono) Return the first ScoutImport filtered by the telefono column
 * @method     ScoutImport findOneByCelular(string $celular) Return the first ScoutImport filtered by the celular column
 * @method     ScoutImport findOneByNacionalidad(string $nacionalidad) Return the first ScoutImport filtered by the nacionalidad column
 * @method     ScoutImport findOneByIdiomas(string $idiomas) Return the first ScoutImport filtered by the idiomas column
 * @method     ScoutImport findOneByXlsFile(string $xls_file) Return the first ScoutImport filtered by the xls_file column
 * @method     ScoutImport findOneByAnio(int $anio) Return the first ScoutImport filtered by the anio column
 * @method     ScoutImport findOneByMes(string $mes) Return the first ScoutImport filtered by the mes column
 * @method     ScoutImport findOneByCodigoAgrupador(string $codigo_agrupador) Return the first ScoutImport filtered by the codigo_agrupador column
 * @method     ScoutImport findOneByDia(string $dia) Return the first ScoutImport filtered by the dia column
 *
 * @method     array findById(int $id) Return ScoutImport objects filtered by the id column
 * @method     array findByCodigo(int $codigo) Return ScoutImport objects filtered by the codigo column
 * @method     array findByEdad(int $edad) Return ScoutImport objects filtered by the edad column
 * @method     array findByPeso(int $peso) Return ScoutImport objects filtered by the peso column
 * @method     array findByAltura(int $altura) Return ScoutImport objects filtered by the altura column
 * @method     array findByNombre(string $nombre) Return ScoutImport objects filtered by the nombre column
 * @method     array findByFechaNacimiento(string $fecha_nacimiento) Return ScoutImport objects filtered by the fecha_nacimiento column
 * @method     array findByFechaScout(string $fecha_scout) Return ScoutImport objects filtered by the fecha_scout column
 * @method     array findByLugarScout(string $lugar_scout) Return ScoutImport objects filtered by the lugar_scout column
 * @method     array findByObservaciones(string $observaciones) Return ScoutImport objects filtered by the observaciones column
 * @method     array findByActividades(string $actividades) Return ScoutImport objects filtered by the actividades column
 * @method     array findByEmail(string $email) Return ScoutImport objects filtered by the email column
 * @method     array findByTelefono(string $telefono) Return ScoutImport objects filtered by the telefono column
 * @method     array findByCelular(string $celular) Return ScoutImport objects filtered by the celular column
 * @method     array findByNacionalidad(string $nacionalidad) Return ScoutImport objects filtered by the nacionalidad column
 * @method     array findByIdiomas(string $idiomas) Return ScoutImport objects filtered by the idiomas column
 * @method     array findByXlsFile(string $xls_file) Return ScoutImport objects filtered by the xls_file column
 * @method     array findByAnio(int $anio) Return ScoutImport objects filtered by the anio column
 * @method     array findByMes(string $mes) Return ScoutImport objects filtered by the mes column
 * @method     array findByCodigoAgrupador(string $codigo_agrupador) Return ScoutImport objects filtered by the codigo_agrupador column
 * @method     array findByDia(string $dia) Return ScoutImport objects filtered by the dia column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseScoutImportQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseScoutImportQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'propel', $modelName = 'ScoutImport', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new ScoutImportQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    ScoutImportQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof ScoutImportQuery) {
			return $criteria;
		}
		$query = new ScoutImportQuery();
		if (null !== $modelAlias) {
			$query->setModelAlias($modelAlias);
		}
		if ($criteria instanceof Criteria) {
			$query->mergeWith($criteria);
		}
		return $query;
	}

	/**
	 * Find object by primary key
	 * Use instance pooling to avoid a database query if the object exists
	 * <code>
	 * $obj  = $c->findPk(12, $con);
	 * </code>
	 * @param     mixed $key Primary key to use for the query
	 * @param     PropelPDO $con an optional connection object
	 *
	 * @return    ScoutImport|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = ScoutImportPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
			// the object is alredy in the instance pool
			return $obj;
		} else {
			// the object has not been requested yet, or the formatter is not an object formatter
			$criteria = $this->isKeepQuery() ? clone $this : $this;
			$stmt = $criteria
				->filterByPrimaryKey($key)
				->getSelectStatement($con);
			return $criteria->getFormatter()->init($criteria)->formatOne($stmt);
		}
	}

	/**
	 * Find objects by primary key
	 * <code>
	 * $objs = $c->findPks(array(12, 56, 832), $con);
	 * </code>
	 * @param     array $keys Primary keys to use for the query
	 * @param     PropelPDO $con an optional connection object
	 *
	 * @return    PropelObjectCollection|array|mixed the list of results, formatted by the current formatter
	 */
	public function findPks($keys, $con = null)
	{	
		$criteria = $this->isKeepQuery() ? clone $this : $this;
		return $this
			->filterByPrimaryKeys($keys)
			->find($con);
	}

	/**
	 * Filter the query by primary key
	 *
	 * @param     mixed $key Primary key to use for the query
	 *
	 * @return    ScoutImportQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(ScoutImportPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    ScoutImportQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(ScoutImportPeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     int|array $id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ScoutImportQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(ScoutImportPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the codigo column
	 * 
	 * @param     int|array $codigo The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ScoutImportQuery The current query, for fluid interface
	 */
	public function filterByCodigo($codigo = null, $comparison = null)
	{
		if (is_array($codigo)) {
			$useMinMax = false;
			if (isset($codigo['min'])) {
				$this->addUsingAlias(ScoutImportPeer::CODIGO, $codigo['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($codigo['max'])) {
				$this->addUsingAlias(ScoutImportPeer::CODIGO, $codigo['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ScoutImportPeer::CODIGO, $codigo, $comparison);
	}

	/**
	 * Filter the query on the edad column
	 * 
	 * @param     int|array $edad The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ScoutImportQuery The current query, for fluid interface
	 */
	public function filterByEdad($edad = null, $comparison = null)
	{
		if (is_array($edad)) {
			$useMinMax = false;
			if (isset($edad['min'])) {
				$this->addUsingAlias(ScoutImportPeer::EDAD, $edad['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($edad['max'])) {
				$this->addUsingAlias(ScoutImportPeer::EDAD, $edad['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ScoutImportPeer::EDAD, $edad, $comparison);
	}

	/**
	 * Filter the query on the peso column
	 * 
	 * @param     int|array $peso The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ScoutImportQuery The current query, for fluid interface
	 */
	public function filterByPeso($peso = null, $comparison = null)
	{
		if (is_array($peso)) {
			$useMinMax = false;
			if (isset($peso['min'])) {
				$this->addUsingAlias(ScoutImportPeer::PESO, $peso['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($peso['max'])) {
				$this->addUsingAlias(ScoutImportPeer::PESO, $peso['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ScoutImportPeer::PESO, $peso, $comparison);
	}

	/**
	 * Filter the query on the altura column
	 * 
	 * @param     int|array $altura The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ScoutImportQuery The current query, for fluid interface
	 */
	public function filterByAltura($altura = null, $comparison = null)
	{
		if (is_array($altura)) {
			$useMinMax = false;
			if (isset($altura['min'])) {
				$this->addUsingAlias(ScoutImportPeer::ALTURA, $altura['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($altura['max'])) {
				$this->addUsingAlias(ScoutImportPeer::ALTURA, $altura['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ScoutImportPeer::ALTURA, $altura, $comparison);
	}

	/**
	 * Filter the query on the nombre column
	 * 
	 * @param     string $nombre The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ScoutImportQuery The current query, for fluid interface
	 */
	public function filterByNombre($nombre = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($nombre)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $nombre)) {
				$nombre = str_replace('*', '%', $nombre);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(ScoutImportPeer::NOMBRE, $nombre, $comparison);
	}

	/**
	 * Filter the query on the fecha_nacimiento column
	 * 
	 * @param     string $fechaNacimiento The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ScoutImportQuery The current query, for fluid interface
	 */
	public function filterByFechaNacimiento($fechaNacimiento = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($fechaNacimiento)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $fechaNacimiento)) {
				$fechaNacimiento = str_replace('*', '%', $fechaNacimiento);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(ScoutImportPeer::FECHA_NACIMIENTO, $fechaNacimiento, $comparison);
	}

	/**
	 * Filter the query on the fecha_scout column
	 * 
	 * @param     string $fechaScout The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ScoutImportQuery The current query, for fluid interface
	 */
	public function filterByFechaScout($fechaScout = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($fechaScout)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $fechaScout)) {
				$fechaScout = str_replace('*', '%', $fechaScout);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(ScoutImportPeer::FECHA_SCOUT, $fechaScout, $comparison);
	}

	/**
	 * Filter the query on the lugar_scout column
	 * 
	 * @param     string $lugarScout The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ScoutImportQuery The current query, for fluid interface
	 */
	public function filterByLugarScout($lugarScout = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($lugarScout)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $lugarScout)) {
				$lugarScout = str_replace('*', '%', $lugarScout);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(ScoutImportPeer::LUGAR_SCOUT, $lugarScout, $comparison);
	}

	/**
	 * Filter the query on the observaciones column
	 * 
	 * @param     string $observaciones The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ScoutImportQuery The current query, for fluid interface
	 */
	public function filterByObservaciones($observaciones = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($observaciones)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $observaciones)) {
				$observaciones = str_replace('*', '%', $observaciones);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(ScoutImportPeer::OBSERVACIONES, $observaciones, $comparison);
	}

	/**
	 * Filter the query on the actividades column
	 * 
	 * @param     string $actividades The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ScoutImportQuery The current query, for fluid interface
	 */
	public function filterByActividades($actividades = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($actividades)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $actividades)) {
				$actividades = str_replace('*', '%', $actividades);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(ScoutImportPeer::ACTIVIDADES, $actividades, $comparison);
	}

	/**
	 * Filter the query on the email column
	 * 
	 * @param     string $email The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ScoutImportQuery The current query, for fluid interface
	 */
	public function filterByEmail($email = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($email)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $email)) {
				$email = str_replace('*', '%', $email);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(ScoutImportPeer::EMAIL, $email, $comparison);
	}

	/**
	 * Filter the query on the telefono column
	 * 
	 * @param     string $telefono The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ScoutImportQuery The current query, for fluid interface
	 */
	public function filterByTelefono($telefono = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($telefono)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $telefono)) {
				$telefono = str_replace('*', '%', $telefono);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(ScoutImportPeer::TELEFONO, $telefono, $comparison);
	}

	/**
	 * Filter the query on the celular column
	 * 
	 * @param     string $celular The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ScoutImportQuery The current query, for fluid interface
	 */
	public function filterByCelular($celular = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($celular)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $celular)) {
				$celular = str_replace('*', '%', $celular);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(ScoutImportPeer::CELULAR, $celular, $comparison);
	}

	/**
	 * Filter the query on the nacionalidad column
	 * 
	 * @param     string $nacionalidad The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ScoutImportQuery The current query, for fluid interface
	 */
	public function filterByNacionalidad($nacionalidad = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($nacionalidad)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $nacionalidad)) {
				$nacionalidad = str_replace('*', '%', $nacionalidad);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(ScoutImportPeer::NACIONALIDAD, $nacionalidad, $comparison);
	}

	/**
	 * Filter the query on the idiomas column
	 * 
	 * @param     string $idiomas The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ScoutImportQuery The current query, for fluid interface
	 */
	public function filterByIdiomas($idiomas = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($idiomas)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $idiomas)) {
				$idiomas = str_replace('*', '%', $idiomas);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(ScoutImportPeer::IDIOMAS, $idiomas, $comparison);
	}

	/**
	 * Filter the query on the xls_file column
	 * 
	 * @param     string $xlsFile The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ScoutImportQuery The current query, for fluid interface
	 */
	public function filterByXlsFile($xlsFile = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($xlsFile)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $xlsFile)) {
				$xlsFile = str_replace('*', '%', $xlsFile);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(ScoutImportPeer::XLS_FILE, $xlsFile, $comparison);
	}

	/**
	 * Filter the query on the anio column
	 * 
	 * @param     int|array $anio The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ScoutImportQuery The current query, for fluid interface
	 */
	public function filterByAnio($anio = null, $comparison = null)
	{
		if (is_array($anio)) {
			$useMinMax = false;
			if (isset($anio['min'])) {
				$this->addUsingAlias(ScoutImportPeer::ANIO, $anio['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($anio['max'])) {
				$this->addUsingAlias(ScoutImportPeer::ANIO, $anio['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ScoutImportPeer::ANIO, $anio, $comparison);
	}

	/**
	 * Filter the query on the mes column
	 * 
	 * @param     string $mes The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ScoutImportQuery The current query, for fluid interface
	 */
	public function filterByMes($mes = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($mes)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $mes)) {
				$mes = str_replace('*', '%', $mes);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(ScoutImportPeer::MES, $mes, $comparison);
	}

	/**
	 * Filter the query on the codigo_agrupador column
	 * 
	 * @param     string $codigoAgrupador The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ScoutImportQuery The current query, for fluid interface
	 */
	public function filterByCodigoAgrupador($codigoAgrupador = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($codigoAgrupador)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $codigoAgrupador)) {
				$codigoAgrupador = str_replace('*', '%', $codigoAgrupador);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(ScoutImportPeer::CODIGO_AGRUPADOR, $codigoAgrupador, $comparison);
	}

	/**
	 * Filter the query on the dia column
	 * 
	 * @param     string $dia The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ScoutImportQuery The current query, for fluid interface
	 */
	public function filterByDia($dia = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($dia)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $dia)) {
				$dia = str_replace('*', '%', $dia);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(ScoutImportPeer::DIA, $dia, $comparison);
	}

	/**
	 * Exclude object from result
	 *
	 * @param     ScoutImport $scoutImport Object to remove from the list of results
	 *
	 * @return    ScoutImportQuery The current query, for fluid interface
	 */
	public function prune($scoutImport = null)
	{
		if ($scoutImport) {
			$this->addUsingAlias(ScoutImportPeer::ID, $scoutImport->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BaseScoutImportQuery