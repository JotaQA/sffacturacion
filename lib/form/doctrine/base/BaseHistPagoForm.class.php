<?php

/**
 * HistPago form base class.
 *
 * @method HistPago getObject() Returns the current form's model object
 *
 * @package    sffacturacion
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseHistPagoForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_hist_pago'       => new sfWidgetFormInputHidden(),
      'id_hist_cuota'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('HistCuota'), 'add_empty' => true)),
      'fecha_hist_pago'    => new sfWidgetFormDateTime(),
      'monto_hist_pago'    => new sfWidgetFormInputText(),
      'tipopago_tipo_pago' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id_hist_pago'       => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_hist_pago')), 'empty_value' => $this->getObject()->get('id_hist_pago'), 'required' => false)),
      'id_hist_cuota'      => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('HistCuota'), 'required' => false)),
      'fecha_hist_pago'    => new sfValidatorDateTime(array('required' => false)),
      'monto_hist_pago'    => new sfValidatorInteger(array('required' => false)),
      'tipopago_tipo_pago' => new sfValidatorString(array('max_length' => 50, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('hist_pago[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'HistPago';
  }

}
