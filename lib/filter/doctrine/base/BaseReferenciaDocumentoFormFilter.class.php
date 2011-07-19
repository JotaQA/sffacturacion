<?php

/**
 * ReferenciaDocumento filter form base class.
 *
 * @package    sffacturacion
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseReferenciaDocumentoFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_factura'              => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Factura'), 'add_empty' => true)),
      'id_guia'                 => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Guia'), 'add_empty' => true)),
      'id_boleta'               => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Boleta'), 'add_empty' => true)),
      'id_nota_credito'         => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('NotaCredito'), 'add_empty' => true)),
      'id_nota_debito'          => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('NotaDebito'), 'add_empty' => true)),
      'documento_final'         => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'id_factura'              => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Factura'), 'column' => 'id_factura')),
      'id_guia'                 => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Guia'), 'column' => 'id_guia')),
      'id_boleta'               => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Boleta'), 'column' => 'id_boleta')),
      'id_nota_credito'         => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('NotaCredito'), 'column' => 'id_nota_credito')),
      'id_nota_debito'          => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('NotaDebito'), 'column' => 'id_nota_debito')),
      'documento_final'         => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('referencia_documento_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ReferenciaDocumento';
  }

  public function getFields()
  {
    return array(
      'id_referencia_documento' => 'Number',
      'id_factura'              => 'ForeignKey',
      'id_guia'                 => 'ForeignKey',
      'id_boleta'               => 'ForeignKey',
      'id_nota_credito'         => 'ForeignKey',
      'id_nota_debito'          => 'ForeignKey',
      'documento_final'         => 'Number',
    );
  }
}
