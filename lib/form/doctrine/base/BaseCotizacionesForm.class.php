<?php

/**
 * Cotizaciones form base class.
 *
 * @method Cotizaciones getObject() Returns the current form's model object
 *
 * @package    sffacturacion
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseCotizacionesForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_cotizacion'         => new sfWidgetFormInputHidden(),
      'rut_cliente'           => new sfWidgetFormInputText(),
      'obra'                  => new sfWidgetFormInputText(),
      'contacto'              => new sfWidgetFormInputText(),
      'rut_contacto'          => new sfWidgetFormInputText(),
      'telefono_contacto'     => new sfWidgetFormInputText(),
      'correo_contacto'       => new sfWidgetFormInputText(),
      'fecha_ingreso'         => new sfWidgetFormDateTime(),
      'fecha_emision'         => new sfWidgetFormDateTime(),
      'fecha_estimada_cierre' => new sfWidgetFormDate(),
      'validez'               => new sfWidgetFormInputText(),
      'total_neto'            => new sfWidgetFormInputText(),
      'descuento_a_total'     => new sfWidgetFormInputText(),
      'enviado'               => new sfWidgetFormInputText(),
      'id_vendedor'           => new sfWidgetFormInputText(),
      'id_empresa'            => new sfWidgetFormInputText(),
      'estado'                => new sfWidgetFormInputText(),
      'comentario'            => new sfWidgetFormTextarea(),
      'comentario_ventas'     => new sfWidgetFormTextarea(),
      'comentario_vendedor'   => new sfWidgetFormTextarea(),
    ));

    $this->setValidators(array(
      'id_cotizacion'         => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_cotizacion')), 'empty_value' => $this->getObject()->get('id_cotizacion'), 'required' => false)),
      'rut_cliente'           => new sfValidatorString(array('max_length' => 10)),
      'obra'                  => new sfValidatorString(array('max_length' => 100)),
      'contacto'              => new sfValidatorString(array('max_length' => 100)),
      'rut_contacto'          => new sfValidatorString(array('max_length' => 10)),
      'telefono_contacto'     => new sfValidatorString(array('max_length' => 12)),
      'correo_contacto'       => new sfValidatorString(array('max_length' => 30)),
      'fecha_ingreso'         => new sfValidatorDateTime(),
      'fecha_emision'         => new sfValidatorDateTime(),
      'fecha_estimada_cierre' => new sfValidatorDate(),
      'validez'               => new sfValidatorString(array('max_length' => 30)),
      'total_neto'            => new sfValidatorInteger(array('required' => false)),
      'descuento_a_total'     => new sfValidatorInteger(array('required' => false)),
      'enviado'               => new sfValidatorInteger(array('required' => false)),
      'id_vendedor'           => new sfValidatorInteger(),
      'id_empresa'            => new sfValidatorInteger(),
      'estado'                => new sfValidatorInteger(),
      'comentario'            => new sfValidatorString(array('max_length' => 500)),
      'comentario_ventas'     => new sfValidatorString(array('max_length' => 500)),
      'comentario_vendedor'   => new sfValidatorString(array('max_length' => 500)),
    ));

    $this->widgetSchema->setNameFormat('cotizaciones[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Cotizaciones';
  }

}
