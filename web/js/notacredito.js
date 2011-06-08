$(document).ready(function() {
    $("input[name^='id_detalle']").click(function(){
        var id = $(this).attr('name').split("[")[1].split("]")[0];
        if($(this).is(':checked')){//SE SELECCIONA
            $('#tdfija' + id).hide();
            $('#icantidad' + id).val($('#tdfija' + id).text());
            $('#tdeditable' + id).show();
        }
        else{                
            $('#tdeditable' + id).hide();
            $('#tdfija' + id).show();
        }
    });
});

function emitir(id_factura){
    var vectordatos = new Array();
    $("input:checked[name^='id_detalle']").each(function(){
        var id = $(this).attr('name').split("[")[1].split("]")[0];
        vectordatos.push(id);
        vectordatos.push($('#icantidad' + id).val());
    });

    var jsonvar = array2json(vectordatos);
    
    $.post($('#jsnotacredito').text()+"emitir",
        {vectordatos: jsonvar, id_factura: id_factura},
        function(data) {
            alert(data);
//            if(data == 'true'){
//                alert('Factura '+numero+' Anulada');
//                mostrarFacturas('#','#','#','#');
//            }
//            else{
//                 alert('Se produjo un Error: '+data);
//                 mostrarFacturas('#','#','#','#');
//            }
        }
    ); 
        
        
    $.each(vectordatos, function(key, value) {
        alert(key + ': ' + value);
    });
}

function array2json(arr) {
    var parts = [];
    var is_list = (Object.prototype.toString.apply(arr) === '[object Array]');

    for(var key in arr) {
    	var value = arr[key];
        if(typeof value == "object") { //Custom handling for arrays
            if(is_list) parts.push(array2json(value)); /* :RECURSION: */
            else parts[key] = array2json(value); /* :RECURSION: */
        } else {
            var str = "";
            if(!is_list) str = '"' + key + '":';

            //Custom handling for multiple data types
            if(typeof value == "number") str += value; //Numbers
            else if(value === false) str += 'false'; //The booleans
            else if(value === true) str += 'true';
            else str += '"' + value + '"'; //All other things
            // :TODO: Is there any more datatype we should be in the lookout for? (Functions?)

            parts.push(str);
        }
    }
    var json = parts.join(",");
    
    if(is_list) return '[' + json + ']';//Return numerical JSON
    return '{' + json + '}';//Return associative JSON
}