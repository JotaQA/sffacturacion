<?php

/**
 * Sucursal filter form base class.
 *
 * @package    sffacturacion
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseSucursalFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_cliente'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'direccion_sucur' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'comuna_sucur'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'ciudad_sucur'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'region_sucur'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'casa_matriz'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'telefono1_sucur' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'telefono2_sucur' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'fax_sucur'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'contacto_sucur'  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'correo_sucursal' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'fecha_sucur'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'id_cliente'      => new sfValidatorPass(array('required' => false)),
      'direccion_sucur' => new sfValidatorPass(array('required' => false)),
      'comuna_sucur'    => new sfValidatorPass(array('required' => false)),
      'ciudad_sucur'    => new sfValidatorPass(array('required' => false)),
      'region_sucur'    => new sfValidatorPass(array('required' => false)),
      'casa_matriz'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'telefono1_sucur' => new sfValidatorPass(array('required' => false)),
      'telefono2_sucur' => new sfValidatorPass(array('required' => false)),
      'fax_sucur'       => new sfValidatorPass(array('required' => false)),
      'contacto_sucur'  => new sfValidatorPass(array('required' => false)),
      'correo_sucursal' => new sfValidatorPass(array('required' => false)),
      'fecha_sucur'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('sucursal_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Sucursal';
  }

  public function getFields()
  {
    return array(
      'id_sucursal'     => 'Number',
      'id_cliente'      => 'Text',
      'direccion_sucur' => 'Text',
      'comuna_sucur'    => 'Text',
      'ciudad_sucur'    => 'Text',
      'region_sucur'    => 'Text',
      'casa_matriz'     => 'Number',
      'telefono1_sucur' => 'Text',
      'telefono2_sucur' => 'Text',
      'fax_sucur'       => 'Text',
      'contacto_sucur'  => 'Text',
      'correo_sucursal' => 'Text',
      'fecha_sucur'     => 'Date',
    );
  }
}
