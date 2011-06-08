<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('Categorias', 'artelamp');

/**
 * BaseCategorias
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id_categoria
 * @property string $descripcion_categoria
 * 
 * @method integer    getIdCategoria()           Returns the current record's "id_categoria" value
 * @method string     getDescripcionCategoria()  Returns the current record's "descripcion_categoria" value
 * @method Categorias setIdCategoria()           Sets the current record's "id_categoria" value
 * @method Categorias setDescripcionCategoria()  Sets the current record's "descripcion_categoria" value
 * 
 * @package    sffacturacion
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseCategorias extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('categorias');
        $this->hasColumn('id_categoria', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('descripcion_categoria', 'string', 100, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 100,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        
    }
}