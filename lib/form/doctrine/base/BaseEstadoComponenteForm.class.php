<?php

/**
 * EstadoComponente form base class.
 *
 * @method EstadoComponente getObject() Returns the current form's model object
 *
 * @package    sffacturacion
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseEstadoComponenteForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_estado'          => new sfWidgetFormInputHidden(),
      'nombre_estado'      => new sfWidgetFormTextarea(),
      'descripcion_estado' => new sfWidgetFormTextarea(),
    ));

    $this->setValidators(array(
      'id_estado'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_estado')), 'empty_value' => $this->getObject()->get('id_estado'), 'required' => false)),
      'nombre_estado'      => new sfValidatorString(array('max_length' => 2000)),
      'descripcion_estado' => new sfValidatorString(array('max_length' => 2000)),
    ));

    $this->widgetSchema->setNameFormat('estado_componente[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'EstadoComponente';
  }

}
