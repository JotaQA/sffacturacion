<div id="divmid">
    <div class="triangle">
    <div class="triangleblue">
    <div style="margin-left: 15px; padding-top: 3px; padding-bottom: 3px; text-align: left;"><span class="headerwhite">
    CREAR NOTA CREDITO <span style="font-size: smaller">v1.0</span>
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
            <table width="100%"  id="tabladoc" class="display"></table>
            <br />
            <table width="100%"  id="tablaprod" class="display"></table>
        
        
         </div>
        <div style="text-align: right">
            <button onclick="siguiente()">Siguiente</button>
        </div>
    </div>
</div>


<div id="divright">
    <div id="navright">
        <!--Begin 1st layer top right corner blue-->
        
        <div class="triangle3">
                <div class="triangleblue">
                        <div style="margin-left: 15px; padding-top: 3px; padding-bottom: 3px; text-align: left;">
                                <span class="headerwhite">
                                        CLIENTE
                                </span>
                        </div>
                </div>
        </div>
        
        
        
        <div class="divmiddle2">
            <div class="divmiddle1">
                <br />
                <H2>RUT/NOMBRE:</H2>
                <input type="text" id="search_cliente" />
                <div id="clientes" style="position:absolute" autocomplete="off"></div>
                <br />
            </div>
        </div>
        
        
        <div class="triangle3">
                <div class="triangleblue">
                        <div style="margin-left: 15px; padding-top: 3px; padding-bottom: 3px; text-align: left;">
                                <span class="headerwhite">
                                        REF DOCUMENTO
                                </span>
                        </div>
                </div>
        </div>
        <div class="divmiddle2">
            <div class="divmiddle1">
                <br />
                <H2>TIPO DOC:</H2>
                <?php echo $tipodocchoice->render('tipodocchoice', ESC_RAW) ?>
                <br />
                <H2>POR:</H2>
                <?php echo $codrefchoice->render('codrefchoice', ESC_RAW) ?>
                <br />
                <H2>RAZON:</H2>
                <input type="text" id="razon" />
                <br />
                <H2>GLOSA:</H2>
                <input type="text" id="glosa" />
                <p />
            </div>
        </div>
        
        
        <div class="triangle3">
                <div class="triangleblue">
                        <div style="margin-left: 15px; padding-top: 3px; padding-bottom: 3px; text-align: left;">
                                <span class="headerwhite">
                                        DOCUMENTO
                                </span>
                        </div>
                </div>
        </div>
        <div class="divmiddle2">
            <div class="divmiddle1">
                <br />
                <H2>NUMERO/NP:</H2>
                <input type="text" id="search_documento" />
                <div id="documentos" style="position:absolute" autocomplete="off"></div>
                <br />
            </div>
        </div>
        <div id="divproducto" style="display: none">
            <div class="triangle3">
                    <div class="triangleblue">
                            <div style="margin-left: 15px; padding-top: 3px; padding-bottom: 3px; text-align: left;">
                                    <span class="headerwhite">
                                            PRODUCTO
                                    </span>
                            </div>
                    </div>
            </div>
            <div class="divmiddle2">
                <div class="divmiddle1">
                    <br />
                    <H2>CODIGO/DESCRIPCION:</H2>
                    <input type="text" id="search_producto" />
                    <div id="productos" style="position:absolute" autocomplete="off"></div>
                    <br />
                </div>
            </div>
        </div>

   </div>
</div>


<div id="dialog-form-doc" title="Seleccione el documento">
    <p class="validateTips">Seleccione el documento</p>
    <table id="tablaselecdoc" class="display"></table>
</div>

<script type="text/javascript">
    //VAR GLOBALES
    var rut_cliente = "";
    var empresa = 1;
    var productos = new Array();
    var documentos = new Array();
    var codproducto = 0;
    var tipodocumento = 33;
    var tabladoc;
    var tablaprod;
