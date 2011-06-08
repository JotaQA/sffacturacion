<?php

/**
 * Proveedor filter form base class.
 *
 * @package    sffacturacion
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseProveedorFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'nombre_proveedor' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'giro_proveedor'   => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'nombre_proveedor' => new sfValidatorPass(array('required' => false)),
      'giro_proveedor'   => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('proveedor_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Proveedor';
  }

  public function getFields()
  {
    return array(
      'id_proveedor'     => 'Number',
      'nombre_proveedor' => 'Text',
      'giro_proveedor'   => 'Text',
    );
  }
}
