<?php
include_once "configuracion/config.inc.php";

$fecha_registro = date("Y-m-d",strtotime($_POST['fecha_registro']));
$fecha_fin = date("Y-m-d",strtotime($_POST['fecha_fin']));
$razon_social = $_POST['razon_social'];
$nombre_comercial = $_POST['nombre_comercial'];
$rep_legal = $_POST['rep_legal'];
$doc_identidad = $_POST['doc_identidad'];
$nit = $_POST['nit'];

$nom_contacto = $_POST['nom_contacto'];
$cel_contacto = $_POST['cel_contacto'];

$departameto = $_POST['departamento'];
$ciudad = $_POST['ciudad'];
$direccion = $_POST['direccion'];
$telefono = $_POST['telefono'];
$celular = $_POST['celular'];
$fax = $_POST['fax'];
$email = $_POST['email'];
$pag_web = $_POST['pag_web'];

$query = "INSERT INTO clientes VALUES (null,'$fecha_registro','$fecha_fin','$razon_social','$nombre_comercial','$rep_legal',$doc_identidad,$nit,'$nom_contacto','$cel_contacto','$ciudad','$departameto','$direccion',null,null,null,null,'$telefono',$celular,'$fax','$email','$pag_web')";

if(!mysql_query($query)){
    echo mysql_error();
}