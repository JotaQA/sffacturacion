<?php
// Connection Component Binding
//Doctrine_Manager::getInstance()->bindComponent('DetalleActivo', 'artelamp_1');

/**
 * BaseDetalleActivo
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id_detalle_activo
 * @property integer $id_boleta
 * @property integer $id_factura
 * @property integer $id_guia
 * @property integer $id_salida
 * @property integer $id_salida_ac
 * @property string $codigointerno_detalle_activo
 * @property string $codigoexterno_detalle_activo
 * @property integer $cantidad_detalle_activo
 * @property integer $cantidad_nota_credito
 * @property integer $precio_detalle_activo
 * @property timestamp $fechaingreso_detalle_activo
 * @property string $id_producto
 * @property string $descripcioninterna_detalle_activo
 * @property string $descripcionexterna_detalle_activo
 * @property Guia $Guia
 * @property Boleta $Boleta
 * @property Factura $Factura
 * @property Doctrine_Collection $NotacreditoDetalle
 * 
 * @method integer             getIdDetalleActivo()                   Returns the current record's "id_detalle_activo" value
 * @method integer             getIdBoleta()                          Returns the current record's "id_boleta" value
 * @method integer             getIdFactura()                         Returns the current record's "id_factura" value
 * @method integer             getIdGuia()                            Returns the current record's "id_guia" value
 * @method integer             getIdSalida()                          Returns the current record's "id_salida" value
 * @method integer             getIdSalidaAc()                        Returns the current record's "id_salida_ac" value
 * @method string              getCodigointernoDetalleActivo()        Returns the current record's "codigointerno_detalle_activo" value
 * @method string              getCodigoexternoDetalleActivo()        Returns the current record's "codigoexterno_detalle_activo" value
 * @method integer             getCantidadDetalleActivo()             Returns the current record's "cantidad_detalle_activo" value
 * @method integer             getCantidadNotaCredito()               Returns the current record's "cantidad_nota_credito" value
 * @method integer             getPrecioDetalleActivo()               Returns the current record's "precio_detalle_activo" value
 * @method timestamp           getFechaingresoDetalleActivo()         Returns the current record's "fechaingreso_detalle_activo" value
 * @method string              getIdProducto()                        Returns the current record's "id_producto" value
 * @method string              getDescripcioninternaDetalleActivo()   Returns the current record's "descripcioninterna_detalle_activo" value
 * @method string              getDescripcionexternaDetalleActivo()   Returns the current record's "descripcionexterna_detalle_activo" value
 * @method Guia                getGuia()                              Returns the current record's "Guia" value
 * @method Boleta              getBoleta()                            Returns the current record's "Boleta" value
 * @method Factura             getFactura()                           Returns the current record's "Factura" value
 * @method Doctrine_Collection getNotacreditoDetalle()                Returns the current record's "NotacreditoDetalle" collection
 * @method DetalleActivo       setIdDetalleActivo()                   Sets the current record's "id_detalle_activo" value
 * @method DetalleActivo       setIdBoleta()                          Sets the current record's "id_boleta" value
 * @method DetalleActivo       setIdFactura()                         Sets the current record's "id_factura" value
 * @method DetalleActivo       setIdGuia()                            Sets the current record's "id_guia" value
 * @method DetalleActivo       setIdSalida()                          Sets the current record's "id_salida" value
 * @method DetalleActivo       setIdSalidaAc()                        Sets the current record's "id_salida_ac" value
 * @method DetalleActivo       setCodigointernoDetalleActivo()        Sets the current record's "codigointerno_detalle_activo" value
 * @method DetalleActivo       setCodigoexternoDetalleActivo()        Sets the current record's "codigoexterno_detalle_activo" value
 * @method DetalleActivo       setCantidadDetalleActivo()             Sets the current record's "cantidad_detalle_activo" value
 * @method DetalleActivo       setCantidadNotaCredito()               Sets the current record's "cantidad_nota_credito" value
 * @method DetalleActivo       setPrecioDetalleActivo()               Sets the current record's "precio_detalle_activo" value
 * @method DetalleActivo       setFechaingresoDetalleActivo()         Sets the current record's "fechaingreso_detalle_activo" value
 * @method DetalleActivo       setIdProducto()                        Sets the current record's "id_producto" value
 * @method DetalleActivo       setDescripcioninternaDetalleActivo()   Sets the current record's "descripcioninterna_detalle_activo" value
 * @method DetalleActivo       setDescripcionexternaDetalleActivo()   Sets the current record's "descripcionexterna_detalle_activo" value
 * @method DetalleActivo       setGuia()                              Sets the current record's "Guia" value
 * @method DetalleActivo       setBoleta()                            Sets the current record's "Boleta" value
 * @method DetalleActivo       setFactura()                           Sets the current record's "Factura" value
 * @method DetalleActivo       setNotacreditoDetalle()                Sets the current record's "NotacreditoDetalle" collection
 * 
 * @package    sffacturacion
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseDetalleActivo extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('detalle_activo');
        $this->hasColumn('id_detalle_activo', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('id_boleta', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('id_factura', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('id_guia', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('id_salida', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('id_salida_ac', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('codigointerno_detalle_activo', 'string', 64, array(
             'type' => 'string',
             'fixed' => 1,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 64,
             ));
        $this->hasColumn('codigoexterno_detalle_activo', 'string', 64, array(
             'type' => 'string',
             'fixed' => 1,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 64,
             ));
        $this->hasColumn('cantidad_detalle_activo', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('cantidad_nota_credito', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('precio_detalle_activo', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('fechaingreso_detalle_activo', 'timestamp', 25, array(
             'type' => 'timestamp',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 25,
             ));
        $this->hasColumn('id_producto', 'string', 50, array(
             'type' => 'string',
             'fixed' => 1,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 50,
             ));
        $this->hasColumn('descripcioninterna_detalle_activo', 'string', 512, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 512,
             ));
        $this->hasColumn('descripcionexterna_detalle_activo', 'string', 512, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 512,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Guia', array(
             'local' => 'id_guia',
             'foreign' => 'id_guia'));

        $this->hasOne('Boleta', array(
             'local' => 'id_boleta',
             'foreign' => 'id_boleta'));

        $this->hasOne('Factura', array(
             'local' => 'id_factura',
             'foreign' => 'id_factura'));

        $this->hasMany('NotacreditoDetalle', array(
             'local' => 'id_detalle_activo',
             'foreign' => 'id_detalle_activo'));
    }
}