<?php

/**
 * Empresa filter form base class.
 *
 * @package    sffacturacion
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseEmpresaFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'nombre_empresa'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'rut_empresa'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'razon_social'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'rubro'               => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'descripcion_empresa' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'direccion'           => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'comuna'              => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'ciudad'              => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'telefono'            => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'website'             => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'logo'                => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'nombre_empresa'      => new sfValidatorPass(array('required' => false)),
      'rut_empresa'         => new sfValidatorPass(array('required' => false)),
      'razon_social'        => new sfValidatorPass(array('required' => false)),
      'rubro'               => new sfValidatorPass(array('required' => false)),
      'descripcion_empresa' => new sfValidatorPass(array('required' => false)),
      'direccion'           => new sfValidatorPass(array('required' => false)),
      'comuna'              => new sfValidatorPass(array('required' => false)),
      'ciudad'              => new sfValidatorPass(array('required' => false)),
      'telefono'            => new sfValidatorPass(array('required' => false)),
      'website'             => new sfValidatorPass(array('required' => false)),
      'logo'                => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('empresa_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Empresa';
  }

  public function getFields()
  {
    return array(
      'id_empresa'          => 'Number',
      'nombre_empresa'      => 'Text',
      'rut_empresa'         => 'Text',
      'razon_social'        => 'Text',
      'rubro'               => 'Text',
      'descripcion_empresa' => 'Text',
      'direccion'           => 'Text',
      'comuna'              => 'Text',
      'ciudad'              => 'Text',
      'telefono'            => 'Text',
      'website'             => 'Text',
      'logo'                => 'Text',
    );
  }
}
