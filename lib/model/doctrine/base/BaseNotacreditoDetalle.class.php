<?php
// Connection Component Binding
//Doctrine_Manager::getInstance()->bindComponent('NotacreditoDetalle', 'artelamp_1');

/**
 * BaseNotacreditoDetalle
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id_detalle_activo
 * @property integer $id_nota_credito
 * @property NotaCredito $NotaCredito
 * @property DetalleActivo $DetalleActivo
 * 
 * @method integer            getIdDetalleActivo()   Returns the current record's "id_detalle_activo" value
 * @method integer            getIdNotaCredito()     Returns the current record's "id_nota_credito" value
 * @method NotaCredito        getNotaCredito()       Returns the current record's "NotaCredito" value
 * @method DetalleActivo      getDetalleActivo()     Returns the current record's "DetalleActivo" value
 * @method NotacreditoDetalle setIdDetalleActivo()   Sets the current record's "id_detalle_activo" value
 * @method NotacreditoDetalle setIdNotaCredito()     Sets the current record's "id_nota_credito" value
 * @method NotacreditoDetalle setNotaCredito()       Sets the current record's "NotaCredito" value
 * @method NotacreditoDetalle setDetalleActivo()     Sets the current record's "DetalleActivo" value
 * 
 * @package    sffacturacion
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseNotacreditoDetalle extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('notacredito_detalle');
        $this->hasColumn('id_detalle_activo', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('id_nota_credito', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => false,
             'length' => 4,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('NotaCredito', array(
             'local' => 'id_nota_credito',
             'foreign' => 'id_nota_credito'));

        $this->hasOne('DetalleActivo', array(
             'local' => 'id_detalle_activo',
             'foreign' => 'id_detalle_activo'));
    }
}