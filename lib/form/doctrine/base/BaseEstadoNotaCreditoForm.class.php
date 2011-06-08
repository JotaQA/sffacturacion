<?php

/**
 * EstadoNotaCredito form base class.
 *
 * @method EstadoNotaCredito getObject() Returns the current form's model object
 *
 * @package    sffacturacion
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseEstadoNotaCreditoForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_estado_nota_credito'          => new sfWidgetFormInputHidden(),
      'nombre_estado_nota_credito'      => new sfWidgetFormInputText(),
      'descripcion_estado_nota_credito' => new sfWidgetFormTextarea(),
    ));

    $this->setValidators(array(
      'id_estado_nota_credito'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_estado_nota_credito')), 'empty_value' => $this->getObject()->get('id_estado_nota_credito'), 'required' => false)),
      'nombre_estado_nota_credito'      => new sfValidatorString(array('max_length' => 200, 'required' => false)),
      'descripcion_estado_nota_credito' => new sfValidatorString(array('max_length' => 512, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('estado_nota_credito[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'EstadoNotaCredito';
  }

}
