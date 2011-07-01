$(function() {

    $('#cliente').keyup(function(e) {
//	alert(e.keyCode);
	if(e.keyCode == 13) {
            $('td[title]').qtip("destroy");
//		alert('Enter key was pressed.');
            var cliente = $(this).val();
            $('.divmiddle').load(
                $('#jspago').text()+"/filtro_cliente",
                {cliente: cliente, empresa: empresaAntigua},
                function(){
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

	}
    });

    

    $('#numero_factura').keyup(function(e) {
//	alert(e.keyCode);
	if(e.keyCode == 13) {
            $('td[title]').qtip("destroy");
//		alert('Enter key was pressed.');
            var numero = $(this).val();
            $('.divmiddle').load(
                $('#jspago').text()+"/filtro_numerofactura",
                {numero: numero, empresa: empresaAntigua},
                function(){
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
//            mostrar_fecha(textoFecha,1,'reset');
        }
    });
    $('#datepicker2').datepicker({
        inline: true,
        numberOfMonths: 2,

        onSelect: function(textoFecha, objDatepicker){
//            mostrar_fecha(textoFecha,1,'reset');
        }
    });
    

});

function actualizar(){
    filtro_listafecha('#','#','#','#','#','#');
}


var paginaAntigua=1;
var tipocuotaAntigua=4;
var textoFecha1Antigua=getFechaActual(-1);
var textoFecha2Antigua=getFechaActual(3);
var id_vendedorAntigua='';
var empresaAntigua=0;

function filtro_listafecha(textoFecha1,textoFecha2,id_vendedor,pag,tipocuota,empresa){
     $('td[title]').qtip("destroy");

     if(pag == "#") pag=paginaAntigua;
     else paginaAntigua=pag;

     if(tipocuota == "#") tipocuota= tipocuotaAntigua;
     else tipocuotaAntigua=tipocuota;

     if(textoFecha1 == "#") textoFecha1= textoFecha1Antigua;
     else textoFecha1Antigua=textoFecha1;

     if(textoFecha2 == "#") textoFecha2= textoFecha2Antigua;
     else textoFecha2Antigua=textoFecha2;

     if(id_vendedor == "#") id_vendedor= id_vendedorAntigua;
     else id_vendedorAntigua=id_vendedor;

     if(empresa == "#") empresa = empresaAntigua;
     else empresaAntigua = empresa;

//     alert(pag);

     $('.divmiddle').load(
    $('#jspago').text()+"/filtro_listafecha",
    {fecha1: textoFecha1, fecha2: textoFecha2, id_vendedor: id_vendedor, pagina: pag, tipocuota: tipocuota, empresa: empresa},
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
            $('#loader-search').hide();
    }
    );
}

function buscarfecha(){
    $('#loader-search').show();
    var textoFecha1 = $('#datepicker1').val();
    var textoFecha2 = $('#datepicker2').val();
    var id_vendedor = $('#vendedor').val();
    var empresa = $('#empresa_nombre_empresa').val();
//    alert('empresa '+empresa);


    if(textoFecha1 != '' && textoFecha2 != ''){
        filtro_listafecha(textoFecha1,textoFecha2,id_vendedor,1,'#',empresa);
    }    
}

function buscarEmpresa(){
    var empresa = $('#empresa_nombre_empresa').val();
//    alert(empresa);
    filtro_listafecha('#','#','#',1,'#',empresa);
}

function generarPDF(url){
    var textoFecha1 = $('#datepicker1').val();
    var textoFecha2 = $('#datepicker2').val();
    var id_vendedor = $('#vendedor').val();
    var empresa = $('#empresa_nombre_empresa').val();

    if(textoFecha1 != '' && textoFecha2 != ''){
        var urlPDF = url+'?textoFecha1='+textoFecha1+'&textoFecha2='+textoFecha2+'&id_vendedor='+id_vendedor+'&tipocuota='+tipocuotaAntigua+'&empresa='+empresa;
        window.open(urlPDF);
//        location.href=urlPDF;
    }
}


var id_elegido = -1;

function mostrar_pagos(id){
    if(id_elegido != id){//
        $('.pagos'+id_elegido).hide();
        $('.cuota'+id_elegido).css({backgroundColor: 'rgb(235,235,235)'});
        $('.pagos'+id).show('300');
        $('.cuota'+id).css({backgroundColor: 'rgb(210,210,210)'});
        id_elegido = id;
    }
    else{
        $('.pagos'+id).toggle('300');
        var color = $('.cuota'+id).css("backgroundColor");
        if(color == "rgb(235, 235, 235)") $('.cuota'+id).css({backgroundColor: 'rgb(210,210,210)'});
        else $('.cuota'+id).css({backgroundColor: 'rgb(235,235,235)'});
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