<?php

/**
 * InfoContactos form base class.
 *
 * @method InfoContactos getObject() Returns the current form's model object
 *
 * @package    sffacturacion
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseInfoContactosForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_persona'       => new sfWidgetFormInputHidden(),
      'nombre_completo'  => new sfWidgetFormTextarea(),
      'apellido'         => new sfWidgetFormTextarea(),
      'rut'              => new sfWidgetFormInputText(),
      'correo'           => new sfWidgetFormTextarea(),
      'celular'          => new sfWidgetFormInputText(),
      'fono_casa'        => new sfWidgetFormInputText(),
      'fecha_nacimiento' => new sfWidgetFormDate(),
      'id_vendedor'      => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id_persona'       => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_persona')), 'empty_value' => $this->getObject()->get('id_persona'), 'required' => false)),
      'nombre_completo'  => new sfValidatorString(array('max_length' => 500)),
      'apellido'         => new sfValidatorString(array('max_length' => 500)),
      'rut'              => new sfValidatorString(array('max_length' => 50)),
      'correo'           => new sfValidatorString(array('max_length' => 500)),
      'celular'          => new sfValidatorString(array('max_length' => 50)),
      'fono_casa'        => new sfValidatorString(array('max_length' => 50)),
      'fecha_nacimiento' => new sfValidatorDate(),
      'id_vendedor'      => new sfValidatorInteger(),
    ));

    $this->widgetSchema->setNameFormat('info_contactos[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'InfoContactos';
  }

}
