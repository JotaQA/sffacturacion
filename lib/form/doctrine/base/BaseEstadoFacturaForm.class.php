<?php

/**
 * EstadoFactura form base class.
 *
 * @method EstadoFactura getObject() Returns the current form's model object
 *
 * @package    sffacturacion
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseEstadoFacturaForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_estadofactura'          => new sfWidgetFormInputHidden(),
      'nombre_estadofactura'      => new sfWidgetFormInputText(),
      'descripcion_estadofactura' => new sfWidgetFormTextarea(),
    ));

    $this->setValidators(array(
      'id_estadofactura'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_estadofactura')), 'empty_value' => $this->getObject()->get('id_estadofactura'), 'required' => false)),
      'nombre_estadofactura'      => new sfValidatorString(array('max_length' => 200, 'required' => false)),
      'descripcion_estadofactura' => new sfValidatorString(array('max_length' => 512, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('estado_factura[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'EstadoFactura';
  }

}
