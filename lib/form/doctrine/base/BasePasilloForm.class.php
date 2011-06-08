<?php

/**
 * Pasillo form base class.
 *
 * @method Pasillo getObject() Returns the current form's model object
 *
 * @package    sffacturacion
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BasePasilloForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_pasillo'          => new sfWidgetFormInputHidden(),
      'id_nivel'            => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Nivel'), 'add_empty' => false)),
      'codigo_pasillo'      => new sfWidgetFormInputText(),
      'descripcion_pasillo' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id_pasillo'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_pasillo')), 'empty_value' => $this->getObject()->get('id_pasillo'), 'required' => false)),
      'id_nivel'            => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Nivel'))),
      'codigo_pasillo'      => new sfValidatorString(array('max_length' => 15)),
      'descripcion_pasillo' => new sfValidatorString(array('max_length' => 50, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('pasillo[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Pasillo';
  }

}
