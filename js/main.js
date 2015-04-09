$(document).on("ready",inicio);
function inicio(){


    datePick("fecha_registro","0");
    datePick("fecha_fin","+1y-1d");
    datePick("betm_venc","+1y-1d");
    datePick("betm_alta","0");

    datePick("envio_contr","0");
    datePick("susc_contr","0");
    datePick("envio_convenio","0");
    datePick("recep_convenio","0");

    showSelect(1);

    $("#cuotas_betm").attr({"disabled":true});
    $("#descuento_betm").attr({"disabled":true});
    $("#ver_cuotas_betm").hide();
    $("#por_intercambio").attr({"disabled":true});
    $("#descto_betm").attr({"disabled":true});
    $("#inter_betm").attr({"disabled":true});
    $("#por_pagar_betm").attr({"disabled":true});
    $("#suscripBetm").hide();
    $("#hab_suscripBetm").attr("checked",false);
    $("#hab_suscripBetm").attr({"disabled":true});

    $("#hab_suscripSponsor").attr("checked",false);
    $("#hab_suscripSponsor").attr({"disabled":true});

    $("#hab_suscripPublicidad").attr("checked",false);
    $("#hab_suscripPublicidad").attr({"disabled":true});

    if($("#hab_suscripBetm").is(":checked")){
        $("#suscripBetm").show();
    }

    $('input:radio[name="tipo_betm"]').change(
        function(){
            if ($(this).is(':checked') && $(this).val() == 'contado') {
                $("#cuotas_betm").attr({"disabled":true});
                $("#descuento_betm").attr({"disabled":false});
                $("#descuento_betm").val("0");
                $("#ver_cuotas_betm").hide();
                $("select#cuotas_betm").val("0");
                if($("#monto_betm").val()==""){
                    $("#error_cuotabetm").css("display","inline-block")
                    $("#error_cuotabetm").show();
                    $("#monto_betm").focus();
                }
                if($("#hab_intercambio").is(":checked")){
                    $("#descuento_betm").attr({"disabled":true});
                }
                $("#hab_intercambio").attr({"disabled":false});
                datePick("cuota1_betm","0");
                $("#monto1_betm").val($("#monto_betm").val());
            }
            if ($(this).is(':checked') && $(this).val() == 'normal') {
                $("#cuotas_betm").attr({"disabled":false});
                showPlan($("#tipo_plan").val());
                $("#descuento_betm").attr({"disabled":true});
                llenar_cuotas_betm($("#cuotas_betm").val());
                $("#hab_intercambio").attr({"disabled":true});
                $("#descto_betm").attr({"disabled":true});
                $("#descto_betm").val(null);
                $("#descuento_betm").val("0");
                $("#por_intercambio").attr({"disabled":true});
                $("#por_intercambio").val("0");
                $("#por_pagar_betm").attr({"disabled":true});
                $("#por_pagar_betm").val(null);

                $("#inter_betm").attr({"disabled":true});
                $("#inter_betm").val(null);
                $("#hab_intercambio").attr("checked",false);
            }
            if ($(this).is(':checked') && $(this).val() == 'igual') {
                $("#cuotas_betm").attr({"disabled":false});
                $("#descuento_betm").attr({"disabled":true});
                showPlan($("#tipo_plan").val());
                llenar_cuotas_betm($("#cuotas_betm").val());
                $("#hab_intercambio").attr({"disabled":false});
                $("#descto_betm").attr({"disabled":true});
                $("#descto_betm").val(null);
                $("#descuento_betm").val("0");
                //$("#ver_cuotas_betm").show();
            }
            $('#monto_betm').focus();
        });

}

