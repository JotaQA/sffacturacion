<?php

/**
 * BaseGuia
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id_guia
 * @property integer $id_estadoguia
 * @property integer $id_factura
 * @property integer $numero_guia
 * @property string $id_notapedido_guia
 * @property timestamp $fechaingreso_guia
 * @property timestamp $fechaemision_guia
 * @property string $rut_guia
 * @property string $telefono_guia
 * @property string $nombre_guia
 * @property string $direccion_guia
 * @property string $comuna_guia
 * @property string $ciudad_guia
 * @property string $giro_guia
 * @property string $oc_guia
 * @property string $condicionpago_guia
 * @property string $comentario_guia
 * @property string $responsable_guia
 * @property string $tipo_guia
 * @property Factura $Factura
 * @property EstadoGuia $EstadoGuia
 * @property Doctrine_Collection $DetalleActivo
 * @property Doctrine_Collection $ReferenciaDocumento
 * 
 * @method integer             getIdGuia()              Returns the current record's "id_guia" value
 * @method integer             getIdEstadoguia()        Returns the current record's "id_estadoguia" value
 * @method integer             getIdFactura()           Returns the current record's "id_factura" value
 * @method integer             getNumeroGuia()          Returns the current record's "numero_guia" value
 * @method string              getIdNotapedidoGuia()    Returns the current record's "id_notapedido_guia" value
 * @method timestamp           getFechaingresoGuia()    Returns the current record's "fechaingreso_guia" value
 * @method timestamp           getFechaemisionGuia()    Returns the current record's "fechaemision_guia" value
 * @method string              getRutGuia()             Returns the current record's "rut_guia" value
 * @method string              getTelefonoGuia()        Returns the current record's "telefono_guia" value
 * @method string              getNombreGuia()          Returns the current record's "nombre_guia" value
 * @method string              getDireccionGuia()       Returns the current record's "direccion_guia" value
 * @method string              getComunaGuia()          Returns the current record's "comuna_guia" value
 * @method string              getCiudadGuia()          Returns the current record's "ciudad_guia" value
 * @method string              getGiroGuia()            Returns the current record's "giro_guia" value
 * @method string              getOcGuia()              Returns the current record's "oc_guia" value
 * @method string              getCondicionpagoGuia()   Returns the current record's "condicionpago_guia" value
 * @method string              getComentarioGuia()      Returns the current record's "comentario_guia" value
 * @method string              getResponsableGuia()     Returns the current record's "responsable_guia" value
 * @method string              getTipoGuia()            Returns the current record's "tipo_guia" value
 * @method Factura             getFactura()             Returns the current record's "Factura" value
 * @method EstadoGuia          getEstadoGuia()          Returns the current record's "EstadoGuia" value
 * @method Doctrine_Collection getDetalleActivo()       Returns the current record's "DetalleActivo" collection
 * @method Doctrine_Collection getReferenciaDocumento() Returns the current record's "ReferenciaDocumento" collection
 * @method Guia                setIdGuia()              Sets the current record's "id_guia" value
 * @method Guia                setIdEstadoguia()        Sets the current record's "id_estadoguia" value
 * @method Guia                setIdFactura()           Sets the current record's "id_factura" value
 * @method Guia                setNumeroGuia()          Sets the current record's "numero_guia" value
 * @method Guia                setIdNotapedidoGuia()    Sets the current record's "id_notapedido_guia" value
 * @method Guia                setFechaingresoGuia()    Sets the current record's "fechaingreso_guia" value
 * @method Guia                setFechaemisionGuia()    Sets the current record's "fechaemision_guia" value
 * @method Guia                setRutGuia()             Sets the current record's "rut_guia" value
 * @method Guia                setTelefonoGuia()        Sets the current record's "telefono_guia" value
 * @method Guia                setNombreGuia()          Sets the current record's "nombre_guia" value
 * @method Guia                setDireccionGuia()       Sets the current record's "direccion_guia" value
 * @method Guia                setComunaGuia()          Sets the current record's "comuna_guia" value
 * @method Guia                setCiudadGuia()          Sets the current record's "ciudad_guia" value
 * @method Guia                setGiroGuia()            Sets the current record's "giro_guia" value
 * @method Guia                setOcGuia()              Sets the current record's "oc_guia" value
 * @method Guia                setCondicionpagoGuia()   Sets the current record's "condicionpago_guia" value
 * @method Guia                setComentarioGuia()      Sets the current record's "comentario_guia" value
 * @method Guia                setResponsableGuia()     Sets the current record's "responsable_guia" value
 * @method Guia                setTipoGuia()            Sets the current record's "tipo_guia" value
 * @method Guia                setFactura()             Sets the current record's "Factura" value
 * @method Guia                setEstadoGuia()          Sets the current record's "EstadoGuia" value
 * @method Guia                setDetalleActivo()       Sets the current record's "DetalleActivo" collection
 * @method Guia                setReferenciaDocumento() Sets the current record's "ReferenciaDocumento" collection
 * 
 * @package    sffacturacion
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseGuia extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('guia');
        $this->hasColumn('id_guia', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('id_estadoguia', 'integer', 4, array(
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
        $this->hasColumn('numero_guia', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('id_notapedido_guia', 'string', 512, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 512,
             ));
        $this->hasColumn('fechaingreso_guia', 'timestamp', 25, array(
             'type' => 'timestamp',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 25,
             ));
        $this->hasColumn('fechaemision_guia', 'timestamp', 25, array(
             'type' => 'timestamp',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 25,
             ));
        $this->hasColumn('rut_guia', 'string', 15, array(
             'type' => 'string',
             'fixed' => 1,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 15,
             ));
        $this->hasColumn('telefono_guia', 'string', 32, array(
             'type' => 'string',
             'fixed' => 1,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 32,
             ));
        $this->hasColumn('nombre_guia', 'string', 512, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 512,
             ));
        $this->hasColumn('direccion_guia', 'string', 512, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 512,
             ));
        $this->hasColumn('comuna_guia', 'string', 512, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 512,
             ));
        $this->hasColumn('ciudad_guia', 'string', 512, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 512,
             ));
        $this->hasColumn('giro_guia', 'string', 512, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 512,
             ));
        $this->hasColumn('oc_guia', 'string', 512, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 512,
             ));
        $this->hasColumn('condicionpago_guia', 'string', 512, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 512,
             ));
        $this->hasColumn('comentario_guia', 'string', 512, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 512,
             ));
        $this->hasColumn('responsable_guia', 'string', 512, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 512,
             ));
        $this->hasColumn('tipo_guia', 'string', 127, array(
             'type' => 'string',
             'fixed' => 1,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 127,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Factura', array(
             'local' => 'id_factura',
             'foreign' => 'id_factura'));

        $this->hasOne('EstadoGuia', array(
             'local' => 'id_estadoguia',
             'foreign' => 'id_estadoguia'));

        $this->hasMany('DetalleActivo', array(
             'local' => 'id_guia',
             'foreign' => 'id_guia'));

        $this->hasMany('ReferenciaDocumento', array(
             'local' => 'id_guia',
             'foreign' => 'id_guia'));
    }
}