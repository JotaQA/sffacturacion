<div id="divmid">

<!--    <h1>Existencias</h1>-->
    <div class="triangle">
    <div class="triangleblue">
    <div style="margin-left: 15px; padding-top: 3px; padding-bottom: 3px; text-align: left;"><span class="headerwhite">
    CLIENTES
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
<!--      <th>Id cliente</th>-->
      <th>Rut cliente</th>
      <th>Nombre cliente</th>
      <th>Descripcion cliente</th>
<!--      <th>Giro</th>-->
      <th>Tipo pago</th>
<!--      <th>C pago</th>-->
<!--      <th>Tipo</th>-->
<!--      <th>Id division</th>-->
      <th>Id vendedor</th>
      <th>Estado cliente</th>
<!--      <th>Comentario cli eli</th>-->
      <th>Fecha cliente</th>
      <th>Credito cliente</th>
<!--      <th>Id empresa</th>-->
    </tr>
  </thead>
  <tbody>
    <?php foreach ($clientes as $cliente): ?>
    <tr>
<!--      <td><a href="<?php echo url_for('cliente/show?id_cliente='.$cliente->getIdCliente()) ?>"><?php echo $cliente->getIdCliente() ?></a></td>-->
      <td><?php echo $cliente->getRutCliente() ?></td>
      <td><?php echo $cliente->getNombreCliente() ?></td>
      <td><?php echo $cliente->getDescripcionCliente() ?></td>
<!--      <td><?php echo $cliente->getGiro() ?></td>-->
      <td><?php echo $cliente->getTipoPago() ?></td>
<!--      <td><?php echo $cliente->getCPago() ?></td>-->
<!--      <td><?php echo $cliente->getTipo() ?></td>-->
<!--      <td><?php echo $cliente->getIdDivision() ?></td>-->
      <td><?php echo $cliente->getIdVendedor() ?></td>
      <td><?php echo $cliente->getEstadoCliente() ?></td>
<!--      <td><?php echo $cliente->getComentarioCliEli() ?></td>-->
      <td><?php echo $cliente->getFechaCliente() ?></td>
      <td><?php echo $cliente->getCreditoCliente() ?></td>
<!--      <td><?php echo $cliente->getIdEmpresa() ?></td>-->
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

        </div>
    </div>
</div>
