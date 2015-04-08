<?php
session_start();
include_once "configuracion/config.inc.php";
?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css"-->
    <link rel="stylesheet" href="css/jquery-ui.css">

    <link rel="apple-touch-icon" href="apple-touch-icon.png">

    <link rel="stylesheet" href="css/main.css">

    <script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
    <style>
        #select_ciudad{display: inline-block; padding-right: 10px}
        #error_cuotabetm,#error_cuotasponsor,#error_cuotaweb,#error_cuotapublicidad{display: none; color: #cd0a0a}
    </style>

</head>
<body>
<input type="hidden" id="idclientebetm">
<form action="configuracion/nuevo_cliente.php" method="post" id="form_datos">
    <div id="datosCliente">
        <h2>DATOS INSTITUCIONALES</h2>
        <table>
            <tr>
                <td><label>Fecha registro</label></td>
                <td><input type="text" name="fecha_registro" id="fecha_registro" required="true"/></td>
                <td><label>Fecha fin</label></td>
                <td><input type="text" name="fecha_fin" id="fecha_fin"/></td>
            </tr>
            <tr>
                <td><label>Razon social</label></td>
                <td><input type="text" name="razon_social" id="razon_social" required="true"/></td>
                <td><label>Nombre comercial</label></td>
                <td><input type="text" name="nombre_comercial" id="nombre_comercial" required="true"/></td>
            </tr>
            <tr>
                <td><label>Representante legal</label></td>
                <td><input type="text" name="rep_legal" id="rep_legal"/></td>
            </tr>
            <tr>
                <td><label>Documento identidad</label></td>
                <td><input type="number" name="doc_identidad" id="doc_identidad"/></td>
                <td><label>NIT</label></td>
                <td><input type="number" name="nit" id="nit"/></td>
            </tr>
            <tr>
                <td><label>nombre de contacto</label></td>
                <td><input type="text" name="nom_contacto" id="nom_contacto"/></td>
                <td><label>celular contacto</label></td>
                <td><input type="number" name="cel_contacto" id="cel_contacto"/></td>
            </tr>
            <tr>
                <td><label>Departamento</label></td>
                <td><select id="departamento" name="departamento" onchange="showSelect(this.value)">
                        <?php
                        $consulta = "SELECT * FROM departamento";
                        $resultado = mysql_query($consulta);
                        while($fila = mysql_fetch_array($resultado)) {
                            echo "<option value='" . $fila['iddepto'] . "'>" . $fila['depto'] . "</option>";
                        }
                        ?>
                    </select>

                </td>
                <td><label>Ciudad</label></td>
                <td colspan="2"><div id="select_ciudad"></div><input type="text" name="o_ciudad" id="o_ciudad" disabled>
                </td>
            </tr>
            <tr>
                <td><label>Direccion</label></td>
                <td colspan="2"><input type="text" name="direccion" id="direccion" size="70" /></td>
            </tr>
            <tr>
                <td><label>Telefono</label></td>
                <td><input type="text" name="telefono" id="telefono"/></td>
                <td><label>Celular</label></td>
                <td><input type="number" name="celular" id="celular"/></td>
                <td><label>Fax</label></td>
                <td><input type="text" name="fax" id="fax"/></td>
            </tr>
            <tr>
                <td><label>email</label></td>
                <td><input type="text" name="email" id="email"/></td>
                <td><label>Pagina web</label></td>
                <td><input type="text" name="pag_web" id="pag_web"/></td>
            </tr>
            <tr>
                <td><input type="button" value="Guardar" onclick="guardarDatos()"></td>
                <td><input type="reset" value="Borrar"></td>
            </tr>
        </table>
    </div>
</form>

<h2><label>SUSCRIPCION BOLIVIA EN TUS MANOS <input type="checkbox" id="hab_suscripBetm" onchange="habilita_betm()"></label></h2>

