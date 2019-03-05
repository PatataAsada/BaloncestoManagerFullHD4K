<?php
require 'funciones\check_conexion.php';
require 'funciones\funciones.php';
if(isset($_POST['tipo'])){
    $tipo = $_POST['tipo'];
    if($tipo == "equipos"){
        $nom_equipo = "";
        $ciudad = "";
        $num_socios = 0;
        $anio = "";

        //SI ES EQUIPO FORMULARIO EQUIPO

        if(isset($_POST['result'])){
            $nom_equipo = $_POST['result'][0];
            $ciudad = $_POST['result'][1];
            $num_socios = (int)$_POST['result'][2];
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
                        echo "<input type='hidden' name='tabla' value='$tipo'/>";
                            if(isset($_POST['result'])){
                                foreach($array as $data){
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
    <?php
    }
    //SI ES RESULTADO
    elseif($tipo == "partidos"){
        $equipo_visitante = "";
        $equipo_local = "";
        $puntos_visitante = "";
        $puntos_local = "";

    if(isset($_POST['result'])){
        $equipo_local = $_POST['result'][1];
        $puntos_local = $_POST['result'][2];
        $equipo_visitante = $_POST['result'][3];
        $puntos_visitante = $_POST['result'][4];
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
            <form action="funciones/subir_data.php" method="POST" id="resultform">
                    <label for="equipo_visitante">Equipo visitante: </label>
                    <?php
                        echo "<select name='equipo_visitante' form='resultform' class='text' value='$equipo_visitante'>";
                        $array_equipos = getAllPrimaryValues($_SESSION['user'],$_SESSION['pass'],"equipos");
                        foreach($array_equipos as $equipo){
                            if($equipo == $equipo_visitante){
                                echo "<option value='$equipo' selected='selected'>$equipo</option>";
                            }else{
                                echo "<option value='$equipo'>$equipo</option>";
                            }
                        }
                        echo "</select>";
                    ?>

                    <label for="puntos_visitante">Puntuación equipo visitante: </label>
                    <?php
                    echo "<input type='number' name='puntos_visitante' value='$puntos_visitante' class='text'/>";
                    ?>

                    <label for="equipo_local">Equipo local: </label>
                    <?php
                        echo "<select name='equipo_local' form='resultform' class='text'>";
                        $array_equipos = getAllPrimaryValues($_SESSION['user'],$_SESSION['pass'],"equipos");
                        foreach($array_equipos as $equipo){
                            if($equipo == $equipo_local){
                                echo "<option value='$equipo' selected='selected'>$equipo</option>";
                            }else{
                                echo "<option value='$equipo'>$equipo</option>";
                            }
                        }
                        echo "</select>";
                    ?>

                    <label for="puntos_local">Puntuación equipo local: </label>
                    <?php
                        echo "<input type='number' name='puntos_local' class='text' value='$puntos_local'/>";
                        echo "<input type='hidden' name='tabla' value='$tipo'/>";

                        if(isset($_POST['result'])){
                            foreach($array as $data){
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
    <?php
    }
    else{
        header("Location: ./inicio.php");
    }
}else{
    header("Location: ./inicio.php");
}
?>