<?php

/**
 * NotaCredito form base class.
 *
 * @method NotaCredito getObject() Returns the current form's model object
 *
 * @package    sffacturacion
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseNotaCreditoForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_nota_credito'            => new sfWidgetFormInputHidden(),
      'id_estado_nota_credito'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('EstadoNotaCredito'), 'add_empty' => true)),
      'numero_nota_credito'        => new sfWidgetFormInputText(),
      'numerofactura_nota_credito' => new sfWidgetFormInputText(),
      'fechaingreso_nota_credito'  => new sfWidgetFormDateTime(),
      'fechaemision_nota_credito'  => new sfWidgetFormDateTime(),
      'neto_nota_credito'          => new sfWidgetFormInputText(),
      'total_nota_credito'         => new sfWidgetFormInputText(),
      'id_notapedido_nota_credito' => new sfWidgetFormInputText(),
      'rut_nota_credito'           => new sfWidgetFormInputText(),
      'telefono_nota_credito'      => new sfWidgetFormInputText(),
      'nombre_nota_credito'        => new sfWidgetFormInputText(),
      'direccion_nota_credito'     => new sfWidgetFormTextarea(),
      'comuna_nota_credito'        => new sfWidgetFormTextarea(),
      'ciudad_nota_credito'        => new sfWidgetFormTextarea(),
      'giro_nota_credito'          => new sfWidgetFormTextarea(),
      'oc_nota_credito'            => new sfWidgetFormTextarea(),
      'condicionpago_nota_credito' => new sfWidgetFormTextarea(),
      'responsable_nota_credito'   => new sfWidgetFormTextarea(),
      'comentarior_nota_credito'   => new sfWidgetFormTextarea(),
      'tipo_nota_credito'          => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id_nota_credito'            => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_nota_credito')), 'empty_value' => $this->getObject()->get('id_nota_credito'), 'required' => false)),
      'id_estado_nota_credito'     => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('EstadoNotaCredito'), 'required' => false)),
      'numero_nota_credito'        => new sfValidatorInteger(),
      'numerofactura_nota_credito' => new sfValidatorString(array('max_length' => 128, 'required' => false)),
      'fechaingreso_nota_credito'  => new sfValidatorDateTime(array('required' => false)),
      'fechaemision_nota_credito'  => new sfValidatorDateTime(array('required' => false)),
      'neto_nota_credito'          => new sfValidatorInteger(array('required' => false)),
      'total_nota_credito'         => new sfValidatorInteger(array('required' => false)),
      'id_notapedido_nota_credito' => new sfValidatorInteger(array('required' => false)),
      'rut_nota_credito'           => new sfValidatorString(array('max_length' => 15, 'required' => false)),
      'telefono_nota_credito'      => new sfValidatorString(array('max_length' => 32, 'required' => false)),
      'nombre_nota_credito'        => new sfValidatorString(array('max_length' => 200, 'required' => false)),
      'direccion_nota_credito'     => new sfValidatorString(array('max_length' => 512, 'required' => false)),
      'comuna_nota_credito'        => new sfValidatorString(array('max_length' => 512, 'required' => false)),
      'ciudad_nota_credito'        => new sfValidatorString(array('max_length' => 512, 'required' => false)),
      'giro_nota_credito'          => new sfValidatorString(array('max_length' => 512, 'required' => false)),
      'oc_nota_credito'            => new sfValidatorString(array('max_length' => 512, 'required' => false)),
      'condicionpago_nota_credito' => new sfValidatorString(array('max_length' => 512, 'required' => false)),
      'responsable_nota_credito'   => new sfValidatorString(array('max_length' => 512, 'required' => false)),
      'comentarior_nota_credito'   => new sfValidatorString(array('max_length' => 512, 'required' => false)),
      'tipo_nota_credito'          => new sfValidatorString(array('max_length' => 64, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('nota_credito[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'NotaCredito';
  }

}
