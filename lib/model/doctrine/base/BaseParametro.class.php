<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('Parametro', 'artelamp');

/**
 * BaseParametro
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id_parametro
 * @property float $valor_parametro
 * @property string $nombre_parametro
 * @property string $descripcion_parametro
 * 
 * @method integer   getIdParametro()           Returns the current record's "id_parametro" value
 * @method float     getValorParametro()        Returns the current record's "valor_parametro" value
 * @method string    getNombreParametro()       Returns the current record's "nombre_parametro" value
 * @method string    getDescripcionParametro()  Returns the current record's "descripcion_parametro" value
 * @method Parametro setIdParametro()           Sets the current record's "id_parametro" value
 * @method Parametro setValorParametro()        Sets the current record's "valor_parametro" value
 * @method Parametro setNombreParametro()       Sets the current record's "nombre_parametro" value
 * @method Parametro setDescripcionParametro()  Sets the current record's "descripcion_parametro" value
 * 
 * @package    sffacturacion
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7691 2011-02-04 15:43:29Z jwage $
 */
abstract class BaseParametro extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('parametro');
        $this->hasColumn('id_parametro', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('valor_parametro', 'float', null, array(
             'type' => 'float',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => '',
             ));
        $this->hasColumn('nombre_parametro', 'string', 1000, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 1000,
             ));
        $this->hasColumn('descripcion_parametro', 'string', 2000, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 2000,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        
    }
}