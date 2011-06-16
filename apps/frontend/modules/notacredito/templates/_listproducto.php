<table>
    <?php foreach ($productos as $producto): ?>
    <tr class="producto" onclick='cargarProducto("<?php echo $producto->getCodigoemp() ?>", "<?php echo $producto->getDescripcion() ?>", 0);$(".producto").css({"background-color" : "white", "font-weight" : "", "color" : "black"});$(this).css({"background-color" : "#6898d0", "font-weight" : "bolder", "color" : "white"});' style="cursor: pointer">
      <td><?php echo $producto->getCodigoemp() ?></td>
      <td><?php echo $producto->getDescripcion() ?></td>
    </tr>
    <?php endforeach; ?>
</table>