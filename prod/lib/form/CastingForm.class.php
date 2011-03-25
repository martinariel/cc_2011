<?php

/**
 * Casting form.
 *
 * @package    cc
 * @subpackage form
 * @author     Your name here
 */
class CastingForm extends BaseCastingForm
{
  public function configure()
  {
      $this->widgetSchema['fecha']
           ->setOption( 'format',   GlobalValues::formatoFecha         )
           ->setOption( 'years',    GlobalValues::rangoFechaScouting() );
  }
}
