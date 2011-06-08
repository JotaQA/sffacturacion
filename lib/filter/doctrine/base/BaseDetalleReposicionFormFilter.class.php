<?php

/**
 * DetalleReposicion filter form base class.
 *
 * @package    sffacturacion
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseDetalleReposicionFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_ordenreposicion'               => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('OrdenReposicion'), 'add_empty' => true)),
      'cantidad_detalle_reposicion'      => new sfWidgetFormFilterInput(),
      'fecha_detalle_reposicion'         => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'activa_detalle_reposicion'        => new sfWidgetFormFilterInput(),
      'fecha_detalle_detalle_reposicion' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'costo_detalle_reposicion'         => new sfWidgetFormFilterInput(),
      'codigo_detalle_reposicion'        => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'id_ordenreposicion'               => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('OrdenReposicion'), 'column' => 'id_ordenreposicion')),
      'cantidad_detalle_reposicion'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'fecha_detalle_reposicion'         => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'activa_detalle_reposicion'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'fecha_detalle_detalle_reposicion' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'costo_detalle_reposicion'         => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'codigo_detalle_reposicion'        => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('detalle_reposicion_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'DetalleReposicion';
  }

  public function getFields()
  {
    return array(
      'id_detalle_reposicion'            => 'Number',
      'id_ordenreposicion'               => 'ForeignKey',
      'cantidad_detalle_reposicion'      => 'Number',
      'fecha_detalle_reposicion'         => 'Date',
      'activa_detalle_reposicion'        => 'Number',
      'fecha_detalle_detalle_reposicion' => 'Date',
      'costo_detalle_reposicion'         => 'Number',
      'codigo_detalle_reposicion'        => 'Text',
    );
  }
}
