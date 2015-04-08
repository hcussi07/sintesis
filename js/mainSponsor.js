$(document).on("ready",inicioW);

function inicioW(){
    datePick("sponsor_venc","+1y-1d");
    datePick("sponsor_alta","0");

    datePick("fec_alta_sponsor","0");
    datePick("fec_venc_sponsor","0");

    verResultadoS("num_sponsors","monto_sponsor");

    $("#cuotas_sponsor").attr({"disabled":true});
    $("#descuento_sponsor").attr({"disabled":true});
    $("#ver_cuotas_sponsor").hide();
    $("#por_intercambio_sponsor").attr({"disabled":true});
    $("#descto_sponsor").attr({"disabled":true});
    $("#inter_sponsor").attr({"disabled":true});
    $("#por_pagar_sponsor").attr({"disabled":true});
    $("#suscripSponsor").hide();
    $("#hab_suscriSponsor").attr("checked",false);
    $("#hab_suscripSponsor").attr({"disabled":true});
    if($("#hab_suscripSponsor").is(":checked")){
        $("#suscripSponsor").show();
    }

    $('input:radio[name="tipo_sponsor"]').change(
        function(){
            if ($(this).is(':checked') && $(this).val() == 'contado') {
                $("#cuotas_sponsor").attr({"disabled":true});
                $("#descuento_sponsor").attr({"disabled":false});
                $("#descuento_sponsor").val("0");
                $("#ver_cuotas_sponsor").hide();
                $("select#cuotas_sponsor").val("0");
                if($("#monto_sponsor").val()==""){
                    $("#error_cuotasponsor").css("display","inline-block")
                    $("#error_cuotasponsor").show();
                    $("#monto_sponsor").focus();
                }
                if($("#hab_intercambio").is(":checked")){
                    $("#descuento_sponsor").attr({"disabled":true});
                }
                $("#hab_intercambio").attr({"disabled":false});
                datePick("cuota1_sponsor","0");
                $("#monto1_sponsor").val($("#monto_sponsor").val());
            }
            if ($(this).is(':checked') && $(this).val() == 'igual') {
                $("#cuotas_sponsor").attr({"disabled":false});
                $("#descuento_sponsor").attr({"disabled":true});
                llenar_cuotas_sponsor($("#cuotas_sponsor").val());
                $("#hab_intercambio").attr({"disabled":false});
                $("#descto_sponsor").attr({"disabled":true});
                $("#descto_sponsor").val(null);
                $("#descuento_sponsor").val("0");
                //$("#ver_cuotas_sponsor").show();
            }
            $('#monto_sponsor').focus();
        });

}

function habilita_sponsor(){
    $("#suscripSponsor").toggle();
    if($("#hab_suscripSponsor").is(":checked")){
        $("#id_empresaSponsor").val($("#idclientebetm").val());
    }else {
        $("#id_empresaSponsor").val(null);
    }

}

function verResultadoS(idIn,idOut) {
    $("#"+idIn).on("keyup", function(){verKeyUpS(idIn,idOut);});
}

function verKeyUpS(idIn, idOut){
    var valor = $("#"+idIn).val()*33;
    $("#"+idOut).val(valor);
    var suma = parseFloat($("#num_sponsors").val()*150);
    $("#monto_sponsor").val(suma);
}

function habilitarIntercambioSponsor(){

    if($("#hab_intercambio_sponsor").is(":checked")){
        $("#descto_sponsor").attr({"disabled":true});
        $("#descto_sponsor").val(null);
        $("#descuento_sponsor").val("0");
        $("#descuento_sponsor").attr({"disabled":true});
        $("#por_intercambio_sponsor").attr({"disabled":false});
    }else{
        $("#por_intercambio_sponsor").attr({"disabled":true});
        $("#por_intercambio_sponsor").val("0");
        $("#inter_sponsor").attr({"disabled":true});
        $("#por_pagar_sponsor").attr({"disabled":true});
    }
}

