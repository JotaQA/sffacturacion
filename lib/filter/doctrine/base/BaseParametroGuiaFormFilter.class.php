<?php

/**
 * ParametroGuia filter form base class.
 *
 * @package    sffacturacion
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseParametroGuiaFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'campo'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'x'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'y'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'tam_letra' => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'campo'     => new sfValidatorPass(array('required' => false)),
      'x'         => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'y'         => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'tam_letra' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('parametro_guia_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ParametroGuia';
  }

  public function getFields()
  {
    return array(
      'id'        => 'Number',
      'campo'     => 'Text',
      'x'         => 'Number',
      'y'         => 'Number',
      'tam_letra' => 'Number',
    );
  }
}
