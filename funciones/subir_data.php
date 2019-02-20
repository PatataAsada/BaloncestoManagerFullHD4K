<?php
    require 'check_conexion.php';
    require 'funciones.php';
    //Comprueba que sea crear, en caso contrario hace update.
    if($_POST['Entrar']=="Crear"){
        if(isset($_POST['nom_equipo'])){
            $nom_equipo = $_POST['nom_equipo'];
            $ciudad = $_POST['ciudad'];
            $num_socios = $_POST['num_socios'];

            $sql_data = ["equipos",["nombre"=>$nom_equipo,"ciudad"=>$ciudad,"num_socios"=>$num_socios]];
            insert($_SESSION['user'],$_SESSION['pass'],$sql_data);
            unset_things("equipos");
            header("Location: ../equipos.php");
        }else{
            $equipo_visitante = $_POST['equipo_visitante'];
            $equipo_local = $_POST['equipo_local'];
            $puntos_visitante = $_POST['puntos_visitante'];
            $puntos_local = $_POST['puntos_local'];

            $sql_data = ["partidos",["equipo_local"=>$equipo_local,"equipo_visitante"=>$equipo_visitante,"puntos_local"=>$puntos_local,"puntos_visitante"=>$puntos_visitante]];
            insert($_SESSION['user'],$_SESSION['pass'],$sql_data);
            unset_things("partidos");
            header("Location: ../resultados.php");
        }  
    }elseif($_POST['Entrar']=='Actualizar'){
        if(isset($_POST['nom_equipo'])){
            $nom_equipo = $_POST['nom_equipo'];
            $ciudad = $_POST['ciudad'];
            $num_socios = $_POST['num_socios'];

            $sql_data = ["equipos",["nombre"=>$nom_equipo,"ciudad"=>$ciudad,"num_socios"=>$num_socios]];
            //TODO Update
            unset_things("equipos");
            header("Location: ../equipos.php");
        }else{
            $equipo_visitante = $_POST['equipo_visitante'];
            $equipo_local = $_POST['equipo_local'];
            $puntos_visitante = $_POST['puntos_visitante'];
            $puntos_local = $_POST['puntos_local'];

            $sql_data = ["partidos",["equipo_local"=>$equipo_local,"equipo_visitante"=>$equipo_visitante,"puntos_local"=>$puntos_local,"puntos_visitante"=>$puntos_visitante]];
            //TODO Update
            unset_things("partidos");
            header("Location: ../resultados.php");
        }
        //header("Location: ../inicio.php");
    }

    function unset_things($tabla){
        if($tabla == "equipos"){
            unset($_POST['nom_equipo']);
            unset($_POST['ciudad']);
            unset($_POST['num_socios']);
        }else{
            unset($_POST['equipo_visitante']);
            unset($_POST['equipo_local']);
            unset($_POST['puntos_visitante']);
            unset($_POST['puntos_local']);
        }
    }
?>