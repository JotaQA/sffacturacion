<?php

/**
 * Guia form base class.
 *
 * @method Guia getObject() Returns the current form's model object
 *
 * @package    sffacturacion
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseGuiaForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_guia'            => new sfWidgetFormInputHidden(),
      'id_estadoguia'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('EstadoGuia'), 'add_empty' => true)),
      'id_factura'         => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Factura'), 'add_empty' => true)),
      'numero_guia'        => new sfWidgetFormInputText(),
      'id_notapedido_guia' => new sfWidgetFormTextarea(),
      'fechaingreso_guia'  => new sfWidgetFormDateTime(),
      'fechaemision_guia'  => new sfWidgetFormDateTime(),
      'rut_guia'           => new sfWidgetFormInputText(),
      'telefono_guia'      => new sfWidgetFormInputText(),
      'nombre_guia'        => new sfWidgetFormTextarea(),
      'direccion_guia'     => new sfWidgetFormTextarea(),
      'comuna_guia'        => new sfWidgetFormTextarea(),
      'ciudad_guia'        => new sfWidgetFormTextarea(),
      'giro_guia'          => new sfWidgetFormTextarea(),
      'oc_guia'            => new sfWidgetFormTextarea(),
      'condicionpago_guia' => new sfWidgetFormTextarea(),
      'comentario_guia'    => new sfWidgetFormTextarea(),
      'responsable_guia'   => new sfWidgetFormTextarea(),
      'tipo_guia'          => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id_guia'            => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_guia')), 'empty_value' => $this->getObject()->get('id_guia'), 'required' => false)),
      'id_estadoguia'      => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('EstadoGuia'), 'required' => false)),
      'id_factura'         => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Factura'), 'required' => false)),
      'numero_guia'        => new sfValidatorInteger(array('required' => false)),
      'id_notapedido_guia' => new sfValidatorString(array('max_length' => 512, 'required' => false)),
      'fechaingreso_guia'  => new sfValidatorDateTime(array('required' => false)),
      'fechaemision_guia'  => new sfValidatorDateTime(array('required' => false)),
      'rut_guia'           => new sfValidatorString(array('max_length' => 15, 'required' => false)),
      'telefono_guia'      => new sfValidatorString(array('max_length' => 32, 'required' => false)),
      'nombre_guia'        => new sfValidatorString(array('max_length' => 512, 'required' => false)),
      'direccion_guia'     => new sfValidatorString(array('max_length' => 512, 'required' => false)),
      'comuna_guia'        => new sfValidatorString(array('max_length' => 512, 'required' => false)),
      'ciudad_guia'        => new sfValidatorString(array('max_length' => 512, 'required' => false)),
      'giro_guia'          => new sfValidatorString(array('max_length' => 512, 'required' => false)),
      'oc_guia'            => new sfValidatorString(array('max_length' => 512, 'required' => false)),
      'condicionpago_guia' => new sfValidatorString(array('max_length' => 512, 'required' => false)),
      'comentario_guia'    => new sfValidatorString(array('max_length' => 512, 'required' => false)),
      'responsable_guia'   => new sfValidatorString(array('max_length' => 512, 'required' => false)),
      'tipo_guia'          => new sfValidatorString(array('max_length' => 127, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('guia[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Guia';
  }

}
