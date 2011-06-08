<?php

/**
 * HistPago filter form base class.
 *
 * @package    sffacturacion
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseHistPagoFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_hist_cuota'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('HistCuota'), 'add_empty' => true)),
      'fecha_hist_pago'    => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'monto_hist_pago'    => new sfWidgetFormFilterInput(),
      'tipopago_tipo_pago' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'id_hist_cuota'      => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('HistCuota'), 'column' => 'id_hist_cuota')),
      'fecha_hist_pago'    => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'monto_hist_pago'    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'tipopago_tipo_pago' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('hist_pago_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'HistPago';
  }

  public function getFields()
  {
    return array(
      'id_hist_pago'       => 'Number',
      'id_hist_cuota'      => 'ForeignKey',
      'fecha_hist_pago'    => 'Date',
      'monto_hist_pago'    => 'Number',
      'tipopago_tipo_pago' => 'Text',
    );
  }
}
