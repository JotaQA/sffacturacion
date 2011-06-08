<?php

/**
 * FormasPago form base class.
 *
 * @method FormasPago getObject() Returns the current form's model object
 *
 * @package    sffacturacion
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseFormasPagoForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_pago'          => new sfWidgetFormInputHidden(),
      'descripcion_pago' => new sfWidgetFormInputText(),
      'vencimiento'      => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id_pago'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_pago')), 'empty_value' => $this->getObject()->get('id_pago'), 'required' => false)),
      'descripcion_pago' => new sfValidatorString(array('max_length' => 255)),
      'vencimiento'      => new sfValidatorInteger(),
    ));

    $this->widgetSchema->setNameFormat('formas_pago[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'FormasPago';
  }

}
