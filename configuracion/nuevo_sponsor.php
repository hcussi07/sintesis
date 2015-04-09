<?php
include_once "config.inc.php";

$id_empresaSponsor = $_GET['id_empresaSponsor'];
$sponsor_alta = date("Y-m-d",strtotime($_GET['sponsor_alta']));
$sponsor_venc = date("Y-m-d",strtotime($_GET['sponsor_venc']));
$num_sponsors = $_GET['num_sponsors'];
$pag_seleccion = $_GET['pag_seleccion'];
$fec_alta_sponsor = date("Y-m-d",strtotime($_GET['fec_alta_sponsor']));
$fec_venc_sponsor = date("Y-m-d",strtotime($_GET['fec_venc_sponsor']));
$tipo_sponsor = $_GET['tipo_sponsor'];
$tipo_sponsor = $_GET['tipo_sponsor'];
$hab_intercambio_sponsor = $_GET['hab_intercambio_sponsor'];
$por_intercambio_sponsor = $_GET['por_intercambio_sponsor'];
$monto_sponsor = $_GET['monto_sponsor'];
$descuento_sponsor = $_GET['descuento_sponsor'];
$cuotas_sponsor = $_GET['cuotas_sponsor'];
$descto_sponsor = $_GET['descto_sponsor'];
$por_pagar_sponsor = $_GET['por_pagar_sponsor'];
$inter_sponsor = $_GET['inter_sponsor'];
$cuota1_sponsor = date("Y-m-d",strtotime($_GET['cuota1_sponsor']));
$monto1_sponsor = $_GET['monto1_sponsor'];
$cuota2_sponsor = date("Y-m-d",strtotime($_GET['cuota2_sponsor']));
$monto2_sponsor = $_GET['monto2_sponsor'];
$cuota3_sponsor = date("Y-m-d",strtotime($_GET['cuota3_sponsor']));
$monto3_sponsor = $_GET['monto3_sponsor'];
$cuota4_sponsor = date("Y-m-d",strtotime($_GET['cuota4_sponsor']));
$monto4_sponsor = $_GET['monto4_sponsor'];
$cuota5_sponsor = date("Y-m-d",strtotime($_GET['cuota5_sponsor']));
$monto5_sponsor = $_GET['monto5_sponsor'];
$cuota6_sponsor = date("Y-m-d",strtotime($_GET['cuota6_sponsor']));
$monto6_sponsor = $_GET['monto6_sponsor'];
$cuota7_sponsor = date("Y-m-d",strtotime($_GET['cuota7_sponsor']));
$monto7_sponsor = $_GET['monto7_sponsor'];
$cuota8_sponsor = date("Y-m-d",strtotime($_GET['cuota8_sponsor']));
$monto8_sponsor = $_GET['monto8_sponsor'];
$cuota9_sponsor = date("Y-m-d",strtotime($_GET['cuota9_sponsor']));
$monto9_sponsor = $_GET['monto9_sponsor'];
$cuota10_sponsor = date("Y-m-d",strtotime($_GET['cuota10_sponsor']));
$monto10_sponsor = $_GET['monto10_sponsor'];
$cuota11_sponsor = date("Y-m-d",strtotime($_GET['cuota11_sponsor']));
$monto11_sponsor = $_GET['monto11_sponsor'];
$cuota12_sponsor = date("Y-m-d",strtotime($_GET['cuota12_sponsor']));
$monto12_sponsor = $_GET['monto12_sponsor'];


