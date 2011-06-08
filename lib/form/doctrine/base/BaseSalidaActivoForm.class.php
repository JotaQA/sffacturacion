<?php

/**
 * SalidaActivo form base class.
 *
 * @method SalidaActivo getObject() Returns the current form's model object
 *
 * @package    sffacturacion
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseSalidaActivoForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_salida_ac'      => new sfWidgetFormInputHidden(),
      'id_salida'         => new sfWidgetFormInputText(),
      'id_prod'           => new sfWidgetFormTextarea(),
      'cantidad'          => new sfWidgetFormInputText(),
      'precio'            => new sfWidgetFormInputText(),
      'descuento'         => new sfWidgetFormInputText(),
      'estado'            => new sfWidgetFormInputText(),
      'parcializado_de'   => new sfWidgetFormInputText(),
      'requiere_permiso'  => new sfWidgetFormInputText(),
      'fecha_sal_act'     => new sfWidgetFormDateTime(),
      'nacional'          => new sfWidgetFormInputText(),
      'faltan'            => new sfWidgetFormInputText(),
      'comp_editada'      => new sfWidgetFormInputText(),
      'fecha_modif'       => new sfWidgetFormDateTime(),
      'comentario_bodega' => new sfWidgetFormTextarea(),
      'id_factura'        => new sfWidgetFormInputText(),
      'factura'           => new sfWidgetFormInputText(),
      'id_guia'           => new sfWidgetFormInputText(),
      'guia'              => new sfWidgetFormInputText(),
      'id_boleta'         => new sfWidgetFormInputText(),
      'boleta'            => new sfWidgetFormInputText(),
      'despacho'          => new sfWidgetFormInputText(),
      'facturado'         => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id_salida_ac'      => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_salida_ac')), 'empty_value' => $this->getObject()->get('id_salida_ac'), 'required' => false)),
      'id_salida'         => new sfValidatorString(array('max_length' => 50)),
      'id_prod'           => new sfValidatorString(array('max_length' => 500)),
      'cantidad'          => new sfValidatorInteger(),
      'precio'            => new sfValidatorInteger(),
      'descuento'         => new sfValidatorNumber(),
      'estado'            => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'parcializado_de'   => new sfValidatorInteger(),
      'requiere_permiso'  => new sfValidatorInteger(array('required' => false)),
      'fecha_sal_act'     => new sfValidatorDateTime(),
      'nacional'          => new sfValidatorInteger(array('required' => false)),
      'faltan'            => new sfValidatorInteger(array('required' => false)),
      'comp_editada'      => new sfValidatorInteger(array('required' => false)),
      'fecha_modif'       => new sfValidatorDateTime(),
      'comentario_bodega' => new sfValidatorString(array('max_length' => 1000)),
      'id_factura'        => new sfValidatorInteger(),
      'factura'           => new sfValidatorInteger(array('required' => false)),
      'id_guia'           => new sfValidatorInteger(array('required' => false)),
      'guia'              => new sfValidatorInteger(array('required' => false)),
      'id_boleta'         => new sfValidatorInteger(array('required' => false)),
      'boleta'            => new sfValidatorInteger(array('required' => false)),
      'despacho'          => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'facturado'         => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('salida_activo[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'SalidaActivo';
  }

}
