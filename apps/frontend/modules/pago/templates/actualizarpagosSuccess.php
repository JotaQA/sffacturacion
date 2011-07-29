<h1>ACTUALIZAR PAGOS FACTURA EMPRESA <?php echo $empresa ?></h1>
<h2>Facturas desde <?php echo $tiempo ?> meses atras</h2>
<div id="head"></div>
<table id="tabla" border=1 cellspacing=0>
    <thead>
        <th>ID</th>
        <th>NUMERO</th>
        <th>FEC.EMISION</th>
        <th>ESTADO</th>
        <th>RESULTADO</th>
        <th>SALDO FINAL</th>
    </thead>
</table>
<script type="text/javascript">
    var facturas = new Array();
    var time = 5;
    var interval = 0;
    var boolcancelar = false;
    var empresa = "<?php echo $empresa ?>";
    var tiempo = "<?php echo $tiempo ?>";
    
    function add_row(table,rowcontent){
        if ($(table).length>0){
            if ($(table+' > tbody').length==0) $(table).append('<tbody />');
            var row = '';
            for(i in rowcontent){
                row += '<td>'+rowcontent[i]+'</td>';
            }
            
            ($(table+' > tr').length>0)?$(table).children('tbody:last').children('tr:last').append('<tr id="'+rowcontent[0]+'">'+row+'</tr>'):$(table).children('tbody:last').append('<tr id="'+rowcontent[0]+'">'+row+'</tr>');
        }
    }
    var Factura = function(id, numero, fecha, estado){
        this.id = id;
        this.numero = numero;
        this.fecha = fecha;
        this.estado = estado;
    }
    
    function actualizar_tabla(){
        for(i in facturas){
            add_row('#tabla', [facturas[i].id, facturas[i].numero, facturas[i].fecha, facturas[i].estado]);
        }
    }
    
    function redirigir(){        
        var url = "<?php echo url_for('pago/actualizarpagos') ?>"+'?empresa=artretail&tiempo='+tiempo;
        window.location = url;
    }
    
    function actualizar_pagos(index){
        if(index == facturas.length || boolcancelar){
            var rd = "<?php echo $rd ?>";
            if(empresa == 'artelamp' && !boolcancelar && rd == 'yes'){
                $('#head').html('redirigiendo en 3 seg para actualizar artretail<button onClick="botoncancelarrd()">Cancelar</button>');
                interval = setTimeout('redirigir()', 3000);
            }
            if(!boolcancelar && rd != 'yes') $('#head').html('Listo!');
            return false;
        }
        $.get("<?php echo url_for('pago/actualizarpagos2') ?>",{accion:'actualizar', tiempo:tiempo, id:facturas[index].id, empresa:empresa} ,function(data){
            $('#'+facturas[index].id).children('td:last').after('<td>'+data.rows+' pagos actualizados</td>');
            $('#'+facturas[index].id).children('td:last').after('<td style="text-align: right">'+data.saldo+'</td>');
            actualizar_pagos(index+1);
        },"json");
    }

    function timer(){
        if(time == 0){
            $('#head').html('Actualizando... <button id="cancelar" onClick="botoncancelar()">Cancelar</button>');
            clearInterval(interval);
            actualizar_pagos(0);
        }
        else{
            $('#head').html('Se actualizara en <b>'+time+' seg</b><br /><button id="pausar" onClick="botonpausa()">Pausar</button><button id="continuar" disabled onClick="botoncontinuar()">Continuar</button>');
            time--;
        }
    }
    
    function botonpausa(){        
        clearInterval(interval);
        $('#pausar').attr('disabled','disabled');
        $('#continuar').attr('disabled','');
    }
    function botoncontinuar(){
        interval=setInterval('timer()',1000);
        $('#pausar').attr('disabled','');
        $('#continuar').attr('disabled','disabled');
    }
    
    function botoncancelar(){
        boolcancelar = true;
        $('#head').html('Cancelado por usuario... <button disabled id="cancelar" onClick="botoncancelar()">Cancelar</button>');
    }
    function botoncancelarrd(){
        clearInterval(interval);
        $('#head').html('Redireccion cancelada!');
    }
    
    $(document).ready(function(){        
        $('#head').html('Cargando Facturas...');
        $.get("<?php echo url_for('pago/actualizarpagos2') ?>",{accion:'cargar', tiempo:tiempo, empresa:empresa} ,function(data){
//            alert(data);
            for(i in data){
                facturas.push(new Factura(data[i].id_factura, data[i].numero_factura, data[i].fechaemision_factura.substr(0, 10), data[i].EstadoFactura.nombre_estadofactura));
            }
            actualizar_tabla();
            interval = setInterval ( "timer()", 1000 );
        },"json");
    });
    
</script>
