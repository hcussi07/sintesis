<?php
include_once "config.inc.php";

$id_empresaPublicidad = $_GET['id_empresaPublicidad'];
$publicidad_alta = date("Y-m-d",strtotime($_GET['publicidad_alta']));
$publicidad_venc = date("Y-m-d",strtotime($_GET['publicidad_venc']));
$num_publicidad = $_GET['num_publicidad'];
$pag_seleccion = $_GET['pag_seleccion'];
$tam_banner = $_GET['tam_banner'];
$fec_alta_publicidad = date("Y-m-d",strtotime($_GET['fec_alta_publicidad']));
$fec_venc_publicidad = date("Y-m-d",strtotime($_GET['fec_venc_publicidad']));
$tipo_publicidad = $_GET['tipo_publicidad'];
$tipo_publicidad = $_GET['tipo_publicidad'];
$hab_intercambio_publicidad = $_GET['hab_intercambio_publicidad'];
$por_intercambio_publicidad = $_GET['por_intercambio_publicidad'];
$monto_publicidad = $_GET['monto_publicidad'];
$descuento_publicidad = $_GET['descuento_publicidad'];
$cuotas_publicidad = $_GET['cuotas_publicidad'];
$descto_publicidad = $_GET['descto_publicidad'];
$por_pagar_publicidad = $_GET['por_pagar_publicidad'];
$inter_publicidad = $_GET['inter_publicidad'];
$cuota1_publicidad = date("Y-m-d",strtotime($_GET['cuota1_publicidad']));
$monto1_publicidad = $_GET['monto1_publicidad'];
$cuota2_publicidad = date("Y-m-d",strtotime($_GET['cuota2_publicidad']));
$monto2_publicidad = $_GET['monto2_publicidad'];
$cuota3_publicidad = date("Y-m-d",strtotime($_GET['cuota3_publicidad']));
$monto3_publicidad = $_GET['monto3_publicidad'];
$cuota4_publicidad = date("Y-m-d",strtotime($_GET['cuota4_publicidad']));
$monto4_publicidad = $_GET['monto4_publicidad'];
$cuota5_publicidad = date("Y-m-d",strtotime($_GET['cuota5_publicidad']));
$monto5_publicidad = $_GET['monto5_publicidad'];
$cuota6_publicidad = date("Y-m-d",strtotime($_GET['cuota6_publicidad']));
$monto6_publicidad = $_GET['monto6_publicidad'];
$cuota7_publicidad = date("Y-m-d",strtotime($_GET['cuota7_publicidad']));
$monto7_publicidad = $_GET['monto7_publicidad'];
$cuota8_publicidad = date("Y-m-d",strtotime($_GET['cuota8_publicidad']));
$monto8_publicidad = $_GET['monto8_publicidad'];
$cuota9_publicidad = date("Y-m-d",strtotime($_GET['cuota9_publicidad']));
$monto9_publicidad = $_GET['monto9_publicidad'];
$cuota10_publicidad = date("Y-m-d",strtotime($_GET['cuota10_publicidad']));
$monto10_publicidad = $_GET['monto10_publicidad'];
$cuota11_publicidad = date("Y-m-d",strtotime($_GET['cuota11_publicidad']));
$monto11_publicidad = $_GET['monto11_publicidad'];
$cuota12_publicidad = date("Y-m-d",strtotime($_GET['cuota12_publicidad']));
$monto12_publicidad = $_GET['monto12_publicidad'];

