<?php

/**
 * CotizacionesPiezas form base class.
 *
 * @method CotizacionesPiezas getObject() Returns the current form's model object
 *
 * @package    sffacturacion
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseCotizacionesPiezasForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                       => new sfWidgetFormInputHidden(),
      'id_cotizaciones_producto' => new sfWidgetFormInputText(),
      'id_pieza'                 => new sfWidgetFormInputText(),
      'cantidad'                 => new sfWidgetFormInputText(),
      'es_extra'                 => new sfWidgetFormInputText(),
      'precio_pieza'             => new sfWidgetFormInputText(),
      'nota_pieza'               => new sfWidgetFormTextarea(),
    ));

    $this->setValidators(array(
      'id'                       => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'id_cotizaciones_producto' => new sfValidatorInteger(),
      'id_pieza'                 => new sfValidatorString(array('max_length' => 30)),
      'cantidad'                 => new sfValidatorInteger(),
      'es_extra'                 => new sfValidatorInteger(),
      'precio_pieza'             => new sfValidatorInteger(),
      'nota_pieza'               => new sfValidatorString(array('max_length' => 500)),
    ));

    $this->widgetSchema->setNameFormat('cotizaciones_piezas[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'CotizacionesPiezas';
  }

}
