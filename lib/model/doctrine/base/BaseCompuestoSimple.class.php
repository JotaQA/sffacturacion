<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('CompuestoSimple', 'artelamp');

/**
 * BaseCompuestoSimple
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id_compuesto_simple
 * @property string $id_compuesto
 * @property string $id_simple
 * @property integer $cantidad
 * @property timestamp $fecha_compuesto
 * 
 * @method integer         getIdCompuestoSimple()   Returns the current record's "id_compuesto_simple" value
 * @method string          getIdCompuesto()         Returns the current record's "id_compuesto" value
 * @method string          getIdSimple()            Returns the current record's "id_simple" value
 * @method integer         getCantidad()            Returns the current record's "cantidad" value
 * @method timestamp       getFechaCompuesto()      Returns the current record's "fecha_compuesto" value
 * @method CompuestoSimple setIdCompuestoSimple()   Sets the current record's "id_compuesto_simple" value
 * @method CompuestoSimple setIdCompuesto()         Sets the current record's "id_compuesto" value
 * @method CompuestoSimple setIdSimple()            Sets the current record's "id_simple" value
 * @method CompuestoSimple setCantidad()            Sets the current record's "cantidad" value
 * @method CompuestoSimple setFechaCompuesto()      Sets the current record's "fecha_compuesto" value
 * 
 * @package    sffacturacion
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7691 2011-02-04 15:43:29Z jwage $
 */
abstract class BaseCompuestoSimple extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('compuesto_simple');
        $this->hasColumn('id_compuesto_simple', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('id_compuesto', 'string', 500, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 500,
             ));
        $this->hasColumn('id_simple', 'string', 500, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 500,
             ));
        $this->hasColumn('cantidad', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('fecha_compuesto', 'timestamp', 25, array(
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