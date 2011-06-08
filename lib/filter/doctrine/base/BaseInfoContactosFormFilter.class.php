<?php

/**
 * InfoContactos filter form base class.
 *
 * @package    sffacturacion
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseInfoContactosFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'nombre_completo'  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'apellido'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'rut'              => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'correo'           => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'celular'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'fono_casa'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'fecha_nacimiento' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'id_vendedor'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'nombre_completo'  => new sfValidatorPass(array('required' => false)),
      'apellido'         => new sfValidatorPass(array('required' => false)),
      'rut'              => new sfValidatorPass(array('required' => false)),
      'correo'           => new sfValidatorPass(array('required' => false)),
      'celular'          => new sfValidatorPass(array('required' => false)),
      'fono_casa'        => new sfValidatorPass(array('required' => false)),
      'fecha_nacimiento' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'id_vendedor'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('info_contactos_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'InfoContactos';
  }

  public function getFields()
  {
    return array(
      'id_persona'       => 'Number',
      'nombre_completo'  => 'Text',
      'apellido'         => 'Text',
      'rut'              => 'Text',
      'correo'           => 'Text',
      'celular'          => 'Text',
      'fono_casa'        => 'Text',
      'fecha_nacimiento' => 'Date',
      'id_vendedor'      => 'Number',
    );
  }
}
