<?php
include_once "config.inc.php";
$id_empresa = $_GET['id_empresa'];
$betm_alta = date("Y-m-d",strtotime($_GET['betm_alta']));
$betm_venc = date("Y-m-d",strtotime($_GET['betm_venc']));
$tipo_plan = explode("|",$_GET['tipo_plan']);
$cuotas_betm = $_GET['cuotas_betm'];

$tipo_betm = $_GET['tipo_betm'];

$monto_betm = $_GET['monto_betm'];

$hab_intercambio = $_GET['hab_intercambio'];
$por_intercambio = $_GET['por_intercambio'];

$descuento_betm = $_GET['descuento_betm'];

$descto_betm = $_GET['descto_betm'];
$por_pagar_betm = $_GET['por_pagar_betm'];
$inter_betm = $_GET['inter_betm'];

$cuota1_betm = date("Y-m-d",strtotime($_GET['cuota1_betm']));
$monto1_betm = $_GET['monto1_betm'];
$cuota2_betm = date("Y-m-d",strtotime($_GET['cuota2_betm']));
$monto2_betm = $_GET['monto2_betm'];
$cuota3_betm = date("Y-m-d",strtotime($_GET['cuota3_betm']));
$monto3_betm = $_GET['monto3_betm'];
$cuota4_betm = date("Y-m-d",strtotime($_GET['cuota4_betm']));
$monto4_betm = $_GET['monto4_betm'];
$cuota5_betm = date("Y-m-d",strtotime($_GET['cuota5_betm']));
$monto5_betm = $_GET['monto5_betm'];
$cuota6_betm = date("Y-m-d",strtotime($_GET['cuota6_betm']));
$monto6_betm = $_GET['monto6_betm'];
$cuota7_betm = date("Y-m-d",strtotime($_GET['cuota7_betm']));
$monto7_betm = $_GET['monto7_betm'];
$cuota8_betm = date("Y-m-d",strtotime($_GET['cuota8_betm']));
$monto8_betm = $_GET['monto8_betm'];
$cuota9_betm = date("Y-m-d",strtotime($_GET['cuota9_betm']));
$monto9_betm = $_GET['monto9_betm'];
$cuota10_betm = date("Y-m-d",strtotime($_GET['cuota10_betm']));
$monto10_betm = $_GET['monto10_betm'];
$cuota11_betm = date("Y-m-d",strtotime($_GET['cuota11_betm']));
$monto11_betm = $_GET['monto11_betm'];
$cuota12_betm = date("Y-m-d",strtotime($_GET['cuota12_betm']));
$monto12_betm = $_GET['monto12_betm'];

