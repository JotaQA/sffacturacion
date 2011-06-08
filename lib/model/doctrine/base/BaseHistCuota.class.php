<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('HistCuota', 'artelamp_1');

/**
 * BaseHistCuota
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id_hist_cuota
 * @property integer $id_factura
 * @property integer $monto_hist_cuota
 * @property integer $montopagado_hist_cuota
 * @property timestamp $fechavencimiento_hist_cuota
 * @property string $comentario_hist_cuota
 * @property string $estado_hist_cuota
 * @property Factura $Factura
 * @property Doctrine_Collection $HistPago
 * 
 * @method integer             getIdHistCuota()                 Returns the current record's "id_hist_cuota" value
 * @method integer             getIdFactura()                   Returns the current record's "id_factura" value
 * @method integer             getMontoHistCuota()              Returns the current record's "monto_hist_cuota" value
 * @method integer             getMontopagadoHistCuota()        Returns the current record's "montopagado_hist_cuota" value
 * @method timestamp           getFechavencimientoHistCuota()   Returns the current record's "fechavencimiento_hist_cuota" value
 * @method string              getComentarioHistCuota()         Returns the current record's "comentario_hist_cuota" value
 * @method string              getEstadoHistCuota()             Returns the current record's "estado_hist_cuota" value
 * @method Factura             getFactura()                     Returns the current record's "Factura" value
 * @method Doctrine_Collection getHistPago()                    Returns the current record's "HistPago" collection
 * @method HistCuota           setIdHistCuota()                 Sets the current record's "id_hist_cuota" value
 * @method HistCuota           setIdFactura()                   Sets the current record's "id_factura" value
 * @method HistCuota           setMontoHistCuota()              Sets the current record's "monto_hist_cuota" value
 * @method HistCuota           setMontopagadoHistCuota()        Sets the current record's "montopagado_hist_cuota" value
 * @method HistCuota           setFechavencimientoHistCuota()   Sets the current record's "fechavencimiento_hist_cuota" value
 * @method HistCuota           setComentarioHistCuota()         Sets the current record's "comentario_hist_cuota" value
 * @method HistCuota           setEstadoHistCuota()             Sets the current record's "estado_hist_cuota" value
 * @method HistCuota           setFactura()                     Sets the current record's "Factura" value
 * @method HistCuota           setHistPago()                    Sets the current record's "HistPago" collection
 * 
 * @package    sffacturacion
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseHistCuota extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('hist_cuota');
        $this->hasColumn('id_hist_cuota', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('id_factura', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('monto_hist_cuota', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('montopagado_hist_cuota', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('fechavencimiento_hist_cuota', 'timestamp', 25, array(
             'type' => 'timestamp',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 25,
             ));
        $this->hasColumn('comentario_hist_cuota', 'string', 300, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 300,
             ));
        $this->hasColumn('estado_hist_cuota', 'string', 300, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 300,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Factura', array(
             'local' => 'id_factura',
             'foreign' => 'id_factura'));

        $this->hasMany('HistPago', array(
             'local' => 'id_hist_cuota',
             'foreign' => 'id_hist_cuota'));
    }
}