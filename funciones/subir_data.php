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
            header("Location: ../equipos.php");
        }else{
            header("Location: ../resultados.php");
        }   
    }else{
        header("Location: ../inicio.php");
    }
?>