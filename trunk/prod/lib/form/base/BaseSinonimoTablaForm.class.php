<?php

/**
 * SinonimoTabla form base class.
 *
 * @method SinonimoTabla getObject() Returns the current form's model object
 *
 * @package    cc
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseSinonimoTablaForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'tabla' => new sfWidgetFormInputText(),
      'id'    => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'tabla' => new sfValidatorString(array('max_length' => 45, 'required' => false)),
      'id'    => new sfValidatorPropelChoice(array('model' => 'SinonimoTabla', 'column' => 'id', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('sinonimo_tabla[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'SinonimoTabla';
  }


}
