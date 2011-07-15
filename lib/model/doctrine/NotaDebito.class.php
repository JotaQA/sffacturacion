<?php

/**
 * NotaDebito
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    sffacturacion
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class NotaDebito extends BaseNotaDebito
{
    public function save(Doctrine_Connection $conn = null) {
        if ($this->isNew()){
            //SE INGRESA CON LA FECHA ACTUAL
            $this->setFechaingresoNotaDebito(date('Y-m-d H:i:s'));
            //ESTADO EMITIDA
            $EEMITIDA = Doctrine::getTable('EstadoNotaDebito')->findOneByNombreEstadoNotaDebito('Emitida');            
            $this->setEstadoNotaDebito($EEMITIDA);
            $this->setTipoNotaDebito('FISICA');
        }

        return parent::save($conn);
    }

}