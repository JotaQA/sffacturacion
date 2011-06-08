<?php

/**
 * DetalleActivo form base class.
 *
 * @method DetalleActivo getObject() Returns the current form's model object
 *
 * @package    sffacturacion
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseDetalleActivoForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_detalle_activo'                 => new sfWidgetFormInputHidden(),
      'id_boleta'                         => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Boleta'), 'add_empty' => true)),
      'id_factura'                        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Factura'), 'add_empty' => true)),
      'id_guia'                           => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Guia'), 'add_empty' => true)),
      'id_nota_credito'                   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('NotaCredito'), 'add_empty' => true)),
      'id_salida'                         => new sfWidgetFormInputText(),
      'id_salida_ac'                      => new sfWidgetFormInputText(),
      'codigointerno_detalle_activo'      => new sfWidgetFormInputText(),
      'codigoexterno_detalle_activo'      => new sfWidgetFormInputText(),
      'cantidad_detalle_activo'           => new sfWidgetFormInputText(),
      'precio_detalle_activo'             => new sfWidgetFormInputText(),
      'fechaingreso_detalle_activo'       => new sfWidgetFormDateTime(),
      'id_producto'                       => new sfWidgetFormInputText(),
      'descripcioninterna_detalle_activo' => new sfWidgetFormTextarea(),
      'descripcionexterna_detalle_activo' => new sfWidgetFormTextarea(),
    ));

    $this->setValidators(array(
      'id_detalle_activo'                 => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_detalle_activo')), 'empty_value' => $this->getObject()->get('id_detalle_activo'), 'required' => false)),
      'id_boleta'                         => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Boleta'), 'required' => false)),
      'id_factura'                        => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Factura'), 'required' => false)),
      'id_guia'                           => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Guia'), 'required' => false)),
      'id_nota_credito'                   => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('NotaCredito'), 'required' => false)),
      'id_salida'                         => new sfValidatorInteger(array('required' => false)),
      'id_salida_ac'                      => new sfValidatorInteger(array('required' => false)),
      'codigointerno_detalle_activo'      => new sfValidatorString(array('max_length' => 64, 'required' => false)),
      'codigoexterno_detalle_activo'      => new sfValidatorString(array('max_length' => 64, 'required' => false)),
      'cantidad_detalle_activo'           => new sfValidatorInteger(array('required' => false)),
      'precio_detalle_activo'             => new sfValidatorInteger(array('required' => false)),
      'fechaingreso_detalle_activo'       => new sfValidatorDateTime(array('required' => false)),
      'id_producto'                       => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'descripcioninterna_detalle_activo' => new sfValidatorString(array('max_length' => 512, 'required' => false)),
      'descripcionexterna_detalle_activo' => new sfValidatorString(array('max_length' => 512, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('detalle_activo[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'DetalleActivo';
  }

}
