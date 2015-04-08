<?php
session_start();
include_once "configuracion/config.inc.php";
$query = "SELECT * FROM clientes";
$result = mysql_query($query);
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

    <title>Listado de Clientes</title>

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

            <!-- INICIO FORMULARIO PARA CREAR -->
            <table class="table table-striped table-hover">
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
                <?php
                while($row = mysql_fetch_array($result)){
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
                        ?>
                        <td><img src='img/icon_help.png' width = '25px'></td>
                        <td><a href="detalle_cliente.php?idcliente=<?=$row["cod"]?>" class='btn btn-info'>Ver</a></td>
                        <td><a href=""><img src='img/icon_editar.png' width = '25px'></a></td>
                        <td><a href=""><img src='img/icon_uncheck.png' width = '20px'></a></td>
                    </tr>
                <?php
                }
                ?>
            </table>
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
