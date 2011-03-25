<?php

/**
 * Media filter form base class.
 *
 * @package    cc
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseMediaFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'archivo'              => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'tipo'                 => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'persona_id'           => new sfWidgetFormPropelChoice(array('model' => 'Persona', 'add_empty' => true)),
      'personas_scouting_id' => new sfWidgetFormFilterInput(),
      'personas_casting_id'  => new sfWidgetFormFilterInput(),
      'orden'                => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'created_at'           => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
    ));

    $this->setValidators(array(
      'archivo'              => new sfValidatorPass(array('required' => false)),
      'tipo'                 => new sfValidatorPass(array('required' => false)),
      'persona_id'           => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Persona', 'column' => 'id')),
      'personas_scouting_id' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'personas_casting_id'  => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'orden'                => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'created_at'           => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
    ));

    $this->widgetSchema->setNameFormat('media_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Media';
  }

  public function getFields()
  {
    return array(
      'id'                   => 'Number',
      'archivo'              => 'Text',
      'tipo'                 => 'Text',
      'persona_id'           => 'ForeignKey',
      'personas_scouting_id' => 'Number',
      'personas_casting_id'  => 'Number',
      'orden'                => 'Number',
      'created_at'           => 'Date',
    );
  }
}
