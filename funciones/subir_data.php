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
            eliminar_old();
            header("Location: ../equipos.php");
        }else{
            $equipo_visitante = $_POST['equipo_visitante'];
            $equipo_local = $_POST['equipo_local'];
            $puntos_visitante = $_POST['puntos_visitante'];
            $puntos_local = $_POST['puntos_local'];

            $sql_data = ["partidos",["equipo_local"=>$equipo_local,"equipo_visitante"=>$equipo_visitante,"puntos_local"=>$puntos_local,"puntos_visitante"=>$puntos_visitante]];
            insert($_SESSION['user'],$_SESSION['pass'],$sql_data);
            eliminar_old();
            header("Location: ../resultados.php");
        }  
    }elseif($_POST['Entrar']=='Actualizar'){
        if(isset($_POST['tabla'])){
            $tabla = $_POST['tabla'];
            if($tabla=="equipos"){
                $nom_equipo = $_POST['nom_equipo'];
                $ciudad = $_POST['ciudad'];
                $num_socios = $_POST['num_socios'];
            }elseif($tabla=="partidos"){
                $equipo_visitante = $_POST['equipo_visitante'];
                $equipo_local = $_POST['equipo_local'];
                $puntos_visitante = $_POST['puntos_visitante'];
                $puntos_local = $_POST['puntos_local'];
            }else{
                header("Location: ../inicio.php");
                exit();  
            }
            $old = $_POST['old'];
            echo "<p> Array que hay en el Where: ";
            foreach($old as $dato){
                echo "$dato ";
            }
            echo "</p>";
            if($tabla=="equipos"){
                $sql_data = [$tabla,
                array("nombre"=>$nom_equipo,"ciudad"=>$ciudad,"num_socios"=>$num_socios),
                array("nombre"=>$old[0],"ciudad"=>$old[1],"num_socios"=>$old[2])];
            }elseif($tabla=="partidos"){
                $sql_data = [$tabla,
                array("equipo_local"=>$equipo_local,"equipo_visitante"=>$equipo_visitante,"puntos_local"=>$puntos_local,"puntos_visitante"=>$puntos_visitante),
                array("codigo"=>$old[0])];
            }
            
            //TODO Update
            update($_SESSION['user'],$_SESSION['pass'],$sql_data);
            eliminar_old();
            header("Location: ../equipos.php");
            exit();
        }
    }
?>