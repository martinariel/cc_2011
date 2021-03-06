<?php


/**
 * Base class that represents a query for the 'codigos_scouting' table.
 *
 * 
 *
 * This class was autogenerated by Propel 1.5.6 on:
 *
 * Wed Mar  2 22:33:45 2011
 *
 * @method     CodigosScoutingQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     CodigosScoutingQuery orderByCodigo($order = Criteria::ASC) Order by the codigo column
 * @method     CodigosScoutingQuery orderByDescripcion($order = Criteria::ASC) Order by the descripcion column
 * @method     CodigosScoutingQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 * @method     CodigosScoutingQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 *
 * @method     CodigosScoutingQuery groupById() Group by the id column
 * @method     CodigosScoutingQuery groupByCodigo() Group by the codigo column
 * @method     CodigosScoutingQuery groupByDescripcion() Group by the descripcion column
 * @method     CodigosScoutingQuery groupByUpdatedAt() Group by the updated_at column
 * @method     CodigosScoutingQuery groupByCreatedAt() Group by the created_at column
 *
 * @method     CodigosScoutingQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     CodigosScoutingQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     CodigosScoutingQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     CodigosScouting findOne(PropelPDO $con = null) Return the first CodigosScouting matching the query
 * @method     CodigosScouting findOneOrCreate(PropelPDO $con = null) Return the first CodigosScouting matching the query, or a new CodigosScouting object populated from the query conditions when no match is found
 *
 * @method     CodigosScouting findOneById(int $id) Return the first CodigosScouting filtered by the id column
 * @method     CodigosScouting findOneByCodigo(string $codigo) Return the first CodigosScouting filtered by the codigo column
 * @method     CodigosScouting findOneByDescripcion(string $descripcion) Return the first CodigosScouting filtered by the descripcion column
 * @method     CodigosScouting findOneByUpdatedAt(string $updated_at) Return the first CodigosScouting filtered by the updated_at column
 * @method     CodigosScouting findOneByCreatedAt(string $created_at) Return the first CodigosScouting filtered by the created_at column
 *
 * @method     array findById(int $id) Return CodigosScouting objects filtered by the id column
 * @method     array findByCodigo(string $codigo) Return CodigosScouting objects filtered by the codigo column
 * @method     array findByDescripcion(string $descripcion) Return CodigosScouting objects filtered by the descripcion column
 * @method     array findByUpdatedAt(string $updated_at) Return CodigosScouting objects filtered by the updated_at column
 * @method     array findByCreatedAt(string $created_at) Return CodigosScouting objects filtered by the created_at column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseCodigosScoutingQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseCodigosScoutingQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'propel', $modelName = 'CodigosScouting', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new CodigosScoutingQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    CodigosScoutingQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof CodigosScoutingQuery) {
			return $criteria;
		}
		$query = new CodigosScoutingQuery();
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
	 * @return    CodigosScouting|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = CodigosScoutingPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    CodigosScoutingQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(CodigosScoutingPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    CodigosScoutingQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(CodigosScoutingPeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     int|array $id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CodigosScoutingQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(CodigosScoutingPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the codigo column
	 * 
	 * @param     string $codigo The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CodigosScoutingQuery The current query, for fluid interface
	 */
	public function filterByCodigo($codigo = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($codigo)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $codigo)) {
				$codigo = str_replace('*', '%', $codigo);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(CodigosScoutingPeer::CODIGO, $codigo, $comparison);
	}

	/**
	 * Filter the query on the descripcion column
	 * 
	 * @param     string $descripcion The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CodigosScoutingQuery The current query, for fluid interface
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
		return $this->addUsingAlias(CodigosScoutingPeer::DESCRIPCION, $descripcion, $comparison);
	}

	/**
	 * Filter the query on the updated_at column
	 * 
	 * @param     string|array $updatedAt The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CodigosScoutingQuery The current query, for fluid interface
	 */
	public function filterByUpdatedAt($updatedAt = null, $comparison = null)
	{
		if (is_array($updatedAt)) {
			$useMinMax = false;
			if (isset($updatedAt['min'])) {
				$this->addUsingAlias(CodigosScoutingPeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($updatedAt['max'])) {
				$this->addUsingAlias(CodigosScoutingPeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(CodigosScoutingPeer::UPDATED_AT, $updatedAt, $comparison);
	}

	/**
	 * Filter the query on the created_at column
	 * 
	 * @param     string|array $createdAt The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CodigosScoutingQuery The current query, for fluid interface
	 */
	public function filterByCreatedAt($createdAt = null, $comparison = null)
	{
		if (is_array($createdAt)) {
			$useMinMax = false;
			if (isset($createdAt['min'])) {
				$this->addUsingAlias(CodigosScoutingPeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($createdAt['max'])) {
				$this->addUsingAlias(CodigosScoutingPeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(CodigosScoutingPeer::CREATED_AT, $createdAt, $comparison);
	}

	/**
	 * Exclude object from result
	 *
	 * @param     CodigosScouting $codigosScouting Object to remove from the list of results
	 *
	 * @return    CodigosScoutingQuery The current query, for fluid interface
	 */
	public function prune($codigosScouting = null)
	{
		if ($codigosScouting) {
			$this->addUsingAlias(CodigosScoutingPeer::ID, $codigosScouting->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BaseCodigosScoutingQuery
