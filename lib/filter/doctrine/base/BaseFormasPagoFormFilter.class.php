<?php

/**
 * FormasPago filter form base class.
 *
 * @package    sffacturacion
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseFormasPagoFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'descripcion_pago' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'vencimiento'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'descripcion_pago' => new sfValidatorPass(array('required' => false)),
      'vencimiento'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('formas_pago_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'FormasPago';
  }

  public function getFields()
  {
    return array(
      'id_pago'          => 'Number',
      'descripcion_pago' => 'Text',
      'vencimiento'      => 'Number',
    );
  }
}
