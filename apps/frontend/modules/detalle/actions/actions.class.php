<?php

/**
 * detalle actions.
 *
 * @package    sffacturacion
 * @subpackage detalle
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class detalleActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->detalle_activos = Doctrine_Core::getTable('DetalleActivo')
      ->createQuery('a')
      ->execute();
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new DetalleActivoForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new DetalleActivoForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($detalle_activo = Doctrine_Core::getTable('DetalleActivo')->find(array($request->getParameter('id_detalle_activo'))), sprintf('Object detalle_activo does not exist (%s).', $request->getParameter('id_detalle_activo')));
    $this->form = new DetalleActivoForm($detalle_activo);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($detalle_activo = Doctrine_Core::getTable('DetalleActivo')->find(array($request->getParameter('id_detalle_activo'))), sprintf('Object detalle_activo does not exist (%s).', $request->getParameter('id_detalle_activo')));
    $this->form = new DetalleActivoForm($detalle_activo);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($detalle_activo = Doctrine_Core::getTable('DetalleActivo')->find(array($request->getParameter('id_detalle_activo'))), sprintf('Object detalle_activo does not exist (%s).', $request->getParameter('id_detalle_activo')));
    $detalle_activo->delete();

    $this->redirect('detalle/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $detalle_activo = $form->save();

      $this->redirect('detalle/edit?id_detalle_activo='.$detalle_activo->getIdDetalleActivo());
    }
  }
}
