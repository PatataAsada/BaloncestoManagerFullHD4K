<?php
/*
comprobar que existe sesion.
*/
require 'funciones\check_conexion.php';
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
    <div class="anadirResult">
    </div>
    <div class="tabla">
    <?php
//TODO mostrar tabla con resultados.

    ?>
    </div>
    <div class="anadirEquipo">
    <a href="crear_modificar_resultado.php" class="button" id="button">Crear resultado</a>
    </div>
    <div class="volver">
        <a href="inicio.php" class="button" id="button">Volver</a>
    </div>
</body>