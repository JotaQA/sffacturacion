<table>
  <tbody>
    <tr>
      <th>Id cliente:</th>
      <td><?php echo $cliente->getIdCliente() ?></td>
    </tr>
    <tr>
      <th>Rut cliente:</th>
      <td><?php echo $cliente->getRutCliente() ?></td>
    </tr>
    <tr>
      <th>Nombre cliente:</th>
      <td><?php echo $cliente->getNombreCliente() ?></td>
    </tr>
    <tr>
      <th>Descripcion cliente:</th>
      <td><?php echo $cliente->getDescripcionCliente() ?></td>
    </tr>
    <tr>
      <th>Giro:</th>
      <td><?php echo $cliente->getGiro() ?></td>
    </tr>
    <tr>
      <th>Tipo pago:</th>
      <td><?php echo $cliente->getTipoPago() ?></td>
    </tr>
    <tr>
      <th>C pago:</th>
      <td><?php echo $cliente->getCPago() ?></td>
    </tr>
    <tr>
      <th>Tipo:</th>
      <td><?php echo $cliente->getTipo() ?></td>
    </tr>
    <tr>
      <th>Id division:</th>
      <td><?php echo $cliente->getIdDivision() ?></td>
    </tr>
    <tr>
      <th>Id vendedor:</th>
      <td><?php echo $cliente->getIdVendedor() ?></td>
    </tr>
    <tr>
      <th>Estado cliente:</th>
      <td><?php echo $cliente->getEstadoCliente() ?></td>
    </tr>
    <tr>
      <th>Comentario cli eli:</th>
      <td><?php echo $cliente->getComentarioCliEli() ?></td>
    </tr>
    <tr>
      <th>Fecha cliente:</th>
      <td><?php echo $cliente->getFechaCliente() ?></td>
    </tr>
    <tr>
      <th>Credito cliente:</th>
      <td><?php echo $cliente->getCreditoCliente() ?></td>
    </tr>
    <tr>
      <th>Id empresa:</th>
      <td><?php echo $cliente->getIdEmpresa() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('cliente/edit?id_cliente='.$cliente->getIdCliente()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('cliente/index') ?>">List</a>
