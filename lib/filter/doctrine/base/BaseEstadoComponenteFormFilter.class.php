<?php

/**
 * EstadoComponente filter form base class.
 *
 * @package    sffacturacion
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseEstadoComponenteFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'nombre_estado'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'descripcion_estado' => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'nombre_estado'      => new sfValidatorPass(array('required' => false)),
      'descripcion_estado' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('estado_componente_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'EstadoComponente';
  }

  public function getFields()
  {
    return array(
      'id_estado'          => 'Number',
      'nombre_estado'      => 'Text',
      'descripcion_estado' => 'Text',
    );
  }
}
