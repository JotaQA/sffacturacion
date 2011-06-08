<?php

/**
 * Cuota filter form base class.
 *
 * @package    sffacturacion
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseCuotaFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_factura'             => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Factura'), 'add_empty' => true)),
      'id_estado_cuota'        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('EstadoCuota'), 'add_empty' => true)),
      'monto_cuota'            => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'montopagado_cuota'      => new sfWidgetFormFilterInput(),
      'fechavencimiento_cuota' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'accion_cuota'           => new sfWidgetFormFilterInput(),
      'comentario_cuota'       => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'id_factura'             => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Factura'), 'column' => 'id_factura')),
      'id_estado_cuota'        => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('EstadoCuota'), 'column' => 'id_estado_cuota')),
      'monto_cuota'            => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'montopagado_cuota'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'fechavencimiento_cuota' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'accion_cuota'           => new sfValidatorPass(array('required' => false)),
      'comentario_cuota'       => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('cuota_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Cuota';
  }

  public function getFields()
  {
    return array(
      'id_cuota'               => 'Number',
      'id_factura'             => 'ForeignKey',
      'id_estado_cuota'        => 'ForeignKey',
      'monto_cuota'            => 'Number',
      'montopagado_cuota'      => 'Number',
      'fechavencimiento_cuota' => 'Date',
      'accion_cuota'           => 'Text',
      'comentario_cuota'       => 'Text',
    );
  }
}
