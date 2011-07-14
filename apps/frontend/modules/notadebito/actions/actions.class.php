<?php

/**
 * notadebito actions.
 *
 * @package    sffacturacion
 * @subpackage notadebito
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class notadebitoActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {

  }
  
  public function executeSearch_cliente(sfWebRequest $request){
      $query = $request->getParameter('query');
      $querys = explode('+',$query);
      $limit=20;

      if(count($querys) < 2){

          $clientes = Doctrine_Core::getTable('Cliente')
                  ->createQuery('a')
                  ->select('a.rut_cliente, a.id_empresa, a.nombre_cliente')
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

      $clientes = $clientes->setHydrationMode(Doctrine::HYDRATE_NONE)->limit($limit)->execute();

      if ($request->isXmlHttpRequest())
      {
        if ('' == $query || count($clientes)==0)
        {
          return $this->renderText('No hay Resultados...');
        }

        return $this->renderPartial('notadebito/listcliente', array('clientes' => $clientes));
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

        return $this->renderPartial('notadebito/listproducto', array('productos' => $productos));
      }
  }
  
  public function executeGuardarproductos(sfWebRequest $request){
      $this->getUser()->setFlash('productos', json_decode($request->getParameter('productos')));
      $this->getUser()->setFlash('rut_cliente', $request->getParameter('rut_cliente'));
      $this->getUser()->setAttribute('empresa', 'artelamp_'.$request->getParameter('empresa'));
      return sfView::NONE;
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
                ->select('a.id_factura, a.numero_factura, a.fechaemision_factura, a.tipo_factura, a.monto_factura, a.id_notapedido_factura, da.cantidad_detalle_activo-da.cantidad_nota_debito as cantidad_detalle_activo, da.cantidad_nota_debito, da.precio_detalle_activo')
                ->from('Factura a')
                ->where('a.rut_factura = ?', $rut_cliente)
                ->Andwhere('YEAR(a.fechaemision_factura) = ?', date('Y'))
                ->Andwhere('MONTH(a.fechaemision_factura) = ?', date('m'))
                ->innerJoin('a.DetalleActivo da')
                ->innerJoin('a.EstadoFactura e')
                ->Andwhere('da.codigointerno_detalle_activo = ?', $producto->codigo)
                ->Andwhere('da.cantidad_detalle_activo > da.cantidad_nota_debito')
                ->Andwhere('e.nombre_estadofactura = ?', 'Emitida')
                ->setHydrationMode(Doctrine::HYDRATE_ARRAY)
                ->execute();
        $this->datos[] = $producto->codigo;
        $this->datos[] = $producto->descripcion;
        $this->datos[] = $facturas;
    }
    $this->cb = new sfWidgetFormInputCheckbox();
    $this->it = new sfWidgetFormInputText();
    $this->form = new NotaDebitoForm();
    $this->rut_cliente = $rut_cliente;

    $this->date = new sfWidgetFormDate(array(
        'format' => '<b>MES:</b>%month%  <b>AÑO:</b>%year%',
        'can_be_empty' => false
    ));
  }
  
  public function executeGetFactura(sfWebRequest $request)
  {
      $empresa = $this->getUser()->getAttribute('empresa', 'artelamp_1');
      Doctrine_Manager::getInstance()->setCurrentConnection($empresa);
      $id_factura = $request->getParameter('id_factura');
      $factura = Doctrine_Core::getTable('Factura')->find($id_factura);
      return $this->renderText(json_encode($factura->toArray()));
  }
  
  public function executeIngresarND(sfWebRequest $request)
  {
      $this->forward404Unless($request->isMethod(sfRequest::POST));
      $empresa = $this->getUser()->getAttribute('empresa', 'artelamp_1');
      Doctrine_Manager::getInstance()->setCurrentConnection($empresa);
      $form = new NotaDebitoForm();

      
      $datos = json_decode($request->getParameter('datos'));
      //SI NO HAY DATOS RETORNA ERROR
      if($datos == null || count($datos) == 0 || count($datos)%3 != 0) return $this->renderText('Datos invalidos o corruptos');
      //CAMBIAMOS EL FORMATO DE LA FECHA
      $values = $request->getParameter($form->getName());
      $fecha = $values['fechaemision_nota_debito'];
      list($dia,$mes,$año)=explode("/", $fecha);
      $fecha = date("Y-m-d",mktime(0,0,0, $mes,$dia,$año));
      $values['fechaemision_nota_debito'] = $fecha;
      
      $form->bind($values, $request->getFiles($form->getName()));
      
      if ($form->isValid()){
          //SE PUEDEN PRODUCIR ERRORES, SE USA ROLLBACK
          $conn = Doctrine_Manager::getInstance()->getCurrentConnection();
          try{
              $msgerr = false;
              //INICIO DE LA TRANSACCION
              $conn->beginTransaction();
              
              //EN EL MODELO SE CONFIGURA LA FECHA ACTUAL Y EL ESTADO
              $nota_debito = $form->save();
              

              while(list(, $codigo) = each($datos)) {
                  list(, $id_factura) = each($datos);
                  list(, $cantidad) = each($datos);
                  //UNIMOS LA NC CON EL DETALLE
                  $NDD = new NotadebitoDetalle();
                  $NDD->setNotaDebito($nota_debito);
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
                  $NDD->setDetalleActivo($detalle_activo);
                  //LA CANTIDAD
                  $detalle_activo->setCantidadNotaDebito($cantidad+$detalle_activo->getCantidadNotaDebito());
                  //GUARDAMOS
                  $detalle_activo->save();
                  $NDD->save();
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
  
  public function executeFacturasByfecha(sfWebRequest $request)
  {
      $empresa = $this->getUser()->getAttribute('empresa', 'artelamp_1');
      Doctrine_Manager::getInstance()->setCurrentConnection($empresa);
      $mes = $request->getParameter('mes');
      $año = $request->getParameter('año');
      $codigo = $request->getParameter('codigo');
      $rut_cliente = $request->getParameter('rut_cliente');
      $facturas = Doctrine_Query::create()
            ->select('a.id_factura, a.numero_factura, DATE_FORMAT(a.fechaemision_factura, "%d/%m/%Y" ) as fechaemision_factura , a.tipo_factura, FORMAT(a.monto_factura,"es_CL") as monto_factura, a.id_notapedido_factura, da.cantidad_detalle_activo-da.cantidad_nota_debito as cantidad_detalle_activo, da.cantidad_nota_debito, da.precio_detalle_activo')
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
  
  public function executeVerificarnumND(sfWebRequest $request)
  {
      $empresa = $this->getUser()->getAttribute('empresa', 'artelamp_1');
      Doctrine_Manager::getInstance()->setCurrentConnection($empresa);
      $numeroND = $request->getParameter('numeroND');
      $ND = Doctrine_Core::getTable('NotaDebito')->findOneByNumeroNotaDebito($numeroND);
      if($ND == null) return $this->renderText('false');
      else return $this->renderText('true');
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->nota_debito = Doctrine_Core::getTable('NotaDebito')->find(array($request->getParameter('id_nota_debito')));
    $this->forward404Unless($this->nota_debito);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new NotaDebitoForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new NotaDebitoForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($nota_debito = Doctrine_Core::getTable('NotaDebito')->find(array($request->getParameter('id_nota_debito'))), sprintf('Object nota_debito does not exist (%s).', $request->getParameter('id_nota_debito')));
    $this->form = new NotaDebitoForm($nota_debito);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($nota_debito = Doctrine_Core::getTable('NotaDebito')->find(array($request->getParameter('id_nota_debito'))), sprintf('Object nota_debito does not exist (%s).', $request->getParameter('id_nota_debito')));
    $this->form = new NotaDebitoForm($nota_debito);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($nota_debito = Doctrine_Core::getTable('NotaDebito')->find(array($request->getParameter('id_nota_debito'))), sprintf('Object nota_debito does not exist (%s).', $request->getParameter('id_nota_debito')));
    $nota_debito->delete();

    $this->redirect('notadebito/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $nota_debito = $form->save();

      $this->redirect('notadebito/edit?id_nota_debito='.$nota_debito->getIdNotaDebito());
    }
  }
}
