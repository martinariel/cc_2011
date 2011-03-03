<?php


/**
 * Skeleton subclass for representing a row from the 'scout_import' table.
 *
 * 
 *
 * This class was autogenerated by Propel 1.4.2 on:
 *
 * 01/22/11 21:25:07
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    lib.model
 */
class ScoutImport extends BaseScoutImport {

	/**
	 * Initializes internal state of ScoutImport object.
	 * @see        parent::__construct()
	 */
	public function __construct()
	{
		// Make sure that parent constructor is always invoked, since that
		// is where any default values for this object are set.
		parent::__construct();
	}
	
	/**
	 * Retorna la fecha de naciento calculada.
	 */
	public function calcularFechaNacimiento ()
	{
		if ( $this->getEdad() < 0 )
			return null;
		else
		{
			$anio = $this->getAnio() - $this->getEdad();
			$dt = new DateTime();
			$dt->setDate($anio, 1, 1);
			return $dt;
		}
	}
	
	
	/**
	 * Crea el objeto scout_persona, relacionandolo con todas sus dimensiones
	 */
	public function crearPersona () 
	{
		$persona = null;
	
		// 1 - FK Buscar Lugar
		$lugar = LugarPeer::buscar( $this->getLugarScout() );
		
		// 2 - FK Buscar codigo
		$codigo = CodigosScoutingPeer::buscar ( $this->getCodigoAgrupador() );
		
		// 3 - FK Nacionalidad
		$nacionalidad = NacionalidadPeer::buscar ($this->getNacionalidad() );
	
		// 4 - Fecha de Nacimiento
		$fechaNacimiento = GlobalFunctions::parsearFecha( $this->getFechaNacimiento());
		
		if ( $fechaNacimiento == null )
		{
			$fechaNacimiento = $this->calcularFechaNacimiento();
		}
		// 5 - Fecha de Scouting
		$fechaScouting = GlobalFunctions::parsearFecha( $this->getFechaScout() );
		
		// TODO: Si no tengo fecha de scouting, la armo a partir de anio, mes y dia de scouting
		// atributos de como encontre el xls.
		
		// 6 - Personas con igual nombre e igual anio de nacimiento.
		$personas = PersonaPeer::buscarPersonasPorNombreyAnioNacimiento( $this->getNombre(), $fechaNacimiento );
		
		if ( $personas != null )
		{
			for ( $i = 0 ; $i < count($personas) ; $i++ )
			{
				$persona = $personas[$i];
				
				// Quizas no sea la misma persona.
			
				$mes1  = $persona->getFechaNacimiento('m');
				$dia1  = $persona->getFechaNacimiento('d');
			
				$mes2  = $fechaNacimiento->format('m');
				$dia2  = $fechaNacimiento->format('d');
				
				if ( !(( $mes1 == 1 && $dia1 == 1) || ($mes2 == 1 && $dia2 == 1)) )
				{
					if ( $mes1 != $mes2 || $dia1 != $dia2 )
					{
						unset ( $personas[$i] );
					}
				}
			}
			
			$matchCount = 0;
			for ( $i = 0 ; $i < count($personas) ; $i++ )
			{
				if ( isset($personas[$i]))
				{
					$persona = $personas[$i];
					$matchCount++; 
				}
			}
			
			if ($matchCount > 1)
				$persona = null;
				
			if ( $persona != null )
			{
				// Actualizo los datos de la persona.
				// TODO, necesito una fecha en Persona que me indique de que fecha son los datos.
				// la comparo con fecha de scouting, si esta ultima es mayor, hay que actualizar los
				// datos de la persona.
			}
			
		}
		
		$f_new = false; 
		
		if ( $persona == null )
		{
			// por ahora creo la nueva persona
			$persona = new Persona();
			$persona->setNombre (trim(strtoupper($this->getNombre())));
			$persona->setPeso ( $this->getPeso() );
			$persona->setAltura ( $this->getAltura() );	
			$persona->setFechaNacimiento($fechaNacimiento);
			$persona->setTelefono($this->getTelefono());
			$persona->setCelular ($this->getCelular() );
			$persona->setEmail($this->getEmail());
			$persona->setObservaciones( $this->getObservaciones() );
			$persona->setNacionalidad($nacionalidad);
			$persona->save();
			
			$f_new = true;
		}
		
		$scout = new PersonaScouting();
		$scout->setPersona ( $persona );
		$scout->setLugar( $lugar );
		$scout->setIdCodigo( $codigo->getId() );
		$scout->setFecha($fechaScouting);
		$scout->setTelefono($this->getTelefono());
		$scout->setCelular ($this->getCelular() );
		$scout->setEmail($this->getEmail());
		$scout->setPeso ( $this->getPeso() );
		$scout->setAltura ( $this->getAltura() );
		$scout->setActividades($this->getActividades());
		$scout->setObservaciones($this->getObservaciones());
		$scout->setDiaContador($this->getDia());
		$scout->setMes($this->getMes());
		$scout->setAnio($this->getAnio());
		
		$scout->save();
		
		// Cargamos la media.
		MediaPeer::doMediaScout( $scout , $this , $f_new );
	
	}

} // ScoutImport
