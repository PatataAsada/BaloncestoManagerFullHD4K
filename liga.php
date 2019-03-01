<?php
//Comprueba que existe la sesion antes de hacer nada.
require 'funciones\check_conexion.php';
require 'funciones/funciones.php';
$nom_liga = "";
$anno_liga_inicio = "";
$anno_liga_fin = "";
$liga_desc = "";
$existo = False;
$get_liga = getLiga($_SESSION['user'],$_SESSION['pass']);
if($get_liga!=-1){
    $nom_liga = $get_liga['nombre'];
    $anno_liga_inicio = date('Y-m-d',strtotime($get_liga['anio_inicio']));
    $anno_liga_fin = date('Y-m-d',strtotime($get_liga['anio_fin']));
    $liga_desc = $get_liga['descripcion'];
    $existo = True;
}
//TODO capturar datos de antigua liga en los valores de arriba
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
                    echo "<input type='date' name='anno_liga_fin' class='text' value='$anno_liga_fin'/>"
                ?>
                <label for="pass">descripción: </label>
                <?php
                    echo "<textarea name='liga_desc' class='text'>$liga_desc</textarea>";
                ?>
                <a href="inicio.php" class="button" id="atras2">Volver</a>
                <?php 
                    if($existo){
                        foreach($get_liga as $data){
                            echo "<input type='hidden' name='old[]' value='$data'/>";
                        }
                        echo '<input type="submit" name="Entrar" class="button"  value="Actualizar"/>';
                    }else{
                        echo '<input type="submit" name="Entrar" class="button"  value="Crear"/>';
                    }
                ?>
        </form>
    </div>
    
</body>