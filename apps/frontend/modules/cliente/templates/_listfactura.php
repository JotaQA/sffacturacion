<?php use_helper('Number') ?>
<?php $sf_user->setCulture('es_CL') ?>
<script type="text/javascript">
    $('#deuda').text('<?php echo $deuda ?>');
    $('#pagado').text('<?php echo $pagado ?>')
</script>
<table width="100%">
  <thead>
    <tr>
<!--      <th>Id factura</th>-->
      <th>Numero</th>
      <th>Estado</th>
      <th>Cliente</th>
<!--      <th>Id division</th>-->

      <th>Ingreso</th>
      <th>Emision</th>
      <th>Total</th>
      <th>Pagado</th>
<!--      <th>Id notapedido factura</th>-->
<!--      <th>Rut factura</th>
      <th>Telefono factura</th>
      <th>Nombre factura</th>
      <th>Direccion factura</th>
      <th>Comuna factura</th>
      <th>Ciudad factura</th>
      <th>Giro factura</th>
      <th>Oc factura</th>-->
      <th width="50px">C. Pago</th>
      <th>Responsable</th>
      <th>Coment</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($facturas as $factura): ?>
      <?php if( count($factura->getCuota()) > 0){ ?>
      <tr class="<?php echo 'factura'.$factura->getIdFactura()?>" style="cursor: pointer;" onclick="mostrar_cuotas(<?php echo $factura->getIdFactura() ?>)">
<!--      <td><a href="<?php echo url_for('factura/show?id_factura='.$factura->getIdFactura()) ?>"><?php echo $factura->getIdFactura() ?></a></td>-->
      <td><?php echo $factura->getNumeroFactura() ?></td>
      <td><?php echo $factura->getEstado() ?></td>
      <td title="<?php echo $factura->getDatosCliente() ?>"><?php echo $factura->getNombreFacturaCorto(17) ?></td>
<!--      <td><?php echo $factura->getIdDivision() ?></td>-->

      <td><?php echo $factura->getDateTimeObject('fechaingreso_factura')->format('d/m/Y') ?></td>
      <td><?php echo $factura->getFechaemisionFacturaCustom() ?></td>
      <td><?php echo format_currency($factura->getMontoFactura(),'CLP') ?></td>
      <td><?php echo format_currency($factura->getMontoFactura()-$factura->getSaldoFactura(),'CLP') ?></td>
<!--      <td><?php echo $factura->getIdNotapedidoFactura() ?></td>-->
<!--      <td><?php echo $factura->getRutFactura() ?></td>
      <td><?php echo $factura->getTelefonoFactura() ?></td>
      <td><?php echo $factura->getNombreFactura() ?></td>
      <td><?php echo $factura->getDireccionFactura() ?></td>
      <td><?php echo $factura->getComunaFactura() ?></td>
      <td><?php echo $factura->getCiudadFactura() ?></td>
      <td><?php echo $factura->getGiroFactura() ?></td>
      <td><?php echo $factura->getOcFactura() ?></td>-->
      <td><?php echo $factura->getCondicionpagoFactura() ?></td>
      <td><?php echo $factura->getResponsableFacturaCorto(15) ?></td>
      <?php echo $factura->getComentarioFacturaTD(ESC_RAW) ?>
    </tr>
    <tbody class="<?php echo 'cuotas'.$factura->getIdFactura()?>" style="display: none">
      <tr class="trchico">
<!--          <th>Id cuota</th>-->
          <td></td>
          <td>Estado</td>
          <td></td>
          <td>Vencimiento</td>
          <td></td>
<!--          <th>Accion cuota</th>-->
          <td>Total</td>
          <td>Pagado</td>
          <td></td>
          <td></td>
          <td>Coment</td>
      </tr>
      <?php foreach ($factura->getCuota() as $cuota): ?>
      <tr>
<!--          <td><a href="<?php echo url_for('cuota/show?id_cuota='.$cuota->getIdCuota()) ?>"><?php echo $cuota->getIdCuota() ?></a></td>-->
          <td></td>
          <td><?php echo $cuota->getEstadoCuota()->getNombreEstadoCuota() ?></td>
          <td></td>
          <td><?php echo $cuota->getDateTimeObject('fechavencimiento_cuota')->format('d/m/Y') ?></td>
          <td></td>
<!--          <td><?php echo $cuota->getAccionCuota() ?></td>-->
          <td><?php echo format_currency($cuota->getMontoCuota(),'CLP') ?></td>
          <td><?php echo format_currency($cuota->getMontopagadoCuota(),'CLP') ?></td>
          <td></td>
          <td></td>
          <?php echo $cuota->getComentarioCuotaTD(ESC_RAW) ?>
      </tr>
      <?php endforeach; ?>
      <tr class="trchico"><td colspan="10"></td></tr>
    </tbody>


    <?php }else{ ?>
    <tr class="<?php echo 'factura'.$factura->getIdFactura()?>">
<!--      <td><a href="<?php echo url_for('factura/show?id_factura='.$factura->getIdFactura()) ?>"><?php echo $factura->getIdFactura() ?></a></td>-->
      <td><?php echo $factura->getNumeroFactura() ?></td>
      <td><?php echo $factura->getEstado() ?></td>
      <td title="<?php echo $factura->getDatosCliente() ?>"><?php echo $factura->getNombreFacturaCorto(17) ?></td>
<!--      <td><?php echo $factura->getIdDivision() ?></td>-->

      <td><?php echo $factura->getDateTimeObject('fechaingreso_factura')->format('d/m/Y') ?></td>
      <td><?php echo $factura->getFechaemisionFacturaCustom() ?></td>
      <td><?php echo format_currency($factura->getMontoFactura(),'CLP') ?></td>
      <td><?php echo format_currency($factura->getMontoFactura()-$factura->getSaldoFactura(),'CLP') ?></td>
<!--      <td><?php echo $factura->getIdNotapedidoFactura() ?></td>-->
<!--      <td><?php echo $factura->getRutFactura() ?></td>
      <td><?php echo $factura->getTelefonoFactura() ?></td>
      <td><?php echo $factura->getNombreFactura() ?></td>
      <td><?php echo $factura->getDireccionFactura() ?></td>
      <td><?php echo $factura->getComunaFactura() ?></td>
      <td><?php echo $factura->getCiudadFactura() ?></td>
      <td><?php echo $factura->getGiroFactura() ?></td>
      <td><?php echo $factura->getOcFactura() ?></td>-->
      <td><?php echo $factura->getCondicionpagoFactura() ?></td>
      <td><?php echo $factura->getResponsableFacturaCorto(15) ?></td>
      <?php echo $factura->getComentarioFacturaTD(ESC_RAW) ?>
    </tr>
    <?php } ?>

    <?php endforeach; ?>
  </tbody>
</table>