<div id="suscripBetm">
    <form method="post" action="#" id="form_betm">
        <table>
            <tr>
                <td><input type="hidden" id="id_empresa" name="id_empresa"><label>Fecha Alta Betm</label></td>
                <td><input type="text" name="betm_alta" id="betm_alta" required="true"/></td>
                <td><label>Fecha Vencimiento</label></td>
                <td><input type="text" name="betm_venc" id="betm_venc" required="true"/></td>
            </tr>
            <tr>
                <td><label>Plan de suscripcion</label></td>
                <td><select id="tipo_plan" name="tipo_plan" onchange="showPlan(this.value)">
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
                    </select></td>
            </tr>
            <tr>
                <td><label>Contado <input type="radio" name="tipo_betm" value="contado"></label></td>
                <td><label>Normal <input type="radio" name="tipo_betm" value="normal"></label></td>
                <td><label>Igual <input type="radio" name="tipo_betm" value="igual"></label></td>
                <td><label>Intercambio <input type="checkbox" id="hab_intercambio" name="hab_intercambio" onchange="habilitarIntercambio()"></label>
                <select id="por_intercambio" name="por_intercambio" onchange="intercambio_betm(this.value)">
                    <option value="0">Seleccione-></option>
                    <option value="30">30%</option>
                    <option value="50">50%</option>
                    <option value="80">80%</option>
                    <option value="100">100%</option>
                </select>
                </td>
            </tr>
            <tr>
                <td><label>Monto:</label> <input type="number" id="monto_betm" name="monto_betm" step="any" required><label>$us</label></td>
                <td>Descuento
                    <select id="descuento_betm" name="descuento_betm" onchange="descontarBetm(this.value)">
                        <option value="0">seleccione-></option>
                        <option value="5">5%</option>
                        <option value="10">10%</option>
                        <option value="15">15%</option>
                    </select>
                </td>
                <td colspan="2">Nro. de Cuotas
                    <select id="cuotas_betm" name="cuotas_betm" onchange="llenar_cuotas_betm(this.value)">
                        <option value="0">Seleccione-></option>
                    </select>
                    <div id="error_cuotabetm">Llenar monto</div>
                </td>
            </tr>
            <tr>
                <td>
                    <label>Descontado:</label> <input type="number" id="descto_betm" name="descto_betm" step="any" readonly><label>$us</label>
                </td>
                <td>
                    <label>Por pagar:</label> <input type="number" id="por_pagar_betm" name="por_pagar_betm" step="any" readonly><label>$us</label>
                </td>
                <td>
                    <label>Intercambio:</label> <input type="number" id="inter_betm" name="inter_betm" step="any" readonly><label>$us</label>
                </td>
            </tr>
        </table>
        <div id="ver_cuotas_betm">
            <table>
                <tr>
                    <td>Cuota 1<input type="text" size="10" id="cuota1_betm" name="cuota1_betm"><input type="number" id="monto1_betm" name="monto1_betm" step="any"></td>
                    <td>Cuota 2<input type="text" size="10" id="cuota2_betm" name="cuota2_betm"><input type="number" id="monto2_betm" name="monto2_betm" step="any"></td>
                    <td>Cuota 3<input type="text" size="10" id="cuota3_betm" name="cuota3_betm"><input type="number" id="monto3_betm" name="monto3_betm" step="any"></td>
                    <td>Cuota 4<input type="text" size="10" id="cuota4_betm" name="cuota4_betm"><input type="number" id="monto4_betm" name="monto4_betm" step="any"></td>
                </tr>
                <tr>
                    <td>Cuota 5<input type="text" size="10" id="cuota5_betm" name="cuota5_betm"><input type="number" id="monto5_betm" name="monto5_betm" step="any"></td>
                    <td>Cuota 6<input type="text" size="10" id="cuota6_betm" name="cuota6_betm"><input type="number" id="monto6_betm" name="monto6_betm" step="any"></td>
                    <td>Cuota 7<input type="text" size="10" id="cuota7_betm" name="cuota7_betm"><input type="number" id="monto7_betm" name="monto7_betm" step="any"></td>
                    <td>Cuota 8<input type="text" size="10" id="cuota8_betm" name="cuota8_betm"><input type="number" id="monto8_betm" name="monto8_betm" step="any"></td>
                </tr>
                <tr>
                    <td>Cuota 9<input type="text" size="10" id="cuota9_betm" name="cuota9_betm"><input type="number" id="monto9_betm" name="monto9_betm" step="any"></td>
                    <td>Cuota 10<input type="text" size="10" id="cuota10_betm" name="cuota10_betm"><input type="number" id="monto10_betm" name="monto10_betm" step="any"></td>
                    <td>Cuota 11<input type="text" size="10" id="cuota11_betm" name="cuota11_betm"><input type="number" id="monto11_betm" name="monto11_betm" step="any"></td>
                    <td>Cuota 12<input type="text" size="10" id="cuota12_betm" name="cuota12_betm"><input type="number" id="monto12_betm" name="monto12_betm" step="any"></td>
                </tr>
            </table>
        </div>
        <table>
            <tr>
                <td><input type="button" value="Guardar" onclick="guardarBetm()"></td>
                <td><input type="reset" value="Borrar"></td>
            </tr>
        </table>
    </form>
