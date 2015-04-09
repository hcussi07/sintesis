<?php
require_once 'config.inc.php';

$idcliente = $_GET['idcliente'];

$query = "DELETE FROM clientes WHERE cod = $idcliente LIMIT 1";

if(!mysql_query($query)){
    echo mysql_error();
}