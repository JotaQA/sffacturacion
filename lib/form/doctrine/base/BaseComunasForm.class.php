<?php

/**
 * Comunas form base class.
 *
 * @method Comunas getObject() Returns the current form's model object
 *
 * @package    sffacturacion
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseComunasForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_comunas'  => new sfWidgetFormInputHidden(),
      'descripcion' => new sfWidgetFormInputText(),
      'relacion'    => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id_comunas'  => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_comunas')), 'empty_value' => $this->getObject()->get('id_comunas'), 'required' => false)),
      'descripcion' => new sfValidatorString(array('max_length' => 255)),
      'relacion'    => new sfValidatorInteger(),
    ));

    $this->widgetSchema->setNameFormat('comunas[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Comunas';
  }

}
