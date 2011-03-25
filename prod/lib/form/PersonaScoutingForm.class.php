<?php

/**
 * PersonaScouting form.
 *
 * @package    cc
 * @subpackage form
 * @author     Your name here
 */
class PersonaScoutingForm extends BasePersonaScoutingForm
{
  public function configure()
  {
      $this->widgetSchema['fecha']
           ->setOption( 'format',   GlobalValues::formatoFecha         )   
           ->setOption( 'years',    GlobalValues::rangoFechaScouting() );

  }
}
