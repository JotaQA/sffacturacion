<?php use_helper('Number') ?>
<?php $sf_user->setCulture('es_CL') ?>
<table width="100%">
  <thead>
    <tr>
<!--      <th>Id factura</th>-->

<!--      <th>Id division</th>-->
      <th>Numero</th>
      <th>Estado</th>
      <th>Cliente</th>
      <th>Vendedor</th>
<!--      <th>Ingreso</th>-->
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
      <th>Oc factura</th>
      <th>Condicionpago factura</th>
      <th>Responsable factura</th>-->
      <th>Coment</th>
      <th align="center">Acción</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($facturas as $factura): ?>
    <tr>
<!--      <td><a href="<?php echo url_for('factura/edit?id_factura='.$factura->getIdFactura()) ?>"><?php echo $factura->getIdFactura() ?></a></td>-->

<!--      <td><?php echo $factura->getIdDivision() ?></td>-->
      <td><?php echo link_to($factura->getFacturaTipo(ESC_RAW), 'factura/cambiartipo?id_factura='.$factura->getIdFactura(), array(
  'popup' => array('popupWindow', 'width=750,height=400,left=320,top=100'))).$factura->getNumeroFactura() ?></td>
      <td><?php echo $factura->getEstado() ?></td>
      <td title="<?php echo $factura->getDatosCliente() ?>"><?php echo $factura->getNombreFacturaCorto(17) ?></td>
      <td><?php echo $factura->getNombreVendedor() ?></td>
<!--      <td><?php echo $factura->getDateTimeObject('fechaingreso_factura')->format('d/m/Y') ?></td>-->
      <td><?php echo $factura->getFechaemisionFacturaCustom() ?></td>
      <td><?php echo format_currency($factura->getMontoFactura(),'CLP') ?></td>
      <td><?php echo format_currency($factura->getMontoFactura()-$factura->getSaldoFactura(),'CLP') ?></td>
<!--      <td><?php echo $factura->getIdNotapedidoFactura() ?></td>
      <td><?php echo $factura->getRutFactura() ?></td>
      <td><?php echo $factura->getTelefonoFactura() ?></td>
      <td><?php echo $factura->getNombreFactura() ?></td>
      <td><?php echo $factura->getDireccionFactura() ?></td>
      <td><?php echo $factura->getComunaFactura() ?></td>
      <td><?php echo $factura->getCiudadFactura() ?></td>
      <td><?php echo $factura->getGiroFactura() ?></td>
      <td><?php echo $factura->getOcFactura() ?></td>
      <td><?php echo $factura->getCondicionpagoFactura() ?></td>
      <td><?php echo $factura->getResponsableFactura() ?></td>-->
      <?php echo $factura->getComentarioFacturaTD(ESC_RAW) ?>
<!--      <td><?php echo link_to('Anular', 'factura/anular?id_factura='.$factura->getIdFactura(), array('method' => 'put' , 'confirm' => '¿Estas Seguro de ANULAR la Factura '.$factura->getNumeroFactura().'?')) ?></td>-->
<!--      <td><a href="#" onclick="anular('<?php echo $factura->getIdFactura() ?>')">Anular</a></td>-->
      <td><button onclick="anular('<?php echo $factura->getIdFactura() ?>','<?php echo $factura->getNumeroFactura() ?>');">Anular</button>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>