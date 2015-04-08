$(document).on("ready",inicioP);

function inicioP(){
    datePick("publicidad_venc","+1y-1d");
    datePick("publicidad_alta","0");

    datePick("fec_alta_publicidad","0");
    datePick("fec_venc_publicidad","0");

    verResultadoS("num_publicidad","monto_publicidad");

    $("#cuotas_publicidad").attr({"disabled":true});
    $("#descuento_publicidad").attr({"disabled":true});
    $("#ver_cuotas_publicidad").hide();
    $("#por_intercambio_publicidad").attr({"disabled":true});
    $("#descto_publicidad").attr({"disabled":true});
    $("#inter_publicidad").attr({"disabled":true});
    $("#por_pagar_publicidad").attr({"disabled":true});
    $("#suscripPublicidad").hide();
    $("#hab_suscriPublicidad").attr("checked",false);
    $("#hab_suscripPublicidad").attr({"disabled":true});
    if($("#hab_suscripPublicidad").is(":checked")){
        $("#suscripPublicidad").show();
    }

    $('input:radio[name="tipo_publicidad"]').change(
        function(){
            if ($(this).is(':checked') && $(this).val() == 'contado') {
                $("#cuotas_publicidad").attr({"disabled":true});
                $("#descuento_publicidad").attr({"disabled":false});
                $("#descuento_publicidad").val("0");
                $("#ver_cuotas_publicidad").hide();
                $("select#cuotas_publicidad").val("0");
                if($("#monto_publicidad").val()==""){
                    $("#error_cuotapublicidad").css("display","inline-block")
                    $("#error_cuotapublicidad").show();
                    $("#monto_publicidad").focus();
                }
                if($("#hab_intercambio").is(":checked")){
                    $("#descuento_publicidad").attr({"disabled":true});
                }
                $("#hab_intercambio").attr({"disabled":false});
                datePick("cuota1_publicidad","0");
                $("#monto1_publicidad").val($("#monto_publicidad").val());
            }
            if ($(this).is(':checked') && $(this).val() == 'igual') {
                $("#cuotas_publicidad").attr({"disabled":false});
                $("#descuento_publicidad").attr({"disabled":true});
                llenar_cuotas_publicidad($("#cuotas_publicidad").val());
                $("#hab_intercambio").attr({"disabled":false});
                $("#descto_publicidad").attr({"disabled":true});
                $("#descto_publicidad").val(null);
                $("#descuento_publicidad").val("0");
                //$("#ver_cuotas_publicidad").show();
            }
            $('#monto_publicidad').focus();
        });

}

function habilita_publicidad(){
    $("#suscripPublicidad").toggle();
    if($("#hab_suscripPublicidad").is(":checked")){
        $("#id_empresaPublicidad").val($("#idclientebetm").val());
    }else {
        $("#id_empresaPublicidad").val(null);
    }

}

function verResultadoS(idIn,idOut) {
    $("#"+idIn).on("keyup", function(){verKeyUpS(idIn,idOut);});
}

function verKeyUpS(idIn, idOut){
    var valor = $("#"+idIn).val()*33;
    $("#"+idOut).val(valor);
    var suma = parseFloat($("#num_publicidad").val()*100);
    $("#monto_publicidad").val(suma);
}

function habilitarIntercambioPublicidad(){

    if($("#hab_intercambio_publicidad").is(":checked")){
        $("#descto_publicidad").attr({"disabled":true});
        $("#descto_publicidad").val(null);
        $("#descuento_publicidad").val("0");
        $("#descuento_publicidad").attr({"disabled":true});
        $("#por_intercambio_publicidad").attr({"disabled":false});
    }else{
        $("#por_intercambio_publicidad").attr({"disabled":true});
        $("#por_intercambio_publicidad").val("0");
        $("#inter_publicidad").attr({"disabled":true});
        $("#por_pagar_publicidad").attr({"disabled":true});
    }
}

function intercambio_publicidad(str){
    var porcentaje = ($("#monto_publicidad").val()* parseInt(str))/100;
    $("#inter_publicidad").val(porcentaje);
    $("#por_pagar_publicidad").val($("#monto_publicidad").val() - porcentaje);
    $("#inter_publicidad").attr({"disabled":false});
    $("#por_pagar_publicidad").attr({"disabled":false});
}

