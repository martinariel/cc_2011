<?php


/**
 * Base class that represents a query for the 'persona_lenguaje' table.
 *
 * 
 *
 * This class was autogenerated by Propel 1.5.6 on:
 *
 * Fri Mar  4 00:48:23 2011
 *
 * @method     PersonaLenguajeQuery orderByPersonaId($order = Criteria::ASC) Order by the persona_id column
 * @method     PersonaLenguajeQuery orderByLenguajeId($order = Criteria::ASC) Order by the lenguaje_id column
 * @method     PersonaLenguajeQuery orderById($order = Criteria::ASC) Order by the id column
 *
 * @method     PersonaLenguajeQuery groupByPersonaId() Group by the persona_id column
 * @method     PersonaLenguajeQuery groupByLenguajeId() Group by the lenguaje_id column
 * @method     PersonaLenguajeQuery groupById() Group by the id column
 *
 * @method     PersonaLenguajeQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     PersonaLenguajeQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     PersonaLenguajeQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     PersonaLenguajeQuery leftJoinPersona($relationAlias = null) Adds a LEFT JOIN clause to the query using the Persona relation
 * @method     PersonaLenguajeQuery rightJoinPersona($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Persona relation
 * @method     PersonaLenguajeQuery innerJoinPersona($relationAlias = null) Adds a INNER JOIN clause to the query using the Persona relation
 *
 * @method     PersonaLenguajeQuery leftJoinLenguaje($relationAlias = null) Adds a LEFT JOIN clause to the query using the Lenguaje relation
 * @method     PersonaLenguajeQuery rightJoinLenguaje($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Lenguaje relation
 * @method     PersonaLenguajeQuery innerJoinLenguaje($relationAlias = null) Adds a INNER JOIN clause to the query using the Lenguaje relation
 *
 * @method     PersonaLenguaje findOne(PropelPDO $con = null) Return the first PersonaLenguaje matching the query
 * @method     PersonaLenguaje findOneOrCreate(PropelPDO $con = null) Return the first PersonaLenguaje matching the query, or a new PersonaLenguaje object populated from the query conditions when no match is found
 *
 * @method     PersonaLenguaje findOneByPersonaId(int $persona_id) Return the first PersonaLenguaje filtered by the persona_id column
 * @method     PersonaLenguaje findOneByLenguajeId(int $lenguaje_id) Return the first PersonaLenguaje filtered by the lenguaje_id column
 * @method     PersonaLenguaje findOneById(int $id) Return the first PersonaLenguaje filtered by the id column
 *
 * @method     array findByPersonaId(int $persona_id) Return PersonaLenguaje objects filtered by the persona_id column
 * @method     array findByLenguajeId(int $lenguaje_id) Return PersonaLenguaje objects filtered by the lenguaje_id column
 * @method     array findById(int $id) Return PersonaLenguaje objects filtered by the id column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BasePersonaLenguajeQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BasePersonaLenguajeQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'propel', $modelName = 'PersonaLenguaje', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new PersonaLenguajeQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    PersonaLenguajeQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof PersonaLenguajeQuery) {
			return $criteria;
		}
		$query = new PersonaLenguajeQuery();
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
	 * @return    PersonaLenguaje|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = PersonaLenguajePeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    PersonaLenguajeQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(PersonaLenguajePeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    PersonaLenguajeQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(PersonaLenguajePeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the persona_id column
	 * 
	 * @param     int|array $personaId The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PersonaLenguajeQuery The current query, for fluid interface
	 */
	public function filterByPersonaId($personaId = null, $comparison = null)
	{
		if (is_array($personaId)) {
			$useMinMax = false;
			if (isset($personaId['min'])) {
				$this->addUsingAlias(PersonaLenguajePeer::PERSONA_ID, $personaId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($personaId['max'])) {
				$this->addUsingAlias(PersonaLenguajePeer::PERSONA_ID, $personaId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(PersonaLenguajePeer::PERSONA_ID, $personaId, $comparison);
	}

	/**
	 * Filter the query on the lenguaje_id column
	 * 
	 * @param     int|array $lenguajeId The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PersonaLenguajeQuery The current query, for fluid interface
	 */
	public function filterByLenguajeId($lenguajeId = null, $comparison = null)
	{
		if (is_array($lenguajeId)) {
			$useMinMax = false;
			if (isset($lenguajeId['min'])) {
				$this->addUsingAlias(PersonaLenguajePeer::LENGUAJE_ID, $lenguajeId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($lenguajeId['max'])) {
				$this->addUsingAlias(PersonaLenguajePeer::LENGUAJE_ID, $lenguajeId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(PersonaLenguajePeer::LENGUAJE_ID, $lenguajeId, $comparison);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     int|array $id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PersonaLenguajeQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(PersonaLenguajePeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query by a related Persona object
	 *
	 * @param     Persona $persona  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PersonaLenguajeQuery The current query, for fluid interface
	 */
	public function filterByPersona($persona, $comparison = null)
	{
		return $this
			->addUsingAlias(PersonaLenguajePeer::PERSONA_ID, $persona->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the Persona relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    PersonaLenguajeQuery The current query, for fluid interface
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
	 * Filter the query by a related Lenguaje object
	 *
	 * @param     Lenguaje $lenguaje  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PersonaLenguajeQuery The current query, for fluid interface
	 */
	public function filterByLenguaje($lenguaje, $comparison = null)
	{
		return $this
			->addUsingAlias(PersonaLenguajePeer::LENGUAJE_ID, $lenguaje->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the Lenguaje relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    PersonaLenguajeQuery The current query, for fluid interface
	 */
	public function joinLenguaje($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Lenguaje');
		
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
			$this->addJoinObject($join, 'Lenguaje');
		}
		
		return $this;
	}

	/**
	 * Use the Lenguaje relation Lenguaje object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    LenguajeQuery A secondary query class using the current class as primary query
	 */
	public function useLenguajeQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinLenguaje($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Lenguaje', 'LenguajeQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     PersonaLenguaje $personaLenguaje Object to remove from the list of results
	 *
	 * @return    PersonaLenguajeQuery The current query, for fluid interface
	 */
	public function prune($personaLenguaje = null)
	{
		if ($personaLenguaje) {
			$this->addUsingAlias(PersonaLenguajePeer::ID, $personaLenguaje->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BasePersonaLenguajeQuery