<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('NotaCredito', 'artelamp_1');

/**
 * BaseNotaCredito
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id_nota_credito
 * @property integer $id_estado_nota_credito
 * @property integer $numero_nota_credito
 * @property string $numerofactura_nota_credito
 * @property timestamp $fechaingreso_nota_credito
 * @property timestamp $fechaemision_nota_credito
 * @property integer $neto_nota_credito
 * @property integer $total_nota_credito
 * @property integer $id_notapedido_nota_credito
 * @property string $rut_nota_credito
 * @property string $telefono_nota_credito
 * @property string $nombre_nota_credito
 * @property string $direccion_nota_credito
 * @property string $comuna_nota_credito
 * @property string $ciudad_nota_credito
 * @property string $giro_nota_credito
 * @property string $oc_nota_credito
 * @property string $condicionpago_nota_credito
 * @property string $responsable_nota_credito
 * @property string $comentarior_nota_credito
 * @property EstadoNotaCredito $EstadoNotaCredito
 * @property Doctrine_Collection $DetalleActivo
 * @property Doctrine_Collection $NotacreditoDetalle
 * 
 * @method integer             getIdNotaCredito()              Returns the current record's "id_nota_credito" value
 * @method integer             getIdEstadoNotaCredito()        Returns the current record's "id_estado_nota_credito" value
 * @method integer             getNumeroNotaCredito()          Returns the current record's "numero_nota_credito" value
 * @method string              getNumerofacturaNotaCredito()   Returns the current record's "numerofactura_nota_credito" value
 * @method timestamp           getFechaingresoNotaCredito()    Returns the current record's "fechaingreso_nota_credito" value
 * @method timestamp           getFechaemisionNotaCredito()    Returns the current record's "fechaemision_nota_credito" value
 * @method integer             getNetoNotaCredito()            Returns the current record's "neto_nota_credito" value
 * @method integer             getTotalNotaCredito()           Returns the current record's "total_nota_credito" value
 * @method integer             getIdNotapedidoNotaCredito()    Returns the current record's "id_notapedido_nota_credito" value
 * @method string              getRutNotaCredito()             Returns the current record's "rut_nota_credito" value
 * @method string              getTelefonoNotaCredito()        Returns the current record's "telefono_nota_credito" value
 * @method string              getNombreNotaCredito()          Returns the current record's "nombre_nota_credito" value
 * @method string              getDireccionNotaCredito()       Returns the current record's "direccion_nota_credito" value
 * @method string              getComunaNotaCredito()          Returns the current record's "comuna_nota_credito" value
 * @method string              getCiudadNotaCredito()          Returns the current record's "ciudad_nota_credito" value
 * @method string              getGiroNotaCredito()            Returns the current record's "giro_nota_credito" value
 * @method string              getOcNotaCredito()              Returns the current record's "oc_nota_credito" value
 * @method string              getCondicionpagoNotaCredito()   Returns the current record's "condicionpago_nota_credito" value
 * @method string              getResponsableNotaCredito()     Returns the current record's "responsable_nota_credito" value
 * @method string              getComentariorNotaCredito()     Returns the current record's "comentarior_nota_credito" value
 * @method EstadoNotaCredito   getEstadoNotaCredito()          Returns the current record's "EstadoNotaCredito" value
 * @method Doctrine_Collection getDetalleActivo()              Returns the current record's "DetalleActivo" collection
 * @method Doctrine_Collection getNotacreditoDetalle()         Returns the current record's "NotacreditoDetalle" collection
 * @method NotaCredito         setIdNotaCredito()              Sets the current record's "id_nota_credito" value
 * @method NotaCredito         setIdEstadoNotaCredito()        Sets the current record's "id_estado_nota_credito" value
 * @method NotaCredito         setNumeroNotaCredito()          Sets the current record's "numero_nota_credito" value
 * @method NotaCredito         setNumerofacturaNotaCredito()   Sets the current record's "numerofactura_nota_credito" value
 * @method NotaCredito         setFechaingresoNotaCredito()    Sets the current record's "fechaingreso_nota_credito" value
 * @method NotaCredito         setFechaemisionNotaCredito()    Sets the current record's "fechaemision_nota_credito" value
 * @method NotaCredito         setNetoNotaCredito()            Sets the current record's "neto_nota_credito" value
 * @method NotaCredito         setTotalNotaCredito()           Sets the current record's "total_nota_credito" value
 * @method NotaCredito         setIdNotapedidoNotaCredito()    Sets the current record's "id_notapedido_nota_credito" value
 * @method NotaCredito         setRutNotaCredito()             Sets the current record's "rut_nota_credito" value
 * @method NotaCredito         setTelefonoNotaCredito()        Sets the current record's "telefono_nota_credito" value
 * @method NotaCredito         setNombreNotaCredito()          Sets the current record's "nombre_nota_credito" value
 * @method NotaCredito         setDireccionNotaCredito()       Sets the current record's "direccion_nota_credito" value
 * @method NotaCredito         setComunaNotaCredito()          Sets the current record's "comuna_nota_credito" value
 * @method NotaCredito         setCiudadNotaCredito()          Sets the current record's "ciudad_nota_credito" value
 * @method NotaCredito         setGiroNotaCredito()            Sets the current record's "giro_nota_credito" value
 * @method NotaCredito         setOcNotaCredito()              Sets the current record's "oc_nota_credito" value
 * @method NotaCredito         setCondicionpagoNotaCredito()   Sets the current record's "condicionpago_nota_credito" value
 * @method NotaCredito         setResponsableNotaCredito()     Sets the current record's "responsable_nota_credito" value
 * @method NotaCredito         setComentariorNotaCredito()     Sets the current record's "comentarior_nota_credito" value
 * @method NotaCredito         setEstadoNotaCredito()          Sets the current record's "EstadoNotaCredito" value
 * @method NotaCredito         setDetalleActivo()              Sets the current record's "DetalleActivo" collection
 * @method NotaCredito         setNotacreditoDetalle()         Sets the current record's "NotacreditoDetalle" collection
 * 
 * @package    sffacturacion
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseNotaCredito extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('nota_credito');
        $this->hasColumn('id_nota_credito', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('id_estado_nota_credito', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('numero_nota_credito', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('numerofactura_nota_credito', 'string', 128, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 128,
             ));
        $this->hasColumn('fechaingreso_nota_credito', 'timestamp', 25, array(
             'type' => 'timestamp',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 25,
             ));
        $this->hasColumn('fechaemision_nota_credito', 'timestamp', 25, array(
             'type' => 'timestamp',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 25,
             ));
        $this->hasColumn('neto_nota_credito', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('total_nota_credito', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('id_notapedido_nota_credito', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('rut_nota_credito', 'string', 15, array(
             'type' => 'string',
             'fixed' => 1,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 15,
             ));
        $this->hasColumn('telefono_nota_credito', 'string', 32, array(
             'type' => 'string',
             'fixed' => 1,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 32,
             ));
        $this->hasColumn('nombre_nota_credito', 'string', 200, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 200,
             ));
        $this->hasColumn('direccion_nota_credito', 'string', 512, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 512,
             ));
        $this->hasColumn('comuna_nota_credito', 'string', 512, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 512,
             ));
        $this->hasColumn('ciudad_nota_credito', 'string', 512, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 512,
             ));
        $this->hasColumn('giro_nota_credito', 'string', 512, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 512,
             ));
        $this->hasColumn('oc_nota_credito', 'string', 512, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 512,
             ));
        $this->hasColumn('condicionpago_nota_credito', 'string', 512, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 512,
             ));
        $this->hasColumn('responsable_nota_credito', 'string', 512, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 512,
             ));
        $this->hasColumn('comentarior_nota_credito', 'string', 512, array(
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
        $this->hasOne('EstadoNotaCredito', array(
             'local' => 'id_estado_nota_credito',
             'foreign' => 'id_estado_nota_credito'));

        $this->hasMany('DetalleActivo', array(
             'local' => 'id_nota_credito',
             'foreign' => 'id_nota_credito'));

        $this->hasMany('NotacreditoDetalle', array(
             'local' => 'id_nota_credito',
             'foreign' => 'id_nota_credito'));
    }
}