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
      Doctrine_Manager::getInstance()->setCurrentConnection('artelamp_1');
    $this->getUser()->setAttribute('empresa', 'artelamp_1');
    $this->codrefchoice  = new sfWidgetFormChoice(array(
        'choices' => Doctrine_Core::getTable('NotaDebito')->getCodRefs(),
    ));
    $this->tipodocchoice  = new sfWidgetFormChoice(array(
        'choices' => Doctrine_Core::getTable('NotaDebito')->getTipoDoc(),
    ));
    $this->form = new NotaDebitoForm();
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
}