//    var indexdoc = 0;
    
    function siguiente(){
//        $("#dialog-form-doc").dialog( "open" );
//        $('#tablaselecdoc').dataTable().fnAdjustColumnSizing();
//        $('#tablaselecdoc').dataTable().fnAddData(['12','12','12','12']);
    }
    
    function abrirdialog(codproducto_){        
        $("#dialog-form-doc").dialog( "open" );
        $('#tablaselecdoc').dataTable().fnAdjustColumnSizing();
        $('#tablaselecdoc').dataTable().fnClearTable();
        var tipodoc = $('#tipodocchoice').val();
        tipodocumento = tipodoc
        codproducto = codproducto_;
        $.get("<?php echo url_for('notacredito/documentosByproducto') ?>",{codproducto: codproducto_, rut_cliente: rut_cliente, empresa: empresa, tipodoc: tipodoc} ,function(data){
            switch(tipodoc){
                case '33':
                    for(i in data){
                        $('#tablaselecdoc').dataTable().fnAddData([
                            '[33]Factura Electronica',
                            data[i].numero_factura,
                            data[i].fechaemision_factura,
                            "<button onclick=selectdoc("+i+")>Seleccionar</button>"                            
                        ]);
                    }
                break;
            }
            $('button').button();
        },"json");
    }
    
    function ClienteSeleccionado(_rut_cliente, descripcion, _empresa){
        rut_cliente = _rut_cliente;
        if(_empresa != 'null' && !isNaN(_empresa)) empresa = parseInt(_empresa)+1;
        else{
            if(confirm("No se encuentra la empresa a la que pertenece el cliente, ¿Desea usar ARTELAMP?, en caso contrario se usara ARTRETAIL")){
                empresa = 1;
            }
            else empresa = 2;
        }
        $('#search_cliente').val(descripcion);
        $('#search_cliente').css('border-color','lime');
        $('#search_cliente').css('border-width','2px');
        $('#tablacliente').hide();
    }
    
    function DocumentoSeleccionado(id,tipodocumento,numdocumento,fecha){
        var bool = true;
        for(i in documentos){
            if(documentos[i].id == id) bool = false;
        }
        if(bool) documentos.push(new Documento(id, tipodocumento, numdocumento, fecha));
        //CASOS DE CODREF
        var codref = $('#codrefchoice').val();
        codref = parseInt(codref);
        //Anula Doc de Referencia
        if(codref == 1 && bool){
            var tipodoc = $('#tipodocchoice').val();
            $.get("<?php echo url_for('notacredito/productoBydocumento') ?>",{empresa: empresa, iddoc: id, tipodoc: tipodoc } ,function(data){
                for(i in data){
                    productos.push(new Producto(data[i].id_detalle_activo, data[i].codigointerno_detalle_activo, data[i].descripcionexterna_detalle_activo, data[i].cantidad_detalle_activo, data[i].precio_detalle_activo, 0));
                }
                actualizarlistaprod();
                makeEditablelistaprod();
            },"json");
        }
        actualizarlistadoc();                
    }
    
    function actualizarneto_listaprod(aPos){
        var aData = tablaprod.fnGetData( aPos[0] );
        var cantidad = aData[2];
    }
    
    function makeEditablelistaprod(){
        tablaprod.makeEditable({            
            sUpdateURL: function(value, settings)
            {
//                actualizarneto_listaprod();
                var aPos = tablaprod.fnGetPosition(this);
                var aData = tablaprod.fnGetData( aPos[0] );
                actualizarneto_listaprod(aPos)
                return(value);
            },
            "aoColumns": [
                null,
                null,
                {
//                    fnOnCellUpdated: function(sStatus, sValue, settings){
////                        var aPos = tablaprod.fnGetPosition(this);
////                        var aData = tablaprod.fnGetData( aPos[0] );
//                        alert(this);
//                    }
                },
                {},
                {},
                null,
                null            
            ]
//        "aoColumns": [
//            { 	cssclass: "required" },
//            {            },
//            {
//                indicator: 'Saving platforms...',
//                tooltip: 'Click to edit platforms',
//                type: 'textarea',
//                submit:'Save changes'
//            },
//            {
//                indicator: 'Saving Engine Version...',
//                tooltip: 'Click to select engine version',
//                loadtext: 'loading...',
//                type: 'select',
//                onblur: 'cancel',
//                submit: 'Ok',
//                loadurl: 'EngineVersionList.php',
//                loadtype: 'GET'
//            },
//            {
//                indicator: 'Saving CSS Grade...',
//                tooltip: 'Click to select CSS Grade',
//                loadtext: 'loading...',
//                type: 'select',
//                onblur: 'submit',
//                data: "{'':'Please select...', 'A':'A','B':'B','C':'C'}"
//            }
//        ]
//        oAddNewRowButtonOptions: {	label: "Add...",
//            icons: {primary:'ui-icon-plus'} 
//        },
//        oDeleteRowButtonOptions: {	label: "Remove", 
//            icons: {primary:'ui-icon-trash'}
//        },
//
//        oAddNewRowFormOptions: { 	
//            title: 'Add a new browser',
//            show: "blind",
//            hide: "explode",
//            modal: true
//        }	,
//        sAddDeleteToolbarSelector: ".dataTables_length"								

        });
    }
    
    
    function actualizarlistadoc(){
        $('#tabladoc').dataTable().fnClearTable();
        for(i in documentos){                
            $('#tabladoc').dataTable().fnAddData( [
                documentos[i].tipodocumento,
                documentos[i].numdocumento,
                documentos[i].fecha,
                "<button onclick=borrarRow("+i+")>borrar</button>"
            ]);
        }
        $('button').button();
    }
    function actualizarlistaprod(){
        $('#tablaprod').dataTable().fnClearTable();
        for(i in productos){                
            $('#tablaprod').dataTable().fnAddData( [
                productos[i].codigo,
                productos[i].descripcion,
                productos[i].cantidad,
                productos[i].precio,
                productos[i].dcto+'%',
                productos[i].cantidad*productos[i].precio*(100-productos[i].dcto)/100,
                "<button onclick=borrarProducto("+i+")>borrar</button>"
            ]);
        }
        $('button').button();
    }
    
    function borrarRow(index){            
        documentos.splice(index,1);
        $('#tabladoc').dataTable().fnDeleteRow(index);
        actualizarlistadoc();
    }
    function borrarProducto(index){            
        productos.splice(index,1);
        $('#tablaprod').dataTable().fnDeleteRow(index);
        actualizarlistaprod();
    }
    
    function actualizarlistaselectdoc(){
        var aData = $('#tablaselecdoc').dataTable().fnGetData();
        $('#tablaselecdoc').dataTable().fnClearTable();
        for(i in aData){
            $('#tablaselecdoc').dataTable().fnAddData([
                aData[i][0],
                aData[i][1],
                aData[i][2],
                "<button onclick=selectdoc("+i+")>Seleccionar</button>"
            ]);
        }
        $('button').button();
    }
    
    function selectdoc(index){
        var aData = $('#tablaselecdoc').dataTable().fnGetData(index);
        documentos.push(new Documento(0, aData[0], aData[1], aData[2]));
        actualizarlistadoc();
        $.get("<?php echo url_for('notacredito/productoBycodigoBydocumento') ?>",{codproducto: codproducto, empresa: empresa, numdoc: aData[1], tipodoc: tipodocumento } ,function(data){
            productos.push(new Producto(data.id_detalle_activo, data.codigointerno_detalle_activo, data.descripcionexterna_detalle_activo, data.cantidad_detalle_activo, data.precio_detalle_activo, 0));
            actualizarlistaprod();
        },"json");
        $('button').button();
    }
    
    var Documento = function(id, tipodocumento, numdocumento, fecha){
        this.id = id;
        this.tipodocumento = tipodocumento;
        this.numdocumento = numdocumento;
        this.fecha = fecha;
    }
    var Producto = function(id, codigo, descripcion, cantidad, precio, dcto){
        this.id = id;
        this.codigo = codigo;
        this.descripcion = descripcion;
        this.cantidad = cantidad;
        this.precio = precio;
        this.dcto = dcto;
    }
    
    $(document).ready(function(){
        $('input:text , textarea').addClass('ui-widget-content ui-corner-all');
        tabladoc = $('#tabladoc').dataTable( {
            "aoColumns": [
                    { 
                        "sTitle": "DOCUMENTO",
                        "sWidth": "30%"
                    },
                    { "sTitle": "FOLIO" },
                    { "sTitle": "FECHA" },
                    { 
                        "sTitle": "ACCION",
                        "sClass": "center",
                        "sWidth": "70px"
                    }
            ],
            "bJQueryUI": true,
            "sPaginationType": "full_numbers",
            "bLengthChange": false,
            "bInfo": false,
            "bPaginate": false,
            "aaSorting": [],
            "sScrollY": 100,
            "sDom": '<"tabladoc-toolbar fg-toolbar ui-toolbar ui-widget-header ui-corner-tl ui-corner-tr ui-helper-clearfix"lfr>t<"F"ip>',
            "oLanguage": {
                "sSearch": "Buscar:",
                "sZeroRecords": "Ningún documento cargado..."
            }
        });
        $("div.tabladoc-toolbar").html('<b>DOCUMENTOS</b>');
        
        //============================== 
        tablaprod = $('#tablaprod').dataTable( {
            "aoColumns": [
                    { 
                        "sTitle": "CODIGO",
                        "sWidth": "70px"
                    },
                    { "sTitle": "DESCRIPCION" },
                    { 
                        "sTitle": "CANT",
                        "sWidth": "60px",
                        "sClass": "center"
                    },
                    { 
                        "sTitle": "PRECIO",
                        "sWidth": "70px"
                    },
                    { 
                        "sTitle": "DCTO",
                        "sWidth": "50px"
                    },
                    { 
                        "sTitle": "SUBNETO",
                        "sWidth": "70px"
                    },
                    { 
                        "sTitle": "ACCION",
                        "sClass": "center",
                        "sWidth": "60px"
                    }
            ],
            "bJQueryUI": true,
            "sPaginationType": "full_numbers",
            "bLengthChange": false,
            "bInfo": false,
            "bPaginate": false,
            "aaSorting": [],
            "sScrollY": 300,
            "sDom": '<"tablaprod-toolbar fg-toolbar ui-toolbar ui-widget-header ui-corner-tl ui-corner-tr ui-helper-clearfix"lfr>t<"F"ip>',
            "oLanguage": {
                "sSearch": "Buscar:",
                "sZeroRecords": "Ningún producto cargado..."
            }
        });
        $("div.tablaprod-toolbar").html('<b>PRODUCTOS</b>');
        
        //======================================
        $('#tablaselecdoc').dataTable( {
            "aoColumns": [
                    { 
                        "sTitle": "DOCUMENTO",
                        "sWidth": "30%"
                    },
                    { "sTitle": "FOLIO" },
                    { "sTitle": "FECHA" },
                    { 
                        "sTitle": "ACCION",
                        "sClass": "center",
                        "sWidth": "130px"
                    }
            ],
            "bJQueryUI": true,
            "sPaginationType": "full_numbers",
//            "bLengthChange": false,
            "bInfo": false,
            "bPaginate": false,
            "bAutoWidth": false,
            "aaSorting": [],
            "sScrollY": 300,
            "sDom": '<"tablaselectdoc-toolbar fg-toolbar ui-toolbar ui-widget-header ui-corner-tl ui-corner-tr ui-helper-clearfix"lfr>t<"F"ip>',
            "oLanguage": {
                "sSearch": "Buscar:",
                "sZeroRecords": "Ningún documento"
            }
        });
        
        
        
        
        
        
        $('#search_cliente').keyup(function(key){
            if (this.value.length >= 3){
                $('#clientes').load(
                "<?php echo url_for('notacredito/search_cliente') ?>",
                {query: this.value},
                function() { /*$('#loader').hide();*/ }
                );
            }
            if(this.value.length < 2){
                rut_cliente = "";
                $('#search_cliente').css('border-color','#A6C9E2');
                $('#search_cliente').css('border-width','1px');
                $('#tablacliente').hide();
            }
        });
        $('#search_documento').keyup(function(key){
            if (this.value.length >= 2){
                var tipodoc = $('#tipodocchoice').val();
                $('#documentos').load(
                "<?php echo url_for('notacredito/search_documento') ?>",
                {query: this.value, empresa: empresa, tipodoc: tipodoc, rut_cliente: rut_cliente},
                function() { /*$('#loader').hide();*/ }
                );
            }
            if(this.value.length < 2){
                $('#tabladocumento').hide();
            }
        });
        $('#search_producto').keyup(function(key){
            if (this.value.length >= 2){
                var tipodoc = $('#tipodocchoice').val();
                $('#productos').load(
                "<?php echo url_for('notacredito/search_producto') ?>",
                {query: this.value, empresa: empresa, tipodoc: tipodoc, rut_cliente: rut_cliente},
                function() { /*$('#loader').hide();*/ }
                );
            }
            if(this.value.length < 2){
                $('#tablaproducto').hide();
            }
        });
        
        $('#codrefchoice').live({
            change: function() {
                if($(this).val()==3 && !$('#divproducto').is(':visible')){
                    $('#divproducto').show("slide",{}, 400);
                    $('#search_producto').val('');
                }
                else if($('#divproducto').is(':visible')){
                    $('#divproducto').hide("slide",{}, 400);
                    $('#search_producto').val('');
                }
            }
        });
        
        $('#tablaprod tbody td').live({
            change: function() {
                var aPos = tablaprod.fnGetPosition( this );
                var aData = tablaprod.fnGetData( aPos[0] );
                var cantidad = $(this).children().children().val();
//                alert(cantidad);
            }
        });
        
        $("#dialog-form-doc").dialog({
            autoOpen: false,
            height: 500,
            width: 600,
            modal: true,
            buttons: {
                "Emitir Nota": function() {
//                        var bValid = true;
//                        allFields.removeClass( "ui-state-error" );
//                                        
//
//                        bValid = bValid && checkLength( numeronc, "numero NC", 1, 10 );
//                        bValid = bValid && checkLength( rut, "RUT", 8, 12 );
//                        bValid = bValid && checkLength( nombre, "nombre", 1, 200 );
//                        bValid = bValid && checkLength( telefono, "telefono", 0, 32 );
//                        bValid = bValid && checkLength( direccion, "direccion", 1, 512 );
//                        bValid = bValid && checkLength( comuna, "comuna", 1, 512 );
//                        bValid = bValid && checkLength( ciudad, "ciudad", 1, 512 );
//                        bValid = bValid && checkLength( giro, "giro", 1, 512 );
//                        bValid = bValid && checkLength( condicion, "condicion", 1, 512 );
//                        bValid = bValid && checkLength( oc, "oc", 0, 512 );
//                        bValid = bValid && checkLength( responsable, "responsable", 1, 512 );
//                        bValid = bValid && checkLength( numerofactura, "numero factura", 1, 128 );
//                        bValid = bValid && checkLength( fechaingreso, "fecha ingreso", 6, 20 );
//                        bValid = bValid && checkLength( fechaemision, "fecha emision", 9, 11 );

//                        bValid = bValid && checkRegexp( name, /^[a-z]([0-9a-z_])+$/i, "Username may consist of a-z, 0-9, underscores, begin with a letter." );
                        // From jquery.validate.js (by joern), contributed by Scott Gonzalez: http://projects.scottsplayground.com/email_address_validation/
//                        bValid = bValid && checkRegexp( email, /^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i, "eg. ui@jquery.com" );
//                        bValid = bValid && checkRegexp( password, /^([0-9a-zA-Z])+$/, "Password field only allow : a-z 0-9" );
//                        bValid = bValid && checkRegexp( numeronc, /^[1-9]\d*$/, "El número de NC es invalido" );
//                        bValid = bValid && checkRegexp( rut, /^\d{7,10}-(\d|k)$/i, "El RUT debe tener formato 12345678-9" );
//                        bValid = bValid && checkRut( rut, "El RUT es invalido" );
//                        bValid = bValid && checkRegexp( telefono, /^\d{1,2}-\d{5,11}$/, "El telefono debe tener formato: codigo-numero, ejemplo 02-6412345" );
//                        bValid = bValid && checkRegexp( numerofactura, /^\d+(,\d+)*$/, "El número de factura es invalido, si ingresa dos o más el formato es 1111,2222,3333..." );
//                        bValid = bValid && checkRegexp( fechaemision, /^\d{2}(\/)\d{2}(\/)\d{4}$/, "La fecha debe tener formato dd/mm/yyyy" );
//                        
//                        if ( bValid ) {
//                            var fields  = $("form").serialize();
//                            fields += '&datos='+JSON.stringify(datos);
//
//                            var error = true;
//                            $.post("", fields ,
//                               function(data) {
//                                   if(data == 'true'){
//                                       alert('Nota de Credito ingresada');
////                                       $('input[type=checkbox]:checked').each(function(){
////                                           $(this).parent().parent("tr").remove();
////                                       });
//                                       window.location.replace("");
//                                       $( "#dialog-form" ).dialog("close");
//                                   }
//                                   else{
//                                       alert('Se produjo un error: '+data);
//                                       error = false;
//                                   }
//                               }).error(function() {
//                                   if(error)
//                                   alert('Se produjo un error'); 
//                               });
//                        }
                },
                'Limpiar': function() {
                    var aData = $('#tablaselecdoc').dataTable().fnGetData();
                    alert(aData[0][0]);
//                        $('form input[type=text] , form textarea').each(function() {
//                            $(this).val('');
//                        });
                },
                'Cancelar': function() {
//                        $( this ).dialog( "close" );
                }
            },
            close: function() {
//                    allFields.val( "" ).removeClass( "ui-state-error" );
//                    $('.validateTips').html('Ingrese los datos de la Nota de Credito');
            }
        });
//        $('#search_cliente').keydown (function(event){
//            if (event.keyCode == '40'){
//                alert('asd');
//            }
//        });
        
    });
</script>