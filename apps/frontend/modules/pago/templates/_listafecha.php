<?php use_helper('Number') ?>
<?php $sf_user->setCulture('es_CL') ?>
<script type="text/javascript">
    $('#total').text('<?php echo format_currency($total,'CLP') ?>');
    $('#deuda').text('<?php echo format_currency($deuda,'CLP').' ['.(round($deuda/$total*10000)/100).'%]' ?>');
    $('#ncredito').text('<?php echo format_currency($ncredito,'CLP') ?>')
    $('#pagado').text('<?php echo format_currency($pagado,'CLP') ?>')
</script>

<table width="100%">
  <thead>
    <tr>
      <th>Factura</th>
      <th>Cliente</th>
      <th>Estado</th>
      <th>Total</th>
      <th>Pagado</th>
      <th align="center">Vencimiento</th>
      <th align="center">Comentario</th>
      <th align="center">Accion</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($pager->getResults() as $cuota): ?>
      <?php $ncs = $cuota->getFactura()->getNotasCredito() ?>
      <?php if($cuota->getMontoCuota() == $cuota->getMontopagadoCuota()){ ?>
      <?php $cuota->ValidarEstado() ?>      
      <tr class="<?php echo 'cuota'.$cuota->getIdCuota()?>" style="cursor: pointer; background: rgb(235,235,235)" onclick="mostrar_pagos(<?php echo $cuota->getIdCuota() ?>)">
              <td><?php echo link_to($cuota->getFactura()->getFacturaTipo(ESC_RAW), 'factura/cambiartipo?id_factura='.$cuota->getFactura()->getIdFactura(), array(
  'popup' => array('popupWindow', 'width=750,height=400,left=320,top=100'), 'title' => $cuota->getFactura()->getDatosCliente(), 'class' => 'qtip')).$cuota->getFactura()->getNumeroFactura().(($cuota->getFactura()->getCountNCS()->getRaw('COUNT') > 0)?'<b class="qtip" title="Numero de NC: '.$cuota->getFactura()->getNumNCbyFac().'" style="background: #6666ff; color: black; padding: 1px 2px; font-size: 120%">NC</b>':"") ?></td>
              <td title="<?php echo $cuota->getFactura()->getDatosCliente()?>" class="qtip" ><?php echo $cuota->getFactura()->getNombreFactura() ?></td>
              <td style="font-weight: 800;background-color: #a0ff9d"><?php echo $cuota->getEstadoCuota()->getNombreEstadoCuota() ?></td>
              <td><?php echo format_currency($cuota->getMontoCuota(),'CLP') ?></td>
              <td><?php echo format_currency($cuota->getMontopagadoCuota(),'CLP') ?></td>
              <td align="center"><?php echo $cuota->getDateTimeObject('fechavencimiento_cuota')->format('d/m/Y') ?></td>
              <td title="<?php echo $cuota->getComentarioCuota() ?>" align="center"><?php echo link_to('<img alt="comentario" width="20px" src="/images1/comentario.jpg" />', 'pago/comentario?id_cuota='.$cuota->getIdCuota(), array(
  'popup' => array('popupWindow', 'width=750,height=400,left=320,top=100')
))
        ?></td>              
              <td></td>
      </tr>
  <tbody class="<?php echo 'pagos'.$cuota->getIdCuota()?>" style="display: none">

          <tr class="trchico">
              <td></td>
              <td></td>
              <td></td>
              <td></td>
<!--              <td style="font-weight: 800">Id pago</td>
              <td style="font-weight: 800">Id cuota</td>-->
              <td style="font-weight: 800">Pagado</td>
              <td style="font-weight: 800" align="center">Fecha</td>
              <td style="font-weight: 800" align="center">Forma de Pago</td>
              <td style="font-weight: 800" align="center">Accion</td>
          </tr>
          <?php foreach ($cuota->getPago() as $pago): ?>
          <tr>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
<!--              <td><?php echo $pago->getIdPago() ?></td>
              <td><?php echo $pago->getIdCuota() ?></td>              -->
              <td><?php echo format_currency($pago->getMontoPago(),'CLP') ?></td>
              <td align="center"><?php echo $pago->getDateTimeObject('fecha_pago')->format('d/m/Y') ?></td>
              <td align="center"><?php echo $pago->getTipoPago()->getNombreTipoPago() ?></td>
              <td align="center"><?php echo link_to('Editar', 'pago/edit?id_pago='.$pago->getIdPago(), array(
  'popup' => array('popupWindow', 'width=750,height=400,left=320,top=100')
))
        ?></td>
          </tr>

          <?php endforeach; ?>
          <tr class="trchico"><td colspan="8"></td></tr>

         </tbody>

      <?php }
      else{
          if($cuota->getMontopagadoCuota() > 0){

              ?>





         <tr class="<?php echo 'cuota'.$cuota->getIdCuota()?>" style="cursor: pointer; background: rgb(235,235,235)" onclick="mostrar_pagos(<?php echo $cuota->getIdCuota() ?>)">
<!--              <td><a href="<?php echo url_for('cuota/show?id_cuota='.$cuota->getIdCuota()) ?>"><?php echo $cuota->getIdCuota() ?></a></td>-->
<!--              <td><?php echo $cuota->getIdFactura() ?></td>-->
              <td><?php echo link_to($cuota->getFactura()->getFacturaTipo(ESC_RAW), 'factura/cambiartipo?id_factura='.$cuota->getFactura()->getIdFactura(), array(
  'popup' => array('popupWindow', 'width=750,height=400,left=320,top=100'), 'title' => $cuota->getFactura()->getDatosCliente(), 'class' => 'qtip')).$cuota->getFactura()->getNumeroFactura().(($cuota->getFactura()->getCountNCS()->getRaw('COUNT') > 0)?'<b class="qtip" title="Numero de NC: '.$cuota->getFactura()->getNumNCbyFac().'" style="background: #6666ff; color: black; padding: 1px 2px; font-size: 120%">NC</b>':"") ?></td>
              <td title="<?php echo $cuota->getFactura()->getDatosCliente()?>" class="qtip"><?php echo $cuota->getFactura()->getNombreFactura() ?></td>
              <td <?php if($cuota->estaVencido()) echo "style='font-weight: 800;background-color: #ff6633')";
                      else echo "style='font-weight: 800;background-color: #ffcc00'"; ?> ><?php echo $cuota->getEstadoCuota()->getNombreEstadoCuota() ?></td>
              <td><?php echo format_currency($cuota->getMontoCuota(),'CLP') ?></td>
              <td><?php echo format_currency($cuota->getMontopagadoCuota(),'CLP') ?></td>
              <td align="center"><?php echo $cuota->getDateTimeObject('fechavencimiento_cuota')->format('d/m/Y') ?></td>
<!--              <td><?php echo $cuota->getAccionCuota() ?></td>-->
              <td title="<?php echo $cuota->getComentarioCuota() ?>" align="center"><?php echo link_to('<img alt="comentario" width="20px" src="/images1/comentario.jpg" />', 'pago/comentario?id_cuota='.$cuota->getIdCuota(), array(
  'popup' => array('popupWindow', 'width=750,height=400,left=320,top=100')
))
        ?></td>
              <td align="center"><?php echo link_to('Pagar', 'pago/new?id_cuota='.$cuota->getIdCuota(), array(
  'popup' => array('popupWindow', 'width=750,height=400,left=320,top=100')
))
        ?></td>
      </tr>
  <tbody class="<?php echo 'pagos'.$cuota->getIdCuota()?>" style="display: none">

          <tr class="trchico">
              <td></td>
              <td></td>
              <td></td>
              <td></td>
<!--              <td style="font-weight: 800">Id pago</td>
              <td style="font-weight: 800">Id cuota</td>-->
              <td style="font-weight: 800">Pagado</td>
              <td style="font-weight: 800" align="center">Fecha</td>
              <td style="font-weight: 800" align="center">Forma de Pago</td>
              <td style="font-weight: 800" align="center">Accion</td>
          </tr>
          <?php foreach ($cuota->getPago() as $pago): ?>
          <tr>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
<!--              <td><?php echo $pago->getIdPago() ?></td>
              <td><?php echo $pago->getIdCuota() ?></td>              -->
              <td><?php echo format_currency($pago->getMontoPago(),'CLP') ?></td>
              <td align="center"><?php echo $pago->getDateTimeObject('fecha_pago')->format('d/m/Y') ?></td>
              <td align="center"><?php echo $pago->getTipoPago()->getNombreTipoPago() ?></td>
              <td align="center"><?php echo link_to('Editar', 'pago/edit?id_pago='.$pago->getIdPago(), array(
  'popup' => array('popupWindow', 'width=750,height=400,left=320,top=100')
))
        ?></td>
          </tr>

          <?php endforeach; ?>
          <tr class="trchico"><td colspan="8"></td></tr>

         </tbody>





     <?php }
     else{
         ?>
         <tr>
<!--              <td><a href="<?php echo url_for('cuota/show?id_cuota='.$cuota->getIdCuota()) ?>"><?php echo $cuota->getIdCuota() ?></a></td>-->
               <td><?php echo link_to($cuota->getFactura()->getFacturaTipo(ESC_RAW), 'factura/cambiartipo?id_factura='.$cuota->getFactura()->getIdFactura(), array(
  'popup' => array('popupWindow', 'width=750,height=400,left=320,top=100'), 'title' => $cuota->getFactura()->getDatosCliente(), 'class' => 'qtip')).$cuota->getFactura()->getNumeroFactura().(($cuota->getFactura()->getCountNCS()->getRaw('COUNT') > 0)?'<b class="qtip" title="Numero de NC: '.$cuota->getFactura()->getNumNCbyFac().'" style="background: #6666ff; color: black; padding: 1px 2px; font-size: 120%">NC</b>':"") ?></td>
               <td title="<?php echo $cuota->getFactura()->getDatosCliente()?>" class="qtip"><?php echo $cuota->getFactura()->getNombreFactura() ?></td>
              <td <?php if($cuota->estaVencido()) echo "style='font-weight: 800;background-color: #ff6633')";
                      else echo "style='font-weight: 800;background-color: #ffcc00'"; ?> ><?php echo $cuota->getEstadoCuota()->getNombreEstadoCuota() ?></td>
              <td><?php echo format_currency($cuota->getMontoCuota(),'CLP') ?></td>
              <td><?php echo format_currency($cuota->getMontopagadoCuota(),'CLP') ?></td>
              <td align="center"><?php echo $cuota->getDateTimeObject('fechavencimiento_cuota')->format('d/m/Y') ?></td>
<!--              <td><?php echo $cuota->getAccionCuota() ?></td>-->
              <td title="<?php echo $cuota->getComentarioCuota() ?>" align="center"><?php echo link_to('<img alt="comentario" width="20px" src="/images1/comentario.jpg" />', 'pago/comentario?id_cuota='.$cuota->getIdCuota(), array(
  'popup' => array('popupWindow', 'width=750,height=400,left=320,top=100')
))
        ?></td>
              <td align="center"><?php echo link_to('Pagar', 'pago/new?id_cuota='.$cuota->getIdCuota(), array(
  'popup' => array('popupWindow', 'width=750,height=400,left=320,top=100')
))
        ?></td>
           </tr>
     <?php
     }
          }?>
    <?php endforeach; ?>
  </tbody>
