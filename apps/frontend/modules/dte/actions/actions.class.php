<?php

/**
 * cliente actions.
 *
 * @package    sffacturacion
 * @subpackage cliente
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class dteActions extends sfActions
{
    public function executeGenDoc(sfWebRequest $request) {
//        30 FACTURA
//        32 FACTURA EXENTA
//        33 FACTURA ELECTRONICA
//        34 FACTURA EXENTA ELECTRONICA
//        35 BOLETA
//        38 BOLETA EXENTA
//        39 BOLETA ELECTRONICA
//        40 LIQUIDACION FACTURA
//        45 FACTURA DE COMPRA
//        46 FACTURA DE COMPRA ELECTRONICA
//        50 GUIA DE DESPACHO
//        52 GUIA DE DESPACHO ELECTRONICA
//        55 NOTA DE DEBITO
//        56 NOTA DE DEBITO ELECTRONICA
//        60 NOTA DE CREDITO
//        61 NOTA DE CREDITO ELECTRONICA

//        $this->forward404Unless($id = $request->getParameter('id'));
        Doctrine_Manager::getInstance()->setCurrentConnection('artelamp_1');
        $id = 11;
        $empresa = Doctrine_Core::getTable('Empresa')->find(1);
        $this->tipo = 39;
        $this->RUTEmisor = $empresa->getRutEmpresa();
        $this->RznSoc = $empresa->getRazonSocial();
        $this->GiroEmis = $empresa->getRubro();
        $this->Acteco = 5190;
        $this->DirOrigen = $empresa->getDireccion();
        $this->CmnaOrigen = $empresa->getComuna();
        $this->CiudadOrigen = $empresa->getCiudad();
        $parametros = Doctrine_Core::getTable('Parametro')->findAll();
        foreach ($parametros as $parametro){
            if($parametro->getNombreParametro() == 'IVA'){
                $this->TasaIVA = $parametro->getValorParametro()*100;
                break;
            }
        }
        $this->TpoCodigo = 'INT1';
        $this->GlosaDR = 'Descto';
        

        switch ($this->tipo){
            case 33://FACTURA
                $facturas = Doctrine_Query::create()
                    ->select('f.*, da.*')
                    ->from('Factura f')
//                    ->innerJoin('f.EstadoFactura e')
                    ->innerJoin('f.DetalleActivo da')
                    ->where('f.id_factura = ?', $id)
                    ->execute();
                if(count($facturas) == 0) return $this->renderText('ERROR: NINGUNA FACTURA ENCONTRADA');
                $this->factura = $facturas[0];
                break;
            case 39://BOLETA
                $bolestas = Doctrine_Query::create()
                    ->select('b.*, da.*')
                    ->from('Boleta b')
//                    ->innerJoin('f.EstadoFactura e')
                    ->innerJoin('b.DetalleActivo da')
                    ->where('b.id_boleta = ?', $id)
                    ->execute();
                if(count($bolestas) == 0) return $this->renderText('ERROR: NINGUNA BOLETA ENCONTRADA');
                $this->boleta = $bolestas[0];
                break;
            case 52://GUIA
                $guias = Doctrine_Query::create()
                    ->select('g.*, da.*')
                    ->from('Guia g')
//                    ->innerJoin('f.EstadoFactura e')
                    ->innerJoin('g.DetalleActivo da')
                    ->where('g.id_guia = ?', $id)
                    ->execute();
                if(count($guias) == 0) return $this->renderText('ERROR: NINGUNA GUIA ENCONTRADA');
                $this->guia = $guias[0];
                
//                0: Sin Despacho.
//                1: Despacho por cuenta del receptor del documento (cliente o vendedor en caso de
//                Facturas de compra.)
//                2: Despacho por cuenta del emisor a instalaciones del cliente
//                3: Despacho por cuenta del emisor a otras instalaciones (Ejemplo: entrega en Obra)
                $this->TipoDespacho = 2;
                
//                0: Sin Traslado.
//                1: Operación constituye venta.
//                2: Ventas por efectuar.
//                3: Consignaciones.
//                4: Entrega gratuita.
//                5: Traslados internos.
//                6: Otros traslados no venta.
//                7: Guía de devolución.
                $this->IndTraslado = 1;
                break;
            case 61://NOTA DE CREDITO ELECTRONICA
                $ncs = Doctrine_Query::create()
                    ->select('nc.*, da.*')
                    ->from('NotaCredito nc')
//                    ->innerJoin('f.EstadoFactura e')
                    ->innerJoin('nc.DetalleActivo da')
                    ->where('nc.id_nota_credito = ?', $id)
                    ->execute();
                if(count($ncs) == 0) return $this->renderText('ERROR: NINGUNA NOTA DE CREDITO ENCONTRADA');
                $this->nc = $ncs[0];
//                $id_facturas = array();
//                foreach ($ncs as $nc){
//                    foreach ($nc->getNotacreditoDetalle() as $ncd){
//                        if(!in_array($ncd->getDetalleActivo()->getIdFactura(), $id_facturas)) $id_facturas[] = $ncd->getDetalleActivo()->getIdFactura();
//                    }
//                }
//                $facturas = Doctrine_Query::create()
//                    ->select('f.*')
//                    ->from('Factura f')
////                    ->innerJoin('f.EstadoFactura e')
//                    ->whereIn('f.id_factura', $id_facturas)
//                    ->execute();
                $facturas = Doctrine_Query::create()
                    ->select('f.*')
                    ->from('Factura f')
                    ->innerJoin('f.ReferenciaDocumento rd')
                    ->Where('rd.id_nota_credito = ?', $id)
                    ->execute();
                $this->facturas = $facturas;
                //NC PARA FACTURA
                $this->TpoDocRef = 33;
//                CodRef: Indica los distintos casos de referencia, los cuales pueden ser:
//                1: Anula Documento de Referencia.
//                2: Corrige Texto Documento de Referencia.
//                3: Corrige Montos.
                $this->CodRef = 1;
                $this->RazonRef = 'Anula Documento Ref.';
            break;
        }
        
    }
    
    
    public function executeTest(sfWebRequest $request) {
//        $client = new SoapClient("http://netpub.cstudies.ubc.ca/dotnet/WebServices/FuelCalculator.asmx?wsdl");
//        $parametros=array();
//        $parametros['Kilometres_Travelled']=1;
//        $parametros['Litres_Consumed']=12;
//        $this->r = $client->FuelCalculator($parametros)->FuelCalculatorResult;
//        $this->r = $client->__getFunctions();
        ini_set('default_socket_timeout', 5);
        $client = new SoapClient("http://www.webservicex.net/globalweather.asmx?wsdl", array(
//            'connection_timeout' => 1, 
//            'timeout' => 10, 
//            "features" => SOAP_SINGLE_ELEMENT_ARRAYS,
            'trace'=>1
            ));
        $parametros=array();
        $parametros['CountryName']='Chile';
//        $parametros['CityName']='Santiago';
        try {
//            $this->r = $client->GetCitiesByCountry($parametros)->GetCitiesByCountryResult;
            $xml = $client->GetCitiesByCountry($parametros)->GetCitiesByCountryResult;
            $xml = preg_replace('/(<\?xml[^?]+?)utf-16/i', '$1utf-8', $xml);
            $sxmle = new SimpleXMLElement($xml);
            $this->r = $sxmle;

        } catch (SoapFault $fault) {
            $this->r = "Sorry, returned the following ERROR: ".$fault->faultcode."-".$fault->faultstring;
        }
    }

}
