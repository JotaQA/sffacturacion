<?php

/**
 * DetalleReposicion form base class.
 *
 * @method DetalleReposicion getObject() Returns the current form's model object
 *
 * @package    sffacturacion
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseDetalleReposicionForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_detalle_reposicion'            => new sfWidgetFormInputHidden(),
      'id_ordenreposicion'               => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('OrdenReposicion'), 'add_empty' => false)),
      'cantidad_detalle_reposicion'      => new sfWidgetFormInputText(),
      'fecha_detalle_reposicion'         => new sfWidgetFormDateTime(),
      'activa_detalle_reposicion'        => new sfWidgetFormInputText(),
      'fecha_detalle_detalle_reposicion' => new sfWidgetFormDateTime(),
      'costo_detalle_reposicion'         => new sfWidgetFormInputText(),
      'codigo_detalle_reposicion'        => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id_detalle_reposicion'            => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_detalle_reposicion')), 'empty_value' => $this->getObject()->get('id_detalle_reposicion'), 'required' => false)),
      'id_ordenreposicion'               => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('OrdenReposicion'))),
      'cantidad_detalle_reposicion'      => new sfValidatorInteger(array('required' => false)),
      'fecha_detalle_reposicion'         => new sfValidatorDateTime(array('required' => false)),
      'activa_detalle_reposicion'        => new sfValidatorInteger(array('required' => false)),
      'fecha_detalle_detalle_reposicion' => new sfValidatorDateTime(),
      'costo_detalle_reposicion'         => new sfValidatorNumber(array('required' => false)),
      'codigo_detalle_reposicion'        => new sfValidatorString(array('max_length' => 32, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('detalle_reposicion[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'DetalleReposicion';
  }

}
