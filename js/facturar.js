/**
 * Created by Linxs on 07/04/2015.
 */
$(document).on("ready", factura);

function factura(){
    recargartabla();
    datePick("fecha_factura","0");
    datePick("fecha_pago","0");
    $("#btn_factura").on("click", function(){funcPop("pop_factura");});
    openDialog("pop_factura",450);

    $("#btn_pagos").on("click", function(){funcPop("pop_pagos");});
    openDialog("pop_pagos",450);
}

function openDialog(idPop, tamano){
    $("#"+idPop).dialog({autoOpen: false,
        buttons:{
            OK:function(){
                $(this).dialog("close");

                switch (idPop){
                    case "pop_factura":
                        guardarfactura();
                        break;
                    case "pop_pagos":
                        alert();
                        break
                }
            }
        },
        width: tamano});
}

function funcPop(idpop){

    ($("#"+idpop).dialog("isOpen") == false) ? $("#"+idpop).dialog("open") : $("#"+idpop).dialog("close") ;
}

function guardarfactura(){
    var datos = $("#form_factura").serializeArray();
    $.ajax({
        url: 'configuracion/nuevo_pago.php',
        type: 'POST',
        async: true,
        data: datos,
        success: function(data){
            recargartabla($("#idcliente").val());
            $("#messages").html('<div class="alert alert-success alert-dismissable col-xs-12">' +
            '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
            '<strong>¡Exito!</strong> Guardado correctamente.'+
            '</div>');
            var $alert = $('.alert').alert();
            setTimeout(function () {
                $alert.alert('close')
            }, 3000);
        },
        error: function data(){
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
    });
}

function recargartabla(idcliente){
    $.ajax({
        url: 'configuracion/cargar_tabla_detalle.php',
        type: 'POST',
        async: true,
        data: "idcliente="+idcliente,
        success: function(data){
            $("#contenido_tabla").html(data);
        },
        error: muestraError
    });
}