<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('HistPago', 'artelamp_1');

/**
 * BaseHistPago
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id_hist_pago
 * @property integer $id_hist_cuota
 * @property timestamp $fecha_hist_pago
 * @property integer $monto_hist_pago
 * @property string $tipopago_tipo_pago
 * @property HistCuota $HistCuota
 * 
 * @method integer   getIdHistPago()         Returns the current record's "id_hist_pago" value
 * @method integer   getIdHistCuota()        Returns the current record's "id_hist_cuota" value
 * @method timestamp getFechaHistPago()      Returns the current record's "fecha_hist_pago" value
 * @method integer   getMontoHistPago()      Returns the current record's "monto_hist_pago" value
 * @method string    getTipopagoTipoPago()   Returns the current record's "tipopago_tipo_pago" value
 * @method HistCuota getHistCuota()          Returns the current record's "HistCuota" value
 * @method HistPago  setIdHistPago()         Sets the current record's "id_hist_pago" value
 * @method HistPago  setIdHistCuota()        Sets the current record's "id_hist_cuota" value
 * @method HistPago  setFechaHistPago()      Sets the current record's "fecha_hist_pago" value
 * @method HistPago  setMontoHistPago()      Sets the current record's "monto_hist_pago" value
 * @method HistPago  setTipopagoTipoPago()   Sets the current record's "tipopago_tipo_pago" value
 * @method HistPago  setHistCuota()          Sets the current record's "HistCuota" value
 * 
 * @package    sffacturacion
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseHistPago extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('hist_pago');
        $this->hasColumn('id_hist_pago', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('id_hist_cuota', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('fecha_hist_pago', 'timestamp', 25, array(
             'type' => 'timestamp',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 25,
             ));
        $this->hasColumn('monto_hist_pago', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('tipopago_tipo_pago', 'string', 50, array(
             'type' => 'string',
             'fixed' => 1,
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
        $this->hasOne('HistCuota', array(
             'local' => 'id_hist_cuota',
             'foreign' => 'id_hist_cuota'));
    }
}