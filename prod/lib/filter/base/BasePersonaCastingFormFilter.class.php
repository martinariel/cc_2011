<?php

/**
 * PersonaCasting filter form base class.
 *
 * @package    cc
 * @subpackage filter
 * @author     Your name here
 */
abstract class BasePersonaCastingFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'persona_id'    => new sfWidgetFormPropelChoice(array('model' => 'Persona', 'add_empty' => true)),
      'casting_id'    => new sfWidgetFormPropelChoice(array('model' => 'Casting', 'add_empty' => true)),
      'agencia_id'    => new sfWidgetFormPropelChoice(array('model' => 'Agencia', 'add_empty' => true)),
      'peso'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'altura'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'email'         => new sfWidgetFormFilterInput(),
      'telefono'      => new sfWidgetFormFilterInput(),
      'celular'       => new sfWidgetFormFilterInput(),
      'calzado'       => new sfWidgetFormFilterInput(),
      'pantalon'      => new sfWidgetFormFilterInput(),
      'camisa'        => new sfWidgetFormFilterInput(),
      'observaciones' => new sfWidgetFormFilterInput(),
      'updated_at'    => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'created_at'    => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
    ));

    $this->setValidators(array(
      'persona_id'    => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Persona', 'column' => 'id')),
      'casting_id'    => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Casting', 'column' => 'id')),
      'agencia_id'    => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Agencia', 'column' => 'id')),
      'peso'          => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'altura'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'email'         => new sfValidatorPass(array('required' => false)),
      'telefono'      => new sfValidatorPass(array('required' => false)),
      'celular'       => new sfValidatorPass(array('required' => false)),
      'calzado'       => new sfValidatorPass(array('required' => false)),
      'pantalon'      => new sfValidatorPass(array('required' => false)),
      'camisa'        => new sfValidatorPass(array('required' => false)),
      'observaciones' => new sfValidatorPass(array('required' => false)),
      'updated_at'    => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'created_at'    => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
    ));

    $this->widgetSchema->setNameFormat('persona_casting_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'PersonaCasting';
  }

  public function getFields()
  {
    return array(
      'persona_id'    => 'ForeignKey',
      'casting_id'    => 'ForeignKey',
      'agencia_id'    => 'ForeignKey',
      'peso'          => 'Number',
      'altura'        => 'Number',
      'email'         => 'Text',
      'telefono'      => 'Text',
      'celular'       => 'Text',
      'calzado'       => 'Text',
      'pantalon'      => 'Text',
      'camisa'        => 'Text',
      'observaciones' => 'Text',
      'updated_at'    => 'Date',
      'created_at'    => 'Date',
      'id'            => 'Number',
    );
  }
}
