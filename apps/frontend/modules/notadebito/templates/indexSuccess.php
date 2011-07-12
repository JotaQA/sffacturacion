<div id="divmid">
    <div class="triangle">
    <div class="triangleblue">
    <div style="margin-left: 15px; padding-top: 3px; padding-bottom: 3px; text-align: left;"><span class="headerwhite">
    ND <span style="font-size: smaller">v1.0</span>
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
            <table width="100%"  id="tabla" class="display"></table>
        
        
         </div>
        <div style="text-align: right">
<!--            <button onclick="actualizarlista()">Actualizar</button>
            <button onclick="limpiar()">Limpiar</button>-->
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
                                            FILTRO
                                    </span>
                            </div>
                    </div>
            </div>
        
        
        
        <div class="divmiddle2">
                    <div class="divmiddle1">
                        <br />
                            <h2>CLIENTE</h2>                            
                            <input type="text" value="<?php echo $sf_request->getParameter('query') ?>" name="query" id="search_cliente" />
                            

                            <div id="clientes"></div>
                            <br />
                            <div id="cajaproductos" style="display: none">
                                <h2>PRODUCTOS</h2>
                                <input type="text" id="search_productos" />
                                <div id="productos"></div>
                            </div>
                    </div>
            </div>

   </div>
</div>


<script type="text/javascript">
    //VAR GLOBALES
    var rut_cliente = "";
    
    function siguiente(){
        
    }
    function mostrarProductos(_rut_cliente, _empresa){
        if(_rut_cliente != rut_cliente){
            limpiar();
        }
        rut_cliente = _rut_cliente;
        if(_empresa != 'null' && !isNaN(_empresa)) empresa = parseInt(_empresa)+1;
        else{
            if(confirm("No se encuentra la empresa a la que pertenece el cliente, ¿Desea usar ARTELAMP?, en caso contrario se usara ARTRETAIL")){
                empresa = 1;
            }
            else empresa = 2;
        }
        $('#cajaproductos').show();
    }
    $(document).ready(function(){
        $('#prueba').dataTable( {
            "aoColumns": [
                    { "sTitle": "CODIGO" },
                    { "sTitle": "DESCRIPCION" },
                    { 
                        "sTitle": "ACCION",
                        "sClass": "center",
                        "sWidth": "15%"
                    }                     
            ],
            "bJQueryUI": true,
            "sPaginationType": "full_numbers",
            "bLengthChange": false,
            "bInfo": false,
            "bPaginate": false,
            "aaSorting": [],
            "sScrollY": 400,
            "oLanguage": {
                "sSearch": "Buscar:",
                "sZeroRecords": "Ningún producto cargado..."
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
            if(this.value == ''){
                rut_cliente = "";
                $('#cajaproductos').hide();
                $('#clientes').html('');
            }
        });
    });
    
    
</script>