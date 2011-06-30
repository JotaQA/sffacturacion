<?php

/**
 * Pago form.
 *
 * @package    sffacturacion
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class PagoForm extends BasePagoForm
{
  public function configure()
  {
      unset(
          $this['fecha_pago']
    );

      $this->widgetSchema['id_cuota'] = new sfWidgetFormInputHidden();
//      $this->widgetSchema['id_cuota']->setAttributes(array('style'=>'display:none'));
//      $this->widgetSchema['monto_pago']->setAttributes(array('type'=>'hidden'));
      $this->widgetSchema->setLabels(array(
          'id_tipo_pago' => 'TIPO DE PAGO',
          'monto_pago' => 'MONTO A PAGAR',
      ));

          $this->validatorSchema['monto_pago'] = new sfValidatorCallback(array(
                    'callback' => array($this, 'validarmonto')
                ));

//          $this->validatorSchema['monto_pago'] = new sfValidatorString(array('min_length' => 4));

      
  }
  function validarmonto(sfValidatorBase $validator, $value) {
        $pago = sfContext::getInstance()->getRequest()->getParameter('pago');
        if($pago != NULL) $cuota = Doctrine_Core::getTable('Cuota')->find($pago['id_cuota']);
        else throw new sfValidatorError($validator, 'Error grave, no se encuentra la cuota');
        if ($value > $cuota->getMontoCuota() - $cuota->getMontopagadoCuota()) {
            throw new sfValidatorError($validator, 'El monto supera el saldo<b>('.($cuota->getMontoCuota() - $cuota->getMontopagadoCuota()).')</b> de la cuota');
        } else {
            return $value;
        }
    }
}
