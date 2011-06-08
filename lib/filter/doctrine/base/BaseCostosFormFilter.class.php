<?php

/**
 * Costos filter form base class.
 *
 * @package    sffacturacion
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseCostosFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_prod_costo'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'descripcion_costo' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'cost_imp'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'cost_nac'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'codigo_madre'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'id_prod_costo'     => new sfValidatorPass(array('required' => false)),
      'descripcion_costo' => new sfValidatorPass(array('required' => false)),
      'cost_imp'          => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'cost_nac'          => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'codigo_madre'      => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('costos_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Costos';
  }

  public function getFields()
  {
    return array(
      'id_costo'          => 'Number',
      'id_prod_costo'     => 'Text',
      'descripcion_costo' => 'Text',
      'cost_imp'          => 'Number',
      'cost_nac'          => 'Number',
      'codigo_madre'      => 'Text',
    );
  }
}
