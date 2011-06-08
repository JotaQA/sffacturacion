<?php

/**
 * ClienteHistorial form base class.
 *
 * @method ClienteHistorial getObject() Returns the current form's model object
 *
 * @package    sffacturacion
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseClienteHistorialForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_cliente_historial' => new sfWidgetFormInputHidden(),
      'rut'                  => new sfWidgetFormInputText(),
      'usuario'              => new sfWidgetFormInputText(),
      'dato'                 => new sfWidgetFormTextarea(),
      'fecha_modificacion'   => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id_cliente_historial' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_cliente_historial')), 'empty_value' => $this->getObject()->get('id_cliente_historial'), 'required' => false)),
      'rut'                  => new sfValidatorString(array('max_length' => 11)),
      'usuario'              => new sfValidatorString(array('max_length' => 50)),
      'dato'                 => new sfValidatorString(array('max_length' => 5000)),
      'fecha_modificacion'   => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('cliente_historial[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ClienteHistorial';
  }

}