function intercambio_sponsor(str){
    var porcentaje = ($("#monto_sponsor").val()* parseInt(str))/100;
    $("#inter_sponsor").val(porcentaje);
    $("#por_pagar_sponsor").val($("#monto_sponsor").val() - porcentaje);
    $("#inter_sponsor").attr({"disabled":false});
    $("#por_pagar_sponsor").attr({"disabled":false});
}

function descontarSponsor(str){
    var porcentaje = ($("#monto_sponsor").val()* parseInt(str))/100;
    $("#descto_sponsor").val($("#monto_sponsor").val() - porcentaje);
    $("#descto_sponsor").attr({"disabled":false});
}

function llenar_cuotas_sponsor(str){
    if($("#monto_sponsor").val()!=""){
        if(str == "0"){
            $("#ver_cuotas_sponsor").hide();
        }else{
            $("#ver_cuotas_sponsor").show();
            llenar_cuotaSponsor(parseInt(str));
        }
        $("#error_cuotasponsor").hide();
    }else{
        $("#error_cuotasponsor").css("display","inline-block")
        $("#error_cuotasponsor").show();
        $("#monto_sponsor").focus();
    }
}

function llenar_cuotaSponsor(num){

    sw1 = "0";
    sw2 = "0";
    sw3 = "0";

    if ($('input:radio[name="tipo_sponsor"]:checked').val() == "contado") {
        sw1="1";sw2="0";sw3="0";
    }
    if ($('input:radio[name="tipo_sponsor"]:checked').val() == "igual") {
        sw1="0";sw2="0";sw3="1";
    }

    for(i =num+1;i <= 12 ; i++){
        $("#cuota"+i+"_sponsor").attr({"disabled":true});
        $("#monto"+i+"_sponsor").attr({"disabled":true});
        //$("#cuota"+i+"_sponsor").val("");
        datePick("cuota"+i+"_sponsor","+"+i-1+"m");
        $("#monto"+i+"_sponsor").val("");
    }
    for(j=1; j<=num; j++){
        $("#monto"+j+"_sponsor").attr({"disabled":false});
        $("#cuota"+j+"_sponsor").attr({"disabled":false});
        datePick("cuota"+j+"_sponsor","+"+j-1+"m");
        if(sw1=="1"){
            //$("#monto"+j+"_sponsor").val("1");
        }
        if(sw3=="1"){
            if($("#hab_intercambio_sponsor").is(":checked")){
                $("#monto"+j+"_sponsor").val(($("#por_pagar_sponsor").val()/num).toFixed(2));
            }else{
                $("#monto"+j+"_sponsor").val(($("#monto_sponsor").val()/num).toFixed(2));
            }
        }

    }
}

