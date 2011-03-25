<?php

/**
 * Sinonimo form base class.
 *
 * @method Sinonimo getObject() Returns the current form's model object
 *
 * @package    cc
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseSinonimoForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'origen'  => new sfWidgetFormInputText(),
      'destino' => new sfWidgetFormInputText(),
      'id'      => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'origen'  => new sfValidatorString(array('max_length' => 50)),
      'destino' => new sfValidatorString(array('max_length' => 55)),
      'id'      => new sfValidatorPropelChoice(array('model' => 'Sinonimo', 'column' => 'id', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('sinonimo[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Sinonimo';
  }


}
