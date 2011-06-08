<?php

/**
 * EstadoGuia filter form base class.
 *
 * @package    sffacturacion
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseEstadoGuiaFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'nombre_estadoguia'      => new sfWidgetFormFilterInput(),
      'descripcion_estadoguia' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'nombre_estadoguia'      => new sfValidatorPass(array('required' => false)),
      'descripcion_estadoguia' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('estado_guia_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'EstadoGuia';
  }

  public function getFields()
  {
    return array(
      'id_estadoguia'          => 'Number',
      'nombre_estadoguia'      => 'Text',
      'descripcion_estadoguia' => 'Text',
    );
  }
}
