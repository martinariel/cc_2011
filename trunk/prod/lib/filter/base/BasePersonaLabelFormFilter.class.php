<?php

/**
 * PersonaLabel filter form base class.
 *
 * @package    cc
 * @subpackage filter
 * @author     Your name here
 */
abstract class BasePersonaLabelFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'persona_id' => new sfWidgetFormPropelChoice(array('model' => 'Persona', 'add_empty' => true)),
      'label_id'   => new sfWidgetFormPropelChoice(array('model' => 'Label', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'persona_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Persona', 'column' => 'id')),
      'label_id'   => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Label', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('persona_label_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'PersonaLabel';
  }

  public function getFields()
  {
    return array(
      'persona_id' => 'ForeignKey',
      'label_id'   => 'ForeignKey',
      'id'         => 'Number',
    );
  }
}
