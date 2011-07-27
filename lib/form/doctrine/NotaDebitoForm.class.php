<?php

/**
 * NotaDebito form.
 *
 * @package    sffacturacion
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class NotaDebitoForm extends BaseNotaDebitoForm
{
  public function configure()
  {
      unset(
      $this['fechaingreso_nota_debito']
              );
      $this->widgetSchema['comuna_nota_debito'] = new sfWidgetFormInputText();
      $this->widgetSchema['direccion_nota_debito'] = new sfWidgetFormInputText();
      $this->widgetSchema['ciudad_nota_debito'] = new sfWidgetFormInputText();
      $this->widgetSchema['giro_nota_debito'] = new sfWidgetFormInputText();
      $this->widgetSchema['condicionpago_nota_debito'] = new sfWidgetFormInputText();
      $this->widgetSchema['oc_nota_debito'] = new sfWidgetFormInputText();
      $this->widgetSchema['responsable_nota_debito'] = new sfWidgetFormChoice(array(
          'choices'  => Doctrine_Core::getTable('Usuarios')->getUsuariosParaChoice()
        ));
      $this->widgetSchema['neto_nota_debito'] = new sfWidgetFormInputText(array(), array(
          'readonly' => 'readonly'
      ));
      $this->widgetSchema['total_nota_debito'] = new sfWidgetFormInputText(array(), array(
          'readonly' => 'readonly'
      ));
      $this->widgetSchema['id_notapedido_nota_debito'] = new sfWidgetFormInputText(array(), array(
          'readonly' => 'readonly'
      ));
      $this->widgetSchema['fechaemision_nota_debito'] = new sfWidgetFormInputText();
      
      $this->widgetSchema['codref_nota_debito'] = new sfWidgetFormInputText(array(), array(
          'readonly' => 'readonly'
      ));

      $this->widgetSchema->setLabels(array(
            'numero_nota_debito' => 'Numero ND',
            'rut_nota_debito' => 'RUT',
            'nombre_nota_debito' => 'Nombre',
            'telefono_nota_debito' => 'Telefono',
            'direccion_nota_debito' => 'Dirección',
            'comuna_nota_debito' => 'Comuna',
            'ciudad_nota_debito' => 'Ciudad',
            'giro_nota_debito' => 'Giro',
            'condicionpago_nota_debito' => 'C. de Pago',
            'oc_nota_debito' => 'O. de Compra',
            'responsable_nota_debito' => 'Vendedor',
            'comentarior_nota_debito' => 'Comentario',
            'numerofactura_nota_debito' => 'Numero Factura',
            'fechaemision_nota_debito' => 'Fec. Emision',
            'neto_nota_debito' => 'Neto',
            'total_nota_debito' => 'Total',
            'id_notapedido_nota_debito' => 'NP',
            'codref_nota_debito' => 'Cód referencia',
        ));
  }
}
