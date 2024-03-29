<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('Stock', 'artelamp');

/**
 * BaseStock
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id_stock
 * @property integer $tipo
 * @property string $id_activo
 * @property integer $stock_actual
 * @property integer $por_despachar
 * @property integer $stock_reservado
 * @property integer $faltan
 * @property integer $precio_lista
 * @property timestamp $fecha_precio
 * @property float $descuento
 * @property timestamp $fecha_descuento
 * @property integer $seguridad
 * @property integer $promedio
 * @property string $comentario_stock
 * 
 * @method integer   getIdStock()          Returns the current record's "id_stock" value
 * @method integer   getTipo()             Returns the current record's "tipo" value
 * @method string    getIdActivo()         Returns the current record's "id_activo" value
 * @method integer   getStockActual()      Returns the current record's "stock_actual" value
 * @method integer   getPorDespachar()     Returns the current record's "por_despachar" value
 * @method integer   getStockReservado()   Returns the current record's "stock_reservado" value
 * @method integer   getFaltan()           Returns the current record's "faltan" value
 * @method integer   getPrecioLista()      Returns the current record's "precio_lista" value
 * @method timestamp getFechaPrecio()      Returns the current record's "fecha_precio" value
 * @method float     getDescuento()        Returns the current record's "descuento" value
 * @method timestamp getFechaDescuento()   Returns the current record's "fecha_descuento" value
 * @method integer   getSeguridad()        Returns the current record's "seguridad" value
 * @method integer   getPromedio()         Returns the current record's "promedio" value
 * @method string    getComentarioStock()  Returns the current record's "comentario_stock" value
 * @method Stock     setIdStock()          Sets the current record's "id_stock" value
 * @method Stock     setTipo()             Sets the current record's "tipo" value
 * @method Stock     setIdActivo()         Sets the current record's "id_activo" value
 * @method Stock     setStockActual()      Sets the current record's "stock_actual" value
 * @method Stock     setPorDespachar()     Sets the current record's "por_despachar" value
 * @method Stock     setStockReservado()   Sets the current record's "stock_reservado" value
 * @method Stock     setFaltan()           Sets the current record's "faltan" value
 * @method Stock     setPrecioLista()      Sets the current record's "precio_lista" value
 * @method Stock     setFechaPrecio()      Sets the current record's "fecha_precio" value
 * @method Stock     setDescuento()        Sets the current record's "descuento" value
 * @method Stock     setFechaDescuento()   Sets the current record's "fecha_descuento" value
 * @method Stock     setSeguridad()        Sets the current record's "seguridad" value
 * @method Stock     setPromedio()         Sets the current record's "promedio" value
 * @method Stock     setComentarioStock()  Sets the current record's "comentario_stock" value
 * 
 * @package    sffacturacion
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseStock extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('stock');
        $this->hasColumn('id_stock', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
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
        $this->hasColumn('id_activo', 'string', 50, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 50,
             ));
        $this->hasColumn('stock_actual', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('por_despachar', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('stock_reservado', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('faltan', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('precio_lista', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'default' => '1',
             'notnull' => true,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('fecha_precio', 'timestamp', 25, array(
             'type' => 'timestamp',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 25,
             ));
        $this->hasColumn('descuento', 'float', null, array(
             'type' => 'float',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => '',
             ));
        $this->hasColumn('fecha_descuento', 'timestamp', 25, array(
             'type' => 'timestamp',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 25,
             ));
        $this->hasColumn('seguridad', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'default' => '0',
             'notnull' => true,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('promedio', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'default' => '0',
             'notnull' => true,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('comentario_stock', 'string', 5000, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 5000,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        
    }
}