function descontarPublicidad(str){
    var porcentaje = ($("#monto_publicidad").val()* parseInt(str))/100;
    $("#descto_publicidad").val($("#monto_publicidad").val() - porcentaje);
    $("#descto_publicidad").attr({"disabled":false});
}

function llenar_cuotas_publicidad(str){
    if($("#monto_publicidad").val()!=""){
        if(str == "0"){
            $("#ver_cuotas_publicidad").hide();
        }else{
            $("#ver_cuotas_publicidad").show();
            llenar_cuotaPublicidad(parseInt(str));
        }
        $("#error_cuotapublicidad").hide();
    }else{
        $("#error_cuotapublicidad").css("display","inline-block")
        $("#error_cuotapublicidad").show();
        $("#monto_publicidad").focus();
    }
}

function llenar_cuotaPublicidad(num){

    sw1 = "0";
    sw2 = "0";
    sw3 = "0";

    if ($('input:radio[name="tipo_publicidad"]:checked').val() == "contado") {
        sw1="1";sw2="0";sw3="0";
    }
    if ($('input:radio[name="tipo_publicidad"]:checked').val() == "igual") {
        sw1="0";sw2="0";sw3="1";
    }

    for(i =num+1;i <= 12 ; i++){
        $("#cuota"+i+"_publicidad").attr({"disabled":true});
        $("#monto"+i+"_publicidad").attr({"disabled":true});
        //$("#cuota"+i+"_publicidad").val("");
        datePick("cuota"+i+"_publicidad","+"+i-1+"m");
        $("#monto"+i+"_publicidad").val("");
    }
    for(j=1; j<=num; j++){
        $("#monto"+j+"_publicidad").attr({"disabled":false});
        $("#cuota"+j+"_publicidad").attr({"disabled":false});
        datePick("cuota"+j+"_publicidad","+"+j-1+"m");
        if(sw1=="1"){
            //$("#monto"+j+"_publicidad").val("1");
        }
        if(sw3=="1"){
            if($("#hab_intercambio_publicidad").is(":checked")){
                $("#monto"+j+"_publicidad").val(($("#por_pagar_publicidad").val()/num).toFixed(2));
            }else{
                $("#monto"+j+"_publicidad").val(($("#monto_publicidad").val()/num).toFixed(2));
            }
        }

    }
}

