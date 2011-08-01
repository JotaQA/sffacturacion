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
    $this->form = new NotaCreditoForm();
  }
  
  public function executeGetDocumento(sfWebRequest $request)
  {
      $empresa = $request->getParameter('empresa');
      Doctrine_Manager::getInstance()->setCurrentConnection('artelamp_'.$empresa);
      $id_doc = $request->getParameter('id_doc');
      $tipodoc = $request->getParameter('tipodoc');
      
      switch ($tipodoc){
          case 33:
              $docs = Doctrine_Core::getTable('Factura')->find($id_doc);
              break;
          case 39:
//              $tipodoc = 'Boleta';
              break;
          case 56:
//              $tipodoc = 'NotaDebito';
              break;
      }
      if($docs != null) return $this->renderText(json_encode($docs->toArray()));
      else $this->renderText('null');
  }
  
  public function executeDocumentosByproducto(sfWebRequest $request)
  {
      $empresa = 'artelamp_'.$request->getParameter('empresa');
      Doctrine_Manager::getInstance()->setCurrentConnection($empresa);
      $codproducto = $request->getParameter('codproducto');
      $rut_cliente = $request->getParameter('rut_cliente');
      $tipodoc = $request->getParameter('tipodoc');
      
      switch ($tipodoc){
          case 33:
              $docs = Doctrine_Core::getTable('Factura')
                  ->createQuery('a')
                  ->select('a.id_factura, a.numero_factura, a.fechaemision_factura')
                  ->where('a.rut_factura = ?',$rut_cliente)
                  ->innerJoin('a.DetalleActivo da')
                  ->Andwhere('da.codigointerno_detalle_activo = ?', $codproducto);
              break;
          case 39:
//              $tipodoc = 'Boleta';
              break;
          case 56:
//              $tipodoc = 'NotaDebito';
              break;
      }
      $docs = $docs->setHydrationMode(Doctrine::HYDRATE_ARRAY)->execute();
      return $this->renderText(json_encode($docs));
  }
  
  public function executeProductoBydocumento(sfWebRequest $request){
      $empresa = 'artelamp_'.$request->getParameter('empresa');
      Doctrine_Manager::getInstance()->setCurrentConnection($empresa);
      $iddoc = $request->getParameter('iddoc');
      $tipodoc = $request->getParameter('tipodoc');
      
      switch ($tipodoc){
          case 33:
              $productos = Doctrine_Query::create()
                  ->select('a.id_detalle_activo, a.codigointerno_detalle_activo, a.descripcionexterna_detalle_activo, a.cantidad_detalle_activo, a.precio_detalle_activo')
                  ->from('DetalleActivo a')
                  ->innerJoin('a.Factura f')
                  ->Where('f.id_factura = ?', $iddoc);
              break;
          case 39:
//              $tipodoc = 'Boleta';
              break;
          case 56:
//              $tipodoc = 'NotaDebito';
              break;
      }
      $productos = $productos->setHydrationMode(Doctrine::HYDRATE_ARRAY)->execute();
      return $this->renderText(json_encode($productos));
  }
  
  public function executeProductoBycodigoBydocumento(sfWebRequest $request){
      $empresa = 'artelamp_'.$request->getParameter('empresa');
      Doctrine_Manager::getInstance()->setCurrentConnection($empresa);
      $codproducto = $request->getParameter('codproducto');
      $numdoc = $request->getParameter('numdoc');
      $tipodoc = $request->getParameter('tipodoc');
      
      switch ($tipodoc){
          case 33:
              $productos = Doctrine_Query::create()
                  ->select('a.id_detalle_activo, a.codigointerno_detalle_activo, a.descripcionexterna_detalle_activo, a.cantidad_detalle_activo, a.precio_detalle_activo')
                  ->from('DetalleActivo a')
                  ->where('a.codigointerno_detalle_activo = ?', $codproducto)
                  ->innerJoin('a.Factura f')
                  ->AndWhere('f.numero_factura = ?', $numdoc);
              break;
          case 39:
//              $tipodoc = 'Boleta';
              break;
          case 56:
//              $tipodoc = 'NotaDebito';
              break;
      }
      $productos = $productos->setHydrationMode(Doctrine::HYDRATE_ARRAY)->execute();
      return $this->renderText(json_encode($productos[0]));
  }
  
  public function executeSearch_cliente(sfWebRequest $request){
      $query = $request->getParameter('query');
      $querys = explode('+',$query);
      $limit=20;

      if(count($querys) < 2){

          $clientes = Doctrine_Core::getTable('Cliente')
                  ->createQuery('a')
                  ->select('a.rut_cliente, a.nombre_cliente, a.id_empresa')
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

      $clientes = $clientes->limit($limit)->setHydrationMode(Doctrine::HYDRATE_NONE)->execute();

      if ($request->isXmlHttpRequest())
      {
        if ('' == $query || count($clientes)==0)
        {
          return $this->renderText('No hay Resultados...');
        }

        return $this->renderPartial('notacredito/listcliente', array('clientes' => $clientes));
      }
  }
  
  
  public function executeSearch_documento(sfWebRequest $request){
      $query = $request->getParameter('query');
      $empresa = $request->getParameter('empresa');
      Doctrine_Manager::getInstance()->setCurrentConnection('artelamp_'.$empresa);
      $tipodoc = $request->getParameter('tipodoc');
      $rut_cliente = $request->getParameter('rut_cliente');
      
      $limit=10;

      switch ($tipodoc){
          case 33:
              $docs = Doctrine_Core::getTable('Factura')
                  ->createQuery('a')
                  ->select('a.id_factura, a.numero_factura, a.fechaemision_factura, a.monto_factura')
                  ->where('a.rut_factura = ?',$rut_cliente)
                  ->andWhere('a.numero_factura LIKE ? OR a.id_notapedido_factura LIKE ?',array('%'.$query.'%', '%'.$query.'%'));
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
  
  public function executeSearch_producto(sfWebRequest $request){      
      $query = $request->getParameter('query');
      $rut_cliente = $request->getParameter('rut_cliente');
      $tipodoc = $request->getParameter('tipodoc');
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
      
      switch ($tipodoc){
          case 33:
              $productos = $productos->innerJoin('a.Factura f')
                    ->Andwhere('f.rut_factura = ?',$rut_cliente);
              break;
          case 39:
//              $tipodoc = 'Boleta';
              break;
          case 56:
//              $tipodoc = 'NotaDebito';
              break;
      }
      
      $productos = $productos->limit($limit)->execute(array(), Doctrine_Core::HYDRATE_ARRAY);
      
      
      
      

      if ($request->isXmlHttpRequest())
      {
        if ('' == $query || count($productos)==0)
        {
          return $this->renderText('No hay Resultados...');
        }

        return $this->renderPartial('notacredito/listproducto', array('productos' => $productos));
      }
  }
  
  public function executeVerificarnumNC(sfWebRequest $request)
  {
      $empresa = $request->getParameter('empresa');
      Doctrine_Manager::getInstance()->setCurrentConnection('artelamp_'.$empresa);
      $numeroNC = $request->getParameter('numeroNC');
      $NC = Doctrine_Core::getTable('NotaCredito')->findOneByNumeroNotaCredito($numeroNC);
      if($NC == null) return $this->renderText('false');
      else return $this->renderText('true');
  }
  
  public function executeIngresarNC(sfWebRequest $request)
  {
      $this->forward404Unless($request->isMethod(sfRequest::POST));
      $empresa = $request->getParameter('empresa');
      Doctrine_Manager::getInstance()->setCurrentConnection('artelamp_'.$empresa);
      $form = new NotaCreditoForm();

      
      $documentos = json_decode($request->getParameter('documentosjson'));
      $productos = json_decode($request->getParameter('productosjson'));
      $tipodoc = $request->getParameter('tipodoc');
      $codref = $request->getParameter('codref');
      $razon = $request->getParameter('razon');
      $glosa = $request->getParameter('glosa');
      //SI NO HAY DATOS RETORNA ERROR
      if(
              $documentos == null ||
              $productos == null || 
              $tipodoc == null || 
              $razon == null || 
              count($documentos) == 0 || 
              count($productos) == 0 
              ) return $this->renderText('Datos invalidos o corruptos');
      //CAMBIAMOS EL FORMATO DE LA FECHA
      $values = $request->getParameter($form->getName());
      $fecha = $values['fechaemision_nota_credito'];
      list($dia,$mes,$año)=explode("/", $fecha);
      $fecha = date("Y-m-d",mktime(0,0,0, $mes,$dia,$año));
      $values['fechaemision_nota_credito'] = $fecha;
      $values['razon_nota_credito'] = $razon;
      $values['glosa_nota_credito'] = $glosa;//PARCHADO EN EL MODEL, SI ES VACIO
      
      $form->bind($values, $request->getFiles($form->getName()));
      
      if($form->isValid()){
          //SE PUEDEN PRODUCIR ERRORES, SE USA ROLLBACK
          $conn = Doctrine_Manager::getInstance()->getCurrentConnection();
          try{
              $msgerr = false;
              //INICIO DE LA TRANSACCION
              $conn->beginTransaction();
              
              //EN EL MODELO SE CONFIGURA LA FECHA ACTUAL Y EL ESTADO
              $nota_credito = $form->save();
              
              switch ($tipodoc){
                  case 33:
                      foreach ($documentos as $documento){
                          $ref_documento = new ReferenciaDocumento();
                          $ref_documento->setIdFactura($documento->id);
                          $ref_documento->setIdNotaCredito($nota_credito->getIdNotaCredito());
                          $ref_documento->setDocumentoFinal(4);
                          $ref_documento->save();
                      }
                  break;
              }
              
              
              foreach ($productos as $producto){
                  $detalle_activo = new DetalleActivo();
                  $detalle_activo->setNotaCredito($nota_credito);
                  $detalle_activo->setCodigointernoDetalleActivo($producto->codigo);
                  $detalle_activo->setCodigoexternoDetalleActivo($producto->codigo);
                  $detalle_activo->setCantidadDetalleActivo($producto->cantidad);
                  $detalle_activo->setPrecioDetalleActivo($producto->precio);
                  $detalle_activo->setFechaingresoDetalleActivo(date('Y-m-d'));
                  $detalle_activo->setDescripcionexternaDetalleActivo($producto->descripcion);
                  $detalle_activo->setDescripcioninternaDetalleActivo($producto->descripcion);
                  $detalle_activo->save();
                  
                  $ref_detalle = new ReferenciaDetalle();
                  $ref_detalle->setIdDetalleActivo1($producto->id);
                  $ref_detalle->setIdDetalleActivo2($detalle_activo->getIdDetalleActivo());
                  $ref_detalle->save();
              }
              //SI TODO VA BIEN SE GUARDA
              $conn->commit();
              return $this->renderText('true');
          }          
          catch (Exception $e){
              //SI OCURRE UN ERROR NO SE GUARDA NADA
              $conn->rollBack();
              return $this->renderText('Error al procesar los datos: '.$e->getMessage());
          }
          
      }
      return $this->renderText('Formulario invalido');
  }
  
}
