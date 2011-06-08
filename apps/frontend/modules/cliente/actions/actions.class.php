<?php

/**
 * cliente actions.
 *
 * @package    sffacturacion
 * @subpackage cliente
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class clienteActions extends sfActions
{

  public function executeHistorial(sfWebRequest $request)
  {
    $this->getUser()->setCulture('es_CL');
    $empresa = $this->getUser()->getAttribute('empresa', 'artelamp_1');
    Doctrine_Manager::getInstance()->setCurrentConnection($empresa);
    $this->facturas = Doctrine_Core::getTable('Factura')
      ->createQuery('a')
      ->execute();
    $this->deuda = 0;
    $this->pagado = 0;
    foreach ($this->facturas as $factura){
        $this->deuda += $factura->getSaldoFactura();
        $this->pagado += $factura->getMontoFactura() - $factura->getSaldoFactura();
    }

    $this->empresa = new empresabdForm(null, array('buscarEmpresa' => 'buscarEmpresa_cliente()', 'empresa' => $empresa));

  }

  public function executeSearch_cliente(sfWebRequest $request){
    $query = $request->getParameter('query');
      $querys = explode('+',$query);
      $limit=20;

      if(count($querys) < 2){

          $clientes = Doctrine_Core::getTable('Cliente')
                  ->createQuery('a')
                  ->where('a.nombre_cliente LIKE ?','%'.$query.'%')
                  ->orWhere('a.descripcion_cliente LIKE ?','%'.$query.'%')
                  ->orWhere('a.rut_cliente LIKE ?','%'.$query.'%');
                  

      }
      else{
          $clientes = Doctrine_Core::getTable('Cliente')
                  ->createQuery('a');
          for($j=0;$j<count($querys);$j++){
                    $clientes = $clientes
                  ->orwhere('a.nombre_cliente LIKE ?','%'.$query[$j].'%')
                  ->orWhere('a.descripcion_cliente LIKE ?','%'.$query[$j].'%')
                  ->orWhere('a.rut_cliente LIKE ?','%'.$query[$j].'%');
          }          
      }

      //return $this->renderText($activos->getSqlQuery());
      $clientes = $clientes->limit($limit)->execute();

      if ($request->isXmlHttpRequest())
      {
        if ('' == $query || count($clientes)==0)
        {
          return $this->renderText('No hay Resultados...');
        }

        return $this->renderPartial('cliente/listcliente', array('clientes' => $clientes));
      }
  }

  public function executeMostrarfacturas(sfWebRequest $request){
      $this->getContext()->getConfiguration()->loadHelpers('Number');
      $rut_cliente = $request->getParameter('rut_cliente');
      $empresa = $request->getParameter('empresa');
      $empresa += 1;
      $DM = Doctrine_Manager::getInstance();
      $DM->setCurrentConnection('artelamp_'.$empresa);
      $this->getUser()->setAttribute('empresa', 'artelamp_'.$empresa);

      if($rut_cliente != '#'){
          $notas = Doctrine_Query::create()//0.311 -> 0.27
          ->select('a.id_salida')
          ->from('Salida a')
          ->where('a.id_cliente = ?',$rut_cliente)
          ->execute();

            if(count($notas) != 0){
              $id_notas = array();
              foreach($notas as $nota){//0.02
                $id_notas[] = $nota['id_salida'];
              }

              $facturas = Doctrine_Core::getTable('Factura')
               ->createQuery('a')
               ->whereIn('a.id_notapedido_factura', $id_notas);
            }
            else{
              //CONSULTA COCHINA QUE NO RETORNA VALORES
              $facturas = Doctrine_Core::getTable('Factura')
               ->createQuery('a')
               ->where('true = ?',false);
            }

      }
      else{
          $facturas = Doctrine_Core::getTable('Factura')
           ->createQuery('a');
      }

           $facturas = $facturas->execute();

           

           //AL APLICAR PAGINADOR SE DEBE CONSULTAR TODAS LAS FACTURAS
           $deuda = 0;
           $pagado = 0;
            foreach ($facturas as $factura){
                $deuda += $factura->getSaldoFactura();
                $pagado += $factura->getMontoFactura() - $factura->getSaldoFactura();
            }


           //FALTA PAGINADOR



          if ($request->isXmlHttpRequest())
          {
            if ('' == $rut_cliente || count($facturas)==0)
            {
              return $this->renderText('No hay Resultados...');
            }

            return $this->renderPartial('cliente/listfactura', array('facturas' => $facturas, 'deuda' => format_currency($deuda,'CLP'), 'pagado' => format_currency($pagado,'CLP') ));
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
