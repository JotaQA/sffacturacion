<?php use_helper('Number') ?>
<?php $sf_user->setCulture('es_CL') ?>
<div id="jspago" style="display: none"><?php echo url_for('pago/index') ?></div>
<div id="divmid">

<!--    <h1>Existencias</h1>-->
    <div class="triangle">
    <div class="triangleblue">
    <div style="margin-left: 15px; padding-top: 3px; padding-bottom: 3px; text-align: left;"><span class="headerwhite">
            LISTA PAGOS DIARIOS <span style="font-size: smaller">v1.1</span>
    </span>
    </div>
    </div>
    </div>
    <!--End 1st layer top right corner blue-->
    <!--Begin 2nd layer top right corner blue-->
    <div class="triangle2">
    <div class="triangleblue">
    <div style="margin-left: 15px; padding: 5px;">
    </div>
    </div>
    </div>
    <!--End 2nd layer top right corner blue-->

    <!--Begin content1-->
    <div class="midcontent">
    <div class="divmiddle">
<!--    <h1>Administrador Estructura Bodega</h1>-->
<table width="100%">
  <thead>
    <tr>
<!--      <th>Id cuota</th>-->
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
      <?php if($cuota->getMontoCuota() == $cuota->getMontopagadoCuota()){ ?>
      <?php //$cuota->ValidarEstado() ?>
      <tr class="<?php echo 'cuota'.$cuota->getIdCuota()?>" style="cursor: pointer; background: rgb(235,235,235)" onclick="mostrar_pagos(<?php echo $cuota->getIdCuota() ?>)">
              <td title="<?php echo $cuota->getFactura()->getDatosCliente()?>"><?php echo link_to($cuota->getFactura()->getFacturaTipo(ESC_RAW), 'factura/cambiartipo?id_factura='.$cuota->getFactura()->getIdFactura(), array(
  'popup' => array('popupWindow', 'width=750,height=400,left=320,top=100'))).$cuota->getFactura()->getNumeroFactura() ?></td>
              <td title="<?php echo $cuota->getFactura()->getDatosCliente()?>"><?php echo $cuota->getFactura()->getNombreFactura() ?></td>
              <td style="font-weight: 800;background-color: #a0ff9d"><?php echo $cuota->getEstadoCuota()->getNombreEstadoCuota() ?></td>
              <td><?php echo format_currency($cuota->getMontoCuota(),'CLP') ?></td>
              <td><?php echo format_currency($cuota->getMontopagadoCuota(),'CLP') ?></td>
              <td align="center"><?php echo $cuota->getDateTimeObject('fechavencimiento_cuota')->format('d/m/Y') ?></td>
              
              <td title="<?php echo $cuota->getComentarioCuota() ?>" align="center"><?php echo link_to('<img alt="comentario" width="20px" src="/images1/comentario.jpg" />', 'pago/comentario?id_cuota='.$cuota->getIdCuota(), array(
  'popup' => array('popupWindow', 'width=750,height=400,left=320,top=100')
))
        ?></td>
              <td><?php //echo $cuota->getAccionCuota() ?></td>
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
              <td title="<?php echo $cuota->getFactura()->getDatosCliente()?>"><?php echo link_to($cuota->getFactura()->getFacturaTipo(ESC_RAW), 'factura/cambiartipo?id_factura='.$cuota->getFactura()->getIdFactura(), array(
  'popup' => array('popupWindow', 'width=750,height=400,left=320,top=100'))).$cuota->getFactura()->getNumeroFactura() ?></td>
              <td title="<?php echo $cuota->getFactura()->getDatosCliente()?>"><?php echo $cuota->getFactura()->getNombreFactura() ?></td>
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
               <td title="<?php echo $cuota->getFactura()->getDatosCliente()?>"><?php echo link_to($cuota->getFactura()->getFacturaTipo(ESC_RAW), 'factura/cambiartipo?id_factura='.$cuota->getFactura()->getIdFactura(), array(
  'popup' => array('popupWindow', 'width=750,height=400,left=320,top=100'))).$cuota->getFactura()->getNumeroFactura() ?></td>
               <td title="<?php echo $cuota->getFactura()->getDatosCliente()?>"><?php echo $cuota->getFactura()->getNombreFactura() ?></td>
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
    <img id="loader-page" alt="cargando" style="vertical-align: middle;display: none" src="/images1/ajax-loader-white.gif" />
    <a href="#" onclick="paginar(1)">
      <img src="/images1/first.png" alt="Primera página" title="Primera página" />
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




    </div>
    </div>
</div>

<div id="divright">
    <div id="navright">
        <!--Begin 1st layer top right corner blue-->


            <div class="triangle3">
                    <div class="triangleblue">
                            <div style="margin-left: 15px; padding-top: 3px; padding-bottom: 3px; text-align: left;">
                                    <span class="headerwhite">
                                            EMPRESA
                                    </span>
                            </div>
                    </div>
            </div>





            <div class="divmiddle2">
                    <div class="divmiddle1">
                            <br />
                            <?php echo $empresa['nombre_empresa']->render() ?>
                    </div>
            </div>
            <br />

            <div class="triangle3">
                    <div class="triangleblue">
                            <div style="margin-left: 15px; padding-top: 3px; padding-bottom: 3px; text-align: left;">
                                    <span class="headerwhite">
                                            FACTURA
                                    </span>
                            </div>
                    </div>
            </div>





            <div class="divmiddle2">
                    <div class="divmiddle1">
                        <h2>NUMERO FACTURA</h2>
                        <input type="text" value="" name="query" id="numero_factura" />
                        <img id="loader-numerofactura" alt="cargando" style="vertical-align: middle;display: none" src="/images1/ajax-loader-white.gif" />
                        <br />                        
                        <h2>CLIENTE</h2>
                        <input type="text" value="" name="query" id="cliente" />
                        <img id="loader-cliente" alt="cargando" style="vertical-align: middle;display: none" src="/images1/ajax-loader-white.gif" />
                        <br />
                        <i>Notar que estos filtros son <b>independientes</b> de la fecha, vendedor y estado cuota</i>
                    </div>

            </div>
            <br />

            <div class="triangle3">
                    <div class="triangleblue">
                            <div style="margin-left: 15px; padding-top: 3px; padding-bottom: 3px; text-align: left;">
                                    <span class="headerwhite">
                                            INFORMACIÓN
                                    </span>
                            </div>
                    </div>
            </div>


            <div class="divmiddle2">
                    <div class="divmiddle1">
                        <table>
                            <tr>
                                <td style="font-weight: bolder; color: #09c; font-size: 7pt">FACTURA</td>
                                <td id="total"  style="font-weight: bolder; font-size: 8pt"><?php echo format_currency($total,'CLP') ?></td>
                            </tr>
                            <tr>
                                <td style="font-weight: bolder; color: #00cc00; font-size: 7pt">PAGO</td>
                                <td id="pagado"  style="font-weight: bolder; font-size: 8pt"><?php echo format_currency($pagado,'CLP') ?></td>
                            </tr>
                            <tr>
                                <td style="font-weight: bolder; color: #ff6600; font-size: 7pt">N.CREDITO</td>
                                <td id="ncredito"  style="font-weight: bolder; font-size: 8pt"><?php echo format_currency($ncredito,'CLP') ?></td>
                            </tr>
                            <tr>
                                <td style="font-weight: bolder; color: red; font-size: 7pt">DEUDA</td>
                                <td id="deuda" style="font-weight: bolder; font-size: 8pt"><?php echo format_currency($deuda,'CLP') ?></td>
                            </tr>
                        </table>
                    </div>
            </div>
            <br />


            <div class="triangle3">
                    <div class="triangleblue">
                            <div style="margin-left: 15px; padding-top: 3px; padding-bottom: 3px; text-align: left;">
                                    <span class="headerwhite">
                                            FILTRO
                                    </span>
                            </div>
                    </div>
            </div>            

                    <!--End 1st layer top right corner blue-->
            <div class="divmiddle2">
                    <div class="divmiddle1">
                            <h2 class="demoHeaders">FECHA</h2>
                       
                            <input type="text" id="datepicker1" size="9" readonly value="<?php echo date('d/m/Y',time() -1 * 24 * 60 * 60) ?>"> ->
                            <input type="text" id="datepicker2" size="9" readonly value="<?php echo date('d/m/Y',time() +3 * 24 * 60 * 60) ?>">
<!--                            <button id="resetfecha" onclick="reset_fecha()">Día Actual</button>-->
                            <br />
                            <br />
                            <?php echo $vendedor['vendedor']->renderRow() ?>
                            <br />
                            <br />
                            <button id="buscarfecha" onclick="buscarfecha()">Buscar</button>
                            <img id="loader-search" alt="cargando" style="vertical-align: middle; display: none" src="/images1/ajax-loader-white.gif" />
                            <br />
                            <br />
                            
                            <table>
                                <tr>
                                    <td style="background-color: #a0ff9d; font-weight: 800; padding: 4px"><label style="padding: 4px 14px 4px 0"><input onclick="filtro_tipo(1)" type="radio" name="filtroradio" value="1">PAGADA</label</td>
                                </tr>
                                <tr>
                                    <td style="background-color: #ffcc00; font-weight: 800; padding: 4px"><label style="padding: 4px 0px"><input onclick="filtro_tipo(2)" type="radio" name="filtroradio" value="2">POR PAGAR</label></td>
                                </tr>
                                <tr>
                                    <td style="background-color: #ff6633; font-weight: 800; padding: 4px"><label style="padding: 4px 14px 4px 0"><input onclick="filtro_tipo(3)" type="radio" name="filtroradio" value="3">VENCIDA</label></td>
                                </tr>
                                <tr>
                                    <td style="background-color: #cccccc; font-weight: 800; padding: 4px"><label style="padding: 4px 18px 4px 0"><input checked onclick="filtro_tipo(4)" type="radio" name="filtroradio" value="4">TODOS</label></td>
                                </tr>
                                <tr>
                                    <td style="background-color: khaki; font-weight: 800; padding: 4px"><label style="padding: 4px 15px 4px 0"><input onclick="filtro_tipo(5)" type="radio" name="filtroradio" value="5">FACTORING</label></td>
                                </tr>
                            </table>
                            
                    </div>
            </div>
            <br />


            <div class="triangle3">
                    <div class="triangleblue">
                            <div style="margin-left: 15px; padding-top: 3px; padding-bottom: 3px; text-align: left;">
                                    <span class="headerwhite">
                                            ARCHIVO
                                    </span>
                            </div>
                    </div>
            </div>





            <div class="divmiddle2">
                    <div class="divmiddle1">
                            <br />
                            <button id="generarPDF" onclick="generarPDF('<?php echo url_for('pago/PDF') ?>')"><img src="/images1/icono-pdf.png" width="50"/></button>
                    </div>
            </div>
            



            

    </div>
</div>

