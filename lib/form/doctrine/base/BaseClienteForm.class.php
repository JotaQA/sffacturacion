<?php

/**
 * Cliente form base class.
 *
 * @method Cliente getObject() Returns the current form's model object
 *
 * @package    sffacturacion
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseClienteForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_cliente'          => new sfWidgetFormInputHidden(),
      'rut_cliente'         => new sfWidgetFormInputText(),
      'nombre_cliente'      => new sfWidgetFormInputText(),
      'descripcion_cliente' => new sfWidgetFormTextarea(),
      'giro'                => new sfWidgetFormTextarea(),
      'tipo_pago'           => new sfWidgetFormInputText(),
      'c_pago'              => new sfWidgetFormInputText(),
      'tipo'                => new sfWidgetFormInputText(),
      'id_division'         => new sfWidgetFormInputText(),
      'id_vendedor'         => new sfWidgetFormInputText(),
      'estado_cliente'      => new sfWidgetFormInputText(),
      'comentario_cli_eli'  => new sfWidgetFormTextarea(),
      'fecha_cliente'       => new sfWidgetFormDateTime(),
      'credito_cliente'     => new sfWidgetFormInputText(),
      'id_empresa'          => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id_cliente'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_cliente')), 'empty_value' => $this->getObject()->get('id_cliente'), 'required' => false)),
      'rut_cliente'         => new sfValidatorString(array('max_length' => 50)),
      'nombre_cliente'      => new sfValidatorString(array('max_length' => 100)),
      'descripcion_cliente' => new sfValidatorString(array('max_length' => 500)),
      'giro'                => new sfValidatorString(array('max_length' => 5000)),
      'tipo_pago'           => new sfValidatorInteger(),
      'c_pago'              => new sfValidatorString(array('max_length' => 255)),
      'tipo'                => new sfValidatorInteger(),
      'id_division'         => new sfValidatorInteger(),
      'id_vendedor'         => new sfValidatorInteger(),
      'estado_cliente'      => new sfValidatorInteger(),
      'comentario_cli_eli'  => new sfValidatorString(array('max_length' => 5000)),
      'fecha_cliente'       => new sfValidatorDateTime(),
      'credito_cliente'     => new sfValidatorNumber(array('required' => false)),
      'id_empresa'          => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('cliente[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Cliente';
  }

}
