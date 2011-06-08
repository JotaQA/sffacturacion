<?php

/**
 * ClienteHistorial filter form base class.
 *
 * @package    sffacturacion
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseClienteHistorialFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'rut'                  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'usuario'              => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'dato'                 => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'fecha_modificacion'   => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'rut'                  => new sfValidatorPass(array('required' => false)),
      'usuario'              => new sfValidatorPass(array('required' => false)),
      'dato'                 => new sfValidatorPass(array('required' => false)),
      'fecha_modificacion'   => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('cliente_historial_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ClienteHistorial';
  }

  public function getFields()
  {
    return array(
      'id_cliente_historial' => 'Number',
      'rut'                  => 'Text',
      'usuario'              => 'Text',
      'dato'                 => 'Text',
      'fecha_modificacion'   => 'Date',
    );
  }
}
