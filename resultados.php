<?php
//comprobar que existe sesion.
require 'funciones\check_conexion.php';
require 'funciones/funciones.php';
$header = ["local","visitante","puntos local", "puntos visitante"];
$sql_data = ["partidos","equipo_local,equipo_visitante,puntos_local,puntos_visitante",""]
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
    <div class="botones">
        <div class="anadir">
            <a href="crear_modificar_resultado.php" class="button" id="button">Crear resultado</a>
        </div>
        <div class="volver">
            <a href="inicio.php" class="button" id="button">Volver</a>
        </div>
    </div>
    <div class="tabla">
    <?php
    //TODO mostrar tabla con resultados.
    paintTablesFromQuery($_SESSION['user'],$_SESSION['pass'],$sql_data,"resultados",$header,false);
    ?>
    </div>
    
</body>