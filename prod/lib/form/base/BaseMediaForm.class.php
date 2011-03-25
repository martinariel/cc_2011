<?php

/**
 * Media form base class.
 *
 * @method Media getObject() Returns the current form's model object
 *
 * @package    cc
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseMediaForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                   => new sfWidgetFormInputHidden(),
      'archivo'              => new sfWidgetFormInputText(),
      'tipo'                 => new sfWidgetFormInputText(),
      'persona_id'           => new sfWidgetFormPropelChoice(array('model' => 'Persona', 'add_empty' => true)),
      'personas_scouting_id' => new sfWidgetFormInputText(),
      'personas_casting_id'  => new sfWidgetFormInputText(),
      'orden'                => new sfWidgetFormInputText(),
      'created_at'           => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'                   => new sfValidatorPropelChoice(array('model' => 'Media', 'column' => 'id', 'required' => false)),
      'archivo'              => new sfValidatorString(array('max_length' => 45)),
      'tipo'                 => new sfValidatorString(array('max_length' => 45)),
      'persona_id'           => new sfValidatorPropelChoice(array('model' => 'Persona', 'column' => 'id', 'required' => false)),
      'personas_scouting_id' => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'personas_casting_id'  => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'orden'                => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647)),
      'created_at'           => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('media[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Media';
  }


}
