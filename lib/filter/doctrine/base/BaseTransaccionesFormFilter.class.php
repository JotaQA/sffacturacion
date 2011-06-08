<?php

/**
 * Transacciones filter form base class.
 *
 * @package    sffacturacion
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseTransaccionesFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_prod'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'cantidad'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'accion'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'fecha'          => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'id_prod'        => new sfValidatorPass(array('required' => false)),
      'cantidad'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'accion'         => new sfValidatorPass(array('required' => false)),
      'fecha'          => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('transacciones_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Transacciones';
  }

  public function getFields()
  {
    return array(
      'id_transaccion' => 'Number',
      'id_prod'        => 'Text',
      'cantidad'       => 'Number',
      'accion'         => 'Text',
      'fecha'          => 'Date',
    );
  }
}
