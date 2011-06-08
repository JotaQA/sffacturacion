<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('ActivosCompuestos', 'artelamp');

/**
 * BaseActivosCompuestos
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $codigoemp
 * @property string $descripcion
 * @property string $comentario
 * @property timestamp $fecha
 * 
 * @method string            getCodigoemp()   Returns the current record's "codigoemp" value
 * @method string            getDescripcion() Returns the current record's "descripcion" value
 * @method string            getComentario()  Returns the current record's "comentario" value
 * @method timestamp         getFecha()       Returns the current record's "fecha" value
 * @method ActivosCompuestos setCodigoemp()   Sets the current record's "codigoemp" value
 * @method ActivosCompuestos setDescripcion() Sets the current record's "descripcion" value
 * @method ActivosCompuestos setComentario()  Sets the current record's "comentario" value
 * @method ActivosCompuestos setFecha()       Sets the current record's "fecha" value
 * 
 * @package    sffacturacion
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7691 2011-02-04 15:43:29Z jwage $
 */
abstract class BaseActivosCompuestos extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('activos_compuestos');
        $this->hasColumn('codigoemp', 'string', 50, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => false,
             'length' => 50,
             ));
        $this->hasColumn('descripcion', 'string', 500, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 500,
             ));
        $this->hasColumn('comentario', 'string', 500, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 500,
             ));
        $this->hasColumn('fecha', 'timestamp', 25, array(
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