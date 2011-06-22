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
            <th>Número</th>
            <th>Ingreso</th>
            <th>Emision</th>
            <th>Tipo</th>
            <th>Monto</th>
            <th>Acción</th>
            </thead>
            <tbody>
            <?php foreach ($facturas as $factura): ?>
            <tr>
                <td><?php echo 'F'.$factura->getNumeroFactura() ?></td>
                <td><?php echo $factura->getDateTimeObject('fechaingreso_factura')->format('m/d/Y') ?></td>
                <td><?php echo $factura->getDateTimeObject('fechaemision_factura')->format('m/d/Y') ?></td>
                <td><?php echo $factura->getTipoFactura() ?></td>
                <td><?php echo $factura->getMontoFactura() ?></td>
                <td class="center"><?php echo $cb->render('factura['.$factura->getIdFactura().']', ESC_RAW) ?></td>
            </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        <br />
        <br />
        <?php endwhile; ?>
        
        
    </div>
    <div style="text-align: right">
        <button onclick="anterior()">Anterior</button>
        <button onclick="siguiente()">Siguiente</button>
    </div>
    </div>
</div>


<div id="divright">
    <div id="navright">
        <!--Begin 1st layer top right corner blue-->
        
        
        
   </div>
</div>


<script type="text/javascript">
    var cbs;
    function siguiente(){
        cbs = new Array();
        $('input[type=checkbox]:checked').each(function() {
            var id = $(this).attr("id").substring(8);
            cbs.push(id);
        });
        alert(cbs);
    }
    $(document).ready(function(){
        $('button').button();
        $('.display').dataTable({
            "bJQueryUI": true,
            "bInfo": false,
            "bLengthChange": false,
            "bScrollCollapse": true,
            "bPaginate": false,
            "bFilter": false,
            "sDom": '<"head-toolbar fg-toolbar ui-toolbar ui-widget-header ui-corner-tl ui-corner-tr ui-helper-clearfix"lfr>t<"F"ip>',
            "aoColumnDefs": [ 
			{ "sWidth": "8%", "aTargets": [ 5 ] }
		],
            "bAutoWidth": false
        });
        $("div.head-toolbar").each(function () {
            $(this).append('<b>'+$(this).next('table').attr('title')+'</b>');
        });
        
    });
</script>
