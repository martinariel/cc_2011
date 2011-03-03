<?php


/**
 * Skeleton subclass for performing query and update operations on the 'lugar' table.
 *
 * 
 *
 * This class was autogenerated by Propel 1.4.2 on:
 *
 * 01/22/11 21:25:08
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    lib.model
 */
class LugarPeer extends BaseLugarPeer {

	public static function buscar ( $descripcion )
	{
		$lugar = null;
		
		if ( $descripcion == "" )
		{
			$lugar = self::retrieveByPK(-1);
		}
		else 
		{
			$c = new Criteria();
			
			$c->add ( self::DESCRIPCION , $descripcion , Criteria::EQUAL );
			
			$lugares = self::doSelect ( $c );
			
			if ( count($lugares) == 0 )
			{
				$lugar = new Lugar();
				$lugar->setDescripcion( $descripcion );
				$lugar->save();
			}
			else 
			{
				$lugar = $lugares[0];
			}
		}
		return $lugar;
	}
} // LugarPeer
