<?php

/**
 * SinonimoTabla filter form base class.
 *
 * @package    cc
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseSinonimoTablaFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'tabla' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'tabla' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('sinonimo_tabla_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'SinonimoTabla';
  }

  public function getFields()
  {
    return array(
      'tabla' => 'Text',
      'id'    => 'Number',
    );
  }
}
