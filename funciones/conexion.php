<?php
/*
TODO realizar conexion al servidor y comprobar que usuario y contraseña son válidos.
En caso negativo devolver a login.php con mensaje de error.
En caso afirmativo crear variable $_SESSION con los datos y redirigir a inicio.php
*/
require 'funciones.php';
if($_POST){
    $user = $_POST['username'];
    $pass = $_POST['pass'];
    try{
        $database = getDatabase($user,$pass);
        $_SESSION['user'] = $user;
        $_SESSION['pass'] = $pass;
        header("Location:../inicio.php");
        exit;
    }catch(Exception $e){
        $_POST['error'] = true;
        header("Location:../index.php");
        exit;
    }
}else{
    header("Location:../index.php");
    exit;
}
?>