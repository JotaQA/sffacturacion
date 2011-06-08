<?php

/**
 * Nivel filter form base class.
 *
 * @package    sffacturacion
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseNivelFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'nombre_nivel' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'numero_nivel' => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'nombre_nivel' => new sfValidatorPass(array('required' => false)),
      'numero_nivel' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('nivel_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Nivel';
  }

  public function getFields()
  {
    return array(
      'id_nivel'     => 'Number',
      'nombre_nivel' => 'Text',
      'numero_nivel' => 'Number',
    );
  }
}
