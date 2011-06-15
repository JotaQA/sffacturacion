<?php
// Connection Component Binding
//Doctrine_Manager::getInstance()->bindComponent('Pago', 'artelamp_1');

/**
 * BasePago
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id_pago
 * @property integer $id_cuota
 * @property integer $id_tipo_pago
 * @property timestamp $fecha_pago
 * @property integer $monto_pago
 * @property Cuota $Cuota
 * @property TipoPago $TipoPago
 * 
 * @method integer   getIdPago()       Returns the current record's "id_pago" value
 * @method integer   getIdCuota()      Returns the current record's "id_cuota" value
 * @method integer   getIdTipoPago()   Returns the current record's "id_tipo_pago" value
 * @method timestamp getFechaPago()    Returns the current record's "fecha_pago" value
 * @method integer   getMontoPago()    Returns the current record's "monto_pago" value
 * @method Cuota     getCuota()        Returns the current record's "Cuota" value
 * @method TipoPago  getTipoPago()     Returns the current record's "TipoPago" value
 * @method Pago      setIdPago()       Sets the current record's "id_pago" value
 * @method Pago      setIdCuota()      Sets the current record's "id_cuota" value
 * @method Pago      setIdTipoPago()   Sets the current record's "id_tipo_pago" value
 * @method Pago      setFechaPago()    Sets the current record's "fecha_pago" value
 * @method Pago      setMontoPago()    Sets the current record's "monto_pago" value
 * @method Pago      setCuota()        Sets the current record's "Cuota" value
 * @method Pago      setTipoPago()     Sets the current record's "TipoPago" value
 * 
 * @package    sffacturacion
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BasePago extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('pago');
        $this->hasColumn('id_pago', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('id_cuota', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('id_tipo_pago', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('fecha_pago', 'timestamp', 25, array(
             'type' => 'timestamp',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 25,
             ));
        $this->hasColumn('monto_pago', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 4,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Cuota', array(
             'local' => 'id_cuota',
             'foreign' => 'id_cuota'));

        $this->hasOne('TipoPago', array(
             'local' => 'id_tipo_pago',
             'foreign' => 'id_tipo_pago'));
    }
}