<table>
  <tbody>
    <tr>
      <th>Id nota debito:</th>
      <td><?php echo $nota_debito->getIdNotaDebito() ?></td>
    </tr>
    <tr>
      <th>Id estado nota debito:</th>
      <td><?php echo $nota_debito->getIdEstadoNotaDebito() ?></td>
    </tr>
    <tr>
      <th>Numero nota debito:</th>
      <td><?php echo $nota_debito->getNumeroNotaDebito() ?></td>
    </tr>
    <tr>
      <th>Numerofactura nota debito:</th>
      <td><?php echo $nota_debito->getNumerofacturaNotaDebito() ?></td>
    </tr>
    <tr>
      <th>Fechaingreso nota debito:</th>
      <td><?php echo $nota_debito->getFechaingresoNotaDebito() ?></td>
    </tr>
    <tr>
      <th>Fechaemision nota debito:</th>
      <td><?php echo $nota_debito->getFechaemisionNotaDebito() ?></td>
    </tr>
    <tr>
      <th>Neto nota debito:</th>
      <td><?php echo $nota_debito->getNetoNotaDebito() ?></td>
    </tr>
    <tr>
      <th>Total nota debito:</th>
      <td><?php echo $nota_debito->getTotalNotaDebito() ?></td>
    </tr>
    <tr>
      <th>Id notapedido nota debito:</th>
      <td><?php echo $nota_debito->getIdNotapedidoNotaDebito() ?></td>
    </tr>
    <tr>
      <th>Rut nota debito:</th>
      <td><?php echo $nota_debito->getRutNotaDebito() ?></td>
    </tr>
    <tr>
      <th>Telefono nota debito:</th>
      <td><?php echo $nota_debito->getTelefonoNotaDebito() ?></td>
    </tr>
    <tr>
      <th>Nombre nota debito:</th>
      <td><?php echo $nota_debito->getNombreNotaDebito() ?></td>
    </tr>
    <tr>
      <th>Direccion nota debito:</th>
      <td><?php echo $nota_debito->getDireccionNotaDebito() ?></td>
    </tr>
    <tr>
      <th>Comuna nota debito:</th>
      <td><?php echo $nota_debito->getComunaNotaDebito() ?></td>
    </tr>
    <tr>
      <th>Ciudad nota debito:</th>
      <td><?php echo $nota_debito->getCiudadNotaDebito() ?></td>
    </tr>
    <tr>
      <th>Giro nota debito:</th>
      <td><?php echo $nota_debito->getGiroNotaDebito() ?></td>
    </tr>
    <tr>
      <th>Oc nota debito:</th>
      <td><?php echo $nota_debito->getOcNotaDebito() ?></td>
    </tr>
    <tr>
      <th>Condicionpago nota debito:</th>
      <td><?php echo $nota_debito->getCondicionpagoNotaDebito() ?></td>
    </tr>
    <tr>
      <th>Responsable nota debito:</th>
      <td><?php echo $nota_debito->getResponsableNotaDebito() ?></td>
    </tr>
    <tr>
      <th>Comentarior nota debito:</th>
      <td><?php echo $nota_debito->getComentariorNotaDebito() ?></td>
    </tr>
    <tr>
      <th>Tipo nota debito:</th>
      <td><?php echo $nota_debito->getTipoNotaDebito() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('notadebito/edit?id_nota_debito='.$nota_debito->getIdNotaDebito()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('notadebito/index') ?>">List</a>
