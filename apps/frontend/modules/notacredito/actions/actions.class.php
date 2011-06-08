<?php

/**
 * notacredito actions.
 *
 * @package    sffacturacion
 * @subpackage notacredito
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class notacreditoActions extends sfActions
{
  public function executeCrear(sfWebRequest $request)
  {
    Doctrine_Manager::getInstance()->setCurrentConnection('artelamp_1');
    $this->detalle_activos = Doctrine_Core::getTable('DetalleActivo')
      ->createQuery('a')
      ->Where('a.id_factura = 73')
      ->execute();
    $this->cb = new sfWidgetFormInputCheckbox();
    $this->it = new sfWidgetFormInputText();
  }
  
  public function executeEmitir(sfWebRequest $request)
  {
    $empresa = $this->getUser()->getAttribute('empresa', 'artelamp_1');
    Doctrine_Manager::getInstance()->setCurrentConnection($empresa);
//    $request->checkCSRFProtection();
    $vectordatos = json_decode($request->getParameter('vectordatos'));
    $id_factura = $request->getParameter('id_factura');    
    $largo = count($vectordatos);
    if($largo > 0){
        $nota_credito = new NotaCredito();
//        SE COPIAN TODOS LOS VALORES EXCEPTO:
//        NumeroNotaCredito
//        NetoNotaCredito
//        TotalNotaCredito
        $nota_credito->copiarDeFactura($id_factura);
    }
    $neto = 0;
    for($i=0; $i<$largo; $i+=2){
        $detalle_activo = Doctrine_Core::getTable('DetalleActivo')->find($vectordatos[$i]);
        $detalle_activo->setCantidadNotaCredito($vectordatos[$i+1]);
        $detalle_activo->setNotaCredito($nota_credito);
        $detalle_activo->save();
        $neto += $detalle_activo->getCantidadNotaCredito()*$detalle_activo->getPrecioDetalleActivo();
    }
    $nota_credito->setNetoNotaCredito($neto);
    $iva = Doctrine_Core::getTable('Parametro')->findOneByNombreParametro('IVA');
    $iva = $iva->getValorParametro();
    $nota_credito->setTotalNotaCredito($neto*(1+$iva));
    $nota_credito->save();
    
    return $this->renderText('ready');
//    
//    return $this->renderText(count($vectordatos));

//    $this->forward404Unless($factura = Doctrine_Core::getTable('Factura')->find(array($request->getParameter('id_factura'))), sprintf('Object factura does not exist (%s).', $request->getParameter('id_factura')));
//    $resultado = $factura->anular();
//
//    if($resultado == 'true') return $this->renderText('true');
//    else return $this->renderText($resultado);
  }
  
  public function executeIndex(sfWebRequest $request)
  {
    Doctrine_Manager::getInstance()->setCurrentConnection('artelamp_1');
    $this->getUser()->setAttribute('empresa', 'artelamp_1');
    $this->nota_creditos = Doctrine_Core::getTable('NotaCredito')
        ->createQuery('a')
        ->execute();
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new NotaCreditoForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new NotaCreditoForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($nota_credito = Doctrine_Core::getTable('NotaCredito')->find(array($request->getParameter('id_nota_credito'))), sprintf('Object nota_credito does not exist (%s).', $request->getParameter('id_nota_credito')));
    $this->form = new NotaCreditoForm($nota_credito);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($nota_credito = Doctrine_Core::getTable('NotaCredito')->find(array($request->getParameter('id_nota_credito'))), sprintf('Object nota_credito does not exist (%s).', $request->getParameter('id_nota_credito')));
    $this->form = new NotaCreditoForm($nota_credito);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($nota_credito = Doctrine_Core::getTable('NotaCredito')->find(array($request->getParameter('id_nota_credito'))), sprintf('Object nota_credito does not exist (%s).', $request->getParameter('id_nota_credito')));
    $nota_credito->delete();

    $this->redirect('notacredito/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $nota_credito = $form->save();

      $this->redirect('notacredito/edit?id_nota_credito='.$nota_credito->getIdNotaCredito());
    }
  }
}
