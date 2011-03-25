<?php

/**
 * Grupo filter form base class.
 *
 * @package    cc
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseGrupoFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'nivel' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'nivel' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('grupo_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Grupo';
  }

  public function getFields()
  {
    return array(
      'id'    => 'Number',
      'nivel' => 'Number',
    );
  }
}
