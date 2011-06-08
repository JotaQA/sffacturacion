<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('Estado', 'artelamp');

/**
 * BaseEstado
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id_estado
 * @property string $nombre_estado
 * @property string $descripcion_estado
 * 
 * @method integer getIdEstado()           Returns the current record's "id_estado" value
 * @method string  getNombreEstado()       Returns the current record's "nombre_estado" value
 * @method string  getDescripcionEstado()  Returns the current record's "descripcion_estado" value
 * @method Estado  setIdEstado()           Sets the current record's "id_estado" value
 * @method Estado  setNombreEstado()       Sets the current record's "nombre_estado" value
 * @method Estado  setDescripcionEstado()  Sets the current record's "descripcion_estado" value
 * 
 * @package    sffacturacion
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseEstado extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('estado');
        $this->hasColumn('id_estado', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('nombre_estado', 'string', 5000, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 5000,
             ));
        $this->hasColumn('descripcion_estado', 'string', 5000, array(
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