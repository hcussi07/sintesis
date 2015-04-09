<?php
include_once "config.inc.php";
$codref_pago = $_POST['codref_pago'];
$fecha_pago = date("Y-m-d",strtotime($_POST['fecha_pago']));
$nro_cuota_pago = $_POST['nro_cuota_pago'];
$recibido = $_POST['recibido'];
$forma_pago = $_POST['forma_pago'];
$cancelado = $_POST['cancelado'];
$observaciones = $_POST['observaciones'];


$query = "INSERT INTO pagar VALUES (null,'$codref_pago' ,'$fecha_pago', '$nro_cuota_pago' ,'$recibido','$forma_pago','$cancelado','$observaciones')";
if(!mysql_query($query)){
    echo mysql_error();
}