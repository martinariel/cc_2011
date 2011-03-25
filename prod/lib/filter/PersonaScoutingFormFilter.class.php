<?php

/**
 * PersonaScouting filter form.
 *
 * @package    cc
 * @subpackage filter
 * @author     Your name here
 */
class PersonaScoutingFormFilter extends BasePersonaScoutingFormFilter
{
  public function configure()
  {
      $this->widgetSchema['fecha']
           ->setOption( 'from_date', GlobalValues::widgetFechaScouting() )
           ->setOption( 'to_date',   GlobalValues::widgetFechaScouting() )
           ->setOption( 'template' , GlobalValues::formatoComboFechaFiltro );

  }
}
