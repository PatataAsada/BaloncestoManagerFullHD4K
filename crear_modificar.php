<?php
require 'funciones\check_conexion.php';
if(isset($_POST['tipo'])){
    $tipo = $_POST['tipo'];
    if($tipo == "equipo"){
        $nom_equipo = "";
    $ciudad = "";
    $num_socios = 0;
    $anio = "";

    //SI ES EQUIPO FORMULARIO EQUIPO

    if(isset($_POST['Opcion'])){
        $nom_equipo = $_POST['result'][1];
        $ciudad = $_POST['result'][2];
        $num_socios = $_POST['result'][3];
        $array = [$nom_equipo,$ciudad,$num_socios];
    }
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
        <div class="volver">
            <a href="equipos.php" class="button" id="button">Volver</a>
        </div>
        <div class="formulario">
            <form action="funciones/subir_data.php" method="POST" >
                    <label for="nom_equipo">Nombre de equipo: </label>
                    <?php
                    echo "<input type='text' name='nom_equipo' value='$nom_equipo' class='text'/>";
                    ?>

                    <label for="ciudad">Ciudad: </label>
                    <?php
                        echo "<input type='text' name='ciudad' class='text' value='$ciudad'/>"
                    ?>

                    <label for="num_socios">Número de socios: </label>
                    <?php
                    echo "<input type='number' name='num_socios' value='$num_socios' class='text'/>";

                        if(isset($_GET['nom_equipo'])){
                            echo "<input type='hidden' name='old' value='$array'>";
                            echo '<input type="submit" name="Entrar" class="button"  value="Actualizar"/>';
                        }else{
                            echo '<input type="submit" name="Entrar" class="button"  value="Crear"/>';
                        }
                    ?>
            </form>
        </div>
    </body>
    <?php
    }
    //SI ES RESULTADO
    elseif($tipo == "resultado"){
        $equipo_visitante = "";
    $equipo_local = "";
    $puntos_visitante = "";
    $puntos_local = "";

    if(isset($_SESSION['resultado'])){
        $equipo_local = $_SESSION['resultado'][0];
        $puntos_local = $_SESSION['resultado'][1];
        $equipo_visitante = $_SESSION['resultado'][2];
        $puntos_visitante = $_SESSION['resultado'][3];
        $array = [$equipo_local,$puntos_local,$equipo_visitante,$puntos_visitante];
    }
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
        <div class="volver">
            <a href="resultados.php" class="button" id="button">Volver</a>
        </div>
        <div class="formulario">
            <form action="funciones/subir_data.php" method="POST" >
                    <label for="equipo_visitante">Equipo visitante: </label>
                    <?php
                    echo "<input type='text' name='equipo_visitante' value='$equipo_visitante' class='text'/>";
                    ?>

                    <label for="puntos_visitante">Puntuación equipo visitante: </label>
                    <?php
                    echo "<input type='number' name='puntos_visitante' value='$puntos_visitante' class='text'/>";
                    ?>

                    <label for="equipo_local">Equipo local: </label>
                    <?php
                        echo "<input type='text' name='equipo_local' class='text' value='$equipo_local'/>"
                    ?>

                    <label for="puntos_local">Puntuación equipo local: </label>
                    <?php
                        echo "<input type='number' name='puntos_local' class='text' value='$puntos_local'/>";
                
                        if(isset($_GET['equipo_local'])){
                            echo "<input type='hidden' name='old' value='$array'>";
                            echo '<input type="submit" name="Entrar" class="button"  value="Actualizar"/>';
                        }else{
                            echo '<input type="submit" name="Entrar" class="button"  value="Crear"/>';
                        }
                    ?>
            </form>
        </div>
    </body>
    <?php
    }
    else{
        header("Location: ./inicio.php");
    }
}else{
    header("Location: ./inicio.php");
}
?>