<?php

/**
 * CodigosScouting form base class.
 *
 * @method CodigosScouting getObject() Returns the current form's model object
 *
 * @package    cc
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseCodigosScoutingForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'codigo'      => new sfWidgetFormInputText(),
      'descripcion' => new sfWidgetFormInputText(),
      'updated_at'  => new sfWidgetFormDateTime(),
      'created_at'  => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorPropelChoice(array('model' => 'CodigosScouting', 'column' => 'id', 'required' => false)),
      'codigo'      => new sfValidatorString(array('max_length' => 2)),
      'descripcion' => new sfValidatorString(array('max_length' => 45)),
      'updated_at'  => new sfValidatorDateTime(array('required' => false)),
      'created_at'  => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('codigos_scouting[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'CodigosScouting';
  }


}
