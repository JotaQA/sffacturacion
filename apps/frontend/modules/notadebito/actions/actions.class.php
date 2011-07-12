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
//    $this->nota_debitos = Doctrine_Core::getTable('NotaDebito')
//      ->createQuery('a')
//      ->execute();
      Doctrine_Manager::getInstance()->setCurrentConnection('artelamp_1');
    $this->detalle_activos = array();
    $this->cb = new sfWidgetFormInputCheckbox();
    $this->it = new sfWidgetFormInputText();
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
