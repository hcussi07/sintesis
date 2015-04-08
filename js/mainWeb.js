$(document).on("ready",inicioW);

function inicioW(){
    datePick("web_venc","+1y-1d");
    datePick("web_alta","0");

    datePick("alta_web","0");
    datePick("alta_hosting","0");
    datePick("alta_dominio","0");

    verResultado("num_botones","monto_botones");

    $("#cuotas_web").attr({"disabled":true});
    $("#descuento_web").attr({"disabled":true});
    $("#ver_cuotas_web").hide();
    $("#por_intercambio_web").attr({"disabled":true});
    $("#descto_web").attr({"disabled":true});
    $("#inter_web").attr({"disabled":true});
    $("#por_pagar_web").attr({"disabled":true});
    $("#suscripWeb").hide();
    $("#hab_suscriWeb").attr("checked",false);
    $("#hab_suscripWeb").attr({"disabled":true});
    if($("#hab_suscripWeb").is(":checked")){
        $("#suscripWeb").show();
    }

    $('input:radio[name="tipo_web"]').change(
        function(){
            if ($(this).is(':checked') && $(this).val() == 'contado') {
                $("#cuotas_web").attr({"disabled":true});
                $("#descuento_web").attr({"disabled":false});
                $("#descuento_web").val("0");
                $("#ver_cuotas_web").hide();
                $("select#cuotas_web").val("0");
                if($("#monto_web").val()==""){
                    $("#error_cuotaweb").css("display","inline-block")
                    $("#error_cuotaweb").show();
                    $("#monto_web").focus();
                }
                if($("#hab_intercambio").is(":checked")){
                    $("#descuento_web").attr({"disabled":true});
                }
                $("#hab_intercambio").attr({"disabled":false});
                datePick("cuota1_web","0");
                $("#monto1_web").val($("#monto_web").val());
            }
            if ($(this).is(':checked') && $(this).val() == 'igual') {
                $("#cuotas_web").attr({"disabled":false});
                $("#descuento_web").attr({"disabled":true});
                llenar_cuotas_web($("#cuotas_web").val());
                $("#hab_intercambio").attr({"disabled":false});
                $("#descto_web").attr({"disabled":true});
                $("#descto_web").val(null);
                $("#descuento_web").val("0");
                //$("#ver_cuotas_web").show();
            }
            $('#monto_web').focus();
        });

}

function habilita_web(){
    $("#suscripWeb").toggle();
    if($("#hab_suscripWeb").is(":checked")){
        $("#id_empresaWeb").val($("#idclientebetm").val());
    }else {
        $("#id_empresaWeb").val(null);
    }

}

function verResultado(idIn,idOut) {
    $("#"+idIn).on("keyup", function(){verKeyUp(idIn,idOut);});
}

function verKeyUp(idIn, idOut){
    var valor = $("#"+idIn).val()*33;
    $("#"+idOut).val(valor);
    var suma = parseFloat($("#monto_botones").val()) + parseFloat($("#monto_hosting").val()) + parseFloat($("#monto_dominio").val());
    $("#monto_web").val(suma);
}

function adiciona_hosting(){
    if($("#hosting_web").is(":checked")){
        $("#monto_hosting").val(56);
    }else {
        $("#monto_hosting").val(0);
    }
    var suma = parseFloat($("#monto_botones").val()) + parseFloat($("#monto_hosting").val()) + parseFloat($("#monto_dominio").val());
    $("#monto_web").val(suma);
}

function adiciona_dominio_com(){
    if($("#dominio_com").is(":checked")){
        $("#dominio_com_bo").attr("checked",false);
        $("#monto_dominio").val(14);
    }else {
        $("#monto_dominio").val(0);
    }
    var suma = parseFloat($("#monto_botones").val()) + parseFloat($("#monto_hosting").val()) + parseFloat($("#monto_dominio").val());
    $("#monto_web").val(suma);
}

