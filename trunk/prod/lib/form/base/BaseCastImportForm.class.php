<?php

/**
 * CastImport form base class.
 *
 * @method CastImport getObject() Returns the current form's model object
 *
 * @package    cc
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseCastImportForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'codigo'           => new sfWidgetFormInputText(),
      'nombre'           => new sfWidgetFormInputText(),
      'agencia'          => new sfWidgetFormInputText(),
      'pantalon'         => new sfWidgetFormInputText(),
      'camisa'           => new sfWidgetFormInputText(),
      'calzado'          => new sfWidgetFormInputText(),
      'altura'           => new sfWidgetFormInputText(),
      'peso'             => new sfWidgetFormInputText(),
      'fecha_nacimiento' => new sfWidgetFormInputText(),
      'fecha_casting'    => new sfWidgetFormInputText(),
      'casting'          => new sfWidgetFormInputText(),
      'anio'             => new sfWidgetFormInputText(),
      'medidas'          => new sfWidgetFormInputText(),
      'dni'              => new sfWidgetFormInputText(),
      'observaciones'    => new sfWidgetFormTextarea(),
      'telefono'         => new sfWidgetFormInputText(),
      'celular'          => new sfWidgetFormInputText(),
      'email'            => new sfWidgetFormInputText(),
      'edad'             => new sfWidgetFormInputText(),
      'dia'              => new sfWidgetFormInputText(),
      'id'               => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'codigo'           => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'nombre'           => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'agencia'          => new sfValidatorString(array('max_length' => 45, 'required' => false)),
      'pantalon'         => new sfValidatorString(array('max_length' => 45, 'required' => false)),
      'camisa'           => new sfValidatorString(array('max_length' => 45, 'required' => false)),
      'calzado'          => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'altura'           => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'peso'             => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'fecha_nacimiento' => new sfValidatorString(array('max_length' => 45, 'required' => false)),
      'fecha_casting'    => new sfValidatorString(array('max_length' => 45, 'required' => false)),
      'casting'          => new sfValidatorString(array('max_length' => 45, 'required' => false)),
      'anio'             => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'medidas'          => new sfValidatorString(array('max_length' => 45, 'required' => false)),
      'dni'              => new sfValidatorString(array('max_length' => 45, 'required' => false)),
      'observaciones'    => new sfValidatorString(array('required' => false)),
      'telefono'         => new sfValidatorString(array('max_length' => 45, 'required' => false)),
      'celular'          => new sfValidatorString(array('max_length' => 45, 'required' => false)),
      'email'            => new sfValidatorString(array('max_length' => 45, 'required' => false)),
      'edad'             => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'dia'              => new sfValidatorString(array('max_length' => 45, 'required' => false)),
      'id'               => new sfValidatorPropelChoice(array('model' => 'CastImport', 'column' => 'id', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('cast_import[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'CastImport';
  }


}
