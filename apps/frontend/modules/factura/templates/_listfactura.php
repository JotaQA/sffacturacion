<?php use_helper('Number') ?>
<?php $sf_user->setCulture('es_CL') ?>
<table width="100%">
  <thead>
    <tr>
      <th>Numero</th>
      <th>Estado</th>
      <th>Cliente</th>
      <th>Vendedor</th>

      <th>Emision</th>
      <th>Total</th>
      <th>Pagado</th>
      <th>Coment</th>
      <th align="center">Acción</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($pager->getResults() as $factura): ?>
    <tr>
      <td><?php echo link_to($factura->getFacturaTipo(ESC_RAW), 'factura/cambiartipo?id_factura='.$factura->getIdFactura(), array(
  'popup' => array('popupWindow', 'width=750,height=400,left=320,top=100'))).$factura->getNumeroFactura() ?></td>
      <td><?php echo $factura->getEstado() ?></td>
      <td title="<?php echo $factura->getDatosCliente() ?>"><?php echo $factura->getNombreFacturaCorto(17) ?></td>
      <td><?php echo $factura->getNombreVendedor() ?></td>
      <td><?php echo $factura->getFechaemisionFacturaCustom() ?></td>
      <td><?php echo format_currency($factura->getMontoFactura(),'CLP') ?></td>
      <td><?php echo format_currency($factura->getMontoFactura()-$factura->getSaldoFactura(),'CLP') ?></td>

      <?php echo $factura->getComentarioFacturaTD(ESC_RAW) ?>
      <td><button onclick="anular('<?php echo $factura->getIdFactura() ?>','<?php echo $factura->getNumeroFactura() ?>');">Anular</button>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<?php if ($pager->haveToPaginate()): ?>
  <div class="pagination">
    <img id="loader-page" alt="cargando" style="vertical-align: middle; display: none" src="/images1/ajax-loader-white.gif" />
    <a href="#" onclick="paginar(1)">
      <img src="/images1/first.png" alt="Primera pagina" title="Primera pagina" />
    </a>

    <a href="#" onclick="paginar(<?php echo $pager->getPreviousPage() ?>)">
      <img src="/images1/previous.png" alt="Página anterior" title="Página anterior" />
    </a>

    <?php foreach ($pager->getLinks() as $page): ?>
      <?php if ($page == $pager->getPage()): ?>
        <?php echo $page ?>
      <?php else: ?>
            <a href="#" onclick="paginar(<?php echo $page ?>)"><?php echo $page ?></a>
      <?php endif; ?>
    <?php endforeach; ?>

    <a href="#" onclick="paginar(<?php echo $pager->getNextPage() ?>)">
      <img src="/images1/next.png" alt="Siguiente página" title="Siguiente página" />
    </a>

    <a href="#" onclick="paginar(<?php echo $pager->getLastPage() ?>)">
      <img src="/images1/last.png" alt="Última página" title="Última página" />
    </a>
  </div>
<?php endif; ?>