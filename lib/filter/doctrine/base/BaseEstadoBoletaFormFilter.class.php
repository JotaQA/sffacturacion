<?php

/**
 * EstadoBoleta filter form base class.
 *
 * @package    sffacturacion
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseEstadoBoletaFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'nombre_estadoboleta'      => new sfWidgetFormFilterInput(),
      'descripcion_estadoboleta' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'nombre_estadoboleta'      => new sfValidatorPass(array('required' => false)),
      'descripcion_estadoboleta' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('estado_boleta_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'EstadoBoleta';
  }

  public function getFields()
  {
    return array(
      'id_estadoboleta'          => 'Number',
      'nombre_estadoboleta'      => 'Text',
      'descripcion_estadoboleta' => 'Text',
    );
  }
}
