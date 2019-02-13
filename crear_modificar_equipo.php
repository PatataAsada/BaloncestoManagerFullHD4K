<?php
/* comprobar que existe sesion.*/
require 'funciones\check_conexion.php';
$nom_equipo = "";
$ciudad = "";
$num_socios = 0;
$anio = "";
/*
TODO si es modificar un equipo rellenar los campos del formulario con los datos actuales del equipo.
*/
?>
<!DOCTYPE html>
<!-- TODO pasar a php para mostrar errores -->
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
        <a href="equipos.php" class="button" id="button">Volver</a>
    </div>
    <div class="formulario">
        <form action="funciones/conexion.php" method="POST" >
                <label for="nom_equipo">Nombre de equipo: </label>
                <?php
                echo "<input type='text' name='nom_equipo' value='$nom_equipo' class='text'/>";
                ?>
                
                <label for="ciudad">Ciudad: </label>
                <?php
                    echo "<input type='text' name='ciudad' class='text' value='$ciudad'/>"
                ?>

                <label for="num_socios">Número de socios: </label>
                <?php
                echo "<input type='number' name='num_socios' value='$num_socios' class='text'/>";
                ?>
                
                <label for="anio">Año de creación del equipo: </label>
                <?php
                    echo "<input type='date' name='anio' class='text' value='$anio'/>"
                ?>
                
                <input type="submit" name="Entrar" class="button"  value="Entrar"/>
        </form>
    </div>
</body>