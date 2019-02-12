<?php
//Comprueba que existe la sesion antes de hacer nada.
if(!isset($_SESSION)){
    header("Location: index.php");
}
$nom_liga = "";
$anno_liga_inicio = "";
$anno_liga_fin = "";
$liga_desc = "";
//TODO capturar datos de antigua liga en los valores de arriba
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
    <div class="formulario">
        <form action="funciones/subir_liga.php" method="POST" >
                <label for="username">Nombre de liga: </label>
                <?php
                echo "<input type='text' name='nom_liga' value='$nom_liga' class='text'/>";
                ?>
                
                <label for="pass">Año de inicio: </label>
                <?php
                    echo "<input type='date' name='anno_liga_inicio' class='text' value='$anno_liga_inicio'/>"
                ?>
                <label for="pass">Año de fin: </label>
                <?php
                    echo "<input type='date' name='anno_liga_fin' class='text' value='$anno_liga_inicio'/>"
                ?>
                <label for="pass">descripción: </label>
                <?php
                    echo "<textarea name='liga_desc' class='text' value='$anno_liga_inicio'></textarea>";
                ?>
                <div class="atras2">
                    <a href="inicio.php" class="button">Volver</a>
                </div>
                <div class="submit">
                    <input type="submit" name="Entrar" class="button" value="Guardar"/>
                </div>
        </form>
    </div>
    
</body>