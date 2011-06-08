<?php

/**
 * EstadoCuota filter form base class.
 *
 * @package    sffacturacion
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseEstadoCuotaFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'nombre_estado_cuota'      => new sfWidgetFormFilterInput(),
      'descripcion_estado_cuota' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'nombre_estado_cuota'      => new sfValidatorPass(array('required' => false)),
      'descripcion_estado_cuota' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('estado_cuota_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'EstadoCuota';
  }

  public function getFields()
  {
    return array(
      'id_estado_cuota'          => 'Number',
      'nombre_estado_cuota'      => 'Text',
      'descripcion_estado_cuota' => 'Text',
    );
  }
}
