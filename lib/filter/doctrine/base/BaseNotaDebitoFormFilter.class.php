<?php

/**
 * NotaDebito filter form base class.
 *
 * @package    sffacturacion
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseNotaDebitoFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_estado_nota_debito'            => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('EstadoNotaDebito'), 'add_empty' => true)),
      'codref_nota_debito'               => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'numero_nota_debito'               => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'numero_refdocumento_nota_credito' => new sfWidgetFormFilterInput(),
      'fechaingreso_nota_debito'         => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'fechaemision_nota_debito'         => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'neto_nota_debito'                 => new sfWidgetFormFilterInput(),
      'total_nota_debito'                => new sfWidgetFormFilterInput(),
      'descuento_nota_debito'            => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'id_notapedido_nota_debito'        => new sfWidgetFormFilterInput(),
      'rut_nota_debito'                  => new sfWidgetFormFilterInput(),
      'telefono_nota_debito'             => new sfWidgetFormFilterInput(),
      'nombre_nota_debito'               => new sfWidgetFormFilterInput(),
      'direccion_nota_debito'            => new sfWidgetFormFilterInput(),
      'comuna_nota_debito'               => new sfWidgetFormFilterInput(),
      'ciudad_nota_debito'               => new sfWidgetFormFilterInput(),
      'giro_nota_debito'                 => new sfWidgetFormFilterInput(),
      'oc_nota_debito'                   => new sfWidgetFormFilterInput(),
      'condicionpago_nota_debito'        => new sfWidgetFormFilterInput(),
      'responsable_nota_debito'          => new sfWidgetFormFilterInput(),
      'comentarior_nota_debito'          => new sfWidgetFormFilterInput(),
      'tipo_nota_debito'                 => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'id_estado_nota_debito'            => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('EstadoNotaDebito'), 'column' => 'id_estado_nota_debito')),
      'codref_nota_debito'               => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'numero_nota_debito'               => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'numero_refdocumento_nota_credito' => new sfValidatorPass(array('required' => false)),
      'fechaingreso_nota_debito'         => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'fechaemision_nota_debito'         => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'neto_nota_debito'                 => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'total_nota_debito'                => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'descuento_nota_debito'            => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'id_notapedido_nota_debito'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'rut_nota_debito'                  => new sfValidatorPass(array('required' => false)),
      'telefono_nota_debito'             => new sfValidatorPass(array('required' => false)),
      'nombre_nota_debito'               => new sfValidatorPass(array('required' => false)),
      'direccion_nota_debito'            => new sfValidatorPass(array('required' => false)),
      'comuna_nota_debito'               => new sfValidatorPass(array('required' => false)),
      'ciudad_nota_debito'               => new sfValidatorPass(array('required' => false)),
      'giro_nota_debito'                 => new sfValidatorPass(array('required' => false)),
      'oc_nota_debito'                   => new sfValidatorPass(array('required' => false)),
      'condicionpago_nota_debito'        => new sfValidatorPass(array('required' => false)),
      'responsable_nota_debito'          => new sfValidatorPass(array('required' => false)),
      'comentarior_nota_debito'          => new sfValidatorPass(array('required' => false)),
      'tipo_nota_debito'                 => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('nota_debito_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'NotaDebito';
  }

  public function getFields()
  {
    return array(
      'id_nota_debito'                   => 'Number',
      'id_estado_nota_debito'            => 'ForeignKey',
      'codref_nota_debito'               => 'Number',
      'numero_nota_debito'               => 'Number',
      'numero_refdocumento_nota_credito' => 'Text',
      'fechaingreso_nota_debito'         => 'Date',
      'fechaemision_nota_debito'         => 'Date',
      'neto_nota_debito'                 => 'Number',
      'total_nota_debito'                => 'Number',
      'descuento_nota_debito'            => 'Number',
      'id_notapedido_nota_debito'        => 'Number',
      'rut_nota_debito'                  => 'Text',
      'telefono_nota_debito'             => 'Text',
      'nombre_nota_debito'               => 'Text',
      'direccion_nota_debito'            => 'Text',
      'comuna_nota_debito'               => 'Text',
      'ciudad_nota_debito'               => 'Text',
      'giro_nota_debito'                 => 'Text',
      'oc_nota_debito'                   => 'Text',
      'condicionpago_nota_debito'        => 'Text',
      'responsable_nota_debito'          => 'Text',
      'comentarior_nota_debito'          => 'Text',
      'tipo_nota_debito'                 => 'Text',
    );
  }
}
