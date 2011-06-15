<?php

/**
 * DetalleActivo filter form base class.
 *
 * @package    sffacturacion
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseDetalleActivoFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_boleta'                         => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Boleta'), 'add_empty' => true)),
      'id_factura'                        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Factura'), 'add_empty' => true)),
      'id_guia'                           => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Guia'), 'add_empty' => true)),
      'id_nota_credito'                   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('NotaCredito'), 'add_empty' => true)),
      'id_salida'                         => new sfWidgetFormFilterInput(),
      'id_salida_ac'                      => new sfWidgetFormFilterInput(),
      'codigointerno_detalle_activo'      => new sfWidgetFormFilterInput(),
      'codigoexterno_detalle_activo'      => new sfWidgetFormFilterInput(),
      'cantidad_detalle_activo'           => new sfWidgetFormFilterInput(),
      'cantidad_nota_credito'             => new sfWidgetFormFilterInput(),
      'precio_detalle_activo'             => new sfWidgetFormFilterInput(),
      'fechaingreso_detalle_activo'       => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'id_producto'                       => new sfWidgetFormFilterInput(),
      'descripcioninterna_detalle_activo' => new sfWidgetFormFilterInput(),
      'descripcionexterna_detalle_activo' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'id_boleta'                         => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Boleta'), 'column' => 'id_boleta')),
      'id_factura'                        => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Factura'), 'column' => 'id_factura')),
      'id_guia'                           => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Guia'), 'column' => 'id_guia')),
      'id_nota_credito'                   => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('NotaCredito'), 'column' => 'id_nota_credito')),
      'id_salida'                         => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'id_salida_ac'                      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'codigointerno_detalle_activo'      => new sfValidatorPass(array('required' => false)),
      'codigoexterno_detalle_activo'      => new sfValidatorPass(array('required' => false)),
      'cantidad_detalle_activo'           => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'cantidad_nota_credito'             => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'precio_detalle_activo'             => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'fechaingreso_detalle_activo'       => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'id_producto'                       => new sfValidatorPass(array('required' => false)),
      'descripcioninterna_detalle_activo' => new sfValidatorPass(array('required' => false)),
      'descripcionexterna_detalle_activo' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('detalle_activo_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'DetalleActivo';
  }

  public function getFields()
  {
    return array(
      'id_detalle_activo'                 => 'Number',
      'id_boleta'                         => 'ForeignKey',
      'id_factura'                        => 'ForeignKey',
      'id_guia'                           => 'ForeignKey',
      'id_nota_credito'                   => 'ForeignKey',
      'id_salida'                         => 'Number',
      'id_salida_ac'                      => 'Number',
      'codigointerno_detalle_activo'      => 'Text',
      'codigoexterno_detalle_activo'      => 'Text',
      'cantidad_detalle_activo'           => 'Number',
      'cantidad_nota_credito'             => 'Number',
      'precio_detalle_activo'             => 'Number',
      'fechaingreso_detalle_activo'       => 'Date',
      'id_producto'                       => 'Text',
      'descripcioninterna_detalle_activo' => 'Text',
      'descripcionexterna_detalle_activo' => 'Text',
    );
  }
}
