<?php
include_once "config.inc.php";
$id_empresaWeb = $_GET['id_empresaWeb'];
$web_alta = date("Y-m-d",strtotime($_GET['web_alta']));
$web_venc = date("Y-m-d",strtotime($_GET['web_venc']));
$num_botones = $_GET['num_botones'];
$monto_botones = $_GET['monto_botones'];
$hosting_web = $_GET['hosting_web'];
$monto_hosting = $_GET['monto_hosting'];
$dominio_com = $_GET['dominio_com'];
$dominio_com_bo = $_GET['dominio_com_bo'];
$monto_dominio = $_GET['monto_dominio'];
$nombre_dominio = $_GET['nombre_dominio'];
$tipo_web = $_GET['tipo_web'];
$tipo_web = $_GET['tipo_web'];
$hab_intercambio_web = $_GET['hab_intercambio_web'];
$por_intercambio_web = $_GET['por_intercambio_web'];
$monto_web = $_GET['monto_web'];
$descuento_web = $_GET['descuento_web'];
$cuotas_web = $_GET['cuotas_web'];
$descto_web = $_GET['descto_web'];
$por_pagar_web = $_GET['por_pagar_web'];
$inter_web = $_GET['inter_web'];
$cuota1_web = date("Y-m-d",strtotime($_GET['cuota1_web']));
$monto1_web = $_GET['monto1_web'];
$cuota2_web = date("Y-m-d",strtotime($_GET['cuota2_web']));
$monto2_web = $_GET['monto2_web'];
$cuota3_web = date("Y-m-d",strtotime($_GET['cuota3_web']));
$monto3_web = $_GET['monto3_web'];
$cuota4_web = date("Y-m-d",strtotime($_GET['cuota4_web']));
$monto4_web = $_GET['monto4_web'];
$cuota5_web = date("Y-m-d",strtotime($_GET['cuota5_web']));
$monto5_web = $_GET['monto5_web'];
$cuota6_web = date("Y-m-d",strtotime($_GET['cuota6_web']));
$monto6_web = $_GET['monto6_web'];
$cuota7_web = date("Y-m-d",strtotime($_GET['cuota7_web']));
$monto7_web = $_GET['monto7_web'];
$cuota8_web = date("Y-m-d",strtotime($_GET['cuota8_web']));
$monto8_web = $_GET['monto8_web'];
$cuota9_web = date("Y-m-d",strtotime($_GET['cuota9_web']));
$monto9_web = $_GET['monto9_web'];
$cuota10_web = date("Y-m-d",strtotime($_GET['cuota10_web']));
$monto10_web = $_GET['monto10_web'];
$cuota11_web = date("Y-m-d",strtotime($_GET['cuota11_web']));
$monto11_web = $_GET['monto11_web'];
$cuota12_web = date("Y-m-d",strtotime($_GET['cuota12_web']));
$monto12_web = $_GET['monto12_web'];

$alta_web = date("Y-m-d",strtotime($_GET['alta_web']));
$alta_dominio = date("Y-m-d",strtotime($_GET['alta_dominio']));
$alta_hosting = date("Y-m-d",strtotime($_GET['alta_hosting']));

