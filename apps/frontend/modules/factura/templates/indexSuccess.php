<?php use_helper('Number') ?>
<?php $sf_user->setCulture('es_CL') ?>
<div id="jsfactura" style="display: none"><?php echo url_for('factura/index') ?></div>
<div id="divmid">

<!--    <h1>Existencias</h1>-->
    <div class="triangle">
    <div class="triangleblue">
    <div style="margin-left: 15px; padding-top: 3px; padding-bottom: 3px; text-align: left;"><span class="headerwhite">
    LISTA FACTURAS <span style="font-size: smaller">v1.1</span>
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
      <th>Acción</th>
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
<!--      <td><?php echo link_to('Anular', 'factura/anular?id_factura='.$factura->getIdFactura(), array('method' => 'post', 'confirm' => '¿Estas Seguro de ANUULAR la Factura '.$factura->getNumeroFactura().'?')) ?></td>-->
      <td><button onclick="anular('<?php echo $factura->getIdFactura() ?>','<?php echo $factura->getNumeroFactura() ?>');">Anular</button></td>
    </tr>
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
                                            FILTRO
                                    </span>
                            </div>
                    </div>
            </div>

            <div class="divmiddle2">
                    <div class="divmiddle1">
                        <br />
                        <h2>FECHA EMISION</h2>
                            <input type="text" id="datepicker1" size="9" readonly value="<?php echo date('d/m/Y',time() - 1 * 24 * 60 * 60) ?>"> ->
                            <input type="text" id="datepicker2" size="9" readonly value="<?php echo date('d/m/Y',time() + 3 * 24 * 60 * 60) ?>">
                            <br />
                            <br />
                            <h2>CLIENTE</h2>
                            <div class="search">
                                      <input type="text" value="<?php echo $sf_request->getParameter('query') ?>" name="query" id="search_cliente" />
                            </div>

                            <div id="clientes"></div>
                    </div>
            </div>

   </div>
</div>

