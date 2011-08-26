<?php


/**
 * Base class that represents a query for the 'sinonimo' table.
 *
 * 
 *
 * This class was autogenerated by Propel 1.5.6 on:
 *
 * Fri Mar  4 00:48:23 2011
 *
 * @method     SinonimoQuery orderByOrigen($order = Criteria::ASC) Order by the origen column
 * @method     SinonimoQuery orderByDestino($order = Criteria::ASC) Order by the destino column
 * @method     SinonimoQuery orderById($order = Criteria::ASC) Order by the id column
 *
 * @method     SinonimoQuery groupByOrigen() Group by the origen column
 * @method     SinonimoQuery groupByDestino() Group by the destino column
 * @method     SinonimoQuery groupById() Group by the id column
 *
 * @method     SinonimoQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     SinonimoQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     SinonimoQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     Sinonimo findOne(PropelPDO $con = null) Return the first Sinonimo matching the query
 * @method     Sinonimo findOneOrCreate(PropelPDO $con = null) Return the first Sinonimo matching the query, or a new Sinonimo object populated from the query conditions when no match is found
 *
 * @method     Sinonimo findOneByOrigen(string $origen) Return the first Sinonimo filtered by the origen column
 * @method     Sinonimo findOneByDestino(string $destino) Return the first Sinonimo filtered by the destino column
 * @method     Sinonimo findOneById(int $id) Return the first Sinonimo filtered by the id column
 *
 * @method     array findByOrigen(string $origen) Return Sinonimo objects filtered by the origen column
 * @method     array findByDestino(string $destino) Return Sinonimo objects filtered by the destino column
 * @method     array findById(int $id) Return Sinonimo objects filtered by the id column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseSinonimoQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseSinonimoQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'propel', $modelName = 'Sinonimo', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new SinonimoQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    SinonimoQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof SinonimoQuery) {
			return $criteria;
		}
		$query = new SinonimoQuery();
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
	 * @return    Sinonimo|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = SinonimoPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    SinonimoQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(SinonimoPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    SinonimoQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(SinonimoPeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the origen column
	 * 
	 * @param     string $origen The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SinonimoQuery The current query, for fluid interface
	 */
	public function filterByOrigen($origen = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($origen)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $origen)) {
				$origen = str_replace('*', '%', $origen);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(SinonimoPeer::ORIGEN, $origen, $comparison);
	}

	/**
	 * Filter the query on the destino column
	 * 
	 * @param     string $destino The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SinonimoQuery The current query, for fluid interface
	 */
	public function filterByDestino($destino = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($destino)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $destino)) {
				$destino = str_replace('*', '%', $destino);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(SinonimoPeer::DESTINO, $destino, $comparison);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     int|array $id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SinonimoQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(SinonimoPeer::ID, $id, $comparison);
	}

	/**
	 * Exclude object from result
	 *
	 * @param     Sinonimo $sinonimo Object to remove from the list of results
	 *
	 * @return    SinonimoQuery The current query, for fluid interface
	 */
	public function prune($sinonimo = null)
	{
		if ($sinonimo) {
			$this->addUsingAlias(SinonimoPeer::ID, $sinonimo->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BaseSinonimoQuery