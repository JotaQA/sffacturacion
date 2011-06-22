<div id="divmid">

<!--    <h1>Existencias</h1>-->
    <div class="triangle">
    <div class="triangleblue">
    <div style="margin-left: 15px; padding-top: 3px; padding-bottom: 3px; text-align: left;"><span class="headerwhite">
    NC <span style="font-size: smaller">v1.0</span>
    </span>
    </div>
    </div>
    </div>
    <!--End 1st layer top right corner blue-->
    <!--Begin 2nd layer top right corner blue-->
    <div class="triangle2">
    <div class="triangleblue">
    <div style="margin-left: 15px; padding: 5px;">
    </div>
    </div>
    </div>
    <!--End 2nd layer top right corner blue-->

    <!--Begin content1-->
    <div class="midcontent">
    <div class="divmiddle" style="min-height: 530px">
        
        <?php $datos = $sf_data->getRaw('datos') ?>
        <?php while(list(, $producto) = each($datos)): ?>
        <?php list(, $facturas) = each($datos) ?>
        <table class="display" title="<?php echo $producto ?>">
            <thead>
            <th>Numero</th>
            <th>Ingreso</th>
            <th>Emision</th>
            <th>Tipo</th>
            <th>Monto</th>
            </thead>
            <tbody>
            <?php foreach ($facturas as $factura): ?>
            <tr>
                <td><?php echo $factura->getNumeroFactura() ?></td>
                <td><?php echo $factura->getDateTimeObject('fechaingreso_factura')->format('m/d/Y') ?></td>
                <td><?php echo $factura->getDateTimeObject('fechaemision_factura')->format('m/d/Y') ?></td>
                <td><?php echo $factura->getTipoFactura() ?></td>
                <td><?php echo $factura->getMontoFactura() ?></td>
            </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        <br />
        <br />
        <?php endwhile; ?>
        
        
        
        <?php //echo print_r($datos) ?>
        
        
    </div>
    <div style="text-align: right">
        <button onclick="anterior()">Anterior</button>       
    </div>
    </div>
</div>


<div id="divright">
    <div id="navright">
        <!--Begin 1st layer top right corner blue-->
        
        
        
   </div>
</div>


<script type="text/javascript">
    $(document).ready(function(){
        $('button').button();
        $('.display').dataTable({
            "bJQueryUI": true,
            "bInfo": false,
            "bLengthChange": false,
            "bScrollCollapse": true,
            "bPaginate": false,
            "bFilter": false,
            "sDom": '<"head-toolbar fg-toolbar ui-toolbar ui-widget-header ui-corner-tl ui-corner-tr ui-helper-clearfix"lfr>t<"F"ip>'
        });
        $("div.head-toolbar").each(function () {
            $(this).append('<b>'+$(this).next('table').attr('title')+'</b>');
        });
        
    });
</script>
