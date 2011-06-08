$(function() {
    $('#search_cliente').keyup(function(key){
        if (this.value.length >= 3 || this.value == ''){
            $('#clientes').load(
            $('#jscliente').text()+"/search_cliente",
            {query: this.value},
            function() { /*$('#loader').hide();*/ }
            );
        }
        if(this.value == ''){
            rut_clienteAntiguo = '#';
            mostrarFacturasByCliente('#','#');
        }
    });

    $('td[title]').qtip({
        content: $(this).attr('title'),
        style: {
            name: 'blue' // Inherit from preset style
        },
        position: {
            corner: {
                target: 'false',
                tooltip: 'leftBottom'
            },
            target: 'mouse'
        },
        show: {
            when: {
                event: 'mouseover'
            },
            delay: 400,
            effect: {type: 'grow',
                      length: 300
            }
        },
        hide: {
            when: {
                event: 'mouseout'
            },
            delay: 400,
            effect: {type: 'grow',
                      length: 300
            }
        }
    });

});


var rut_clienteAntiguo = '#';
var empresaAntigua2=0;
function mostrarFacturasByCliente(rut_cliente,empresa){
    $('td[title]').qtip("destroy");
    id_cuota_mostrar = -1;

     if(rut_cliente == "#") rut_cliente=rut_clienteAntiguo;
     else rut_clienteAntiguo=rut_cliente;

     if(empresa == "#") empresa=empresaAntigua2;
     else empresaAntigua2=empresa;

//     alert(rut_cliente+" "+empresa);

    $('.divmiddle').load(
    $('#jscliente').text()+"/mostrarfacturas",
    {rut_cliente: rut_cliente, empresa: empresa},
    function() {
            $('td[title]').qtip({
                content: $(this).attr('title'),
                style: {
                    name: 'blue' // Inherit from preset style
                },
                position: {
                    corner: {
                        target: 'false',
                        tooltip: 'leftBottom'
                    },
                    target: 'mouse'
                },
                show: {
                    when: {
                        event: 'mouseover'
                    },
                    delay: 400,
                    effect: {
                        type: 'grow',
                        length: 300
                    }
                },
                hide: {
                    when: {
                        event: 'mouseout'
                    },
                    delay: 400,
                    effect: {
                        type: 'grow',
                        length: 300
                    }
                }
            });
    }
    );

//    alert(rut_cliente);
}


function buscarEmpresa_cliente(){
    var empresa = $('#empresa_nombre_empresa').val();
    var cliente = $('#search_cliente').val();
    if(cliente.length < 3){
        rut_clienteAntiguo = '#';
    }
//    alert(empresa);
    mostrarFacturasByCliente('#',empresa);
}


var id_cuota_mostrar = -1;

function mostrar_cuotas(id){
    if(id_cuota_mostrar != id){//
        $('.cuotas'+id_cuota_mostrar).hide();
        $('.factura'+id_cuota_mostrar).css({backgroundColor: 'rgb(255,255,255)'});
        $('.cuotas'+id).show('400');
        $('.factura'+id).css({backgroundColor: 'rgb(210,210,210)'});
        id_cuota_mostrar = id;
    }
    else{
        $('.cuotas'+id).toggle('300');
        var color = $('.factura'+id).css("backgroundColor");
        if(color == "rgb(255, 255, 255)") $('.factura'+id).css({backgroundColor: 'rgb(210,210,210)'});
        else $('.factura'+id).css({backgroundColor: 'rgb(255,255,255)'});
    }

}


//UTILIDADES================================

function getFechaActual(dia){
    var hoy = new Date();
    var time = hoy.getTime();
    time += 1000*60*60*24*dia;
    var d = new Date(time);
    var mes = d.getMonth()+1;
    if(mes < 10) mes = "0"+mes;
    var fecha = d.getDate()+"/"+mes+"/"+d.getFullYear();
    return fecha;
}