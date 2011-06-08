<?php

/**
 * EstadoFactura filter form base class.
 *
 * @package    sffacturacion
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseEstadoFacturaFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'nombre_estadofactura'      => new sfWidgetFormFilterInput(),
      'descripcion_estadofactura' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'nombre_estadofactura'      => new sfValidatorPass(array('required' => false)),
      'descripcion_estadofactura' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('estado_factura_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'EstadoFactura';
  }

  public function getFields()
  {
    return array(
      'id_estadofactura'          => 'Number',
      'nombre_estadofactura'      => 'Text',
      'descripcion_estadofactura' => 'Text',
    );
  }
}
