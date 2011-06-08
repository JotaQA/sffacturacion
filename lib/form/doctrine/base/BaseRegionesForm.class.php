<?php

/**
 * Regiones form base class.
 *
 * @method Regiones getObject() Returns the current form's model object
 *
 * @package    sffacturacion
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseRegionesForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_regiones' => new sfWidgetFormInputHidden(),
      'descripcion' => new sfWidgetFormInputText(),
      'relacion'    => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id_regiones' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_regiones')), 'empty_value' => $this->getObject()->get('id_regiones'), 'required' => false)),
      'descripcion' => new sfValidatorString(array('max_length' => 255)),
      'relacion'    => new sfValidatorString(array('max_length' => 11)),
    ));

    $this->widgetSchema->setNameFormat('regiones[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Regiones';
  }

}
