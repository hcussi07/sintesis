<?php
require_once 'config.inc.php';
$idcliente = $_POST['idcliente'];
$query = "SELECT * FROM clientes";
$result = mysql_query($query);
?>


<table class="table table-striped table-hover" >
<thead>
<th>Nº</th>
<th>FECHA INICIO</th>
<th>FECHA FIN</th>
<th>RAZON SOCIAL</th>
<th>EMPRESA</th>
<th>REP. LEGAL</th>
<th>BETM</th>
<th>WEB</th>
<th>SPO</th>
<th>PUBL</th>
<th>INT</th>
<th>DETALLE</th>
<th>EDITAR</th>
<th>ELIMINAR</th>
</thead>
<tbody>
<?php
$i=0;
while($row = mysql_fetch_array($result)){
    $i++;
    $query1 = "SELECT * FROM susbolivia WHERE codref = ".$row['cod'] ." LIMIT 0,1";
    $result1 = mysql_query($query1);
    $row1 = mysql_fetch_array($result1);

    $query2 = "SELECT * FROM web WHERE codref = ".$row['cod'] ." LIMIT 0,1";
    $result2 = mysql_query($query2);
    $row2 = mysql_fetch_array($result2);

    $query3 = "SELECT * FROM sponsor WHERE codref = ".$row['cod'] ." LIMIT 0,1";
    $result3 = mysql_query($query3);
    $row3 = mysql_fetch_array($result3);

    $query4 = "SELECT * FROM publicidad WHERE codref = ".$row['cod'] ." LIMIT 0,1";
    $result4 = mysql_query($query4);
    $row4 = mysql_fetch_array($result4);
    ?>
    <tr>
        <td><?=$row['cod']?></td>
        <td><?=$row['fechar']?></td>
        <td><?=$row['fechafin']?></td>
        <td><?=$row['razons']?></td>
        <td><?=$row['ncempresa']?></td>
        <td><?=$row['rlegal']?></td>

        <?php
        if($row1 !=null){?>
            <td><img src='img/icon_check.png' width = '15px'></td>
        <?php
        }else{?>
            <td><img src='img/icon_cancel2.png' width = '15px'></td>
        <?php
        }
        if($row2 !=null){?>
            <td><img src='img/icon_check.png' width = '15px'></td>
        <?php
        }else{?>
            <td><img src='img/icon_cancel2.png' width = '15px'></td>
        <?php
        }
        if($row3 !=null){?>
            <td><img src='img/icon_check.png' width = '15px'></td>
        <?php
        }else{?>
            <td><img src='img/icon_cancel2.png' width = '15px'></td>
        <?php
        }
        if($row4 !=null){?>
            <td><img src='img/icon_check.png' width = '15px'></td>
        <?php
        }else{?>
            <td><img src='img/icon_cancel2.png' width = '15px'></td>
        <?php
        }
        if($row1['intercambio'] == "si" ||$row2['intercambio'] == "si" || $row3['intercambio'] == "si" ||$row4['intercambio'] == "si"){?>
            <td><img src='img/icon_check.png' width = '15px'></td>
        <?php
        }else{?>
            <td><img src='img/icon_cancel2.png' width = '15px'></td>
        <?php
        }
        ?>

        <td><a href="detalle_cliente.php?idcliente=<?=$row["cod"]?>" class='btn btn-info'>Ver</a></td>
        <td><a href="" class="btn btn-default"><img src='img/icon_editar.png' width = '20px'></a></td>
        <td><a class="btn btn-default btn_elimina" id="btn_elimina" onclick="elimina_cliente(<?=$row["cod"]?>)"><img src='img/icon_uncheck.png' width = '20px'></a></td>
    </tr>

<?php
}
?>
</tbody>
</table>