$query="";
if($tipo_sponsor == "contado"){
    if($descuento_sponsor=="0"){
        $query = "INSERT INTO sponsor VALUES (NULL , '$id_empresaSponsor', '$sponsor_alta', '$sponsor_venc', '$num_sponsors','$pag_seleccion', '$fec_alta_sponsor', '$fec_venc_sponsor', 'SPONSORS', '$monto_sponsor', '1', '$cuota1_sponsor@$monto_sponsor', '$cuota2_sponsor@$monto2_sponsor', '$cuota3_sponsor@$monto3_sponsor', '$cuota4_sponsor@$monto4_sponsor', '$cuota5_sponsor@$monto5_sponsor', '$cuota6_sponsor@$monto6_sponsor', '$cuota7_sponsor@$monto7_sponsor', '$cuota8_sponsor@$monto8_sponsor', '$cuota9_sponsor@$monto9_sponsor', '$cuota10_sponsor@$monto10_sponsor', '$cuota11_sponsor@$monto11_sponsor', '$cuota12_sponsor@$monto12_sponsor','no','$inter_sponsor')";
    }
    if($descuento_sponsor!="0"){
        $query = "INSERT INTO sponsor VALUES (NULL , '$id_empresaSponsor', '$sponsor_alta', '$sponsor_venc', '$num_sponsors','$pag_seleccion', '$fec_alta_sponsor', '$fec_venc_sponsor', 'SPONSORS', '$descto_sponsor', '1', '$cuota1_sponsor@$descto_sponsor', '$cuota2_sponsor@$monto2_sponsor', '$cuota3_sponsor@$monto3_sponsor', '$cuota4_sponsor@$monto4_sponsor', '$cuota5_sponsor@$monto5_sponsor', '$cuota6_sponsor@$monto6_sponsor', '$cuota7_sponsor@$monto7_sponsor', '$cuota8_sponsor@$monto8_sponsor', '$cuota9_sponsor@$monto9_sponsor', '$cuota10_sponsor@$monto10_sponsor', '$cuota11_sponsor@$monto11_sponsor', '$cuota12_sponsor@$monto12_sponsor','no','$inter_sponsor')";
    }
    if($hab_intercambio_sponsor == "on" && $por_intercambio_sponsor != "0"){
        $query = "INSERT INTO sponsor VALUES (NULL , '$id_empresaSponsor', '$sponsor_alta', '$sponsor_venc', '$num_sponsors','$pag_seleccion', '$fec_alta_sponsor', '$fec_venc_sponsor', 'SPONSORS', '$por_pagar_sponsor', '1', '$cuota1_sponsor@$por_pagar_sponsor', '$cuota2_sponsor@$monto2_sponsor', '$cuota3_sponsor@$monto3_sponsor', '$cuota4_sponsor@$monto4_sponsor', '$cuota5_sponsor@$monto5_sponsor', '$cuota6_sponsor@$monto6_sponsor', '$cuota7_sponsor@$monto7_sponsor', '$cuota8_sponsor@$monto8_sponsor', '$cuota9_sponsor@$monto9_sponsor', '$cuota10_sponsor@$monto10_sponsor', '$cuota11_sponsor@$monto11_sponsor', '$cuota12_sponsor@$monto12_sponsor','si','$inter_sponsor')";
    }
}

if($tipo_sponsor == "igual"){
    if($hab_intercambio_sponsor == "on" && $por_intercambio_sponsor != "0"){
        $query = "INSERT INTO sponsor VALUES (NULL , '$id_empresaSponsor', '$sponsor_alta', '$sponsor_venc', '$num_sponsors','$pag_seleccion', '$fec_alta_sponsor', '$fec_venc_sponsor', 'SPONSORS', '$por_pagar_sponsor', '$cuotas_sponsor', '$cuota1_sponsor@$monto1_sponsor', '$cuota2_sponsor@$monto2_sponsor', '$cuota3_sponsor@$monto3_sponsor', '$cuota4_sponsor@$monto4_sponsor', '$cuota5_sponsor@$monto5_sponsor', '$cuota6_sponsor@$monto6_sponsor', '$cuota7_sponsor@$monto7_sponsor', '$cuota8_sponsor@$monto8_sponsor', '$cuota9_sponsor@$monto9_sponsor', '$cuota10_sponsor@$monto10_sponsor', '$cuota11_sponsor@$monto11_sponsor', '$cuota12_sponsor@$monto12_sponsor','si','$inter_sponsor')";
    }else{
        $query = "INSERT INTO sponsor VALUES (NULL , '$id_empresaSponsor', '$sponsor_alta', '$sponsor_venc', '$num_sponsors','$pag_seleccion', '$fec_alta_sponsor', '$fec_venc_sponsor', 'SPONSORS', '$monto_sponsor', '$cuotas_sponsor', '$cuota1_sponsor@$monto1_sponsor', '$cuota2_sponsor@$monto2_sponsor', '$cuota3_sponsor@$monto3_sponsor', '$cuota4_sponsor@$monto4_sponsor', '$cuota5_sponsor@$monto5_sponsor', '$cuota6_sponsor@$monto6_sponsor', '$cuota7_sponsor@$monto7_sponsor', '$cuota8_sponsor@$monto8_sponsor', '$cuota9_sponsor@$monto9_sponsor', '$cuota10_sponsor@$monto10_sponsor', '$cuota11_sponsor@$monto11_sponsor', '$cuota12_sponsor@$monto12_sponsor','no','$inter_sponsor')";
    }
}
//$query = "INSERT INTO sponsor VALUES (NULL , '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '')";
if(!mysql_query($query)){
    echo mysql_error();
}