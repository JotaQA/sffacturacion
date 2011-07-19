<table id="tablaproducto" style="background-color: white; border-style:solid;">
    <?php foreach ($productos as $producto): ?>
<!--    <tr class="producto" onclick='cargarProducto("<?php echo $producto['codigointerno_detalle_activo'] ?>", "<?php echo $producto['descripcionexterna_detalle_activo'] ?>");$(".producto").css({"background-color" : "white", "font-weight" : "", "color" : "black"});$(this).css({"background-color" : "#6898d0", "font-weight" : "bolder", "color" : "white"});' style="cursor: pointer">-->
    <tr class="producto" onclick="abrirdialog('<?php echo $producto['codigointerno_detalle_activo'] ?>')" style="cursor: pointer">
        <td><?php echo $producto['codigointerno_detalle_activo'] ?></td>
      <td><?php echo $producto['descripcionexterna_detalle_activo'] ?></td>
    </tr>
    <?php endforeach; ?>
</table>