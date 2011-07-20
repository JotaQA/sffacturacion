<?php echo '<?xml version="1.0" encoding="ISO-8859-1"?>' ?>
<?php
function formatRut($rut){
    return str_replace('.','',$rut);
}
?>

<DTE>
    <Documento>
        <?php switch($tipo):
        case 33: ?>
<!--        FACTURA-->
        <Encabezado>
            <IdDoc>
                <TipoDTE><?php echo $tipo ?></TipoDTE>
                <Folio><?php echo $factura->getNumeroFactura() ?></Folio>
                <FchEmis><?php echo $factura->getDateTimeObject('fechaemision_factura')->format('Y-m-d') ?></FchEmis>
                <TipoDespacho>0</TipoDespacho>
                <IndTraslado>0</IndTraslado>
            </IdDoc>
            <Emisor>
                <RUTEmisor><?php echo formatRut($RUTEmisor) ?></RUTEmisor>
                <RznSoc><?php echo substr($RznSoc,0,100) ?></RznSoc>
                <GiroEmis><?php echo substr($GiroEmis,0,80) ?></GiroEmis>
                <Acteco><?php echo $Acteco ?></Acteco>
                <DirOrigen><?php echo substr($DirOrigen,0,60) ?></DirOrigen>
                <CmnaOrigen><?php echo substr($CmnaOrigen,0,20) ?></CmnaOrigen>
                <CiudadOrigen><?php echo substr($CiudadOrigen,0,20) ?></CiudadOrigen>
            </Emisor>
            <Receptor>
                <RUTRecep><?php echo formatRut($factura->getRutFactura()) ?></RUTRecep>
                <RznSocRecep><?php echo substr($factura->getNombreFactura(),0,100) ?></RznSocRecep>
                <GiroRecep><?php echo substr($factura->getGiroFactura(),0,40) ?></GiroRecep>
                <DirRecep><?php echo substr($factura->getDireccionFactura(),0,60) ?></DirRecep>
                <CmnaRecep><?php echo substr($factura->getComunaFactura(),0,20) ?></CmnaRecep>
                <CiudadRecep><?php echo substr($factura->getCiudadFactura(),0,20) ?></CiudadRecep>
            </Receptor>
            <Totales>
                <?php $NETO = $factura->getNetoCalculado()*(1-$factura->getDescuentoFactura()/100) ?>
                <MntNeto><?php echo $NETO ?></MntNeto>
                <MntExe>0</MntExe>
                <TasaIVA><?php echo $TasaIVA ?></TasaIVA>
                <IVA><?php $IVA = round($NETO*$TasaIVA/100); echo $IVA ?></IVA>
                <MntTotal><?php echo ($IVA+$NETO)  ?></MntTotal>
            </Totales>
        </Encabezado>
        <?php $NroLinDet = 1 ?>
        <?php foreach ($factura->getDetalleActivo() as $detalle): ?>
        <Detalle>
            <NroLinDet><?php echo $NroLinDet ?></NroLinDet>
            <CdgItem>
                <TpoCodigo><?php echo $TpoCodigo ?></TpoCodigo>
                <VlrCodigo><?php echo substr($detalle->getCodigoexternoDetalleActivo(),0,35) ?></VlrCodigo>
            </CdgItem>
            <NmbItem><?php echo substr($detalle->getDescripcionexternaDetalleActivo(),0,80) ?></NmbItem>
            <QtyItem><?php echo $detalle->getCantidadDetalleActivo() ?></QtyItem>
            <PrcItem><?php echo $detalle->getPrecioDetalleActivo() ?></PrcItem>
            <MontoItem><?php echo ($detalle->getCantidadDetalleActivo() * $detalle->getPrecioDetalleActivo()) ?></MontoItem>
        </Detalle>
        <?php $NroLinDet++ ?>
        <?php endforeach; ?>
        <DscRcgGlobal>
            <NroLinDR>1</NroLinDR>
            <TpoMov>D</TpoMov>
            <GlosaDR><?php echo substr($GlosaDR,0,45) ?></GlosaDR>
            <TpoValor>%</TpoValor>
            <ValorDR><?php echo $factura->getDescuentoFactura() ?></ValorDR>
        </DscRcgGlobal>
        <Adicional>
            <NodosA>
                <A1><?php echo $factura->getCondicionpagoFactura() ?></A1>
                <A2><?php echo $factura->getResponsableFactura() ?></A2>
                <A3><?php echo $factura->getTelefonoFactura() ?></A3>
                <A4><?php echo $factura->getOcFactura() ?></A4>
                <A5><?php echo $factura->getIdNotapedidoFactura() ?></A5>
                <A6><?php echo $factura->getComentarioFactura() ?></A6>
            </NodosA>
        </Adicional>
        
        <?php break; ?>
        <?php case 39: ?>
