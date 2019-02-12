<?php
//TODO comprobar en php si hay intento de inicio de sesion y mostrarlo aqui.
require 'funciones/funciones.php';
$err = false;
if($_POST){
    $err = $_POST['error'];
    unset($_POST['error']);
}
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
    <div class="login">
        <form action="funciones/conexion.php" method="POST" >
                <label for="username">Nombre de usuario: </label>
                <input type="text" name="username" class="text"/>
                
                <label for="pass">Contraseña: </label>
                <input type="password" name="pass" class="text"/>
                
                <input type="submit" name="Entrar" class="button" value="Entrar"/>
        </form>
    </div>
    <?php
    if($err){
        post_error("Usuario y/o contraseña incorrectas.");
    }
    ?>
</body>