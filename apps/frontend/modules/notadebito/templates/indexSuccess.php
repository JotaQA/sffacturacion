<?php slot('title', 'ARTELAMP ND') ?>
<div id="divmid">
    <div class="triangle">
    <div class="triangleblue">
    <div style="margin-left: 15px; padding-top: 3px; padding-bottom: 3px; text-align: left;"><span class="headerwhite">
    CREAR NOTA DEBITO <span style="font-size: smaller">v1.0</span>
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
            <button onclick="actualizar()">Actualizar</button>
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
                <H2>TIPO DOCOCUMENTO:</H2>
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
<div id="dialog-form" title="Datos de Nota de Debito">
    <p class="validateTips">Ingrese los datos de la Nota de Debito</p>
    <?php include_partial('IngresoNDpopup', array('form' => $form)) ?>
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
    
    function siguiente(){
        if(documentos.length == 0){
            alert('Al menos debe elegir un documento');
            return false;
        }
        if($('#razon').val() == ''){            
            $('#razon').addClass( "ui-state-error" );
            alert('Escriba una razón para generar la Nota de Debito');
            setTimeout(function() {
                    $('#razon').removeClass( "ui-state-error", 1500);
            }, 2000 );
            return false;
        }
        //OBTENEMOS DATOS DEL CLIENTE DEL DOCUMENTO DE REFERENCIA
        var id_doc = documentos[0].id;//POSIBLEMENTE SE NECESITEN TODOS LOS IDS PARA PONER LAS REF A NP
        var tipodoc = $('#tipodocchoice').val();
        var codref = $('#codrefchoice').val();
        var numdoc = "";
        for(i in documentos){
            if(i == documentos.length-1) numdoc += documentos[i].numdocumento;
            else numdoc += documentos[i].numdocumento + ',';
        }
        var neto = 0;
        for(i in productos){
            neto += productos[i].cantidad*productos[i].precio*(100-productos[i].dcto)/100;
        }
        var total = neto*(100+19)/100;
        total = Math.round(total);
        
        $.get("<?php echo url_for('notadebito/getDocumento') ?>",{id_doc: id_doc, empresa: empresa, tipodoc: tipodoc } , function(data){
            
            switch(tipodoc){
                case '33':
                    $("#nota_debito_rut_nota_debito").val(data.rut_factura);
                    $("#nota_debito_nombre_nota_debito").val(data.nombre_factura);
                    $("#nota_debito_telefono_nota_debito").val(data.telefono_factura);
                    $("#nota_debito_direccion_nota_debito").val(data.direccion_factura);
                    $("#nota_debito_comuna_nota_debito").val(data.comuna_factura);
                    $("#nota_debito_ciudad_nota_debito").val(data.ciudad_factura);
                    $("#nota_debito_giro_nota_debito").val(data.giro_factura);
                    $("#nota_debito_condicionpago_nota_debito").val(data.condicionpago_factura);
                    $("#nota_debito_oc_nota_debito").val(data.oc_factura);
                    $("#nota_debito_responsable_nota_debito").val(data.responsable_factura.replace(/^\s+|\s+$/g, ''));
                    $('#nota_debito_codref_nota_debito').val(codref);
                    $("#nota_debito_numero_refdocumento_nota_debito").val(numdoc);
                    $("#nota_debito_neto_nota_debito").val(neto);
                    $("#nota_debito_total_nota_debito").val(total);
                    $("#nota_debito_id_notapedido_nota_debito").val(data.id_notapedido_factura);
                break;
            }
            


            $( "#dialog-form" ).dialog( "open" );
            
        },"json");
    }
    
    function actualizar(){
        actualizarlistadoc(true);
        actualizarlistaprod(false);
        $('#glosa').atrr('size','20');
    }
    
    function abrirdialog(codproducto_){
        $("#dialog-form-doc").dialog( "open" );
        $('#tablaselecdoc').dataTable().fnAdjustColumnSizing();
        $('#tablaselecdoc').dataTable().fnClearTable();
        var tipodoc = $('#tipodocchoice').val();
        tipodocumento = tipodoc
        codproducto = codproducto_;
        $.get("<?php echo url_for('notadebito/documentosByproducto') ?>",{codproducto: codproducto_, rut_cliente: rut_cliente, empresa: empresa, tipodoc: tipodoc} ,function(data){
            switch(tipodoc){
                case '33':
                    for(i in data){
                        $('#tablaselecdoc').dataTable().fnAddData([
                            '[33]Factura Electronica',
                            data[i].numero_factura,
                            data[i].fechaemision_factura,
                            "<button onclick=selectdoc("+i+")>Seleccionar</button>",
                            data[i].id_factura
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
        //CASOS DE CODREF
        var codref = $('#codrefchoice').val();
        codref = parseInt(codref);
        //Anula Doc de Referencia
        if(codref == 1 && bool){
            var tipodoc = $('#tipodocchoice').val();
            $.get("<?php echo url_for('notadebito/productoBydocumento') ?>",{empresa: empresa, iddoc: id, tipodoc: tipodoc } ,function(data){
                for(i in data){
                    productos.push(new Producto(data[i].id_detalle_activo, data[i].codigointerno_detalle_activo, data[i].descripcionexterna_detalle_activo, data[i].cantidad_detalle_activo, data[i].precio_detalle_activo, 0, id, false));
                }
                actualizarlistaprod();
            },"json");
        }
        //Corrige Texto Doc de Ref
        if(codref == 2 && bool){
            var tipodoc = $('#tipodocchoice').val();
            var descripcion = $('#glosa').val();
            if(descripcion == '' || descripcion == 'DONDE DICE ... DEBE DECIR ...'){
                bool = false;
                $('#glosa').addClass( "ui-state-error" );
                $('#glosa').val('DONDE DICE ... DEBE DECIR ...');
                alert('Escriba una glosa valida');
                setTimeout(function() {
                        $('#glosa').removeClass( "ui-state-error", 1500);
                }, 2000 );
                return false;
            }
            productos.push(new Producto(0, 0, descripcion, 0, 0, 0, id, false));
            actualizarlistaprod();
        }
        if(codref == 3 && bool){
            var tipodoc = $('#tipodocchoice').val();
            $.get("<?php echo url_for('notadebito/productoBydocumento') ?>",{empresa: empresa, iddoc: id, tipodoc: tipodoc } ,function(data){
                for(i in data){
                    productos.push(new Producto(data[i].id_detalle_activo, data[i].codigointerno_detalle_activo, data[i].descripcionexterna_detalle_activo, data[i].cantidad_detalle_activo, data[i].precio_detalle_activo, 0, id, true));
                }
                actualizarlistaprod();
                makeEditablelistaprod();
            },"json");
        }
        if(bool) documentos.push(new Documento(id, tipodocumento, numdocumento, fecha, true));
        actualizarlistadoc();
    }
    
    function actualizarneto_listaprod(aPos, value){
        var aData = tablaprod.fnGetData( aPos[0] );
        switch(aPos[1]){
            case 2:
                var cantidad = parseInt(value);
                var precio = parseInt(aData[3]);
                var dcto = parseFloat(aData[4].replace(/%/g, ""));
            break;
            case 3:
                var cantidad = parseInt(aData[2]);
                var precio = parseInt(value);
                var dcto = parseFloat(aData[4].replace(/%/g, ""));
            break;
            case 4:
                var cantidad = parseInt(aData[2]);
                var precio = parseInt(aData[3]);
                var dcto = parseFloat(value.replace(/%/g, ""));
            break;
        }
        var subneto = cantidad*precio*(100-dcto)/100;
        
        productos[aPos[0]].cantidad = cantidad;
        productos[aPos[0]].precio = precio;
        productos[aPos[0]].dcto = dcto;
        
        tablaprod.fnUpdate( subneto, aPos[0], 5 );
    }
    
    function makeEditablelistaprod(){
        tablaprod.makeEditable({            
            sUpdateURL: function(value, settings)
            {
                var aPos = tablaprod.fnGetPosition(this);
                actualizarneto_listaprod(aPos, value);
                return(value);
            },
            "aoColumns": [
                null,
                null,
                {
//                    fnOnCellUpdated: function(sStatus, sValue, settings){
//                    }
                },
                {},
                {},
                null,
                null            
            ]
        });
    }
    
    
    function actualizarlistadoc(){
        $('#tabladoc').dataTable().fnClearTable();
        for(i in documentos){
            if(documentos[i].botonDocyProd){
                $('#tabladoc').dataTable().fnAddData( [
                    documentos[i].tipodocumento,
                    documentos[i].numdocumento,
                    documentos[i].fecha,
                    "<button onclick=borrarDocyProd("+i+")>borrar</button>",
                    documentos[i].id
                ]);
            }
            else{
                $('#tabladoc').dataTable().fnAddData( [
                    documentos[i].tipodocumento,
                    documentos[i].numdocumento,
                    documentos[i].fecha,
                    "<button onclick=borrarDoc("+i+")>borrar</button>",
                    documentos[i].id
                ]);
            }            
        }
        $('button').button();
    }
    function actualizarlistaprod(){
        $('#tablaprod').dataTable().fnClearTable();
        for(i in productos){
            if(productos[i].botonborrar){
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
            else{
                $('#tablaprod').dataTable().fnAddData( [
                    productos[i].codigo,
                    productos[i].descripcion,
                    productos[i].cantidad,
                    productos[i].precio,
                    productos[i].dcto+'%',
                    productos[i].cantidad*productos[i].precio*(100-productos[i].dcto)/100,
                    "<button disabled onclick=borrarProducto("+i+")>borrar</button>"
                ]);
            }
            
        }
        
        $('button').button();
    }
    
    function borrarDoc(index){            
        documentos.splice(index,1);
        $('#tabladoc').dataTable().fnDeleteRow(index);
        actualizarlistadoc(false);
    }
    function borrarDocyProd(index){
        //BORRA PROD
        while(true){
            var aux = true;
            for(i in productos){                
                if(productos[i].id_doc == documentos[index].id){
                    productos.splice(i, 1);
                    aux = false;
                    break;
                }
            }
            if(aux) break;
        }
        actualizarlistaprod(false);
        //BORRA DOC
        documentos.splice(index,1);
        actualizarlistadoc(true);        
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
        var bool = true;
        for(i in documentos){
            if(documentos[i].id == aData[4]) bool = false;
        }
        if(bool){
            documentos.push(new Documento(aData[4], aData[0], aData[1], aData[2], true));
            actualizarlistadoc();
            $.get("<?php echo url_for('notadebito/productoBycodigoBydocumento') ?>",{codproducto: codproducto, empresa: empresa, numdoc: aData[1], tipodoc: tipodocumento } ,function(data){
                productos.push(new Producto(data.id_detalle_activo, data.codigointerno_detalle_activo, data.descripcionexterna_detalle_activo, data.cantidad_detalle_activo, data.precio_detalle_activo, 0, aData[4], false));
                actualizarlistaprod();
                makeEditablelistaprod();
            },"json");
            $('button').button();
        }
    }
    
    function limpiar_tablas(){
        tabladoc.fnClearTable();
        tablaprod.fnClearTable();
        productos = new Array();
        documentos = new Array();
    }
    
    function limpiar_todo(){
        limpiar_tablas();
        $('#search_cliente').val('');
        $('#razon').val('');
        $('#glosa').val('');
        $('#glosa').css({size:20});
        $('#search_documento').val('');
        $('#search_producto').val('');
        $('#productos').hide();
        $('#documentos').hide();
        //LIMPIAR CLIENTE
        rut_cliente = "";
        $('#search_cliente').css('border-color','#A6C9E2');
        $('#search_cliente').css('border-width','1px');
        $('#tablacliente').hide();
    }
    
    var Documento = function(id, tipodocumento, numdocumento, fecha, botonDocyProd){
        this.id = id;
        this.tipodocumento = tipodocumento;
        this.numdocumento = numdocumento;
        this.fecha = fecha;
        this.botonDocyProd = botonDocyProd;
    }
    var Producto = function(id, codigo, descripcion, cantidad, precio, dcto, id_doc, botonborrar){
        this.id = id;
        this.codigo = codigo;
        this.descripcion = descripcion;
        this.cantidad = cantidad;
        this.precio = precio;
        this.dcto = dcto;
        this.id_doc = id_doc;
        this.botonborrar = botonborrar;
    }
    
    $(document).ready(function(){
        $('button').button();
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
                    },
                    { "bVisible": false }
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
                    },
                    { "bVisible": false }
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
                "<?php echo url_for('notadebito/search_cliente') ?>",
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
                "<?php echo url_for('notadebito/search_documento') ?>",
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
                "<?php echo url_for('notadebito/search_producto') ?>",
                {query: this.value, empresa: empresa, tipodoc: tipodoc, rut_cliente: rut_cliente},
                function() { /*$('#loader').hide();*/ }
                );
            }
            if(this.value.length < 2){
                $('#tablaproducto').hide();
            }
        });
        
        $("#glosa").live({
            keyup: function(){
                var contents = $(this).val();
                var charlength = contents.length;
                if(charlength > 20){
                    var newwidth = 25 + (charlength*8);
                    $(this).css({width:newwidth});
                }
                else{
                    $(this).css({width:153});
                }
            }
        });
        
        
        $('#tipodocchoice').live({
            change: function() {
                //GLOBAL
                switch($(this).val()){
                    case '33':
                        limpiar_tablas();
                        $('#glosa').val('');
                        $("#glosa").trigger("keyup");
                    break;
                    case '39':
                        limpiar_tablas();
                        $('#glosa').val('');
                        $("#glosa").trigger("keyup");
                    break;
                    case '56':
                        limpiar_tablas();
                        $('#glosa').val('');
                        $("#glosa").trigger("keyup");
                    break;
                }              
            }
        });
        
        $('#codrefchoice').live({
            change: function() {
                //VISiBLE/HIDE
                if($(this).val()=='3' && !$('#divproducto').is(':visible')){
                    $('#divproducto').show("slide",{}, 400);
                    $('#search_producto').val('');
                }
                else if($('#divproducto').is(':visible')){
                    $('#divproducto').hide("slide",{}, 400);
                    $('#search_producto').val('');
                }
                
                //GLOBAL
                switch($(this).val()){
                    case '1':
                        limpiar_tablas();
                        $('#glosa').val('');
                        $("#glosa").trigger("keyup");
                    break;
                    case '2':
                        limpiar_tablas();
                        $('#glosa').val('DONDE DICE ... DEBE DECIR ...');
                        $("#glosa").trigger("keyup");
                    break;
                    case '3':
                        limpiar_tablas();
                        $('#glosa').val('');
                        $("#glosa").trigger("keyup");
                    break;
                }
                $('#search_documento').val('');
                $("#search_documento").trigger("keyup");
                $('#search_producto').val('');
                $('#search_producto').trigger("keyup");
            }
        });
        
        
        //VERIFICAMOS SI EL NUM ND EXISTE
        $("#nota_debito_numero_nota_debito").live({
            blur: function(){
                var numeroND = $(this).val();
                if(!isNaN(parseInt(numeroND, 10)) && parseInt(numeroND, 10) > 0){
                    $.get("<?php echo url_for('notadebito/verificarnumND') ?>", {numeroND:numeroND, empresa: empresa}, function(data){
                        if(data == 'true'){
                            var tabletitle = $('.validateTips');
                            var input = $("#nota_debito_numero_nota_debito");
                            var textoantiguo = tabletitle.html();
                            tabletitle.html('EL número de ND ya existe');
                            tabletitle.addClass("ui-state-highlight");
                            input.addClass( "ui-state-error" );
                            input.val('');
                            setTimeout(function() {
                                tabletitle.removeClass( "ui-state-highlight");
                                tabletitle.html(textoantiguo);
                                input.removeClass( "ui-state-error" );
                            }, 1500);
                        }
                    });
                }
                else{
                    var tabletitle = $('.validateTips');
                    var input = $("#nota_debito_numero_nota_debito");
                    var textoantiguo = tabletitle.html();
                    tabletitle.html('EL número de ND no es valido');
                    tabletitle.addClass("ui-state-highlight");
                    input.addClass( "ui-state-error" );
                    input.val('0');
                    setTimeout(function() {
                        tabletitle.removeClass( "ui-state-highlight");
                        tabletitle.html(textoantiguo);
                        input.removeClass( "ui-state-error" );
                    }, 1500);
                }
            }
        });
        
        
        $( "#nota_debito_fechaemision_nota_debito" ).datepicker($.datepicker.regional[ "es" ]);
        
        $("#dialog-form-doc").dialog({
            autoOpen: false,
            height: 500,
            width: 600,
            modal: true,
            buttons: {
                'Cancelar': function() {
                        $( this ).dialog( "close" );
                }
            },
            close: function() {
            }
        });
        
        
        
        //====================================================================
        
        
        var numeronc = $( "#nota_debito_numero_nota_debito" ),
            rut = $( "#nota_debito_rut_nota_debito" ),
            nombre = $( "#nota_debito_nombre_nota_debito" ),
            telefono = $( "#nota_debito_telefono_nota_debito" ),
            direccion = $( "#nota_debito_direccion_nota_debito" ),
            comuna = $( "#nota_debito_comuna_nota_debito" ),
            ciudad = $( "#nota_debito_ciudad_nota_debito" ),
            giro = $( "#nota_debito_giro_nota_debito" ),
            condicion = $( "#nota_debito_condicionpago_nota_debito" ),
            oc = $( "#nota_debito_oc_nota_debito" ),
            responsable = $( "#nota_debito_responsable_nota_debito" ),
            numerodoc = $( "#nota_debito_numero_refdocumento_nota_debito" ),
//            fechaingreso = $( "#nota_credito_fechaingreso_nota_credito" ),
            fechaemision = $( "#nota_debito_fechaemision_nota_debito" ),
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
            .add( numerodoc )
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
        
        $( "#nota_debito_rut_nota_debito" ).Rut({
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
                        bValid = bValid && checkLength( numerodoc, "numero factura", 1, 128 );
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
                        bValid = bValid && checkRegexp( numerodoc, /^\d+(,\d+)*$/, "El número de factura es invalido, si ingresa dos o más el formato es 1111,2222,3333..." );
                        bValid = bValid && checkRegexp( fechaemision, /^\d{2}(\/)\d{2}(\/)\d{4}$/, "La fecha debe tener formato dd/mm/yyyy" );
                        
                        if ( bValid ) {
                            var fields  = $("form#ingresoNDpopup").serialize();
                            var documentosjson = JSON.stringify(documentos);
                            var productosjson = JSON.stringify(productos);                            
                            
                            var tipodoc = $('#tipodocchoice').val();
                            var codref = $('#codrefchoice').val();
                            var razon = $('#razon').val();
                            var glosa = $('#glosa').val();
                            fields += '&documentosjson=' + documentosjson + '&productosjson=' + productosjson + '&tipodoc=' + tipodoc + '&codref=' + codref + '&empresa=' + empresa + '&razon=' + razon + '&glosa=' + glosa;
                            var error = true;
                            $.post("<?php echo url_for('notadebito/ingresarND') ?>",fields  ,function(data) {
                               if(data == 'true'){
                                   alert('Nota de Debito ingresada');
                                   $( "#dialog-form" ).dialog("close");
                                   limpiar_todo();
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
                'Cancelar': function() {
                        $( this ).dialog( "close" );
                }
            },
            close: function() {
                    allFields.val( "" ).removeClass( "ui-state-error" );
                    $('.validateTips').html('Ingrese los datos de la Nota de Debito');
            }
        });
        
    });
</script>