<?php
include_once "config.inc.php";

$fecha_registro = date("Y-m-d",strtotime($_POST['fecha_registro']));
$fecha_fin = date("Y-m-d",strtotime($_POST['fecha_fin']));

$razon_social = $_POST['razon_social'];
$nombre_comercial = $_POST['nombre_comercial'];
$rep_legal = $_POST['rep_legal'];
$doc_identidad = $_POST['doc_identidad'];
$nit = $_POST['nit'];

$nom_contacto = $_POST['nom_contacto'];
$cel_contacto = $_POST['cel_contacto'];

$departamento = $_POST['departamento'];
$ciudad = $_POST['ciudad'];
$direccion = $_POST['direccion'];
$telefono = $_POST['telefono'];
$celular = $_POST['celular'];
$fax = $_POST['fax'];
$email = $_POST['email'];
$pag_web = $_POST['pag_web'];

$o_ciudad = $_POST['o_ciudad'];

$query2 = "SELECT depto FROM departamento WHERE iddepto = $departamento";
$res = mysql_query($query2);
$row2 = mysql_fetch_array($res);
$depto = $row2['depto'];

if($ciudad == "otra_ciudad"){
    $query1 = "INSERT INTO ciudad VALUES(null,$departamento,'$o_ciudad')";
    mysql_query($query1);
    $query = "INSERT INTO clientes VALUES (null,'$fecha_registro','$fecha_fin','$razon_social','$nombre_comercial','$rep_legal',$doc_identidad,$nit,'$nom_contacto','$cel_contacto','$o_ciudad','$depto','$direccion',null,null,null,null,'$telefono',$celular,'$fax','$email','$pag_web')";
}else{
    $query2 = "SELECT nom_ciudad FROM ciudad WHERE iddepto = $departamento AND idciudad = $ciudad";
    $res = mysql_query($query2);
    $row2 = mysql_fetch_array($res);
    $ciud = $row2['nom_ciudad'];
    $query = "INSERT INTO clientes VALUES (null,'$fecha_registro','$fecha_fin','$razon_social','$nombre_comercial','$rep_legal','$doc_identidad',$nit,'$nom_contacto','$cel_contacto','$ciud','$depto','$direccion',null,null,null,null,'$telefono',$celular,'$fax','$email','$pag_web')";
}

if(!mysql_query($query)){
    echo mysql_error();
}

$query = "SELECT * FROM clientes ORDER BY cod DESC LIMIT 0,1";
$result = mysql_query($query);
$row = mysql_fetch_array($result);
echo $row['cod'];


