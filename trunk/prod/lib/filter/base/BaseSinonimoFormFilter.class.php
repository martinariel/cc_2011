<?php

/**
 * Sinonimo filter form base class.
 *
 * @package    cc
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseSinonimoFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'origen'  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'destino' => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'origen'  => new sfValidatorPass(array('required' => false)),
      'destino' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('sinonimo_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Sinonimo';
  }

  public function getFields()
  {
    return array(
      'origen'  => 'Text',
      'destino' => 'Text',
      'id'      => 'Number',
    );
  }
}
