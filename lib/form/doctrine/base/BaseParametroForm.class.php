<?php

/**
 * Parametro form base class.
 *
 * @method Parametro getObject() Returns the current form's model object
 *
 * @package    sffacturacion
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseParametroForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_parametro'          => new sfWidgetFormInputHidden(),
      'valor_parametro'       => new sfWidgetFormInputText(),
      'nombre_parametro'      => new sfWidgetFormTextarea(),
      'descripcion_parametro' => new sfWidgetFormTextarea(),
    ));

    $this->setValidators(array(
      'id_parametro'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_parametro')), 'empty_value' => $this->getObject()->get('id_parametro'), 'required' => false)),
      'valor_parametro'       => new sfValidatorNumber(),
      'nombre_parametro'      => new sfValidatorString(array('max_length' => 1000)),
      'descripcion_parametro' => new sfValidatorString(array('max_length' => 2000)),
    ));

    $this->widgetSchema->setNameFormat('parametro[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Parametro';
  }

}
