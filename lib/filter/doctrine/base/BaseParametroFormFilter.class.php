<?php

/**
 * Parametro filter form base class.
 *
 * @package    sffacturacion
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseParametroFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'valor_parametro'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'nombre_parametro'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'descripcion_parametro' => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'valor_parametro'       => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'nombre_parametro'      => new sfValidatorPass(array('required' => false)),
      'descripcion_parametro' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('parametro_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Parametro';
  }

  public function getFields()
  {
    return array(
      'id_parametro'          => 'Number',
      'valor_parametro'       => 'Number',
      'nombre_parametro'      => 'Text',
      'descripcion_parametro' => 'Text',
    );
  }
}
