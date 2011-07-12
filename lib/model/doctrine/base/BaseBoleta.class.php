<?php

/**
 * BaseBoleta
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id_boleta
 * @property integer $numero_boleta
 * @property timestamp $fechaingreso_boleta
 * @property timestamp $fechaemision_boleta
 * @property integer $monto_boleta
 * @property integer $id_notapedido_boleta
 * @property integer $id_estadoboleta
 * @property string $rut_boleta
 * @property string $telefono_boleta
 * @property string $nombre_boleta
 * @property string $direccion_boleta
 * @property string $comuna_boleta
 * @property string $ciudad_boleta
 * @property string $giro_boleta
 * @property string $oc_boleta
 * @property string $condicionpago_boleta
 * @property string $comentario_boleta
 * @property string $responsable_boleta
 * @property Doctrine_Collection $DetalleActivo
 * @property EstadoBoleta $EstadoBoleta
 * 
 * @method integer             getIdBoleta()             Returns the current record's "id_boleta" value
 * @method integer             getNumeroBoleta()         Returns the current record's "numero_boleta" value
 * @method timestamp           getFechaingresoBoleta()   Returns the current record's "fechaingreso_boleta" value
 * @method timestamp           getFechaemisionBoleta()   Returns the current record's "fechaemision_boleta" value
 * @method integer             getMontoBoleta()          Returns the current record's "monto_boleta" value
 * @method integer             getIdNotapedidoBoleta()   Returns the current record's "id_notapedido_boleta" value
 * @method integer             getIdEstadoboleta()       Returns the current record's "id_estadoboleta" value
 * @method string              getRutBoleta()            Returns the current record's "rut_boleta" value
 * @method string              getTelefonoBoleta()       Returns the current record's "telefono_boleta" value
 * @method string              getNombreBoleta()         Returns the current record's "nombre_boleta" value
 * @method string              getDireccionBoleta()      Returns the current record's "direccion_boleta" value
 * @method string              getComunaBoleta()         Returns the current record's "comuna_boleta" value
 * @method string              getCiudadBoleta()         Returns the current record's "ciudad_boleta" value
 * @method string              getGiroBoleta()           Returns the current record's "giro_boleta" value
 * @method string              getOcBoleta()             Returns the current record's "oc_boleta" value
 * @method string              getCondicionpagoBoleta()  Returns the current record's "condicionpago_boleta" value
 * @method string              getComentarioBoleta()     Returns the current record's "comentario_boleta" value
 * @method string              getResponsableBoleta()    Returns the current record's "responsable_boleta" value
 * @method Doctrine_Collection getDetalleActivo()        Returns the current record's "DetalleActivo" collection
 * @method EstadoBoleta        getEstadoBoleta()         Returns the current record's "EstadoBoleta" value
 * @method Boleta              setIdBoleta()             Sets the current record's "id_boleta" value
 * @method Boleta              setNumeroBoleta()         Sets the current record's "numero_boleta" value
 * @method Boleta              setFechaingresoBoleta()   Sets the current record's "fechaingreso_boleta" value
 * @method Boleta              setFechaemisionBoleta()   Sets the current record's "fechaemision_boleta" value
 * @method Boleta              setMontoBoleta()          Sets the current record's "monto_boleta" value
 * @method Boleta              setIdNotapedidoBoleta()   Sets the current record's "id_notapedido_boleta" value
 * @method Boleta              setIdEstadoboleta()       Sets the current record's "id_estadoboleta" value
 * @method Boleta              setRutBoleta()            Sets the current record's "rut_boleta" value
 * @method Boleta              setTelefonoBoleta()       Sets the current record's "telefono_boleta" value
 * @method Boleta              setNombreBoleta()         Sets the current record's "nombre_boleta" value
 * @method Boleta              setDireccionBoleta()      Sets the current record's "direccion_boleta" value
 * @method Boleta              setComunaBoleta()         Sets the current record's "comuna_boleta" value
 * @method Boleta              setCiudadBoleta()         Sets the current record's "ciudad_boleta" value
 * @method Boleta              setGiroBoleta()           Sets the current record's "giro_boleta" value
 * @method Boleta              setOcBoleta()             Sets the current record's "oc_boleta" value
 * @method Boleta              setCondicionpagoBoleta()  Sets the current record's "condicionpago_boleta" value
 * @method Boleta              setComentarioBoleta()     Sets the current record's "comentario_boleta" value
 * @method Boleta              setResponsableBoleta()    Sets the current record's "responsable_boleta" value
 * @method Boleta              setDetalleActivo()        Sets the current record's "DetalleActivo" collection
 * @method Boleta              setEstadoBoleta()         Sets the current record's "EstadoBoleta" value
 * 
 * @package    sffacturacion
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseBoleta extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('boleta');
        $this->hasColumn('id_boleta', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('numero_boleta', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('fechaingreso_boleta', 'timestamp', 25, array(
             'type' => 'timestamp',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 25,
             ));
        $this->hasColumn('fechaemision_boleta', 'timestamp', 25, array(
             'type' => 'timestamp',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 25,
             ));
        $this->hasColumn('monto_boleta', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('id_notapedido_boleta', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('id_estadoboleta', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('rut_boleta', 'string', 15, array(
             'type' => 'string',
             'fixed' => 1,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 15,
             ));
        $this->hasColumn('telefono_boleta', 'string', 64, array(
             'type' => 'string',
             'fixed' => 1,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 64,
             ));
        $this->hasColumn('nombre_boleta', 'string', 512, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 512,
             ));
        $this->hasColumn('direccion_boleta', 'string', 512, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 512,
             ));
        $this->hasColumn('comuna_boleta', 'string', 512, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 512,
             ));
        $this->hasColumn('ciudad_boleta', 'string', 512, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 512,
             ));
        $this->hasColumn('giro_boleta', 'string', 512, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 512,
             ));
        $this->hasColumn('oc_boleta', 'string', 512, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 512,
             ));
        $this->hasColumn('condicionpago_boleta', 'string', 512, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 512,
             ));
        $this->hasColumn('comentario_boleta', 'string', 512, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 512,
             ));
        $this->hasColumn('responsable_boleta', 'string', 512, array(
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
        $this->hasMany('DetalleActivo', array(
             'local' => 'id_boleta',
             'foreign' => 'id_boleta'));

        $this->hasOne('EstadoBoleta', array(
             'local' => 'id_estadoboleta',
             'foreign' => 'id_estadoboleta'));
    }
}