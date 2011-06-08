<?php

/**
 * SalidaActivo filter form base class.
 *
 * @package    sffacturacion
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseSalidaActivoFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_salida'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'id_prod'           => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'cantidad'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'precio'            => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'descuento'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'estado'            => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'parcializado_de'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'requiere_permiso'  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'fecha_sal_act'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'nacional'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'faltan'            => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'comp_editada'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'fecha_modif'       => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'comentario_bodega' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'id_factura'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'factura'           => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'id_guia'           => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'guia'              => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'id_boleta'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'boleta'            => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'despacho'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'facturado'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'id_salida'         => new sfValidatorPass(array('required' => false)),
      'id_prod'           => new sfValidatorPass(array('required' => false)),
      'cantidad'          => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'precio'            => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'descuento'         => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'estado'            => new sfValidatorPass(array('required' => false)),
      'parcializado_de'   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'requiere_permiso'  => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'fecha_sal_act'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'nacional'          => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'faltan'            => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'comp_editada'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'fecha_modif'       => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'comentario_bodega' => new sfValidatorPass(array('required' => false)),
      'id_factura'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'factura'           => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'id_guia'           => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'guia'              => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'id_boleta'         => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'boleta'            => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'despacho'          => new sfValidatorPass(array('required' => false)),
      'facturado'         => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('salida_activo_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'SalidaActivo';
  }

  public function getFields()
  {
    return array(
      'id_salida_ac'      => 'Number',
      'id_salida'         => 'Text',
      'id_prod'           => 'Text',
      'cantidad'          => 'Number',
      'precio'            => 'Number',
      'descuento'         => 'Number',
      'estado'            => 'Text',
      'parcializado_de'   => 'Number',
      'requiere_permiso'  => 'Number',
      'fecha_sal_act'     => 'Date',
      'nacional'          => 'Number',
      'faltan'            => 'Number',
      'comp_editada'      => 'Number',
      'fecha_modif'       => 'Date',
      'comentario_bodega' => 'Text',
      'id_factura'        => 'Number',
      'factura'           => 'Number',
      'id_guia'           => 'Number',
      'guia'              => 'Number',
      'id_boleta'         => 'Number',
      'boleta'            => 'Number',
      'despacho'          => 'Text',
      'facturado'         => 'Number',
    );
  }
}
