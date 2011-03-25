<?php

/**
 * Lugar form base class.
 *
 * @method Lugar getObject() Returns the current form's model object
 *
 * @package    cc
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseLugarForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'descripcion' => new sfWidgetFormInputText(),
      'latitud'     => new sfWidgetFormInputText(),
      'longitud'    => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorPropelChoice(array('model' => 'Lugar', 'column' => 'id', 'required' => false)),
      'descripcion' => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'latitud'     => new sfValidatorNumber(array('required' => false)),
      'longitud'    => new sfValidatorNumber(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('lugar[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Lugar';
  }


}
