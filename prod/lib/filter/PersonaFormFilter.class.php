<?php

/**
 * Persona filter form.
 *
 * @package    cc
 * @subpackage filter
 * @author     Your name here
 */
class PersonaFormFilter extends BasePersonaFormFilter
{
  public function configure()
  {
      $this->widgetSchema['fecha_nacimiento']
           ->setOption( 'from_date', GlobalValues::widgetFechaNacimiento() )
           ->setOption( 'to_date',   GlobalValues::widgetFechaNacimiento() )
           ->setOption( 'template' , GlobalValues::formatoComboFechaFiltro ); 
  }
}
