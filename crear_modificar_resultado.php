<?php
/*
TODO comprobar que existe sesion.
TODO si es modificar un equipo rellenar los campos del formulario con los datos actuales del resultado.
*/
$nom_liga = "";
$anno_liga_inicio = "";
$anno_liga_fin = "";
$liga_desc = "";
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
        <form action="funciones/conexion.php" method="POST" >
                <label for="username">Nombre de usuario: </label>
                <?php
                echo "<input type='text' name='username' value='$nom_liga' class='text'/>";
                ?>
                
                <label for="pass">Contraseña: </label>
                <?php
                    echo "<input type='text' name='' class='text'/>"
                ?>
                
                <input type="submit" name="Entrar" class="button" value="Entrar"/>
        </form>
    </div>
    <?php
    if($err){
        post_error("Usuario y/o contraseña incorrectas.");
    }
    ?>
</body>