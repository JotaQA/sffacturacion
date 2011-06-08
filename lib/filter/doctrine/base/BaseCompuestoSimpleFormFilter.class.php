<?php

/**
 * CompuestoSimple filter form base class.
 *
 * @package    sffacturacion
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseCompuestoSimpleFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_compuesto'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'id_simple'           => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'cantidad'            => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'fecha_compuesto'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'id_compuesto'        => new sfValidatorPass(array('required' => false)),
      'id_simple'           => new sfValidatorPass(array('required' => false)),
      'cantidad'            => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'fecha_compuesto'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('compuesto_simple_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'CompuestoSimple';
  }

  public function getFields()
  {
    return array(
      'id_compuesto_simple' => 'Number',
      'id_compuesto'        => 'Text',
      'id_simple'           => 'Text',
      'cantidad'            => 'Number',
      'fecha_compuesto'     => 'Date',
    );
  }
}
