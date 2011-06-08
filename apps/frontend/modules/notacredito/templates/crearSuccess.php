<div id="jsnotacredito" style="display: none"><?php echo url_for('notacredito/') ?></div>
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
    <div class="divmiddle">
        
<table width="100%">
  <thead>
    <tr>
<!--      <th>Id detalle activo</th>
      <th>Id boleta</th>
      <th>Id factura</th>
      <th>Id guia</th>
      <th>Id nota credito</th>
      <th>Id salida</th>
      <th>Id salida ac</th>-->
<!--      <th>Codigointerno</th>-->
      <th>Cod externo</th>
      <th>Descripcion externa</th>
      <th>Cantidad</th>
      <th>Precio</th>
      <th></th>
<!--      <th>Fechaingreso</th>-->
<!--      <th>Id producto</th>-->
<!--      <th>Descripcioninterna</th>-->
   
    </tr>
  </thead>
  <tbody>
    <?php foreach ($detalle_activos as $detalle_activo): ?>
    <tr>
<!--      <td><a href="<?php echo url_for('detalle/edit?id_detalle_activo='.$detalle_activo->getIdDetalleActivo()) ?>"><?php echo $detalle_activo->getIdDetalleActivo() ?></a></td>
      <td><?php echo $detalle_activo->getIdBoleta() ?></td>
      <td><?php echo $detalle_activo->getIdFactura() ?></td>
      <td><?php echo $detalle_activo->getIdGuia() ?></td>
      <td><?php echo $detalle_activo->getIdNotaCredito() ?></td>
      <td><?php echo $detalle_activo->getIdSalida() ?></td>
      <td><?php echo $detalle_activo->getIdSalidaAc() ?></td>-->
<!--      <td><?php echo $detalle_activo->getCodigointernoDetalleActivo() ?></td>-->
      <td><?php echo $detalle_activo->getCodigoexternoDetalleActivo() ?></td>
      <td><?php echo $detalle_activo->getDescripcionexternaDetalleActivo() ?></td>
      <td id="<?php echo 'tdeditable'.$detalle_activo->getIdDetalleActivo() ?>" style="display: none; padding: 0" ><?php echo $it->render('icantidad'.$detalle_activo->getIdDetalleActivo(), $detalle_activo->getCantidadDetalleActivo(), array('size' => '1', 'style' => 'font-size: 8pt'), ESC_RAW) ?></td>
      <td id="<?php echo 'tdfija'.$detalle_activo->getIdDetalleActivo() ?>" ><?php echo $detalle_activo->getCantidadDetalleActivo() ?></td>
      <td><?php echo $detalle_activo->getPrecioDetalleActivo() ?></td>
      <td><?php echo $cb->render('id_detalle['.$detalle_activo->getIdDetalleActivo().']', ESC_RAW) ?></td>
<!--      <td><?php echo $detalle_activo->getFechaingresoDetalleActivo() ?></td>-->
<!--      <td><?php echo $detalle_activo->getIdProducto() ?></td>-->
<!--      <td><?php echo $detalle_activo->getDescripcioninternaDetalleActivo() ?></td>-->
      
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
        <button onclick="test()">prueba</button>
        <button onclick="emitir(<?php echo $detalle_activo->getIdFactura() ?>)">Emitir</button>
        
        
        <div id="dialog-form" title="Datos de Nota de Credito">
            <p class="validateTips">Todos los campos son requeridos</p>
            
<!--            <form>
                <fieldset>
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="text ui-widget-content ui-corner-all" /><br />
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" value="" class="text ui-widget-content ui-corner-all" /><br />
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" value="" class="text ui-widget-content ui-corner-all" />
                </fieldset>
            </form>-->
            <form>
                <table>
                    <tr>
                        <td>Numero Factura</td>
                        <td><?php echo $detalle_activo->getFactura()->get ?></td>
                    </tr>
                </table>
            </form>
        </div>
        
        
        
        
        
         </div>
    </div>
</div>
<script type="text/javascript">
        function test(){
                    $( "#dialog-form" ).dialog( "open" );
//                alert('hola');
        }
    
    
	$(function() {     
            
            
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
			height: 300,
			width: 350,
			modal: true,
			buttons: {
				"Create an account": function() {
					var bValid = true;
					allFields.removeClass( "ui-state-error" );

					bValid = bValid && checkLength( name, "username", 3, 16 );
					bValid = bValid && checkLength( email, "email", 6, 80 );
					bValid = bValid && checkLength( password, "password", 5, 16 );

					bValid = bValid && checkRegexp( name, /^[a-z]([0-9a-z_])+$/i, "Username may consist of a-z, 0-9, underscores, begin with a letter." );
					// From jquery.validate.js (by joern), contributed by Scott Gonzalez: http://projects.scottsplayground.com/email_address_validation/
					bValid = bValid && checkRegexp( email, /^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i, "eg. ui@jquery.com" );
					bValid = bValid && checkRegexp( password, /^([0-9a-zA-Z])+$/, "Password field only allow : a-z 0-9" );

					if ( bValid ) {
						$( "#users tbody" ).append( "<tr>" +
							"<td>" + name.val() + "</td>" + 
							"<td>" + email.val() + "</td>" + 
							"<td>" + password.val() + "</td>" +
						"</tr>" ); 
						$( this ).dialog( "close" );
					}
				},
				Cancel: function() {
					$( this ).dialog( "close" );
				}
			},
			close: function() {
				allFields.val( "" ).removeClass( "ui-state-error" );
			}
		});
                
                
                
                
                
                
                
        });
        
</script>
