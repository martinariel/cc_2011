<?php

/**
 * PersonaScouting form base class.
 *
 * @method PersonaScouting getObject() Returns the current form's model object
 *
 * @package    cc
 * @subpackage form
 * @author     Your name here
 */
abstract class BasePersonaScoutingForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'              => new sfWidgetFormInputHidden(),
      'anio'            => new sfWidgetFormInputText(),
      'id_codigo'       => new sfWidgetFormInputText(),
      'mes'             => new sfWidgetFormInputText(),
      'dia_contador'    => new sfWidgetFormInputText(),
      'fecha'           => new sfWidgetFormDate(),
      'persona_id'      => new sfWidgetFormPropelChoice(array('model' => 'Persona', 'add_empty' => true)),
      'peso'            => new sfWidgetFormInputText(),
      'altura'          => new sfWidgetFormInputText(),
      'email'           => new sfWidgetFormInputText(),
      'telefono'        => new sfWidgetFormInputText(),
      'celular'         => new sfWidgetFormInputText(),
      'actividades'     => new sfWidgetFormInputText(),
      'observaciones'   => new sfWidgetFormInputText(),
      'lugar_id'        => new sfWidgetFormPropelChoice(array('model' => 'Lugar', 'add_empty' => true)),
      'nacionalidad_id' => new sfWidgetFormPropelChoice(array('model' => 'Nacionalidad', 'add_empty' => true)),
      'created_at'      => new sfWidgetFormDateTime(),
      'updated_at'      => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'              => new sfValidatorPropelChoice(array('model' => 'PersonaScouting', 'column' => 'id', 'required' => false)),
      'anio'            => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647)),
      'id_codigo'       => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647)),
      'mes'             => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647)),
      'dia_contador'    => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647)),
      'fecha'           => new sfValidatorDate(array('required' => false)),
      'persona_id'      => new sfValidatorPropelChoice(array('model' => 'Persona', 'column' => 'id', 'required' => false)),
      'peso'            => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647)),
      'altura'          => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647)),
      'email'           => new sfValidatorString(array('max_length' => 45, 'required' => false)),
      'telefono'        => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'celular'         => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'actividades'     => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'observaciones'   => new sfValidatorString(array('max_length' => 255)),
      'lugar_id'        => new sfValidatorPropelChoice(array('model' => 'Lugar', 'column' => 'id', 'required' => false)),
      'nacionalidad_id' => new sfValidatorPropelChoice(array('model' => 'Nacionalidad', 'column' => 'id', 'required' => false)),
      'created_at'      => new sfValidatorDateTime(array('required' => false)),
      'updated_at'      => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('persona_scouting[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'PersonaScouting';
  }


}
