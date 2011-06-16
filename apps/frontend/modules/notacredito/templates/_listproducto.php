<table>
    <?php foreach ($productos as $producto): ?>
    <tr class="producto" onclick='cargarProducto("<?php echo $producto['a_codigointerno_detalle_activo'] ?>", "<?php echo $producto['a_descripcionexterna_detalle_activo'] ?>", 0);$(".producto").css({"background-color" : "white", "font-weight" : "", "color" : "black"});$(this).css({"background-color" : "#6898d0", "font-weight" : "bolder", "color" : "white"});' style="cursor: pointer">
        <td><?php echo $producto['a_codigointerno_detalle_activo'] ?></td>
      <td><?php echo $producto['a_descripcionexterna_detalle_activo'] ?></td>
    </tr>
    <?php endforeach; ?>
</table>