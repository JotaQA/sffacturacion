<h1>Nota creditos List</h1>

<table>
  <thead>
    <tr>
      <th>Id nota credito</th>
      <th>Id estado nota credito</th>
      <th>Numero nota credito</th>
      <th>Numerofactura nota credito</th>
      <th>Fechaingreso nota credito</th>
      <th>Fechaemision nota credito</th>
      <th>Neto nota credito</th>
      <th>Total nota credito</th>
      <th>Id notapedido nota credito</th>
      <th>Rut nota credito</th>
      <th>Telefono nota credito</th>
      <th>Nombre estado nota credito</th>
      <th>Direccion nota credito</th>
      <th>Comuna nota credito</th>
      <th>Ciudad nota credito</th>
      <th>Giro nota credito</th>
      <th>Oc nota credito</th>
      <th>Condicionpago nota credito</th>
      <th>Responsable nota credito</th>
      <th>Comentarior nota credito</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($nota_creditos as $nota_credito): ?>
    <tr>
      <td><a href="<?php echo url_for('notacredito/edit?id_nota_credito='.$nota_credito->getIdNotaCredito()) ?>"><?php echo $nota_credito->getIdNotaCredito() ?></a></td>
      <td><?php echo $nota_credito->getIdEstadoNotaCredito() ?></td>
      <td><?php echo $nota_credito->getNumeroNotaCredito() ?></td>
      <td><?php echo $nota_credito->getNumerofacturaNotaCredito() ?></td>
      <td><?php echo $nota_credito->getFechaingresoNotaCredito() ?></td>
      <td><?php echo $nota_credito->getFechaemisionNotaCredito() ?></td>
      <td><?php echo $nota_credito->getNetoNotaCredito() ?></td>
      <td><?php echo $nota_credito->getTotalNotaCredito() ?></td>
      <td><?php echo $nota_credito->getIdNotapedidoNotaCredito() ?></td>
      <td><?php echo $nota_credito->getRutNotaCredito() ?></td>
      <td><?php echo $nota_credito->getTelefonoNotaCredito() ?></td>
      <td><?php echo $nota_credito->getNombreEstadoNotaCredito() ?></td>
      <td><?php echo $nota_credito->getDireccionNotaCredito() ?></td>
      <td><?php echo $nota_credito->getComunaNotaCredito() ?></td>
      <td><?php echo $nota_credito->getCiudadNotaCredito() ?></td>
      <td><?php echo $nota_credito->getGiroNotaCredito() ?></td>
      <td><?php echo $nota_credito->getOcNotaCredito() ?></td>
      <td><?php echo $nota_credito->getCondicionpagoNotaCredito() ?></td>
      <td><?php echo $nota_credito->getResponsableNotaCredito() ?></td>
      <td><?php echo $nota_credito->getComentariorNotaCredito() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('notacredito/new') ?>">New</a>
