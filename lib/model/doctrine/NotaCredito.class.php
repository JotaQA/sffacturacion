<?php

/**
 * NotaCredito
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    sffacturacion
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7691 2011-02-04 15:43:29Z jwage $
 */
class NotaCredito extends BaseNotaCredito
{
//    public function copiarDeFactura($id_factura){
//        $FACTURA = Doctrine::getTable('Factura')->findOneByIdFactura($id_factura);
//        $EEMITIDA = Doctrine::getTable('EstadoNotaCredito')->findOneByNombreEstadoNotaCredito('Emitida');
        //SE COPIAN TODOS LOS VALORES EXCEPTO
//        NumeroNotaCredito
//        NetoNotaCredito
//        TotalNotaCredito
//        if($FACTURA != null){
//            $this->setNumerofacturaNotaCredito($FACTURA->getNumeroFactura()); //NUMERO FACTURA
//            $now = time();
//            $this->setFechaingresoNotaCredito(date('Y-m-d H:i:s', $now));//FECHA INGRESO
//            $this->setFechaemisionNotaCredito(date('Y-m-d H:i:s', $now));//FECHA EMISION
//            $this->setIdNotapedidoNotaCredito($FACTURA->getIdNotapedidoFactura());//NOTA PEDIDO
//            $this->setRutNotaCredito($FACTURA->getRutFactura());//RUT
//            $this->setTelefonoNotaCredito($FACTURA->getTelefonoFactura());//TELEFONO
//            $this->setNombreNotaCredito($FACTURA->getNombreFactura());//NOMBRE
//            $this->setDireccionNotaCredito($FACTURA->getDireccionFactura());//DIRECCION
//            $this->setComunaNotaCredito($FACTURA->getComunaFactura());//COMUNA
//            $this->setCiudadNotaCredito($FACTURA->getCiudadFactura());//CIUDAD            
//            $this->setGiroNotaCredito($FACTURA->getGiroFactura());//GIRO          
//            $this->setOcNotaCredito($FACTURA->getOcFactura());//OC
//            $this->setCondicionpagoNotaCredito($FACTURA->getCondicionpagoFactura());//CONDICION PAGO            
//            $this->setResponsableNotaCredito($FACTURA->getResponsableFactura());//RESPONSABLE           
//            $this->setComentariorNotaCredito($FACTURA->getComentarioFactura());//COMENTARIO
//            $this->setEstadoNotaCredito($EEMITIDA);//ESTADO EMITIDA
//        }
//    }
    
    public function getNetoCalculado(){
        $neto = 0;
        foreach ($this->getDetalleActivo() as $detalle){
            $neto += $detalle->getPrecioDetalleActivo()*$detalle->getCantidadDetalleActivo();
        }
        return $neto;
    }

    public function save(Doctrine_Connection $conn = null) {
        if ($this->isNew()){
            //SE INGRESA CON LA FECHA ACTUAL
            $this->setFechaingresoNotaCredito(date('Y-m-d H:i:s'));
            //ESTADO EMITIDA
            $EEMITIDA = Doctrine::getTable('EstadoNotaCredito')->findOneByNombreEstadoNotaCredito('Emitida');            
            $this->setEstadoNotaCredito($EEMITIDA);
            $this->setTipoNotaCredito('FISICA');
        }

        return parent::save($conn);
    }
}