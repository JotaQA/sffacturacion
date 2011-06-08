<?php

/**
 * Sucursal form base class.
 *
 * @method Sucursal getObject() Returns the current form's model object
 *
 * @package    sffacturacion
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseSucursalForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_sucursal'     => new sfWidgetFormInputHidden(),
      'id_cliente'      => new sfWidgetFormInputText(),
      'direccion_sucur' => new sfWidgetFormInputText(),
      'comuna_sucur'    => new sfWidgetFormInputText(),
      'ciudad_sucur'    => new sfWidgetFormInputText(),
      'region_sucur'    => new sfWidgetFormInputText(),
      'casa_matriz'     => new sfWidgetFormInputText(),
      'telefono1_sucur' => new sfWidgetFormInputText(),
      'telefono2_sucur' => new sfWidgetFormInputText(),
      'fax_sucur'       => new sfWidgetFormInputText(),
      'contacto_sucur'  => new sfWidgetFormInputText(),
      'correo_sucursal' => new sfWidgetFormTextarea(),
      'fecha_sucur'     => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id_sucursal'     => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_sucursal')), 'empty_value' => $this->getObject()->get('id_sucursal'), 'required' => false)),
      'id_cliente'      => new sfValidatorString(array('max_length' => 50)),
      'direccion_sucur' => new sfValidatorString(array('max_length' => 255)),
      'comuna_sucur'    => new sfValidatorString(array('max_length' => 255)),
      'ciudad_sucur'    => new sfValidatorString(array('max_length' => 255)),
      'region_sucur'    => new sfValidatorString(array('max_length' => 255)),
      'casa_matriz'     => new sfValidatorInteger(),
      'telefono1_sucur' => new sfValidatorString(array('max_length' => 50)),
      'telefono2_sucur' => new sfValidatorString(array('max_length' => 50)),
      'fax_sucur'       => new sfValidatorString(array('max_length' => 255)),
      'contacto_sucur'  => new sfValidatorString(array('max_length' => 255)),
      'correo_sucursal' => new sfValidatorString(array('max_length' => 500)),
      'fecha_sucur'     => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('sucursal[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Sucursal';
  }

}
