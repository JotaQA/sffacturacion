<?php

/**
 * Stock form base class.
 *
 * @method Stock getObject() Returns the current form's model object
 *
 * @package    sffacturacion
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseStockForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_stock'         => new sfWidgetFormInputHidden(),
      'tipo'             => new sfWidgetFormInputText(),
      'id_activo'        => new sfWidgetFormInputText(),
      'stock_actual'     => new sfWidgetFormInputText(),
      'por_despachar'    => new sfWidgetFormInputText(),
      'stock_reservado'  => new sfWidgetFormInputText(),
      'faltan'           => new sfWidgetFormInputText(),
      'precio_lista'     => new sfWidgetFormInputText(),
      'fecha_precio'     => new sfWidgetFormDateTime(),
      'descuento'        => new sfWidgetFormInputText(),
      'fecha_descuento'  => new sfWidgetFormDateTime(),
      'seguridad'        => new sfWidgetFormInputText(),
      'promedio'         => new sfWidgetFormInputText(),
      'comentario_stock' => new sfWidgetFormTextarea(),
    ));

    $this->setValidators(array(
      'id_stock'         => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_stock')), 'empty_value' => $this->getObject()->get('id_stock'), 'required' => false)),
      'tipo'             => new sfValidatorInteger(),
      'id_activo'        => new sfValidatorString(array('max_length' => 50)),
      'stock_actual'     => new sfValidatorInteger(),
      'por_despachar'    => new sfValidatorInteger(),
      'stock_reservado'  => new sfValidatorInteger(),
      'faltan'           => new sfValidatorInteger(),
      'precio_lista'     => new sfValidatorInteger(array('required' => false)),
      'fecha_precio'     => new sfValidatorDateTime(),
      'descuento'        => new sfValidatorNumber(),
      'fecha_descuento'  => new sfValidatorDateTime(),
      'seguridad'        => new sfValidatorInteger(array('required' => false)),
      'promedio'         => new sfValidatorInteger(array('required' => false)),
      'comentario_stock' => new sfValidatorString(array('max_length' => 5000)),
    ));

    $this->widgetSchema->setNameFormat('stock[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Stock';
  }

}
