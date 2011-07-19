<?php

/**
 * ReferenciaDetalle form base class.
 *
 * @method ReferenciaDetalle getObject() Returns the current form's model object
 *
 * @package    sffacturacion
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseReferenciaDetalleForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_detalle_activo1' => new sfWidgetFormInputHidden(),
      'id_detalle_activo2' => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'id_detalle_activo1' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_detalle_activo1')), 'empty_value' => $this->getObject()->get('id_detalle_activo1'), 'required' => false)),
      'id_detalle_activo2' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_detalle_activo2')), 'empty_value' => $this->getObject()->get('id_detalle_activo2'), 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('referencia_detalle[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ReferenciaDetalle';
  }

}
