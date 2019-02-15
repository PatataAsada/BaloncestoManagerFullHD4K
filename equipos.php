<?php
/*
comprobar que existe sesion.
*/
require 'funciones/funciones.php';
require 'funciones/check_conexion.php';
$header = ["nombre","ciudad","socios","año","actualizar","eliminar"];
$sql_data = ["equipos",['nombre','ciudad','num_socios','anio'],""];
eliminar_old();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Liga baloncesto</title>
    <link rel="stylesheet" type="text/css" href="css\estilos.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
</head>
<body>
    <div class="title">
        <h1>LIGA DE BALONCESTO</h1>
    </div>
    <div class="botones">
        <div class="anadir">
            <a href="crear_modificar_equipo.php" class="button" id="button">Crear equipo</a>
        </div>
        <div class="volver">
            <a href="inicio.php" class="button" id="button">Volver</a>
        </div>
    </div>
    <div class="tabla">
        <?php
        //pintar tabla
        paintTablesFromQuery($_SESSION['user'],$_SESSION['pass'],$sql_data,"equipos",$header,false);
        ?>
    </div>
</body>