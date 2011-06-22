<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('EstadoBoleta', 'artelamp_1');

/**
 * BaseEstadoBoleta
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id_estadoboleta
 * @property string $nombre_estadoboleta
 * @property string $descripcion_estadoboleta
 * @property Doctrine_Collection $Boleta
 * 
 * @method integer             getIdEstadoboleta()           Returns the current record's "id_estadoboleta" value
 * @method string              getNombreEstadoboleta()       Returns the current record's "nombre_estadoboleta" value
 * @method string              getDescripcionEstadoboleta()  Returns the current record's "descripcion_estadoboleta" value
 * @method Doctrine_Collection getBoleta()                   Returns the current record's "Boleta" collection
 * @method EstadoBoleta        setIdEstadoboleta()           Sets the current record's "id_estadoboleta" value
 * @method EstadoBoleta        setNombreEstadoboleta()       Sets the current record's "nombre_estadoboleta" value
 * @method EstadoBoleta        setDescripcionEstadoboleta()  Sets the current record's "descripcion_estadoboleta" value
 * @method EstadoBoleta        setBoleta()                   Sets the current record's "Boleta" collection
 * 
 * @package    sffacturacion
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseEstadoBoleta extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('estado_boleta');
        $this->hasColumn('id_estadoboleta', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('nombre_estadoboleta', 'string', 200, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 200,
             ));
        $this->hasColumn('descripcion_estadoboleta', 'string', 512, array(
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
        $this->hasMany('Boleta', array(
             'local' => 'id_estadoboleta',
             'foreign' => 'id_estadoboleta'));
    }
}