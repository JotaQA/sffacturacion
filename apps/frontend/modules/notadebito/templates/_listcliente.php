<?php $clientes = $sf_data->getRaw('clientes') ?>
<table>
    <?php foreach ($clientes as $cliente): ?>
    <tr class="cliente" onclick='mostrarProductos("<?php echo $cliente[0] ?>", <?php echo ($cliente[1]!='')?$cliente[1]:'"null"' ?>); $(".cliente").css({"background-color" : "white", "font-weight" : "", "color" : "black"});$(this).css({"background-color" : "#6898d0", "font-weight" : "bolder", "color" : "white"});' style="cursor: pointer">
      <td><?php echo $cliente[0] ?></td>
      <td><?php echo $cliente[2] ?></td>
    </tr>
    <?php endforeach; ?>
</table>