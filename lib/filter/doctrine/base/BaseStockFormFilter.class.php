<?php

/**
 * Stock filter form base class.
 *
 * @package    sffacturacion
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseStockFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'tipo'             => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'id_activo'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'stock_actual'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'por_despachar'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'stock_reservado'  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'faltan'           => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'precio_lista'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'fecha_precio'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'descuento'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'fecha_descuento'  => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'seguridad'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'promedio'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'comentario_stock' => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'tipo'             => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'id_activo'        => new sfValidatorPass(array('required' => false)),
      'stock_actual'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'por_despachar'    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'stock_reservado'  => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'faltan'           => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'precio_lista'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'fecha_precio'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'descuento'        => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'fecha_descuento'  => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'seguridad'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'promedio'         => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'comentario_stock' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('stock_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Stock';
  }

  public function getFields()
  {
    return array(
      'id_stock'         => 'Number',
      'tipo'             => 'Number',
      'id_activo'        => 'Text',
      'stock_actual'     => 'Number',
      'por_despachar'    => 'Number',
      'stock_reservado'  => 'Number',
      'faltan'           => 'Number',
      'precio_lista'     => 'Number',
      'fecha_precio'     => 'Date',
      'descuento'        => 'Number',
      'fecha_descuento'  => 'Date',
      'seguridad'        => 'Number',
      'promedio'         => 'Number',
      'comentario_stock' => 'Text',
    );
  }
}