function guardarPublicidad(){

    var id_empresaPublicidad = $("#id_empresaPublicidad").val();
    var publicidad_alta = $("#publicidad_alta").val();
    var publicidad_venc = $("#publicidad_venc").val();
    var num_publicidad = $("#num_publicidad").val();
    var pag_seleccion = $("#pag_seleccion_publicidad").val();
    var tam_banner = $("#tam_banner").val();
    var fec_alta_publicidad = $("#fec_alta_publicidad").val();
    var fec_venc_publicidad = $("#fec_venc_publicidad").val();
    var tipo_publicidad = $('[name=tipo_publicidad]:checked').val();
    var hab_intercambio_publicidad = $("#hab_intercambio_publicidad").val();
    var por_intercambio_publicidad = $("#por_intercambio_publicidad").val();
    var monto_publicidad = $("#monto_publicidad").val();
    var descuento_publicidad = $("#descuento_publicidad").val();
    var cuotas_publicidad = $("#cuotas_publicidad").val();
    var descto_publicidad = $("#descto_publicidad").val();
    var por_pagar_publicidad = $("#por_pagar_publicidad").val();
    var inter_publicidad = $("#inter_publicidad").val();
    var cuota1_publicidad = $("#cuota1_publicidad").val();
    var monto1_publicidad = $("#monto1_publicidad").val();
    var cuota2_publicidad = $("#cuota2_publicidad").val();
    var monto2_publicidad = $("#monto2_publicidad").val();
    var cuota3_publicidad = $("#cuota3_publicidad").val();
    var monto3_publicidad = $("#monto3_publicidad").val();
    var cuota4_publicidad = $("#cuota4_publicidad").val();
    var monto4_publicidad = $("#monto4_publicidad").val();
    var cuota5_publicidad = $("#cuota5_publicidad").val();
    var monto5_publicidad = $("#monto5_publicidad").val();
    var cuota6_publicidad = $("#cuota6_publicidad").val();
    var monto6_publicidad = $("#monto6_publicidad").val();
    var cuota7_publicidad = $("#cuota7_publicidad").val();
    var monto7_publicidad = $("#monto7_publicidad").val();
    var cuota8_publicidad = $("#cuota8_publicidad").val();
    var monto8_publicidad = $("#monto8_publicidad").val();
    var cuota9_publicidad = $("#cuota9_publicidad").val();
    var monto9_publicidad = $("#monto9_publicidad").val();
    var cuota10_publicidad = $("#cuota10_publicidad").val();
    var monto10_publicidad = $("#monto10_publicidad").val();
    var cuota11_publicidad = $("#cuota11_publicidad").val();
    var monto11_publicidad = $("#monto11_publicidad").val();
    var cuota12_publicidad = $("#cuota12_publicidad").val();
    var monto12_publicidad = $("#monto12_publicidad").val();

    //var datos = $("#form_publicidad").serializeArray();
    $.ajax({
        url: 'configuracion/nuevo_publicidad.php',
        type: 'GET',
        async: true,
        data: "id_empresaPublicidad=" + id_empresaPublicidad +
        "&publicidad_alta=" + publicidad_alta +
        "&publicidad_venc=" + publicidad_venc +
        "&num_publicidad=" + num_publicidad +
        "&pag_seleccion=" + pag_seleccion +
        "&tam_banner=" + tam_banner +
        "&fec_alta_publicidad=" + fec_alta_publicidad +
        "&fec_venc_publicidad=" + fec_venc_publicidad +
        "&tipo_publicidad=" + tipo_publicidad +
        "&tipo_publicidad=" + tipo_publicidad +
        "&hab_intercambio_publicidad=" + hab_intercambio_publicidad +
        "&por_intercambio_publicidad=" + por_intercambio_publicidad +
        "&monto_publicidad=" + monto_publicidad +
        "&descuento_publicidad=" + descuento_publicidad +
        "&cuotas_publicidad=" + cuotas_publicidad +
        "&descto_publicidad=" + descto_publicidad +
        "&por_pagar_publicidad=" + por_pagar_publicidad +
        "&inter_publicidad=" + inter_publicidad +
        "&cuota1_publicidad=" + cuota1_publicidad +
        "&monto1_publicidad=" + monto1_publicidad +
        "&cuota2_publicidad=" + cuota2_publicidad +
        "&monto2_publicidad=" + monto2_publicidad +
        "&cuota3_publicidad=" + cuota3_publicidad +
        "&monto3_publicidad=" + monto3_publicidad +
        "&cuota4_publicidad=" + cuota4_publicidad +
        "&monto4_publicidad=" + monto4_publicidad +
        "&cuota5_publicidad=" + cuota5_publicidad +
        "&monto5_publicidad=" + monto5_publicidad +
        "&cuota6_publicidad=" + cuota6_publicidad +
        "&monto6_publicidad=" + monto6_publicidad +
        "&cuota7_publicidad=" + cuota7_publicidad +
        "&monto7_publicidad=" + monto7_publicidad +
        "&cuota8_publicidad=" + cuota8_publicidad +
        "&monto8_publicidad=" + monto8_publicidad +
        "&cuota9_publicidad=" + cuota9_publicidad +
        "&monto9_publicidad=" + monto9_publicidad +
        "&cuota10_publicidad=" + cuota10_publicidad +
        "&monto10_publicidad=" + monto10_publicidad +
        "&cuota11_publicidad=" + cuota11_publicidad +
        "&monto11_publicidad=" + monto11_publicidad +
        "&cuota12_publicidad=" + cuota12_publicidad +
        "&monto12_publicidad=" + monto12_publicidad ,
        success: function(data){
            alert("Publicidad guardado");
        },
        error: muestraError
    });
}
