/**
 * Created by Linxs on 07/04/2015.
 */
$(document).on("ready", factura);

function factura(){
    datePick("fecha_factura","0");
    datePick("fecha_pago","0");
    $("#btn_factura").on("click", function(){funcPop("pop_factura");});
    openDialog("pop_factura",450);

    $("#btn_pagos").on("click", function(){funcPop("pop_pagos");});
    openDialog("pop_pagos",450);
}

function guardarfactura(){
    var datos = $("#form_factura").serializeArray();
    $.ajax({
        url: 'configuracion/nuevo_factura.php',
        type: 'POST',
        async: true,
        data: datos,
        success: guardado,
        error: noguardado
    });
}

function recargartabla(idcliente){
    $.ajax({
        url: 'configuracion/cargar_tabla_detalle.php',
        type: 'POST',
        async: false,
        data: "idcliente="+idcliente,
        success: function(data){
            $("#contenido_tabla").html(data);
        },
        error: muestraError
    });
}

function guardarpago(){
    var datos = $("#form_pagos").serializeArray();
    $.ajax({
        url: 'configuracion/nuevo_pago.php',
        type: 'POST',
        async: true,
        data: datos,
        success: guardado,
        error: noguardado
    });
}

function guardado(data){
    recargartabla($("#idcliente").val());
    $("#messages").html('<div class="alert alert-success alert-dismissable col-xs-12">' +
    '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
    '<strong>¡Exito!</strong> Guardado correctamente.'+
    '</div>');
    var $alert = $('.alert').alert();
    setTimeout(function () {
        $alert.alert('close')
    }, 3000);
}
function noguardado(data){
    recargartabla($("#idcliente").val());
    $("#messages").html('<div class="alert alert-success alert-warning col-xs-12">' +
    '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
    '<strong>¡Error!</strong> campos erroneos.'+
    '</div>');
    var $alert = $('.alert').alert();
    setTimeout(function () {
        $alert.alert('close')
    }, 3000);
}