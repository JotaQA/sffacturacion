<?php use_helper('Number') ?>
<?php $sf_user->setCulture('es_CL') ?>
<div id="divmid">

<!--    <h1>Existencias</h1>-->
    <div class="triangle">
    <div class="triangleblue">
    <div style="margin-left: 15px; padding-top: 3px; padding-bottom: 3px; text-align: left;"><span class="headerwhite">
    HISTORIAL PAGOS CLIENTE
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
                                            INFORMACIÓN
                                    </span>
                            </div>
                    </div>
            </div>





            <div class="divmiddle2">
                    <div class="divmiddle1">
                        <table>
                            <tr>
                                <td style="font-weight: bolder; color: #00cc00; font-size: 10pt">TOTAL PAGADO</td>
                                <td id="pagado"  style="font-weight: bolder; font-size: 10pt"><?php echo format_currency($pagado,'CLP') ?></td>
                            </tr>
                            <tr>
                                <td style="font-weight: bolder; color: red; font-size: 10pt">TOTAL DEUDA</td>
                                <td id="deuda" style="font-weight: bolder; font-size: 10pt"><?php echo format_currency($deuda,'CLP') ?></td>
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
                        <h2>CLIENTE</h2>
                        <div id="clienteseleccionado" style="font-weight: bold; color: #6898d0; font-size: small"></div>
                            <div class="search">
                                <form action="" method="">
                                      <input type="text" value="<?php echo $sf_request->getParameter('query') ?>" name="query" id="search_cliente" />
                                </form>
                            </div>

                            <div id="clientes"></div>

                    </div>
            </div>

    </div>
</div>
