<?php
include_once "config.inc.php";
$codref_factura = $_POST['codref_factura'];
$fecha_factura = date("Y-m-d",strtotime($_POST['fecha_factura']));
$nro_cuota = $_POST['nro_cuota'];
$nro_factura = $_POST['nro_factura'];
$monto_factura = $_POST['monto_factura'];


$query = "INSERT INTO facturar VALUES (null, '$codref_factura', '$fecha_factura','$nro_cuota' ,'$nro_factura','$monto_factura')";
if(!mysql_query($query)){
    echo mysql_error();
}