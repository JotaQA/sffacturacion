<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('Cliente', 'artelamp');

/**
 * BaseCliente
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id_cliente
 * @property string $rut_cliente
 * @property string $nombre_cliente
 * @property string $descripcion_cliente
 * @property string $giro
 * @property integer $tipo_pago
 * @property string $c_pago
 * @property integer $tipo
 * @property integer $id_division
 * @property integer $id_vendedor
 * @property integer $estado_cliente
 * @property string $comentario_cli_eli
 * @property timestamp $fecha_cliente
 * @property float $credito_cliente
 * @property integer $id_empresa
 * 
 * @method integer   getIdCliente()           Returns the current record's "id_cliente" value
 * @method string    getRutCliente()          Returns the current record's "rut_cliente" value
 * @method string    getNombreCliente()       Returns the current record's "nombre_cliente" value
 * @method string    getDescripcionCliente()  Returns the current record's "descripcion_cliente" value
 * @method string    getGiro()                Returns the current record's "giro" value
 * @method integer   getTipoPago()            Returns the current record's "tipo_pago" value
 * @method string    getCPago()               Returns the current record's "c_pago" value
 * @method integer   getTipo()                Returns the current record's "tipo" value
 * @method integer   getIdDivision()          Returns the current record's "id_division" value
 * @method integer   getIdVendedor()          Returns the current record's "id_vendedor" value
 * @method integer   getEstadoCliente()       Returns the current record's "estado_cliente" value
 * @method string    getComentarioCliEli()    Returns the current record's "comentario_cli_eli" value
 * @method timestamp getFechaCliente()        Returns the current record's "fecha_cliente" value
 * @method float     getCreditoCliente()      Returns the current record's "credito_cliente" value
 * @method integer   getIdEmpresa()           Returns the current record's "id_empresa" value
 * @method Cliente   setIdCliente()           Sets the current record's "id_cliente" value
 * @method Cliente   setRutCliente()          Sets the current record's "rut_cliente" value
 * @method Cliente   setNombreCliente()       Sets the current record's "nombre_cliente" value
 * @method Cliente   setDescripcionCliente()  Sets the current record's "descripcion_cliente" value
 * @method Cliente   setGiro()                Sets the current record's "giro" value
 * @method Cliente   setTipoPago()            Sets the current record's "tipo_pago" value
 * @method Cliente   setCPago()               Sets the current record's "c_pago" value
 * @method Cliente   setTipo()                Sets the current record's "tipo" value
 * @method Cliente   setIdDivision()          Sets the current record's "id_division" value
 * @method Cliente   setIdVendedor()          Sets the current record's "id_vendedor" value
 * @method Cliente   setEstadoCliente()       Sets the current record's "estado_cliente" value
 * @method Cliente   setComentarioCliEli()    Sets the current record's "comentario_cli_eli" value
 * @method Cliente   setFechaCliente()        Sets the current record's "fecha_cliente" value
 * @method Cliente   setCreditoCliente()      Sets the current record's "credito_cliente" value
 * @method Cliente   setIdEmpresa()           Sets the current record's "id_empresa" value
 * 
 * @package    sffacturacion
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7691 2011-02-04 15:43:29Z jwage $
 */
abstract class BaseCliente extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('cliente');
        $this->hasColumn('id_cliente', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('rut_cliente', 'string', 50, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 50,
             ));
        $this->hasColumn('nombre_cliente', 'string', 100, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 100,
             ));
        $this->hasColumn('descripcion_cliente', 'string', 500, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 500,
             ));
        $this->hasColumn('giro', 'string', 5000, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 5000,
             ));
        $this->hasColumn('tipo_pago', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('c_pago', 'string', 255, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 255,
             ));
        $this->hasColumn('tipo', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('id_division', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('id_vendedor', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('estado_cliente', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('comentario_cli_eli', 'string', 5000, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 5000,
             ));
        $this->hasColumn('fecha_cliente', 'timestamp', 25, array(
             'type' => 'timestamp',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 25,
             ));
        $this->hasColumn('credito_cliente', 'float', null, array(
             'type' => 'float',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'default' => '0',
             'notnull' => true,
             'autoincrement' => false,
             'length' => '',
             ));
        $this->hasColumn('id_empresa', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 4,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        
    }
}