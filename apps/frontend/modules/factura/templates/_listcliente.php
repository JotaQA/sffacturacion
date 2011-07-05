<table>
    <?php foreach ($clientes as $cliente): ?>
    <tr class="cliente" onclick='mostrarFacturas("#","#","<?php echo $cliente->getRutCliente() ?>","#",1); $(".cliente").css({"background-color" : "white", "font-weight" : "", "color" : "black"});$(this).css({"background-color" : "#6898d0", "font-weight" : "bolder", "color" : "white"});' style="cursor: pointer">
      <td><?php echo $cliente->getRutCliente() ?></td>
      <td><?php echo $cliente->getNombreCliente() ?></td>
    </tr>
    <?php endforeach; ?>
</table>