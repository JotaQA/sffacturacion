<?php

/**
 * ActivosSimples filter form base class.
 *
 * @package    sffacturacion
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseActivosSimplesFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'descripcion'              => new sfWidgetFormFilterInput(),
      'comentario'               => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'compuesto'                => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'fecha_simple'             => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'url_foto'                 => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'detalle'                  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'estado_activo'            => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'comentario_act_eli'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'peso_unitario'            => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'unidades_por_caja_master' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'ancho'                    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'largo'                    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'alto'                     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'en_promocion'             => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'descripcion'              => new sfValidatorPass(array('required' => false)),
      'comentario'               => new sfValidatorPass(array('required' => false)),
      'compuesto'                => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'fecha_simple'             => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'url_foto'                 => new sfValidatorPass(array('required' => false)),
      'detalle'                  => new sfValidatorPass(array('required' => false)),
      'estado_activo'            => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'comentario_act_eli'       => new sfValidatorPass(array('required' => false)),
      'peso_unitario'            => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'unidades_por_caja_master' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'ancho'                    => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'largo'                    => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'alto'                     => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'en_promocion'             => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('activos_simples_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ActivosSimples';
  }

  public function getFields()
  {
    return array(
      'codigoemp'                => 'Text',
      'descripcion'              => 'Text',
      'comentario'               => 'Text',
      'compuesto'                => 'Number',
      'fecha_simple'             => 'Date',
      'url_foto'                 => 'Text',
      'detalle'                  => 'Text',
      'estado_activo'            => 'Number',
      'comentario_act_eli'       => 'Text',
      'peso_unitario'            => 'Number',
      'unidades_por_caja_master' => 'Number',
      'ancho'                    => 'Number',
      'largo'                    => 'Number',
      'alto'                     => 'Number',
      'en_promocion'             => 'Number',
    );
  }
}