<!--        BOLETA ELECTRONICA-->
        <Encabezado>
            <IdDoc>
                <TipoDTE><?php echo $tipo ?></TipoDTE>
                <Folio><?php echo $boleta->getNumeroBoleta() ?></Folio>
                <FchEmis><?php echo $boleta->getDateTimeObject('fechaemision_boleta')->format('Y-m-d') ?></FchEmis>
                <TipoDespacho>0</TipoDespacho>
                <IndTraslado>0</IndTraslado>
            </IdDoc>
            <Emisor>
                <RUTEmisor><?php echo formatRut($RUTEmisor) ?></RUTEmisor>
                <RznSoc><?php echo substr($RznSoc,0,100) ?></RznSoc>
                <GiroEmis><?php echo substr($GiroEmis,0,80) ?></GiroEmis>
                <Acteco><?php echo $Acteco ?></Acteco>
                <DirOrigen><?php echo substr($DirOrigen,0,60) ?></DirOrigen>
                <CmnaOrigen><?php echo substr($CmnaOrigen,0,20) ?></CmnaOrigen>
                <CiudadOrigen><?php echo substr($CiudadOrigen,0,20) ?></CiudadOrigen>
            </Emisor>
            <Receptor>
                <RUTRecep><?php echo formatRut($boleta->getRutBoleta()) ?></RUTRecep>
                <RznSocRecep><?php echo substr($boleta->getNombreBoleta(),0,100) ?></RznSocRecep>
                <GiroRecep><?php echo substr($boleta->getGiroBoleta(),0,40) ?></GiroRecep>
                <DirRecep><?php echo substr($boleta->getDireccionBoleta(),0,60) ?></DirRecep>
                <CmnaRecep><?php echo substr($boleta->getComunaBoleta(),0,20) ?></CmnaRecep>
                <CiudadRecep><?php echo substr($boleta->getCiudadBoleta(),0,20) ?></CiudadRecep>
            </Receptor>
            <Totales>
                <?php $NETO = $boleta->getNetoCalculado() ?>
                <MntNeto><?php echo $NETO ?></MntNeto>
                <MntExe>0</MntExe>
                <TasaIVA><?php echo $TasaIVA ?></TasaIVA>
                <IVA><?php $IVA = round($NETO*$TasaIVA/100); echo $IVA ?></IVA>
                <MntTotal><?php echo ($IVA+$NETO)  ?></MntTotal>
            </Totales>
        </Encabezado>

        <?php break; ?>
        <?php case 52: ?>
