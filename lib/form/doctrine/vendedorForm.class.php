<?php

/**
 * Usuarios form.
 *
 * @package    sffacturacion
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class vendedorForm extends BaseForm
{
  public function configure()
  {
      $q = Doctrine_Core::getTable('Usuarios')
      ->createQuery('a')
      ->where('a.vendedor = ?',1);

      $this->setWidgets(array(
      'vendedor'    => new sfWidgetFormDoctrineChoice(array(
            'model'     => 'Usuarios',
            'add_empty' => 'Todos',
            'query' => $q
        ))
    ));

      $this->widgetSchema->setLabels(array(
          'vendedor'    => '<b>VENDEDOR</b>',
      ));

//      $this->widgetSchema['vendedor']->setAttributes(array('onChange'=>'buscarfecha()'));

//      $this->widgetSchema->setNameFormat('fecha[%s]');
  }
}