function openDialogElimina(idPop, tamano){
    $("#"+idPop).dialog({autoOpen: false,
        buttons:{
            SI:function(){
                $(this).dialog("close");
                 $.ajax({
                 url: 'configuracion/delete_cliente.php',
                 type: 'GET',
                 async: false,
                 data: "idcliente="+$("#val_elimina").val(),
                 success: function(data){
                 recargarTablaListado();

                 },
                 error: muestraError
                 });
            },
            NO:function(){
                $(this).dialog("close");
            }
        },
        width: tamano});
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
                        guardarpago();
                        break
                }
            }
        },
        width: tamano});
}

function funcPop(idpop){

    ($("#"+idpop).dialog("isOpen") == false) ? $("#"+idpop).dialog("open") : $("#"+idpop).dialog("close") ;
}

function guardarDatos(){
    var datos = $("#form_datos").serializeArray();
    $.ajax({
        url: 'configuracion/nuevo_cliente.php',
        type: 'POST',
        async: true,
        data: datos,
        success: function(data){
            alert("Cliente guardado");
            $("#idclientebetm").val(data);
            $("#hab_suscripBetm").attr({"disabled":false});
            $("#hab_suscripWeb").attr({"disabled":false});
            $("#hab_suscripSponsor").attr({"disabled":false});
            $("#hab_suscripPublicidad").attr({"disabled":false});
            $("#id_empresa_control").val(data);
        },
        error: muestraError
    });
}

function guardarBetm(){

    var id_empresa = $('#id_empresa').val();
    var betm_alta = $('#betm_alta').val();
    var betm_venc = $('#betm_venc').val();
    var tipo_plan = $('#tipo_plan').val();
    var cuotas_betm = $('#cuotas_betm').val();
    var tipo_betm = $('[name=tipo_betm]:checked').val();
    var monto_betm = $('#monto_betm').val();
    var hab_intercambio = $('#hab_intercambio').val();
    var por_intercambio = $('#por_intercambio').val();
    var descuento_betm = $('#descuento_betm').val();
    var descto_betm = $('#descto_betm').val();
    var por_pagar_betm = $('#por_pagar_betm').val();
    var inter_betm = $('#inter_betm').val();
    var cuota1_betm = $('#cuota1_betm').val();
    var monto1_betm = $('#monto1_betm').val();
    var cuota2_betm = $('#cuota2_betm').val();
    var monto2_betm = $('#monto2_betm').val();
    var cuota3_betm = $('#cuota3_betm').val();
    var monto3_betm = $('#monto3_betm').val();
    var cuota4_betm = $('#cuota4_betm').val();
    var monto4_betm = $('#monto4_betm').val();
    var cuota5_betm = $('#cuota5_betm').val();
    var monto5_betm = $('#monto5_betm').val();
    var cuota6_betm = $('#cuota6_betm').val();
    var monto6_betm = $('#monto6_betm').val();
    var cuota7_betm = $('#cuota7_betm').val();
    var monto7_betm = $('#monto7_betm').val();
    var cuota8_betm = $('#cuota8_betm').val();
    var monto8_betm = $('#monto8_betm').val();
    var cuota9_betm = $('#cuota9_betm').val();
    var monto9_betm = $('#monto9_betm').val();
    var cuota10_betm = $('#cuota10_betm').val();
    var monto10_betm = $('#monto10_betm').val();
    var cuota11_betm = $('#cuota11_betm').val();
    var monto11_betm = $('#monto11_betm').val();
    var cuota12_betm = $('#cuota12_betm').val();
    var monto12_betm = $('#monto12_betm').val();


    //var datos = $("#form_betm").serializeArray();
    $.ajax({
        url: 'configuracion/nuevo_betm.php',
        type: 'GET',
        async: true,
        data: "id_empresa=" + id_empresa + "&betm_alta=" + betm_alta + "&betm_venc=" + betm_venc + "&tipo_plan=" + tipo_plan + "&cuotas_betm=" + cuotas_betm + "&tipo_betm=" + tipo_betm + "&monto_betm=" + monto_betm + "&hab_intercambio=" + hab_intercambio + "&por_intercambio=" + por_intercambio + "&descuento_betm=" + descuento_betm + "&descto_betm=" + descto_betm + "&por_pagar_betm=" + por_pagar_betm +         "&inter_betm=" + inter_betm +
        "&cuota1_betm=" + cuota1_betm + "&monto1_betm=" + monto1_betm + "&cuota2_betm=" + cuota2_betm + "&monto2_betm=" + monto2_betm +
        "&cuota3_betm=" + cuota3_betm + "&monto3_betm=" + monto3_betm + "&cuota4_betm=" + cuota4_betm + "&monto4_betm=" + monto4_betm +
        "&cuota5_betm=" + cuota5_betm + "&monto5_betm=" + monto5_betm + "&cuota6_betm=" + cuota6_betm + "&monto6_betm=" + monto6_betm +
        "&cuota7_betm=" + cuota7_betm + "&monto7_betm=" + monto7_betm + "&cuota8_betm=" + cuota8_betm + "&monto8_betm=" + monto8_betm +
        "&cuota9_betm=" + cuota9_betm + "&monto9_betm=" + monto9_betm + "&cuota10_betm=" + cuota10_betm + "&monto10_betm=" + monto10_betm +
        "&cuota11_betm=" + cuota11_betm + "&monto11_betm=" + monto11_betm + "&cuota12_betm=" + cuota12_betm + "&monto12_betm=" + monto12_betm,
        success: function(data){
            alert("guardado BETM");
        },
        error: muestraError
    });
}

