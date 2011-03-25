<?php

/**
 * PersonaLenguaje form base class.
 *
 * @method PersonaLenguaje getObject() Returns the current form's model object
 *
 * @package    cc
 * @subpackage form
 * @author     Your name here
 */
abstract class BasePersonaLenguajeForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'persona_id'  => new sfWidgetFormPropelChoice(array('model' => 'Persona', 'add_empty' => true)),
      'lenguaje_id' => new sfWidgetFormPropelChoice(array('model' => 'Lenguaje', 'add_empty' => true)),
      'id'          => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'persona_id'  => new sfValidatorPropelChoice(array('model' => 'Persona', 'column' => 'id', 'required' => false)),
      'lenguaje_id' => new sfValidatorPropelChoice(array('model' => 'Lenguaje', 'column' => 'id', 'required' => false)),
      'id'          => new sfValidatorPropelChoice(array('model' => 'PersonaLenguaje', 'column' => 'id', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('persona_lenguaje[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'PersonaLenguaje';
  }


}
