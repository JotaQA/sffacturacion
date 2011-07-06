<?php

/**
 * cliente actions.
 *
 * @package    sffacturacion
 * @subpackage cliente
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class dteActions extends sfActions
{
    public function executeGenDoc(sfWebRequest $request) {
//        30 FACTURA
//        32 FACTURA EXENTA
//        33 FACTURA ELECTRONICA
//        34 FACTURA EXENTA ELECTRONICA
//        35 BOLETA
//        38 BOLETA EXENTA
//        39 BOLETA ELECTRONICA
//        40 LIQUIDACION FACTURA
//        45 FACTURA DE COMPRA
//        46 FACTURA DE COMPRA ELECTRONICA
//        50 GUIA DE DESPACHO
//        52 GUIA DE DESPACHO ELECTRONICA
//        55 NOTA DE DEBITO
//        56 NOTA DE DEBITO ELECTRONICA
//        60 NOTA DE CREDITO
//        61 NOTA DE CREDITO ELECTRONICA

//        $this->forward404Unless($id = $request->getParameter('id'));
        $empresa = Doctrine_Core::getTable('Empresa')->find(0);
        $this->tipo = 33;
        $this->RUTEmisor = $empresa->getRutEmpresa();
        $this->RznSoc = $empresa->getRazonSocial();
        $this->GiroEmis = $empresa->getRubro();
        $this->DirOrigen = $empresa->getDireccion();
        $this->CmnaOrigen = $empresa->getComuna();
        $this->CiudadOrigen = $empresa->getCiudad();
        $parametros = Doctrine_Core::getTable('Parametro')->findAll();
        foreach ($parametros as $parametro){
            if($parametro->getNombreParametro() == 'IVA') $this->TasaIVA = 
        }
        $this->TasaIVA = $empresa->getRutEmpresa();
        $this->TpoCodigo = $empresa->getRutEmpresa();
        $this->GlosaDR = $empresa->getRutEmpresa();
        

        switch ($this->tipo){
            case 33:
                $factura = Doctrine_Query::create()
                    ->select('f.*, da.*')
                    >from('Factura f')
                    ->innerJoin('f.EstadoFactura e')
                    ->innerJoin('f.DetalleActivo da')
                    ->where('f.id_factura = ?', $id)
                    ->execute();
                $this->factura = $factura[0];
        }
        
    }

  public function executeIndex(sfWebRequest $request)
  {
    $this->clientes = Doctrine_Core::getTable('Cliente')
      ->createQuery('a')
      ->execute();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->cliente = Doctrine_Core::getTable('Cliente')->find(array($request->getParameter('id_cliente')));
    $this->forward404Unless($this->cliente);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new ClienteForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new ClienteForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($cliente = Doctrine_Core::getTable('Cliente')->find(array($request->getParameter('id_cliente'))), sprintf('Object cliente does not exist (%s).', $request->getParameter('id_cliente')));
    $this->form = new ClienteForm($cliente);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($cliente = Doctrine_Core::getTable('Cliente')->find(array($request->getParameter('id_cliente'))), sprintf('Object cliente does not exist (%s).', $request->getParameter('id_cliente')));
    $this->form = new ClienteForm($cliente);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($cliente = Doctrine_Core::getTable('Cliente')->find(array($request->getParameter('id_cliente'))), sprintf('Object cliente does not exist (%s).', $request->getParameter('id_cliente')));
    $cliente->delete();

    $this->redirect('cliente/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $cliente = $form->save();

      $this->redirect('cliente/edit?id_cliente='.$cliente->getIdCliente());
    }
  }
}
