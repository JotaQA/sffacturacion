<?php

/**
 * EstadoNotaCredito filter form base class.
 *
 * @package    sffacturacion
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseEstadoNotaCreditoFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'nombre_estado_nota_credito'      => new sfWidgetFormFilterInput(),
      'descripcion_estado_nota_credito' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'nombre_estado_nota_credito'      => new sfValidatorPass(array('required' => false)),
      'descripcion_estado_nota_credito' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('estado_nota_credito_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'EstadoNotaCredito';
  }

  public function getFields()
  {
    return array(
      'id_estado_nota_credito'          => 'Number',
      'nombre_estado_nota_credito'      => 'Text',
      'descripcion_estado_nota_credito' => 'Text',
    );
  }
}
