<?php

/**
 * Empresa form base class.
 *
 * @method Empresa getObject() Returns the current form's model object
 *
 * @package    sffacturacion
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseEmpresaForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_empresa'          => new sfWidgetFormInputHidden(),
      'nombre_empresa'      => new sfWidgetFormInputText(),
      'rut_empresa'         => new sfWidgetFormInputText(),
      'razon_social'        => new sfWidgetFormTextarea(),
      'rubro'               => new sfWidgetFormTextarea(),
      'descripcion_empresa' => new sfWidgetFormTextarea(),
      'direccion'           => new sfWidgetFormInputText(),
      'comuna'              => new sfWidgetFormInputText(),
      'ciudad'              => new sfWidgetFormInputText(),
      'telefono'            => new sfWidgetFormInputText(),
      'website'             => new sfWidgetFormInputText(),
      'logo'                => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id_empresa'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_empresa')), 'empty_value' => $this->getObject()->get('id_empresa'), 'required' => false)),
      'nombre_empresa'      => new sfValidatorString(array('max_length' => 100)),
      'rut_empresa'         => new sfValidatorString(array('max_length' => 13)),
      'razon_social'        => new sfValidatorString(array('max_length' => 300)),
      'rubro'               => new sfValidatorString(array('max_length' => 300)),
      'descripcion_empresa' => new sfValidatorString(array('max_length' => 500)),
      'direccion'           => new sfValidatorString(array('max_length' => 100)),
      'comuna'              => new sfValidatorString(array('max_length' => 30)),
      'ciudad'              => new sfValidatorString(array('max_length' => 30)),
      'telefono'            => new sfValidatorString(array('max_length' => 30)),
      'website'             => new sfValidatorString(array('max_length' => 30)),
      'logo'                => new sfValidatorString(array('max_length' => 30)),
    ));

    $this->widgetSchema->setNameFormat('empresa[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Empresa';
  }

}
