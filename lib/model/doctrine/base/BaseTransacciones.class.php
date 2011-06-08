<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('Transacciones', 'artelamp');

/**
 * BaseTransacciones
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id_transaccion
 * @property string $id_prod
 * @property integer $cantidad
 * @property string $accion
 * @property timestamp $fecha
 * 
 * @method integer       getIdTransaccion()  Returns the current record's "id_transaccion" value
 * @method string        getIdProd()         Returns the current record's "id_prod" value
 * @method integer       getCantidad()       Returns the current record's "cantidad" value
 * @method string        getAccion()         Returns the current record's "accion" value
 * @method timestamp     getFecha()          Returns the current record's "fecha" value
 * @method Transacciones setIdTransaccion()  Sets the current record's "id_transaccion" value
 * @method Transacciones setIdProd()         Sets the current record's "id_prod" value
 * @method Transacciones setCantidad()       Sets the current record's "cantidad" value
 * @method Transacciones setAccion()         Sets the current record's "accion" value
 * @method Transacciones setFecha()          Sets the current record's "fecha" value
 * 
 * @package    sffacturacion
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseTransacciones extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('transacciones');
        $this->hasColumn('id_transaccion', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('id_prod', 'string', 50, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 50,
             ));
        $this->hasColumn('cantidad', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('accion', 'string', 500, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 500,
             ));
        $this->hasColumn('fecha', 'timestamp', 25, array(
             'type' => 'timestamp',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 25,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        
    }
}