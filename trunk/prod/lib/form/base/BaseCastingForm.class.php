<?php

/**
 * Casting form base class.
 *
 * @method Casting getObject() Returns the current form's model object
 *
 * @package    cc
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseCastingForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'nombre'     => new sfWidgetFormInputText(),
      'anio'       => new sfWidgetFormInputText(),
      'fecha'      => new sfWidgetFormDate(),
      'estado'     => new sfWidgetFormInputText(),
      'updated_at' => new sfWidgetFormDateTime(),
      'created_at' => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorPropelChoice(array('model' => 'Casting', 'column' => 'id', 'required' => false)),
      'nombre'     => new sfValidatorString(array('max_length' => 45)),
      'anio'       => new sfValidatorString(array('max_length' => 45)),
      'fecha'      => new sfValidatorDate(array('required' => false)),
      'estado'     => new sfValidatorInteger(array('min' => -128, 'max' => 127, 'required' => false)),
      'updated_at' => new sfValidatorDateTime(array('required' => false)),
      'created_at' => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('casting[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Casting';
  }


}
