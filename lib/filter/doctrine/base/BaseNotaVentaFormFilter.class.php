<?php

/**
 * NotaVenta filter form base class.
 *
 * @package    sffacturacion
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseNotaVentaFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_proveedor'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'id_nota_compra' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'id_comprador'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'fecha_nota'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'id_proveedor'   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'id_nota_compra' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'id_comprador'   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'fecha_nota'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('nota_venta_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'NotaVenta';
  }

  public function getFields()
  {
    return array(
      'id_compra'      => 'Number',
      'id_proveedor'   => 'Number',
      'id_nota_compra' => 'Number',
      'id_comprador'   => 'Number',
      'fecha_nota'     => 'Date',
    );
  }
}
