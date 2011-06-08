<?php

/**
 * Division filter form base class.
 *
 * @package    sffacturacion
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseDivisionFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'nombre_division'      => new sfWidgetFormFilterInput(),
      'descripcion_division' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'nombre_division'      => new sfValidatorPass(array('required' => false)),
      'descripcion_division' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('division_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Division';
  }

  public function getFields()
  {
    return array(
      'id_division'          => 'Number',
      'nombre_division'      => 'Text',
      'descripcion_division' => 'Text',
    );
  }
}
