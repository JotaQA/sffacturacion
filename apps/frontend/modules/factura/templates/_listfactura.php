<?php use_helper('Number') ?>
<?php $sf_user->setCulture('es_CL'); ?>

<?php

function getFacturaTipo($tipo){
    if($tipo == 'FISICA') return '<b style="background: yellow; color: black; padding: 1px 2px; font-size: 120%" title="Factura Física">F</b>';
    else return '<b style="background: blue; color: white; padding: 1px 2px; font-size: 120%" title="Factura Electronica">E</b>';
}
function getDatosCliente($factura){    
    $retorno = "<table id='tooltip'>";
    $retorno = $retorno."<tr>";
    $retorno = $retorno."<td>Emision:</td><td>".$factura['fechaemision_factura']."</td>";
    $retorno = $retorno."</tr>";
    $retorno = $retorno."<tr>";
    $retorno = $retorno."<td>RUT:</td><td>".$factura['rut_factura']."</td>";
    $retorno = $retorno."</tr>";
    $retorno = $retorno."<tr>";
    $retorno = $retorno."<td>Nombre:</td><td>".$factura['nombre_factura']."</td>";
    $retorno = $retorno."</tr>";
    $retorno = $retorno."<tr>";
    $retorno = $retorno."<td>Telefono:</td><td>".$factura['telefono_factura']."</td>";
    $retorno = $retorno."</tr>";
    $retorno = $retorno."<tr>";
    $retorno = $retorno."<td>Dirección:</td><td>".$factura['direccion_factura']."</td>";
    $retorno = $retorno."</tr>";
    $retorno = $retorno."<tr>";
    $retorno = $retorno."<td>Comuna:</td><td>".$factura['comuna_factura']."</td>";
    $retorno = $retorno."</tr>";
    $retorno = $retorno."<tr>";
    $retorno = $retorno."<td>Ciudad:</td><td>".$factura['ciudad_factura']."</td>";
    $retorno = $retorno."</tr>";
    $retorno = $retorno."</table>";
    return $retorno;
}

function getNombreFacturaCorto($factura, $largo){
    if(strlen($factura['nombre_factura']) > $largo) return substr($factura['nombre_factura'], 0, $largo).'...';
    else return $factura['nombre_factura'];
}

function  getComentarioFacturaTD($factura) {
    if($factura['comentario_factura'] != ''){
        $td = '<td class="qtip" title="'.$factura['comentario_factura'].'" align="center"><img alt="comentario" width="20px" src="/images1/comentario.jpg" /></td>';
    }
    else{
        $td = '<td></td>';
    }
    return $td;
}

          ?>

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
    <?php foreach ($pager->getResults(ESC_RAW) as $factura): ?>
    <tr>
      <td><?php echo link_to(getFacturaTipo($factura['tipo_factura']), 'factura/cambiartipo?id_factura='.$factura['id_factura'], array(
  'popup' => array('popupWindow', 'width=750,height=400,left=320,top=100'), 'title' => getDatosCliente($factura), 'class' => 'qtip')).$factura['numero_factura'] ?></td>
      <td><?php echo $factura['EstadoFactura']['nombre_estadofactura'] ?></td>
      <td title="<?php echo getDatosCliente($factura) ?>" class="qtip"><?php echo getNombreFacturaCorto($factura, 17) ?></td>
      <td><?php echo $factura['responsable_factura'] ?></td>
      <td><?php echo $factura['fechaemision_factura'] ?></td>
      <td><?php echo format_currency($factura['monto_factura'],'CLP') ?></td>
      <td><?php echo format_currency($factura['monto_factura']-$factura['saldo_factura'],'CLP') ?></td>
      <?php echo getComentarioFacturaTD($factura) ?>
      <td style="padding: 1px"><button onclick="anular('<?php echo $factura['id_factura'] ?>','<?php echo $factura[''] ?>');">Anular</button></td>

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