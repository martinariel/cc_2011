<?php


/**
 * Base class that represents a query for the 'persona_casting' table.
 *
 * 
 *
 * This class was autogenerated by Propel 1.5.6 on:
 *
 * Fri Mar  4 00:48:22 2011
 *
 * @method     PersonaCastingQuery orderByPersonaId($order = Criteria::ASC) Order by the persona_id column
 * @method     PersonaCastingQuery orderByCastingId($order = Criteria::ASC) Order by the casting_id column
 * @method     PersonaCastingQuery orderByAgenciaId($order = Criteria::ASC) Order by the agencia_id column
 * @method     PersonaCastingQuery orderByPeso($order = Criteria::ASC) Order by the peso column
 * @method     PersonaCastingQuery orderByAltura($order = Criteria::ASC) Order by the altura column
 * @method     PersonaCastingQuery orderByEmail($order = Criteria::ASC) Order by the email column
 * @method     PersonaCastingQuery orderByTelefono($order = Criteria::ASC) Order by the telefono column
 * @method     PersonaCastingQuery orderByCelular($order = Criteria::ASC) Order by the celular column
 * @method     PersonaCastingQuery orderByCalzado($order = Criteria::ASC) Order by the calzado column
 * @method     PersonaCastingQuery orderByPantalon($order = Criteria::ASC) Order by the pantalon column
 * @method     PersonaCastingQuery orderByCamisa($order = Criteria::ASC) Order by the camisa column
 * @method     PersonaCastingQuery orderByObservaciones($order = Criteria::ASC) Order by the observaciones column
 * @method     PersonaCastingQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 * @method     PersonaCastingQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method     PersonaCastingQuery orderById($order = Criteria::ASC) Order by the id column
 *
 * @method     PersonaCastingQuery groupByPersonaId() Group by the persona_id column
 * @method     PersonaCastingQuery groupByCastingId() Group by the casting_id column
 * @method     PersonaCastingQuery groupByAgenciaId() Group by the agencia_id column
 * @method     PersonaCastingQuery groupByPeso() Group by the peso column
 * @method     PersonaCastingQuery groupByAltura() Group by the altura column
 * @method     PersonaCastingQuery groupByEmail() Group by the email column
 * @method     PersonaCastingQuery groupByTelefono() Group by the telefono column
 * @method     PersonaCastingQuery groupByCelular() Group by the celular column
 * @method     PersonaCastingQuery groupByCalzado() Group by the calzado column
 * @method     PersonaCastingQuery groupByPantalon() Group by the pantalon column
 * @method     PersonaCastingQuery groupByCamisa() Group by the camisa column
 * @method     PersonaCastingQuery groupByObservaciones() Group by the observaciones column
 * @method     PersonaCastingQuery groupByUpdatedAt() Group by the updated_at column
 * @method     PersonaCastingQuery groupByCreatedAt() Group by the created_at column
 * @method     PersonaCastingQuery groupById() Group by the id column
 *
 * @method     PersonaCastingQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     PersonaCastingQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     PersonaCastingQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     PersonaCastingQuery leftJoinPersona($relationAlias = null) Adds a LEFT JOIN clause to the query using the Persona relation
 * @method     PersonaCastingQuery rightJoinPersona($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Persona relation
 * @method     PersonaCastingQuery innerJoinPersona($relationAlias = null) Adds a INNER JOIN clause to the query using the Persona relation
 *
 * @method     PersonaCastingQuery leftJoinCasting($relationAlias = null) Adds a LEFT JOIN clause to the query using the Casting relation
 * @method     PersonaCastingQuery rightJoinCasting($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Casting relation
 * @method     PersonaCastingQuery innerJoinCasting($relationAlias = null) Adds a INNER JOIN clause to the query using the Casting relation
 *
 * @method     PersonaCastingQuery leftJoinAgencia($relationAlias = null) Adds a LEFT JOIN clause to the query using the Agencia relation
 * @method     PersonaCastingQuery rightJoinAgencia($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Agencia relation
 * @method     PersonaCastingQuery innerJoinAgencia($relationAlias = null) Adds a INNER JOIN clause to the query using the Agencia relation
 *
 * @method     PersonaCasting findOne(PropelPDO $con = null) Return the first PersonaCasting matching the query
 * @method     PersonaCasting findOneOrCreate(PropelPDO $con = null) Return the first PersonaCasting matching the query, or a new PersonaCasting object populated from the query conditions when no match is found
 *
 * @method     PersonaCasting findOneByPersonaId(int $persona_id) Return the first PersonaCasting filtered by the persona_id column
 * @method     PersonaCasting findOneByCastingId(int $casting_id) Return the first PersonaCasting filtered by the casting_id column
 * @method     PersonaCasting findOneByAgenciaId(int $agencia_id) Return the first PersonaCasting filtered by the agencia_id column
 * @method     PersonaCasting findOneByPeso(int $peso) Return the first PersonaCasting filtered by the peso column
 * @method     PersonaCasting findOneByAltura(int $altura) Return the first PersonaCasting filtered by the altura column
 * @method     PersonaCasting findOneByEmail(string $email) Return the first PersonaCasting filtered by the email column
 * @method     PersonaCasting findOneByTelefono(string $telefono) Return the first PersonaCasting filtered by the telefono column
 * @method     PersonaCasting findOneByCelular(string $celular) Return the first PersonaCasting filtered by the celular column
 * @method     PersonaCasting findOneByCalzado(string $calzado) Return the first PersonaCasting filtered by the calzado column
 * @method     PersonaCasting findOneByPantalon(string $pantalon) Return the first PersonaCasting filtered by the pantalon column
 * @method     PersonaCasting findOneByCamisa(string $camisa) Return the first PersonaCasting filtered by the camisa column
 * @method     PersonaCasting findOneByObservaciones(string $observaciones) Return the first PersonaCasting filtered by the observaciones column
 * @method     PersonaCasting findOneByUpdatedAt(string $updated_at) Return the first PersonaCasting filtered by the updated_at column
 * @method     PersonaCasting findOneByCreatedAt(string $created_at) Return the first PersonaCasting filtered by the created_at column
 * @method     PersonaCasting findOneById(int $id) Return the first PersonaCasting filtered by the id column
 *
 * @method     array findByPersonaId(int $persona_id) Return PersonaCasting objects filtered by the persona_id column
 * @method     array findByCastingId(int $casting_id) Return PersonaCasting objects filtered by the casting_id column
 * @method     array findByAgenciaId(int $agencia_id) Return PersonaCasting objects filtered by the agencia_id column
 * @method     array findByPeso(int $peso) Return PersonaCasting objects filtered by the peso column
 * @method     array findByAltura(int $altura) Return PersonaCasting objects filtered by the altura column
 * @method     array findByEmail(string $email) Return PersonaCasting objects filtered by the email column
 * @method     array findByTelefono(string $telefono) Return PersonaCasting objects filtered by the telefono column
 * @method     array findByCelular(string $celular) Return PersonaCasting objects filtered by the celular column
 * @method     array findByCalzado(string $calzado) Return PersonaCasting objects filtered by the calzado column
 * @method     array findByPantalon(string $pantalon) Return PersonaCasting objects filtered by the pantalon column
 * @method     array findByCamisa(string $camisa) Return PersonaCasting objects filtered by the camisa column
 * @method     array findByObservaciones(string $observaciones) Return PersonaCasting objects filtered by the observaciones column
 * @method     array findByUpdatedAt(string $updated_at) Return PersonaCasting objects filtered by the updated_at column
 * @method     array findByCreatedAt(string $created_at) Return PersonaCasting objects filtered by the created_at column
 * @method     array findById(int $id) Return PersonaCasting objects filtered by the id column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BasePersonaCastingQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BasePersonaCastingQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'propel', $modelName = 'PersonaCasting', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new PersonaCastingQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    PersonaCastingQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof PersonaCastingQuery) {
			return $criteria;
		}
		$query = new PersonaCastingQuery();
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
	 * @return    PersonaCasting|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = PersonaCastingPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    PersonaCastingQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(PersonaCastingPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    PersonaCastingQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(PersonaCastingPeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the persona_id column
	 * 
	 * @param     int|array $personaId The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PersonaCastingQuery The current query, for fluid interface
	 */
	public function filterByPersonaId($personaId = null, $comparison = null)
	{
		if (is_array($personaId)) {
			$useMinMax = false;
			if (isset($personaId['min'])) {
				$this->addUsingAlias(PersonaCastingPeer::PERSONA_ID, $personaId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($personaId['max'])) {
				$this->addUsingAlias(PersonaCastingPeer::PERSONA_ID, $personaId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(PersonaCastingPeer::PERSONA_ID, $personaId, $comparison);
	}

	/**
	 * Filter the query on the casting_id column
	 * 
	 * @param     int|array $castingId The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PersonaCastingQuery The current query, for fluid interface
	 */
	public function filterByCastingId($castingId = null, $comparison = null)
	{
		if (is_array($castingId)) {
			$useMinMax = false;
			if (isset($castingId['min'])) {
				$this->addUsingAlias(PersonaCastingPeer::CASTING_ID, $castingId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($castingId['max'])) {
				$this->addUsingAlias(PersonaCastingPeer::CASTING_ID, $castingId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(PersonaCastingPeer::CASTING_ID, $castingId, $comparison);
	}

	/**
	 * Filter the query on the agencia_id column
	 * 
	 * @param     int|array $agenciaId The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PersonaCastingQuery The current query, for fluid interface
	 */
	public function filterByAgenciaId($agenciaId = null, $comparison = null)
	{
		if (is_array($agenciaId)) {
			$useMinMax = false;
			if (isset($agenciaId['min'])) {
				$this->addUsingAlias(PersonaCastingPeer::AGENCIA_ID, $agenciaId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($agenciaId['max'])) {
				$this->addUsingAlias(PersonaCastingPeer::AGENCIA_ID, $agenciaId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(PersonaCastingPeer::AGENCIA_ID, $agenciaId, $comparison);
	}

	/**
	 * Filter the query on the peso column
	 * 
	 * @param     int|array $peso The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PersonaCastingQuery The current query, for fluid interface
	 */
	public function filterByPeso($peso = null, $comparison = null)
	{
		if (is_array($peso)) {
			$useMinMax = false;
			if (isset($peso['min'])) {
				$this->addUsingAlias(PersonaCastingPeer::PESO, $peso['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($peso['max'])) {
				$this->addUsingAlias(PersonaCastingPeer::PESO, $peso['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(PersonaCastingPeer::PESO, $peso, $comparison);
	}

	/**
	 * Filter the query on the altura column
	 * 
	 * @param     int|array $altura The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PersonaCastingQuery The current query, for fluid interface
	 */
	public function filterByAltura($altura = null, $comparison = null)
	{
		if (is_array($altura)) {
			$useMinMax = false;
			if (isset($altura['min'])) {
				$this->addUsingAlias(PersonaCastingPeer::ALTURA, $altura['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($altura['max'])) {
				$this->addUsingAlias(PersonaCastingPeer::ALTURA, $altura['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(PersonaCastingPeer::ALTURA, $altura, $comparison);
	}

	/**
	 * Filter the query on the email column
	 * 
	 * @param     string $email The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PersonaCastingQuery The current query, for fluid interface
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
		return $this->addUsingAlias(PersonaCastingPeer::EMAIL, $email, $comparison);
	}

	/**
	 * Filter the query on the telefono column
	 * 
	 * @param     string $telefono The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PersonaCastingQuery The current query, for fluid interface
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
		return $this->addUsingAlias(PersonaCastingPeer::TELEFONO, $telefono, $comparison);
	}

	/**
	 * Filter the query on the celular column
	 * 
	 * @param     string $celular The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PersonaCastingQuery The current query, for fluid interface
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
		return $this->addUsingAlias(PersonaCastingPeer::CELULAR, $celular, $comparison);
	}

	/**
	 * Filter the query on the calzado column
	 * 
	 * @param     string $calzado The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PersonaCastingQuery The current query, for fluid interface
	 */
	public function filterByCalzado($calzado = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($calzado)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $calzado)) {
				$calzado = str_replace('*', '%', $calzado);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(PersonaCastingPeer::CALZADO, $calzado, $comparison);
	}

	/**
	 * Filter the query on the pantalon column
	 * 
	 * @param     string $pantalon The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PersonaCastingQuery The current query, for fluid interface
	 */
	public function filterByPantalon($pantalon = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($pantalon)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $pantalon)) {
				$pantalon = str_replace('*', '%', $pantalon);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(PersonaCastingPeer::PANTALON, $pantalon, $comparison);
	}

	/**
	 * Filter the query on the camisa column
	 * 
	 * @param     string $camisa The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PersonaCastingQuery The current query, for fluid interface
	 */
	public function filterByCamisa($camisa = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($camisa)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $camisa)) {
				$camisa = str_replace('*', '%', $camisa);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(PersonaCastingPeer::CAMISA, $camisa, $comparison);
	}

	/**
	 * Filter the query on the observaciones column
	 * 
	 * @param     string $observaciones The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PersonaCastingQuery The current query, for fluid interface
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
		return $this->addUsingAlias(PersonaCastingPeer::OBSERVACIONES, $observaciones, $comparison);
	}

	/**
	 * Filter the query on the updated_at column
	 * 
	 * @param     string|array $updatedAt The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PersonaCastingQuery The current query, for fluid interface
	 */
	public function filterByUpdatedAt($updatedAt = null, $comparison = null)
	{
		if (is_array($updatedAt)) {
			$useMinMax = false;
			if (isset($updatedAt['min'])) {
				$this->addUsingAlias(PersonaCastingPeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($updatedAt['max'])) {
				$this->addUsingAlias(PersonaCastingPeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(PersonaCastingPeer::UPDATED_AT, $updatedAt, $comparison);
	}

	/**
	 * Filter the query on the created_at column
	 * 
	 * @param     string|array $createdAt The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PersonaCastingQuery The current query, for fluid interface
	 */
	public function filterByCreatedAt($createdAt = null, $comparison = null)
	{
		if (is_array($createdAt)) {
			$useMinMax = false;
			if (isset($createdAt['min'])) {
				$this->addUsingAlias(PersonaCastingPeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($createdAt['max'])) {
				$this->addUsingAlias(PersonaCastingPeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(PersonaCastingPeer::CREATED_AT, $createdAt, $comparison);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     int|array $id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PersonaCastingQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(PersonaCastingPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query by a related Persona object
	 *
	 * @param     Persona $persona  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PersonaCastingQuery The current query, for fluid interface
	 */
	public function filterByPersona($persona, $comparison = null)
	{
		return $this
			->addUsingAlias(PersonaCastingPeer::PERSONA_ID, $persona->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the Persona relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    PersonaCastingQuery The current query, for fluid interface
	 */
	public function joinPersona($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Persona');
		
		// create a ModelJoin object for this join
		$join = new ModelJoin();
		$join->setJoinType($joinType);
		$join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
		if ($previousJoin = $this->getPreviousJoin()) {
			$join->setPreviousJoin($previousJoin);
		}
		
		// add the ModelJoin to the current object
		if($relationAlias) {
			$this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
			$this->addJoinObject($join, $relationAlias);
		} else {
			$this->addJoinObject($join, 'Persona');
		}
		
		return $this;
	}

	/**
	 * Use the Persona relation Persona object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    PersonaQuery A secondary query class using the current class as primary query
	 */
	public function usePersonaQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinPersona($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Persona', 'PersonaQuery');
	}

	/**
	 * Filter the query by a related Casting object
	 *
	 * @param     Casting $casting  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PersonaCastingQuery The current query, for fluid interface
	 */
	public function filterByCasting($casting, $comparison = null)
	{
		return $this
			->addUsingAlias(PersonaCastingPeer::CASTING_ID, $casting->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the Casting relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    PersonaCastingQuery The current query, for fluid interface
	 */
	public function joinCasting($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Casting');
		
		// create a ModelJoin object for this join
		$join = new ModelJoin();
		$join->setJoinType($joinType);
		$join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
		if ($previousJoin = $this->getPreviousJoin()) {
			$join->setPreviousJoin($previousJoin);
		}
		
		// add the ModelJoin to the current object
		if($relationAlias) {
			$this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
			$this->addJoinObject($join, $relationAlias);
		} else {
			$this->addJoinObject($join, 'Casting');
		}
		
		return $this;
	}

	/**
	 * Use the Casting relation Casting object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    CastingQuery A secondary query class using the current class as primary query
	 */
	public function useCastingQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinCasting($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Casting', 'CastingQuery');
	}

	/**
	 * Filter the query by a related Agencia object
	 *
	 * @param     Agencia $agencia  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PersonaCastingQuery The current query, for fluid interface
	 */
	public function filterByAgencia($agencia, $comparison = null)
	{
		return $this
			->addUsingAlias(PersonaCastingPeer::AGENCIA_ID, $agencia->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the Agencia relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    PersonaCastingQuery The current query, for fluid interface
	 */
	public function joinAgencia($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Agencia');
		
		// create a ModelJoin object for this join
		$join = new ModelJoin();
		$join->setJoinType($joinType);
		$join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
		if ($previousJoin = $this->getPreviousJoin()) {
			$join->setPreviousJoin($previousJoin);
		}
		
		// add the ModelJoin to the current object
		if($relationAlias) {
			$this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
			$this->addJoinObject($join, $relationAlias);
		} else {
			$this->addJoinObject($join, 'Agencia');
		}
		
		return $this;
	}

	/**
	 * Use the Agencia relation Agencia object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    AgenciaQuery A secondary query class using the current class as primary query
	 */
	public function useAgenciaQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinAgencia($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Agencia', 'AgenciaQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     PersonaCasting $personaCasting Object to remove from the list of results
	 *
	 * @return    PersonaCastingQuery The current query, for fluid interface
	 */
	public function prune($personaCasting = null)
	{
		if ($personaCasting) {
			$this->addUsingAlias(PersonaCastingPeer::ID, $personaCasting->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BasePersonaCastingQuery
