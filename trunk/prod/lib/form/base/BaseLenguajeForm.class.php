<?php

/**
 * Lenguaje form base class.
 *
 * @method Lenguaje getObject() Returns the current form's model object
 *
 * @package    cc
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseLenguajeForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'descripcion' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorPropelChoice(array('model' => 'Lenguaje', 'column' => 'id', 'required' => false)),
      'descripcion' => new sfValidatorString(array('max_length' => 100, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('lenguaje[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Lenguaje';
  }


}
