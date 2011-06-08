<?php

/**
 * Pago form base class.
 *
 * @method Pago getObject() Returns the current form's model object
 *
 * @package    sffacturacion
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BasePagoForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_pago'      => new sfWidgetFormInputHidden(),
      'id_cuota'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Cuota'), 'add_empty' => false)),
      'id_tipo_pago' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TipoPago'), 'add_empty' => false)),
      'fecha_pago'   => new sfWidgetFormDateTime(),
      'monto_pago'   => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id_pago'      => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_pago')), 'empty_value' => $this->getObject()->get('id_pago'), 'required' => false)),
      'id_cuota'     => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Cuota'))),
      'id_tipo_pago' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('TipoPago'))),
      'fecha_pago'   => new sfValidatorDateTime(),
      'monto_pago'   => new sfValidatorInteger(),
    ));

    $this->widgetSchema->setNameFormat('pago[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Pago';
  }

}
