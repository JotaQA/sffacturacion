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
        <?php while(list(, $codigo) = each($datos)): ?>
        <?php list(, $descripcion) = each($datos) ?>
        <?php list(, $facturas) = each($datos) ?>
        <table class="display" title="<?php echo $codigo.' '.$descripcion ?>">
            <thead>
            <th>Número</th>
            <th>Ingreso</th>
            <th>Emision</th>
            <th>Tipo</th>
            <th>Monto</th>
            <th>Cantidad</th>
            <th>Acción</th>
            </thead>
            <tbody>
            <?php foreach ($facturas as $factura): ?>
            <tr>
                <td><?php echo 'F'.$factura->getNumeroFactura() ?></td>
                <td><?php echo $factura->getDateTimeObject('fechaingreso_factura')->format('d/m/Y') ?></td>
                <td><?php echo $factura->getDateTimeObject('fechaemision_factura')->format('d/m/Y') ?></td>
                <td><?php echo $factura->getTipoFactura() ?></td>
                <td><?php echo $factura->getMontoFactura() ?></td>
                <td class="center"><?php echo $it->render('itfactura['.$factura->getIdFactura().$codigo.']', 0, array('size' => '1', 'style' => 'font-size: 8pt'), ESC_RAW) ?></td>
                <td class="center"><?php echo $cb->render('cbfactura['.$factura->getIdFactura().$codigo.']', null, array('codigo' => $codigo, 'factura' => $factura->getIdFactura()), ESC_RAW) ?></td>
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

<div id="dialog-form" title="Datos de Nota de Credito">
    <p class="validateTips">Ingrese los datos de la Nota de Credito</p>
    <?php include_partial('IngresoNCpopup', array('form' => $form)) ?>
</div>


