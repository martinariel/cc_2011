<?php


/**
 * Base class that represents a query for the 'nacionalidad' table.
 *
 * 
 *
 * This class was autogenerated by Propel 1.5.6 on:
 *
 * Fri Mar  4 00:48:22 2011
 *
 * @method     NacionalidadQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     NacionalidadQuery orderByDescripcion($order = Criteria::ASC) Order by the descripcion column
 *
 * @method     NacionalidadQuery groupById() Group by the id column
 * @method     NacionalidadQuery groupByDescripcion() Group by the descripcion column
 *
 * @method     NacionalidadQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     NacionalidadQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     NacionalidadQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     NacionalidadQuery leftJoinPersona($relationAlias = null) Adds a LEFT JOIN clause to the query using the Persona relation
 * @method     NacionalidadQuery rightJoinPersona($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Persona relation
 * @method     NacionalidadQuery innerJoinPersona($relationAlias = null) Adds a INNER JOIN clause to the query using the Persona relation
 *
 * @method     NacionalidadQuery leftJoinPersonaScouting($relationAlias = null) Adds a LEFT JOIN clause to the query using the PersonaScouting relation
 * @method     NacionalidadQuery rightJoinPersonaScouting($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PersonaScouting relation
 * @method     NacionalidadQuery innerJoinPersonaScouting($relationAlias = null) Adds a INNER JOIN clause to the query using the PersonaScouting relation
 *
 * @method     Nacionalidad findOne(PropelPDO $con = null) Return the first Nacionalidad matching the query
 * @method     Nacionalidad findOneOrCreate(PropelPDO $con = null) Return the first Nacionalidad matching the query, or a new Nacionalidad object populated from the query conditions when no match is found
 *
 * @method     Nacionalidad findOneById(int $id) Return the first Nacionalidad filtered by the id column
 * @method     Nacionalidad findOneByDescripcion(string $descripcion) Return the first Nacionalidad filtered by the descripcion column
 *
 * @method     array findById(int $id) Return Nacionalidad objects filtered by the id column
 * @method     array findByDescripcion(string $descripcion) Return Nacionalidad objects filtered by the descripcion column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseNacionalidadQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseNacionalidadQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'propel', $modelName = 'Nacionalidad', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new NacionalidadQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    NacionalidadQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof NacionalidadQuery) {
			return $criteria;
		}
		$query = new NacionalidadQuery();
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
	 * @return    Nacionalidad|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = NacionalidadPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    NacionalidadQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(NacionalidadPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    NacionalidadQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(NacionalidadPeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     int|array $id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    NacionalidadQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(NacionalidadPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the descripcion column
	 * 
	 * @param     string $descripcion The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    NacionalidadQuery The current query, for fluid interface
	 */
	public function filterByDescripcion($descripcion = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($descripcion)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $descripcion)) {
				$descripcion = str_replace('*', '%', $descripcion);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(NacionalidadPeer::DESCRIPCION, $descripcion, $comparison);
	}

	/**
	 * Filter the query by a related Persona object
	 *
	 * @param     Persona $persona  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    NacionalidadQuery The current query, for fluid interface
	 */
	public function filterByPersona($persona, $comparison = null)
	{
		return $this
			->addUsingAlias(NacionalidadPeer::ID, $persona->getNacionalidadId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the Persona relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    NacionalidadQuery The current query, for fluid interface
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
	 * Filter the query by a related PersonaScouting object
	 *
	 * @param     PersonaScouting $personaScouting  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    NacionalidadQuery The current query, for fluid interface
	 */
	public function filterByPersonaScouting($personaScouting, $comparison = null)
	{
		return $this
			->addUsingAlias(NacionalidadPeer::ID, $personaScouting->getNacionalidadId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the PersonaScouting relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    NacionalidadQuery The current query, for fluid interface
	 */
	public function joinPersonaScouting($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('PersonaScouting');
		
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
			$this->addJoinObject($join, 'PersonaScouting');
		}
		
		return $this;
	}

	/**
	 * Use the PersonaScouting relation PersonaScouting object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    PersonaScoutingQuery A secondary query class using the current class as primary query
	 */
	public function usePersonaScoutingQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinPersonaScouting($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'PersonaScouting', 'PersonaScoutingQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     Nacionalidad $nacionalidad Object to remove from the list of results
	 *
	 * @return    NacionalidadQuery The current query, for fluid interface
	 */
	public function prune($nacionalidad = null)
	{
		if ($nacionalidad) {
			$this->addUsingAlias(NacionalidadPeer::ID, $nacionalidad->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BaseNacionalidadQuery
