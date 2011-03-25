<?php

/**
 * GrupoUsuario form base class.
 *
 * @method GrupoUsuario getObject() Returns the current form's model object
 *
 * @package    cc
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseGrupoUsuarioForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'grupo_id'   => new sfWidgetFormPropelChoice(array('model' => 'Grupo', 'add_empty' => true)),
      'usuario_id' => new sfWidgetFormPropelChoice(array('model' => 'Usuario', 'add_empty' => true)),
      'id'         => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'grupo_id'   => new sfValidatorPropelChoice(array('model' => 'Grupo', 'column' => 'id', 'required' => false)),
      'usuario_id' => new sfValidatorPropelChoice(array('model' => 'Usuario', 'column' => 'id', 'required' => false)),
      'id'         => new sfValidatorPropelChoice(array('model' => 'GrupoUsuario', 'column' => 'id', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('grupo_usuario[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'GrupoUsuario';
  }


}
