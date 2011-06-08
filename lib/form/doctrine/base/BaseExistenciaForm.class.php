<?php

/**
 * Existencia form base class.
 *
 * @method Existencia getObject() Returns the current form's model object
 *
 * @package    sffacturacion
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseExistenciaForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_existencia'         => new sfWidgetFormInputHidden(),
      'id_espacio'            => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Espacio'), 'add_empty' => false)),
      'codigo_existencia'     => new sfWidgetFormInputText(),
      'cantidad_existencia'   => new sfWidgetFormInputText(),
      'comentario_existencia' => new sfWidgetFormInputText(),
      'fecha_existencia'      => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id_existencia'         => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_existencia')), 'empty_value' => $this->getObject()->get('id_existencia'), 'required' => false)),
      'id_espacio'            => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Espacio'))),
      'codigo_existencia'     => new sfValidatorString(array('max_length' => 15)),
      'cantidad_existencia'   => new sfValidatorInteger(),
      'comentario_existencia' => new sfValidatorString(array('max_length' => 200, 'required' => false)),
      'fecha_existencia'      => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('existencia[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Existencia';
  }

}
