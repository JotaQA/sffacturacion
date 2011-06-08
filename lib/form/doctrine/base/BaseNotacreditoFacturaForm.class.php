<?php

/**
 * NotacreditoFactura form base class.
 *
 * @method NotacreditoFactura getObject() Returns the current form's model object
 *
 * @package    sffacturacion
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseNotacreditoFacturaForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_factura'      => new sfWidgetFormInputHidden(),
      'id_nota_credito' => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'id_factura'      => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_factura')), 'empty_value' => $this->getObject()->get('id_factura'), 'required' => false)),
      'id_nota_credito' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_nota_credito')), 'empty_value' => $this->getObject()->get('id_nota_credito'), 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('notacredito_factura[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'NotacreditoFactura';
  }

}
