<?php

/**
 * ActivosSimples form base class.
 *
 * @method ActivosSimples getObject() Returns the current form's model object
 *
 * @package    sffacturacion
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseActivosSimplesForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'codigoemp'                => new sfWidgetFormInputHidden(),
      'descripcion'              => new sfWidgetFormTextarea(),
      'comentario'               => new sfWidgetFormTextarea(),
      'compuesto'                => new sfWidgetFormInputText(),
      'fecha_simple'             => new sfWidgetFormDateTime(),
      'url_foto'                 => new sfWidgetFormTextarea(),
      'detalle'                  => new sfWidgetFormTextarea(),
      'estado_activo'            => new sfWidgetFormInputText(),
      'comentario_act_eli'       => new sfWidgetFormTextarea(),
      'peso_unitario'            => new sfWidgetFormInputText(),
      'unidades_por_caja_master' => new sfWidgetFormInputText(),
      'ancho'                    => new sfWidgetFormInputText(),
      'largo'                    => new sfWidgetFormInputText(),
      'alto'                     => new sfWidgetFormInputText(),
      'en_promocion'             => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'codigoemp'                => new sfValidatorChoice(array('choices' => array($this->getObject()->get('codigoemp')), 'empty_value' => $this->getObject()->get('codigoemp'), 'required' => false)),
      'descripcion'              => new sfValidatorString(array('max_length' => 500, 'required' => false)),
      'comentario'               => new sfValidatorString(array('max_length' => 5000)),
      'compuesto'                => new sfValidatorInteger(),
      'fecha_simple'             => new sfValidatorDateTime(),
      'url_foto'                 => new sfValidatorString(array('max_length' => 1000)),
      'detalle'                  => new sfValidatorString(array('max_length' => 5000)),
      'estado_activo'            => new sfValidatorInteger(array('required' => false)),
      'comentario_act_eli'       => new sfValidatorString(),
      'peso_unitario'            => new sfValidatorNumber(),
      'unidades_por_caja_master' => new sfValidatorInteger(),
      'ancho'                    => new sfValidatorNumber(),
      'largo'                    => new sfValidatorNumber(),
      'alto'                     => new sfValidatorNumber(),
      'en_promocion'             => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('activos_simples[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ActivosSimples';
  }

}
