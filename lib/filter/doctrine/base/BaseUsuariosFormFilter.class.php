<?php

/**
 * Usuarios filter form base class.
 *
 * @package    sffacturacion
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseUsuariosFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'nombre_usuario' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'clave'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'vendedor'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'permisos'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'descripcion'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'telefono'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'movil'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'correo'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'fecha_usuario'  => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'comi_imp'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'comi_nac'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'cargo'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'funciones'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'depto'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'activo'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'nombre_usuario' => new sfValidatorPass(array('required' => false)),
      'clave'          => new sfValidatorPass(array('required' => false)),
      'vendedor'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'permisos'       => new sfValidatorPass(array('required' => false)),
      'descripcion'    => new sfValidatorPass(array('required' => false)),
      'telefono'       => new sfValidatorPass(array('required' => false)),
      'movil'          => new sfValidatorPass(array('required' => false)),
      'correo'         => new sfValidatorPass(array('required' => false)),
      'fecha_usuario'  => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'comi_imp'       => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'comi_nac'       => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'cargo'          => new sfValidatorPass(array('required' => false)),
      'funciones'      => new sfValidatorPass(array('required' => false)),
      'depto'          => new sfValidatorPass(array('required' => false)),
      'activo'         => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('usuarios_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Usuarios';
  }

  public function getFields()
  {
    return array(
      'id_usuario'     => 'Number',
      'nombre_usuario' => 'Text',
      'clave'          => 'Text',
      'vendedor'       => 'Number',
      'permisos'       => 'Text',
      'descripcion'    => 'Text',
      'telefono'       => 'Text',
      'movil'          => 'Text',
      'correo'         => 'Text',
      'fecha_usuario'  => 'Date',
      'comi_imp'       => 'Number',
      'comi_nac'       => 'Number',
      'cargo'          => 'Text',
      'funciones'      => 'Text',
      'depto'          => 'Text',
      'activo'         => 'Number',
    );
  }
}
