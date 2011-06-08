<?php

/**
 * Transacciones form base class.
 *
 * @method Transacciones getObject() Returns the current form's model object
 *
 * @package    sffacturacion
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseTransaccionesForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_transaccion' => new sfWidgetFormInputHidden(),
      'id_prod'        => new sfWidgetFormInputText(),
      'cantidad'       => new sfWidgetFormInputText(),
      'accion'         => new sfWidgetFormTextarea(),
      'fecha'          => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id_transaccion' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_transaccion')), 'empty_value' => $this->getObject()->get('id_transaccion'), 'required' => false)),
      'id_prod'        => new sfValidatorString(array('max_length' => 50)),
      'cantidad'       => new sfValidatorInteger(),
      'accion'         => new sfValidatorString(array('max_length' => 500)),
      'fecha'          => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('transacciones[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Transacciones';
  }

}
