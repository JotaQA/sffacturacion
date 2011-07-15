<table id="tablacliente" style="background-color: white; border-style:solid;">
    <?php foreach ($clientes as $cliente): ?>
<!--    <tr class="cliente" onclick='/*mostrarProductos("<?php echo $cliente->getRutCliente() ?>", <?php echo ($cliente->getIdEmpresa()!='')?$cliente->getIdEmpresa():'"null"' ?>);*/ /*$(".cliente").css({"background-color" : "white", "font-weight" : "", "color" : "black"});$(this).css({"background-color" : "#6898d0", "font-weight" : "bolder", "color" : "white"});*/' style="cursor: pointer">-->
    <tr class="cliente" onclick='ClienteSeleccionado("<?php echo $cliente->getRutCliente() ?>", "<?php echo $cliente->getNombreCliente() ?>" , <?php echo ($cliente->getIdEmpresa()!='')?$cliente->getIdEmpresa():'"null"' ?>)' style="cursor: pointer">
      <td><?php echo $cliente->getRutCliente() ?></td>
      <td><?php echo $cliente->getNombreCliente() ?></td>
    </tr>
    <?php endforeach; ?>
</table>