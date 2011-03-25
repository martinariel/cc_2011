<?php

/**
 * PersonaScouting filter form base class.
 *
 * @package    cc
 * @subpackage filter
 * @author     Your name here
 */
abstract class BasePersonaScoutingFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'anio'            => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'id_codigo'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'mes'             => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'dia_contador'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'fecha'           => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'persona_id'      => new sfWidgetFormPropelChoice(array('model' => 'Persona', 'add_empty' => true)),
      'peso'            => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'altura'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'email'           => new sfWidgetFormFilterInput(),
      'telefono'        => new sfWidgetFormFilterInput(),
      'celular'         => new sfWidgetFormFilterInput(),
      'actividades'     => new sfWidgetFormFilterInput(),
      'observaciones'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'lugar_id'        => new sfWidgetFormPropelChoice(array('model' => 'Lugar', 'add_empty' => true)),
      'nacionalidad_id' => new sfWidgetFormPropelChoice(array('model' => 'Nacionalidad', 'add_empty' => true)),
      'created_at'      => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'updated_at'      => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
    ));

    $this->setValidators(array(
      'anio'            => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'id_codigo'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'mes'             => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'dia_contador'    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'fecha'           => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'persona_id'      => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Persona', 'column' => 'id')),
      'peso'            => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'altura'          => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'email'           => new sfValidatorPass(array('required' => false)),
      'telefono'        => new sfValidatorPass(array('required' => false)),
      'celular'         => new sfValidatorPass(array('required' => false)),
      'actividades'     => new sfValidatorPass(array('required' => false)),
      'observaciones'   => new sfValidatorPass(array('required' => false)),
      'lugar_id'        => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Lugar', 'column' => 'id')),
      'nacionalidad_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Nacionalidad', 'column' => 'id')),
      'created_at'      => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'updated_at'      => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
    ));

    $this->widgetSchema->setNameFormat('persona_scouting_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'PersonaScouting';
  }

  public function getFields()
  {
    return array(
      'id'              => 'Number',
      'anio'            => 'Number',
      'id_codigo'       => 'Number',
      'mes'             => 'Number',
      'dia_contador'    => 'Number',
      'fecha'           => 'Date',
      'persona_id'      => 'ForeignKey',
      'peso'            => 'Number',
      'altura'          => 'Number',
      'email'           => 'Text',
      'telefono'        => 'Text',
      'celular'         => 'Text',
      'actividades'     => 'Text',
      'observaciones'   => 'Text',
      'lugar_id'        => 'ForeignKey',
      'nacionalidad_id' => 'ForeignKey',
      'created_at'      => 'Date',
      'updated_at'      => 'Date',
    );
  }
}
