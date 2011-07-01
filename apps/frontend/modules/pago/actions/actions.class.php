<?php

/**
 * cliente actions.
 *
 * @package    sffacturacion
 * @subpackage cliente
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class pagoActions extends sfActions
{
    static function cmp($a,$b){
        return strcmp($a->getFactura()->getNombreFactura(), $b->getFactura()->getNombreFactura());
//        if($a->getFactura()->getNumeroFactura() == $b->getFactura()->getNumeroFactura()) return 0;
//        return ($a->getFactura()->getNumeroFactura() < $b->getFactura()->getNumeroFactura()) ? -1 : 1;
    }



    public function executePDF(sfWebRequest $request)
  {
//    date_default_timezone_set('America/Santiago');
//    $this->getUser()->setCulture('es_CL');


      $textoFecha1 = $request->getParameter('textoFecha1');
      $textoFecha2 = $request->getParameter('textoFecha2');
      list($dia1,$mes1,$año1)=split("/", $textoFecha1);
      list($dia2,$mes2,$año2)=split("/", $textoFecha2);

      $fecha1 = date("Y-m-d",mktime(0,0,0, $mes1,$dia1,$año1));
      $fecha2 = date("Y-m-d",mktime(0,0,0, $mes2,$dia2,$año2));
      $fecha = date("Y-m-d",mktime(0,0,0));

      $id_vendedor = $request->getParameter('id_vendedor');
      $empresa = $request->getParameter('empresa');
      $empresa += 1;
      $DM = Doctrine_Manager::getInstance();
      $DM->setCurrentConnection('artelamp_'.$empresa);

      if($id_vendedor != ''){

          $notas = Doctrine_Query::create()//0.311 -> 0.27
          ->select('a.id_salida')
          ->from('Salida a')
          ->where('a.id_responsable = ?',$id_vendedor)
          ->execute();

          $id_notas = array();
          foreach($notas as $nota){//0.02
            $id_notas[] = $nota['id_salida'];
          }

          $cuotas = Doctrine_Query::create()
          ->from('Cuota a')
          ->innerJoin('a.Factura f')
          ->innerJoin('f.EstadoFactura e')
          ->where('DATE(a.fechavencimiento_cuota) >= ?',$fecha1)
          ->AndWhere('DATE(a.fechavencimiento_cuota) <= ?',$fecha2)
          ->AndWhere('e.nombre_estadofactura != ?','Anulada')
          ->whereIn('f.id_notapedido_factura', $id_notas);
//          ->execute();

      }
      else{
          $cuotas = Doctrine_Query::create()
          ->from('Cuota a')
          ->innerJoin('a.Factura f')
          ->innerJoin('f.EstadoFactura e')
          ->where('DATE(a.fechavencimiento_cuota) >= ?',$fecha1)
          ->AndWhere('DATE(a.fechavencimiento_cuota) <= ?',$fecha2)
          ->AndWhere('e.nombre_estadofactura != ?','Anulada');
//          ->execute();
      }

      $tipo = $request->getParameter('tipocuota');

      switch ($tipo){
        case 1:
            $cuotas = $cuotas->AndWhere('a.monto_cuota = a.montopagado_cuota');
            break;
        case 2:
            $cuotas = $cuotas->AndWhere('DATE(a.fechavencimiento_cuota) >= ?',$fecha)
                    ->AndWhere('a.monto_cuota > a.montopagado_cuota');
            break;
        case 3:
            $cuotas = $cuotas->AndWhere('DATE(a.fechavencimiento_cuota) < ?',$fecha)
                    ->AndWhere('a.monto_cuota > a.montopagado_cuota');
            break;
        default:

            break;
      }

     $cuotas = $cuotas->execute();
     $cuotas = $cuotas->getData();

     usort($cuotas, array("pagoActions", "cmp"));
     

     if(count($cuotas) == 0) throw new sfStopException();


    $config = sfTCPDFPluginConfigHandler::loadConfig('my_config');
//    sfTCPDFPluginConfigHandler::includeLangFile($this->getUser()->getCulture());

    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

    // set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor(PDF_AUTHOR);
    $pdf->SetTitle(PDF_HEADER_TITLE);
    $pdf->SetSubject('LISTA PAGOS/COBROS');
    $pdf->SetKeywords('PAGOS,COBROS');

    if($id_vendedor != ''){
//        return $this->renderText('cuota '.  count($cuotas));
        $vendedor = Doctrine_Core::getTable('Usuarios')->find($id_vendedor);
        $pdf->SetHeaderData("logoartelamp.jpg", PDF_HEADER_LOGO_WIDTH, "LISTA DE PAGOS/COBROS", $vendedor->getDescripcion()."\n".date('d/m/Y h:i:s A'));
    }
    else{
            $pdf->SetHeaderData("logoartelamp.jpg", PDF_HEADER_LOGO_WIDTH, "LISTA DE PAGOS/COBROS", "Vendedores\n".date('d/m/Y h:i:s A'));
    }



    // set header and footer fonts
    $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
    $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
    //$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

    // remove default header/footer
    //$pdf->setPrintHeader(false);
    //$pdf->setPrintFooter(false);

    // set default monospaced font
    $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

    //set margins
    $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
    $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

    //set auto page breaks
    $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

    //set image scale factor
    $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

    //set some language-dependent strings
    //$pdf->setLanguageArray($l);

    // ---------------------------------------------------------

    // set font
    //$pdf->SetFont('times', 'BI', 20);
    $pdf->SetFont('', '', 7);

    // add a page
    $pdf->AddPage();

    $this->getContext()->getConfiguration()->loadHelpers('Number');
    $this->getContext()->getConfiguration()->loadHelpers('Escaping');
    
    $html = '
    <table border="1" cellpadding="6">
        <tr>
            <th width="150" align="center"><b>Factura</b></th>
            <th width="500" align="center"><b>Cliente</b></th>
            <th width="170" align="center"><b>Fono</b></th>
            <th width="180" align="center"><b>Estado</b></th>
            <th width="200" align="center"><b>Total</b></th>
            <th width="200" align="center"><b>Pagado</b></th>
            <th width="180" align="center"><b>Vencimiento</b></th>
            <th width="520" align="center"><b>Comentario</b></th>
        </tr>';
    foreach ($cuotas as $cuota){
        $cuota->ValidarEstado();
        $html = $html.'<tr>
                            <td>'.$cuota->getFactura()->getNumeroFactura().'</td>
                            <td>'.esc_entities($cuota->getFactura()->getNombreFactura()).'</td>
                            <td>'.$cuota->getFactura()->getTelefonoFactura().'</td>
                            <td>'.$cuota->getEstadoCuota()->getNombreEstadoCuota().'</td>
                            <td>'.format_currency($cuota->getMontoCuota(),'CLP').'</td>
                            <td>'.format_currency($cuota->getMontopagadoCuota(),'CLP').'</td>
                            <td>'.$cuota->getDateTimeObject('fechavencimiento_cuota')->format('d/m/Y').'</td>
                            <td></td>
                </tr>';
    }

    $html = $html.'</table>';

    // output the HTML content
    $pdf->writeHTML($html, true, false, true, false, '');


    // ---------------------------------------------------------

    //Close and output PDF document
    $pdf->Output('file.pdf', 'I');

    //============================================================+
    // END OF FILE
    //============================================================+

  // Stop symfony process
  throw new sfStopException();

  
  }


  public function executeFiltro_numerofactura(sfWebRequest $request){
      $numero = $request->getParameter('numero');
      $empresa = $request->getParameter('empresa');
      $empresa += 1;
      $DM = Doctrine_Manager::getInstance();
      $DM->setCurrentConnection('artelamp_'.$empresa);
      $this->getUser()->setAttribute('empresa', 'artelamp_'.$empresa);

      $cuotas = Doctrine_Query::create()
          ->from('Cuota a')
          ->innerJoin('a.Factura f')
          ->innerJoin('f.EstadoFactura e')
          ->AndWhere('e.nombre_estadofactura != ?','Anulada')
          ->AndWhere('f.numero_factura = ?',$numero);

      $this->pager = new sfDoctrinePager(//0.11
                    'Cuota',
                    18
              );
      $this->pager->setQuery($cuotas);
      $this->pager->setPage(1);
      $this->pager->init();


      if ($request->isXmlHttpRequest()) {

            if (count($cuotas) == 0 ) {
                return $this->renderText('No hay Resultados...');
            }
            return $this->renderPartial('pago/listafecha', array('pager' =>  $this->pager));
      }


  }



  public function executeFiltro_cliente(sfWebRequest $request){
      $cliente = $request->getParameter('cliente');
      $empresa = $request->getParameter('empresa');
      $empresa += 1;
      $DM = Doctrine_Manager::getInstance();
      $DM->setCurrentConnection('artelamp_'.$empresa);
      $this->getUser()->setAttribute('empresa', 'artelamp_'.$empresa);

      $clientes = Doctrine_Core::getTable('Cliente')
                  ->createQuery('a')
                  ->where('a.nombre_cliente LIKE ?','%'.$cliente.'%')
                  ->orWhere('a.descripcion_cliente LIKE ?','%'.$cliente.'%')
                  ->orWhere('a.rut_cliente LIKE ?','%'.$cliente.'%')
                  ->execute();

      if($cliente != NULL){
          $notas = Doctrine_Query::create()//0.311 -> 0.27
          ->select('a.id_salida')
          ->from('Salida a')
          ->where('a.id_cliente = ?',$clientes[0]->getRutCliente())
          ->execute();

          $id_notas = array();
          foreach($notas as $nota){//0.02
            $id_notas[] = $nota['id_salida'];
          }

          $cuotas =  Doctrine_Query::create()
              ->select('a.*')
              ->from('Cuota a')
              ->innerJoin('a.Factura f')
              ->innerJoin('f.EstadoFactura e')
              ->AndWhere('e.nombre_estadofactura != ?','Anulada')
              ->whereIn('f.id_notapedido_factura', $id_notas);
      }
      else{
          //CONSULTA COCHINA QUE NO RETORNA VALORES
          $cuotas = Doctrine_Core::getTable('Cuota')
               ->createQuery('a')
               ->where('1=0');
      }

      
//      return $this->renderText(count($id_notas));

      
      
//      return $this->renderText(count($cuotas));

      $this->pager = new sfDoctrinePager(//0.11
                    'Cuota',
                    18
              );
      $this->pager->setQuery($cuotas);
      $this->pager->setPage(1);
      $this->pager->init();


      if ($request->isXmlHttpRequest()) {

            if (count($cuotas) == 0 ) {
                return $this->renderText('No hay Resultados...');
            }
            return $this->renderPartial('pago/listafecha', array('pager' =>  $this->pager));
      }


  }

  public function executeFiltro_listafecha(sfWebRequest $request){
      $this->getContext()->getConfiguration()->loadHelpers('Number');
      $textoFecha1 = $request->getParameter('fecha1');
      $textoFecha2 = $request->getParameter('fecha2');
      list($dia1,$mes1,$año1)=split("/", $textoFecha1);
      list($dia2,$mes2,$año2)=split("/", $textoFecha2);

      $fecha1 = date("Y-m-d",mktime(0,0,0, $mes1,$dia1,$año1));
      $fecha2 = date("Y-m-d",mktime(0,0,0, $mes2,$dia2,$año2));
      $fecha = date("Y-m-d",mktime(0,0,0));

      $id_vendedor = $request->getParameter('id_vendedor');
      $empresa = $request->getParameter('empresa');
      $empresa += 1;
      $DM = Doctrine_Manager::getInstance();
      $DM->setCurrentConnection('artelamp_'.$empresa);
      $this->getUser()->setAttribute('empresa', 'artelamp_'.$empresa);
      
      if($id_vendedor != ''){
      
          $notas = Doctrine_Query::create()//0.311 -> 0.27
          ->select('a.id_salida')
          ->from('Salida a')
          ->where('a.id_responsable = ?',$id_vendedor)
          ->execute();

          $id_notas = array();
          foreach($notas as $nota){//0.02
            $id_notas[] = $nota['id_salida'];
          }          

          $cuotas =  Doctrine_Query::create()
          ->select('a.*, f.*')
          ->from('Cuota a')
          ->innerJoin('a.Factura f')
          ->innerJoin('f.EstadoFactura e')
          ->where('DATE(a.fechavencimiento_cuota) >= ?',$fecha1)
          ->AndWhere('DATE(a.fechavencimiento_cuota) <= ?',$fecha2)
          ->AndWhere('e.nombre_estadofactura != ?','Anulada')
          ->whereIn('f.id_notapedido_factura', $id_notas);

      }
      else{
          $cuotas = Doctrine_Query::create()
          ->select('a.*, f.*')
          ->from('Cuota a')
          ->innerJoin('a.Factura f')
          ->innerJoin('f.EstadoFactura e')
          ->where('DATE(a.fechavencimiento_cuota) >= ?',$fecha1)
          ->AndWhere('DATE(a.fechavencimiento_cuota) <= ?',$fecha2)
          ->AndWhere('e.nombre_estadofactura != ?','Anulada');
      }

      $tipo = $request->getParameter('tipocuota');

      switch ($tipo){
        case 1:
            $cuotas = $cuotas->AndWhere('a.monto_cuota = a.montopagado_cuota');
            break;
        case 2:
            $cuotas = $cuotas->AndWhere('DATE(a.fechavencimiento_cuota) >= ?',$fecha)
                    ->AndWhere('a.monto_cuota > a.montopagado_cuota');
            break;
        case 3:
            $cuotas = $cuotas->AndWhere('DATE(a.fechavencimiento_cuota) < ?',$fecha)
                    ->AndWhere('a.monto_cuota > a.montopagado_cuota');
            break;
        case 5:
            $cuotas = $cuotas->innerJoin('a.Pago p')
                    ->innerJoin('p.TipoPago tp')
                    ->AndWhere('tp.nombre_tipo_pago = ?','FACTORING');
            break;
        default:
            
            break;
      }
      $cuotas = $cuotas->orderBy('f.numero_factura');

    $total = 0;
    $deuda = 0;
    $pagado = 0;
    $ncredito = 0;
    $cuotas2 = $cuotas;
    $cuotas2 = $cuotas2->execute();
    $id_facturas = array();

    foreach ($cuotas2 as $cuota){
        $total += $cuota->getMontoCuota();
        $deuda += $cuota->getMontoCuota() - $cuota->getMontopagadoCuota();
        $pagado += $cuota->getMontopagadoCuota();
        if(!in_array($cuota->getFactura()->getIdFactura(), $id_facturas)) {
            $id_facturas[] = $cuota->getFactura()->getIdFactura();
        }
    }
    
    if(count($id_facturas)==0){
        $ncs = Doctrine_Query::create()
            ->select('DISTINCT nc.id_nota_credito, nc.total_nota_credito')
            ->from('NotaCredito nc')
            ->where('1=0')
            ->execute();
    }
    else{
        $ncs = Doctrine_Query::create()
            ->select('DISTINCT nc.id_nota_credito, nc.total_nota_credito')
            ->from('NotaCredito nc')
            ->innerJoin('nc.NotacreditoDetalle ncd')
            ->innerJoin('ncd.DetalleActivo da')
            ->innerJoin('da.Factura f')
            ->whereIn('f.id_factura', $id_facturas)
            ->execute();
    }
    
    foreach ($ncs as $nc){
        $ncredito += $nc->getTotalNotaCredito();
    }
      

      $this->pager = new sfDoctrinePager(//0.11
                    'Cuota',
                    18
    );
    $this->pager->setQuery($cuotas);
    $this->pager->setPage($request->getParameter('pagina', 1));
    $this->pager->init();

    
    
    if ($request->isXmlHttpRequest()) {

            if (count($cuotas) == 0 ) {
                return $this->renderText('No hay Resultados...');
            }
//            $this->tiempo = $tiempo_fin - $tiempo_inicio;
            return $this->renderPartial('pago/listafecha', array('pager' =>  $this->pager, 'deuda' => $deuda-$ncredito, 'pagado' => $pagado, 'total' => $total-$ncredito, 'ncredito' => $ncredito));
      }

  }

  public function executeIndex(sfWebRequest $request)
  {
    $this->getUser()->setCulture('es_CL');
    $ndias1 = -1;
    $fecha1 = date("Y-m-d",mktime(0,0,0) + $ndias1 * 24 * 60 * 60);
    $ndias2 = 3;
    $fecha2 = date("Y-m-d",mktime(0,0,0) + $ndias2 * 24 * 60 * 60);

    Doctrine_Manager::getInstance()->setCurrentConnection('artelamp_1');
    $this->getUser()->setAttribute('empresa', 'artelamp_1');

    $cuotas = Doctrine_Query::create()
    ->select('a.id_cuota, a.monto_cuota, a.montopagado_cuota, f.id_factura')
    ->from('Cuota a')
    ->innerJoin('a.Factura f')
    ->innerJoin('f.EstadoFactura e')
    ->where('DATE(a.fechavencimiento_cuota) >= ?',$fecha1)
    ->AndWhere('DATE(a.fechavencimiento_cuota) <= ?',$fecha2)
    ->AndWhere('e.nombre_estadofactura != ?','Anulada')
    ->orderBy('f.numero_factura');

    $this->deuda = 0;
    $this->pagado = 0;
    $this->total = 0;
    $this->ncredito = 0;
    $cuotas2 = $cuotas;
    $cuotas2->execute();
    $id_facturas = array();

    foreach ($cuotas2 as $cuota){
        $this->total += $cuota->getMontoCuota();
        $this->deuda += $cuota->getMontoCuota() - $cuota->getMontopagadoCuota();
        $this->pagado += $cuota->getMontopagadoCuota();
        if(!in_array($cuota->getFactura()->getIdFactura(), $id_facturas)) {
            $id_facturas[] = $cuota->getFactura()->getIdFactura();
        }
    }
    
    if(count($id_facturas)==0){
        $ncs = Doctrine_Query::create()
            ->select('DISTINCT nc.id_nota_credito, nc.total_nota_credito')
            ->from('NotaCredito nc')
            ->where('1=0')
            ->execute();
    }
    else{
        $ncs = Doctrine_Query::create()
            ->select('DISTINCT nc.id_nota_credito, nc.total_nota_credito')
            ->from('NotaCredito nc')
            ->innerJoin('nc.NotacreditoDetalle ncd')
            ->innerJoin('ncd.DetalleActivo da')
            ->innerJoin('da.Factura f')
            ->whereIn('f.id_factura', $id_facturas)
            ->execute();
    }
    
    
    foreach ($ncs as $nc){
        $this->ncredito += $nc->getTotalNotaCredito();
    }
    
    //SE LE RESTA LA NC A LA DEUDA Y FACTURA
    $this->deuda = $this->deuda - $this->ncredito;
    $this->total = $this->total - $this->ncredito;


    $this->pager = new sfDoctrinePager(
                    'Cuota',
                    18
    );
    $this->pager->setQuery($cuotas);
    $this->pager->setPage($request->getParameter('pagina', 1));
    $this->pager->init();

    $this->vendedor = new vendedorForm();
    $this->empresa = new empresabdForm(null, array('buscarEmpresa' => 'buscarEmpresa()', 'empresa' => 'artelamp_1'));

  }


  public function executeComentario(sfWebRequest $request)
  {
    $empresa = $this->getUser()->getAttribute('empresa', 'artelamp_1');
    Doctrine_Manager::getInstance()->setCurrentConnection($empresa);
    $id_cuota = $request->getParameter('id_cuota');
    $this->forward404Unless($cuota = Doctrine_Core::getTable('Cuota')->find($id_cuota), sprintf('Object cuota does not exist (%s).', $id_cuota));
    $this->form = new CuotaComentarioForm($cuota);
    if($request->isMethod(sfRequest::POST)){
        $this->form->bind($request->getParameter($this->form->getName()));
         if ($this->form->isValid()){
             $cuota = $this->form->save();
             $this->redirect('pago/cerrarpopup');
         }      
    }
  }


  public function executeShow(sfWebRequest $request)
  {
    $this->cliente = Doctrine_Core::getTable('Cliente')->find(array($request->getParameter('id_cliente')));
    $this->forward404Unless($this->cliente);
  }

  public function executeNew(sfWebRequest $request)
  {
    $empresa = $this->getUser()->getAttribute('empresa', 'artelamp_1');
    Doctrine_Manager::getInstance()->setCurrentConnection($empresa);
    $id_cuota = $request->getParameter('id_cuota');
    $this->forward404Unless($cuota = Doctrine_Core::getTable('Cuota')->find($id_cuota), sprintf('Object cuota does not exist (%s).', $id_cuota));
    $pago = new Pago();
    $pago->setIdCuota($cuota->getIdCuota());
    $pago->setMontoPago($cuota->getMontoCuota()-$cuota->getMontopagadoCuota());
    
    $this->form = new PagoForm($pago);
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));
    $empresa = $this->getUser()->getAttribute('empresa', 'artelamp_1');
    Doctrine_Manager::getInstance()->setCurrentConnection($empresa);

    $this->form = new PagoForm();

    $this->processForm($request, $this->form);
    
    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $empresa = $this->getUser()->getAttribute('empresa', 'artelamp_1');
    Doctrine_Manager::getInstance()->setCurrentConnection($empresa);
    $this->forward404Unless($pago = Doctrine_Core::getTable('Pago')->find(array($request->getParameter('id_pago'))), sprintf('Object pago does not exist (%s).', $request->getParameter('id_pago')));
    $this->form = new PagoeditForm($pago);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $empresa = $this->getUser()->getAttribute('empresa', 'artelamp_1');
    Doctrine_Manager::getInstance()->setCurrentConnection($empresa);
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($pago = Doctrine_Core::getTable('Pago')->find(array($request->getParameter('id_pago'))), sprintf('Object pago does not exist (%s).', $request->getParameter('id_pago')));
    $this->form = new PagoeditForm($pago);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();
    $empresa = $this->getUser()->getAttribute('empresa', 'artelamp_1');
    Doctrine_Manager::getInstance()->setCurrentConnection($empresa);

    $this->forward404Unless($pago = Doctrine_Core::getTable('Pago')->find(array($request->getParameter('id_pago'))), sprintf('Object pago does not exist (%s).', $request->getParameter('id_pago')));
    $cuota = Doctrine_Core::getTable('Cuota')->find($pago->getIdCuota());
    $pago->delete();
    $monto = $this->sumaPagos($pago->getIdCuota());
    $cuota->setMontopagadoCuota($monto);
    $cuota->save();
    $cuota->ValidarSaldoFactura();
    $this->redirect('pago/cerrarpopup');
  }
   public function executeCerrarpopup(sfWebRequest $request){

   }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $empresa = $this->getUser()->getAttribute('empresa', 'artelamp_1');
      Doctrine_Manager::getInstance()->setCurrentConnection($empresa);
      $pago = $form->save();
      $cuota = Doctrine_Core::getTable('Cuota')->find($pago->getIdCuota());
      $monto = $this->sumaPagos($pago->getIdCuota());
      $cuota->setMontopagadoCuota($monto);
      $cuota->save();
      $cuota->ValidarSaldoFactura();

//      $this->redirect('pago/index');
      $this->redirect('pago/edit?id_pago='.$pago->getIdPago());
    }
  }

  function sumaPagos($id_cuota){
//      $empresa = $this->getUser()->getAttribute('empresa', array('artelamp_1'));
//      Doctrine_Manager::getInstance()->setCurrentConnection($empresa);
      $pagos = Doctrine_Core::getTable('Pago')
      ->createQuery('a')
      ->where('a.id_cuota = ?',$id_cuota)
      ->execute();
      $suma = 0;
      foreach ($pagos as $pago){
          $suma += $pago->getMontoPago();
      }
      return $suma;
  }

  public function fecha_mysql($fecha){
   	ereg( "([0-9]{1,2})/([0-9]{1,2})/([0-9]{2,4})", $fecha, $mifecha);
   	$lafecha=$mifecha[3]."-".$mifecha[2]."-".$mifecha[1];
   	return $lafecha;
   }
}