function adiciona_dominio_com_bo(){
    if($("#dominio_com_bo").is(":checked")){
        $("#dominio_com").attr("checked",false);
        $("#monto_dominio").val(41);
    }else {
        $("#monto_dominio").val(0);
    }
    var suma = parseFloat($("#monto_botones").val()) + parseFloat($("#monto_hosting").val()) + parseFloat($("#monto_dominio").val());
    $("#monto_web").val(suma);
}

function habilitarIntercambioWeb(){

    if($("#hab_intercambio_web").is(":checked")){
        $("#descto_web").attr({"disabled":true});
        $("#descto_web").val(null);
        $("#descuento_web").val("0");
        $("#descuento_web").attr({"disabled":true});
        $("#por_intercambio_web").attr({"disabled":false});
    }else{
        $("#por_intercambio_web").attr({"disabled":true});
        $("#por_intercambio_web").val("0");
        $("#inter_web").attr({"disabled":true});
        $("#por_pagar_web").attr({"disabled":true});
    }
}

function intercambio_web(str){
    var porcentaje = ($("#monto_web").val()* parseInt(str))/100;
    $("#inter_web").val(porcentaje);
    $("#por_pagar_web").val($("#monto_web").val() - porcentaje);
    $("#inter_web").attr({"disabled":false});
    $("#por_pagar_web").attr({"disabled":false});
}

function descontarWeb(str){
    var porcentaje = ($("#monto_web").val()* parseInt(str))/100;
    $("#descto_web").val($("#monto_web").val() - porcentaje);
    $("#descto_web").attr({"disabled":false});
}

function llenar_cuotas_web(str){
    if($("#monto_web").val()!=""){
        if(str == "0"){
            $("#ver_cuotas_web").hide();
        }else{
            $("#ver_cuotas_web").show();
            llenar_cuotaWeb(parseInt(str));
        }
        $("#error_cuotaweb").hide();
    }else{
        $("#error_cuotaweb").css("display","inline-block")
        $("#error_cuotaweb").show();
        $("#monto_web").focus();
    }
}

function llenar_cuotaWeb(num){

    sw1 = "0";
    sw2 = "0";
    sw3 = "0";

    if ($('input:radio[name="tipo_web"]:checked').val() == "contado") {
        sw1="1";sw2="0";sw3="0";
    }
    if ($('input:radio[name="tipo_web"]:checked').val() == "igual") {
        sw1="0";sw2="0";sw3="1";
    }

    for(i =num+1;i <= 12 ; i++){
        $("#cuota"+i+"_web").attr({"disabled":true});
        $("#monto"+i+"_web").attr({"disabled":true});
        //$("#cuota"+i+"_web").val("");
        datePick("cuota"+i+"_web","+"+i-1+"m");
        $("#monto"+i+"_web").val("");
    }
    for(j=1; j<=num; j++){
        $("#monto"+j+"_web").attr({"disabled":false});
        $("#cuota"+j+"_web").attr({"disabled":false});
        datePick("cuota"+j+"_web","+"+j-1+"m");
        if(sw1=="1"){
            //$("#monto"+j+"_web").val("1");
        }
        if(sw3=="1"){
            if($("#hab_intercambio_web").is(":checked")){
                $("#monto"+j+"_web").val(($("#por_pagar_web").val()/num).toFixed(2));
            }else{
                $("#monto"+j+"_web").val(($("#monto_web").val()/num).toFixed(2));
            }
        }

    }
}

