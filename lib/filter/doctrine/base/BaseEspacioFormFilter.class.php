<?php

/**
 * Espacio filter form base class.
 *
 * @package    sffacturacion
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseEspacioFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_pasillo'          => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Pasillo'), 'add_empty' => true)),
      'codigo_espacio'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'descripcion_espacio' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'id_pasillo'          => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Pasillo'), 'column' => 'id_pasillo')),
      'codigo_espacio'      => new sfValidatorPass(array('required' => false)),
      'descripcion_espacio' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('espacio_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Espacio';
  }

  public function getFields()
  {
    return array(
      'id_espacio'          => 'Number',
      'id_pasillo'          => 'ForeignKey',
      'codigo_espacio'      => 'Text',
      'descripcion_espacio' => 'Text',
    );
  }
}
