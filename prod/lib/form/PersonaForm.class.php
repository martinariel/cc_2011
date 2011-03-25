<?php

/**
 * Persona form.
 *
 * @package    cc
 * @subpackage form
 * @author     Your name here
 */
class PersonaForm extends BasePersonaForm
{
  public function configure()
  {
      $this->widgetSchema['fecha_nacimiento']
           ->setOption( 'format',   GlobalValues::formatoFecha           )
           ->setOption( 'years',    GlobalValues::rangoFechaNacimiento() );
  }
}
