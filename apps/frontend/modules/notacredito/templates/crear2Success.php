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

        <table width="100%"  id="prueba" class="display">
            
        </table>
        
        
        
        <div id="dialog-form" title="Datos de Nota de Credito">
            <p class="validateTips">Ingrese los datos de la Nota de Credito</p>
            
            <?php include_partial('IngresoNCpopup', array('form' => $form)) ?>
        </div>
        
        
        
        
        
         </div>
        <div style="text-align: right">
            <button onclick="actualizarlista()">Actualizar</button>
            <button onclick="limpiar()">Limpiar</button>
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
        var id_detalle;
        var id_factura = "<?php echo (count($detalle_activos)>0 ? $detalle_activos[0]->getIdFactura():'null') ?>";
        var rut_cliente = "";
        var empresa = 1;
        var productos = new Array();
        
        var giCount = 1;
        
       
        
        
        
        function siguiente(){
            var jsonStr = JSON.stringify(productos);
            var url = "<?php echo url_for('notacredito/guardarproductos') ?>"+'?productos='+jsonStr+'&rut_cliente='+rut_cliente+'&empresa='+empresa;
            
            $.post(url, function(dato) {
                  window.location = "<?php echo url_for('notacredito/paso2') ?>";
                });
//                .success(function() { alert("second success");})
//                .error(function() { alert("error"); })
//                .complete(function() { alert("complete"); });      
            
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
        
        function cargarProducto(codigo, descripcion){
            var bool = true;
            for(i in productos){
                if(productos[i].codigo == codigo) bool = false;
            }
            if(bool) productos.push(new Producto(codigo, descripcion));
            actualizarlista();
        }
        
        function actualizarlista(){
//            productos.push(new Producto('123', '123', 10));
            $('#prueba').dataTable().fnClearTable();
            for(i in productos){                
                $('#prueba').dataTable().fnAddData( [
                    productos[i].codigo,
                    productos[i].descripcion,
                    "<button onclick=borrarRow("+i+")>borrar</button>"
                ]);
            }
            $('button').button();
        }
        
        function borrarRow(index){            
            productos.splice(index,1);
            $('#prueba').dataTable().fnDeleteRow(index);
            actualizarlista();
        }
        
        function limpiar(){
            $('#prueba').dataTable().fnClearTable();
            productos = new Array();
        }
        
        var Producto = function(codigo, descripcion){
            this.codigo = codigo;
            this.descripcion = descripcion;
//            this.precio = precio;
//            this.getcodigo = function() {
//                return this.codigo;
//            }
        }
        
    
    
	$(document).ready(function(){
//            var arrCars = new Array("Toyota", "Mercedes", "BMW");
//            var jsonStr = JSON.stringify(arrCars);
//            alert(jsonStr);
            $('#prueba').dataTable( {
                "aoColumns": [
			{ "sTitle": "CODIGO" },
			{ "sTitle": "DESCRIPCION" },
			{ 
                            "sTitle": "ACCION",
                            "sClass": "center",
                            "sWidth": "15%"
//                            "fnRender": "<button onclick='alert('hola')'>B</button>"
                        }                     
		],
                "bJQueryUI": true,
		"sPaginationType": "full_numbers",
                "bLengthChange": false,
                "bInfo": false,
                "bPaginate": false,
//                "bLengthChange": 10,
                "aaSorting": [],
                "sScrollY": 400,
//		"bScrollCollapse": true,
//                "bScrollInfinite": true,
                "oLanguage": {
                    "sSearch": "Buscar:",
                    "sZeroRecords": "Ningún producto cargado..."
                }
            });
            
            
            $( "#nota_credito_fechaingreso_nota_credito" ).datepicker($.datepicker.regional[ "es" ]);
            $('button').button();
            $('input:text , textarea').addClass('ui-widget-content ui-corner-all');
            
            $('#search_cliente').keyup(function(key){
                if (this.value.length >= 3){
                    $('#clientes').load(
                    "<?php echo url_for('notacredito/search_cliente') ?>",
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
            
            $('#search_productos').keyup(function(key){
                if (this.value.length >= 3){
                    $('#productos').load(
                    "<?php echo url_for('notacredito/search_producto') ?>",
                    {query: this.value, rut_cliente: rut_cliente, empresa: empresa},
                    function() { }
                    );
                }
                if(this.value == ''){
                    $('#productos').html('');
                }
            });




            
            var name = $( "#name" ),
		email = $( "#email" ),
		password = $( "#password" ),
		allFields = $( [] ).add( name ).add( email ).add( password ),
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
				updateTips( "Length of " + n + " must be between " +
					min + " and " + max + "." );
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
					if ( bValid && id_factura != 'null' ) {
                                            var fields  = $("form").serialize();
                                            fields += '&id_detalles='+array2json(id_detalle);
                                            fields += '&id_factura='+id_factura;

                                            $.post("<?php echo url_for('notacredito/ingresarNC') ?>", fields ,
                                               function(data) {
                                                 alert("Data Loaded: " + data);
                                               });
					}
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
