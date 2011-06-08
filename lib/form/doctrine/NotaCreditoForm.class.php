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
      $this->widgetSchema['comuna_nota_credito'] = new sfWidgetFormInputText();

      $this->widgetSchema->setLabels(array(
            'numero_nota_credito' => 'Numero NC',
            'rut_nota_credito' => 'RUT',
            'nombre_estado_nota_credito' => 'Estado',
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
            'fechaingreso_nota_credito' => 'Fec. Ingreso',
        ));      
  }
}
