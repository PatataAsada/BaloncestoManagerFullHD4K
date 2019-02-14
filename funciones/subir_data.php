<?php
    require 'check_conexion.php';
    require 'funciones.php';
    //Comprueba que sea crear, en caso contrario hace update.
    if($_POST['Entrar']=="Crear"){
        if(isset($_POST['nom_equipo'])&&isset($_POST['ciudad'])&&isset($_POST['num_socios'])){
            $nom_equipo = $_POST['nom_equipo'];
            $ciudad = $_POST['ciudad'];
            $num_socios = $_POST['num_socios'];

            $sql_data = ["equipos",["nombre"=>$nom_equipo,"ciudad"=>$ciudad,"num_socios"=>$num_socios]];
            insert($_SESSION['user'],$_SESSION['pass'],$sql_data);
            unset($_POST['nom_equipo']);
            unset($_POST['ciudad']);
            unset($_POST['num_socios']);
            header("Location: ../equipos.php");
        }elseif (isset($_POST['equipo_visitante'])&&isset($_POST['equipo_local'])&&isset($_POST['puntos_visitante'])&&isset($_POST['puntos_local'])) {
            $equipo_visitante = $_POST['equipo_visitante'];
            $equipo_local = $_POST['equipo_local'];
            $puntos_visitante = $_POST['puntos_visitante'];
            $puntos_local = $_POST['puntos_local'];

            $sql_data = ["partidos",["equipo_local"=>$equipo_local,"equipo_visitante"=>$equipo_visitante,"puntos_local"=>$puntos_local,"puntos_visitante"=>$puntos_visitante]];
            insert($_SESSION['user'],$_SESSION['pass'],$sql_data);
            unset($_POST['equipo_visitante']);
            unset($_POST['equipo_local']);
            unset($_POST['puntos_visitante']);
            unset($_POST['puntos_local']);
            header("Location: ../resultados.php");
        }else{
            header("Location: ../inicio.php");
        }  
    }else{
        header("Location: ../inicio.php");
    }
?>