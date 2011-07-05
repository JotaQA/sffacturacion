<?php

/**
 * factura actions.
 *
 * @package    sffacturacion
 * @subpackage factura
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class facturaActions extends sfActions
{
  public function executeCambiartipo(sfWebRequest $request)
  {
    $empresa = $this->getUser()->getAttribute('empresa', 'artelamp_1');
    Doctrine_Manager::getInstance()->setCurrentConnection($empresa);
    $this->forward404Unless($factura = Doctrine_Core::getTable('Factura')->find(array($request->getParameter('id_factura'))), sprintf('Object factura does not exist (%s).', $request->getParameter('id_factura')));
    $this->form = new FacturaTipoForm($factura);
    if($request->isMethod(sfRequest::POST)){
        $this->form->bind($request->getParameter($this->form->getName()));
         if ($this->form->isValid()){
             $factura = $this->form->save();
             $this->redirect('factura/cerrarpopup');
         }      
    }
  }

  public function executeCerrarpopup(sfWebRequest $request){

  }

    public function executeMostrarfacturas(sfWebRequest $request){
      $rut_cliente = $request->getParameter('rut_cliente');
      
      $textoFecha1 = $request->getParameter('textoFecha1');
      $textoFecha2 = $request->getParameter('textoFecha2');
      list($dia1,$mes1,$año1)=split("/", $textoFecha1);
      list($dia2,$mes2,$año2)=split("/", $textoFecha2);
      $fecha1 = date("Y-m-d",mktime(0,0,0, $mes1,$dia1,$año1));
      $fecha2 = date("Y-m-d",mktime(0,0,0, $mes2,$dia2,$año2));
      
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
               ->innerJoin('a.EstadoFactura e')
               ->Where('e.nombre_estadofactura != ?','Anulada')
               ->AndWhere('e.nombre_estadofactura != ?','Pagada')
               ->whereIn('a.id_notapedido_factura', $id_notas);
            }
            else{
              //CONSULTA COCHINA QUE NO RETORNA VALORES
              $facturas = Doctrine_Core::getTable('Factura')
               ->createQuery('a')
               ->innerJoin('a.EstadoFactura e')
               ->Where('e.nombre_estadofactura != ?','Anulada')
               ->AndWhere('e.nombre_estadofactura != ?','Pagada')
               ->where('true = ?',false);
            }

      }
      else{
          $facturas = Doctrine_Core::getTable('Factura')
           ->createQuery('a')
           ->innerJoin('a.EstadoFactura e')
           ->Where('e.nombre_estadofactura != ?','Anulada')
           ->AndWhere('e.nombre_estadofactura != ?','Pagada');
      }

           $facturas = $facturas
                ->AndWhere('DATE(a.fechaemision_factura) >= ?',$fecha1)
                ->AndWhere('DATE(a.fechaemision_factura) <= ?',$fecha2)
                ->AndWhere('a.fechaemision_factura != ?','NULL');
//                ->execute();


        $this->pager = new sfDoctrinePager(//0.11
                        'Factura',
                        15
        );
        $this->pager->setQuery($facturas);
        $this->pager->setPage($request->getParameter('pagina', 1));
        $this->pager->init();



          if ($request->isXmlHttpRequest())
          {
            if ('' == $rut_cliente || count($facturas)==0)
            {
              return $this->renderText('No hay Resultados...');
            }

            return $this->renderPartial('factura/listfactura', array('pager' =>  $this->pager));
          }

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

      $clientes = $clientes->limit($limit)->execute();

      if ($request->isXmlHttpRequest())
      {
        if ('' == $query || count($clientes)==0)
        {
          return $this->renderText('No hay Resultados...');
        }

        return $this->renderPartial('factura/listcliente', array('clientes' => $clientes));
      }
  }


  public function executeAnular(sfWebRequest $request)
  {
    $empresa = $this->getUser()->getAttribute('empresa', 'artelamp_1');
    Doctrine_Manager::getInstance()->setCurrentConnection($empresa);
//    $request->checkCSRFProtection();

    $this->forward404Unless($factura = Doctrine_Core::getTable('Factura')->find(array($request->getParameter('id_factura'))), sprintf('Object factura does not exist (%s).', $request->getParameter('id_factura')));
    $resultado = $factura->anular();

    if($resultado == 'true') return $this->renderText('true');
    else return $this->renderText($resultado);
  }


  public function executeIndex(sfWebRequest $request)
  {
      $this->getUser()->setCulture('es_CL');
      Doctrine_Manager::getInstance()->setCurrentConnection('artelamp_1');
      $this->getUser()->setAttribute('empresa', 'artelamp_1');

      $ndias1 = -1;
      $fecha1 = date("Y-m-d",mktime(0,0,0) + $ndias1 * 24 * 60 * 60);
      $ndias2 = 3;
      $fecha2 = date("Y-m-d",mktime(0,0,0) + $ndias2 * 24 * 60 * 60);

      $facturas = Doctrine_Core::getTable('Factura')
              ->createQuery('a')
              ->innerJoin('a.EstadoFactura e')
              ->Where('DATE(a.fechaemision_factura) >= ?',$fecha1)
              ->AndWhere('DATE(a.fechaemision_factura) <= ?',$fecha2)
              ->AndWhere('e.nombre_estadofactura != ?','Anulada')
              ->AndWhere('a.fechaemision_factura != ?','NULL')
              ->AndWhere('e.nombre_estadofactura != ?','Pagada');
//              ->execute();
      
      $this->pager = new sfDoctrinePager(//0.11
                        'Factura',
                        15
        );
      $this->pager->setQuery($facturas);
      $this->pager->setPage($request->getParameter('pagina', 1));
      $this->pager->init();
      
      $this->empresa = new empresabdForm(null, array('buscarEmpresa' => 'filtro()', 'empresa' => 'artelamp_1'));
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new FacturaForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new FacturaForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $empresa = $this->getUser()->getAttribute('empresa', 'artelamp_1');
    Doctrine_Manager::getInstance()->setCurrentConnection($empresa);
    $this->forward404Unless($factura = Doctrine_Core::getTable('Factura')->find(array($request->getParameter('id_factura'))), sprintf('Object factura does not exist (%s).', $request->getParameter('id_factura')));
    $this->form = new FacturaForm($factura);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($factura = Doctrine_Core::getTable('Factura')->find(array($request->getParameter('id_factura'))), sprintf('Object factura does not exist (%s).', $request->getParameter('id_factura')));
    $this->form = new FacturaForm($factura);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($factura = Doctrine_Core::getTable('Factura')->find(array($request->getParameter('id_factura'))), sprintf('Object factura does not exist (%s).', $request->getParameter('id_factura')));
    $factura->delete();

    $this->redirect('factura/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $factura = $form->save();

      $this->redirect('factura/edit?id_factura='.$factura->getIdFactura());
    }
  }
}
