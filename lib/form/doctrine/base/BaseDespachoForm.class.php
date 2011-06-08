<?php

/**
 * Despacho form base class.
 *
 * @method Despacho getObject() Returns the current form's model object
 *
 * @package    sffacturacion
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseDespachoForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_despacho'    => new sfWidgetFormInputHidden(),
      'id_chofer'      => new sfWidgetFormInputText(),
      'id_vehiculo'    => new sfWidgetFormInputText(),
      'fecha_estimada' => new sfWidgetFormDateTime(),
      'estado'         => new sfWidgetFormInputText(),
      'comentario'     => new sfWidgetFormTextarea(),
      'fecha_creacion' => new sfWidgetFormDateTime(),
      'bultos'         => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id_despacho'    => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_despacho')), 'empty_value' => $this->getObject()->get('id_despacho'), 'required' => false)),
      'id_chofer'      => new sfValidatorInteger(),
      'id_vehiculo'    => new sfValidatorInteger(),
      'fecha_estimada' => new sfValidatorDateTime(),
      'estado'         => new sfValidatorInteger(),
      'comentario'     => new sfValidatorString(array('max_length' => 500, 'required' => false)),
      'fecha_creacion' => new sfValidatorDateTime(),
      'bultos'         => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('despacho[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Despacho';
  }

}
