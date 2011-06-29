<?php

/**
 * NotaCredito form.
 *
 * @package    sffacturacion
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class NotaCreditoForm extends BaseNotaCreditoForm
{
  public function configure()
  {
      unset(
      $this['fechaingreso_nota_credito']
              );
      $this->widgetSchema['comuna_nota_credito'] = new sfWidgetFormInputText();
      $this->widgetSchema['direccion_nota_credito'] = new sfWidgetFormInputText();
      $this->widgetSchema['ciudad_nota_credito'] = new sfWidgetFormInputText();
      $this->widgetSchema['giro_nota_credito'] = new sfWidgetFormInputText();
      $this->widgetSchema['condicionpago_nota_credito'] = new sfWidgetFormInputText();
      $this->widgetSchema['oc_nota_credito'] = new sfWidgetFormInputText();
      $this->widgetSchema['responsable_nota_credito'] = new sfWidgetFormChoice(array(
          'choices'  => Doctrine_Core::getTable('Usuarios')->getUsuariosParaChoice()
        ));
      $this->widgetSchema['neto_nota_credito'] = new sfWidgetFormInputText(array(), array(
          'readonly' => 'readonly'
      ));
      $this->widgetSchema['total_nota_credito'] = new sfWidgetFormInputText(array(), array(
          'readonly' => 'readonly'
      ));
      $this->widgetSchema['id_notapedido_nota_credito'] = new sfWidgetFormInputText(array(), array(
          'readonly' => 'readonly'
      ));
      $this->widgetSchema['fechaemision_nota_credito'] = new sfWidgetFormInputText();

      $this->widgetSchema->setLabels(array(
            'numero_nota_credito' => 'Numero NC',
            'rut_nota_credito' => 'RUT',
            'nombre_nota_credito' => 'Nombre',
            'telefono_nota_credito' => 'Telefono',
            'direccion_nota_credito' => 'Dirección',
            'comuna_nota_credito' => 'Comuna',
            'ciudad_nota_credito' => 'Ciudad',
            'giro_nota_credito' => 'Giro',
            'condicionpago_nota_credito' => 'C. de Pago',
            'oc_nota_credito' => 'O. de Compra',
            'responsable_nota_credito' => 'Vendedor',
            'comentarior_nota_credito' => 'Comentario',
            'numerofactura_nota_credito' => 'Numero Factura',
            'fechaemision_nota_credito' => 'Fec. Emision',
            'neto_nota_credito' => 'Neto',
            'total_nota_credito' => 'Total',
            'id_notapedido_nota_credito' => 'NP',
        ));      
  }
}
