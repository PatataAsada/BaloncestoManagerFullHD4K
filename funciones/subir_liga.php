<?php
require './check_conexion.php';
require './funciones.php';

if($_POST){
    if($_POST['Entrar']=='Crear'){
        $nom_liga = $_POST['nom_liga'];
        $anno_liga_inicio = $_POST['anno_liga_inicio'];
        $anno_liga_fin = $_POST['anno_liga_fin'];
        $liga_desc = $_POST['liga_desc'];

        $tabla = "liga";
        $sql = [$tabla,
        ["nombre"=>$nom_liga,"anio_inicio"=>$anno_liga_inicio,"anio_fin"=>$anno_liga_fin,"descripcion"=>$liga_desc]];
        insert($_SESSION['user'],$_SESSION['pass'],$sql);
    }
    elseif($_POST['Entrar']=='Actualizar'){
        $nom_liga = $_POST['nom_liga'];
        $anno_liga_inicio = $_POST['anno_liga_inicio'];
        $anno_liga_fin = $_POST['anno_liga_fin'];
        $liga_desc = $_POST['liga_desc'];
        $old = $_POST['old'];

        $tabla = "liga";
        $sql = [$tabla,
        ["nombre"=>$nom_liga,"anio_inicio"=>$anno_liga_inicio,"anio_fin"=>$anno_liga_fin,"descripcion"=>$liga_desc],
        ["nombre"=>$old[0],"anio_inicio"=>$old[1],"anio_fin"=>$old[2],"descripcion"=>$old[3]]];
        update($_SESSION['user'],$_SESSION['pass'],$sql);
    }
    
}
header('Location:../inicio.php');
?>