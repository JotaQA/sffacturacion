<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('Espacio', 'artelamp');

/**
 * BaseEspacio
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id_espacio
 * @property integer $id_pasillo
 * @property string $codigo_espacio
 * @property string $descripcion_espacio
 * @property Pasillo $Pasillo
 * @property Doctrine_Collection $Existencia
 * 
 * @method integer             getIdEspacio()           Returns the current record's "id_espacio" value
 * @method integer             getIdPasillo()           Returns the current record's "id_pasillo" value
 * @method string              getCodigoEspacio()       Returns the current record's "codigo_espacio" value
 * @method string              getDescripcionEspacio()  Returns the current record's "descripcion_espacio" value
 * @method Pasillo             getPasillo()             Returns the current record's "Pasillo" value
 * @method Doctrine_Collection getExistencia()          Returns the current record's "Existencia" collection
 * @method Espacio             setIdEspacio()           Sets the current record's "id_espacio" value
 * @method Espacio             setIdPasillo()           Sets the current record's "id_pasillo" value
 * @method Espacio             setCodigoEspacio()       Sets the current record's "codigo_espacio" value
 * @method Espacio             setDescripcionEspacio()  Sets the current record's "descripcion_espacio" value
 * @method Espacio             setPasillo()             Sets the current record's "Pasillo" value
 * @method Espacio             setExistencia()          Sets the current record's "Existencia" collection
 * 
 * @package    sffacturacion
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseEspacio extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('espacio');
        $this->hasColumn('id_espacio', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('id_pasillo', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('codigo_espacio', 'string', 15, array(
             'type' => 'string',
             'fixed' => 1,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 15,
             ));
        $this->hasColumn('descripcion_espacio', 'string', 50, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 50,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Pasillo', array(
             'local' => 'id_pasillo',
             'foreign' => 'id_pasillo'));

        $this->hasMany('Existencia', array(
             'local' => 'id_espacio',
             'foreign' => 'id_espacio'));
    }
}