<?php
/*
TODO comprobar que existe sesion.
TODO si es modificar un equipo rellenar los campos del formulario con los datos actuales del resultado.
*/
$equipo_visitante = "";
$equipo_local = "";
$puntos_visitante = "";
$puntos_local = "";
?>
<!DOCTYPE html>
<!-- TODO pasar a php para mostrar errores -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>login</title>
    <link rel="stylesheet" type="text/css" href="css\estilos.css">
</head>
<body>
    <div class="title">
        <h1>LIGA DE BALONCESTO</h1>
    </div>
    <div class="formulario">
        <form action="funciones/conexion.php" method="POST" >
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
                    echo "<input type='number' name='puntos_local' class='text' value='$puntos_local'/>"
                ?>

                <div class="atras">
                    <a href="resultados.php" class="button">Volver</a>
                </div>
                <input type="submit" name="Entrar" class="button" value="Entrar"/>
        </form>
    </div>
</body>