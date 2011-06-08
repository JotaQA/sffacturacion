<?php

/**
 * Log filter form base class.
 *
 * @package    sffacturacion
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseLogFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'campo_mod'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'valor_antiguo' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'valor_nuevo'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'campo_mod'     => new sfValidatorPass(array('required' => false)),
      'valor_antiguo' => new sfValidatorPass(array('required' => false)),
      'valor_nuevo'   => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('log_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Log';
  }

  public function getFields()
  {
    return array(
      'id_usuario'    => 'Number',
      'id_salida'     => 'Number',
      'fecha'         => 'Date',
      'campo_mod'     => 'Text',
      'valor_antiguo' => 'Text',
      'valor_nuevo'   => 'Text',
    );
  }
}
