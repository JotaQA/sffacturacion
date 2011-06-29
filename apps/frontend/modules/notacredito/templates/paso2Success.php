<?php use_helper('Number') ?>
<?php $sf_user->setCulture('es_CL') ?>
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
            <th>Factura</th>
            <th>Emision</th>
            <th>Monto</th>
            <th>Cant Fac</th>
            <th>Cant NC</th>
            <th>Elección</th>
            </thead>
            <tbody>
            <?php foreach ($facturas as $factura): ?>
            <tr>
                <td><?php echo '<b title="Factura Fisica" style="background: yellow; color: black; padding: 1px 2px; font-size: 120%">'.substr($factura["tipo_factura"],0,1).'</b>'.$factura["numero_factura"] ?></td>
                <td><?php echo date('d/m/Y', strtotime($factura['fechaemision_factura'])) ?></td>
                <td><?php echo format_currency($factura["monto_factura"],'CLP') ?></td>
                <td><?php echo $factura["DetalleActivo"][0]["cantidad_detalle_activo"] ?></td>
                <td><?php echo $it->render('itfactura['.$factura["id_factura"].$codigo.']', 0, array('size' => '2', 'style' => 'font-size: 8pt', 'cantmax' => $factura["DetalleActivo"][0]["cantidad_detalle_activo"], 'id_it' => $factura["id_factura"].$codigo), ESC_RAW) ?></td>
                <td><?php echo $cb->render('cbfactura['.$factura["id_factura"].$codigo.']', null, array('codigo' => $codigo, 'factura' => $factura["id_factura"],'numfactura' => $factura["numero_factura"], 'num_np' => $factura["id_notapedido_factura"], 'cantmax' => $factura["DetalleActivo"][0]["cantidad_detalle_activo"], 'precio' => $factura["DetalleActivo"][0]["precio_detalle_activo"]), ESC_RAW) ?></td>
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
    var numerofacturas;
    function siguiente(){
        datos = new Array();
        numerofacturas="";
        var neto = 0;
        $('input[type=checkbox]:checked').each(function(i) {
            var codigo = $(this).attr("codigo");
            var id_factura = $(this).attr("factura");
            var cantidad = $('#itfactura_'+id_factura+codigo).val();
            var precio = $(this).attr("precio");
            neto += parseInt(precio)*parseInt(cantidad);

            datos.push(codigo);
            datos.push(id_factura);
            datos.push(cantidad);
            var numF = $(this).attr("numfactura");
            if(i == 0) numerofacturas += numF;
            else numerofacturas += ','+numF
        });
        
        var total = neto * 1.19;
        //REDONDEAMOS EL TOTAL
        total = Math.round(total);
        
        var id_factura = $('input[type=checkbox]:checked:first').attr("factura");
        var num_np = $('input[type=checkbox]:checked:first').attr("num_np");
        
        if(id_factura == null) alert('Al menos debe elegir una factura');
        else{
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
                $("#nota_credito_responsable_nota_credito").val(data.responsable_factura.replace(/^\s+|\s+$/g, ''));
                $("#nota_credito_numerofactura_nota_credito").val(numerofacturas);
                $("#nota_credito_neto_nota_credito").val(neto);
                $("#nota_credito_total_nota_credito").val(total);
                $("#nota_credito_id_notapedido_nota_credito").val(num_np);
                

                $( "#dialog-form" ).dialog( "open" );
            },"json");
        }
    }
    
    $(document).ready(function(){
        //VERIFICAMOS SI EL NUM NC EXISTE
        $("#nota_credito_numero_nota_credito").live({
            blur: function(){
                var numeroNC = $(this).val();
                if(!isNaN(parseInt(numeroNC, 10)) && parseInt(numeroNC, 10) > 0){
                    $.get("<?php echo url_for('notacredito/verificarnumNC') ?>"+'?numeroNC='+numeroNC, function(data){
                        if(data == 'true'){
                            var tabletitle = $('.validateTips');
                            var input = $("#nota_credito_numero_nota_credito");
                            var textoantiguo = tabletitle.html();
                            tabletitle.html('EL número de NC ya existe');
                            tabletitle.addClass("ui-state-highlight");
                            input.addClass( "ui-state-error" );
                            input.val('0');
                            setTimeout(function() {
                                tabletitle.removeClass( "ui-state-highlight");
                                tabletitle.html(textoantiguo);
                                input.removeClass( "ui-state-error" );
                            }, 3500);
                        }
                    });
                }
                else{
                    var tabletitle = $('.validateTips');
                    var input = $("#nota_credito_numero_nota_credito");
                    var textoantiguo = tabletitle.html();
                    tabletitle.html('EL número de NC no es valido');
                    tabletitle.addClass("ui-state-highlight");
                    input.addClass( "ui-state-error" );
                    input.val('0');
                    setTimeout(function() {
                        tabletitle.removeClass( "ui-state-highlight");
                        tabletitle.html(textoantiguo);
                        input.removeClass( "ui-state-error" );
                    }, 3500);
                }
            }
        });
     
        //AL MENOS DEBE TENER UNO ELEGIDO
        $('input[type=checkbox]').change( function() {
            if($(this).is(':checked')){
                var codigo = $(this).attr("codigo");
                var id_factura = $(this).attr("factura");
                var input = $('#itfactura_'+id_factura+codigo);
                var cantidad = parseInt(input.val());
                if(cantidad == 0){
                    input.val(1);
                }
            }
        });
        
        $('tbody input[type=text]').change( function() {
            //VAR A OCUPAR
            var tabletitle = $(this).parent().parent().parent().parent().prev('.head-toolbar');
            var input = $(this);
            //VALIDA SI LA CANTIDAD ES NUMERO
            var cantidad = parseInt($(this).val());
            if(isNaN(parseInt(cantidad, 10))){
                var textoantiguo = tabletitle.html();
                tabletitle.html('<b>Ingrese un número valido</b>');
                tabletitle.addClass("ui-state-highlight");
                input.addClass( "ui-state-error" );
                input.val('0');
                setTimeout(function() {
                    tabletitle.removeClass( "ui-state-highlight");
                    tabletitle.html(textoantiguo);
                    input.removeClass( "ui-state-error" );
                }, 3500);
            }
            else{
                var id_it = input.attr("id_it");
                var cb = $('#cbfactura_'+id_it);
                //VALIDA QUE NO SEA CERO CUANDO ESTA CHECK
                if(cb.is(':checked') && cantidad == 0){
                    
                    var textoantiguo = tabletitle.html();
                    input.addClass( "ui-state-error" );

                    tabletitle.html('<b>No puede dejar la cantidad en cero si esta seleccionado</b>');
                    tabletitle.addClass("ui-state-highlight");
                    $(this).val('1');

                    setTimeout(function() {
                            tabletitle.removeClass( "ui-state-highlight");
                            tabletitle.html(textoantiguo);
                            input.removeClass( "ui-state-error" );
                    }, 3500 );
                }                
                //VALIDA EL MAXIMO, NEGATIVO
                var cantmax = parseInt($(this).attr("cantmax"));                
                if(cantidad > cantmax || cantidad < 0){


                    var textoantiguo = tabletitle.html();
                    input.addClass( "ui-state-error" );

                    tabletitle.html('<b>A sobrepasado la cantidada máxima '+cantmax+' o el valor es negativo</b>');
                    tabletitle.addClass("ui-state-highlight");
                    if(cb.is(':checked')) $(this).val('1');
                    else $(this).val('0');

                    setTimeout(function() {
                            tabletitle.removeClass( "ui-state-highlight");
                            tabletitle.html(textoantiguo);
                            input.removeClass( "ui-state-error" );
                    }, 3500 );
                }
            }
        });
        
        
        $('button').button();
        $( "#nota_credito_fechaemision_nota_credito" ).datepicker($.datepicker.regional[ "es" ]);
        $('.display').dataTable({
            "bJQueryUI": true,
            "bInfo": false,
            "bLengthChange": false,
            "bScrollCollapse": true,
            "bPaginate": false,
            "bFilter": false,
            "sDom": '<"head-toolbar fg-toolbar ui-toolbar ui-widget-header ui-corner-tl ui-corner-tr ui-helper-clearfix"lfr>t<"F"ip>',
            "aoColumnDefs": [ 
			{ "sWidth": "14%", "aTargets": [ 2 ],"sClass": "right" },
			{ "sWidth": "12%", "aTargets": [ 3 ],"sClass": "center" },
			{ "sWidth": "12%", "aTargets": [ 4 ],"sClass": "center" },
			{ "sWidth": "12%", "aTargets": [ 5 ],"sClass": "center" }
		],
            "bAutoWidth": false
        });
        $("div.head-toolbar").each(function () {
            $(this).append('<b>'+$(this).next('table').attr('title')+'</b>');
        });
        
        
        var numeronc = $( "#nota_credito_numero_nota_credito" ),
            rut = $( "#nota_credito_rut_nota_credito" ),
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
//            fechaingreso = $( "#nota_credito_fechaingreso_nota_credito" ),
            fechaemision = $( "#nota_credito_fechaemision_nota_credito" ),
            allFields = $( [] )
            .add( numeronc )
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
//            .add( fechaingreso )
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
                            updateTips( "El largo del campo " + n + " debe estar entre " +
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
        
        $( "#nota_credito_rut_nota_credito" ).Rut({
            on_error: function(){ alert('Rut incorrecto'); },
            format_on: 'keyup'
        });
          
        function checkRut(o, n){
            if(! $.Rut.validar(o.val())){
                o.addClass( "ui-state-error" );
                updateTips( n );
                return false;
            }else {
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
                                        

                        bValid = bValid && checkLength( numeronc, "numero NC", 1, 10 );
                        bValid = bValid && checkLength( rut, "RUT", 8, 12 );
                        bValid = bValid && checkLength( nombre, "nombre", 1, 200 );
                        bValid = bValid && checkLength( telefono, "telefono", 0, 32 );
                        bValid = bValid && checkLength( direccion, "direccion", 1, 512 );
                        bValid = bValid && checkLength( comuna, "comuna", 1, 512 );
                        bValid = bValid && checkLength( ciudad, "ciudad", 1, 512 );
                        bValid = bValid && checkLength( giro, "giro", 1, 512 );
                        bValid = bValid && checkLength( condicion, "condicion", 1, 512 );
                        bValid = bValid && checkLength( oc, "oc", 0, 512 );
                        bValid = bValid && checkLength( responsable, "responsable", 1, 512 );
                        bValid = bValid && checkLength( numerofactura, "numero factura", 1, 128 );
//                        bValid = bValid && checkLength( fechaingreso, "fecha ingreso", 6, 20 );
//                        bValid = bValid && checkLength( fechaemision, "fecha emision", 9, 11 );

//                        bValid = bValid && checkRegexp( name, /^[a-z]([0-9a-z_])+$/i, "Username may consist of a-z, 0-9, underscores, begin with a letter." );
                        // From jquery.validate.js (by joern), contributed by Scott Gonzalez: http://projects.scottsplayground.com/email_address_validation/
//                        bValid = bValid && checkRegexp( email, /^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i, "eg. ui@jquery.com" );
//                        bValid = bValid && checkRegexp( password, /^([0-9a-zA-Z])+$/, "Password field only allow : a-z 0-9" );
                        bValid = bValid && checkRegexp( numeronc, /^[1-9]\d*$/, "El número de NC es invalido" );
                        bValid = bValid && checkRegexp( rut, /^\d{7,10}-(\d|k)$/i, "El RUT debe tener formato 12345678-9" );
                        bValid = bValid && checkRut( rut, "El RUT es invalido" );
                        bValid = bValid && checkRegexp( telefono, /^\d{1,2}-\d{5,11}$/, "El telefono debe tener formato: codigo-numero, ejemplo 02-6412345" );
                        bValid = bValid && checkRegexp( numerofactura, /^\d+(,\d+)*$/, "El número de factura es invalido, si ingresa dos o más el formato es 1111,2222,3333..." );
                        bValid = bValid && checkRegexp( fechaemision, /^\d{2}(\/)\d{2}(\/)\d{4}$/, "La fecha debe tener formato dd/mm/yyyy" );
                        
                        if ( bValid ) {
                            var fields  = $("form").serialize();
                            fields += '&datos='+JSON.stringify(datos);

                            var error = true;
                            $.post("<?php echo url_for('notacredito/ingresarNC2') ?>", fields ,
                               function(data) {
                                   if(data == 'true'){
                                       alert('Nota de Credito ingresada');
                                       $('input[type=checkbox]:checked').each(function(){
                                           $(this).parent().parent("tr").remove();
                                       });
                                       $( "#dialog-form" ).dialog("close");
                                   }
                                   else{
                                       alert('Se produjo un error: '+data);
                                       error = false;
                                   }
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
                    $('.validateTips').html('Ingrese los datos de la Nota de Credito');
            }
        });
        
    });
</script>
