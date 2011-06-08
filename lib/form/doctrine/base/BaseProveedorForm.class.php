<?php

/**
 * Proveedor form base class.
 *
 * @method Proveedor getObject() Returns the current form's model object
 *
 * @package    sffacturacion
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseProveedorForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_proveedor'     => new sfWidgetFormInputHidden(),
      'nombre_proveedor' => new sfWidgetFormInputText(),
      'giro_proveedor'   => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id_proveedor'     => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_proveedor')), 'empty_value' => $this->getObject()->get('id_proveedor'), 'required' => false)),
      'nombre_proveedor' => new sfValidatorString(array('max_length' => 100)),
      'giro_proveedor'   => new sfValidatorString(array('max_length' => 200, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('proveedor[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Proveedor';
  }

}
