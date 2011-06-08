<?php

/**
 * Factura form base class.
 *
 * @method Factura getObject() Returns the current form's model object
 *
 * @package    sffacturacion
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseFacturaForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_factura'            => new sfWidgetFormInputHidden(),
      'id_estadofactura'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('EstadoFactura'), 'add_empty' => true)),
      'id_division'           => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Division'), 'add_empty' => true)),
      'numero_factura'        => new sfWidgetFormInputText(),
      'fechaingreso_factura'  => new sfWidgetFormDateTime(),
      'fechaemision_factura'  => new sfWidgetFormDateTime(),
      'monto_factura'         => new sfWidgetFormInputText(),
      'saldo_factura'         => new sfWidgetFormInputText(),
      'id_notapedido_factura' => new sfWidgetFormInputText(),
      'rut_factura'           => new sfWidgetFormInputText(),
      'telefono_factura'      => new sfWidgetFormInputText(),
      'nombre_factura'        => new sfWidgetFormTextarea(),
      'direccion_factura'     => new sfWidgetFormTextarea(),
      'comuna_factura'        => new sfWidgetFormTextarea(),
      'ciudad_factura'        => new sfWidgetFormTextarea(),
      'giro_factura'          => new sfWidgetFormTextarea(),
      'oc_factura'            => new sfWidgetFormTextarea(),
      'condicionpago_factura' => new sfWidgetFormTextarea(),
      'responsable_factura'   => new sfWidgetFormTextarea(),
      'comentario_factura'    => new sfWidgetFormTextarea(),
      'tipo_factura'          => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id_factura'            => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_factura')), 'empty_value' => $this->getObject()->get('id_factura'), 'required' => false)),
      'id_estadofactura'      => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('EstadoFactura'), 'required' => false)),
      'id_division'           => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Division'), 'required' => false)),
      'numero_factura'        => new sfValidatorInteger(),
      'fechaingreso_factura'  => new sfValidatorDateTime(array('required' => false)),
      'fechaemision_factura'  => new sfValidatorDateTime(array('required' => false)),
      'monto_factura'         => new sfValidatorInteger(array('required' => false)),
      'saldo_factura'         => new sfValidatorInteger(array('required' => false)),
      'id_notapedido_factura' => new sfValidatorInteger(array('required' => false)),
      'rut_factura'           => new sfValidatorString(array('max_length' => 15, 'required' => false)),
      'telefono_factura'      => new sfValidatorString(array('max_length' => 32, 'required' => false)),
      'nombre_factura'        => new sfValidatorString(array('max_length' => 512, 'required' => false)),
      'direccion_factura'     => new sfValidatorString(array('max_length' => 512, 'required' => false)),
      'comuna_factura'        => new sfValidatorString(array('max_length' => 512, 'required' => false)),
      'ciudad_factura'        => new sfValidatorString(array('max_length' => 512, 'required' => false)),
      'giro_factura'          => new sfValidatorString(array('max_length' => 512, 'required' => false)),
      'oc_factura'            => new sfValidatorString(array('max_length' => 512, 'required' => false)),
      'condicionpago_factura' => new sfValidatorString(array('max_length' => 512, 'required' => false)),
      'responsable_factura'   => new sfValidatorString(array('max_length' => 512, 'required' => false)),
      'comentario_factura'    => new sfValidatorString(array('max_length' => 512, 'required' => false)),
      'tipo_factura'          => new sfValidatorString(array('max_length' => 64, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('factura[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Factura';
  }

}
