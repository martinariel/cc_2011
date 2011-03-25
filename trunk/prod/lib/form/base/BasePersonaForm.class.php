<?php

/**
 * Persona form base class.
 *
 * @method Persona getObject() Returns the current form's model object
 *
 * @package    cc
 * @subpackage form
 * @author     Your name here
 */
abstract class BasePersonaForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                  => new sfWidgetFormInputHidden(),
      'nombre'              => new sfWidgetFormInputText(),
      'dni'                 => new sfWidgetFormInputText(),
      'fecha_nacimiento'    => new sfWidgetFormDate(),
      'sexo'                => new sfWidgetFormInputText(),
      'peso'                => new sfWidgetFormInputText(),
      'altura'              => new sfWidgetFormInputText(),
      'email'               => new sfWidgetFormInputText(),
      'telefono'            => new sfWidgetFormInputText(),
      'celular'             => new sfWidgetFormInputText(),
      'calzado'             => new sfWidgetFormInputText(),
      'pantalon'            => new sfWidgetFormInputText(),
      'camisa'              => new sfWidgetFormInputText(),
      'observaciones'       => new sfWidgetFormTextarea(),
      'fecha_actualizacion' => new sfWidgetFormDate(),
      'nacionalidad_id'     => new sfWidgetFormPropelChoice(array('model' => 'Nacionalidad', 'add_empty' => true)),
      'created_at'          => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'                  => new sfValidatorPropelChoice(array('model' => 'Persona', 'column' => 'id', 'required' => false)),
      'nombre'              => new sfValidatorString(array('max_length' => 100)),
      'dni'                 => new sfValidatorString(array('max_length' => 20)),
      'fecha_nacimiento'    => new sfValidatorDate(),
      'sexo'                => new sfValidatorString(array('max_length' => 1)),
      'peso'                => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647)),
      'altura'              => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647)),
      'email'               => new sfValidatorString(array('max_length' => 45, 'required' => false)),
      'telefono'            => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'celular'             => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'calzado'             => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'pantalon'            => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'camisa'              => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'observaciones'       => new sfValidatorString(array('required' => false)),
      'fecha_actualizacion' => new sfValidatorDate(),
      'nacionalidad_id'     => new sfValidatorPropelChoice(array('model' => 'Nacionalidad', 'column' => 'id', 'required' => false)),
      'created_at'          => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('persona[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Persona';
  }


}
