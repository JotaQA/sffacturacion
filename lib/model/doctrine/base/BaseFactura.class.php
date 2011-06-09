<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('Factura', 'artelamp_1');

/**
 * BaseFactura
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id_factura
 * @property integer $id_estadofactura
 * @property integer $id_division
 * @property integer $numero_factura
 * @property timestamp $fechaingreso_factura
 * @property timestamp $fechaemision_factura
 * @property integer $monto_factura
 * @property integer $saldo_factura
 * @property float $descuento_factura
 * @property integer $id_notapedido_factura
 * @property string $rut_factura
 * @property string $telefono_factura
 * @property string $nombre_factura
 * @property string $direccion_factura
 * @property string $comuna_factura
 * @property string $ciudad_factura
 * @property string $giro_factura
 * @property string $oc_factura
 * @property string $condicionpago_factura
 * @property string $responsable_factura
 * @property string $responsable2_factura
 * @property string $comentario_factura
 * @property string $tipo_factura
 * @property Division $Division
 * @property EstadoFactura $EstadoFactura
 * @property Doctrine_Collection $Cuota
 * @property Doctrine_Collection $DetalleActivo
 * @property Doctrine_Collection $Guia
 * @property Doctrine_Collection $HistCuota
 * @property Doctrine_Collection $NotacreditoFactura
 * 
 * @method integer             getIdFactura()             Returns the current record's "id_factura" value
 * @method integer             getIdEstadofactura()       Returns the current record's "id_estadofactura" value
 * @method integer             getIdDivision()            Returns the current record's "id_division" value
 * @method integer             getNumeroFactura()         Returns the current record's "numero_factura" value
 * @method timestamp           getFechaingresoFactura()   Returns the current record's "fechaingreso_factura" value
 * @method timestamp           getFechaemisionFactura()   Returns the current record's "fechaemision_factura" value
 * @method integer             getMontoFactura()          Returns the current record's "monto_factura" value
 * @method integer             getSaldoFactura()          Returns the current record's "saldo_factura" value
 * @method float               getDescuentoFactura()      Returns the current record's "descuento_factura" value
 * @method integer             getIdNotapedidoFactura()   Returns the current record's "id_notapedido_factura" value
 * @method string              getRutFactura()            Returns the current record's "rut_factura" value
 * @method string              getTelefonoFactura()       Returns the current record's "telefono_factura" value
 * @method string              getNombreFactura()         Returns the current record's "nombre_factura" value
 * @method string              getDireccionFactura()      Returns the current record's "direccion_factura" value
 * @method string              getComunaFactura()         Returns the current record's "comuna_factura" value
 * @method string              getCiudadFactura()         Returns the current record's "ciudad_factura" value
 * @method string              getGiroFactura()           Returns the current record's "giro_factura" value
 * @method string              getOcFactura()             Returns the current record's "oc_factura" value
 * @method string              getCondicionpagoFactura()  Returns the current record's "condicionpago_factura" value
 * @method string              getResponsableFactura()    Returns the current record's "responsable_factura" value
 * @method string              getResponsable2Factura()   Returns the current record's "responsable2_factura" value
 * @method string              getComentarioFactura()     Returns the current record's "comentario_factura" value
 * @method string              getTipoFactura()           Returns the current record's "tipo_factura" value
 * @method Division            getDivision()              Returns the current record's "Division" value
 * @method EstadoFactura       getEstadoFactura()         Returns the current record's "EstadoFactura" value
 * @method Doctrine_Collection getCuota()                 Returns the current record's "Cuota" collection
 * @method Doctrine_Collection getDetalleActivo()         Returns the current record's "DetalleActivo" collection
 * @method Doctrine_Collection getGuia()                  Returns the current record's "Guia" collection
 * @method Doctrine_Collection getHistCuota()             Returns the current record's "HistCuota" collection
 * @method Doctrine_Collection getNotacreditoFactura()    Returns the current record's "NotacreditoFactura" collection
 * @method Factura             setIdFactura()             Sets the current record's "id_factura" value
 * @method Factura             setIdEstadofactura()       Sets the current record's "id_estadofactura" value
 * @method Factura             setIdDivision()            Sets the current record's "id_division" value
 * @method Factura             setNumeroFactura()         Sets the current record's "numero_factura" value
 * @method Factura             setFechaingresoFactura()   Sets the current record's "fechaingreso_factura" value
 * @method Factura             setFechaemisionFactura()   Sets the current record's "fechaemision_factura" value
 * @method Factura             setMontoFactura()          Sets the current record's "monto_factura" value
 * @method Factura             setSaldoFactura()          Sets the current record's "saldo_factura" value
 * @method Factura             setDescuentoFactura()      Sets the current record's "descuento_factura" value
 * @method Factura             setIdNotapedidoFactura()   Sets the current record's "id_notapedido_factura" value
 * @method Factura             setRutFactura()            Sets the current record's "rut_factura" value
 * @method Factura             setTelefonoFactura()       Sets the current record's "telefono_factura" value
 * @method Factura             setNombreFactura()         Sets the current record's "nombre_factura" value
 * @method Factura             setDireccionFactura()      Sets the current record's "direccion_factura" value
 * @method Factura             setComunaFactura()         Sets the current record's "comuna_factura" value
 * @method Factura             setCiudadFactura()         Sets the current record's "ciudad_factura" value
 * @method Factura             setGiroFactura()           Sets the current record's "giro_factura" value
 * @method Factura             setOcFactura()             Sets the current record's "oc_factura" value
 * @method Factura             setCondicionpagoFactura()  Sets the current record's "condicionpago_factura" value
 * @method Factura             setResponsableFactura()    Sets the current record's "responsable_factura" value
 * @method Factura             setResponsable2Factura()   Sets the current record's "responsable2_factura" value
 * @method Factura             setComentarioFactura()     Sets the current record's "comentario_factura" value
 * @method Factura             setTipoFactura()           Sets the current record's "tipo_factura" value
 * @method Factura             setDivision()              Sets the current record's "Division" value
 * @method Factura             setEstadoFactura()         Sets the current record's "EstadoFactura" value
 * @method Factura             setCuota()                 Sets the current record's "Cuota" collection
 * @method Factura             setDetalleActivo()         Sets the current record's "DetalleActivo" collection
 * @method Factura             setGuia()                  Sets the current record's "Guia" collection
 * @method Factura             setHistCuota()             Sets the current record's "HistCuota" collection
 * @method Factura             setNotacreditoFactura()    Sets the current record's "NotacreditoFactura" collection
 * 
 * @package    sffacturacion
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseFactura extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('factura');
        $this->hasColumn('id_factura', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('id_estadofactura', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('id_division', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('numero_factura', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('fechaingreso_factura', 'timestamp', 25, array(
             'type' => 'timestamp',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 25,
             ));
        $this->hasColumn('fechaemision_factura', 'timestamp', 25, array(
             'type' => 'timestamp',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 25,
             ));
        $this->hasColumn('monto_factura', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('saldo_factura', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('descuento_factura', 'float', null, array(
             'type' => 'float',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'default' => '0',
             'notnull' => true,
             'autoincrement' => false,
             'length' => '',
             ));
        $this->hasColumn('id_notapedido_factura', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('rut_factura', 'string', 15, array(
             'type' => 'string',
             'fixed' => 1,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 15,
             ));
        $this->hasColumn('telefono_factura', 'string', 32, array(
             'type' => 'string',
             'fixed' => 1,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 32,
             ));
        $this->hasColumn('nombre_factura', 'string', 512, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 512,
             ));
        $this->hasColumn('direccion_factura', 'string', 512, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 512,
             ));
        $this->hasColumn('comuna_factura', 'string', 512, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 512,
             ));
        $this->hasColumn('ciudad_factura', 'string', 512, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 512,
             ));
        $this->hasColumn('giro_factura', 'string', 512, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 512,
             ));
        $this->hasColumn('oc_factura', 'string', 512, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 512,
             ));
        $this->hasColumn('condicionpago_factura', 'string', 512, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 512,
             ));
        $this->hasColumn('responsable_factura', 'string', 512, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 512,
             ));
        $this->hasColumn('responsable2_factura', 'string', 512, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 512,
             ));
        $this->hasColumn('comentario_factura', 'string', 512, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 512,
             ));
        $this->hasColumn('tipo_factura', 'string', 64, array(
             'type' => 'string',
             'fixed' => 1,
             'unsigned' => false,
             'primary' => false,
             'default' => 'FISICA',
             'notnull' => true,
             'autoincrement' => false,
             'length' => 64,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Division', array(
             'local' => 'id_division',
             'foreign' => 'id_division'));

        $this->hasOne('EstadoFactura', array(
             'local' => 'id_estadofactura',
             'foreign' => 'id_estadofactura'));

        $this->hasMany('Cuota', array(
             'local' => 'id_factura',
             'foreign' => 'id_factura'));

        $this->hasMany('DetalleActivo', array(
             'local' => 'id_factura',
             'foreign' => 'id_factura'));

        $this->hasMany('Guia', array(
             'local' => 'id_factura',
             'foreign' => 'id_factura'));

        $this->hasMany('HistCuota', array(
             'local' => 'id_factura',
             'foreign' => 'id_factura'));

        $this->hasMany('NotacreditoFactura', array(
             'local' => 'id_factura',
             'foreign' => 'id_factura'));
    }
}