<?php

/**
 * Salida form base class.
 *
 * @method Salida getObject() Returns the current form's model object
 *
 * @package    sffacturacion
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseSalidaForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_salida'           => new sfWidgetFormInputHidden(),
      'id_cliente'          => new sfWidgetFormInputText(),
      'id_responsable'      => new sfWidgetFormInputText(),
      'id_responsable2'     => new sfWidgetFormInputText(),
      'porcentaje'          => new sfWidgetFormInputText(),
      'id_division'         => new sfWidgetFormInputText(),
      'id_sucursal'         => new sfWidgetFormInputText(),
      'fecha'               => new sfWidgetFormDate(),
      'fecha_ingreso'       => new sfWidgetFormDateTime(),
      'comentario'          => new sfWidgetFormTextarea(),
      'estado'              => new sfWidgetFormInputText(),
      'fecha_salida'        => new sfWidgetFormDateTime(),
      'orden_compra'        => new sfWidgetFormInputText(),
      'observacion'         => new sfWidgetFormTextarea(),
      'url_orden_compra'    => new sfWidgetFormTextarea(),
      'condicion_pago'      => new sfWidgetFormInputText(),
      'neto'                => new sfWidgetFormInputText(),
      'es_muestra'          => new sfWidgetFormInputText(),
      'descuento_salida'    => new sfWidgetFormInputText(),
      'ingresado_por'       => new sfWidgetFormInputText(),
      'fecha_sugerida'      => new sfWidgetFormDate(),
      'anulador'            => new sfWidgetFormInputText(),
      'id_empresa'          => new sfWidgetFormInputText(),
      'comentario_finanzas' => new sfWidgetFormTextarea(),
      'comentario_bodega'   => new sfWidgetFormTextarea(),
      'transporte'          => new sfWidgetFormTextarea(),
      'fecha_comercial'     => new sfWidgetFormDateTime(),
      'fecha_finanzas'      => new sfWidgetFormDateTime(),
      'neto_aprobado'       => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id_salida'           => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_salida')), 'empty_value' => $this->getObject()->get('id_salida'), 'required' => false)),
      'id_cliente'          => new sfValidatorString(array('max_length' => 50)),
      'id_responsable'      => new sfValidatorString(array('max_length' => 50)),
      'id_responsable2'     => new sfValidatorString(array('max_length' => 50)),
      'porcentaje'          => new sfValidatorInteger(array('required' => false)),
      'id_division'         => new sfValidatorInteger(),
      'id_sucursal'         => new sfValidatorString(array('max_length' => 50)),
      'fecha'               => new sfValidatorDate(),
      'fecha_ingreso'       => new sfValidatorDateTime(),
      'comentario'          => new sfValidatorString(array('max_length' => 500)),
      'estado'              => new sfValidatorInteger(),
      'fecha_salida'        => new sfValidatorDateTime(),
      'orden_compra'        => new sfValidatorString(array('max_length' => 20)),
      'observacion'         => new sfValidatorString(array('max_length' => 2555)),
      'url_orden_compra'    => new sfValidatorString(array('max_length' => 2000, 'required' => false)),
      'condicion_pago'      => new sfValidatorInteger(array('required' => false)),
      'neto'                => new sfValidatorInteger(array('required' => false)),
      'es_muestra'          => new sfValidatorInteger(array('required' => false)),
      'descuento_salida'    => new sfValidatorNumber(array('required' => false)),
      'ingresado_por'       => new sfValidatorString(array('max_length' => 50)),
      'fecha_sugerida'      => new sfValidatorDate(),
      'anulador'            => new sfValidatorInteger(),
      'id_empresa'          => new sfValidatorInteger(),
      'comentario_finanzas' => new sfValidatorString(array('max_length' => 500)),
      'comentario_bodega'   => new sfValidatorString(array('max_length' => 500)),
      'transporte'          => new sfValidatorString(array('max_length' => 2000)),
      'fecha_comercial'     => new sfValidatorDateTime(),
      'fecha_finanzas'      => new sfValidatorDateTime(),
      'neto_aprobado'       => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('salida[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Salida';
  }

}