function guardarWeb(){
    var id_empresaWeb = $("#id_empresaWeb").val();
    var web_alta = $("#web_alta").val();
    var web_venc = $("#web_venc").val();
    var num_botones = $("#num_botones").val();
    var monto_botones = $("#monto_botones").val();
    var hosting_web = $("#hosting_web").val();
    var monto_hosting = $("#monto_hosting").val();
    var dominio_com = $("#dominio_com").val();
    var dominio_com_bo = $("#dominio_com_bo").val();
    var monto_dominio = $("#monto_dominio").val();
    var nombre_dominio = $("#nombre_dominio").val();
    var tipo_web = $('[name=tipo_web]:checked').val();
    var hab_intercambio_web = $("#hab_intercambio_web").val();
    var por_intercambio_web = $("#por_intercambio_web").val();
    var monto_web = $("#monto_web").val();
    var descuento_web = $("#descuento_web").val();
    var cuotas_web = $("#cuotas_web").val();
    var descto_web = $("#descto_web").val();
    var por_pagar_web = $("#por_pagar_web").val();
    var inter_web = $("#inter_web").val();
    var cuota1_web = $("#cuota1_web").val();
    var monto1_web = $("#monto1_web").val();
    var cuota2_web = $("#cuota2_web").val();
    var monto2_web = $("#monto2_web").val();
    var cuota3_web = $("#cuota3_web").val();
    var monto3_web = $("#monto3_web").val();
    var cuota4_web = $("#cuota4_web").val();
    var monto4_web = $("#monto4_web").val();
    var cuota5_web = $("#cuota5_web").val();
    var monto5_web = $("#monto5_web").val();
    var cuota6_web = $("#cuota6_web").val();
    var monto6_web = $("#monto6_web").val();
    var cuota7_web = $("#cuota7_web").val();
    var monto7_web = $("#monto7_web").val();
    var cuota8_web = $("#cuota8_web").val();
    var monto8_web = $("#monto8_web").val();
    var cuota9_web = $("#cuota9_web").val();
    var monto9_web = $("#monto9_web").val();
    var cuota10_web = $("#cuota10_web").val();
    var monto10_web = $("#monto10_web").val();
    var cuota11_web = $("#cuota11_web").val();
    var monto11_web = $("#monto11_web").val();
    var cuota12_web = $("#cuota12_web").val();
    var monto12_web = $("#monto12_web").val();

    var alta_web = $("#alta_web").val();
    var alta_dominio = $("#alta_dominio").val();
    var alta_hosting = $("#alta_hosting").val();

    //var datos = $("#form_web").serializeArray();
    $.ajax({
        url: 'configuracion/nuevo_web.php',
        type: 'GET',
        async: true,
        data: "id_empresaWeb=" + id_empresaWeb + "&web_alta=" + web_alta + "&web_venc=" + web_venc + "&num_botones=" + num_botones +
        "&monto_botones=" + monto_botones + "&hosting_web=" + hosting_web + "&monto_hosting=" + monto_hosting + "&dominio_com=" + dominio_com + "&dominio_com_bo=" + dominio_com_bo + "&monto_dominio=" + monto_dominio + "&nombre_dominio=" + nombre_dominio + "&tipo_web=" + tipo_web + "&tipo_web=" + tipo_web + "&hab_intercambio_web=" + hab_intercambio_web + "&por_intercambio_web=" + por_intercambio_web +
        "&monto_web=" + monto_web + "&descuento_web=" + descuento_web + "&cuotas_web=" + cuotas_web + "&descto_web=" + descto_web + "&por_pagar_web=" + por_pagar_web + "&inter_web=" + inter_web + "&cuota1_web=" + cuota1_web +"&monto1_web=" + monto1_web + "&cuota2_web=" + cuota2_web + "&monto2_web=" + monto2_web +
        "&cuota3_web=" + cuota3_web + "&monto3_web=" + monto3_web + "&cuota4_web=" + cuota4_web + "&monto4_web=" + monto4_web + "&cuota5_web=" + cuota5_web + "&monto5_web=" + monto5_web + "&cuota6_web=" + cuota6_web + "&monto6_web=" + monto6_web + "&cuota7_web=" + cuota7_web + "&monto7_web=" + monto7_web + "&cuota8_web=" + cuota8_web + "&monto8_web=" + monto8_web +
        "&cuota9_web=" + cuota9_web + "&monto9_web=" + monto9_web + "&cuota10_web=" + cuota10_web + "&monto10_web=" + monto10_web + "&cuota11_web=" + cuota11_web + "&monto11_web=" + monto11_web + "&cuota12_web=" + cuota12_web +
        "&monto12_web=" + monto12_web + "&alta_web=" + alta_web + "&alta_dominio=" + alta_dominio + "&alta_hosting=" + alta_hosting,
        success: function(data){
            alert("Web guardado");
        },
        error: muestraError
    });
}