function datePick(fecha,def){
    $("#"+fecha).datepicker({defaultDate:def,selectDefaultDate: true});
    $("#"+fecha).datepicker( "setDate", def );
}

function showSelect(str){
    $.ajax({
        url: 'configuracion/carga_ciudad.php',
        type: 'GET',
        async: true,
        data: 'iddepto='+str,
        success: function(data){
            $("#select_ciudad").html(data);
        },
        error: muestraError
    });
}

function showCiudad(str){
    if(str == 'otra_ciudad'){
        $('#o_ciudad').attr({"disabled":false});
        $('#o_ciudad').focus();
    }else{
        $('#o_ciudad').attr({"disabled":true});
        $('#o_ciudad').val("");
    }
}

function procesaRespuesta(data){
    //alert(data);
}

function muestraError(data){
    alert("error "+data);
}

function showPlan(str){
    var cad = str.split("|");
    $("#monto_betm").val(cad[1]);

    if ($('input:radio[name="tipo_betm"]:checked').val() == "igual") {
        $('select#cuotas_betm').children('option:not(:first)').remove();
        $("#cuotas_betm").append("<option value='1'>1 Cuota</option>");
        $("#cuotas_betm").append("<option value='2'>2 Cuotas</option>");
        $("#cuotas_betm").append("<option value='3'>3 Cuotas</option>");
        $("#cuotas_betm").append("<option value='4'>4 Cuotas</option>");
        $("#cuotas_betm").append("<option value='5'>5 Cuotas</option>");
        $("#cuotas_betm").append("<option value='6'>6 Cuotas</option>");
        $("#cuotas_betm").append("<option value='7'>7 Cuotas</option>");
        $("#cuotas_betm").append("<option value='8'>8 Cuotas</option>");
        $("#cuotas_betm").append("<option value='9'>9 Cuotas</option>");
        $("#cuotas_betm").append("<option value='10'>10 Cuotas</option>");
        $("#cuotas_betm").append("<option value='11'>11 Cuotas</option>");
        $("#cuotas_betm").append("<option value='12'>12 Cuotas</option>");
    }

    if ($('input:radio[name="tipo_betm"]:checked').val() == "normal") {
        if(cad[0]=="1" ||cad[0]=="9" || cad[0]=="10"){
            $('select#cuotas_betm').children('option:not(:first)').remove();
            $("#cuotas_betm").append("<option value='1'>1 Cuota</option>");
        }

        if(cad[0]=="2"){
            $('select#cuotas_betm').children('option:not(:first)').remove();
            $("#cuotas_betm").append("<option value='1'>1 Cuota</option>");
            $("#cuotas_betm").append("<option value='4'>4 Cuotas</option>");
        }

        if(cad[0]=="3" || cad[0]=="4"){
            $('select#cuotas_betm').children('option:not(:first)').remove();
            $("#cuotas_betm").append("<option value='1'>1 Cuota</option>");
            $("#cuotas_betm").append("<option value='4'>4 Cuotas</option>");
            $("#cuotas_betm").append("<option value='7'>7 Cuotas</option>");
        }

        if(cad[0]=="5" || cad[0]=="6" ||cad[0]=="7" || cad[0]=="8"){
            $('select#cuotas_betm').children('option:not(:first)').remove();
            $("#cuotas_betm").append("<option value='1'>1 Cuota</option>");
            $("#cuotas_betm").append("<option value='4'>4 Cuotas</option>");
            $("#cuotas_betm").append("<option value='7'>7 Cuotas</option>");
            $("#cuotas_betm").append("<option value='12'>12 Cuotas</option>");
        }
        //llenar_normal(str);
    }

    llenar_cuotas_betm($("#cuotas_betm").val());
}