$query="";
if($tipo_publicidad == "contado"){
    if($descuento_publicidad=="0"){
        $query = "INSERT INTO publicidad VALUES (NULL , '$id_empresaPublicidad', '$publicidad_alta', '$publicidad_venc', '$num_publicidad', '$pag_seleccion', '$tam_banner', '$fec_alta_publicidad', '$fec_venc_publicidad', 'PUBLICIDAD', '$monto_publicidad', '1', '$cuota1_publicidad@$monto_publicidad', '$cuota2_publicidad@$monto2_publicidad', '$cuota3_publicidad@$monto3_publicidad', '$cuota4_publicidad@$monto4_publicidad', '$cuota5_publicidad@$monto5_publicidad', '$cuota6_publicidad@$monto6_publicidad', '$cuota7_publicidad@$monto7_publicidad', '$cuota8_publicidad@$monto8_publicidad', '$cuota9_publicidad@$monto9_publicidad', '$cuota10_publicidad@$monto10_publicidad', '$cuota11_publicidad@$monto11_publicidad', '$cuota12_publicidad@$monto12_publicidad','$inter_publicidad')";
//        $query = "INSERT INTO publicidad VALUES (NULL , '$id_empresaPublicidad', '$publicidad_alta', '$publicidad_venc', '$num_publicidads','$pag_seleccion', '$fec_alta_publicidad', '$fec_venc_publicidad', 'SPONSORS', '$monto_publicidad', '1', '$cuota1_publicidad@$monto_publicidad', '$cuota2_publicidad@$monto2_publicidad', '$cuota3_publicidad@$monto3_publicidad', '$cuota4_publicidad@$monto4_publicidad', '$cuota5_publicidad@$monto5_publicidad', '$cuota6_publicidad@$monto6_publicidad', '$cuota7_publicidad@$monto7_publicidad', '$cuota8_publicidad@$monto8_publicidad', '$cuota9_publicidad@$monto9_publicidad', '$cuota10_publicidad@$monto10_publicidad', '$cuota11_publicidad@$monto11_publicidad', '$cuota12_publicidad@$monto12_publicidad','$inter_publicidad')";
    }
    if($descuento_publicidad!="0"){
        $query = "INSERT INTO publicidad VALUES (NULL , '$id_empresaPublicidad', '$publicidad_alta', '$publicidad_venc', '$num_publicidad', '$pag_seleccion', '$tam_banner', '$fec_alta_publicidad', '$fec_venc_publicidad', 'PUBLICIDAD', '$descto_publicidad', '1', '$cuota1_publicidad@$descto_publicidad', '$cuota2_publicidad@$monto2_publicidad', '$cuota3_publicidad@$monto3_publicidad', '$cuota4_publicidad@$monto4_publicidad', '$cuota5_publicidad@$monto5_publicidad', '$cuota6_publicidad@$monto6_publicidad', '$cuota7_publicidad@$monto7_publicidad', '$cuota8_publicidad@$monto8_publicidad', '$cuota9_publicidad@$monto9_publicidad', '$cuota10_publicidad@$monto10_publicidad', '$cuota11_publicidad@$monto11_publicidad', '$cuota12_publicidad@$monto12_publicidad','$inter_publicidad')";
//        $query = "INSERT INTO publicidad VALUES (NULL , '$id_empresaPublicidad', '$publicidad_alta', '$publicidad_venc', '$num_publicidads','$pag_seleccion', '$fec_alta_publicidad', '$fec_venc_publicidad', 'SPONSORS', '$descto_publicidad', '1', '$cuota1_publicidad@$descto_publicidad', '$cuota2_publicidad@$monto2_publicidad', '$cuota3_publicidad@$monto3_publicidad', '$cuota4_publicidad@$monto4_publicidad', '$cuota5_publicidad@$monto5_publicidad', '$cuota6_publicidad@$monto6_publicidad', '$cuota7_publicidad@$monto7_publicidad', '$cuota8_publicidad@$monto8_publicidad', '$cuota9_publicidad@$monto9_publicidad', '$cuota10_publicidad@$monto10_publicidad', '$cuota11_publicidad@$monto11_publicidad', '$cuota12_publicidad@$monto12_publicidad','$inter_publicidad')";
    }
    if($hab_intercambio_publicidad == "on" && $por_intercambio_publicidad != "0"){
        $query = "INSERT INTO publicidad VALUES (NULL , '$id_empresaPublicidad', '$publicidad_alta', '$publicidad_venc', '$num_publicidad', '$pag_seleccion', '$tam_banner', '$fec_alta_publicidad', '$fec_venc_publicidad', 'PUBLICIDAD', '$por_pagar_publicidad', '1', '$cuota1_publicidad@$por_pagar_publicidad', '$cuota2_publicidad@$monto2_publicidad', '$cuota3_publicidad@$monto3_publicidad', '$cuota4_publicidad@$monto4_publicidad', '$cuota5_publicidad@$monto5_publicidad', '$cuota6_publicidad@$monto6_publicidad', '$cuota7_publicidad@$monto7_publicidad', '$cuota8_publicidad@$monto8_publicidad', '$cuota9_publicidad@$monto9_publicidad', '$cuota10_publicidad@$monto10_publicidad', '$cuota11_publicidad@$monto11_publicidad', '$cuota12_publicidad@$monto12_publicidad','$inter_publicidad')";
//        $query = "INSERT INTO publicidad VALUES (NULL , '$id_empresaPublicidad', '$publicidad_alta', '$publicidad_venc', '$num_publicidads','$pag_seleccion', '$fec_alta_publicidad', '$fec_venc_publicidad', 'SPONSORS', '$por_pagar_publicidad', '1', '$cuota1_publicidad@$por_pagar_publicidad', '$cuota2_publicidad@$monto2_publicidad', '$cuota3_publicidad@$monto3_publicidad', '$cuota4_publicidad@$monto4_publicidad', '$cuota5_publicidad@$monto5_publicidad', '$cuota6_publicidad@$monto6_publicidad', '$cuota7_publicidad@$monto7_publicidad', '$cuota8_publicidad@$monto8_publicidad', '$cuota9_publicidad@$monto9_publicidad', '$cuota10_publicidad@$monto10_publicidad', '$cuota11_publicidad@$monto11_publicidad', '$cuota12_publicidad@$monto12_publicidad','$inter_publicidad')";
    }
}

