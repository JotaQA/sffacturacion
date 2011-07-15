<table id="tabladoc" style="background-color: white; border-style:solid;">
    <?php switch ($tipo):         
    case 33:?>
    <?php foreach ($docs as $doc): ?>
    <tr class="cliente" onclick='DocumentoSeleccionado(<?php echo $doc['numero_factura'] ?>)' style="cursor: pointer">
      <td><?php echo $doc['numero_factura'] ?></td>
      <td><?php echo $doc['fechaemision_factura'] ?></td>
      <td><?php echo $doc['monto_factura'] ?></td>
    </tr>
    <?php endforeach; ?>
    <?php break; ?>
    <?php case 39: ?>
    
    <?php break; ?>
    <?php case 56: ?>
    
    <?php break; ?>
    
    <?php endswitch; ?>
</table>