function llenar_cuota(num){

    sw1 = "0";
    sw2 = "0";
    sw3 = "0";

    if ($('input:radio[name="tipo_betm"]:checked').val() == "contado") {
        sw1="1";sw2="0";sw3="0";
    }
    if ($('input:radio[name="tipo_betm"]:checked').val() == "normal") {
        sw1="0";sw2="1";sw3="0";
    }
    if ($('input:radio[name="tipo_betm"]:checked').val() == "igual") {
        sw1="0";sw2="0";sw3="1";
    }

    for(i =num+1;i <= 12 ; i++){
        $("#cuota"+i+"_betm").attr({"disabled":true});
        $("#monto"+i+"_betm").attr({"disabled":true});
        //$("#cuota"+i+"_betm").val("");
        datePick("cuota"+i+"_betm","+"+i-1+"m");
        $("#monto"+i+"_betm").val("");
    }
    for(j=1; j<=num; j++){
        $("#monto"+j+"_betm").attr({"disabled":false});
        $("#cuota"+j+"_betm").attr({"disabled":false});
        datePick("cuota"+j+"_betm","+"+j-1+"m");
        if(sw1=="1"){
            //$("#monto"+j+"_betm").val("1");
        }
        if(sw2=="1"){
            llenar_normal($("#tipo_plan").val());
        }
        if(sw3=="1"){
            if($("#hab_intercambio").is(":checked")){
                $("#monto"+j+"_betm").val(($("#por_pagar_betm").val()/num).toFixed(2));
            }else{
                $("#monto"+j+"_betm").val(($("#monto_betm").val()/num).toFixed(2));
            }
        }

    }
}

function llenar_cuotas_betm(str){
    if($("#monto_betm").val()!=""){
        if(str == "0"){
            $("#ver_cuotas_betm").hide();
        }else{
            $("#ver_cuotas_betm").show();
            llenar_cuota(parseInt(str));
        }
        $("#error_cuotabetm").hide();
    }else{
        $("#error_cuotabetm").css("display","inline-block")
        $("#error_cuotabetm").show();
        $("#monto_betm").focus();
    }

}

