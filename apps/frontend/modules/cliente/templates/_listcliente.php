<table>
    <?php foreach ($clientes as $cliente): ?>
    <tr class="cliente" onclick='mostrarFacturasByCliente("<?php echo $cliente->getRutCliente() ?>","#"); $(".cliente").css({"background-color" : "white", "font-weight" : "", "color" : "black"});$(this).css({"background-color" : "#6898d0", "font-weight" : "bolder", "color" : "white"});' style="cursor: pointer">
      <td><?php echo $cliente->getRutCliente() ?></td>
      <td><?php echo $cliente->getNombreCliente() ?></td>
<!--      <td><?php echo $cliente->getDescripcionCliente() ?></td>-->
    </tr>
    <?php endforeach; ?>
</table>