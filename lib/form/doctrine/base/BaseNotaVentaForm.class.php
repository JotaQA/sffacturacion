<?php

/**
 * NotaVenta form base class.
 *
 * @method NotaVenta getObject() Returns the current form's model object
 *
 * @package    sffacturacion
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseNotaVentaForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_compra'      => new sfWidgetFormInputHidden(),
      'id_proveedor'   => new sfWidgetFormInputText(),
      'id_nota_compra' => new sfWidgetFormInputText(),
      'id_comprador'   => new sfWidgetFormInputText(),
      'fecha_nota'     => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id_compra'      => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_compra')), 'empty_value' => $this->getObject()->get('id_compra'), 'required' => false)),
      'id_proveedor'   => new sfValidatorInteger(),
      'id_nota_compra' => new sfValidatorInteger(),
      'id_comprador'   => new sfValidatorInteger(),
      'fecha_nota'     => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('nota_venta[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'NotaVenta';
  }

}
