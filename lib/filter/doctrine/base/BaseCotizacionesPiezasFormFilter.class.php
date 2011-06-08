<?php

/**
 * CotizacionesPiezas filter form base class.
 *
 * @package    sffacturacion
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseCotizacionesPiezasFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_cotizaciones_producto' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'id_pieza'                 => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'cantidad'                 => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'es_extra'                 => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'precio_pieza'             => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'nota_pieza'               => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'id_cotizaciones_producto' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'id_pieza'                 => new sfValidatorPass(array('required' => false)),
      'cantidad'                 => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'es_extra'                 => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'precio_pieza'             => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'nota_pieza'               => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('cotizaciones_piezas_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'CotizacionesPiezas';
  }

  public function getFields()
  {
    return array(
      'id'                       => 'Number',
      'id_cotizaciones_producto' => 'Number',
      'id_pieza'                 => 'Text',
      'cantidad'                 => 'Number',
      'es_extra'                 => 'Number',
      'precio_pieza'             => 'Number',
      'nota_pieza'               => 'Text',
    );
  }
}
