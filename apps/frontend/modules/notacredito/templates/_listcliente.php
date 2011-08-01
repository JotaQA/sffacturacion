<table id="tablacliente" style="background-color: white; border-style:solid;">
    <?php foreach ($clientes as $cliente): ?>
    <tr class="cliente" onclick='ClienteSeleccionado("<?php echo $cliente[0] ?>", "<?php echo $cliente[1] ?>" , <?php echo ($cliente[2] != '')?$cliente[2]:'"null"' ?>)' style="cursor: pointer">
      <td><?php echo $cliente[0] ?></td>
      <td><?php echo $cliente[1] ?></td>
    </tr>
    <?php endforeach; ?>
</table>