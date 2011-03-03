<?php


/**
 * Base class that represents a query for the 'media' table.
 *
 * 
 *
 * This class was autogenerated by Propel 1.5.6 on:
 *
 * Wed Mar  2 22:33:45 2011
 *
 * @method     MediaQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     MediaQuery orderByArchivo($order = Criteria::ASC) Order by the archivo column
 * @method     MediaQuery orderByTipo($order = Criteria::ASC) Order by the tipo column
 * @method     MediaQuery orderByPersonaId($order = Criteria::ASC) Order by the persona_id column
 * @method     MediaQuery orderByPersonasScoutingId($order = Criteria::ASC) Order by the personas_scouting_id column
 * @method     MediaQuery orderByPersonasCastingId($order = Criteria::ASC) Order by the personas_casting_id column
 * @method     MediaQuery orderByOrden($order = Criteria::ASC) Order by the orden column
 * @method     MediaQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 *
 * @method     MediaQuery groupById() Group by the id column
 * @method     MediaQuery groupByArchivo() Group by the archivo column
 * @method     MediaQuery groupByTipo() Group by the tipo column
 * @method     MediaQuery groupByPersonaId() Group by the persona_id column
 * @method     MediaQuery groupByPersonasScoutingId() Group by the personas_scouting_id column
 * @method     MediaQuery groupByPersonasCastingId() Group by the personas_casting_id column
 * @method     MediaQuery groupByOrden() Group by the orden column
 * @method     MediaQuery groupByCreatedAt() Group by the created_at column
 *
 * @method     MediaQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     MediaQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     MediaQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     MediaQuery leftJoinPersona($relationAlias = null) Adds a LEFT JOIN clause to the query using the Persona relation
 * @method     MediaQuery rightJoinPersona($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Persona relation
 * @method     MediaQuery innerJoinPersona($relationAlias = null) Adds a INNER JOIN clause to the query using the Persona relation
 *
 * @method     Media findOne(PropelPDO $con = null) Return the first Media matching the query
 * @method     Media findOneOrCreate(PropelPDO $con = null) Return the first Media matching the query, or a new Media object populated from the query conditions when no match is found
 *
 * @method     Media findOneById(int $id) Return the first Media filtered by the id column
 * @method     Media findOneByArchivo(string $archivo) Return the first Media filtered by the archivo column
 * @method     Media findOneByTipo(string $tipo) Return the first Media filtered by the tipo column
 * @method     Media findOneByPersonaId(int $persona_id) Return the first Media filtered by the persona_id column
 * @method     Media findOneByPersonasScoutingId(int $personas_scouting_id) Return the first Media filtered by the personas_scouting_id column
 * @method     Media findOneByPersonasCastingId(int $personas_casting_id) Return the first Media filtered by the personas_casting_id column
 * @method     Media findOneByOrden(int $orden) Return the first Media filtered by the orden column
 * @method     Media findOneByCreatedAt(string $created_at) Return the first Media filtered by the created_at column
 *
 * @method     array findById(int $id) Return Media objects filtered by the id column
 * @method     array findByArchivo(string $archivo) Return Media objects filtered by the archivo column
 * @method     array findByTipo(string $tipo) Return Media objects filtered by the tipo column
 * @method     array findByPersonaId(int $persona_id) Return Media objects filtered by the persona_id column
 * @method     array findByPersonasScoutingId(int $personas_scouting_id) Return Media objects filtered by the personas_scouting_id column
 * @method     array findByPersonasCastingId(int $personas_casting_id) Return Media objects filtered by the personas_casting_id column
 * @method     array findByOrden(int $orden) Return Media objects filtered by the orden column
 * @method     array findByCreatedAt(string $created_at) Return Media objects filtered by the created_at column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseMediaQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseMediaQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'propel', $modelName = 'Media', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new MediaQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    MediaQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof MediaQuery) {
			return $criteria;
		}
		$query = new MediaQuery();
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
	 * @return    Media|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = MediaPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    MediaQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(MediaPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    MediaQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(MediaPeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     int|array $id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    MediaQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(MediaPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the archivo column
	 * 
	 * @param     string $archivo The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    MediaQuery The current query, for fluid interface
	 */
	public function filterByArchivo($archivo = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($archivo)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $archivo)) {
				$archivo = str_replace('*', '%', $archivo);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(MediaPeer::ARCHIVO, $archivo, $comparison);
	}

	/**
	 * Filter the query on the tipo column
	 * 
	 * @param     string $tipo The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    MediaQuery The current query, for fluid interface
	 */
	public function filterByTipo($tipo = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($tipo)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $tipo)) {
				$tipo = str_replace('*', '%', $tipo);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(MediaPeer::TIPO, $tipo, $comparison);
	}

	/**
	 * Filter the query on the persona_id column
	 * 
	 * @param     int|array $personaId The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    MediaQuery The current query, for fluid interface
	 */
	public function filterByPersonaId($personaId = null, $comparison = null)
	{
		if (is_array($personaId)) {
			$useMinMax = false;
			if (isset($personaId['min'])) {
				$this->addUsingAlias(MediaPeer::PERSONA_ID, $personaId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($personaId['max'])) {
				$this->addUsingAlias(MediaPeer::PERSONA_ID, $personaId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(MediaPeer::PERSONA_ID, $personaId, $comparison);
	}

	/**
	 * Filter the query on the personas_scouting_id column
	 * 
	 * @param     int|array $personasScoutingId The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    MediaQuery The current query, for fluid interface
	 */
	public function filterByPersonasScoutingId($personasScoutingId = null, $comparison = null)
	{
		if (is_array($personasScoutingId)) {
			$useMinMax = false;
			if (isset($personasScoutingId['min'])) {
				$this->addUsingAlias(MediaPeer::PERSONAS_SCOUTING_ID, $personasScoutingId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($personasScoutingId['max'])) {
				$this->addUsingAlias(MediaPeer::PERSONAS_SCOUTING_ID, $personasScoutingId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(MediaPeer::PERSONAS_SCOUTING_ID, $personasScoutingId, $comparison);
	}

	/**
	 * Filter the query on the personas_casting_id column
	 * 
	 * @param     int|array $personasCastingId The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    MediaQuery The current query, for fluid interface
	 */
	public function filterByPersonasCastingId($personasCastingId = null, $comparison = null)
	{
		if (is_array($personasCastingId)) {
			$useMinMax = false;
			if (isset($personasCastingId['min'])) {
				$this->addUsingAlias(MediaPeer::PERSONAS_CASTING_ID, $personasCastingId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($personasCastingId['max'])) {
				$this->addUsingAlias(MediaPeer::PERSONAS_CASTING_ID, $personasCastingId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(MediaPeer::PERSONAS_CASTING_ID, $personasCastingId, $comparison);
	}

	/**
	 * Filter the query on the orden column
	 * 
	 * @param     int|array $orden The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    MediaQuery The current query, for fluid interface
	 */
	public function filterByOrden($orden = null, $comparison = null)
	{
		if (is_array($orden)) {
			$useMinMax = false;
			if (isset($orden['min'])) {
				$this->addUsingAlias(MediaPeer::ORDEN, $orden['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($orden['max'])) {
				$this->addUsingAlias(MediaPeer::ORDEN, $orden['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(MediaPeer::ORDEN, $orden, $comparison);
	}

	/**
	 * Filter the query on the created_at column
	 * 
	 * @param     string|array $createdAt The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    MediaQuery The current query, for fluid interface
	 */
	public function filterByCreatedAt($createdAt = null, $comparison = null)
	{
		if (is_array($createdAt)) {
			$useMinMax = false;
			if (isset($createdAt['min'])) {
				$this->addUsingAlias(MediaPeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($createdAt['max'])) {
				$this->addUsingAlias(MediaPeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(MediaPeer::CREATED_AT, $createdAt, $comparison);
	}

	/**
	 * Filter the query by a related Persona object
	 *
	 * @param     Persona $persona  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    MediaQuery The current query, for fluid interface
	 */
	public function filterByPersona($persona, $comparison = null)
	{
		return $this
			->addUsingAlias(MediaPeer::PERSONA_ID, $persona->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the Persona relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    MediaQuery The current query, for fluid interface
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
	 * Exclude object from result
	 *
	 * @param     Media $media Object to remove from the list of results
	 *
	 * @return    MediaQuery The current query, for fluid interface
	 */
	public function prune($media = null)
	{
		if ($media) {
			$this->addUsingAlias(MediaPeer::ID, $media->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BaseMediaQuery
