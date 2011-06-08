<?php

/**
 * Guia filter form base class.
 *
 * @package    sffacturacion
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseGuiaFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_estadoguia'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('EstadoGuia'), 'add_empty' => true)),
      'id_factura'         => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Factura'), 'add_empty' => true)),
      'numero_guia'        => new sfWidgetFormFilterInput(),
      'id_notapedido_guia' => new sfWidgetFormFilterInput(),
      'fechaingreso_guia'  => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'fechaemision_guia'  => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'rut_guia'           => new sfWidgetFormFilterInput(),
      'telefono_guia'      => new sfWidgetFormFilterInput(),
      'nombre_guia'        => new sfWidgetFormFilterInput(),
      'direccion_guia'     => new sfWidgetFormFilterInput(),
      'comuna_guia'        => new sfWidgetFormFilterInput(),
      'ciudad_guia'        => new sfWidgetFormFilterInput(),
      'giro_guia'          => new sfWidgetFormFilterInput(),
      'oc_guia'            => new sfWidgetFormFilterInput(),
      'condicionpago_guia' => new sfWidgetFormFilterInput(),
      'comentario_guia'    => new sfWidgetFormFilterInput(),
      'responsable_guia'   => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'id_estadoguia'      => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('EstadoGuia'), 'column' => 'id_estadoguia')),
      'id_factura'         => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Factura'), 'column' => 'id_factura')),
      'numero_guia'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'id_notapedido_guia' => new sfValidatorPass(array('required' => false)),
      'fechaingreso_guia'  => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'fechaemision_guia'  => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'rut_guia'           => new sfValidatorPass(array('required' => false)),
      'telefono_guia'      => new sfValidatorPass(array('required' => false)),
      'nombre_guia'        => new sfValidatorPass(array('required' => false)),
      'direccion_guia'     => new sfValidatorPass(array('required' => false)),
      'comuna_guia'        => new sfValidatorPass(array('required' => false)),
      'ciudad_guia'        => new sfValidatorPass(array('required' => false)),
      'giro_guia'          => new sfValidatorPass(array('required' => false)),
      'oc_guia'            => new sfValidatorPass(array('required' => false)),
      'condicionpago_guia' => new sfValidatorPass(array('required' => false)),
      'comentario_guia'    => new sfValidatorPass(array('required' => false)),
      'responsable_guia'   => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('guia_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Guia';
  }

  public function getFields()
  {
    return array(
      'id_guia'            => 'Number',
      'id_estadoguia'      => 'ForeignKey',
      'id_factura'         => 'ForeignKey',
      'numero_guia'        => 'Number',
      'id_notapedido_guia' => 'Text',
      'fechaingreso_guia'  => 'Date',
      'fechaemision_guia'  => 'Date',
      'rut_guia'           => 'Text',
      'telefono_guia'      => 'Text',
      'nombre_guia'        => 'Text',
      'direccion_guia'     => 'Text',
      'comuna_guia'        => 'Text',
      'ciudad_guia'        => 'Text',
      'giro_guia'          => 'Text',
      'oc_guia'            => 'Text',
      'condicionpago_guia' => 'Text',
      'comentario_guia'    => 'Text',
      'responsable_guia'   => 'Text',
    );
  }
}
