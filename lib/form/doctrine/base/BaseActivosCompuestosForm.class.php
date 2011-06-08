<?php

/**
 * ActivosCompuestos form base class.
 *
 * @method ActivosCompuestos getObject() Returns the current form's model object
 *
 * @package    sffacturacion
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseActivosCompuestosForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'codigoemp'   => new sfWidgetFormInputHidden(),
      'descripcion' => new sfWidgetFormTextarea(),
      'comentario'  => new sfWidgetFormTextarea(),
      'fecha'       => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'codigoemp'   => new sfValidatorChoice(array('choices' => array($this->getObject()->get('codigoemp')), 'empty_value' => $this->getObject()->get('codigoemp'), 'required' => false)),
      'descripcion' => new sfValidatorString(array('max_length' => 500)),
      'comentario'  => new sfValidatorString(array('max_length' => 500)),
      'fecha'       => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('activos_compuestos[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ActivosCompuestos';
  }

}
