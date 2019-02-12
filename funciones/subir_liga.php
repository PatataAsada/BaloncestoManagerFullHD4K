<?php
require './funciones.php';

if($_POST){
    $nom_liga = $_POST['nom_liga'];
    $anno_liga_inicio = $_POST['anno_liga_inicio'];
    $anno_liga_fin = $_POST['anno_liga_fin'];
    $liga_desc = $_POST['liga_desc'];

    $tabla = "liga";
    //TODO funcion medoo con esto.
    update_table($tabla,$nom_liga,$anno_liga_inicio,$anno_liga_fin,$liga_desc);
    
}
header('Location:../inicio.php');
?>