<script type="text/javascript">
    var datos;
    function siguiente(){
        datos = new Array();
        $('input[type=checkbox]:checked').each(function() {
            var codigo = $(this).attr("codigo");
            var id_factura = $(this).attr("factura");
            var cantidad = $('#itfactura_'+id_factura+codigo).val();
            datos.push(codigo);
            datos.push(id_factura);
            datos.push(cantidad);       
        });
//        alert(datos);
        var id_factura = $('input[type=checkbox]:checked:first').attr("factura");
        $.get("<?php echo url_for('notacredito/getFactura') ?>"+'?id_factura='+id_factura, function(data){
            $("#nota_credito_rut_nota_credito").val(data.rut_factura);
            $("#nota_credito_nombre_nota_credito").val(data.nombre_factura);
            $("#nota_credito_telefono_nota_credito").val(data.telefono_factura);
            $("#nota_credito_direccion_nota_credito").val(data.direccion_factura);
            $("#nota_credito_comuna_nota_credito").val(data.comuna_factura);
            $("#nota_credito_ciudad_nota_credito").val(data.ciudad_factura);
            $("#nota_credito_giro_nota_credito").val(data.giro_factura);
            $("#nota_credito_condicionpago_nota_credito").val(data.condicionpago_factura);
            $("#nota_credito_oc_nota_credito").val(data.oc_factura);
            $("#nota_credito_responsable_nota_credito").val(data.responsable_factura);
            $("#nota_credito_numerofactura_nota_credito").val(data.numero_factura);
            $("#nota_credito_fechaingreso_nota_credito").val();
            $("#nota_credito_fechaemision_nota_credito").val();
//            alert(data.id_factura);
            
            $( "#dialog-form" ).dialog( "open" );
        },"json");
        
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
        
        
        var rut = $( "#nota_credito_rut_nota_credito" ),
            nombre = $( "#nota_credito_nombre_nota_credito" ),
            telefono = $( "#nota_credito_telefono_nota_credito" ),
            direccion = $( "#nota_credito_direccion_nota_credito" ),
            comuna = $( "#nota_credito_comuna_nota_credito" ),
            ciudad = $( "#nota_credito_ciudad_nota_credito" ),
            giro = $( "#nota_credito_giro_nota_credito" ),
            condicion = $( "#nota_credito_condicionpago_nota_credito" ),
            oc = $( "#nota_credito_oc_nota_credito" ),
            responsable = $( "#nota_credito_responsable_nota_credito" ),
            numerofactura = $( "#nota_credito_numerofactura_nota_credito" ),
            fechaingreso = $( "#nota_credito_fechaingreso_nota_credito" ),
            fechaemision = $( "#nota_credito_fechaemision_nota_credito" ),
            allFields = $( [] )
            .add( rut )
            .add( nombre )
            .add( telefono )
            .add( direccion )
            .add( comuna )
            .add( ciudad )
            .add( giro )
            .add( condicion )
            .add( oc )
            .add( responsable )
            .add( numerofactura )
            .add( fechaingreso )
            .add( fechaemision ),
            tips = $( ".validateTips" );
                
        function updateTips( t ) {
                    tips.text( t )
                        .addClass( "ui-state-highlight" );
                    setTimeout(function() {
                            tips.removeClass( "ui-state-highlight", 1500 );
                    }, 500 );
        }
                        
        function checkLength( o, n, min, max ) {
                    if ( o.val().length > max || o.val().length < min ) {
                            o.addClass( "ui-state-error" );
                            updateTips( "El largo de " + n + " debe estar entre " +
                                    min + " y " + max + "." );
                            return false;
                    } else {
                            return true;
                    }
        }
            
        function checkRegexp( o, regexp, n ) {
                    if ( !( regexp.test( o.val() ) ) ) {
                            o.addClass( "ui-state-error" );
                            updateTips( n );
                            return false;
                    } else {
                            return true;
                    }
        }
        
        
        
        $('input:text , textarea').addClass('ui-widget-content ui-corner-all');
        $( "#dialog-form" ).dialog({
            autoOpen: false,
            height: 500,
            width: 600,
            modal: true,
            buttons: {
                "Emitir Nota": function() {
                        var bValid = true;
                        allFields.removeClass( "ui-state-error" );
                                        

//					bValid = bValid && checkLength( name, "username", 3, 16 );
//					bValid = bValid && checkLength( email, "email", 6, 80 );
//					bValid = bValid && checkLength( password, "password", 5, 16 );
//
//					bValid = bValid && checkRegexp( name, /^[a-z]([0-9a-z_])+$/i, "Username may consist of a-z, 0-9, underscores, begin with a letter." );
//					// From jquery.validate.js (by joern), contributed by Scott Gonzalez: http://projects.scottsplayground.com/email_address_validation/
//					bValid = bValid && checkRegexp( email, /^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i, "eg. ui@jquery.com" );
//					bValid = bValid && checkRegexp( password, /^([0-9a-zA-Z])+$/, "Password field only allow : a-z 0-9" );
//
                        if ( bValid ) {
                            var fields  = $("form").serialize();
//                            alert(fields);
                            fields += '&datos='+JSON.stringify(datos);
//                            fields += '&id_factura='+id_factura;

                            var error = true;
                            $.post("<?php echo url_for('notacredito/ingresarNC2') ?>", fields ,
                               function(data) {
                                   if(data == 'true') alert('Nota de Credito ingresada');
                                   else{
                                       alert('Se produjo un error: '+data);
                                       error = false;
                                   }
//                                 alert("Data Loaded: " + data);
                               }).error(function() {
                                   if(error)
                                   alert('Se produjo un error'); 
                               });
                        }
                },
                'Limpiar': function() {
                        $('form input[type=text] , form textarea').each(function() {
                            $(this).val('');
                        });
                },
                'Cancelar': function() {
                        $( this ).dialog( "close" );
                }
            },
            close: function() {
                    allFields.val( "" ).removeClass( "ui-state-error" );
            }
        });
        
    });
</script>
