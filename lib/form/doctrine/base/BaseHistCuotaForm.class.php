<?php

/**
 * HistCuota form base class.
 *
 * @method HistCuota getObject() Returns the current form's model object
 *
 * @package    sffacturacion
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseHistCuotaForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_hist_cuota'               => new sfWidgetFormInputHidden(),
      'id_factura'                  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Factura'), 'add_empty' => true)),
      'monto_hist_cuota'            => new sfWidgetFormInputText(),
      'montopagado_hist_cuota'      => new sfWidgetFormInputText(),
      'fechavencimiento_hist_cuota' => new sfWidgetFormDateTime(),
      'comentario_hist_cuota'       => new sfWidgetFormTextarea(),
      'estado_hist_cuota'           => new sfWidgetFormTextarea(),
    ));

    $this->setValidators(array(
      'id_hist_cuota'               => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_hist_cuota')), 'empty_value' => $this->getObject()->get('id_hist_cuota'), 'required' => false)),
      'id_factura'                  => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Factura'), 'required' => false)),
      'monto_hist_cuota'            => new sfValidatorInteger(array('required' => false)),
      'montopagado_hist_cuota'      => new sfValidatorInteger(array('required' => false)),
      'fechavencimiento_hist_cuota' => new sfValidatorDateTime(array('required' => false)),
      'comentario_hist_cuota'       => new sfValidatorString(array('max_length' => 300, 'required' => false)),
      'estado_hist_cuota'           => new sfValidatorString(array('max_length' => 300, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('hist_cuota[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'HistCuota';
  }

}
