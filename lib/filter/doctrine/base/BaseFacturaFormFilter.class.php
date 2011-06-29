<?php

/**
 * Factura filter form base class.
 *
 * @package    sffacturacion
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseFacturaFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_estadofactura'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('EstadoFactura'), 'add_empty' => true)),
      'id_division'            => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Division'), 'add_empty' => true)),
      'numero_factura'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'fechaingreso_factura'   => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'fechaemision_factura'   => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'monto_factura'          => new sfWidgetFormFilterInput(),
      'saldo_factura'          => new sfWidgetFormFilterInput(),
      'descuento_factura'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'id_notapedido_factura'  => new sfWidgetFormFilterInput(),
      'rut_factura'            => new sfWidgetFormFilterInput(),
      'telefono_factura'       => new sfWidgetFormFilterInput(),
      'nombre_factura'         => new sfWidgetFormFilterInput(),
      'direccion_factura'      => new sfWidgetFormFilterInput(),
      'comuna_factura'         => new sfWidgetFormFilterInput(),
      'ciudad_factura'         => new sfWidgetFormFilterInput(),
      'giro_factura'           => new sfWidgetFormFilterInput(),
      'oc_factura'             => new sfWidgetFormFilterInput(),
      'condicionpago_factura'  => new sfWidgetFormFilterInput(),
      'responsable_factura'    => new sfWidgetFormFilterInput(),
      'responsable2_factura'   => new sfWidgetFormFilterInput(),
      'pctje_comision_factura' => new sfWidgetFormFilterInput(),
      'creador_factura'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'emisor_factura'         => new sfWidgetFormFilterInput(),
      'anulador_factura'       => new sfWidgetFormFilterInput(),
      'comentario_factura'     => new sfWidgetFormFilterInput(),
      'tipo_factura'           => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'id_estadofactura'       => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('EstadoFactura'), 'column' => 'id_estadofactura')),
      'id_division'            => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Division'), 'column' => 'id_division')),
      'numero_factura'         => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'fechaingreso_factura'   => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'fechaemision_factura'   => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'monto_factura'          => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'saldo_factura'          => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'descuento_factura'      => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'id_notapedido_factura'  => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'rut_factura'            => new sfValidatorPass(array('required' => false)),
      'telefono_factura'       => new sfValidatorPass(array('required' => false)),
      'nombre_factura'         => new sfValidatorPass(array('required' => false)),
      'direccion_factura'      => new sfValidatorPass(array('required' => false)),
      'comuna_factura'         => new sfValidatorPass(array('required' => false)),
      'ciudad_factura'         => new sfValidatorPass(array('required' => false)),
      'giro_factura'           => new sfValidatorPass(array('required' => false)),
      'oc_factura'             => new sfValidatorPass(array('required' => false)),
      'condicionpago_factura'  => new sfValidatorPass(array('required' => false)),
      'responsable_factura'    => new sfValidatorPass(array('required' => false)),
      'responsable2_factura'   => new sfValidatorPass(array('required' => false)),
      'pctje_comision_factura' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'creador_factura'        => new sfValidatorPass(array('required' => false)),
      'emisor_factura'         => new sfValidatorPass(array('required' => false)),
      'anulador_factura'       => new sfValidatorPass(array('required' => false)),
      'comentario_factura'     => new sfValidatorPass(array('required' => false)),
      'tipo_factura'           => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('factura_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Factura';
  }

  public function getFields()
  {
    return array(
      'id_factura'             => 'Number',
      'id_estadofactura'       => 'ForeignKey',
      'id_division'            => 'ForeignKey',
      'numero_factura'         => 'Number',
      'fechaingreso_factura'   => 'Date',
      'fechaemision_factura'   => 'Date',
      'monto_factura'          => 'Number',
      'saldo_factura'          => 'Number',
      'descuento_factura'      => 'Number',
      'id_notapedido_factura'  => 'Number',
      'rut_factura'            => 'Text',
      'telefono_factura'       => 'Text',
      'nombre_factura'         => 'Text',
      'direccion_factura'      => 'Text',
      'comuna_factura'         => 'Text',
      'ciudad_factura'         => 'Text',
      'giro_factura'           => 'Text',
      'oc_factura'             => 'Text',
      'condicionpago_factura'  => 'Text',
      'responsable_factura'    => 'Text',
      'responsable2_factura'   => 'Text',
      'pctje_comision_factura' => 'Number',
      'creador_factura'        => 'Text',
      'emisor_factura'         => 'Text',
      'anulador_factura'       => 'Text',
      'comentario_factura'     => 'Text',
      'tipo_factura'           => 'Text',
    );
  }
}
