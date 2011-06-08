<?php

/**
 * ParametroFactura form base class.
 *
 * @method ParametroFactura getObject() Returns the current form's model object
 *
 * @package    sffacturacion
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseParametroFacturaForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'        => new sfWidgetFormInputHidden(),
      'campo'     => new sfWidgetFormTextarea(),
      'x'         => new sfWidgetFormInputText(),
      'y'         => new sfWidgetFormInputText(),
      'tam_letra' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'        => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'campo'     => new sfValidatorString(),
      'x'         => new sfValidatorInteger(),
      'y'         => new sfValidatorInteger(),
      'tam_letra' => new sfValidatorInteger(),
    ));

    $this->widgetSchema->setNameFormat('parametro_factura[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ParametroFactura';
  }

}
