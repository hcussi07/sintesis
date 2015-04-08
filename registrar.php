<?php
session_start();
include_once "configuracion/config.inc.php";
?>
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html">
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">

    <title>Registro de Clientes</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/dashboard.css" rel="stylesheet">
    <link rel="stylesheet" href="css/jquery-ui.css">

    <style>
        #error_cuotabetm, #error_cuotaweb, #error_cuotapublicidad,#error_cuotasponsor{display:none;color: #cd0a0a}

    </style>
</head>

<body>

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
                <li><a href="configuracion/logout.php">Cerrar session</a></li>
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
        <li class="active"><a href=registrar.php>Registrar <span class="sr-only">(current)</span></a></li>
        <li><a href="listado_clientes.php">Listado clientes</a></li>
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

<!-- INICIO FORMULARIO PARA CREAR -->
<input type="hidden" id="idclientebetm">
<form action="configuracion/nuevo_cliente.php" method="post" id="form_datos" class="form-horizontal" role="form">
    <div id="datosCliente">
        <h2>DATOS INSTITUCIONALES</h2>
        <table class="table table-hover">
            <tr>
                <td>
                    <div class="form-group form-group-sm">
                        <div class="col-xs-2">
                            <label for="fecha_registro">Fecha registro</label>
                            <input type="text" name="fecha_registro" id="fecha_registro" required class="form-control"/>
                        </div>
                        <div class="col-xs-2">
                            <label for="fecha_fin">Fecha vencimiento</label>
                            <input type="text" name="fecha_fin" id="fecha_fin" required class="form-control"/>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="form-group form-group-sm">
                        <div class="col-xs-3">
                            <label for="razon_social">Razon social</label>
                            <input type="text" name="razon_social" id="razon_social" class="form-control"/>
                        </div>
                        <div class="col-xs-3">
                            <label for="nombre_comercial">Nombre comercial</label>
                            <input type="text" name="nombre_comercial" id="nombre_comercial" class="form-control" />
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="form-group form-group-sm">
                        <div class="col-xs-3">
                            <label for="rep_legal">Representante legal</label>
                            <input type="text" name="rep_legal" id="rep_legal" class="form-control"/>
                        </div>
                        <div class="col-xs-3">
                            <label for="doc_identidad">Documento identidad</label>
                            <input type="text" name="doc_identidad" id="doc_identidad" class="form-control"/>
                        </div>
                        <div class="col-xs-3">
                            <label for="nit">NIT</label>
                            <input type="number" name="nit" id="nit" class="form-control"/>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="form-group form-group-sm">
                        <div class="col-xs-3">
                            <label for="nom_contacto">Nombre de contacto</label>
                            <input type="text" name="nom_contacto" id="nom_contacto" class="form-control"/>
                        </div>
                        <div class="col-xs-3">
                            <label for="cel_contacto">Celular contacto</label>
                            <input type="text" name="cel_contacto" id="cel_contacto" class="form-control"/>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="form-group form-group-sm">
                        <div class="col-xs-3">
                            <label for="departamento">Departamento</label>
                            <select id="departamento" name="departamento" onchange="showSelect(this.value)" class="form-control">
                                <?php
                                $consulta = "SELECT * FROM departamento";
                                $resultado = mysql_query($consulta);
                                while($fila = mysql_fetch_array($resultado)) {
                                    echo "<option value='" . $fila['iddepto'] . "'>" . $fila['depto'] . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-xs-3">
                            <label for="o_ciudad">Ciudad</label>
                            <div id="select_ciudad"></div>
                        </div>
                        <div class="col-xs-3">
                            <label>Otra ciudad</label>
                            <input type="text" name="o_ciudad" id="o_ciudad" class="form-control" disabled>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="form-group form-group-sm">
                        <div class="col-xs-6">
                            <label for="direccion">Direccion</label>
                            <input type="text" name="direccion" id="direccion" size="70" class="form-control"/>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="form-group form-group-sm">
                        <div class="col-xs-3">
                            <label for="telefono">Telefono</label>
                            <input type="text" name="telefono" id="telefono" class="form-control"/>
                        </div>
                        <div class="col-xs-3">
                            <label for="celular">Celular</label>
                            <input type="text" name="celular" id="celular" class="form-control"/>
                        </div>
                        <div class="col-xs-3">
                            <label for="fax">Fax</label>
                            <input type="text" name="fax" id="fax" class="form-control"/>
                        </div>
                    </div>
                </td>
            </tr>

            <tr>
                <td>
                    <div class="form-group form-group-sm">
                        <div class="col-xs-3">
                            <label for="email">email</label>
                            <input type="text" name="email" id="email" class="form-control"/>
                        </div>
                        <div class="col-xs-3">
                            <label for="pag_web">Pagina web</label>
                            <input type="text" name="pag_web" id="pag_web" class="form-control"/>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="form-group form-group-sm">
                        <div class="col-xs-3">
                            <input type="button" value="Guardar" onclick="guardarDatos()" class="btn btn-success">
                        </div>
                        <div class="col-xs-3">
                            <input type="reset" value="Borrar" class="btn btn-danger">
                        </div>
                    </div>
                </td>
            </tr>
        </table>
    </div>
</form>

<h2><label><input type="checkbox" id="hab_suscripBetm" onchange="habilita_betm()"> SUSCRIPCION BOLIVIA EN TUS MANOS</label></h2>

<div id="suscripBetm">
<form method="post" action="#" id="form_betm" class="form-horizontal" role="form">
<table class="table table-hover">
    <tr>
        <td><input type="hidden" id="id_empresa" name="id_empresa">
            <div class="form-group form-group-sm">
                <div class="col-xs-2">
                    <label for="betm_alta">Fecha Alta Betm</label>
                    <input type="text" name="betm_alta" id="betm_alta" class="form-control"/>
                </div>
                <div class="col-xs-2">
                    <label for="betm_venc">Fecha Vencimiento</label>
                    <input type="text" name="betm_venc" id="betm_venc" class="form-control"/>
                </div>
            </div>
        </td>
    </tr>
    <tr>
        <td>
            <div class="form-group form-group-sm">
                <div class="col-xs-3">
                    <label for="tipo_plan">Plan de suscripcion</label>
                    <select id="tipo_plan" name="tipo_plan" onchange="showPlan(this.value)" class="form-control">
                        <option value="0">Seleccione-></option>
                        <?php
                        $query = "SELECT * FROM plan_suscripcion";
                        $row = mysql_query($query);
                        $row1 = mysql_query($query);
                        $fila1 = mysql_fetch_array($row1);
                        while($fila = mysql_fetch_array($row)) {
                            echo "<option value='" . $fila['idplan'] . "|".$fila['total']."|".$fila['cuota1']."|".$fila['cuota3']."|".$fila['cuota6']."|".$fila['cuota11']."|".$fila['plan']."'>" . $fila['plan'] . "</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>
        </td>
    </tr>
    <tr>
        <td>
            <div class="form-group form-group-sm">
                <div class="col-xs-2">
                    <label>Contado <input type="radio" name="tipo_betm" value="contado" class="form-control"></label>
                </div>
                <div class="col-xs-2">
                    <label>Normal<input type="radio" name="tipo_betm" value="normal" class="form-control"></label>
                </div>
                <div class="col-xs-2">
                    <label>Igual <input type="radio" name="tipo_betm" value="igual" class="form-control"></label>
                </div>
                <div class="col-xs-2">
                    <label>Intercambio <input type="checkbox" id="hab_intercambio" name="hab_intercambio" onchange="habilitarIntercambio()" class="form-control"></label>
                </div>
                <div class="col-xs-2">
                    <label for="por_intercambio"></label>
                    <select id="por_intercambio" name="por_intercambio" onchange="intercambio_betm(this.value)" class="form-control">
                        <option value="0">Seleccione-></option>
                        <option value="30">30%</option>
                        <option value="50">50%</option>
                        <option value="80">80%</option>
                        <option value="100">100%</option>
                    </select>
                </div>
            </div>
        </td>
    </tr>
    <tr>
        <td>
            <div class="form-group form-group-sm">
                <div class="col-xs-2">
                    <label for="monto_betm">Monto $us:</label>
                    <input type="number" id="monto_betm" name="monto_betm" step="any" class="form-control" required>
                </div>
                <div class="col-xs-2">
                    <label for="descuento_betm">Descuento</label>
                    <select id="descuento_betm" name="descuento_betm" onchange="descontarBetm(this.value)" class="form-control">
                        <option value="0">seleccione-></option>
                        <option value="5">5%</option>
                        <option value="10">10%</option>
                        <option value="15">15%</option>
                    </select>
                </div>
                <div class="col-xs-2">
                    <label for="cuotas_betm">Nro. de Cuotas</label>
                    <select id="cuotas_betm" name="cuotas_betm" onchange="llenar_cuotas_betm(this.value)" class="form-control">
                        <option value="0">Seleccione-></option>
                    </select>
                </div>
                <div class="col-xs-2">
                    <div id="error_cuotabetm">Llenar monto</div>
                </div>
            </div>
        </td>
    </tr>
    <tr>
        <td>
            <div class="form-group form-group-sm">
                <div class="col-xs-2">
                    <label for="descto_betm">Descontado $us:</label>
                    <input type="number" id="descto_betm" name="descto_betm" step="any" class="form-control" readonly>
                </div>
                <div class="col-xs-2">
                    <label for="por_pagar_betm">Por pagar $us:</label>
                    <input type="number" id="por_pagar_betm" name="por_pagar_betm" step="any" class="form-control" readonly>
                </div>
                <div class="col-xs-2">
                    <label for="inter_betm">Intercambio $us:</label>
                    <input type="number" id="inter_betm" name="inter_betm" step="any" class="form-control" readonly>
                </div>
            </div>
        </td>
    </tr>
</table>
<div id="ver_cuotas_betm">
    <table class="table table-hover">
        <tr>
            <td>
                <div class="form-group form-group-sm">
                    <div class="col-xs-2">
                        <label for="cuota1_betm">Cuota 1</label>
                        <input type="text" size="10" id="cuota1_betm" name="cuota1_betm" class="form-control" >
                        <input type="number" id="monto1_betm" name="monto1_betm" step="any" class="form-control" >
                    </div>
                    <div class="col-xs-2">
                        <label for="cuota2_betm">Cuota 2</label>
                        <input type="text" size="10" id="cuota2_betm" name="cuota2_betm" class="form-control">
                        <input type="number" id="monto2_betm" name="monto2_betm" step="any" class="form-control">
                    </div>
                    <div class="col-xs-2">
                        <label for="cuota3_betm">Cuota 3</label>
                        <input type="text" size="10" id="cuota3_betm" name="cuota3_betm" class="form-control">
                        <input type="number" id="monto3_betm" name="monto3_betm" step="any" class="form-control">
                    </div>
                    <div class="col-xs-2">
                        <label for="cuota4_betm">Cuota 4</label>
                        <input type="text" size="10" id="cuota4_betm" name="cuota4_betm" class="form-control">
                        <input type="number" id="monto4_betm" name="monto4_betm" step="any" class="form-control">
                    </div>
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <div class="form-group form-group-sm">
                    <div class="col-xs-2">
                        <label for="cuota5_betm">Cuota 5</label>
                        <input type="text" size="10" id="cuota5_betm" name="cuota5_betm" class="form-control" >
                        <input type="number" id="monto5_betm" name="monto5_betm" step="any" class="form-control" >
                    </div>
                    <div class="col-xs-2">
                        <label for="cuota6_betm">Cuota 6</label>
                        <input type="text" size="10" id="cuota6_betm" name="cuota6_betm" class="form-control">
                        <input type="number" id="monto6_betm" name="monto6_betm" step="any" class="form-control">
                    </div>
                    <div class="col-xs-2">
                        <label for="cuota7_betm">Cuota 7</label>
                        <input type="text" size="10" id="cuota7_betm" name="cuota7_betm" class="form-control">
                        <input type="number" id="monto7_betm" name="monto7_betm" step="any" class="form-control">
                    </div>
                    <div class="col-xs-2">
                        <label for="cuota8_betm">Cuota 8</label>
                        <input type="text" size="10" id="cuota8_betm" name="cuota8_betm" class="form-control">
                        <input type="number" id="monto8_betm" name="monto8_betm" step="any" class="form-control">
                    </div>
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <div class="form-group form-group-sm">
                    <div class="col-xs-2">
                        <label for="cuota9_betm">Cuota 9</label>
                        <input type="text" size="10" id="cuota9_betm" name="cuota9_betm" class="form-control" >
                        <input type="number" id="monto9_betm" name="monto9_betm" step="any" class="form-control" >
                    </div>
                    <div class="col-xs-2">
                        <label for="cuota10_betm">Cuota 10</label>
                        <input type="text" size="10" id="cuota10_betm" name="cuota10_betm" class="form-control">
                        <input type="number" id="monto10_betm" name="monto10_betm" step="any" class="form-control">
                    </div>
                    <div class="col-xs-2">
                        <label for="cuota11_betm">Cuota 11</label>
                        <input type="text" size="10" id="cuota11_betm" name="cuota11_betm" class="form-control">
                        <input type="number" id="monto11_betm" name="monto11_betm" step="any" class="form-control">
                    </div>
                    <div class="col-xs-2">
                        <label for="cuota12_betm">Cuota 12</label>
                        <input type="text" size="10" id="cuota12_betm" name="cuota12_betm" class="form-control">
                        <input type="number" id="monto12_betm" name="monto12_betm" step="any" class="form-control">
                    </div>
                </div>
            </td>
        </tr>
    </table>
</div>
<table class="table table-hover">
    <tr>
        <td>
            <div class="form-group form-group-sm">
                <div class="col-xs-2">
                    <input type="button" value="Guardar" onclick="guardarBetm()" class="btn btn-success">
                </div>
                <div class="col-xs-2">
                    <input type="reset" value="Borrar" class="btn btn-danger">
                </div>
            </div>
        </td>
    </tr>
</table>
</form>
</div>

<h2><label><input type="checkbox" id="hab_suscripWeb" onchange="habilita_web()"> SUSCRIPCION PAGINA WEB</label></h2>

<div id="suscripWeb">
<form method="post" action="#" id="form_web" class="form-horizontal" role="form">
<table class="table table-hover">
    <tr>
        <td>
            <div class="form-group form-group-sm">
                <div class="col-xs-2">
                    <input type="hidden" id="id_empresaWeb" name="id_empresaWeb"><label for="web_alta">Fecha Alta Betm</label>
                    <input type="text" name="web_alta" id="web_alta" class="form-control"/>
                </div>
                <div class="col-xs-2">
                    <label for="web_venc">Fecha Vencimiento</label>
                    <input type="text" name="web_venc" id="web_venc" class="form-control"/>
                </div>
            </div>
        </td>
    </tr>
    <tr>
        <td>
            <div class="form-group form-group-sm">
                <div class="col-xs-2">
                    <label for="num_botones">Botones:</label>
                    <input type="number" id="num_botones" name="num_botones" class="form-control">
                </div>
                <div class="col-xs-2">
                    <label for="monto_botones">Monto:</label>
                    <input type="number" id="monto_botones" name="monto_botones" step="any" value="0" class="form-control">
                </div>
            </div>
        </td>
    </tr>
    <tr>
        <td>
            <div class="form-group form-group-sm">
                <div class="col-xs-2">
                    <label>Hosting:<input type="checkbox" id="hosting_web" name="hosting_web" onchange="adiciona_hosting()" class="form-control"></label>
                </div>
                <div class="col-xs-2">
                    <label for="monto_hosting">Monto:</label>
                    <input type="number" id="monto_hosting" name="monto_hosting" step="any" value="0" class="form-control">
                </div>
            </div>
        </td>
    </tr>
    <tr>
        <td>
            <div class="form-group form-group-sm">
                <div class="col-xs-2">
                    <label>Dominio (.com)<input type="checkbox" id="dominio_com" name="dominio_com" onchange="adiciona_dominio_com()" class="form-control"></label>
                </div>
                <div class="col-xs-2">
                    <label>Dominio (.com.bo)<input type="checkbox" id="dominio_com_bo" name="dominio_com_bo" onchange="adiciona_dominio_com_bo()" class="form-control"></label>
                </div>
                <div class="col-xs-2">
                    <label for="monto_dominio">Monto:</label>
                    <input type="number" id="monto_dominio" name="monto_dominio" step="any" value="0" class="form-control">
                </div>
            </div>
        </td>
    </tr>
    <tr>
        <td>
            <div class="form-group form-group-sm">
                <div class="col-xs-4">
                    <label for="nombre_dominio">Nombre dominio:</label>
                    <input type="text" size="40" id="nombre_dominio" name="nombre_dominio" class="form-control">
                </div>
            </div>
        </td>
    </tr>
    <tr>
        <td>
            <div class="form-group form-group-sm">
                <div class="col-xs-2">
                    <label>Contado <input type="radio" id="tipo_web" name="tipo_web" value="contado" class="form-control"></label>
                </div>
                <div class="col-xs-2">
                    <label>Igual <input type="radio" id="tipo_web" name="tipo_web" value="igual" class="form-control"></label>
                </div>
                <div class="col-xs-2">
                    <label for="hab_intercambio_web">Intercambio <input type="checkbox" id="hab_intercambio_web" name="hab_intercambio_web" onchange="habilitarIntercambioWeb()" class="form-control"></label>
                </div>
                <div class="col-xs-2">
                    <label></label>
                    <select id="por_intercambio_web" name="por_intercambio_web" onchange="intercambio_web(this.value)" class="form-control">
                        <option value="0">Seleccione-></option>
                        <option value="30">30%</option>
                        <option value="50">50%</option>
                        <option value="80">80%</option>
                        <option value="100">100%</option>
                    </select>
                </div>
            </div>
        </td>
    </tr>
    <tr>
        <td>
            <div class="form-group form-group-sm">
                <div class="col-xs-2">
                    <label for="monto_web">Monto $us:</label>
                    <input type="number" id="monto_web" name="monto_web" step="any" required class="form-control">
                </div>
                <div class="col-xs-2">
                    <label for="descuento_web">Descuento: </label>
                    <select id="descuento_web" name="descuento_web" onchange="descontarWeb(this.value)" class="form-control">
                        <option value="0">seleccione-></option>
                        <option value="5">5%</option>
                        <option value="10">10%</option>
                        <option value="15">15%</option>
                    </select>
                </div>
                <div class="col-xs-2">
                    <label for="cuotas_web">Nro. de Cuotas: </label>
                    <select id="cuotas_web" name="cuotas_web" onchange="llenar_cuotas_web(this.value)" class="form-control">
                        <option value="0">Seleccione-></option>
                        <option value='1'>1 Cuotas</option>
                        <option value='2'>2 Cuotas</option>
                        <option value='3'>3 Cuotas</option>
                        <option value='4'>4 Cuotas</option>
                        <option value='5'>5 Cuotas</option>
                        <option value='6'>6 Cuotas</option>
                        <option value='7'>7 Cuotas</option>
                        <option value='8'>8 Cuotas</option>
                        <option value='9'>9 Cuotas</option>
                        <option value='10'>10 Cuotas</option>
                        <option value='11'>11 Cuotas</option>
                        <option value='12'>12 Cuotas</option>
                    </select>
                </div>
                <div class="col-xs-2">
                    <div id="error_cuotaweb">Llenar monto</div>
                </div>
            </div>
        </td>
    </tr>
    <tr>
        <td>
            <div class="form-group form-group-sm">
                <div class="col-xs-2">
                    <label for="descto_web">Descontado $us: </label>
                    <input type="number" id="descto_web" name="descto_web" step="any" readonly class="form-control">
                </div>
                <div class="col-xs-2">
                    <label for="por_pagar_web">Por pagar Sus: </label>
                    <input type="number" id="por_pagar_web" name="por_pagar_web" step="any" readonly class="form-control">
                </div>
                <div class="col-xs-2">
                    <label for="inter_web">Intercambio $us: </label>
                    <input type="number" id="inter_web" name="inter_web" step="any" readonly class="form-control">
                </div>
            </div>
        </td>
    </tr>
</table>
<div id="ver_cuotas_web">
    <table class="table table-hover">
        <tr>
            <td>
                <div class="form-group form-group-sm">
                    <div class="col-xs-2">
                        <label for="cuota1_web">Cuota 1</label>
                        <input type="text" size="10" id="cuota1_web" name="cuota1_web" class="form-control" >
                        <input type="number" id="monto1_web" name="monto1_web" step="any" class="form-control" >
                    </div>
                    <div class="col-xs-2">
                        <label for="cuota2_web">Cuota 2</label>
                        <input type="text" size="10" id="cuota2_web" name="cuota2_web" class="form-control">
                        <input type="number" id="monto2_web" name="monto2_web" step="any" class="form-control">
                    </div>
                    <div class="col-xs-2">
                        <label for="cuota3_web">Cuota 3</label>
                        <input type="text" size="10" id="cuota3_web" name="cuota3_web" class="form-control">
                        <input type="number" id="monto3_web" name="monto3_web" step="any" class="form-control">
                    </div>
                    <div class="col-xs-2">
                        <label for="cuota4_web">Cuota 4</label>
                        <input type="text" size="10" id="cuota4_web" name="cuota4_web" class="form-control">
                        <input type="number" id="monto4_web" name="monto4_web" step="any" class="form-control">
                    </div>
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <div class="form-group form-group-sm">
                    <div class="col-xs-2">
                        <label for="cuota5_web">Cuota 5</label>
                        <input type="text" size="10" id="cuota5_web" name="cuota5_web" class="form-control" >
                        <input type="number" id="monto5_web" name="monto5_web" step="any" class="form-control" >
                    </div>
                    <div class="col-xs-2">
                        <label for="cuota6_web">Cuota 6</label>
                        <input type="text" size="10" id="cuota6_web" name="cuota6_web" class="form-control">
                        <input type="number" id="monto6_web" name="monto6_web" step="any" class="form-control">
                    </div>
                    <div class="col-xs-2">
                        <label for="cuota7_web">Cuota 7</label>
                        <input type="text" size="10" id="cuota7_web" name="cuota7_web" class="form-control">
                        <input type="number" id="monto7_web" name="monto7_web" step="any" class="form-control">
                    </div>
                    <div class="col-xs-2">
                        <label for="cuota8_web">Cuota 8</label>
                        <input type="text" size="10" id="cuota8_web" name="cuota8_web" class="form-control">
                        <input type="number" id="monto8_web" name="monto8_web" step="any" class="form-control">
                    </div>
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <div class="form-group form-group-sm">
                    <div class="col-xs-2">
                        <label for="cuota9_web">Cuota 9</label>
                        <input type="text" size="10" id="cuota9_web" name="cuota9_web" class="form-control" >
                        <input type="number" id="monto9_web" name="monto9_web" step="any" class="form-control" >
                    </div>
                    <div class="col-xs-2">
                        <label for="cuota10_web">Cuota 10</label>
                        <input type="text" size="10" id="cuota10_web" name="cuota10_web" class="form-control">
                        <input type="number" id="monto10_web" name="monto10_web" step="any" class="form-control">
                    </div>
                    <div class="col-xs-2">
                        <label for="cuota11_web">Cuota 11</label>
                        <input type="text" size="10" id="cuota11_web" name="cuota11_web" class="form-control">
                        <input type="number" id="monto11_web" name="monto11_web" step="any" class="form-control">
                    </div>
                    <div class="col-xs-2">
                        <label for="cuota12_web">Cuota 12</label>
                        <input type="text" size="10" id="cuota12_web" name="cuota12_web" class="form-control">
                        <input type="number" id="monto12_web" name="monto12_web" step="any" class="form-control">
                    </div>
                </div>
            </td>
        </tr>
    </table>
</div>
<table class="table table-hover">
    <tr>
        <td>
            <div class="form-group form-group-sm">
                <div class="col-xs-2">
                    <label for="alta_dominio">Fecha Alta dominio</label>
                    <input type="text" id="alta_dominio" name="alta_dominio" class="form-control">
                </div>
                <div class="col-xs-2">
                    <label for="alta_hosting">Fecha Alta Hosting</label>
                    <input type="text" id="alta_hosting" name="alta_hosting" class="form-control">
                </div>
                <div class="col-xs-2">
                    <label for="alta_web">Fecha Alta Web</label>
                    <input type="text" id="alta_web" name="alta_web" class="form-control">
                </div>
            </div>
        </td>
    </tr>
    <tr>
        <td>
            <div class="form-group form-group-sm">
                <div class="col-xs-2">
                    <input type="button" value="Guardar" onclick="guardarWeb()" class="btn btn-success">
                </div>
                <div class="col-xs-2">
                    <input type="reset" value="Borrar" class="btn btn-danger">
                </div>
            </div>
        </td>
    </tr>
</table>
</form>
</div>

<h2><label><input type="checkbox" id="hab_suscripSponsor" onchange="habilita_sponsor()"> SUSCRIPCION SPONSOR</label></h2>

<div id="suscripSponsor">
<form method="post" action="#" id="form_sponsor" class="form-horizontal" role="form">
<table class="table table-hover">
    <tr>
        <td>
            <div class="form-group form-group-sm">
                <div class="col-xs-2">
                    <input type="hidden" id="id_empresaSponsor" name="id_empresaSponsor">
                    <label for="sponsor_alta">Fecha Alta Betm</label>
                    <input type="text" name="sponsor_alta" id="sponsor_alta" class="form-control"/>
                </div>
                <div class="col-xs-2">
                    <label for="sponsor_venc">Fecha Vencimiento</label>
                    <input type="text" name="sponsor_venc" id="sponsor_venc" class="form-control"/>
                </div>
            </div>
        </td>
    </tr>
    <tr>
        <td>
            <div class="form-group form-group-sm">
                <div class="col-xs-2">
                    <label for="num_sponsors">Nro. de Sponsors:</label>
                    <input type="number" id="num_sponsors" name="num_sponsors" step="any" class="form-control">
                </div>
                <div class="col-xs-4">
                    <label for="pag_seleccion">Paginas seleccionadas</label>
                    <textarea id="pag_seleccion" name="pag_seleccion" cols="30" rows="2" class="form-control"></textarea>
                </div>
            </div>
        </td>
    </tr>
    <tr>
        <td>
            <div class="form-group form-group-sm">
                <div class="col-xs-2">
                    <label for="fec_alta_sponsor">Fecha alta:</label>
                    <input type="text" id="fec_alta_sponsor" name="fec_alta_sponsor" class="form-control">
                </div>
                <div class="col-xs-2">
                    <label for="fec_venc_sponsor">Fecha Vencimiento:</label>
                    <input type="text" id="fec_venc_sponsor" name="fec_venc_sponsor" class="form-control">
                </div>
            </div>
        </td>
    </tr>

    <tr>
        <td>
            <div class="form-group form-group-sm">
                <div class="col-xs-2">
                    <label>Contado <input type="radio" id="tipo_sponsor" name="tipo_sponsor" value="contado" class="form-control"></label>
                </div>
                <div class="col-xs-2">
                    <label>Igual <input type="radio" id="tipo_sponsor" name="tipo_sponsor" value="igual" class="form-control"></label>
                </div>
                <div class="col-xs-2">
                    <label for="hab_intercambio_sponsor">Intercambio <input type="checkbox" id="hab_intercambio_sponsor" name="hab_intercambio_sponsor" onchange="habilitarIntercambioSponsor()" class="form-control"></label>
                </div>
                <div class="col-xs-2">
                    <label></label>
                    <select id="por_intercambio_sponsor" name="por_intercambio_sponsor" onchange="intercambio_sponsor(this.value)" class="form-control">
                        <option value="0">Seleccione-></option>
                        <option value="30">30%</option>
                        <option value="50">50%</option>
                        <option value="80">80%</option>
                        <option value="100">100%</option>
                    </select>
                </div>
            </div>
        </td>
    </tr>
    <tr>
        <td>
            <div class="form-group form-group-sm">
                <div class="col-xs-2">
                    <label for="monto_sponsor">Monto $us:</label>
                    <input type="number" id="monto_sponsor" name="monto_sponsor" step="any" required class="form-control">
                </div>
                <div class="col-xs-2">
                    <label for="descuento_sponsor">Descuento: </label>
                    <select id="descuento_sponsor" name="descuento_sponsor" onchange="descontarSponsor(this.value)" class="form-control">
                        <option value="0">seleccione-></option>
                        <option value="5">5%</option>
                        <option value="10">10%</option>
                        <option value="15">15%</option>
                    </select>
                </div>
                <div class="col-xs-2">
                    <label for="cuotas_sponsor">Nro. de Cuotas: </label>
                    <select id="cuotas_sponsor" name="cuotas_sponsor" onchange="llenar_cuotas_sponsor(this.value)" class="form-control">
                        <option value="0">Seleccione-></option>
                        <option value='1'>1 Cuotas</option>
                        <option value='2'>2 Cuotas</option>
                        <option value='3'>3 Cuotas</option>
                        <option value='4'>4 Cuotas</option>
                        <option value='5'>5 Cuotas</option>
                        <option value='6'>6 Cuotas</option>
                        <option value='7'>7 Cuotas</option>
                        <option value='8'>8 Cuotas</option>
                        <option value='9'>9 Cuotas</option>
                        <option value='10'>10 Cuotas</option>
                        <option value='11'>11 Cuotas</option>
                        <option value='12'>12 Cuotas</option>
                    </select>
                </div>
                <div class="col-xs-2">
                    <div id="error_cuotasponsor">Llenar monto</div>
                </div>
            </div>
        </td>
    </tr>
    <tr>
        <td>
            <div class="form-group form-group-sm">
                <div class="col-xs-2">
                    <label for="descto_sponsor">Descontado $us: </label>
                    <input type="number" id="descto_sponsor" name="descto_sponsor" step="any" readonly class="form-control">
                </div>
                <div class="col-xs-2">
                    <label for="por_pagar_sponsor">Por pagar Sus: </label>
                    <input type="number" id="por_pagar_sponsor" name="por_pagar_sponsor" step="any" readonly class="form-control">
                </div>
                <div class="col-xs-2">
                    <label for="inter_sponsor">Intercambio $us: </label>
                    <input type="number" id="inter_sponsor" name="inter_sponsor" step="any" readonly class="form-control">
                </div>
            </div>
        </td>
    </tr>
</table>
<div id="ver_cuotas_sponsor">
    <table class="table table-hover">
        <tr>
            <td>
                <div class="form-group form-group-sm">
                    <div class="col-xs-2">
                        <label for="cuota1_sponsor">Cuota 1</label>
                        <input type="text" size="10" id="cuota1_sponsor" name="cuota1_sponsor" class="form-control" >
                        <input type="number" id="monto1_sponsor" name="monto1_sponsor" step="any" class="form-control" >
                    </div>
                    <div class="col-xs-2">
                        <label for="cuota2_sponsor">Cuota 2</label>
                        <input type="text" size="10" id="cuota2_sponsor" name="cuota2_sponsor" class="form-control">
                        <input type="number" id="monto2_sponsor" name="monto2_sponsor" step="any" class="form-control">
                    </div>
                    <div class="col-xs-2">
                        <label for="cuota3_sponsor">Cuota 3</label>
                        <input type="text" size="10" id="cuota3_sponsor" name="cuota3_sponsor" class="form-control">
                        <input type="number" id="monto3_sponsor" name="monto3_sponsor" step="any" class="form-control">
                    </div>
                    <div class="col-xs-2">
                        <label for="cuota4_sponsor">Cuota 4</label>
                        <input type="text" size="10" id="cuota4_sponsor" name="cuota4_sponsor" class="form-control">
                        <input type="number" id="monto4_sponsor" name="monto4_sponsor" step="any" class="form-control">
                    </div>
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <div class="form-group form-group-sm">
                    <div class="col-xs-2">
                        <label for="cuota5_sponsor">Cuota 5</label>
                        <input type="text" size="10" id="cuota5_sponsor" name="cuota5_sponsor" class="form-control" >
                        <input type="number" id="monto5_sponsor" name="monto5_sponsor" step="any" class="form-control" >
                    </div>
                    <div class="col-xs-2">
                        <label for="cuota6_sponsor">Cuota 6</label>
                        <input type="text" size="10" id="cuota6_sponsor" name="cuota6_sponsor" class="form-control">
                        <input type="number" id="monto6_sponsor" name="monto6_sponsor" step="any" class="form-control">
                    </div>
                    <div class="col-xs-2">
                        <label for="cuota7_sponsor">Cuota 7</label>
                        <input type="text" size="10" id="cuota7_sponsor" name="cuota7_sponsor" class="form-control">
                        <input type="number" id="monto7_sponsor" name="monto7_sponsor" step="any" class="form-control">
                    </div>
                    <div class="col-xs-2">
                        <label for="cuota8_sponsor">Cuota 8</label>
                        <input type="text" size="10" id="cuota8_sponsor" name="cuota8_sponsor" class="form-control">
                        <input type="number" id="monto8_sponsor" name="monto8_sponsor" step="any" class="form-control">
                    </div>
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <div class="form-group form-group-sm">
                    <div class="col-xs-2">
                        <label for="cuota9_sponsor">Cuota 9</label>
                        <input type="text" size="10" id="cuota9_sponsor" name="cuota9_sponsor" class="form-control" >
                        <input type="number" id="monto9_sponsor" name="monto9_sponsor" step="any" class="form-control" >
                    </div>
                    <div class="col-xs-2">
                        <label for="cuota10_sponsor">Cuota 10</label>
                        <input type="text" size="10" id="cuota10_sponsor" name="cuota10_sponsor" class="form-control">
                        <input type="number" id="monto10_sponsor" name="monto10_sponsor" step="any" class="form-control">
                    </div>
                    <div class="col-xs-2">
                        <label for="cuota11_sponsor">Cuota 11</label>
                        <input type="text" size="10" id="cuota11_sponsor" name="cuota11_sponsor" class="form-control">
                        <input type="number" id="monto11_sponsor" name="monto11_sponsor" step="any" class="form-control">
                    </div>
                    <div class="col-xs-2">
                        <label for="cuota12_sponsor">Cuota 12</label>
                        <input type="text" size="10" id="cuota12_sponsor" name="cuota12_sponsor" class="form-control">
                        <input type="number" id="monto12_sponsor" name="monto12_sponsor" step="any" class="form-control">
                    </div>
                </div>
            </td>
        </tr>
    </table>
</div>
<table class="table table-hover">
    <tr>
        <td>
            <div class="form-group form-group-sm">
                <div class="col-xs-2">
                    <input type="button" value="Guardar" onclick="guardarSponsor()" class="btn btn-success">
                </div>
                <div class="col-xs-2">
                    <input type="reset" value="Borrar" class="btn btn-danger">
                </div>
            </div>
        </td>
    </tr>
</table>
</form>
</div>

<h2><label><input type="checkbox" id="hab_suscripPublicidad" onchange="habilita_publicidad()"> SUSCRIPCION PUBLICIDAD</label></h2>

<div id="suscripPublicidad">
<form method="post" action="#" id="form_publicidad" class="form-horizontal" role="form">
<table class="table table-hover">
    <tr>
        <td>
            <div class="form-group form-group-sm">
                <div class="col-xs-2">
                    <input type="hidden" id="id_empresaPublicidad" name="id_empresaPublicidad">
                    <label for="publicidad_alta">Fecha Alta</label>
                    <input type="text" name="publicidad_alta" id="publicidad_alta" class="form-control"/>
                </div>
                <div class="col-xs-2">
                    <label for="publicidad_venc">Fecha Vencimiento</label>
                    <input type="text" name="publicidad_venc" id="publicidad_venc" class="form-control"/>
                </div>
            </div>
        </td>
    </tr>
    <tr>
        <td>
            <div class="form-group form-group-sm">
                <div class="col-xs-2">
                    <label for="num_publicidad">Numero de Banners:</label>
                    <input type="number" id="num_publicidad" name="num_publicidad" step="any" class="form-control">
                </div>
                <div class="col-xs-4">
                    <label for="pag_seleccion_publicidad">Paginas seleccionadas</label>
                    <textarea id="pag_seleccion_publicidad" name="pag_seleccion_publicidad" cols="30" rows="2" class="form-control"></textarea>
                </div>
                <div class="col-xs-2">
                    <label for="tam_banner">Tamaño pixeles: </label>
                    <input type="text" id="tam_banner" name="tam_banner" class="form-control">
                </div>
            </div>
        </td>
    </tr>
    <tr>
        <td>
            <div class="form-group form-group-sm">
                <div class="col-xs-2">
                    <label for="fec_alta_publicidad">Fecha alta:</label>
                    <input type="text" id="fec_alta_publicidad" name="fec_alta_publicidad" class="form-control">
                </div>
                <div class="col-xs-2">
                    <label for="fec_venc_publicidad">Fecha Vencimiento: </label>
                    <input type="text" id="fec_venc_publicidad" name="fec_venc_publicidad" class="form-control">
                </div>
            </div>
        </td>
    </tr>
    <tr>
        <td>
            <div class="form-group form-group-sm">
                <div class="col-xs-2">
                    <label>Contado <input type="radio" id="tipo_publicidad" name="tipo_publicidad" value="contado" class="form-control"></label>
                </div>
                <div class="col-xs-2">
                    <label>Igual <input type="radio" id="tipo_publicidad" name="tipo_publicidad" value="igual" class="form-control"></label>
                </div>
                <div class="col-xs-2">
                    <label for="hab_intercambio_publicidad">Intercambio <input type="checkbox" id="hab_intercambio_publicidad" name="hab_intercambio_publicidad" onchange="habilitarIntercambioPublicidad()" class="form-control"></label>
                </div>
                <div class="col-xs-2">
                    <label></label>
                    <select id="por_intercambio_publicidad" name="por_intercambio_publicidad" onchange="intercambio_publicidad(this.value)" class="form-control">
                        <option value="0">Seleccione-></option>
                        <option value="30">30%</option>
                        <option value="50">50%</option>
                        <option value="80">80%</option>
                        <option value="100">100%</option>
                    </select>
                </div>
            </div>
        </td>
    </tr>
    <tr>
        <td>
            <div class="form-group form-group-sm">
                <div class="col-xs-2">
                    <label for="monto_publicidad">Monto $us:</label>
                    <input type="number" id="monto_publicidad" name="monto_publicidad" step="any" required class="form-control">
                </div>
                <div class="col-xs-2">
                    <label for="descuento_publicidad">Descuento: </label>
                    <select id="descuento_publicidad" name="descuento_publicidad" onchange="descontarPublicidad(this.value)" class="form-control">
                        <option value="0">seleccione-></option>
                        <option value="5">5%</option>
                        <option value="10">10%</option>
                        <option value="15">15%</option>
                    </select>
                </div>
                <div class="col-xs-2">
                    <label for="cuotas_publicidad">Nro. de Cuotas: </label>
                    <select id="cuotas_publicidad" name="cuotas_publicidad" onchange="llenar_cuotas_publicidad(this.value)" class="form-control">
                        <option value="0">Seleccione-></option>
                        <option value='1'>1 Cuotas</option>
                        <option value='2'>2 Cuotas</option>
                        <option value='3'>3 Cuotas</option>
                        <option value='4'>4 Cuotas</option>
                        <option value='5'>5 Cuotas</option>
                        <option value='6'>6 Cuotas</option>
                        <option value='7'>7 Cuotas</option>
                        <option value='8'>8 Cuotas</option>
                        <option value='9'>9 Cuotas</option>
                        <option value='10'>10 Cuotas</option>
                        <option value='11'>11 Cuotas</option>
                        <option value='12'>12 Cuotas</option>
                    </select>
                </div>
                <div class="col-xs-2">
                    <div id="error_cuotapublicidad">Llenar monto</div>
                </div>
            </div>
        </td>
    </tr>
    <tr>
        <td>
            <div class="form-group form-group-sm">
                <div class="col-xs-2">
                    <label for="descto_publicidad">Descontado $us: </label>
                    <input type="number" id="descto_publicidad" name="descto_publicidad" step="any" readonly class="form-control">
                </div>
                <div class="col-xs-2">
                    <label for="por_pagar_publicidad">Por pagar Sus: </label>
                    <input type="number" id="por_pagar_publicidad" name="por_pagar_publicidad" step="any" readonly class="form-control">
                </div>
                <div class="col-xs-2">
                    <label for="inter_publicidad">Intercambio $us: </label>
                    <input type="number" id="inter_publicidad" name="inter_publicidad" step="any" readonly class="form-control">
                </div>
            </div>
        </td>
    </tr>
</table>
<div id="ver_cuotas_publicidad">
    <table class="table table-hover">
        <tr>
            <td>
                <div class="form-group form-group-sm">
                    <div class="col-xs-2">
                        <label for="cuota1_publicidad">Cuota 1</label>
                        <input type="text" size="10" id="cuota1_publicidad" name="cuota1_publicidad" class="form-control" >
                        <input type="number" id="monto1_publicidad" name="monto1_publicidad" step="any" class="form-control" >
                    </div>
                    <div class="col-xs-2">
                        <label for="cuota2_publicidad">Cuota 2</label>
                        <input type="text" size="10" id="cuota2_publicidad" name="cuota2_publicidad" class="form-control">
                        <input type="number" id="monto2_publicidad" name="monto2_publicidad" step="any" class="form-control">
                    </div>
                    <div class="col-xs-2">
                        <label for="cuota3_publicidad">Cuota 3</label>
                        <input type="text" size="10" id="cuota3_publicidad" name="cuota3_publicidad" class="form-control">
                        <input type="number" id="monto3_publicidad" name="monto3_publicidad" step="any" class="form-control">
                    </div>
                    <div class="col-xs-2">
                        <label for="cuota4_publicidad">Cuota 4</label>
                        <input type="text" size="10" id="cuota4_publicidad" name="cuota4_publicidad" class="form-control">
                        <input type="number" id="monto4_publicidad" name="monto4_publicidad" step="any" class="form-control">
                    </div>
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <div class="form-group form-group-sm">
                    <div class="col-xs-2">
                        <label for="cuota5_publicidad">Cuota 5</label>
                        <input type="text" size="10" id="cuota5_publicidad" name="cuota5_publicidad" class="form-control" >
                        <input type="number" id="monto5_publicidad" name="monto5_publicidad" step="any" class="form-control" >
                    </div>
                    <div class="col-xs-2">
                        <label for="cuota6_publicidad">Cuota 6</label>
                        <input type="text" size="10" id="cuota6_publicidad" name="cuota6_publicidad" class="form-control">
                        <input type="number" id="monto6_publicidad" name="monto6_publicidad" step="any" class="form-control">
                    </div>
                    <div class="col-xs-2">
                        <label for="cuota7_publicidad">Cuota 7</label>
                        <input type="text" size="10" id="cuota7_publicidad" name="cuota7_publicidad" class="form-control">
                        <input type="number" id="monto7_publicidad" name="monto7_publicidad" step="any" class="form-control">
                    </div>
                    <div class="col-xs-2">
                        <label for="cuota8_publicidad">Cuota 8</label>
                        <input type="text" size="10" id="cuota8_publicidad" name="cuota8_publicidad" class="form-control">
                        <input type="number" id="monto8_publicidad" name="monto8_publicidad" step="any" class="form-control">
                    </div>
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <div class="form-group form-group-sm">
                    <div class="col-xs-2">
                        <label for="cuota9_publicidad">Cuota 9</label>
                        <input type="text" size="10" id="cuota9_publicidad" name="cuota9_publicidad" class="form-control" >
                        <input type="number" id="monto9_publicidad" name="monto9_publicidad" step="any" class="form-control" >
                    </div>
                    <div class="col-xs-2">
                        <label for="cuota10_publicidad">Cuota 10</label>
                        <input type="text" size="10" id="cuota10_publicidad" name="cuota10_publicidad" class="form-control">
                        <input type="number" id="monto10_publicidad" name="monto10_publicidad" step="any" class="form-control">
                    </div>
                    <div class="col-xs-2">
                        <label for="cuota11_publicidad">Cuota 11</label>
                        <input type="text" size="10" id="cuota11_publicidad" name="cuota11_publicidad" class="form-control">
                        <input type="number" id="monto11_publicidad" name="monto11_publicidad" step="any" class="form-control">
                    </div>
                    <div class="col-xs-2">
                        <label for="cuota12_publicidad">Cuota 12</label>
                        <input type="text" size="10" id="cuota12_publicidad" name="cuota12_publicidad" class="form-control">
                        <input type="number" id="monto12_publicidad" name="monto12_publicidad" step="any" class="form-control">
                    </div>
                </div>
            </td>
        </tr>
    </table>
</div>
<table class="table table-hover">
    <tr>
        <td>
            <div class="form-group form-group-sm">
                <div class="col-xs-2">
                    <input type="button" value="Guardar" onclick="guardarPublicidad()" class="btn btn-success">
                </div>
                <div class="col-xs-2">
                    <input type="reset" value="Borrar" class="btn btn-danger">
                </div>
            </div>
        </td>
    </tr>
</table>
</form>
</div>

<h2>DATOS DE CONTROL</h2>
<div id="datoscontrol">
    <form method="post" id="form_control" class="form-horizontal" role="form">
        <table class="table table-hover">
            <tr>
                <td>
                    <div class="form-group form-group-sm">
                        <div class="col-xs-2">
                            <input type="hidden" id="id_empresa_control" name="id_empresa_control">
                            <label for="envio_contr">Fecha envio contrato</label>
                            <input type="text" id="envio_contr" name="envio_contr" class="form-control">
                        </div>
                        <div class="col-xs-2">
                            <label for="susc_contr">Fecha suscripcion contrato</label>
                            <input type="text" id="susc_contr" name="susc_contr" class="form-control">
                        </div>
                        <div class="col-xs-2">
                            <label for="envio_convenio">Fecha envio convenio</label>
                            <input type="text" id="envio_convenio" name="envio_convenio" class="form-control">
                        </div>
                        <div class="col-xs-2">
                            <label for="recep_convenio">Fecha recepcion convenio</label>
                            <input type="text" id="recep_convenio" name="recep_convenio" class="form-control">
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="form-group form-group-sm">
                        <div class="col-xs-2">
                            <input type="button" value="Guardar" onclick="guardarControl()" class="btn btn-success">
                        </div>
                        <div class="col-xs-2">
                            <input type="reset" value="Borrar" class="btn btn-danger">
                        </div>
                    </div>
                </td>
            </tr>

        </table>
    </form>
</div>
<!-- FIN FORMULARIOS PARA CREAR-->
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
<script src="js/mainWeb.js"></script>
<script src="js/mainSponsor.js"></script>
<script src="js/mainPublicidad.js"></script>
</body>
</html>
