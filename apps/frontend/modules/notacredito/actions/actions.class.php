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
  
  public function executeFacturasByfecha(sfWebRequest $request)
  {
      $empresa = $this->getUser()->getAttribute('empresa', 'artelamp_1');
      Doctrine_Manager::getInstance()->setCurrentConnection($empresa);
      $mes = $request->getParameter('mes');
      $año = $request->getParameter('año');
      $codigo = $request->getParameter('codigo');
      $rut_cliente = $request->getParameter('rut_cliente');
      $facturas = Doctrine_Query::create()
            ->select('a.id_factura, a.numero_factura, DATE_FORMAT(a.fechaemision_factura, "%d/%m/%Y" ) as fechaemision_factura , a.tipo_factura, FORMAT(a.monto_factura,"es_CL") as monto_factura, a.id_notapedido_factura, da.cantidad_detalle_activo-da.cantidad_nota_credito as cantidad_detalle_activo, da.cantidad_nota_credito, da.precio_detalle_activo')
            ->from('Factura a')
            ->where('a.rut_factura = ?', $rut_cliente)
            ->Andwhere('YEAR(a.fechaemision_factura) = ?', $año)
            ->Andwhere('MONTH(a.fechaemision_factura) = ?', $mes)
            ->innerJoin('a.DetalleActivo da')
            ->innerJoin('a.EstadoFactura e')
            ->Andwhere('da.codigointerno_detalle_activo = ?', $codigo)
            ->Andwhere('da.cantidad_detalle_activo > da.cantidad_nota_credito')
            ->Andwhere('e.nombre_estadofactura = ?', 'Emitida')
            ->setHydrationMode(Doctrine::HYDRATE_ARRAY)
            ->execute();
      return $this->renderText(json_encode($facturas));
  }
  public function executeVerificarnumNC(sfWebRequest $request)
  {
      $empresa = $this->getUser()->getAttribute('empresa', 'artelamp_1');
      Doctrine_Manager::getInstance()->setCurrentConnection($empresa);
      $numeroNC = $request->getParameter('numeroNC');
      $NC = Doctrine_Core::getTable('NotaCredito')->findOneByNumeroNotaCredito($numeroNC);
      if($NC == null) return $this->renderText('false');
      else return $this->renderText('true');
  }
  public function executeGetFactura(sfWebRequest $request)
  {
      $empresa = $this->getUser()->getAttribute('empresa', 'artelamp_1');
      Doctrine_Manager::getInstance()->setCurrentConnection($empresa);
      $id_factura = $request->getParameter('id_factura');
      $factura = Doctrine_Core::getTable('Factura')->find($id_factura);
      return $this->renderText(json_encode($factura->toArray()));
  }
  public function executeIngresarNC2(sfWebRequest $request)
  {
      $this->forward404Unless($request->isMethod(sfRequest::POST));
      $empresa = $this->getUser()->getAttribute('empresa', 'artelamp_1');
      Doctrine_Manager::getInstance()->setCurrentConnection($empresa);
      $form = new NotaCreditoForm();

      
      $datos = json_decode($request->getParameter('datos'));
      //SI NO HAY DATOS RETORNA ERROR
      if($datos == null || count($datos) == 0 || count($datos)%3 != 0) return $this->renderText('Datos invalidos o corruptos');
      //CAMBIAMOS EL FORMATO DE LA FECHA
      $values = $request->getParameter($form->getName());
      $fecha = $values['fechaemision_nota_credito'];
      list($dia,$mes,$año)=explode("/", $fecha);
      $fecha = date("Y-m-d",mktime(0,0,0, $mes,$dia,$año));
      $values['fechaemision_nota_credito'] = $fecha;
      
      $form->bind($values, $request->getFiles($form->getName()));
      
      if ($form->isValid()){
          //SE PUEDEN PRODUCIR ERRORES, SE USA ROLLBACK
          $conn = Doctrine_Manager::getInstance()->getCurrentConnection();
          try{
              $msgerr = false;
              //INICIO DE LA TRANSACCION
              $conn->beginTransaction();
              
              //EN EL MODELO SE CONFIGURA LA FECHA ACTUAL Y EL ESTADO
              $nota_credito = $form->save();
              

              while(list(, $codigo) = each($datos)) {
                  list(, $id_factura) = each($datos);
                  list(, $cantidad) = each($datos);
                  //UNIMOS LA NC CON EL DETALLE
                  $NCD = new NotacreditoDetalle();
                  $NCD->setNotaCredito($nota_credito);
                  $detalle_activo = Doctrine_Core::getTable('DetalleActivo')->findOneByCodigointernoDetalleActivoAndIdFactura($codigo, $id_factura);
                  //SI HAY ALGUN ERROR...
                  if($detalle_activo == null){
                      $msgerr = true;
                      throw new Exception('detalle nulo');
                  }
                  if($detalle_activo->getCantidadDetalleActivo() < $cantidad){
                      $msgerr = true;
                      throw new Exception('superada la cantidad máxima');
                  }
                  //UNIMOS LA NC CON EL DETALLE
                  $NCD->setDetalleActivo($detalle_activo);
                  //LA CANTIDAD
                  $detalle_activo->setCantidadNotaCredito($cantidad+$detalle_activo->getCantidadNotaCredito());
                  //GUARDAMOS
                  $detalle_activo->save();
                  $NCD->save();
              }
              //SI TODO VA BIEN SE GUARDA
              $conn->commit();
              return $this->renderText('true');
          }          
          catch (Exception $e){
              //SI OCURRE UN ERROR NO SE GUARDA NADA
              $conn->rollBack();
//              if($msgerr) return $this->renderText('Error al procesar los datos, '.$e->getMessage());
              return $this->renderText('Error al procesar los datos: '.$e->getMessage());
          }
          
      }
      return $this->renderText('Formulario invalido');
  }  
    
  public function executePaso2(sfWebRequest $request)
  {
    $empresa = $this->getUser()->getAttribute('empresa', 'artelamp_1');
    Doctrine_Manager::getInstance()->setCurrentConnection($empresa);
    $productos = $this->getUser()->getFlash('productos');
    $rut_cliente = $this->getUser()->getFlash('rut_cliente');
    $this->datos = array();
    foreach ($productos as $producto){
        $facturas = Doctrine_Query::create()
                ->select('a.id_factura, a.numero_factura, a.fechaemision_factura, a.tipo_factura, a.monto_factura, a.id_notapedido_factura, da.cantidad_detalle_activo-da.cantidad_nota_credito as cantidad_detalle_activo, da.cantidad_nota_credito, da.precio_detalle_activo')
                ->from('Factura a')
                ->where('a.rut_factura = ?', $rut_cliente)
                ->Andwhere('YEAR(a.fechaemision_factura) = ?', date('Y'))
                ->Andwhere('MONTH(a.fechaemision_factura) = ?', date('m'))
                ->innerJoin('a.DetalleActivo da')
                ->innerJoin('a.EstadoFactura e')
                ->Andwhere('da.codigointerno_detalle_activo = ?', $producto->codigo)
                ->Andwhere('da.cantidad_detalle_activo > da.cantidad_nota_credito')
                ->Andwhere('e.nombre_estadofactura = ?', 'Emitida')
                ->setHydrationMode(Doctrine::HYDRATE_ARRAY)
                ->execute();
        $this->datos[] = $producto->codigo;
        $this->datos[] = $producto->descripcion;
        $this->datos[] = $facturas;
    }
    $this->cb = new sfWidgetFormInputCheckbox();
    $this->it = new sfWidgetFormInputText();
    $this->form = new NotaCreditoForm();
    $this->rut_cliente = $rut_cliente;

    $this->date = new sfWidgetFormDate(array(
        'format' => '<b>MES:</b>%month%  <b>AÑO:</b>%year%',
        'can_be_empty' => false
    ));
  }
  
  public function executeCrear2(sfWebRequest $request)
  {
    Doctrine_Manager::getInstance()->setCurrentConnection('artelamp_1');
    $this->detalle_activos = array();
    $this->cb = new sfWidgetFormInputCheckbox();
    $this->it = new sfWidgetFormInputText();
  }
  
  public function executeGuardarproductos(sfWebRequest $request){
      $this->getUser()->setFlash('productos', json_decode($request->getParameter('productos')));
      $this->getUser()->setFlash('rut_cliente', $request->getParameter('rut_cliente'));
      $this->getUser()->setAttribute('empresa', 'artelamp_'.$request->getParameter('empresa'));
      return sfView::NONE;
//      return $this->renderText('listo');
  }
  
  public function executeSearch_cliente(sfWebRequest $request){
      $query = $request->getParameter('query');
      $querys = explode('+',$query);
      $limit=20;

      if(count($querys) < 2){

          $clientes = Doctrine_Core::getTable('Cliente')
                  ->createQuery('a')
                  ->select('a.rut_cliente, a.id_empresa')
                  ->where('a.nombre_cliente LIKE ?','%'.$query.'%')
                  ->orWhere('a.descripcion_cliente LIKE ?','%'.$query.'%')
                  ->orWhere('a.rut_cliente LIKE ?','%'.$query.'%');


      }
      else{
          $clientes = Doctrine_Core::getTable('Cliente')
                  ->createQuery('a')
                  ->select('a.rut_cliente, a.id_empresa');
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

        return $this->renderPartial('notacredito/listcliente', array('clientes' => $clientes));
      }
  }
  
  
  public function executeSearch_producto(sfWebRequest $request){      
      $query = $request->getParameter('query');
      $rut_cliente = $request->getParameter('rut_cliente');
      $empresa = $request->getParameter('empresa');
      Doctrine_Manager::getInstance()->setCurrentConnection('artelamp_'.$empresa);
      $querys = explode('+',$query);
      $limit=10;

      if(count($querys) < 2){

          $productos = Doctrine_Query::create()
                  ->select('DISTINCT a.codigointerno_detalle_activo, a.descripcionexterna_detalle_activo')
                  ->from('DetalleActivo a')
                  ->where('a.codigointerno_detalle_activo LIKE ? OR a.descripcionexterna_detalle_activo LIKE ? OR a.id_producto LIKE ?',array('%'.$query.'%', '%'.$query.'%', '%'.$query.'%')); 
      }
      else{
          $productos = Doctrine_Query::create()
                  ->select('DISTINCT a.codigointerno_detalle_activo, a.descripcionexterna_detalle_activo, a.id_producto')
                  ->from('DetalleActivo a');
          for($j=0;$j<count($querys);$j++){
              $productos = $productos
                  ->where('a.codigointerno_detalle_activo LIKE ? OR a.descripcionexterna_detalle_activo LIKE ? OR a.id_producto LIKE ?',array('%'.$querys[$j].'%', '%'.$querys[$j].'%', '%'.$querys[$j].'%')); 
          }
      }
      
      $productos = $productos->innerJoin('a.Factura f')
              ->Andwhere('f.rut_factura = ?',$rut_cliente);
//      return $this->renderText($productos->getSqlQuery());
      $productos = $productos->limit($limit)->execute(array(), Doctrine_Core::HYDRATE_SCALAR);
      
      
      
      

      if ($request->isXmlHttpRequest())
      {
        if ('' == $query || count($productos)==0)
        {
          return $this->renderText('No hay Resultados...');
        }

        return $this->renderPartial('notacredito/listproducto', array('productos' => $productos));
      }
  }
  
  
  public function executeCrear(sfWebRequest $request)
  {
    Doctrine_Manager::getInstance()->setCurrentConnection('artelamp_1');
    if($request->getParameter('id_factura') != null){
        $this->forward404Unless($factura = Doctrine_Core::getTable('Factura')->find(array($request->getParameter('id_factura'))), sprintf('No se encontro la Factura (%s).', $request->getParameter('id_factura')));

        $this->detalle_activos = Doctrine_Core::getTable('DetalleActivo')
          ->createQuery('a')
          ->Where('a.id_factura = ?', $request->getParameter('id_factura'))
          ->execute();
        $this->cb = new sfWidgetFormInputCheckbox();
        $this->it = new sfWidgetFormInputText();
        $this->form = new NotaCreditoForm();
    }//FALTA EL ELSE
  }
  
  
  public function executeIngresarNC(sfWebRequest $request)
  {
      $this->forward404Unless($request->isMethod(sfRequest::POST));
      Doctrine_Manager::getInstance()->setCurrentConnection('artelamp_1');
      $form = new NotaCreditoForm();
      $id_factura = $request->getParameter('id_factura');
      $id_detalles = json_decode($request->getParameter('id_detalles'));
      
      $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
      
      if ($form->isValid() && count($id_detalles)%2==0){          
          $nota_credito = $form->save();
          $NCF = new NotacreditoFactura();
          $NCF->setNotaCredito($nota_credito);
          $NCF->setIdFactura($id_factura);
          $NCF->save();
          while(list(, $id_detalle) = each($id_detalles)) {
              $detalle_activo = Doctrine_Core::getTable('DetalleActivo')->find($id_detalle);
              list(, $cantidad) = each($id_detalles);
              $detalle_activo->setNotaCredito($nota_credito);
              $detalle_activo->setCantidadNotaCredito($cantidad);
              $detalle_activo->save();              
          }
          return $this->renderText('true');
      }
      return $this->renderText('false');
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
  }
  
  
  public function executeSearch_documento(sfWebRequest $request){
      $query = $request->getParameter('query');
      $empresa = $request->getParameter('empresa');
      Doctrine_Manager::getInstance()->setCurrentConnection('artelamp_'.$empresa);
      $tipodoc = $request->getParameter('tipodoc');
      $limit=10;

      switch ($tipodoc){
          case 33:
              $docs = Doctrine_Core::getTable('Factura')
                  ->createQuery('a')
                  ->select('a.numero_factura, a.fechaemision_factura, a.monto_factura')
                  ->where('a.numero_factura LIKE ?','%'.$query.'%')
                  ->orWhere('a.rut_factura LIKE ?','%'.$query.'%')
                  ->orWhere('a.id_notapedido_factura LIKE ?','%'.$query.'%');
              break;
          case 39:
//              $tipodoc = 'Boleta';
              break;
          case 56:
//              $tipodoc = 'NotaDebito';
              break;
      }


     


      $docs = $docs->limit($limit)->setHydrationMode(Doctrine::HYDRATE_ARRAY)->execute();

      if ($request->isXmlHttpRequest())
      {
        if ('' == $query || count($docs)==0)
        {
          return $this->renderText('No hay Resultados...');
        }

        return $this->renderPartial('notacredito/listdocumento', array('docs' => $docs, 'tipo' => $tipodoc));
      }
  }
  
  
  public function executeIndex(sfWebRequest $request)
  {
    Doctrine_Manager::getInstance()->setCurrentConnection('artelamp_1');
    $this->getUser()->setAttribute('empresa', 'artelamp_1');
    $this->codrefchoice  = new sfWidgetFormChoice(array(
        'choices' => Doctrine_Core::getTable('NotaCredito')->getCodRefs(),
    ));
    $this->tipodocchoice  = new sfWidgetFormChoice(array(
        'choices' => Doctrine_Core::getTable('NotaCredito')->getTipoDoc(),
    ));
  }

  public function executeNew(sfWebRequest $request)
  {
    Doctrine_Manager::getInstance()->setCurrentConnection('artelamp_1');
    $this->form = new NotaCreditoForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    Doctrine_Manager::getInstance()->setCurrentConnection('artelamp_1');
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

        $this->redirect('notacedito/edit?id_nota_credito='.$nota_credito->getIdNotaCredito());
    }    
  }
  protected function isFormValid(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())  return true;
    else return false;   
  }
}
