<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('DetalleReposicion', 'artelamp_1');

/**
 * BaseDetalleReposicion
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id_detalle_reposicion
 * @property integer $id_ordenreposicion
 * @property integer $cantidad_detalle_reposicion
 * @property timestamp $fecha_detalle_reposicion
 * @property integer $activa_detalle_reposicion
 * @property timestamp $fecha_detalle_detalle_reposicion
 * @property float $costo_detalle_reposicion
 * @property string $codigo_detalle_reposicion
 * @property OrdenReposicion $OrdenReposicion
 * 
 * @method integer           getIdDetalleReposicion()              Returns the current record's "id_detalle_reposicion" value
 * @method integer           getIdOrdenreposicion()                Returns the current record's "id_ordenreposicion" value
 * @method integer           getCantidadDetalleReposicion()        Returns the current record's "cantidad_detalle_reposicion" value
 * @method timestamp         getFechaDetalleReposicion()           Returns the current record's "fecha_detalle_reposicion" value
 * @method integer           getActivaDetalleReposicion()          Returns the current record's "activa_detalle_reposicion" value
 * @method timestamp         getFechaDetalleDetalleReposicion()    Returns the current record's "fecha_detalle_detalle_reposicion" value
 * @method float             getCostoDetalleReposicion()           Returns the current record's "costo_detalle_reposicion" value
 * @method string            getCodigoDetalleReposicion()          Returns the current record's "codigo_detalle_reposicion" value
 * @method OrdenReposicion   getOrdenReposicion()                  Returns the current record's "OrdenReposicion" value
 * @method DetalleReposicion setIdDetalleReposicion()              Sets the current record's "id_detalle_reposicion" value
 * @method DetalleReposicion setIdOrdenreposicion()                Sets the current record's "id_ordenreposicion" value
 * @method DetalleReposicion setCantidadDetalleReposicion()        Sets the current record's "cantidad_detalle_reposicion" value
 * @method DetalleReposicion setFechaDetalleReposicion()           Sets the current record's "fecha_detalle_reposicion" value
 * @method DetalleReposicion setActivaDetalleReposicion()          Sets the current record's "activa_detalle_reposicion" value
 * @method DetalleReposicion setFechaDetalleDetalleReposicion()    Sets the current record's "fecha_detalle_detalle_reposicion" value
 * @method DetalleReposicion setCostoDetalleReposicion()           Sets the current record's "costo_detalle_reposicion" value
 * @method DetalleReposicion setCodigoDetalleReposicion()          Sets the current record's "codigo_detalle_reposicion" value
 * @method DetalleReposicion setOrdenReposicion()                  Sets the current record's "OrdenReposicion" value
 * 
 * @package    sffacturacion
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7691 2011-02-04 15:43:29Z jwage $
 */
abstract class BaseDetalleReposicion extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('detalle_reposicion');
        $this->hasColumn('id_detalle_reposicion', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('id_ordenreposicion', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('cantidad_detalle_reposicion', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('fecha_detalle_reposicion', 'timestamp', 25, array(
             'type' => 'timestamp',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 25,
             ));
        $this->hasColumn('activa_detalle_reposicion', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('fecha_detalle_detalle_reposicion', 'timestamp', 25, array(
             'type' => 'timestamp',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 25,
             ));
        $this->hasColumn('costo_detalle_reposicion', 'float', null, array(
             'type' => 'float',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => '',
             ));
        $this->hasColumn('codigo_detalle_reposicion', 'string', 32, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 32,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('OrdenReposicion', array(
             'local' => 'id_ordenreposicion',
             'foreign' => 'id_ordenreposicion'));
    }
}