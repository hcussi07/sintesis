<?php
include_once "config.inc.php";

$id_empresa_control = $_GET['id_empresa_control'];
$envio_contr = date("Y-m-d",strtotime($_GET['envio_contr']));
$susc_contr = date("Y-m-d",strtotime($_GET['susc_contr']));
$envio_convenio = date("Y-m-d",strtotime($_GET['envio_convenio']));
$recep_convenio = date("Y-m-d",strtotime($_GET['recep_convenio']));
$query = "INSERT INTO contratos VALUES (NULL , '$id_empresa_control','$envio_contr', '$susc_contr', '$envio_convenio', '$recep_convenio')";

if(!mysql_query($query)){
    echo mysql_error();
}