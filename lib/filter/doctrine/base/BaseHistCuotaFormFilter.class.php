<?php

/**
 * HistCuota filter form base class.
 *
 * @package    sffacturacion
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseHistCuotaFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_factura'                  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Factura'), 'add_empty' => true)),
      'monto_hist_cuota'            => new sfWidgetFormFilterInput(),
      'montopagado_hist_cuota'      => new sfWidgetFormFilterInput(),
      'fechavencimiento_hist_cuota' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'comentario_hist_cuota'       => new sfWidgetFormFilterInput(),
      'estado_hist_cuota'           => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'id_factura'                  => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Factura'), 'column' => 'id_factura')),
      'monto_hist_cuota'            => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'montopagado_hist_cuota'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'fechavencimiento_hist_cuota' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'comentario_hist_cuota'       => new sfValidatorPass(array('required' => false)),
      'estado_hist_cuota'           => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('hist_cuota_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'HistCuota';
  }

  public function getFields()
  {
    return array(
      'id_hist_cuota'               => 'Number',
      'id_factura'                  => 'ForeignKey',
      'monto_hist_cuota'            => 'Number',
      'montopagado_hist_cuota'      => 'Number',
      'fechavencimiento_hist_cuota' => 'Date',
      'comentario_hist_cuota'       => 'Text',
      'estado_hist_cuota'           => 'Text',
    );
  }
}
