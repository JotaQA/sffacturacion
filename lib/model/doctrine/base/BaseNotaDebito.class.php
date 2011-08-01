<?php

/**
 * BaseNotaDebito
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id_nota_debito
 * @property integer $id_estado_nota_debito
 * @property integer $codref_nota_debito
 * @property integer $numero_nota_debito
 * @property string $numero_refdocumento_nota_debito
 * @property timestamp $fechaingreso_nota_debito
 * @property timestamp $fechaemision_nota_debito
 * @property integer $neto_nota_debito
 * @property integer $total_nota_debito
 * @property float $descuento_nota_debito
 * @property integer $id_notapedido_nota_debito
 * @property string $razon_nota_debito
 * @property string $glosa_nota_debito
 * @property string $rut_nota_debito
 * @property string $telefono_nota_debito
 * @property string $nombre_nota_debito
 * @property string $direccion_nota_debito
 * @property string $comuna_nota_debito
 * @property string $ciudad_nota_debito
 * @property string $giro_nota_debito
 * @property string $oc_nota_debito
 * @property string $condicionpago_nota_debito
 * @property string $responsable_nota_debito
 * @property string $comentarior_nota_debito
 * @property string $tipo_nota_debito
 * @property EstadoNotaDebito $EstadoNotaDebito
 * @property Doctrine_Collection $ReferenciaDocumento
 * @property Doctrine_Collection $DetalleActivo
 * 
 * @method integer             getIdNotaDebito()                    Returns the current record's "id_nota_debito" value
 * @method integer             getIdEstadoNotaDebito()              Returns the current record's "id_estado_nota_debito" value
 * @method integer             getCodrefNotaDebito()                Returns the current record's "codref_nota_debito" value
 * @method integer             getNumeroNotaDebito()                Returns the current record's "numero_nota_debito" value
 * @method string              getNumeroRefdocumentoNotaDebito()    Returns the current record's "numero_refdocumento_nota_debito" value
 * @method timestamp           getFechaingresoNotaDebito()          Returns the current record's "fechaingreso_nota_debito" value
 * @method timestamp           getFechaemisionNotaDebito()          Returns the current record's "fechaemision_nota_debito" value
 * @method integer             getNetoNotaDebito()                  Returns the current record's "neto_nota_debito" value
 * @method integer             getTotalNotaDebito()                 Returns the current record's "total_nota_debito" value
 * @method float               getDescuentoNotaDebito()             Returns the current record's "descuento_nota_debito" value
 * @method integer             getIdNotapedidoNotaDebito()          Returns the current record's "id_notapedido_nota_debito" value
 * @method string              getRazonNotaDebito()                 Returns the current record's "razon_nota_debito" value
 * @method string              getGlosaNotaDebito()                 Returns the current record's "glosa_nota_debito" value
 * @method string              getRutNotaDebito()                   Returns the current record's "rut_nota_debito" value
 * @method string              getTelefonoNotaDebito()              Returns the current record's "telefono_nota_debito" value
 * @method string              getNombreNotaDebito()                Returns the current record's "nombre_nota_debito" value
 * @method string              getDireccionNotaDebito()             Returns the current record's "direccion_nota_debito" value
 * @method string              getComunaNotaDebito()                Returns the current record's "comuna_nota_debito" value
 * @method string              getCiudadNotaDebito()                Returns the current record's "ciudad_nota_debito" value
 * @method string              getGiroNotaDebito()                  Returns the current record's "giro_nota_debito" value
 * @method string              getOcNotaDebito()                    Returns the current record's "oc_nota_debito" value
 * @method string              getCondicionpagoNotaDebito()         Returns the current record's "condicionpago_nota_debito" value
 * @method string              getResponsableNotaDebito()           Returns the current record's "responsable_nota_debito" value
 * @method string              getComentariorNotaDebito()           Returns the current record's "comentarior_nota_debito" value
 * @method string              getTipoNotaDebito()                  Returns the current record's "tipo_nota_debito" value
 * @method EstadoNotaDebito    getEstadoNotaDebito()                Returns the current record's "EstadoNotaDebito" value
 * @method Doctrine_Collection getReferenciaDocumento()             Returns the current record's "ReferenciaDocumento" collection
 * @method Doctrine_Collection getDetalleActivo()                   Returns the current record's "DetalleActivo" collection
 * @method NotaDebito          setIdNotaDebito()                    Sets the current record's "id_nota_debito" value
 * @method NotaDebito          setIdEstadoNotaDebito()              Sets the current record's "id_estado_nota_debito" value
 * @method NotaDebito          setCodrefNotaDebito()                Sets the current record's "codref_nota_debito" value
 * @method NotaDebito          setNumeroNotaDebito()                Sets the current record's "numero_nota_debito" value
 * @method NotaDebito          setNumeroRefdocumentoNotaDebito()    Sets the current record's "numero_refdocumento_nota_debito" value
 * @method NotaDebito          setFechaingresoNotaDebito()          Sets the current record's "fechaingreso_nota_debito" value
 * @method NotaDebito          setFechaemisionNotaDebito()          Sets the current record's "fechaemision_nota_debito" value
 * @method NotaDebito          setNetoNotaDebito()                  Sets the current record's "neto_nota_debito" value
 * @method NotaDebito          setTotalNotaDebito()                 Sets the current record's "total_nota_debito" value
 * @method NotaDebito          setDescuentoNotaDebito()             Sets the current record's "descuento_nota_debito" value
 * @method NotaDebito          setIdNotapedidoNotaDebito()          Sets the current record's "id_notapedido_nota_debito" value
 * @method NotaDebito          setRazonNotaDebito()                 Sets the current record's "razon_nota_debito" value
 * @method NotaDebito          setGlosaNotaDebito()                 Sets the current record's "glosa_nota_debito" value
 * @method NotaDebito          setRutNotaDebito()                   Sets the current record's "rut_nota_debito" value
 * @method NotaDebito          setTelefonoNotaDebito()              Sets the current record's "telefono_nota_debito" value
 * @method NotaDebito          setNombreNotaDebito()                Sets the current record's "nombre_nota_debito" value
 * @method NotaDebito          setDireccionNotaDebito()             Sets the current record's "direccion_nota_debito" value
 * @method NotaDebito          setComunaNotaDebito()                Sets the current record's "comuna_nota_debito" value
 * @method NotaDebito          setCiudadNotaDebito()                Sets the current record's "ciudad_nota_debito" value
 * @method NotaDebito          setGiroNotaDebito()                  Sets the current record's "giro_nota_debito" value
 * @method NotaDebito          setOcNotaDebito()                    Sets the current record's "oc_nota_debito" value
 * @method NotaDebito          setCondicionpagoNotaDebito()         Sets the current record's "condicionpago_nota_debito" value
 * @method NotaDebito          setResponsableNotaDebito()           Sets the current record's "responsable_nota_debito" value
 * @method NotaDebito          setComentariorNotaDebito()           Sets the current record's "comentarior_nota_debito" value
 * @method NotaDebito          setTipoNotaDebito()                  Sets the current record's "tipo_nota_debito" value
 * @method NotaDebito          setEstadoNotaDebito()                Sets the current record's "EstadoNotaDebito" value
 * @method NotaDebito          setReferenciaDocumento()             Sets the current record's "ReferenciaDocumento" collection
 * @method NotaDebito          setDetalleActivo()                   Sets the current record's "DetalleActivo" collection
 * 
 * @package    sffacturacion
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseNotaDebito extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('nota_debito');
        $this->hasColumn('id_nota_debito', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('id_estado_nota_debito', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('codref_nota_debito', 'integer', 1, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'comment' => '1: Anula Documento de Referencia, 2: Corrige Texto Documento de Referencia, 3: Corrige Montos',
             'length' => 1,
             ));
        $this->hasColumn('numero_nota_debito', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('numero_refdocumento_nota_debito', 'string', 128, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 128,
             ));
        $this->hasColumn('fechaingreso_nota_debito', 'timestamp', 25, array(
             'type' => 'timestamp',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 25,
             ));
        $this->hasColumn('fechaemision_nota_debito', 'timestamp', 25, array(
             'type' => 'timestamp',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 25,
             ));
        $this->hasColumn('neto_nota_debito', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('total_nota_debito', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('descuento_nota_debito', 'float', null, array(
             'type' => 'float',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'default' => '0',
             'notnull' => true,
             'autoincrement' => false,
             'length' => '',
             ));
        $this->hasColumn('id_notapedido_nota_debito', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('razon_nota_debito', 'string', 90, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 90,
             ));
        $this->hasColumn('glosa_nota_debito', 'string', 80, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 80,
             ));
        $this->hasColumn('rut_nota_debito', 'string', 15, array(
             'type' => 'string',
             'fixed' => 1,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 15,
             ));
        $this->hasColumn('telefono_nota_debito', 'string', 32, array(
             'type' => 'string',
             'fixed' => 1,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 32,
             ));
        $this->hasColumn('nombre_nota_debito', 'string', 200, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 200,
             ));
        $this->hasColumn('direccion_nota_debito', 'string', 512, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 512,
             ));
        $this->hasColumn('comuna_nota_debito', 'string', 512, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 512,
             ));
        $this->hasColumn('ciudad_nota_debito', 'string', 512, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 512,
             ));
        $this->hasColumn('giro_nota_debito', 'string', 512, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 512,
             ));
        $this->hasColumn('oc_nota_debito', 'string', 512, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 512,
             ));
        $this->hasColumn('condicionpago_nota_debito', 'string', 512, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 512,
             ));
        $this->hasColumn('responsable_nota_debito', 'string', 512, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 512,
             ));
        $this->hasColumn('comentarior_nota_debito', 'string', 512, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 512,
             ));
        $this->hasColumn('tipo_nota_debito', 'string', 64, array(
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
        $this->hasOne('EstadoNotaDebito', array(
             'local' => 'id_estado_nota_debito',
             'foreign' => 'id_estado_nota_debito'));

        $this->hasMany('ReferenciaDocumento', array(
             'local' => 'id_nota_debito',
             'foreign' => 'id_nota_debito'));

        $this->hasMany('DetalleActivo', array(
             'local' => 'id_nota_debito',
             'foreign' => 'id_nota_debito'));
    }
}