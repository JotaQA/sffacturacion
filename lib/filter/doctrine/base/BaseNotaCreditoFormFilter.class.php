<?php

/**
 * NotaCredito filter form base class.
 *
 * @package    sffacturacion
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseNotaCreditoFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_estado_nota_credito'           => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('EstadoNotaCredito'), 'add_empty' => true)),
      'codref_nota_credito'              => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'numero_nota_credito'              => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'numero_refdocumento_nota_credito' => new sfWidgetFormFilterInput(),
      'fechaingreso_nota_credito'        => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'fechaemision_nota_credito'        => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'neto_nota_credito'                => new sfWidgetFormFilterInput(),
      'total_nota_credito'               => new sfWidgetFormFilterInput(),
      'descuento_nota_credito'           => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'id_notapedido_nota_credito'       => new sfWidgetFormFilterInput(),
      'razon_nota_credito'               => new sfWidgetFormFilterInput(),
      'glosa_nota_credito'               => new sfWidgetFormFilterInput(),
      'rut_nota_credito'                 => new sfWidgetFormFilterInput(),
      'telefono_nota_credito'            => new sfWidgetFormFilterInput(),
      'nombre_nota_credito'              => new sfWidgetFormFilterInput(),
      'direccion_nota_credito'           => new sfWidgetFormFilterInput(),
      'comuna_nota_credito'              => new sfWidgetFormFilterInput(),
      'ciudad_nota_credito'              => new sfWidgetFormFilterInput(),
      'giro_nota_credito'                => new sfWidgetFormFilterInput(),
      'oc_nota_credito'                  => new sfWidgetFormFilterInput(),
      'condicionpago_nota_credito'       => new sfWidgetFormFilterInput(),
      'responsable_nota_credito'         => new sfWidgetFormFilterInput(),
      'comentarior_nota_credito'         => new sfWidgetFormFilterInput(),
      'tipo_nota_credito'                => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'id_estado_nota_credito'           => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('EstadoNotaCredito'), 'column' => 'id_estado_nota_credito')),
      'codref_nota_credito'              => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'numero_nota_credito'              => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'numero_refdocumento_nota_credito' => new sfValidatorPass(array('required' => false)),
      'fechaingreso_nota_credito'        => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'fechaemision_nota_credito'        => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'neto_nota_credito'                => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'total_nota_credito'               => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'descuento_nota_credito'           => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'id_notapedido_nota_credito'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'razon_nota_credito'               => new sfValidatorPass(array('required' => false)),
      'glosa_nota_credito'               => new sfValidatorPass(array('required' => false)),
      'rut_nota_credito'                 => new sfValidatorPass(array('required' => false)),
      'telefono_nota_credito'            => new sfValidatorPass(array('required' => false)),
      'nombre_nota_credito'              => new sfValidatorPass(array('required' => false)),
      'direccion_nota_credito'           => new sfValidatorPass(array('required' => false)),
      'comuna_nota_credito'              => new sfValidatorPass(array('required' => false)),
      'ciudad_nota_credito'              => new sfValidatorPass(array('required' => false)),
      'giro_nota_credito'                => new sfValidatorPass(array('required' => false)),
      'oc_nota_credito'                  => new sfValidatorPass(array('required' => false)),
      'condicionpago_nota_credito'       => new sfValidatorPass(array('required' => false)),
      'responsable_nota_credito'         => new sfValidatorPass(array('required' => false)),
      'comentarior_nota_credito'         => new sfValidatorPass(array('required' => false)),
      'tipo_nota_credito'                => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('nota_credito_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'NotaCredito';
  }

  public function getFields()
  {
    return array(
      'id_nota_credito'                  => 'Number',
      'id_estado_nota_credito'           => 'ForeignKey',
      'codref_nota_credito'              => 'Number',
      'numero_nota_credito'              => 'Number',
      'numero_refdocumento_nota_credito' => 'Text',
      'fechaingreso_nota_credito'        => 'Date',
      'fechaemision_nota_credito'        => 'Date',
      'neto_nota_credito'                => 'Number',
      'total_nota_credito'               => 'Number',
      'descuento_nota_credito'           => 'Number',
      'id_notapedido_nota_credito'       => 'Number',
      'razon_nota_credito'               => 'Text',
      'glosa_nota_credito'               => 'Text',
      'rut_nota_credito'                 => 'Text',
      'telefono_nota_credito'            => 'Text',
      'nombre_nota_credito'              => 'Text',
      'direccion_nota_credito'           => 'Text',
      'comuna_nota_credito'              => 'Text',
      'ciudad_nota_credito'              => 'Text',
      'giro_nota_credito'                => 'Text',
      'oc_nota_credito'                  => 'Text',
      'condicionpago_nota_credito'       => 'Text',
      'responsable_nota_credito'         => 'Text',
      'comentarior_nota_credito'         => 'Text',
      'tipo_nota_credito'                => 'Text',
    );
  }
}
