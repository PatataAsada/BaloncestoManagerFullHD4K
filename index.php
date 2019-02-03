<?php
//TODO comprobar en php si hay intento de inicio de sesion y mostrarlo aqui.
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
    <div class="login">
        <form action="conexion.php" method="POST" >
                <label for="username">Nombre de usuario: </label>
                <input type="text" name="username" class="text"/>
                
                <label for="pass">Contraseña: </label>
                <input type="text" name="pass" class="text"/>
                
                <input type="submit" name="Entrar" class="button"/>
        </form>
    </div>
</body>