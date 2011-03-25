<?php

/**
 * PersonaCasting form base class.
 *
 * @method PersonaCasting getObject() Returns the current form's model object
 *
 * @package    cc
 * @subpackage form
 * @author     Your name here
 */
abstract class BasePersonaCastingForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'persona_id'    => new sfWidgetFormPropelChoice(array('model' => 'Persona', 'add_empty' => true)),
      'casting_id'    => new sfWidgetFormPropelChoice(array('model' => 'Casting', 'add_empty' => true)),
      'agencia_id'    => new sfWidgetFormPropelChoice(array('model' => 'Agencia', 'add_empty' => true)),
      'peso'          => new sfWidgetFormInputText(),
      'altura'        => new sfWidgetFormInputText(),
      'email'         => new sfWidgetFormInputText(),
      'telefono'      => new sfWidgetFormInputText(),
      'celular'       => new sfWidgetFormInputText(),
      'calzado'       => new sfWidgetFormInputText(),
      'pantalon'      => new sfWidgetFormInputText(),
      'camisa'        => new sfWidgetFormInputText(),
      'observaciones' => new sfWidgetFormTextarea(),
      'updated_at'    => new sfWidgetFormDateTime(),
      'created_at'    => new sfWidgetFormDateTime(),
      'id'            => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'persona_id'    => new sfValidatorPropelChoice(array('model' => 'Persona', 'column' => 'id', 'required' => false)),
      'casting_id'    => new sfValidatorPropelChoice(array('model' => 'Casting', 'column' => 'id', 'required' => false)),
      'agencia_id'    => new sfValidatorPropelChoice(array('model' => 'Agencia', 'column' => 'id', 'required' => false)),
      'peso'          => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647)),
      'altura'        => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647)),
      'email'         => new sfValidatorString(array('max_length' => 45, 'required' => false)),
      'telefono'      => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'celular'       => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'calzado'       => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'pantalon'      => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'camisa'        => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'observaciones' => new sfValidatorString(array('required' => false)),
      'updated_at'    => new sfValidatorDateTime(array('required' => false)),
      'created_at'    => new sfValidatorDateTime(array('required' => false)),
      'id'            => new sfValidatorPropelChoice(array('model' => 'PersonaCasting', 'column' => 'id', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('persona_casting[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'PersonaCasting';
  }


}
