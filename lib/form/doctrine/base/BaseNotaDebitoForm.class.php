<?php

/**
 * NotaDebito form base class.
 *
 * @method NotaDebito getObject() Returns the current form's model object
 *
 * @package    sffacturacion
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseNotaDebitoForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_nota_debito'                   => new sfWidgetFormInputHidden(),
      'id_estado_nota_debito'            => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('EstadoNotaDebito'), 'add_empty' => true)),
      'codref_nota_debito'               => new sfWidgetFormInputText(),
      'numero_nota_debito'               => new sfWidgetFormInputText(),
      'numero_refdocumento_nota_credito' => new sfWidgetFormInputText(),
      'fechaingreso_nota_debito'         => new sfWidgetFormDateTime(),
      'fechaemision_nota_debito'         => new sfWidgetFormDateTime(),
      'neto_nota_debito'                 => new sfWidgetFormInputText(),
      'total_nota_debito'                => new sfWidgetFormInputText(),
      'id_notapedido_nota_debito'        => new sfWidgetFormInputText(),
      'rut_nota_debito'                  => new sfWidgetFormInputText(),
      'telefono_nota_debito'             => new sfWidgetFormInputText(),
      'nombre_nota_debito'               => new sfWidgetFormInputText(),
      'direccion_nota_debito'            => new sfWidgetFormTextarea(),
      'comuna_nota_debito'               => new sfWidgetFormTextarea(),
      'ciudad_nota_debito'               => new sfWidgetFormTextarea(),
      'giro_nota_debito'                 => new sfWidgetFormTextarea(),
      'oc_nota_debito'                   => new sfWidgetFormTextarea(),
      'condicionpago_nota_debito'        => new sfWidgetFormTextarea(),
      'responsable_nota_debito'          => new sfWidgetFormTextarea(),
      'comentarior_nota_debito'          => new sfWidgetFormTextarea(),
      'tipo_nota_debito'                 => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id_nota_debito'                   => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_nota_debito')), 'empty_value' => $this->getObject()->get('id_nota_debito'), 'required' => false)),
      'id_estado_nota_debito'            => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('EstadoNotaDebito'), 'required' => false)),
      'codref_nota_debito'               => new sfValidatorInteger(),
      'numero_nota_debito'               => new sfValidatorInteger(),
      'numero_refdocumento_nota_credito' => new sfValidatorString(array('max_length' => 128, 'required' => false)),
      'fechaingreso_nota_debito'         => new sfValidatorDateTime(array('required' => false)),
      'fechaemision_nota_debito'         => new sfValidatorDateTime(array('required' => false)),
      'neto_nota_debito'                 => new sfValidatorInteger(array('required' => false)),
      'total_nota_debito'                => new sfValidatorInteger(array('required' => false)),
      'id_notapedido_nota_debito'        => new sfValidatorInteger(array('required' => false)),
      'rut_nota_debito'                  => new sfValidatorString(array('max_length' => 15, 'required' => false)),
      'telefono_nota_debito'             => new sfValidatorString(array('max_length' => 32, 'required' => false)),
      'nombre_nota_debito'               => new sfValidatorString(array('max_length' => 200, 'required' => false)),
      'direccion_nota_debito'            => new sfValidatorString(array('max_length' => 512, 'required' => false)),
      'comuna_nota_debito'               => new sfValidatorString(array('max_length' => 512, 'required' => false)),
      'ciudad_nota_debito'               => new sfValidatorString(array('max_length' => 512, 'required' => false)),
      'giro_nota_debito'                 => new sfValidatorString(array('max_length' => 512, 'required' => false)),
      'oc_nota_debito'                   => new sfValidatorString(array('max_length' => 512, 'required' => false)),
      'condicionpago_nota_debito'        => new sfValidatorString(array('max_length' => 512, 'required' => false)),
      'responsable_nota_debito'          => new sfValidatorString(array('max_length' => 512, 'required' => false)),
      'comentarior_nota_debito'          => new sfValidatorString(array('max_length' => 512, 'required' => false)),
      'tipo_nota_debito'                 => new sfValidatorString(array('max_length' => 64, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('nota_debito[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'NotaDebito';
  }

}
