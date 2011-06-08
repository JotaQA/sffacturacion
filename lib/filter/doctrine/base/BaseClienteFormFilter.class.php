<?php

/**
 * Cliente filter form base class.
 *
 * @package    sffacturacion
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseClienteFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'rut_cliente'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'nombre_cliente'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'descripcion_cliente' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'giro'                => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'tipo_pago'           => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'c_pago'              => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'tipo'                => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'id_division'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'id_vendedor'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'estado_cliente'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'comentario_cli_eli'  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'fecha_cliente'       => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'credito_cliente'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'id_empresa'          => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'rut_cliente'         => new sfValidatorPass(array('required' => false)),
      'nombre_cliente'      => new sfValidatorPass(array('required' => false)),
      'descripcion_cliente' => new sfValidatorPass(array('required' => false)),
      'giro'                => new sfValidatorPass(array('required' => false)),
      'tipo_pago'           => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'c_pago'              => new sfValidatorPass(array('required' => false)),
      'tipo'                => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'id_division'         => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'id_vendedor'         => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'estado_cliente'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'comentario_cli_eli'  => new sfValidatorPass(array('required' => false)),
      'fecha_cliente'       => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'credito_cliente'     => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'id_empresa'          => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('cliente_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Cliente';
  }

  public function getFields()
  {
    return array(
      'id_cliente'          => 'Number',
      'rut_cliente'         => 'Text',
      'nombre_cliente'      => 'Text',
      'descripcion_cliente' => 'Text',
      'giro'                => 'Text',
      'tipo_pago'           => 'Number',
      'c_pago'              => 'Text',
      'tipo'                => 'Number',
      'id_division'         => 'Number',
      'id_vendedor'         => 'Number',
      'estado_cliente'      => 'Number',
      'comentario_cli_eli'  => 'Text',
      'fecha_cliente'       => 'Date',
      'credito_cliente'     => 'Number',
      'id_empresa'          => 'Number',
    );
  }
}