function llenar_normal(str){

    var cad = str.split("|");
    var num = $("#cuotas_betm").val();
    switch (num){
        case "1":
            $("#monto1_betm").val(cad[2]);
            break;
        case "4":
            $("#monto1_betm").val(cad[2]);
            $("#monto2_betm").val(cad[3]);
            $("#monto3_betm").val(cad[3]);
            $("#monto4_betm").val(cad[3]);
            break;
        case "7":
            $("#monto1_betm").val(cad[2]);
            $("#monto2_betm").val(cad[4]);
            $("#monto3_betm").val(cad[4]);
            $("#monto4_betm").val(cad[4]);
            $("#monto5_betm").val(cad[4]);
            $("#monto6_betm").val(cad[4]);
            $("#monto7_betm").val(cad[4]);
            break;
        case "12":
            $("#monto1_betm").val(cad[2]);
            $("#monto2_betm").val(cad[5]);
            $("#monto3_betm").val(cad[5]);
            $("#monto4_betm").val(cad[5]);
            $("#monto5_betm").val(cad[5]);
            $("#monto6_betm").val(cad[5]);
            $("#monto7_betm").val(cad[5]);
            $("#monto8_betm").val(cad[5]);
            $("#monto9_betm").val(cad[5]);
            $("#monto10_betm").val(cad[5]);
            $("#monto11_betm").val(cad[5]);
            $("#monto12_betm").val(cad[5]);
            break;
    }

}

function descontarBetm(str){
    var cad = $("#tipo_plan").val().split("|");

    var porcentaje = ($("#monto_betm").val()* parseInt(str))/100;
    $("#descto_betm").val($("#monto_betm").val() - porcentaje);
    $("#descto_betm").attr({"disabled":false});
}

function habilitarIntercambio(){

    if($("#hab_intercambio").is(":checked")){
        $("#descto_betm").attr({"disabled":true});
        $("#descto_betm").val(null);
        $("#descuento_betm").val("0");
        $("#descuento_betm").attr({"disabled":true});
        $("#por_intercambio").attr({"disabled":false});
    }else{
        $("#por_intercambio").attr({"disabled":true});
        $("#por_intercambio").val("0");
        $("#inter_betm").attr({"disabled":true});
        $("#por_pagar_betm").attr({"disabled":true});
        if($('input:radio[name="tipo_betm"]:checked').val() == "normal" || $('input:radio[name="tipo_betm"]:checked').val() == "igual"){
            $("#descuento_betm").attr({"disabled":true});
        }else{
            $("#descuento_betm").attr({"disabled":false});
        }

    }
}

function intercambio_betm(str){
    var porcentaje = ($("#monto_betm").val()* parseInt(str))/100;
    $("#inter_betm").val(porcentaje);
    $("#por_pagar_betm").val($("#monto_betm").val() - porcentaje);
    $("#inter_betm").attr({"disabled":false});
    $("#por_pagar_betm").attr({"disabled":false});
}

function habilita_betm(){
    $("#suscripBetm").toggle();
    if($("#hab_suscripBetm").is(":checked")){
        $("#id_empresa").val($("#idclientebetm").val());
    }else {
        $("#id_empresa").val(null);
    }

}

function guardarControl(){

    var id_empresa_control = $("#id_empresa_control").val();
    var envio_contr = $("#envio_contr").val();
    var susc_contr = $("#susc_contr").val();
    var envio_convenio = $("#envio_convenio").val();
    var recep_convenio = $("#recep_convenio").val();
    //var datos = $("#form_control").serializeArray();
    $.ajax({
        url: 'configuracion/nuevo_control.php',
        type: 'GET',
        async: true,
        data: "id_empresa_control=" + id_empresa_control +
        "&envio_contr=" + envio_contr +
        "&susc_contr=" + susc_contr +
        "&envio_convenio=" + envio_convenio +
        "&recep_convenio=" + recep_convenio ,
        success: function(data){
            alert("control guardado");
        },
        error: muestraError
    });
}

function recargarTablaListado(){
    $.ajax({
        url: 'configuracion/cargar_tabla_listado.php',
        type: 'POST',
        async: false,
        data: "idcliente="+1,
        success: function(data){
            $("#contenido_listado").html(data);
            $(".btn_elimina").on("click", function(){funcPop("pop_elimina");});
            openDialogElimina("pop_elimina",450);
        },
        error: muestraError
    });
}

function elimina_cliente(str){
    $("#val_elimina").val(str);
}
