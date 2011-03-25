<?php

/**
 * PersonaLabel form base class.
 *
 * @method PersonaLabel getObject() Returns the current form's model object
 *
 * @package    cc
 * @subpackage form
 * @author     Your name here
 */
abstract class BasePersonaLabelForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'persona_id' => new sfWidgetFormPropelChoice(array('model' => 'Persona', 'add_empty' => true)),
      'label_id'   => new sfWidgetFormPropelChoice(array('model' => 'Label', 'add_empty' => true)),
      'id'         => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'persona_id' => new sfValidatorPropelChoice(array('model' => 'Persona', 'column' => 'id', 'required' => false)),
      'label_id'   => new sfValidatorPropelChoice(array('model' => 'Label', 'column' => 'id', 'required' => false)),
      'id'         => new sfValidatorPropelChoice(array('model' => 'PersonaLabel', 'column' => 'id', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('persona_label[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'PersonaLabel';
  }


}
