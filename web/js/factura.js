$(function() {
    $('#search_cliente').keyup(function(key){
        if (this.value.length >= 3 || this.value == ''){
            $('#clientes').load(
            $('#jsfactura').text()+"/search_cliente",
            {query: this.value},
            function() { /*$('#loader').hide();*/ }
            );
        }
        if(this.value == ''){
            rut_clienteAntiguo = '#';
            mostrarFacturas('#','#','#','#','#');
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


    $('#datepicker1').datepicker({
        inline: true,
        numberOfMonths: 2,

        onSelect: function(textoFecha, objDatepicker){
            filtro();
        }
    });
    $('#datepicker2').datepicker({
        inline: true,
        numberOfMonths: 2,

        onSelect: function(textoFecha, objDatepicker){
            filtro();
        }
    });

});

function actualizar(){
    mostrarFacturas('#','#','#','#','#');
}

var paginaAntigua=1;
var rut_clienteAntiguo = '#';
var empresaAntigua2=0;
var textoFecha1Antigua=getFechaActual(-1);
var textoFecha2Antigua=getFechaActual(3);
function mostrarFacturas(textoFecha1,textoFecha2,rut_cliente,empresa,pag){
    $('td[title]').qtip("destroy");

    if(textoFecha1 == "#") textoFecha1= textoFecha1Antigua;
    else textoFecha1Antigua=textoFecha1;

    if(textoFecha2 == "#") textoFecha2= textoFecha2Antigua;
    else textoFecha2Antigua=textoFecha2;

    if(rut_cliente == "#") rut_cliente=rut_clienteAntiguo;
    else rut_clienteAntiguo=rut_cliente;

    if(empresa == "#") empresa=empresaAntigua2;
    else empresaAntigua2=empresa;
    
    if(pag == "#") pag=paginaAntigua;
    else paginaAntigua=pag;

//    alert(textoFecha1+' '+textoFecha2+' '+rut_cliente+' '+empresa);

    $('.divmiddle').load(
    $('#jsfactura').text()+"/mostrarfacturas",
    {textoFecha1: textoFecha1, textoFecha2: textoFecha2, rut_cliente: rut_cliente, empresa: empresa, pagina: pag},
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
            $('#loader-fecha').hide();
    }
    );
}


function filtro(){
    $('#loader-fecha').show();
    var empresa = $('#empresa_nombre_empresa').val();
    var textoFecha1 = $('#datepicker1').val();
    var textoFecha2 = $('#datepicker2').val();
    mostrarFacturas(textoFecha1,textoFecha2,'#',empresa,1);
}

function anular(id_factura,numero){
    var answer = confirm("¿Esta Seguro de ANULAR la Factura "+numero+"?")
    if (answer){
            $.post($('#jsfactura').text()+"/anular",
            { id_factura: id_factura},
            function(data) {
                if(data == 'true'){
                    alert('Factura '+numero+' Anulada');
                    mostrarFacturas('#','#','#','#','#');
                }
                else{
                     alert('Se produjo un Error: '+data);
                     mostrarFacturas('#','#','#','#','#');
                }
            }
            );           
    }
    else{
    }
    
}

function paginar(index){
    $('#loader-page').show();
    mostrarFacturas('#','#','#','#',index)
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