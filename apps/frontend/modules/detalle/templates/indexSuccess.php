<h1>Detalle activos List</h1>

<table>
  <thead>
    <tr>
      <th>Id detalle activo</th>
      <th>Id boleta</th>
      <th>Id factura</th>
      <th>Id guia</th>
      <th>Id nota credito</th>
      <th>Id salida</th>
      <th>Id salida ac</th>
      <th>Codigointerno detalle activo</th>
      <th>Codigoexterno detalle activo</th>
      <th>Cantidad detalle activo</th>
      <th>Precio detalle activo</th>
      <th>Fechaingreso detalle activo</th>
      <th>Id producto</th>
      <th>Descripcioninterna detalle activo</th>
      <th>Descripcionexterna detalle activo</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($detalle_activos as $detalle_activo): ?>
    <tr>
      <td><a href="<?php echo url_for('detalle/edit?id_detalle_activo='.$detalle_activo->getIdDetalleActivo()) ?>"><?php echo $detalle_activo->getIdDetalleActivo() ?></a></td>
      <td><?php echo $detalle_activo->getIdBoleta() ?></td>
      <td><?php echo $detalle_activo->getIdFactura() ?></td>
      <td><?php echo $detalle_activo->getIdGuia() ?></td>
      <td><?php echo $detalle_activo->getIdNotaCredito() ?></td>
      <td><?php echo $detalle_activo->getIdSalida() ?></td>
      <td><?php echo $detalle_activo->getIdSalidaAc() ?></td>
      <td><?php echo $detalle_activo->getCodigointernoDetalleActivo() ?></td>
      <td><?php echo $detalle_activo->getCodigoexternoDetalleActivo() ?></td>
      <td><?php echo $detalle_activo->getCantidadDetalleActivo() ?></td>
      <td><?php echo $detalle_activo->getPrecioDetalleActivo() ?></td>
      <td><?php echo $detalle_activo->getFechaingresoDetalleActivo() ?></td>
      <td><?php echo $detalle_activo->getIdProducto() ?></td>
      <td><?php echo $detalle_activo->getDescripcioninternaDetalleActivo() ?></td>
      <td><?php echo $detalle_activo->getDescripcionexternaDetalleActivo() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('detalle/new') ?>">New</a>
