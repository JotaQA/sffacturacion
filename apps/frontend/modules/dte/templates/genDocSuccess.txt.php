->Encabezado<-
<?php echo $tipo ?>;<?php echo $tipo ?>;<?php echo $factura->getDateTimeObject('fechaemision_factura')->format('Y-m-d') ?>;0;0;<?php echo $factura->getRutFactura() ?>;<?php echo $factura->getNombreFactura() ?>;<?php echo $factura->getGiroFactura() ?>;<?php echo $factura->getDireccionFactura() ?>;<?php echo $factura->getComunaFactura() ?>;<?php echo $factura->getCiudadFactura() ?>;EMAILPENDIENTE;
->Totales<-
<?php $NETO = $factura->getNetoCalculado() ?>
<?php echo $factura->getDescuentoFactura() ?>;<?php echo ($factura->getDescuentoFactura() / 100)*$NETO ?>;0;0;<?php echo $NETO ?>;0;<?php echo $TasaIVA ?>;<?php $IVA = round($NETO*$TasaIVA/100); echo $IVA ?>;<?php echo ($IVA+$NETO)  ?>;
->Detalle<-
<?php $NroLinDet = 1 ?>
<?php foreach ($factura->getDetalleActivo() as $detalle): ?>
<?php echo $NroLinDet ?>;<?php echo $detalle->getCodigoexternoDetalleActivo() ?>;<?php echo substr($detalle->getDescripcionexternaDetalleActivo(),0,79) ?>;<?php echo $detalle->getCantidadDetalleActivo() ?>;<?php echo $detalle->getPrecioDetalleActivo() ?>;0;0;0;0;0;<?php echo ($detalle->getCantidadDetalleActivo() * $detalle->getPrecioDetalleActivo()) ?>;INT1;UN;<?php echo $detalle->getDescripcionexternaDetalleActivo() ?>;
<?php $NroLinDet++ ?>
<?php endforeach; ?>
->Observacion<-
<?php echo $factura->getResponsableFactura() ?>;
<?php echo $factura->getCondicionpagoFactura() ?>;
<?php echo substr($factura->getOcFactura().'-'.$factura->getComentarioFactura(),0,59) ?>;