<?php

/**
 * Pago form.
 *
 * @package    sffacturacion
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class PagoeditForm extends BasePagoForm
{
  public function configure()
  {
      $this->widgetSchema['id_cuota'] = new sfWidgetFormInputHidden();
      $this->widgetSchema['fecha_pago'] = new sfWidgetFormDateTime(array(
          'date' => array('format' => '%day%/%month%/%year%'),
          'time' => array('format_without_seconds' => '<b>HORA</b>  %hour%:%minute%')
//          'with_time' => false
          ));
//      $this->widgetSchema['monto_pago']->setAttributes(array('type'=>'hidden'));
//      $this->widgetSchema->setLabels(array(
//          'fecha_pago'    => 'FECHA',
//          'id_tipo_pago' => 'TIPO DE PAGO',
//          'monto_pago' => 'MONTO PAGADO',
//      ));
  }
}
