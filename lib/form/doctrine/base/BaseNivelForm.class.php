<?php

/**
 * Nivel form base class.
 *
 * @method Nivel getObject() Returns the current form's model object
 *
 * @package    sffacturacion
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseNivelForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_nivel'     => new sfWidgetFormInputHidden(),
      'nombre_nivel' => new sfWidgetFormInputText(),
      'numero_nivel' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id_nivel'     => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_nivel')), 'empty_value' => $this->getObject()->get('id_nivel'), 'required' => false)),
      'nombre_nivel' => new sfValidatorString(array('max_length' => 50)),
      'numero_nivel' => new sfValidatorInteger(),
    ));

    $this->widgetSchema->setNameFormat('nivel[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Nivel';
  }

}
