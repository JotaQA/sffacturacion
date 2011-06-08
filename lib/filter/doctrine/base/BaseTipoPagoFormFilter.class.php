<?php

/**
 * TipoPago filter form base class.
 *
 * @package    sffacturacion
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseTipoPagoFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'nombre_tipo_pago'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'descripcion_tipo_pago' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'nombre_tipo_pago'      => new sfValidatorPass(array('required' => false)),
      'descripcion_tipo_pago' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('tipo_pago_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'TipoPago';
  }

  public function getFields()
  {
    return array(
      'id_tipo_pago'          => 'Number',
      'nombre_tipo_pago'      => 'Text',
      'descripcion_tipo_pago' => 'Text',
    );
  }
}
