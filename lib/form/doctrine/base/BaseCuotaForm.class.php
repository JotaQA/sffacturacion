<?php

/**
 * Cuota form base class.
 *
 * @method Cuota getObject() Returns the current form's model object
 *
 * @package    sffacturacion
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseCuotaForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_cuota'               => new sfWidgetFormInputHidden(),
      'id_factura'             => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Factura'), 'add_empty' => true)),
      'id_estado_cuota'        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('EstadoCuota'), 'add_empty' => false)),
      'monto_cuota'            => new sfWidgetFormInputText(),
      'montopagado_cuota'      => new sfWidgetFormInputText(),
      'fechavencimiento_cuota' => new sfWidgetFormDateTime(),
      'accion_cuota'           => new sfWidgetFormInputText(),
      'comentario_cuota'       => new sfWidgetFormTextarea(),
    ));

    $this->setValidators(array(
      'id_cuota'               => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_cuota')), 'empty_value' => $this->getObject()->get('id_cuota'), 'required' => false)),
      'id_factura'             => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Factura'), 'required' => false)),
      'id_estado_cuota'        => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('EstadoCuota'))),
      'monto_cuota'            => new sfValidatorInteger(),
      'montopagado_cuota'      => new sfValidatorInteger(array('required' => false)),
      'fechavencimiento_cuota' => new sfValidatorDateTime(array('required' => false)),
      'accion_cuota'           => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'comentario_cuota'       => new sfValidatorString(array('max_length' => 300, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('cuota[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Cuota';
  }

}
