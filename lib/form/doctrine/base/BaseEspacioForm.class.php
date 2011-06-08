<?php

/**
 * Espacio form base class.
 *
 * @method Espacio getObject() Returns the current form's model object
 *
 * @package    sffacturacion
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseEspacioForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_espacio'          => new sfWidgetFormInputHidden(),
      'id_pasillo'          => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Pasillo'), 'add_empty' => false)),
      'codigo_espacio'      => new sfWidgetFormInputText(),
      'descripcion_espacio' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id_espacio'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_espacio')), 'empty_value' => $this->getObject()->get('id_espacio'), 'required' => false)),
      'id_pasillo'          => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Pasillo'))),
      'codigo_espacio'      => new sfValidatorString(array('max_length' => 15)),
      'descripcion_espacio' => new sfValidatorString(array('max_length' => 50, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('espacio[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Espacio';
  }

}
