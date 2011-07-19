<?php

/**
 * ReferenciaDocumento form base class.
 *
 * @method ReferenciaDocumento getObject() Returns the current form's model object
 *
 * @package    sffacturacion
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseReferenciaDocumentoForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_referencia_documento' => new sfWidgetFormInputHidden(),
      'id_factura'              => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Factura'), 'add_empty' => true)),
      'id_guia'                 => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Guia'), 'add_empty' => true)),
      'id_boleta'               => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Boleta'), 'add_empty' => true)),
      'id_nota_credito'         => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('NotaCredito'), 'add_empty' => true)),
      'id_nota_debito'          => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('NotaDebito'), 'add_empty' => true)),
      'documento_final'         => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id_referencia_documento' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_referencia_documento')), 'empty_value' => $this->getObject()->get('id_referencia_documento'), 'required' => false)),
      'id_factura'              => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Factura'), 'required' => false)),
      'id_guia'                 => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Guia'), 'required' => false)),
      'id_boleta'               => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Boleta'), 'required' => false)),
      'id_nota_credito'         => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('NotaCredito'), 'required' => false)),
      'id_nota_debito'          => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('NotaDebito'), 'required' => false)),
      'documento_final'         => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('referencia_documento[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ReferenciaDocumento';
  }

}