<!--        GUIA DE DESPACHO ELECTRONICA-->
        <Encabezado>
            <IdDoc>
                <TipoDTE><?php echo $tipo ?></TipoDTE>
                <Folio><?php echo $guia->getNumeroGuia() ?></Folio>
                <FchEmis><?php echo $guia->getDateTimeObject('fechaemision_guia')->format('Y-m-d') ?></FchEmis>
                <TipoDespacho><?php echo $TipoDespacho ?></TipoDespacho>
                <IndTraslado><?php echo $IndTraslado ?></IndTraslado>
            </IdDoc>
            <Emisor>
                <RUTEmisor><?php echo formatRut($RUTEmisor) ?></RUTEmisor>
                <RznSoc><?php echo substr($RznSoc,0,100) ?></RznSoc>
                <GiroEmis><?php echo substr($GiroEmis,0,80) ?></GiroEmis>
                <Acteco><?php echo $Acteco ?></Acteco>
                <DirOrigen><?php echo substr($DirOrigen,0,60) ?></DirOrigen>
                <CmnaOrigen><?php echo substr($CmnaOrigen,0,20) ?></CmnaOrigen>
                <CiudadOrigen><?php echo substr($CiudadOrigen,0,20) ?></CiudadOrigen>
            </Emisor>
            <Receptor>
                <RUTRecep><?php echo formatRut($guia->getRutGuia()) ?></RUTRecep>
                <RznSocRecep><?php echo substr($guia->getNombreGuia(),0,100) ?></RznSocRecep>
                <GiroRecep><?php echo substr($guia->getGiroGuia(),0,40) ?></GiroRecep>
                <DirRecep><?php echo substr($guia->getDireccionGuia(),0,60) ?></DirRecep>
                <CmnaRecep><?php echo substr($guia->getComunaGuia(),0,20) ?></CmnaRecep>
                <CiudadRecep><?php echo substr($guia->getCiudadGuia(),0,20) ?></CiudadRecep>
            </Receptor>
            <Totales>
                <?php $NETO = $guia->getNetoCalculado() ?>
                <MntNeto><?php echo $NETO ?></MntNeto>
                <MntExe>0</MntExe>
                <TasaIVA><?php echo $TasaIVA ?></TasaIVA>
                <IVA><?php $IVA = round($NETO*$TasaIVA/100); echo $IVA ?></IVA>
                <MntTotal><?php echo ($IVA+$NETO)  ?></MntTotal>
            </Totales>
        </Encabezado>
        <?php $NroLinDet = 1 ?>
        <?php foreach ($guia->getDetalleActivo() as $detalle): ?>
        <Detalle>
            <NroLinDet><?php echo $NroLinDet ?></NroLinDet>
            <CdgItem>
                <TpoCodigo><?php echo $TpoCodigo ?></TpoCodigo>
                <VlrCodigo><?php echo substr($detalle->getCodigoexternoDetalleActivo(),0,35) ?></VlrCodigo>
            </CdgItem>
            <NmbItem><?php echo substr($detalle->getDescripcionexternaDetalleActivo(),0,80) ?></NmbItem>
            <QtyItem><?php echo $detalle->getCantidadDetalleActivo() ?></QtyItem>
            <PrcItem><?php echo $detalle->getPrecioDetalleActivo() ?></PrcItem>
            <MontoItem><?php echo ($detalle->getCantidadDetalleActivo() * $detalle->getPrecioDetalleActivo()) ?></MontoItem>
        </Detalle>
        <?php $NroLinDet++ ?>
        <?php endforeach; ?>
        <Adicional>
            <NodosA>
                <A1><?php echo $guia->getResponsableGuia() ?></A1>
                <A2><?php echo $guia->getTelefonoGuia() ?></A2>
                <A3><?php echo $guia->getCondicionpagoGuia() ?></A3>
                <A4><?php echo $guia->getOcGuia() ?></A4>
                <A5></A5>
                <A6><?php echo $guia->getComentarioGuia() ?></A6>
            </NodosA>
        </Adicional>

        <?php break; ?>
        <?php case 56: ?>
<!--        NOTA DE DEBITO ELECTRONICA-->
        <?php break; ?>
        <?php case 61: ?>
