<?php

/**
 * CompuestoSimple form base class.
 *
 * @method CompuestoSimple getObject() Returns the current form's model object
 *
 * @package    sffacturacion
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseCompuestoSimpleForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_compuesto_simple' => new sfWidgetFormInputHidden(),
      'id_compuesto'        => new sfWidgetFormTextarea(),
      'id_simple'           => new sfWidgetFormTextarea(),
      'cantidad'            => new sfWidgetFormInputText(),
      'fecha_compuesto'     => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id_compuesto_simple' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_compuesto_simple')), 'empty_value' => $this->getObject()->get('id_compuesto_simple'), 'required' => false)),
      'id_compuesto'        => new sfValidatorString(array('max_length' => 500)),
      'id_simple'           => new sfValidatorString(array('max_length' => 500)),
      'cantidad'            => new sfValidatorInteger(),
      'fecha_compuesto'     => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('compuesto_simple[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'CompuestoSimple';
  }

}
