<?php



/**
 * This class defines the structure of the 'persona_scouting' table.
 *
 *
 * This class was autogenerated by Propel 1.5.6 on:
 *
 * Fri Mar  4 00:48:23 2011
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.lib.model.map
 */
class PersonaScoutingTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.PersonaScoutingTableMap';

	/**
	 * Initialize the table attributes, columns and validators
	 * Relations are not initialized by this method since they are lazy loaded
	 *
	 * @return     void
	 * @throws     PropelException
	 */
	public function initialize()
	{
	  // attributes
		$this->setName('persona_scouting');
		$this->setPhpName('PersonaScouting');
		$this->setClassname('PersonaScouting');
		$this->setPackage('lib.model');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addColumn('ANIO', 'Anio', 'INTEGER', true, null, 0);
		$this->addColumn('ID_CODIGO', 'IdCodigo', 'INTEGER', true, null, 0);
		$this->addColumn('MES', 'Mes', 'INTEGER', true, null, 0);
		$this->addColumn('DIA_CONTADOR', 'DiaContador', 'INTEGER', true, null, 0);
		$this->addColumn('FECHA', 'Fecha', 'DATE', false, null, null);
		$this->addForeignKey('PERSONA_ID', 'PersonaId', 'INTEGER', 'persona', 'ID', false, null, null);
		$this->addColumn('PESO', 'Peso', 'INTEGER', true, null, 0);
		$this->addColumn('ALTURA', 'Altura', 'INTEGER', true, null, 0);
		$this->addColumn('EMAIL', 'Email', 'VARCHAR', false, 45, null);
		$this->addColumn('TELEFONO', 'Telefono', 'VARCHAR', false, 20, null);
		$this->addColumn('CELULAR', 'Celular', 'VARCHAR', false, 20, null);
		$this->addColumn('ACTIVIDADES', 'Actividades', 'VARCHAR', false, 255, null);
		$this->addColumn('OBSERVACIONES', 'Observaciones', 'VARCHAR', true, 255, '');
		$this->addForeignKey('LUGAR_ID', 'LugarId', 'INTEGER', 'lugar', 'ID', false, null, null);
		$this->addForeignKey('NACIONALIDAD_ID', 'NacionalidadId', 'INTEGER', 'nacionalidad', 'ID', false, null, null);
		$this->addColumn('CREATED_AT', 'CreatedAt', 'TIMESTAMP', false, null, null);
		$this->addColumn('UPDATED_AT', 'UpdatedAt', 'TIMESTAMP', false, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('Persona', 'Persona', RelationMap::MANY_TO_ONE, array('persona_id' => 'id', ), null, null);
    $this->addRelation('Lugar', 'Lugar', RelationMap::MANY_TO_ONE, array('lugar_id' => 'id', ), null, null);
    $this->addRelation('Nacionalidad', 'Nacionalidad', RelationMap::MANY_TO_ONE, array('nacionalidad_id' => 'id', ), null, null);
	} // buildRelations()

	/**
	 * 
	 * Gets the list of behaviors registered for this table
	 * 
	 * @return array Associative array (name => parameters) of behaviors
	 */
	public function getBehaviors()
	{
		return array(
			'symfony' => array('form' => 'true', 'filter' => 'true', ),
			'symfony_behaviors' => array(),
			'symfony_timestampable' => array('create_column' => 'created_at', 'update_column' => 'updated_at', ),
		);
	} // getBehaviors()

} // PersonaScoutingTableMap
