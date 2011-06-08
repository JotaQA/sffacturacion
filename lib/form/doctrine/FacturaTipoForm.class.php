<?php

/**
 * Factura form.
 *
 * @package    sffacturacion
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class FacturaTipoForm extends BaseFacturaForm
{
  public function configure()
  {
      $this->useFields(array('tipo_factura'));
      $this->validatorSchema['tipo_factura'] = new sfValidatorAnd(array(
            $this->validatorSchema['tipo_factura'],
            new sfValidatorChoice(array(
              'choices' => array_keys(Doctrine_Core::getTable('Factura')->getTipos()),
            )),
      ));
      $this->widgetSchema['tipo_factura'] = new sfWidgetFormChoice(array(
          'choices'  => Doctrine_Core::getTable('Factura')->getTipos(),
          'expanded' => true,
      ));
  }
}
