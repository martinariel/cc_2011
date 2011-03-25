<?php

/**
 * ScoutImport form base class.
 *
 * @method ScoutImport getObject() Returns the current form's model object
 *
 * @package    cc
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseScoutImportForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'               => new sfWidgetFormInputHidden(),
      'codigo'           => new sfWidgetFormInputText(),
      'edad'             => new sfWidgetFormInputText(),
      'peso'             => new sfWidgetFormInputText(),
      'altura'           => new sfWidgetFormInputText(),
      'nombre'           => new sfWidgetFormInputText(),
      'fecha_nacimiento' => new sfWidgetFormInputText(),
      'fecha_scout'      => new sfWidgetFormInputText(),
      'lugar_scout'      => new sfWidgetFormInputText(),
      'observaciones'    => new sfWidgetFormInputText(),
      'actividades'      => new sfWidgetFormInputText(),
      'email'            => new sfWidgetFormInputText(),
      'telefono'         => new sfWidgetFormInputText(),
      'celular'          => new sfWidgetFormInputText(),
      'nacionalidad'     => new sfWidgetFormInputText(),
      'idiomas'          => new sfWidgetFormInputText(),
      'xls_file'         => new sfWidgetFormInputText(),
      'anio'             => new sfWidgetFormInputText(),
      'mes'              => new sfWidgetFormInputText(),
      'codigo_agrupador' => new sfWidgetFormInputText(),
      'dia'              => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'               => new sfValidatorPropelChoice(array('model' => 'ScoutImport', 'column' => 'id', 'required' => false)),
      'codigo'           => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647)),
      'edad'             => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'peso'             => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'altura'           => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'nombre'           => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'fecha_nacimiento' => new sfValidatorString(array('max_length' => 12, 'required' => false)),
      'fecha_scout'      => new sfValidatorString(array('max_length' => 12, 'required' => false)),
      'lugar_scout'      => new sfValidatorString(array('max_length' => 45, 'required' => false)),
      'observaciones'    => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'actividades'      => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'email'            => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'telefono'         => new sfValidatorString(array('max_length' => 45, 'required' => false)),
      'celular'          => new sfValidatorString(array('max_length' => 45, 'required' => false)),
      'nacionalidad'     => new sfValidatorString(array('max_length' => 45, 'required' => false)),
      'idiomas'          => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'xls_file'         => new sfValidatorString(array('max_length' => 255)),
      'anio'             => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647)),
      'mes'              => new sfValidatorString(array('max_length' => 20)),
      'codigo_agrupador' => new sfValidatorString(array('max_length' => 45)),
      'dia'              => new sfValidatorString(array('max_length' => 45)),
    ));

    $this->widgetSchema->setNameFormat('scout_import[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'ScoutImport';
  }


}
