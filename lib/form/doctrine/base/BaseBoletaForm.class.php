<?php

/**
 * Boleta form base class.
 *
 * @method Boleta getObject() Returns the current form's model object
 *
 * @package    sffacturacion
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseBoletaForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_boleta'            => new sfWidgetFormInputHidden(),
      'numero_boleta'        => new sfWidgetFormInputText(),
      'fechaingreso_boleta'  => new sfWidgetFormDateTime(),
      'fechaemision_boleta'  => new sfWidgetFormDateTime(),
      'monto_boleta'         => new sfWidgetFormInputText(),
      'id_notapedido_boleta' => new sfWidgetFormInputText(),
      'id_estadoboleta'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('EstadoBoleta'), 'add_empty' => true)),
      'rut_boleta'           => new sfWidgetFormInputText(),
      'telefono_boleta'      => new sfWidgetFormInputText(),
      'nombre_boleta'        => new sfWidgetFormTextarea(),
      'direccion_boleta'     => new sfWidgetFormTextarea(),
      'comuna_boleta'        => new sfWidgetFormTextarea(),
      'ciudad_boleta'        => new sfWidgetFormTextarea(),
      'giro_boleta'          => new sfWidgetFormTextarea(),
      'oc_boleta'            => new sfWidgetFormTextarea(),
      'condicionpago_boleta' => new sfWidgetFormTextarea(),
      'comentario_boleta'    => new sfWidgetFormTextarea(),
      'responsable_boleta'   => new sfWidgetFormTextarea(),
    ));

    $this->setValidators(array(
      'id_boleta'            => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_boleta')), 'empty_value' => $this->getObject()->get('id_boleta'), 'required' => false)),
      'numero_boleta'        => new sfValidatorInteger(array('required' => false)),
      'fechaingreso_boleta'  => new sfValidatorDateTime(),
      'fechaemision_boleta'  => new sfValidatorDateTime(array('required' => false)),
      'monto_boleta'         => new sfValidatorInteger(array('required' => false)),
      'id_notapedido_boleta' => new sfValidatorInteger(array('required' => false)),
      'id_estadoboleta'      => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('EstadoBoleta'), 'required' => false)),
      'rut_boleta'           => new sfValidatorString(array('max_length' => 15, 'required' => false)),
      'telefono_boleta'      => new sfValidatorString(array('max_length' => 64, 'required' => false)),
      'nombre_boleta'        => new sfValidatorString(array('max_length' => 512, 'required' => false)),
      'direccion_boleta'     => new sfValidatorString(array('max_length' => 512, 'required' => false)),
      'comuna_boleta'        => new sfValidatorString(array('max_length' => 512, 'required' => false)),
      'ciudad_boleta'        => new sfValidatorString(array('max_length' => 512, 'required' => false)),
      'giro_boleta'          => new sfValidatorString(array('max_length' => 512, 'required' => false)),
      'oc_boleta'            => new sfValidatorString(array('max_length' => 512, 'required' => false)),
      'condicionpago_boleta' => new sfValidatorString(array('max_length' => 512, 'required' => false)),
      'comentario_boleta'    => new sfValidatorString(array('max_length' => 512, 'required' => false)),
      'responsable_boleta'   => new sfValidatorString(array('max_length' => 512, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('boleta[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Boleta';
  }

}
