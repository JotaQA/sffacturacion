<?php

/**
 * EstadoBoleta form base class.
 *
 * @method EstadoBoleta getObject() Returns the current form's model object
 *
 * @package    sffacturacion
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseEstadoBoletaForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_estadoboleta'          => new sfWidgetFormInputHidden(),
      'nombre_estadoboleta'      => new sfWidgetFormInputText(),
      'descripcion_estadoboleta' => new sfWidgetFormTextarea(),
    ));

    $this->setValidators(array(
      'id_estadoboleta'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_estadoboleta')), 'empty_value' => $this->getObject()->get('id_estadoboleta'), 'required' => false)),
      'nombre_estadoboleta'      => new sfValidatorString(array('max_length' => 200, 'required' => false)),
      'descripcion_estadoboleta' => new sfValidatorString(array('max_length' => 512, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('estado_boleta[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'EstadoBoleta';
  }

}
