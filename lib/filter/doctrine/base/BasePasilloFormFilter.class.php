<?php

/**
 * Pasillo filter form base class.
 *
 * @package    sffacturacion
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BasePasilloFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_nivel'            => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Nivel'), 'add_empty' => true)),
      'codigo_pasillo'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'descripcion_pasillo' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'id_nivel'            => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Nivel'), 'column' => 'id_nivel')),
      'codigo_pasillo'      => new sfValidatorPass(array('required' => false)),
      'descripcion_pasillo' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('pasillo_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Pasillo';
  }

  public function getFields()
  {
    return array(
      'id_pasillo'          => 'Number',
      'id_nivel'            => 'ForeignKey',
      'codigo_pasillo'      => 'Text',
      'descripcion_pasillo' => 'Text',
    );
  }
}
