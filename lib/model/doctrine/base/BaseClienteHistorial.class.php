<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('ClienteHistorial', 'artelamp');

/**
 * BaseClienteHistorial
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id_cliente_historial
 * @property string $rut
 * @property string $usuario
 * @property string $dato
 * @property timestamp $fecha_modificacion
 * 
 * @method integer          getIdClienteHistorial()   Returns the current record's "id_cliente_historial" value
 * @method string           getRut()                  Returns the current record's "rut" value
 * @method string           getUsuario()              Returns the current record's "usuario" value
 * @method string           getDato()                 Returns the current record's "dato" value
 * @method timestamp        getFechaModificacion()    Returns the current record's "fecha_modificacion" value
 * @method ClienteHistorial setIdClienteHistorial()   Sets the current record's "id_cliente_historial" value
 * @method ClienteHistorial setRut()                  Sets the current record's "rut" value
 * @method ClienteHistorial setUsuario()              Sets the current record's "usuario" value
 * @method ClienteHistorial setDato()                 Sets the current record's "dato" value
 * @method ClienteHistorial setFechaModificacion()    Sets the current record's "fecha_modificacion" value
 * 
 * @package    sffacturacion
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7691 2011-02-04 15:43:29Z jwage $
 */
abstract class BaseClienteHistorial extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('cliente_historial');
        $this->hasColumn('id_cliente_historial', 'integer', 8, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => true,
             'primary' => true,
             'autoincrement' => true,
             'length' => 8,
             ));
        $this->hasColumn('rut', 'string', 11, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 11,
             ));
        $this->hasColumn('usuario', 'string', 50, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 50,
             ));
        $this->hasColumn('dato', 'string', 5000, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 5000,
             ));
        $this->hasColumn('fecha_modificacion', 'timestamp', 25, array(
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