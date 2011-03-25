<?php

/**
 * PersonaLenguaje filter form base class.
 *
 * @package    cc
 * @subpackage filter
 * @author     Your name here
 */
abstract class BasePersonaLenguajeFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'persona_id'  => new sfWidgetFormPropelChoice(array('model' => 'Persona', 'add_empty' => true)),
      'lenguaje_id' => new sfWidgetFormPropelChoice(array('model' => 'Lenguaje', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'persona_id'  => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Persona', 'column' => 'id')),
      'lenguaje_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Lenguaje', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('persona_lenguaje_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'PersonaLenguaje';
  }

  public function getFields()
  {
    return array(
      'persona_id'  => 'ForeignKey',
      'lenguaje_id' => 'ForeignKey',
      'id'          => 'Number',
    );
  }
}
