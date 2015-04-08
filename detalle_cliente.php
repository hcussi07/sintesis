<?php
session_start();
include_once "configuracion/config.inc.php";
$idcliente = $_GET['idcliente'];
$query = "SELECT * FROM clientes WHERE cod = $idcliente LIMIT 0,1";
$result = mysql_query($query);

$row = mysql_fetch_array($result);

function decimal($num){
    return number_format($num, 2, ",", ".");
}
?>
<!DOCTYPE html>
<html lang="es" xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">

    <title>Detalle de Clientes</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/dashboard.css" rel="stylesheet">
    <link rel="stylesheet" href="css/jquery-ui.css">

    <style>

        #error_cuotabetm, #error_cuotaweb, #error_cuotapublicidad,#error_cuotasponsor{display:none;color: #cd0a0a}
        .ui-widget-header,.ui-state-default, .ui-button{background:#337AB7; border: 1px solid #66afe9; color: #FFFFFF;}
    </style>
</head>

<body onload="recargartabla(<?=$idcliente?>)">

<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Project name</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#">Dashboard</a></li>
                <li><a href="#">Settings</a></li>
                <li><a href="#">Profile</a></li>
                <li><a href="#">Help</a></li>
            </ul>
            <form class="navbar-form navbar-right">
                <input type="text" class="form-control" placeholder="Search...">
            </form>
        </div>
    </div>
</nav>

<div class="container-fluid">
<div class="row">
<div class="col-sm-3 col-md-2 sidebar">
    <ul class="nav nav-sidebar">
        <li><a href="registrar.php">Registrar <span class="sr-only">(current)</span></a></li>
        <li class="active"><a href="listado_clientes.php">Listado clientes</a></li>
        <li><a href="#">Analytics</a></li>
        <li><a href="#">Export</a></li>
    </ul>
    <ul class="nav nav-sidebar">
        <li><a href="">Nav item</a></li>
        <li><a href="">Nav item again</a></li>
        <li><a href="">One more nav</a></li>
        <li><a href="">Another nav item</a></li>
        <li><a href="">More navigation</a></li>
    </ul>
    <ul class="nav nav-sidebar">
        <li><a href="">Nav item again</a></li>
        <li><a href="">One more nav</a></li>
        <li><a href="">Another nav item</a></li>
    </ul>
</div>
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
<!-- INICIO VISTA -->
<div class="col-xs-6">
    <h1><?=$row['ncempresa']?></h1>
</div>
<div class="col-xs-5 text-right">
    <h2>CODIGO</h2>
    <h2><small class="text-uppercase"><?=$row['dep']?> - <?=$row['ciudad']?> - <?=$row['cod']?></small></h2>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4>DATOS INSTITUCIONALES</h4>
            </div>
            <div class="panel-body">
                <table>
                    <tr>
                        <td><input type="hidden" id="idcliente" value="<?=$idcliente?>"><label>Nombre empresa</label> </td>
                        <td> : <?=$row['razons']?></td>
                    </tr>
                    <tr>
                        <td><label>Representante legal</label></td>
                        <td>  : <?=$row['rlegal']?></td>
                    </tr>
                    <tr>
                        <td><label>Cedula de identidad</label></td>
                        <td>  : <?=$row['ci']?></td>
                    </tr>
                    <tr>
                        <td><label>NIT</label></td>
                        <td>  : <?=$row['nit']?></td>
                    </tr>
                    <tr>
                        <td><label>Nombre de contacto</label></td>
                        <td>  : <?=$row['nombrec']?></td>
                    </tr>
                    <tr>
                        <td><label>Celular de contacto</label></td>
                        <td>  : <?=$row['cel']?></td>
                    </tr>
                    <tr>
                        <td><label>Dirección</label></td>
                        <td>  : <?=$row['direccion']?></td>
                    </tr>
                    <tr>
                        <td><label>Teléfono</label></td>
                        <td>  : <?=$row['telefono']?></td>
                    </tr>
                    <tr>
                        <td><label>Celular</label></td>
                        <td>  : <?=$row['celm']?></td>
                    </tr>
                    <tr>
                        <td><label>Fax</label></td>
                        <td>  : <?=$row['fax']?></td>
                    </tr>
                    <tr>
                        <td><label>Email</label></td>
                        <td>  : <?=$row['email']?></td>
                    </tr>
                    <tr>
                        <td><label>Pagina web</label></td>
                        <td>  : <?=$row['web']?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <?php
    $query1 = "SELECT * FROM susbolivia WHERE codref = $idcliente LIMIT 0,1";
    $result1 = mysql_query($query1);
    $row1 = mysql_fetch_array($result1);

    $query2 = "SELECT * FROM web WHERE codref = $idcliente LIMIT 0,1";
    $result2 = mysql_query($query2);
    $row2 = mysql_fetch_array($result2);

    $query3 = "SELECT * FROM sponsor WHERE codref = $idcliente LIMIT 0,1";
    $result3 = mysql_query($query3);
    $row3 = mysql_fetch_array($result3);

    $query4 = "SELECT * FROM publicidad WHERE codref = $idcliente LIMIT 0,1";
    $result4 = mysql_query($query4);
    $row4 = mysql_fetch_array($result4);
    $total= $row1['total']+$row2['total']+$row3['totals']+$row4['totalpubli'];

    $query5 = "SELECT tzcambio FROM tc LIMIT 0,1";
    $result5 = mysql_query($query5);
    $row5 = mysql_fetch_array($result5);
    $totalbs = $total*$row5['tzcambio'];

    $query6 = "SELECT * FROM facturar WHERE codref = $idcliente";
    $result6 = mysql_query($query6);


    ?>
    <div class="col-xs-6 text-left">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4>SUSCRIPCIONES</h4>
            </div>
            <div class="panel-body">
                <table class="table">
                    <thead>
                    <th>SERVICIO</th>
                    <th>DETALLE</th>
                    <th>MONTO</th>
                    </thead>
                    <tbody>
                    <?php
                    $botones = "";
                    if($row1 != null){?>
                        <tr>
                            <td><label>Bolivia en tus manos  </label></td>
                            <td><?=$row1['plan']?></td>
                            <td class="text-right"><?=decimal($row1['total'])?></td>
                        </tr>
                    <?php
                    }
                    if($row2 != null){
                        if($row2['nbotones'] != 0){
                            $botones = $botones.$row2['nbotones']." botones +";
                        }
                        if($row2['hosting'] != 0){

                            $botones = $botones." hosting + ";
                        }
                        if($row2['dominio'] != 0){
                            $botones = $botones."dominio";
                        }
                        ?>
                        <tr>
                            <td><label>Pagina web  </label></td>
                            <td><?=$botones?></td>
                            <td class="text-right"><?=decimal($row2['total'])?></td>
                        </tr>
                    <?php
                    }
                    if($row3 != null){?>
                        <tr>
                            <td><label>Sponsors </label></td>
                            <td><?=$row3['nsponsor']?> sponsors -> <?=$row3['paginas']?></td>
                            <td class="text-right"><?=decimal($row3['totals'])?></td>
                        </tr>
                    <?php
                    }
                    if($row4 != null){?>
                        <tr>
                            <td><label>Publicidad </label></td>
                            <td><?=$row4['nbanners']?> banners -> <?=$row4['pupaginas']?> -> <?=$row4['dimensiones']?> px</td>
                            <td class="text-right"><?=decimal($row4['totalpubli'])?></td>
                        </tr>
                    <?php
                    }
                    ?>
                    <tr>
                        <td><label>Total $us.</label></td>
                        <td></td>
                        <td class="text-right"><?=decimal($total)?></td>
                    </tr>
                    <tr>
                        <td><label>Total Bs.</label></td>
                        <td>Tipo de cambio <?=$row5['tzcambio']?></td>
                        <td class="text-right"><?=decimal($totalbs)?></td>
                    </tr>
                    </tbody>
                </table>

            </div>
        </div>
    </div><!-- FIN DATOS-->
    <div id="messages"></div>
    <table class="table table-bordered table-condensed" id="contenido_tabla">

    </table>
    <table class="table">
        <tr>
            <td><input type="button" class="btn btn-info" value="Facturar" id="btn_factura"></td>
            <td><input type="button" class="btn btn-info" value="Pagos" id="btn_pagos"></td>
        </tr>
    </table>
</div>
<div id="pop_factura" title="Facturar">
    <form method="post" id="form_factura" class="form-horizontal" role="form">
        <input type="hidden" id="codref_factura" name="codref_factura" value="<?=$idcliente?>">
        <div class="form-group form-group-sm">
            <label for="fecha_factura" class="col-lg-4 control-label">Fecha</label>
            <div class="col-lg-8">
                <input type="text" id="fecha_factura" name="fecha_factura" class="form-control">
            </div>
        </div>
        <div class="form-group form-group-sm">
            <label for="nro_cuota" class="col-lg-4 control-label">Nro de Cuota</label>
            <div class="col-lg-8">
                <input type="number" id="nro_cuota" name="nro_cuota" class="form-control" autofocus="autofocus" required>
            </div>
        </div>
        <div class="form-group form-group-sm">
            <label for="nro_factura" class="col-lg-4 control-label">Nro de Factura</label>
            <div class="col-lg-8">
                <input type="text" id="nro_factura" name="nro_factura" class="form-control" required>
            </div>
        </div>
        <div class="form-group form-group-sm">
            <label for="monto_factura" class="col-lg-4 control-label">Monto</label>
            <div class="col-lg-8">
                <input type="number" id="monto_factura" name="monto_factura" class="form-control" step="any" required>
            </div>
        </div>

    </form>
</div>

<div id="pop_pagos" title="Pagar">
    <form method="post" id="form_pagos" class="form-horizontal" role="form">
        <input type="hidden" id="codref_pago" name="codref_pago" value="<?=$idcliente?>">
        <div class="form-group form-group-sm">
            <label for="fecha_pago" class="col-lg-4 control-label">Fecha</label>
            <div class="col-lg-8">
                <input type="text" id="fecha_pago" name="fecha_pago" class="form-control">
            </div>
        </div>
        <div class="form-group form-group-sm">
            <label for="nro_cuota_pago" class="col-lg-4 control-label">Nro de Cuota</label>
            <div class="col-lg-8">
                <input type="number" id="nro_cuota_pago" name="nro_cuota_pago" class="form-control" autofocus="autofocus" required>
            </div>
        </div>
        <div class="form-group form-group-sm">
            <label for="recibido" class="col-lg-4 control-label">Recibido</label>
            <div class="col-lg-8">
                <input type="text" id="recibido" name="recibido" class="form-control" required>
            </div>
        </div>
        <div class="form-group form-group-sm">
            <label for="forma_pago" class="col-lg-4 control-label">Forma de pago</label>
            <div class="col-lg-8">
                <input type="text" id="forma_pago" name="forma_pago" class="form-control" required>
            </div>
        </div>

        <div class="form-group form-group-sm">
            <label for="cancelado" class="col-lg-4 control-label">Cancelado</label>
            <div class="col-lg-8">
                <input type="number" id="cancelado" name="cancelado" class="form-control" step="any" required>
            </div>
        </div>

        <div class="form-group form-group-sm">
            <label for="observaciones" class="col-lg-4 control-label">Observaciones</label>
            <div class="col-lg-8">
                <input type="number" id="observaciones" name="observaciones" class="form-control" step="any" required>
            </div>
        </div>

    </form>
</div>
<!-- FIN VISTA-->
</div>
</div>
</div>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<!--script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script-->
<script src="js/vendor/jquery-1.11.2.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery-ui.js"></script>
<script src="js/main.js"></script>
<script src="js/facturar.js"></script>

</body>
</html>