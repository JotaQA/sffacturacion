<?php

/**
 * Usuarios form base class.
 *
 * @method Usuarios getObject() Returns the current form's model object
 *
 * @package    sffacturacion
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseUsuariosForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_usuario'     => new sfWidgetFormInputHidden(),
      'nombre_usuario' => new sfWidgetFormInputText(),
      'clave'          => new sfWidgetFormInputText(),
      'vendedor'       => new sfWidgetFormInputText(),
      'permisos'       => new sfWidgetFormInputText(),
      'descripcion'    => new sfWidgetFormTextarea(),
      'telefono'       => new sfWidgetFormTextarea(),
      'movil'          => new sfWidgetFormTextarea(),
      'correo'         => new sfWidgetFormTextarea(),
      'fecha_usuario'  => new sfWidgetFormDateTime(),
      'comi_imp'       => new sfWidgetFormInputText(),
      'comi_nac'       => new sfWidgetFormInputText(),
      'cargo'          => new sfWidgetFormInputText(),
      'funciones'      => new sfWidgetFormTextarea(),
      'depto'          => new sfWidgetFormTextarea(),
      'activo'         => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id_usuario'     => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_usuario')), 'empty_value' => $this->getObject()->get('id_usuario'), 'required' => false)),
      'nombre_usuario' => new sfValidatorString(array('max_length' => 200)),
      'clave'          => new sfValidatorString(array('max_length' => 10)),
      'vendedor'       => new sfValidatorInteger(),
      'permisos'       => new sfValidatorString(array('max_length' => 255)),
      'descripcion'    => new sfValidatorString(array('max_length' => 500)),
      'telefono'       => new sfValidatorString(array('max_length' => 500)),
      'movil'          => new sfValidatorString(array('max_length' => 500)),
      'correo'         => new sfValidatorString(array('max_length' => 500)),
      'fecha_usuario'  => new sfValidatorDateTime(),
      'comi_imp'       => new sfValidatorNumber(array('required' => false)),
      'comi_nac'       => new sfValidatorNumber(array('required' => false)),
      'cargo'          => new sfValidatorString(array('max_length' => 64)),
      'funciones'      => new sfValidatorString(array('max_length' => 2048)),
      'depto'          => new sfValidatorString(array('max_length' => 512)),
      'activo'         => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('usuarios[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Usuarios';
  }

}