<!--        NOTA DE CREDITO ELECTRONICA-->
        <Encabezado>
            <IdDoc>
                <TipoDTE><?php echo $tipo ?></TipoDTE>
                <Folio><?php echo $nc->getNumeroNotaCredito() ?></Folio>
                <FchEmis><?php echo $nc->getDateTimeObject('fechaemision_nota_credito')->format('Y-m-d') ?></FchEmis>
            </IdDoc>
            <Emisor>
                <RUTEmisor><?php echo formatRut($RUTEmisor) ?></RUTEmisor>
                <RznSoc><?php echo substr($RznSoc,0,100) ?></RznSoc>
                <GiroEmis><?php echo substr($GiroEmis,0,80) ?></GiroEmis>
                <Acteco><?php echo $Acteco ?></Acteco>
                <DirOrigen><?php echo substr($DirOrigen,0,60) ?></DirOrigen>
                <CmnaOrigen><?php echo substr($CmnaOrigen,0,20) ?></CmnaOrigen>
                <CiudadOrigen><?php echo substr($CiudadOrigen,0,20) ?></CiudadOrigen>
            </Emisor>
            <Receptor>
                <RUTRecep><?php echo formatRut($nc->getRutNotaCredito()) ?></RUTRecep>
                <RznSocRecep><?php echo substr($nc->getNombreNotaCredito(),0,100) ?></RznSocRecep>
                <GiroRecep><?php echo substr($nc->getGiroNotaCredito(),0,40) ?></GiroRecep>
                <DirRecep><?php echo substr($nc->getDireccionNotaCredito(),0,60) ?></DirRecep>
                <CmnaRecep><?php echo substr($nc->getComunaNotaCredito(),0,20) ?></CmnaRecep>
                <CiudadRecep><?php echo substr($nc->getCiudadNotaCredito(),20) ?></CiudadRecep>
            </Receptor>
            <Totales>
                <?php $NETO = $nc->getNetoCalculado() ?>
                <MntNeto><?php echo $NETO ?></MntNeto>
                <MntExe>0</MntExe>
                <TasaIVA><?php echo $TasaIVA ?></TasaIVA>
                <IVA><?php $IVA = round($NETO*$TasaIVA/100); echo $IVA ?></IVA>
                <MntTotal><?php echo ($IVA+$NETO)  ?></MntTotal>
            </Totales>
        </Encabezado>
        <?php $NroLinDet = 1 ?>
        <?php foreach ($nc->getNotacreditoDetalle() as $ncd): ?>
        <Detalle>
            <NroLinDet><?php echo $NroLinDet ?></NroLinDet>
            <CdgItem>
                <TpoCodigo><?php echo $TpoCodigo ?></TpoCodigo>
                <VlrCodigo><?php echo substr($ncd->getDetalleActivo()->getCodigoexternoDetalleActivo(),0,35) ?></VlrCodigo>
            </CdgItem>
            <NmbItem><?php echo substr($ncd->getDetalleActivo()->getDescripcionexternaDetalleActivo(),0,80) ?></NmbItem>
            <QtyItem><?php echo $ncd->getDetalleActivo()->getCantidadDetalleActivo() ?></QtyItem>
            <PrcItem><?php echo $ncd->getDetalleActivo()->getPrecioDetalleActivo() ?></PrcItem>
            <MontoItem><?php echo ($ncd->getDetalleActivo()->getCantidadDetalleActivo() * $ncd->getDetalleActivo()->getPrecioDetalleActivo()) ?></MontoItem>
        </Detalle>
        <?php $NroLinDet++ ?>
        <?php endforeach; ?>
        <?php $NroLinRef = 1 ?>
        <?php foreach ($facturas as $factura): ?>
        <Referencia>
            <NroLinRef><?php echo $NroLinRef ?></NroLinRef>
            <TpoDocRef><?php echo $TpoDocRef ?></TpoDocRef>
            <FolioRef><?php echo $factura->getNumeroFactura() ?></FolioRef>
            <FchRef><?php echo $factura->getDateTimeObject('fechaemision_factura')->format('Y-m-d') ?></FchRef>
            <CodRef><?php echo $CodRef ?></CodRef>
            <RazonRef><?php echo substr($RazonRef,0,90) ?></RazonRef>
        </Referencia>
        <?php $NroLinRef++ ?>
        <?php endforeach; ?>
        <?php break; ?>
        <?php endswitch; ?>
        
    </Documento>
</DTE>