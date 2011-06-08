<?php

/**
 * Salida filter form base class.
 *
 * @package    sffacturacion
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseSalidaFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_cliente'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'id_responsable'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'id_responsable2'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'porcentaje'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'id_division'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'id_sucursal'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'fecha'               => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'fecha_ingreso'       => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'comentario'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'estado'              => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'fecha_salida'        => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'orden_compra'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'observacion'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'url_orden_compra'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'condicion_pago'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'neto'                => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'es_muestra'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'descuento_salida'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'ingresado_por'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'fecha_sugerida'      => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'anulador'            => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'id_empresa'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'comentario_finanzas' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'comentario_bodega'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'transporte'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'fecha_comercial'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'fecha_finanzas'      => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'neto_aprobado'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'id_cliente'          => new sfValidatorPass(array('required' => false)),
      'id_responsable'      => new sfValidatorPass(array('required' => false)),
      'id_responsable2'     => new sfValidatorPass(array('required' => false)),
      'porcentaje'          => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'id_division'         => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'id_sucursal'         => new sfValidatorPass(array('required' => false)),
      'fecha'               => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'fecha_ingreso'       => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'comentario'          => new sfValidatorPass(array('required' => false)),
      'estado'              => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'fecha_salida'        => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'orden_compra'        => new sfValidatorPass(array('required' => false)),
      'observacion'         => new sfValidatorPass(array('required' => false)),
      'url_orden_compra'    => new sfValidatorPass(array('required' => false)),
      'condicion_pago'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'neto'                => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'es_muestra'          => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'descuento_salida'    => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'ingresado_por'       => new sfValidatorPass(array('required' => false)),
      'fecha_sugerida'      => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'anulador'            => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'id_empresa'          => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'comentario_finanzas' => new sfValidatorPass(array('required' => false)),
      'comentario_bodega'   => new sfValidatorPass(array('required' => false)),
      'transporte'          => new sfValidatorPass(array('required' => false)),
      'fecha_comercial'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'fecha_finanzas'      => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'neto_aprobado'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('salida_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Salida';
  }

  public function getFields()
  {
    return array(
      'id_salida'           => 'Number',
      'id_cliente'          => 'Text',
      'id_responsable'      => 'Text',
      'id_responsable2'     => 'Text',
      'porcentaje'          => 'Number',
      'id_division'         => 'Number',
      'id_sucursal'         => 'Text',
      'fecha'               => 'Date',
      'fecha_ingreso'       => 'Date',
      'comentario'          => 'Text',
      'estado'              => 'Number',
      'fecha_salida'        => 'Date',
      'orden_compra'        => 'Text',
      'observacion'         => 'Text',
      'url_orden_compra'    => 'Text',
      'condicion_pago'      => 'Number',
      'neto'                => 'Number',
      'es_muestra'          => 'Number',
      'descuento_salida'    => 'Number',
      'ingresado_por'       => 'Text',
      'fecha_sugerida'      => 'Date',
      'anulador'            => 'Number',
      'id_empresa'          => 'Number',
      'comentario_finanzas' => 'Text',
      'comentario_bodega'   => 'Text',
      'transporte'          => 'Text',
      'fecha_comercial'     => 'Date',
      'fecha_finanzas'      => 'Date',
      'neto_aprobado'       => 'Number',
    );
  }
}
