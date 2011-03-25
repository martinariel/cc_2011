<?php

/**
 * Persona filter form base class.
 *
 * @package    cc
 * @subpackage filter
 * @author     Your name here
 */
abstract class BasePersonaFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'nombre'              => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'dni'                 => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'fecha_nacimiento'    => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'sexo'                => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'peso'                => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'altura'              => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'email'               => new sfWidgetFormFilterInput(),
      'telefono'            => new sfWidgetFormFilterInput(),
      'celular'             => new sfWidgetFormFilterInput(),
      'calzado'             => new sfWidgetFormFilterInput(),
      'pantalon'            => new sfWidgetFormFilterInput(),
      'camisa'              => new sfWidgetFormFilterInput(),
      'observaciones'       => new sfWidgetFormFilterInput(),
      'fecha_actualizacion' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'nacionalidad_id'     => new sfWidgetFormPropelChoice(array('model' => 'Nacionalidad', 'add_empty' => true)),
      'created_at'          => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
    ));

    $this->setValidators(array(
      'nombre'              => new sfValidatorPass(array('required' => false)),
      'dni'                 => new sfValidatorPass(array('required' => false)),
      'fecha_nacimiento'    => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'sexo'                => new sfValidatorPass(array('required' => false)),
      'peso'                => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'altura'              => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'email'               => new sfValidatorPass(array('required' => false)),
      'telefono'            => new sfValidatorPass(array('required' => false)),
      'celular'             => new sfValidatorPass(array('required' => false)),
      'calzado'             => new sfValidatorPass(array('required' => false)),
      'pantalon'            => new sfValidatorPass(array('required' => false)),
      'camisa'              => new sfValidatorPass(array('required' => false)),
      'observaciones'       => new sfValidatorPass(array('required' => false)),
      'fecha_actualizacion' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'nacionalidad_id'     => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Nacionalidad', 'column' => 'id')),
      'created_at'          => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
    ));

    $this->widgetSchema->setNameFormat('persona_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Persona';
  }

  public function getFields()
  {
    return array(
      'id'                  => 'Number',
      'nombre'              => 'Text',
      'dni'                 => 'Text',
      'fecha_nacimiento'    => 'Date',
      'sexo'                => 'Text',
      'peso'                => 'Number',
      'altura'              => 'Number',
      'email'               => 'Text',
      'telefono'            => 'Text',
      'celular'             => 'Text',
      'calzado'             => 'Text',
      'pantalon'            => 'Text',
      'camisa'              => 'Text',
      'observaciones'       => 'Text',
      'fecha_actualizacion' => 'Date',
      'nacionalidad_id'     => 'ForeignKey',
      'created_at'          => 'Date',
    );
  }
}
