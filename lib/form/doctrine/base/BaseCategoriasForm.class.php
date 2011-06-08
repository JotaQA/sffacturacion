<?php

/**
 * Categorias form base class.
 *
 * @method Categorias getObject() Returns the current form's model object
 *
 * @package    sffacturacion
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseCategoriasForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_categoria'          => new sfWidgetFormInputHidden(),
      'descripcion_categoria' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id_categoria'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_categoria')), 'empty_value' => $this->getObject()->get('id_categoria'), 'required' => false)),
      'descripcion_categoria' => new sfValidatorString(array('max_length' => 100)),
    ));

    $this->widgetSchema->setNameFormat('categorias[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Categorias';
  }

}
