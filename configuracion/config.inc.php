<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "123456";
///$dbuser = "linxscom_linxs";
//$dbpass = "isxAeIQw065c";
$db = "clientes_linxs";
$conectar = mysql_connect($dbhost,$dbuser,$dbpass); mysql_select_db($db,$conectar);
mysql_query ("SET NAMES 'utf8'");
?>
