<?php
/*
comprobar que existe sesion.
*/
if(!isset($_SESSION)){
    header("Location: ./index.php");
}
?>
<!-- 
TODO html
TODO css para inicio
-->
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
        <a href="funciones/desconectar.php" class="disconnect">Desconectar</a>
    </div>
    <div class="menu">
        <a href="liga.php" class="menu"><h1>LIGA</h1><a>
    </div>
    <div class="menu">
        <a href="equipos.php" class="menu"><h1>EQUIPOS</h1></a>
    </div>
    <div class="menu2">
        <a href="resultados.php" class="menu"><h1>RESULTADOS</h1></a>
    </div>
</body>