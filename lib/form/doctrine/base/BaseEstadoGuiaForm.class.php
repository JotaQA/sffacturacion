<?php

/**
 * EstadoGuia form base class.
 *
 * @method EstadoGuia getObject() Returns the current form's model object
 *
 * @package    sffacturacion
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseEstadoGuiaForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_estadoguia'          => new sfWidgetFormInputHidden(),
      'nombre_estadoguia'      => new sfWidgetFormInputText(),
      'descripcion_estadoguia' => new sfWidgetFormTextarea(),
    ));

    $this->setValidators(array(
      'id_estadoguia'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_estadoguia')), 'empty_value' => $this->getObject()->get('id_estadoguia'), 'required' => false)),
      'nombre_estadoguia'      => new sfValidatorString(array('max_length' => 200, 'required' => false)),
      'descripcion_estadoguia' => new sfValidatorString(array('max_length' => 512, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('estado_guia[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'EstadoGuia';
  }

}
