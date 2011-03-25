<?php


/**
 * Base class that represents a query for the 'agencia' table.
 *
 * 
 *
 * This class was autogenerated by Propel 1.5.6 on:
 *
 * Fri Mar  4 00:48:22 2011
 *
 * @method     AgenciaQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     AgenciaQuery orderByNombre($order = Criteria::ASC) Order by the nombre column
 * @method     AgenciaQuery orderByPrioridad($order = Criteria::ASC) Order by the prioridad column
 * @method     AgenciaQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 *
 * @method     AgenciaQuery groupById() Group by the id column
 * @method     AgenciaQuery groupByNombre() Group by the nombre column
 * @method     AgenciaQuery groupByPrioridad() Group by the prioridad column
 * @method     AgenciaQuery groupByCreatedAt() Group by the created_at column
 *
 * @method     AgenciaQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     AgenciaQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     AgenciaQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     AgenciaQuery leftJoinPersonaCasting($relationAlias = null) Adds a LEFT JOIN clause to the query using the PersonaCasting relation
 * @method     AgenciaQuery rightJoinPersonaCasting($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PersonaCasting relation
 * @method     AgenciaQuery innerJoinPersonaCasting($relationAlias = null) Adds a INNER JOIN clause to the query using the PersonaCasting relation
 *
 * @method     Agencia findOne(PropelPDO $con = null) Return the first Agencia matching the query
 * @method     Agencia findOneOrCreate(PropelPDO $con = null) Return the first Agencia matching the query, or a new Agencia object populated from the query conditions when no match is found
 *
 * @method     Agencia findOneById(int $id) Return the first Agencia filtered by the id column
 * @method     Agencia findOneByNombre(string $nombre) Return the first Agencia filtered by the nombre column
 * @method     Agencia findOneByPrioridad(int $prioridad) Return the first Agencia filtered by the prioridad column
 * @method     Agencia findOneByCreatedAt(string $created_at) Return the first Agencia filtered by the created_at column
 *
 * @method     array findById(int $id) Return Agencia objects filtered by the id column
 * @method     array findByNombre(string $nombre) Return Agencia objects filtered by the nombre column
 * @method     array findByPrioridad(int $prioridad) Return Agencia objects filtered by the prioridad column
 * @method     array findByCreatedAt(string $created_at) Return Agencia objects filtered by the created_at column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseAgenciaQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseAgenciaQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'propel', $modelName = 'Agencia', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new AgenciaQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    AgenciaQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof AgenciaQuery) {
			return $criteria;
		}
		$query = new AgenciaQuery();
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
	 * @return    Agencia|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = AgenciaPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    AgenciaQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(AgenciaPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    AgenciaQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(AgenciaPeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     int|array $id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AgenciaQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(AgenciaPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the nombre column
	 * 
	 * @param     string $nombre The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AgenciaQuery The current query, for fluid interface
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
		return $this->addUsingAlias(AgenciaPeer::NOMBRE, $nombre, $comparison);
	}

	/**
	 * Filter the query on the prioridad column
	 * 
	 * @param     int|array $prioridad The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AgenciaQuery The current query, for fluid interface
	 */
	public function filterByPrioridad($prioridad = null, $comparison = null)
	{
		if (is_array($prioridad)) {
			$useMinMax = false;
			if (isset($prioridad['min'])) {
				$this->addUsingAlias(AgenciaPeer::PRIORIDAD, $prioridad['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($prioridad['max'])) {
				$this->addUsingAlias(AgenciaPeer::PRIORIDAD, $prioridad['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(AgenciaPeer::PRIORIDAD, $prioridad, $comparison);
	}

	/**
	 * Filter the query on the created_at column
	 * 
	 * @param     string|array $createdAt The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AgenciaQuery The current query, for fluid interface
	 */
	public function filterByCreatedAt($createdAt = null, $comparison = null)
	{
		if (is_array($createdAt)) {
			$useMinMax = false;
			if (isset($createdAt['min'])) {
				$this->addUsingAlias(AgenciaPeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($createdAt['max'])) {
				$this->addUsingAlias(AgenciaPeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(AgenciaPeer::CREATED_AT, $createdAt, $comparison);
	}

	/**
	 * Filter the query by a related PersonaCasting object
	 *
	 * @param     PersonaCasting $personaCasting  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AgenciaQuery The current query, for fluid interface
	 */
	public function filterByPersonaCasting($personaCasting, $comparison = null)
	{
		return $this
			->addUsingAlias(AgenciaPeer::ID, $personaCasting->getAgenciaId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the PersonaCasting relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    AgenciaQuery The current query, for fluid interface
	 */
	public function joinPersonaCasting($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('PersonaCasting');
		
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
			$this->addJoinObject($join, 'PersonaCasting');
		}
		
		return $this;
	}

	/**
	 * Use the PersonaCasting relation PersonaCasting object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    PersonaCastingQuery A secondary query class using the current class as primary query
	 */
	public function usePersonaCastingQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinPersonaCasting($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'PersonaCasting', 'PersonaCastingQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     Agencia $agencia Object to remove from the list of results
	 *
	 * @return    AgenciaQuery The current query, for fluid interface
	 */
	public function prune($agencia = null)
	{
		if ($agencia) {
			$this->addUsingAlias(AgenciaPeer::ID, $agencia->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BaseAgenciaQuery