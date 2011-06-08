<?php

/**
 * Usuarios form.
 *
 * @package    sffacturacion
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class empresabdForm extends BaseEmpresaForm
{
  public function configure()
  {
      $this->useFields(array('nombre_empresa'));
      $this->widgetSchema['nombre_empresa'] = new sfWidgetFormDoctrineChoice(array(
            'model'     => 'Empresa',
        ));

//      $q = Doctrine_Core::getTable('Usuarios')
//      ->createQuery('a')
//      ->where('a.vendedor = ?',1);
//
//      $this->setWidgets(array(
//      'vendedor'    => new sfWidgetFormDoctrineChoice(array(
//            'model'     => 'Usuarios',
//            'add_empty' => 'Todos',
//            'query' => $q
//        ))
//    ));
//
//      $this->widgetSchema->setLabels(array(
//          'vendedor'    => '<b>VENDEDOR</b>',
//      ));

//      $this->widgetSchema['nombre_empresa']->setAttributes(array('onChange'=>'buscarEmpresa()'));
      $this->widgetSchema['nombre_empresa']->setAttributes(array('onChange'=>$this->getOption('buscarEmpresa')));
//      $this->widgetSchema['nombre_empresa']->setAttributes(array('onChange'=>$this->getOption('buscarEmpresa')));


      $empresa = explode('_',$this->getOption('empresa'));
      $id_empresa = (int)$empresa[1]-1;
      $this->setDefaults(array(
		'nombre_empresa' => $id_empresa
	));

//      $this->widgetSchema->setNameFormat('fecha[%s]');
  }
}