</div>

<h2><label>SUSCRIPCION PAGINA WEB <input type="checkbox" id="hab_suscripWeb" onchange="habilita_web()"></label></h2>

<div id="suscripWeb">
    <form method="post" action="#" id="form_web">
        <table>
            <tr>
                <td><input type="hidden" id="id_empresaWeb" name="id_empresaWeb"><label>Fecha Alta Betm</label></td>
                <td><input type="text" name="web_alta" id="web_alta" required="true"/></td>
                <td><label>Fecha Vencimiento</label></td>
                <td><input type="text" name="web_venc" id="web_venc" required="true"/></td>
            </tr>
            <tr>
                <td>Botones:<input type="number" id="num_botones" name="num_botones"></td>
                <td>Monto:<input type="number" id="monto_botones" name="monto_botones" step="any" value="0"></td>
            </tr>
            <tr>
                <td><label>Hosting:<input type="checkbox" id="hosting_web" name="hosting_web" onchange="adiciona_hosting()"></label></td>
                <td>Monto: <input type="number" id="monto_hosting" name="monto_hosting" step="any" value="0"></td>
            </tr>
            <tr>
                <td>Dominio <label>(.com) SI<input type="checkbox" id="dominio_com" name="dominio_com" onchange="adiciona_dominio_com()"></label> o <label>(.com.bo) SI<input type="checkbox" id="dominio_com_bo" name="dominio_com_bo" onchange="adiciona_dominio_com_bo()"></label></td>
                <td>Monto: <input type="number" id="monto_dominio" name="monto_dominio" step="any" value="0"></td>
            </tr>
            <tr>
                <td>Nombre dominio:</td>
                <td colspan="2"><input type="text" size="40" id="nombre_dominio" name="nombre_dominio"></td>
            </tr>
            <tr>
                <td><label>Contado <input type="radio" id="tipo_web" name="tipo_web" value="contado"></label></td>
                <td><label>Igual <input type="radio" id="tipo_web" name="tipo_web" value="igual"></label></td>
                <td><label>Intercambio <input type="checkbox" id="hab_intercambio_web" name="hab_intercambio_web" onchange="habilitarIntercambioWeb()"></label>
                    <select id="por_intercambio_web" name="por_intercambio_web" onchange="intercambio_web(this.value)">
                        <option value="0">Seleccione-></option>
                        <option value="30">30%</option>
                        <option value="50">50%</option>
                        <option value="80">80%</option>
                        <option value="100">100%</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td><label>Monto:</label> <input type="number" id="monto_web" name="monto_web" step="any" required><label>$us</label></td>
                <td>Descuento
                    <select id="descuento_web" name="descuento_web" onchange="descontarWeb(this.value)">
                        <option value="0">seleccione-></option>
                        <option value="5">5%</option>
                        <option value="10">10%</option>
                        <option value="15">15%</option>
                    </select>
                </td>
                <td colspan="2">Nro. de Cuotas
                    <select id="cuotas_web" name="cuotas_web" onchange="llenar_cuotas_web(this.value)">
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
                    <div id="error_cuotaweb">Llenar monto</div>
                </td>
            </tr>
            <tr>
                <td>
                    <label>Descontado:</label> <input type="number" id="descto_web" name="descto_web" step="any" readonly><label>$us</label>
                </td>
                <td>
                    <label>Por pagar:</label> <input type="number" id="por_pagar_web" name="por_pagar_web" step="any" readonly><label>$us</label>
                </td>
                <td>
                    <label>Intercambio:</label> <input type="number" id="inter_web" name="inter_web" step="any" readonly><label>$us</label>
                </td>
            </tr>
        </table>
        <div id="ver_cuotas_web">
            <table>
                <tr>
                    <td>Cuota 1<input type="text" size="10" id="cuota1_web" name="cuota1_web"><input type="number" id="monto1_web" name="monto1_web" step="any"></td>
                    <td>Cuota 2<input type="text" size="10" id="cuota2_web" name="cuota2_web"><input type="number" id="monto2_web" name="monto2_web" step="any"></td>
                    <td>Cuota 3<input type="text" size="10" id="cuota3_web" name="cuota3_web"><input type="number" id="monto3_web" name="monto3_web" step="any"></td>
                    <td>Cuota 4<input type="text" size="10" id="cuota4_web" name="cuota4_web"><input type="number" id="monto4_web" name="monto4_web" step="any"></td>
                </tr>
                <tr>
                    <td>Cuota 5<input type="text" size="10" id="cuota5_web" name="cuota5_web"><input type="number" id="monto5_web" name="monto5_web" step="any"></td>
                    <td>Cuota 6<input type="text" size="10" id="cuota6_web" name="cuota6_web"><input type="number" id="monto6_web" name="monto6_web" step="any"></td>
                    <td>Cuota 7<input type="text" size="10" id="cuota7_web" name="cuota7_web"><input type="number" id="monto7_web" name="monto7_web" step="any"></td>
                    <td>Cuota 8<input type="text" size="10" id="cuota8_web" name="cuota8_web"><input type="number" id="monto8_web" name="monto8_web" step="any"></td>
                </tr>
                <tr>
                    <td>Cuota 9<input type="text" size="10" id="cuota9_web" name="cuota9_web"><input type="number" id="monto9_web" name="monto9_web" step="any"></td>
                    <td>Cuota 10<input type="text" size="10" id="cuota10_web" name="cuota10_web"><input type="number" id="monto10_web" name="monto10_web" step="any"></td>
                    <td>Cuota 11<input type="text" size="10" id="cuota11_web" name="cuota11_web"><input type="number" id="monto11_web" name="monto11_web" step="any"></td>
                    <td>Cuota 12<input type="text" size="10" id="cuota12_web" name="cuota12_web"><input type="number" id="monto12_web" name="monto12_web" step="any"></td>
                </tr>
            </table>
        </div>
        <table>
            <tr>
                <td>Fecha Alta dominio</td>
                <td><input type="text" id="alta_dominio" name="alta_dominio"></td>
            </tr>
            <tr>
                <td>Fecha Alta Hosting</td>
                <td><input type="text" id="alta_hosting" name="alta_hosting"></td>
            </tr>
            <tr>
                <td>Fecha Alta Web</td>
                <td><input type="text" id="alta_web" name="alta_web"></td>
            </tr>
            <tr>
                <td><input type="button" value="Guardar" onclick="guardarWeb()"></td>
                <td><input type="reset" value="Borrar"></td>
            </tr>
        </table>
    </form>
