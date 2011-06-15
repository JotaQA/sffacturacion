<?php

/**
 * Boleta filter form base class.
 *
 * @package    sffacturacion
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseBoletaFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'numero_boleta'        => new sfWidgetFormFilterInput(),
      'fechaemision_boleta'  => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'monto_boleta'         => new sfWidgetFormFilterInput(),
      'id_notapedido_boleta' => new sfWidgetFormFilterInput(),
      'id_estadoboleta'      => new sfWidgetFormFilterInput(),
      'rut_boleta'           => new sfWidgetFormFilterInput(),
      'telefono_boleta'      => new sfWidgetFormFilterInput(),
      'nombre_boleta'        => new sfWidgetFormFilterInput(),
      'direccion_boleta'     => new sfWidgetFormFilterInput(),
      'comuna_boleta'        => new sfWidgetFormFilterInput(),
      'ciudad_boleta'        => new sfWidgetFormFilterInput(),
      'giro_boleta'          => new sfWidgetFormFilterInput(),
      'oc_boleta'            => new sfWidgetFormFilterInput(),
      'condicionpago_boleta' => new sfWidgetFormFilterInput(),
      'comentario_boleta'    => new sfWidgetFormFilterInput(),
      'responsable_boleta'   => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'numero_boleta'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'fechaemision_boleta'  => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'monto_boleta'         => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'id_notapedido_boleta' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'id_estadoboleta'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'rut_boleta'           => new sfValidatorPass(array('required' => false)),
      'telefono_boleta'      => new sfValidatorPass(array('required' => false)),
      'nombre_boleta'        => new sfValidatorPass(array('required' => false)),
      'direccion_boleta'     => new sfValidatorPass(array('required' => false)),
      'comuna_boleta'        => new sfValidatorPass(array('required' => false)),
      'ciudad_boleta'        => new sfValidatorPass(array('required' => false)),
      'giro_boleta'          => new sfValidatorPass(array('required' => false)),
      'oc_boleta'            => new sfValidatorPass(array('required' => false)),
      'condicionpago_boleta' => new sfValidatorPass(array('required' => false)),
      'comentario_boleta'    => new sfValidatorPass(array('required' => false)),
      'responsable_boleta'   => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('boleta_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Boleta';
  }

  public function getFields()
  {
    return array(
      'id_boleta'            => 'Number',
      'numero_boleta'        => 'Number',
      'fechaemision_boleta'  => 'Date',
      'monto_boleta'         => 'Number',
      'id_notapedido_boleta' => 'Number',
      'id_estadoboleta'      => 'Number',
      'rut_boleta'           => 'Text',
      'telefono_boleta'      => 'Text',
      'nombre_boleta'        => 'Text',
      'direccion_boleta'     => 'Text',
      'comuna_boleta'        => 'Text',
      'ciudad_boleta'        => 'Text',
      'giro_boleta'          => 'Text',
      'oc_boleta'            => 'Text',
      'condicionpago_boleta' => 'Text',
      'comentario_boleta'    => 'Text',
      'responsable_boleta'   => 'Text',
    );
  }
}
