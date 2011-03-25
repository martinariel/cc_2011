<?php

/**
 * ScoutImport filter form base class.
 *
 * @package    cc
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseScoutImportFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'codigo'           => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'edad'             => new sfWidgetFormFilterInput(),
      'peso'             => new sfWidgetFormFilterInput(),
      'altura'           => new sfWidgetFormFilterInput(),
      'nombre'           => new sfWidgetFormFilterInput(),
      'fecha_nacimiento' => new sfWidgetFormFilterInput(),
      'fecha_scout'      => new sfWidgetFormFilterInput(),
      'lugar_scout'      => new sfWidgetFormFilterInput(),
      'observaciones'    => new sfWidgetFormFilterInput(),
      'actividades'      => new sfWidgetFormFilterInput(),
      'email'            => new sfWidgetFormFilterInput(),
      'telefono'         => new sfWidgetFormFilterInput(),
      'celular'          => new sfWidgetFormFilterInput(),
      'nacionalidad'     => new sfWidgetFormFilterInput(),
      'idiomas'          => new sfWidgetFormFilterInput(),
      'xls_file'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'anio'             => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'mes'              => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'codigo_agrupador' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'dia'              => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'codigo'           => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'edad'             => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'peso'             => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'altura'           => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'nombre'           => new sfValidatorPass(array('required' => false)),
      'fecha_nacimiento' => new sfValidatorPass(array('required' => false)),
      'fecha_scout'      => new sfValidatorPass(array('required' => false)),
      'lugar_scout'      => new sfValidatorPass(array('required' => false)),
      'observaciones'    => new sfValidatorPass(array('required' => false)),
      'actividades'      => new sfValidatorPass(array('required' => false)),
      'email'            => new sfValidatorPass(array('required' => false)),
      'telefono'         => new sfValidatorPass(array('required' => false)),
      'celular'          => new sfValidatorPass(array('required' => false)),
      'nacionalidad'     => new sfValidatorPass(array('required' => false)),
      'idiomas'          => new sfValidatorPass(array('required' => false)),
      'xls_file'         => new sfValidatorPass(array('required' => false)),
      'anio'             => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'mes'              => new sfValidatorPass(array('required' => false)),
      'codigo_agrupador' => new sfValidatorPass(array('required' => false)),
      'dia'              => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('scout_import_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'ScoutImport';
  }

  public function getFields()
  {
    return array(
      'id'               => 'Number',
      'codigo'           => 'Number',
      'edad'             => 'Number',
      'peso'             => 'Number',
      'altura'           => 'Number',
      'nombre'           => 'Text',
      'fecha_nacimiento' => 'Text',
      'fecha_scout'      => 'Text',
      'lugar_scout'      => 'Text',
      'observaciones'    => 'Text',
      'actividades'      => 'Text',
      'email'            => 'Text',
      'telefono'         => 'Text',
      'celular'          => 'Text',
      'nacionalidad'     => 'Text',
      'idiomas'          => 'Text',
      'xls_file'         => 'Text',
      'anio'             => 'Number',
      'mes'              => 'Text',
      'codigo_agrupador' => 'Text',
      'dia'              => 'Text',
    );
  }
}
