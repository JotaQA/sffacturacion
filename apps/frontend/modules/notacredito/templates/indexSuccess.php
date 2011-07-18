<div id="divmid">
    <div class="triangle">
    <div class="triangleblue">
    <div style="margin-left: 15px; padding-top: 3px; padding-bottom: 3px; text-align: left;"><span class="headerwhite">
    NC_ByDoc <span style="font-size: smaller">v1.0</span>
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

   </div>
</div>

<script type="text/javascript">
    //VAR GLOBALES
    var rut_cliente = "";
    var empresa = 1;
    var productos = new Array();
    var documentos = new Array();
    
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
        //FALTA VER LOS CASOS DE CODREF
        if(true && bool){
            
        }
        actualizarlistadoc();
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
    
    function borrarRow(index){            
        documentos.splice(index,1);
        $('#tabladoc').dataTable().fnDeleteRow(index);
        actualizarlistadoc();
    }
    
    var Documento = function(id, tipodocumento, numdocumento, fecha){
        this.id = id;
        this.tipodocumento = tipodocumento;
        this.numdocumento = numdocumento;
        this.fecha = fecha;
    }
    
    $(document).ready(function(){
        $('input:text , textarea').addClass('ui-widget-content ui-corner-all');
        $('#tabladoc').dataTable( {
            "aoColumns": [
                    { 
                        "sTitle": "DOCUMENTO",
                        "sWidth": "30%"
                    },
                    { "sTitle": "FOLIO" },
                    { "sTitle": "FECHA" },
//                    { "sTitle": "RAZON" },
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
        $('#tablaprod').dataTable( {
            "aoColumns": [
                    { "sTitle": "CODIGO" },
                    { "sTitle": "DESCRIPCION" },
                    { "sTitle": "CANTIDAD" },
                    { "sTitle": "PRECIO" },
                    { "sTitle": "DCTO" },
                    { "sTitle": "SUBNETO" },
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
//        $('#search_cliente').keydown (function(event){
//            if (event.keyCode == '40'){
//                alert('asd');
//            }
//        });
        
    });
</script>