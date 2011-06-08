<?php

/**
 * Existencia filter form base class.
 *
 * @package    sffacturacion
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseExistenciaFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_espacio'            => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Espacio'), 'add_empty' => true)),
      'codigo_existencia'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'cantidad_existencia'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'comentario_existencia' => new sfWidgetFormFilterInput(),
      'fecha_existencia'      => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'id_espacio'            => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Espacio'), 'column' => 'id_espacio')),
      'codigo_existencia'     => new sfValidatorPass(array('required' => false)),
      'cantidad_existencia'   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'comentario_existencia' => new sfValidatorPass(array('required' => false)),
      'fecha_existencia'      => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('existencia_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Existencia';
  }

  public function getFields()
  {
    return array(
      'id_existencia'         => 'Number',
      'id_espacio'            => 'ForeignKey',
      'codigo_existencia'     => 'Text',
      'cantidad_existencia'   => 'Number',
      'comentario_existencia' => 'Text',
      'fecha_existencia'      => 'Date',
    );
  }
}
