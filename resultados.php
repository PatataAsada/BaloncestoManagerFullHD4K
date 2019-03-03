<?php
//comprobar que existe sesion.
require 'funciones\check_conexion.php';
require 'funciones/funciones.php';
$header = ["codigo","local","puntos local","visitante", "puntos visitante","editar","eliminar"];
$sql_data = ["partidos",["codigo","equipo_local","puntos_local","equipo_visitante","puntos_visitante"],""];
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
        <form action="crear_modificar.php" method="POST">
                <button name="tipo" value="partidos"class="button" id="button">Crear resultado</button>
                
            </form>
        </div>
        <div class="volver">
            <a href="inicio.php" class="button" id="button">Volver</a>
        </div>
    </div>
    <div class="tabla">
    <?php
    paintTablesFromQuery($_SESSION['user'],$_SESSION['pass'],$sql_data,"resultados",$header,false);
    ?>
    </div>
    
</body>