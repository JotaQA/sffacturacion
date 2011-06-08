<?php

/**
 * Divisiones form base class.
 *
 * @method Divisiones getObject() Returns the current form's model object
 *
 * @package    sffacturacion
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseDivisionesForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_division'          => new sfWidgetFormInputHidden(),
      'descripcion_division' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id_division'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_division')), 'empty_value' => $this->getObject()->get('id_division'), 'required' => false)),
      'descripcion_division' => new sfValidatorString(array('max_length' => 50)),
    ));

    $this->widgetSchema->setNameFormat('divisiones[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Divisiones';
  }

}
