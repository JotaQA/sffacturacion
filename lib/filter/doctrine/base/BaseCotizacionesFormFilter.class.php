<?php

/**
 * Cotizaciones filter form base class.
 *
 * @package    sffacturacion
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseCotizacionesFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'rut_cliente'           => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'obra'                  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'contacto'              => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'rut_contacto'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'telefono_contacto'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'correo_contacto'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'fecha_ingreso'         => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'fecha_emision'         => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'fecha_estimada_cierre' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'validez'               => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'total_neto'            => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'descuento_a_total'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'enviado'               => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'id_vendedor'           => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'id_empresa'            => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'estado'                => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'comentario'            => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'comentario_ventas'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'comentario_vendedor'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'rut_cliente'           => new sfValidatorPass(array('required' => false)),
      'obra'                  => new sfValidatorPass(array('required' => false)),
      'contacto'              => new sfValidatorPass(array('required' => false)),
      'rut_contacto'          => new sfValidatorPass(array('required' => false)),
      'telefono_contacto'     => new sfValidatorPass(array('required' => false)),
      'correo_contacto'       => new sfValidatorPass(array('required' => false)),
      'fecha_ingreso'         => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'fecha_emision'         => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'fecha_estimada_cierre' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'validez'               => new sfValidatorPass(array('required' => false)),
      'total_neto'            => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'descuento_a_total'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'enviado'               => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'id_vendedor'           => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'id_empresa'            => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'estado'                => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'comentario'            => new sfValidatorPass(array('required' => false)),
      'comentario_ventas'     => new sfValidatorPass(array('required' => false)),
      'comentario_vendedor'   => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('cotizaciones_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Cotizaciones';
  }

  public function getFields()
  {
    return array(
      'id_cotizacion'         => 'Number',
      'rut_cliente'           => 'Text',
      'obra'                  => 'Text',
      'contacto'              => 'Text',
      'rut_contacto'          => 'Text',
      'telefono_contacto'     => 'Text',
      'correo_contacto'       => 'Text',
      'fecha_ingreso'         => 'Date',
      'fecha_emision'         => 'Date',
      'fecha_estimada_cierre' => 'Date',
      'validez'               => 'Text',
      'total_neto'            => 'Number',
      'descuento_a_total'     => 'Number',
      'enviado'               => 'Number',
      'id_vendedor'           => 'Number',
      'id_empresa'            => 'Number',
      'estado'                => 'Number',
      'comentario'            => 'Text',
      'comentario_ventas'     => 'Text',
      'comentario_vendedor'   => 'Text',
    );
  }
}
