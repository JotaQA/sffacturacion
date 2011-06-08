<?php

/**
 * Log form base class.
 *
 * @method Log getObject() Returns the current form's model object
 *
 * @package    sffacturacion
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseLogForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_usuario'    => new sfWidgetFormInputHidden(),
      'id_salida'     => new sfWidgetFormInputHidden(),
      'fecha'         => new sfWidgetFormInputHidden(),
      'campo_mod'     => new sfWidgetFormInputText(),
      'valor_antiguo' => new sfWidgetFormTextarea(),
      'valor_nuevo'   => new sfWidgetFormTextarea(),
    ));

    $this->setValidators(array(
      'id_usuario'    => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_usuario')), 'empty_value' => $this->getObject()->get('id_usuario'), 'required' => false)),
      'id_salida'     => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_salida')), 'empty_value' => $this->getObject()->get('id_salida'), 'required' => false)),
      'fecha'         => new sfValidatorChoice(array('choices' => array($this->getObject()->get('fecha')), 'empty_value' => $this->getObject()->get('fecha'), 'required' => false)),
      'campo_mod'     => new sfValidatorString(array('max_length' => 100)),
      'valor_antiguo' => new sfValidatorString(array('max_length' => 500)),
      'valor_nuevo'   => new sfValidatorString(array('max_length' => 500)),
    ));

    $this->widgetSchema->setNameFormat('log[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Log';
  }

}
