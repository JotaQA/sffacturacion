<?php

/**
 * EstadoCuota form base class.
 *
 * @method EstadoCuota getObject() Returns the current form's model object
 *
 * @package    sffacturacion
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseEstadoCuotaForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_estado_cuota'          => new sfWidgetFormInputHidden(),
      'nombre_estado_cuota'      => new sfWidgetFormInputText(),
      'descripcion_estado_cuota' => new sfWidgetFormTextarea(),
    ));

    $this->setValidators(array(
      'id_estado_cuota'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_estado_cuota')), 'empty_value' => $this->getObject()->get('id_estado_cuota'), 'required' => false)),
      'nombre_estado_cuota'      => new sfValidatorString(array('max_length' => 200, 'required' => false)),
      'descripcion_estado_cuota' => new sfValidatorString(array('max_length' => 300, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('estado_cuota[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'EstadoCuota';
  }

}
