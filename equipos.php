<?php
/*
comprobar que existe sesion.
*/
require 'funciones/funciones.php';
require 'funciones/check_conexion.php';
$header = ["nombre","ciudad","socios","año","actualizar","eliminar"];
$sql_data = ["equipos","*",""];
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
    <div class="anadir">
    <a href="crear_modificar_equipo.php" class="button" id="button">Crear equipo</a>
    </div>
    <div class="volver">
        <a href="inicio.php" class="button" id="button">Volver</a>
    </div>
    <div class="tabla">
        <?php
        //TODO pintar tabla
        paintTablesFromQuery($_SESSION['user'],$_SESSION['pass'],$sql_data,"equipos",$header,false);
        ?>
    </div>
</body>