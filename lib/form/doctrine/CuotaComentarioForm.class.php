<?php

/**
 * Cuota form.
 *
 * @package    sffacturacion
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class CuotaComentarioForm extends BaseCuotaForm
{
  public function configure()
  {
      $this->useFields(array('comentario_cuota'));
      $this->widgetSchema['comentario_cuota']->setAttributes(array('rows'=>'10', 'cols'=>'40'));
  }
}
