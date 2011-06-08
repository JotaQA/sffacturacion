<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('Sucursal', 'artelamp');

/**
 * BaseSucursal
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id_sucursal
 * @property string $id_cliente
 * @property string $direccion_sucur
 * @property string $comuna_sucur
 * @property string $ciudad_sucur
 * @property string $region_sucur
 * @property integer $casa_matriz
 * @property string $telefono1_sucur
 * @property string $telefono2_sucur
 * @property string $fax_sucur
 * @property string $contacto_sucur
 * @property string $correo_sucursal
 * @property timestamp $fecha_sucur
 * 
 * @method integer   getIdSucursal()      Returns the current record's "id_sucursal" value
 * @method string    getIdCliente()       Returns the current record's "id_cliente" value
 * @method string    getDireccionSucur()  Returns the current record's "direccion_sucur" value
 * @method string    getComunaSucur()     Returns the current record's "comuna_sucur" value
 * @method string    getCiudadSucur()     Returns the current record's "ciudad_sucur" value
 * @method string    getRegionSucur()     Returns the current record's "region_sucur" value
 * @method integer   getCasaMatriz()      Returns the current record's "casa_matriz" value
 * @method string    getTelefono1Sucur()  Returns the current record's "telefono1_sucur" value
 * @method string    getTelefono2Sucur()  Returns the current record's "telefono2_sucur" value
 * @method string    getFaxSucur()        Returns the current record's "fax_sucur" value
 * @method string    getContactoSucur()   Returns the current record's "contacto_sucur" value
 * @method string    getCorreoSucursal()  Returns the current record's "correo_sucursal" value
 * @method timestamp getFechaSucur()      Returns the current record's "fecha_sucur" value
 * @method Sucursal  setIdSucursal()      Sets the current record's "id_sucursal" value
 * @method Sucursal  setIdCliente()       Sets the current record's "id_cliente" value
 * @method Sucursal  setDireccionSucur()  Sets the current record's "direccion_sucur" value
 * @method Sucursal  setComunaSucur()     Sets the current record's "comuna_sucur" value
 * @method Sucursal  setCiudadSucur()     Sets the current record's "ciudad_sucur" value
 * @method Sucursal  setRegionSucur()     Sets the current record's "region_sucur" value
 * @method Sucursal  setCasaMatriz()      Sets the current record's "casa_matriz" value
 * @method Sucursal  setTelefono1Sucur()  Sets the current record's "telefono1_sucur" value
 * @method Sucursal  setTelefono2Sucur()  Sets the current record's "telefono2_sucur" value
 * @method Sucursal  setFaxSucur()        Sets the current record's "fax_sucur" value
 * @method Sucursal  setContactoSucur()   Sets the current record's "contacto_sucur" value
 * @method Sucursal  setCorreoSucursal()  Sets the current record's "correo_sucursal" value
 * @method Sucursal  setFechaSucur()      Sets the current record's "fecha_sucur" value
 * 
 * @package    sffacturacion
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseSucursal extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('sucursal');
        $this->hasColumn('id_sucursal', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('id_cliente', 'string', 50, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 50,
             ));
        $this->hasColumn('direccion_sucur', 'string', 255, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 255,
             ));
        $this->hasColumn('comuna_sucur', 'string', 255, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 255,
             ));
        $this->hasColumn('ciudad_sucur', 'string', 255, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 255,
             ));
        $this->hasColumn('region_sucur', 'string', 255, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 255,
             ));
        $this->hasColumn('casa_matriz', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('telefono1_sucur', 'string', 50, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 50,
             ));
        $this->hasColumn('telefono2_sucur', 'string', 50, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 50,
             ));
        $this->hasColumn('fax_sucur', 'string', 255, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 255,
             ));
        $this->hasColumn('contacto_sucur', 'string', 255, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 255,
             ));
        $this->hasColumn('correo_sucursal', 'string', 500, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 500,
             ));
        $this->hasColumn('fecha_sucur', 'timestamp', 25, array(
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