</table>


<?php if ($pager->haveToPaginate()): ?>
  <div class="pagination">
    <a href="#" onclick="filtro_listafecha('#','#','#',1,'#','#')">
      <img src="/images1/first.png" alt="Primera pagina" title="Primera pagina" />
    </a>

    <a href="#" onclick="filtro_listafecha('#','#','#',<?php echo $pager->getPreviousPage() ?>,'#','#')">
      <img src="/images1/previous.png" alt="Página anterior" title="Página anterior" />
    </a>

    <?php foreach ($pager->getLinks() as $page): ?>
      <?php if ($page == $pager->getPage()): ?>
        <?php echo $page ?>
      <?php else: ?>
<!--        <a href="<?php echo url_for('pago/index') ?>?page=<?php echo $page ?>&fecha="><?php echo $page ?></a>-->
            <a href="#" onclick="filtro_listafecha('#','#','#',<?php echo $page ?>,'#','#')"><?php echo $page ?></a>
      <?php endif; ?>
    <?php endforeach; ?>

    <a href="#" onclick="filtro_listafecha('#','#','#',<?php echo $pager->getNextPage() ?>,'#','#')">
      <img src="/images1/next.png" alt="Siguiente página" title="Siguiente página" />
    </a>

    <a href="#" onclick="filtro_listafecha('#','#','#',<?php echo $pager->getLastPage() ?>,'#','#')">
      <img src="/images1/last.png" alt="Última página" title="Última página" />
    </a>
  </div>
<?php endif; ?>