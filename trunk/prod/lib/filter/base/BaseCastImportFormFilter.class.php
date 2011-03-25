<?php

/**
 * CastImport filter form base class.
 *
 * @package    cc
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseCastImportFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'codigo'           => new sfWidgetFormFilterInput(),
      'nombre'           => new sfWidgetFormFilterInput(),
      'agencia'          => new sfWidgetFormFilterInput(),
      'pantalon'         => new sfWidgetFormFilterInput(),
      'camisa'           => new sfWidgetFormFilterInput(),
      'calzado'          => new sfWidgetFormFilterInput(),
      'altura'           => new sfWidgetFormFilterInput(),
      'peso'             => new sfWidgetFormFilterInput(),
      'fecha_nacimiento' => new sfWidgetFormFilterInput(),
      'fecha_casting'    => new sfWidgetFormFilterInput(),
      'casting'          => new sfWidgetFormFilterInput(),
      'anio'             => new sfWidgetFormFilterInput(),
      'medidas'          => new sfWidgetFormFilterInput(),
      'dni'              => new sfWidgetFormFilterInput(),
      'observaciones'    => new sfWidgetFormFilterInput(),
      'telefono'         => new sfWidgetFormFilterInput(),
      'celular'          => new sfWidgetFormFilterInput(),
      'email'            => new sfWidgetFormFilterInput(),
      'edad'             => new sfWidgetFormFilterInput(),
      'dia'              => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'codigo'           => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'nombre'           => new sfValidatorPass(array('required' => false)),
      'agencia'          => new sfValidatorPass(array('required' => false)),
      'pantalon'         => new sfValidatorPass(array('required' => false)),
      'camisa'           => new sfValidatorPass(array('required' => false)),
      'calzado'          => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'altura'           => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'peso'             => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'fecha_nacimiento' => new sfValidatorPass(array('required' => false)),
      'fecha_casting'    => new sfValidatorPass(array('required' => false)),
      'casting'          => new sfValidatorPass(array('required' => false)),
      'anio'             => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'medidas'          => new sfValidatorPass(array('required' => false)),
      'dni'              => new sfValidatorPass(array('required' => false)),
      'observaciones'    => new sfValidatorPass(array('required' => false)),
      'telefono'         => new sfValidatorPass(array('required' => false)),
      'celular'          => new sfValidatorPass(array('required' => false)),
      'email'            => new sfValidatorPass(array('required' => false)),
      'edad'             => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'dia'              => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('cast_import_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'CastImport';
  }

  public function getFields()
  {
    return array(
      'codigo'           => 'Number',
      'nombre'           => 'Text',
      'agencia'          => 'Text',
      'pantalon'         => 'Text',
      'camisa'           => 'Text',
      'calzado'          => 'Number',
      'altura'           => 'Number',
      'peso'             => 'Number',
      'fecha_nacimiento' => 'Text',
      'fecha_casting'    => 'Text',
      'casting'          => 'Text',
      'anio'             => 'Number',
      'medidas'          => 'Text',
      'dni'              => 'Text',
      'observaciones'    => 'Text',
      'telefono'         => 'Text',
      'celular'          => 'Text',
      'email'            => 'Text',
      'edad'             => 'Number',
      'dia'              => 'Text',
      'id'               => 'Number',
    );
  }
}
