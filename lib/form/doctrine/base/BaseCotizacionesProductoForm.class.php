<?php

/**
 * CotizacionesProducto form base class.
 *
 * @method CotizacionesProducto getObject() Returns the current form's model object
 *
 * @package    sffacturacion
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseCotizacionesProductoForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'              => new sfWidgetFormInputHidden(),
      'id_cotizacion'   => new sfWidgetFormInputText(),
      'id_producto'     => new sfWidgetFormInputText(),
      'cantidad'        => new sfWidgetFormInputText(),
      'precio'          => new sfWidgetFormInputText(),
      'descuento'       => new sfWidgetFormInputText(),
      'nombre'          => new sfWidgetFormInputText(),
      'detalle_tecnico' => new sfWidgetFormInputText(),
      'comentario'      => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'              => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'id_cotizacion'   => new sfValidatorInteger(),
      'id_producto'     => new sfValidatorString(array('max_length' => 30)),
      'cantidad'        => new sfValidatorInteger(),
      'precio'          => new sfValidatorInteger(),
      'descuento'       => new sfValidatorInteger(),
      'nombre'          => new sfValidatorString(array('max_length' => 30)),
      'detalle_tecnico' => new sfValidatorString(array('max_length' => 100)),
      'comentario'      => new sfValidatorString(array('max_length' => 200)),
    ));

    $this->widgetSchema->setNameFormat('cotizaciones_producto[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'CotizacionesProducto';
  }

}