</div>

<h2><label>SUSCRIPCION SPONSOR <input type="checkbox" id="hab_suscripSponsor" onchange="habilita_sponsor()"></label></h2>

<div id="suscripSponsor">
    <form method="post" action="#" id="form_sponsor">
        <table>
            <tr>
                <td><input type="hidden" id="id_empresaSponsor" name="id_empresaSponsor"><label>Fecha Alta Betm</label></td>
                <td><input type="text" name="sponsor_alta" id="sponsor_alta" required="true"/></td>
                <td><label>Fecha Vencimiento</label></td>
                <td><input type="text" name="sponsor_venc" id="sponsor_venc" required="true"/></td>
            </tr>
            <tr>
                <td>Numero de Sponsors:</td>
                <td><input type="number" id="num_sponsors" name="num_sponsors" step="any"></td>
            </tr>
            <tr>
                <td>Paginas seleccionadas</td>
                <td><textarea id="pag_seleccion" name="pag_seleccion" cols="30" rows="2"></textarea></td>
            </tr>
            <tr>
                <td>Fecha alta: <input type="text" id="fec_alta_sponsor" name="fec_alta_sponsor"></td>
                <td>Fecha Vencimiento: <input type="text" id="fec_venc_sponsor" name="fec_venc_sponsor"></td>
            </tr>

            <tr>
                <td><label>Contado <input type="radio" id="tipo_sponsor" name="tipo_sponsor" value="contado"></label></td>
                <td><label>Igual <input type="radio" id="tipo_sponsor" name="tipo_sponsor" value="igual"></label></td>
                <td><label>Intercambio <input type="checkbox" id="hab_intercambio_sponsor" name="hab_intercambio_sponsor" onchange="habilitarIntercambioSponsor()"></label>
                    <select id="por_intercambio_sponsor" name="por_intercambio_sponsor" onchange="intercambio_sponsor(this.value)">
                        <option value="0">Seleccione-></option>
                        <option value="30">30%</option>
                        <option value="50">50%</option>
                        <option value="80">80%</option>
                        <option value="100">100%</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td><label>Monto:</label> <input type="number" id="monto_sponsor" name="monto_sponsor" step="any" required><label>$us</label></td>
                <td>Descuento
                    <select id="descuento_sponsor" name="descuento_sponsor" onchange="descontarSponsor(this.value)">
                        <option value="0">seleccione-></option>
                        <option value="5">5%</option>
                        <option value="10">10%</option>
                        <option value="15">15%</option>
                    </select>
                </td>
                <td colspan="2">Nro. de Cuotas
                    <select id="cuotas_sponsor" name="cuotas_sponsor" onchange="llenar_cuotas_sponsor(this.value)">
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
                    <div id="error_cuotasponsor">Llenar monto</div>
                </td>
            </tr>
            <tr>
                <td>
                    <label>Descontado:</label> <input type="number" id="descto_sponsor" name="descto_sponsor" step="any" readonly><label>$us</label>
                </td>
                <td>
                    <label>Por pagar:</label> <input type="number" id="por_pagar_sponsor" name="por_pagar_sponsor" step="any" readonly><label>$us</label>
                </td>
                <td>
                    <label>Intercambio:</label> <input type="number" id="inter_sponsor" name="inter_sponsor" step="any" readonly><label>$us</label>
                </td>
            </tr>
        </table>
        <div id="ver_cuotas_sponsor">
            <table>
                <tr>
                    <td>Cuota 1<input type="text" size="10" id="cuota1_sponsor" name="cuota1_sponsor"><input type="number" id="monto1_sponsor" name="monto1_sponsor" step="any"></td>
                    <td>Cuota 2<input type="text" size="10" id="cuota2_sponsor" name="cuota2_sponsor"><input type="number" id="monto2_sponsor" name="monto2_sponsor" step="any"></td>
                    <td>Cuota 3<input type="text" size="10" id="cuota3_sponsor" name="cuota3_sponsor"><input type="number" id="monto3_sponsor" name="monto3_sponsor" step="any"></td>
                    <td>Cuota 4<input type="text" size="10" id="cuota4_sponsor" name="cuota4_sponsor"><input type="number" id="monto4_sponsor" name="monto4_sponsor" step="any"></td>
                </tr>
                <tr>
                    <td>Cuota 5<input type="text" size="10" id="cuota5_sponsor" name="cuota5_sponsor"><input type="number" id="monto5_sponsor" name="monto5_sponsor" step="any"></td>
                    <td>Cuota 6<input type="text" size="10" id="cuota6_sponsor" name="cuota6_sponsor"><input type="number" id="monto6_sponsor" name="monto6_sponsor" step="any"></td>
                    <td>Cuota 7<input type="text" size="10" id="cuota7_sponsor" name="cuota7_sponsor"><input type="number" id="monto7_sponsor" name="monto7_sponsor" step="any"></td>
                    <td>Cuota 8<input type="text" size="10" id="cuota8_sponsor" name="cuota8_sponsor"><input type="number" id="monto8_sponsor" name="monto8_sponsor" step="any"></td>
                </tr>
                <tr>
                    <td>Cuota 9<input type="text" size="10" id="cuota9_sponsor" name="cuota9_sponsor"><input type="number" id="monto9_sponsor" name="monto9_sponsor" step="any"></td>
                    <td>Cuota 10<input type="text" size="10" id="cuota10_sponsor" name="cuota10_sponsor"><input type="number" id="monto10_sponsor" name="monto10_sponsor" step="any"></td>
                    <td>Cuota 11<input type="text" size="10" id="cuota11_sponsor" name="cuota11_sponsor"><input type="number" id="monto11_sponsor" name="monto11_sponsor" step="any"></td>
                    <td>Cuota 12<input type="text" size="10" id="cuota12_sponsor" name="cuota12_sponsor"><input type="number" id="monto12_sponsor" name="monto12_sponsor" step="any"></td>
                </tr>
            </table>
        </div>
        <table>
            <tr>
                <td><input type="button" value="Guardar" onclick="guardarSponsor()"></td>
                <td><input type="reset" value="Borrar"></td>
            </tr>
        </table>
    </form>
