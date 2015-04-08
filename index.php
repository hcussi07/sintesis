<?php
session_start();
include_once "configuracion/config.inc.php";
$error="no";
function verificar_login($user,$password,&$result) {
    $sql = "SELECT * FROM usuarios WHERE nombre = '$user' and codigo = '$password'";
    $rec = mysql_query($sql);
    $count = 0;

    while($row = mysql_fetch_object($rec))
    {
        $count++;
        $result = $row;
    }

    if($count == 1)
    {
        return 1;
    }

    else
    {
        return 0;
    }
}

if(!isset($_SESSION['userid']))
{
    if(isset($_POST['login']))
    {
        if(verificar_login($_POST['user'],$_POST['password'],$result) == 1)
        {
            $_SESSION['userid'] = $result->codigo;
            header("location:registrar.php");
        }
        else
        {
            $error = "si";

        }
    }
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="favicon.ico">

        <title>Login Sistema</title>

        <!-- Bootstrap core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="css/signin.css" rel="stylesheet">

    </head>

    <body>

    <div class="container">

        <form action="" method="post" class="form-signin">
            <h2 class="form-signin-heading">Datos de usuario</h2>
            <label for="inputEmail" class="sr-only">Nombre de usuario</label>
            <input type="text" name="user" id="user" class="form-control" placeholder="Nombre de usuario" required autofocus>
            <label for="inputPassword" class="sr-only">Password</label>
            <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>

            <button name="login" class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button>
            <?php if($error=="si"){
                echo '<div class="error">Su usuario es incorrecto, intente nuevamente.</div>';
            }
            ?>
        </form>

    </div> <!-- /container -->

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    </body>
    </html>

<?php
} else {
    header('location: registrar.php');
    echo 'Su usuario ingreso correctamente.';
    echo '<a href="configuracion/logout.php">Logout</a>';
}
?>