if($tipo_publicidad == "igual"){
    if($hab_intercambio_publicidad == "on" && $por_intercambio_publicidad != "0"){
        $query = "INSERT INTO publicidad VALUES (NULL , '$id_empresaPublicidad', '$publicidad_alta', '$publicidad_venc', '$num_publicidad', '$pag_seleccion', '$tam_banner', '$fec_alta_publicidad', '$fec_venc_publicidad', 'PUBLICIDAD', '$por_pagar_publicidad', '$cuotas_publicidad', '$cuota1_publicidad@$monto1_publicidad', '$cuota2_publicidad@$monto2_publicidad', '$cuota3_publicidad@$monto3_publicidad', '$cuota4_publicidad@$monto4_publicidad', '$cuota5_publicidad@$monto5_publicidad', '$cuota6_publicidad@$monto6_publicidad', '$cuota7_publicidad@$monto7_publicidad', '$cuota8_publicidad@$monto8_publicidad', '$cuota9_publicidad@$monto9_publicidad', '$cuota10_publicidad@$monto10_publicidad', '$cuota11_publicidad@$monto11_publicidad', '$cuota12_publicidad@$monto12_publicidad','$inter_publicidad')";
//        $query = "INSERT INTO publicidad VALUES (NULL , '$id_empresaPublicidad', '$publicidad_alta', '$publicidad_venc', '$num_publicidads','$pag_seleccion', '$fec_alta_publicidad', '$fec_venc_publicidad', 'SPONSORS', '$por_pagar_publicidad', '$cuotas_publicidad', '$cuota1_publicidad@$monto1_publicidad', '$cuota2_publicidad@$monto2_publicidad', '$cuota3_publicidad@$monto3_publicidad', '$cuota4_publicidad@$monto4_publicidad', '$cuota5_publicidad@$monto5_publicidad', '$cuota6_publicidad@$monto6_publicidad', '$cuota7_publicidad@$monto7_publicidad', '$cuota8_publicidad@$monto8_publicidad', '$cuota9_publicidad@$monto9_publicidad', '$cuota10_publicidad@$monto10_publicidad', '$cuota11_publicidad@$monto11_publicidad', '$cuota12_publicidad@$monto12_publicidad','$inter_publicidad')";
    }else{
        $query = "INSERT INTO publicidad VALUES (NULL , '$id_empresaPublicidad', '$publicidad_alta', '$publicidad_venc', '$num_publicidad', '$pag_seleccion', '$tam_banner', '$fec_alta_publicidad', '$fec_venc_publicidad', 'PUBLICIDAD', '$monto_publicidad', '$cuotas_publicidad', '$cuota1_publicidad@$monto1_publicidad', '$cuota2_publicidad@$monto2_publicidad', '$cuota3_publicidad@$monto3_publicidad', '$cuota4_publicidad@$monto4_publicidad', '$cuota5_publicidad@$monto5_publicidad', '$cuota6_publicidad@$monto6_publicidad', '$cuota7_publicidad@$monto7_publicidad', '$cuota8_publicidad@$monto8_publicidad', '$cuota9_publicidad@$monto9_publicidad', '$cuota10_publicidad@$monto10_publicidad', '$cuota11_publicidad@$monto11_publicidad', '$cuota12_publicidad@$monto12_publicidad','$inter_publicidad')";
//        $query = "INSERT INTO publicidad VALUES (NULL , '$id_empresaPublicidad', '$publicidad_alta', '$publicidad_venc', '$num_publicidads','$pag_seleccion', '$fec_alta_publicidad', '$fec_venc_publicidad', 'SPONSORS', '$monto_publicidad', '$cuotas_publicidad', '$cuota1_publicidad@$monto1_publicidad', '$cuota2_publicidad@$monto2_publicidad', '$cuota3_publicidad@$monto3_publicidad', '$cuota4_publicidad@$monto4_publicidad', '$cuota5_publicidad@$monto5_publicidad', '$cuota6_publicidad@$monto6_publicidad', '$cuota7_publicidad@$monto7_publicidad', '$cuota8_publicidad@$monto8_publicidad', '$cuota9_publicidad@$monto9_publicidad', '$cuota10_publicidad@$monto10_publicidad', '$cuota11_publicidad@$monto11_publicidad', '$cuota12_publicidad@$monto12_publicidad','$inter_publicidad')";
    }
}
//$query = "INSERT INTO publicidad VALUES (NULL , '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '')";
if(!mysql_query($query)){
    echo mysql_error();
}