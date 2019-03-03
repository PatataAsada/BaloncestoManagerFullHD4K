<?php
require "check_conexion.php";
require "funciones.php";

if (isset($_POST['opcion'])) {
    if (isset($_POST['tabla']) && isset($_POST['pk'])) {
        delete_data($_POST['pk'], $_POST['tabla']);
    }
}
