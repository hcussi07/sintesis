<?php
include_once "config.inc.php";
$idcliente = $_POST['idcliente'];

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

function decimal($num){
    return number_format($num, 2, ",", ".");
}
?>

<thead>
<tr>
    <th colspan="6" class="text-center">PLAN DE CUENTAS</th>
    <th colspan="3" class="text-center">FACTURACION</th>
    <th colspan="5" class="text-center">DEPOSITO</th>
</tr>
<tr>
    <th>Cuota</th>
    <th>Fecha</th>
    <th>Detalle</th>
    <th>Parcial</th>
    <th>Total $us</th>
    <th>Total Bs</th>

    <th>Fecha</th>
    <th>No Factura</th>
    <th>Monto</th>

    <th>Fecha</th>
    <th>Recibido</th>
    <th>Forma de pago</th>
    <th>Cancelado</th>
    <th>Observaciones</th>

</tr>

</thead>
<tbody>
<?php
$mayor = 0;$suma = 0;$sus=0;$subs = 0;$sumafactura=0;
if($row1['ncuotas']>$mayor){
    $mayor=$row1['ncuotas'];
}
if($row2['tcotasw']>$mayor){
    $mayor=$row2['tcotasw'];
}
if($row3['nscuotas']>$mayor){
    $mayor=$row3['nscuotas'];
}
if($row4['ncotasp']>$mayor){
    $mayor=$row4['ncotasp'];
}
for($i = 1; $i <= $mayor; $i++){
    $row6 = mysql_fetch_array($result6);
    $fec1 = explode("@",$row1['cuota'.$i]);
    $fec2 = explode("@",$row2['wcota'.$i]);
    $fec3 = explode("@",$row3['scota'.$i]);
    $fec4 = explode("@",$row4['pcota'.$i]);
    ?>
    <tr>
        <td><?=$i?></td>
        <td>
            <?php
            if($i<=$row1['ncuotas']){
                echo $fec1[0]."<br>";
            }
            if($i<=$row2['tcotasw']){
                echo $fec2[0]."<br>";
            }
            if($i<=$row3['nscuotas']){
                echo $fec3[0]."<br>";
            }
            if($i<=$row4['ncotasp']){
                echo $fec4[0];
            }
            ?>
        </td>
        <td>
            <?php
            if($i<=$row1['ncuotas']){
                echo $row1['tiposuscribe']."<br>";
            }
            if($i<=$row2['tcotasw']){
                echo $row2['tsuscripcion']."<br>";
            }
            if($i<=$row3['nscuotas']){
                echo $row3['tsuscribe']."<br>";
            }
            if($i<=$row4['ncotasp']){
                echo $row4['suscripcion'];
            }
            ?>
        </td>
        <td class="text-right"><?php
            if($i<=$row1['ncuotas']){
                $suma=$suma+$fec1[1];
                echo decimal($fec1[1])."<br>";
            }
            if($i<=$row2['tcotasw']){
                $suma=$suma+$fec2[1];
                echo decimal($fec2[1])."<br>";
            }
            if($i<=$row3['nscuotas']){
                $suma=$suma+$fec3[1];
                echo decimal($fec3[1])."<br>";
            }
            if($i<=$row4['ncotasp']){
                $suma=$suma+$fec4[1];
                echo decimal($fec4[1]);
            }
            ?></td>
        <td class="text-right">
            <?php
            $sumaparcial = $fec1[1]+$fec2[1]+$fec3[1]+$fec4[1];
            $sus=$sus+$sumaparcial;
            echo decimal($sumaparcial);
            ?>
        </td>
        <td class="text-right">
            <?php
            $parcialbs = $sumaparcial*$row5['tzcambio'];
            $subs = $subs + $parcialbs;
            echo decimal($parcialbs);
            ?>
        </td>
        <td><?=$row6['fecha_factura'];?></td>
        <td><?=$row6['nro_factura'];?></td>
        <td class="text-right">
            <?php
            $sumafactura = $sumafactura + $row6['monto_factura'];
                echo decimal($row6['monto_factura']);
            ?></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>

    </tr>
<?php
}
?>


</tbody>
<tfoot>
<tr>
    <td colspan="3" class="text-center"><label>TOTALES</label></td>
    <td class="text-right"><?=decimal($suma)?></td>
    <td class="text-right"><?=decimal($sus)?></td>
    <td class="text-right"><?=decimal($subs)?></td>
    <td></td>
    <td></td>
    <td class="text-right"><?=decimal($sumafactura)?></td>
    <td></td>
    <td></td>
    <td></td>
</tr>
</tfoot>