$query="";
if($tipo_betm == "contado"){
    if($descuento_betm=="0"){
        $query = "INSERT INTO susbolivia VALUES ( NULL , '$id_empresa', '$betm_alta', '$betm_venc', '$tipo_plan[6]', 'BETM', '$monto_betm', '1', '$cuota1_betm@$tipo_plan[1]', '$cuota2_betm@$monto2_betm', '$cuota3_betm@$monto3_betm', '$cuota4_betm@$monto4_betm', '$cuota5_betm@$monto5_betm', '$cuota6_betm@$monto6_betm', '$cuota7_betm@$monto7_betm', '$cuota8_betm@$monto8_betm', '$cuota9_betm@$monto9_betm', '$cuota10_betm@$monto10_betm', '$cuota11_betm@$monto11_betm', '$cuota12_betm@$monto12_betm', 'no')";
    }
    if($descuento_betm!="0"){
        $query = "INSERT INTO susbolivia VALUES ( NULL , '$id_empresa', '$betm_alta', '$betm_venc', '$tipo_plan[6]', 'BETM', '$descto_betm', '1', '$cuota1_betm@$descto_betm', '$cuota2_betm@$monto2_betm', '$cuota3_betm@$monto3_betm', '$cuota4_betm@$monto4_betm', '$cuota5_betm@$monto5_betm', '$cuota6_betm@$monto6_betm', '$cuota7_betm@$monto7_betm', '$cuota8_betm@$monto8_betm', '$cuota9_betm@$monto9_betm', '$cuota10_betm@$monto10_betm', '$cuota11_betm@$monto11_betm', '$cuota12_betm@$monto12_betm', 'no')";
    }
    if($hab_intercambio=="on" && $por_intercambio!="0"){
        $query = "INSERT INTO susbolivia VALUES ( NULL , '$id_empresa', '$betm_alta', '$betm_venc', '$tipo_plan[6]', 'BETM', '$por_pagar_betm', '1', '$cuota1_betm@$por_pagar_betm', '$cuota2_betm@$monto2_betm', '$cuota3_betm@$monto3_betm', '$cuota4_betm@$monto4_betm', '$cuota5_betm@$monto5_betm', '$cuota6_betm@$monto6_betm', '$cuota7_betm@$monto7_betm', '$cuota8_betm@$monto8_betm', '$cuota9_betm@$monto9_betm', '$cuota10_betm@$monto10_betm', '$cuota11_betm@$monto11_betm', '$cuota12_betm@$monto12_betm', 'Si')";
    }
}
if($tipo_betm == "normal"){
    $query = "INSERT INTO susbolivia VALUES ( NULL , '$id_empresa', '$betm_alta', '$betm_venc', '$tipo_plan[6]', 'BETM', '$monto_betm', '$cuotas_betm', '$cuota1_betm@$monto1_betm', '$cuota2_betm@$monto2_betm', '$cuota3_betm@$monto3_betm', '$cuota4_betm@$monto4_betm', '$cuota5_betm@$monto5_betm', '$cuota6_betm@$monto6_betm', '$cuota7_betm@$monto7_betm', '$cuota8_betm@$monto8_betm', '$cuota9_betm@$monto9_betm', '$cuota10_betm@$monto10_betm', '$cuota11_betm@$monto11_betm', '$cuota12_betm@$monto12_betm', 'no')";
}
if($tipo_betm == "igual"){
    if($hab_intercambio=="on" && $por_intercambio!="0"){
        $query = "INSERT INTO susbolivia VALUES ( NULL , '$id_empresa', '$betm_alta', '$betm_venc', '$tipo_plan[6]', 'BETM', '$por_pagar_betm', '$cuotas_betm', '$cuota1_betm@$monto1_betm', '$cuota2_betm@$monto2_betm', '$cuota3_betm@$monto3_betm', '$cuota4_betm@$monto4_betm', '$cuota5_betm@$monto5_betm', '$cuota6_betm@$monto6_betm', '$cuota7_betm@$monto7_betm', '$cuota8_betm@$monto8_betm', '$cuota9_betm@$monto9_betm', '$cuota10_betm@$monto10_betm', '$cuota11_betm@$monto11_betm', '$cuota12_betm@$monto12_betm', 'Si')";
    }else{
        $query = "INSERT INTO susbolivia VALUES ( NULL , '$id_empresa', '$betm_alta', '$betm_venc', '$tipo_plan[6]', 'BETM', '$monto_betm', '$cuotas_betm', '$cuota1_betm@$monto1_betm', '$cuota2_betm@$monto2_betm', '$cuota3_betm@$monto3_betm', '$cuota4_betm@$monto4_betm', '$cuota5_betm@$monto5_betm', '$cuota6_betm@$monto6_betm', '$cuota7_betm@$monto7_betm', '$cuota8_betm@$monto8_betm', '$cuota9_betm@$monto9_betm', '$cuota10_betm@$monto10_betm', '$cuota11_betm@$monto11_betm', '$cuota12_betm@$monto12_betm', 'no')";
    }
}
//$query = "INSERT INTO susbolivia VALUES ( NULL , '$id_empresa', '$betm_alta', '$betm_venc', '$tipo_plan[6]', 'BETM', '$monto_betm', '$cuotas_betm', '$cuota1_betm@$monto1_betm', '$cuota2_betm@$monto2_betm', '$cuota3_betm@$monto3_betm', '$cuota4_betm@$monto4_betm', '$cuota5_betm@$monto5_betm', '$cuota6_betm@$monto6_betm', '$cuota7_betm@$monto7_betm', '$cuota8_betm@$monto8_betm', '$cuota9_betm@$monto9_betm', '$cuota10_betm@$monto10_betm', '$cuota11_betm@$monto11_betm', '$cuota12_betm@$monto12_betm', '')";
if(!mysql_query($query)){
    echo mysql_error();
}