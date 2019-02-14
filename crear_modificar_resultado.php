<?php
/*comprobar que existe sesion.*/
require 'funciones\check_conexion.php';
/*
TODO si es modificar un equipo rellenar los campos del formulario con los datos actuales del resultado.
*/
$equipo_visitante = "";
$equipo_local = "";
$puntos_visitante = "";
$puntos_local = "";

if(isset($_GET['equipo_local'])){
    $equipo_local = $_GET['equipo_local'];
    $puntos_local = $_GET['puntos_local'];
    $equipo_visitante = $_GET['equipo_visitante'];
    $puntos_visitante = $_GET['puntos_visitante'];
    $array = [$equipo_local,$puntos_local,$equipo_visitante,$puntos_visitante];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Liga baloncesto</title>
    <link rel="stylesheet" type="text/css" href="css\estilos.css">
</head>
<body>
    <div class="title">
        <h1>LIGA DE BALONCESTO</h1>
    </div>
    <div class="volver">
        <a href="resultados.php" class="button" id="button">Volver</a>
    </div>
    <div class="formulario">
        <form action="funciones/subir_data.php" method="POST" >
                <label for="equipo_visitante">Equipo visitante: </label>
                <?php
                echo "<input type='text' name='equipo_visitante' value='$equipo_visitante' class='text'/>";
                ?>
                
                <label for="puntos_visitante">Puntuación equipo visitante: </label>
                <?php
                echo "<input type='number' name='puntos_visitante' value='$puntos_visitante' class='text'/>";
                ?>
                
                <label for="equipo_local">Equipo local: </label>
                <?php
                    echo "<input type='text' name='equipo_local' class='text' value='$equipo_local'/>"
                ?>

                <label for="puntos_local">Puntuación equipo local: </label>
                <?php
                    echo "<input type='number' name='puntos_local' class='text' value='$puntos_local'/>";
                
                    if(isset($_GET['equipo_local'])){
                        echo "<input type='hidden' name='old' value='$array'>";
                        echo '<input type="submit" name="Entrar" class="button"  value="Actualizar"/>';
                    }else{
                        echo '<input type="submit" name="Entrar" class="button"  value="Crear"/>';
                    }
                ?>
        </form>
    </div>
</body>