$query="";
if($tipo_web == "contado"){
    if($descuento_web=="0"){
        $query = "INSERT INTO web VALUES (NULL , '$id_empresaWeb', '$web_alta', '$web_venc', '$num_botones', '$monto_hosting', '$monto_dominio', '$nombre_dominio', '$monto_botones', '$monto_web', 'PAGINA_WEB', '$alta_dominio', '$alta_hosting', '$alta_web', '1', '$cuota1_web@$monto_web', '$cuota2_web@$monto2_web', '$cuota3_web@$monto3_web', '$cuota4_web@$monto4_web', '$cuota5_web@$monto5_web', '$cuota6_web@$monto6_web', '$cuota7_web@$monto7_web', '$cuota8_web@$monto8_web', '$cuota9_web@$monto9_web', '$cuota10_web@$monto10_web', '$cuota11_web@$monto11_web', '$cuota12_web@$monto12_web', '$inter_web' )";
    }
    if($descuento_web!="0"){
        $query = "INSERT INTO web VALUES (NULL , '$id_empresaWeb', '$web_alta', '$web_venc', '$num_botones', '$monto_hosting', '$monto_dominio', '$nombre_dominio', '$monto_botones', '$descto_web', 'PAGINA_WEB', '$alta_dominio', '$alta_hosting', '$alta_web', '1', '$cuota1_web@$descto_web', '$cuota2_web@$monto2_web', '$cuota3_web@$monto3_web', '$cuota4_web@$monto4_web', '$cuota5_web@$monto5_web', '$cuota6_web@$monto6_web', '$cuota7_web@$monto7_web', '$cuota8_web@$monto8_web', '$cuota9_web@$monto9_web', '$cuota10_web@$monto10_web', '$cuota11_web@$monto11_web', '$cuota12_web@$monto12_web' , '$inter_web')";
    }
    if($hab_intercambio_web == "on" && $por_intercambio_web != "0"){
        $query = "INSERT INTO web VALUES (NULL , '$id_empresaWeb', '$web_alta', '$web_venc', '$num_botones', '$monto_hosting', '$monto_dominio', '$nombre_dominio', '$monto_botones', '$por_pagar_web', 'PAGINA_WEB', '$alta_dominio', '$alta_hosting', '$alta_web', '1', '$cuota1_web@$por_pagar_web', '$cuota2_web@$monto2_web', '$cuota3_web@$monto3_web', '$cuota4_web@$monto4_web', '$cuota5_web@$monto5_web', '$cuota6_web@$monto6_web', '$cuota7_web@$monto7_web', '$cuota8_web@$monto8_web', '$cuota9_web@$monto9_web', '$cuota10_web@$monto10_web', '$cuota11_web@$monto11_web', '$cuota12_web@$monto12_web' , '$inter_web')";
    }
}

if($tipo_web == "igual"){
    if($hab_intercambio_web == "on" && $por_intercambio_web != "0"){
        $query = "INSERT INTO web VALUES (NULL , '$id_empresaWeb', '$web_alta', '$web_venc', '$num_botones', '$monto_hosting', '$monto_dominio', '$nombre_dominio', '$monto_botones', '$por_pagar_web', 'PAGINA_WEB', '$alta_dominio', '$alta_hosting', '$alta_web', '$cuotas_web', '$cuota1_web@$monto1_web', '$cuota2_web@$monto2_web', '$cuota3_web@$monto3_web', '$cuota4_web@$monto4_web', '$cuota5_web@$monto5_web', '$cuota6_web@$monto6_web', '$cuota7_web@$monto7_web', '$cuota8_web@$monto8_web', '$cuota9_web@$monto9_web', '$cuota10_web@$monto10_web', '$cuota11_web@$monto11_web', '$cuota12_web@$monto12_web', '$inter_web')";
    }else{
        $query = "INSERT INTO web VALUES (NULL , '$id_empresaWeb', '$web_alta', '$web_venc', '$num_botones', '$monto_hosting', '$monto_dominio', '$nombre_dominio', '$monto_botones', '$monto_web', 'PAGINA_WEB', '$alta_dominio', '$alta_hosting', '$alta_web', '$cuotas_web', '$cuota1_web@$monto1_web', '$cuota2_web@$monto2_web', '$cuota3_web@$monto3_web', '$cuota4_web@$monto4_web', '$cuota5_web@$monto5_web', '$cuota6_web@$monto6_web', '$cuota7_web@$monto7_web', '$cuota8_web@$monto8_web', '$cuota9_web@$monto9_web', '$cuota10_web@$monto10_web', '$cuota11_web@$monto11_web', '$cuota12_web@$monto12_web' , '$inter_web')";
    }
}
//$query = "INSERT INTO web VALUES (NULL , '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '' )";
if(!mysql_query($query)){
    echo mysql_error();
}