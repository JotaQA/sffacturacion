<?php

/**
 * CotizacionesProducto filter form base class.
 *
 * @package    sffacturacion
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseCotizacionesProductoFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_cotizacion'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'id_producto'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'cantidad'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'precio'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'descuento'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'nombre'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'detalle_tecnico' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'comentario'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'id_cotizacion'   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'id_producto'     => new sfValidatorPass(array('required' => false)),
      'cantidad'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'precio'          => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'descuento'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'nombre'          => new sfValidatorPass(array('required' => false)),
      'detalle_tecnico' => new sfValidatorPass(array('required' => false)),
      'comentario'      => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('cotizaciones_producto_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'CotizacionesProducto';
  }

  public function getFields()
  {
    return array(
      'id'              => 'Number',
      'id_cotizacion'   => 'Number',
      'id_producto'     => 'Text',
      'cantidad'        => 'Number',
      'precio'          => 'Number',
      'descuento'       => 'Number',
      'nombre'          => 'Text',
      'detalle_tecnico' => 'Text',
      'comentario'      => 'Text',
    );
  }
}
