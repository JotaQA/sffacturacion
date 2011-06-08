<?php

/**
 * Costos form base class.
 *
 * @method Costos getObject() Returns the current form's model object
 *
 * @package    sffacturacion
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseCostosForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_costo'          => new sfWidgetFormInputHidden(),
      'id_prod_costo'     => new sfWidgetFormInputText(),
      'descripcion_costo' => new sfWidgetFormInputText(),
      'cost_imp'          => new sfWidgetFormInputText(),
      'cost_nac'          => new sfWidgetFormInputText(),
      'codigo_madre'      => new sfWidgetFormTextarea(),
    ));

    $this->setValidators(array(
      'id_costo'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_costo')), 'empty_value' => $this->getObject()->get('id_costo'), 'required' => false)),
      'id_prod_costo'     => new sfValidatorString(array('max_length' => 15)),
      'descripcion_costo' => new sfValidatorString(array('max_length' => 100)),
      'cost_imp'          => new sfValidatorNumber(array('required' => false)),
      'cost_nac'          => new sfValidatorNumber(array('required' => false)),
      'codigo_madre'      => new sfValidatorString(array('max_length' => 2000)),
    ));

    $this->widgetSchema->setNameFormat('costos[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Costos';
  }

}