function guardarSponsor(){

    var id_empresaSponsor = $("#id_empresaSponsor").val();
    var sponsor_alta = $("#sponsor_alta").val();
    var sponsor_venc = $("#sponsor_venc").val();
    var num_sponsors = $("#num_sponsors").val();
    var pag_seleccion = $("#pag_seleccion").val();
    var fec_alta_sponsor = $("#fec_alta_sponsor").val();
    var fec_venc_sponsor = $("#fec_venc_sponsor").val();
    var tipo_sponsor = $('[name=tipo_sponsor]:checked').val();
    var hab_intercambio_sponsor = $("#hab_intercambio_sponsor").val();
    var por_intercambio_sponsor = $("#por_intercambio_sponsor").val();
    var monto_sponsor = $("#monto_sponsor").val();
    var descuento_sponsor = $("#descuento_sponsor").val();
    var cuotas_sponsor = $("#cuotas_sponsor").val();
    var descto_sponsor = $("#descto_sponsor").val();
    var por_pagar_sponsor = $("#por_pagar_sponsor").val();
    var inter_sponsor = $("#inter_sponsor").val();
    var cuota1_sponsor = $("#cuota1_sponsor").val();
    var monto1_sponsor = $("#monto1_sponsor").val();
    var cuota2_sponsor = $("#cuota2_sponsor").val();
    var monto2_sponsor = $("#monto2_sponsor").val();
    var cuota3_sponsor = $("#cuota3_sponsor").val();
    var monto3_sponsor = $("#monto3_sponsor").val();
    var cuota4_sponsor = $("#cuota4_sponsor").val();
    var monto4_sponsor = $("#monto4_sponsor").val();
    var cuota5_sponsor = $("#cuota5_sponsor").val();
    var monto5_sponsor = $("#monto5_sponsor").val();
    var cuota6_sponsor = $("#cuota6_sponsor").val();
    var monto6_sponsor = $("#monto6_sponsor").val();
    var cuota7_sponsor = $("#cuota7_sponsor").val();
    var monto7_sponsor = $("#monto7_sponsor").val();
    var cuota8_sponsor = $("#cuota8_sponsor").val();
    var monto8_sponsor = $("#monto8_sponsor").val();
    var cuota9_sponsor = $("#cuota9_sponsor").val();
    var monto9_sponsor = $("#monto9_sponsor").val();
    var cuota10_sponsor = $("#cuota10_sponsor").val();
    var monto10_sponsor = $("#monto10_sponsor").val();
    var cuota11_sponsor = $("#cuota11_sponsor").val();
    var monto11_sponsor = $("#monto11_sponsor").val();
    var cuota12_sponsor = $("#cuota12_sponsor").val();
    var monto12_sponsor = $("#monto12_sponsor").val();

    //var datos = $("#form_sponsor").serializeArray();
    $.ajax({
        url: 'configuracion/nuevo_sponsor.php',
        type: 'GET',
        async: true,
        data: "id_empresaSponsor=" + id_empresaSponsor + "&sponsor_alta=" + sponsor_alta + "&sponsor_venc=" + sponsor_venc + "&num_sponsors=" + num_sponsors +
        "&pag_seleccion=" + pag_seleccion + "&fec_alta_sponsor=" + fec_alta_sponsor + "&fec_venc_sponsor=" + fec_venc_sponsor + "&tipo_sponsor=" + tipo_sponsor +
        "&tipo_sponsor=" + tipo_sponsor + "&hab_intercambio_sponsor=" + hab_intercambio_sponsor + "&por_intercambio_sponsor=" + por_intercambio_sponsor + "&monto_sponsor=" + monto_sponsor + "&descuento_sponsor=" + descuento_sponsor + "&cuotas_sponsor=" + cuotas_sponsor + "&descto_sponsor=" + descto_sponsor + "&por_pagar_sponsor=" + por_pagar_sponsor +
        "&inter_sponsor=" + inter_sponsor + "&cuota1_sponsor=" + cuota1_sponsor + "&monto1_sponsor=" + monto1_sponsor + "&cuota2_sponsor=" + cuota2_sponsor + "&monto2_sponsor=" + monto2_sponsor + "&cuota3_sponsor=" + cuota3_sponsor +
        "&monto3_sponsor=" + monto3_sponsor + "&cuota4_sponsor=" + cuota4_sponsor + "&monto4_sponsor=" + monto4_sponsor + "&cuota5_sponsor=" + cuota5_sponsor + "&monto5_sponsor=" + monto5_sponsor + "&cuota6_sponsor=" + cuota6_sponsor +
        "&monto6_sponsor=" + monto6_sponsor + "&cuota7_sponsor=" + cuota7_sponsor + "&monto7_sponsor=" + monto7_sponsor + "&cuota8_sponsor=" + cuota8_sponsor + "&monto8_sponsor=" + monto8_sponsor +
        "&cuota9_sponsor=" + cuota9_sponsor + "&monto9_sponsor=" + monto9_sponsor + "&cuota10_sponsor=" + cuota10_sponsor + "&monto10_sponsor=" + monto10_sponsor + "&cuota11_sponsor=" + cuota11_sponsor + "&monto11_sponsor=" + monto11_sponsor + "&cuota12_sponsor=" + cuota12_sponsor + "&monto12_sponsor=" + monto12_sponsor ,
        success: function(data){
            alert("Sponsor guardado");
        },
        error: muestraError
    });
}
