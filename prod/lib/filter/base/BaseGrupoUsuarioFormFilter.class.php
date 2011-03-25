<?php

/**
 * GrupoUsuario filter form base class.
 *
 * @package    cc
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseGrupoUsuarioFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'grupo_id'   => new sfWidgetFormPropelChoice(array('model' => 'Grupo', 'add_empty' => true)),
      'usuario_id' => new sfWidgetFormPropelChoice(array('model' => 'Usuario', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'grupo_id'   => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Grupo', 'column' => 'id')),
      'usuario_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Usuario', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('grupo_usuario_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'GrupoUsuario';
  }

  public function getFields()
  {
    return array(
      'grupo_id'   => 'ForeignKey',
      'usuario_id' => 'ForeignKey',
      'id'         => 'Number',
    );
  }
}
