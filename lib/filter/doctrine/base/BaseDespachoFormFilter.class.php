<?php

/**
 * Despacho filter form base class.
 *
 * @package    sffacturacion
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseDespachoFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_chofer'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'id_vehiculo'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'fecha_estimada' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'estado'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'comentario'     => new sfWidgetFormFilterInput(),
      'fecha_creacion' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'bultos'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'id_chofer'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'id_vehiculo'    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'fecha_estimada' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'estado'         => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'comentario'     => new sfValidatorPass(array('required' => false)),
      'fecha_creacion' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'bultos'         => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('despacho_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Despacho';
  }

  public function getFields()
  {
    return array(
      'id_despacho'    => 'Number',
      'id_chofer'      => 'Number',
      'id_vehiculo'    => 'Number',
      'fecha_estimada' => 'Date',
      'estado'         => 'Number',
      'comentario'     => 'Text',
      'fecha_creacion' => 'Date',
      'bultos'         => 'Number',
    );
  }
}