</div>

<h2><label>SUSCRIPCION PUBLICIDAD <input type="checkbox" id="hab_suscripPublicidad" onchange="habilita_publicidad()"></label></h2>

<div id="suscripPublicidad">
    <form method="post" action="#" id="form_publicidad">
        <table>
            <tr>
                <td><input type="text" id="id_empresaPublicidad" name="id_empresaPublicidad"><label>Fecha Alta</label></td>
                <td><input type="text" name="publicidad_alta" id="publicidad_alta" required="true"/></td>
                <td><label>Fecha Vencimiento</label></td>
                <td><input type="text" name="publicidad_venc" id="publicidad_venc" required="true"/></td>
            </tr>
            <tr>
                <td>Numero de Banners:</td>
                <td><input type="number" id="num_publicidad" name="num_publicidad" step="any"></td>
            </tr>
            <tr>
                <td>Paginas seleccionadas</td>
                <td><textarea id="pag_seleccion_publicidad" name="pag_seleccion_publicidad" cols="30" rows="2"></textarea></td>
                <td>Tamaño: <input type="text" id="tam_banner" name="tam_banner"> Pixeles</td>
            </tr>
            <tr>
                <td>Fecha alta: <input type="text" id="fec_alta_publicidad" name="fec_alta_publicidad"></td>
                <td>Fecha Vencimiento: <input type="text" id="fec_venc_publicidad" name="fec_venc_publicidad"></td>
            </tr>

            <tr>
                <td><label>Contado <input type="radio" id="tipo_publicidad" name="tipo_publicidad" value="contado"></label></td>
                <td><label>Igual <input type="radio" id="tipo_publicidad" name="tipo_publicidad" value="igual"></label></td>
                <td><label>Intercambio <input type="checkbox" id="hab_intercambio_publicidad" name="hab_intercambio_publicidad" onchange="habilitarIntercambioPublicidad()"></label>
                    <select id="por_intercambio_publicidad" name="por_intercambio_publicidad" onchange="intercambio_publicidad(this.value)">
                        <option value="0">Seleccione-></option>
                        <option value="30">30%</option>
                        <option value="50">50%</option>
                        <option value="80">80%</option>
                        <option value="100">100%</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td><label>Monto:</label> <input type="number" id="monto_publicidad" name="monto_publicidad" step="any" required><label>$us</label></td>
                <td>Descuento
                    <select id="descuento_publicidad" name="descuento_publicidad" onchange="descontarPublicidad(this.value)">
                        <option value="0">seleccione-></option>
                        <option value="5">5%</option>
                        <option value="10">10%</option>
                        <option value="15">15%</option>
                    </select>
                </td>
                <td colspan="2">Nro. de Cuotas
                    <select id="cuotas_publicidad" name="cuotas_publicidad" onchange="llenar_cuotas_publicidad(this.value)">
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
                    <div id="error_cuotapublicidad">Llenar monto</div>
                </td>
            </tr>
            <tr>
                <td>
                    <label>Descontado:</label> <input type="number" id="descto_publicidad" name="descto_publicidad" step="any" readonly><label>$us</label>
                </td>
                <td>
                    <label>Por pagar:</label> <input type="number" id="por_pagar_publicidad" name="por_pagar_publicidad" step="any" readonly><label>$us</label>
                </td>
                <td>
                    <label>Intercambio:</label> <input type="number" id="inter_publicidad" name="inter_publicidad" step="any" readonly><label>$us</label>
                </td>
            </tr>
        </table>
        <div id="ver_cuotas_publicidad">
            <table>
                <tr>
                    <td>Cuota 1<input type="text" size="10" id="cuota1_publicidad" name="cuota1_publicidad"><input type="number" id="monto1_publicidad" name="monto1_publicidad" step="any"></td>
                    <td>Cuota 2<input type="text" size="10" id="cuota2_publicidad" name="cuota2_publicidad"><input type="number" id="monto2_publicidad" name="monto2_publicidad" step="any"></td>
                    <td>Cuota 3<input type="text" size="10" id="cuota3_publicidad" name="cuota3_publicidad"><input type="number" id="monto3_publicidad" name="monto3_publicidad" step="any"></td>
                    <td>Cuota 4<input type="text" size="10" id="cuota4_publicidad" name="cuota4_publicidad"><input type="number" id="monto4_publicidad" name="monto4_publicidad" step="any"></td>
                </tr>
                <tr>
                    <td>Cuota 5<input type="text" size="10" id="cuota5_publicidad" name="cuota5_publicidad"><input type="number" id="monto5_publicidad" name="monto5_publicidad" step="any"></td>
                    <td>Cuota 6<input type="text" size="10" id="cuota6_publicidad" name="cuota6_publicidad"><input type="number" id="monto6_publicidad" name="monto6_publicidad" step="any"></td>
                    <td>Cuota 7<input type="text" size="10" id="cuota7_publicidad" name="cuota7_publicidad"><input type="number" id="monto7_publicidad" name="monto7_publicidad" step="any"></td>
                    <td>Cuota 8<input type="text" size="10" id="cuota8_publicidad" name="cuota8_publicidad"><input type="number" id="monto8_publicidad" name="monto8_publicidad" step="any"></td>
                </tr>
                <tr>
                    <td>Cuota 9<input type="text" size="10" id="cuota9_publicidad" name="cuota9_publicidad"><input type="number" id="monto9_publicidad" name="monto9_publicidad" step="any"></td>
                    <td>Cuota 10<input type="text" size="10" id="cuota10_publicidad" name="cuota10_publicidad"><input type="number" id="monto10_publicidad" name="monto10_publicidad" step="any"></td>
                    <td>Cuota 11<input type="text" size="10" id="cuota11_publicidad" name="cuota11_publicidad"><input type="number" id="monto11_publicidad" name="monto11_publicidad" step="any"></td>
                    <td>Cuota 12<input type="text" size="10" id="cuota12_publicidad" name="cuota12_publicidad"><input type="number" id="monto12_publicidad" name="monto12_publicidad" step="any"></td>
                </tr>
            </table>
        </div>
        <table>
            <tr>
                <td><input type="button" value="Guardar" onclick="guardarPublicidad()"></td>
                <td><input type="reset" value="Borrar"></td>
            </tr>
        </table>
    </form>
</div>

<h2>DATOS DE CONTROL</h2>
<div id="datoscontrol">
    <form method="post" id="form_control">
        <table>
            <tr>
                <td><input type="hidden" id="id_empresa_control" name="id_empresa_control">Fecha envio contrato</td>
                <td><input type="text" id="envio_contr" name="envio_contr"></td>
                <td>Fecha suscripcion contrato</td>
                <td><input type="text" id="susc_contr" name="susc_contr"></td>
            </tr>

            <tr>
                <td>Fecha envio convenio</td>
                <td><input type="text" id="envio_convenio" name="envio_convenio"></td>
                <td>Fecha recepcion convenio</td>
                <td><input type="text" id="recep_convenio" name="recep_convenio"></td>
            </tr>
            <tr>
                <td>
                    <input type="button" value="guardar" onclick="guardarControl()">
                    <input type="reset" value="borrar">
                </td>
            </tr>

        </table>
    </form>
</div>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')</script>
<!--script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script-->
<script src="js/jquery-ui.js"></script>
<script src="js/plugins.js"></script>
<script src="js/main.js"></script>
<script src="js/mainWeb.js"></script>
<script src="js/mainSponsor.js"></script>
<script src="js/mainPublicidad.js"></script>

</body>
</html>