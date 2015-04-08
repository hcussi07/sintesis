<?php
/**
 * Created by PhpStorm.
 * User: Hector
 * Date: 28/03/2015
 * Time: 9:51
 */

include_once "config.inc.php";

echo '<select name="ciudad" id="ciudad" onchange="showCiudad(this.value)" class="form-control">';
$consulta = "SELECT * FROM ciudad;";
$resultado = mysql_query($consulta);
while($fila = mysql_fetch_array($resultado)){
    if($fila['iddepto'] == $_GET['iddepto']){
        echo "<option value='".$fila['idciudad']."'>".$fila['nom_ciudad']."</option>";
    }
}
echo "<option value='otra_ciudad'>otra ciudad...</option>";
echo '</select>';
?>