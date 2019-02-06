<?php
/*
TODO realizar conexion al servidor y comprobar que usuario y contraseña son válidos.
En caso negativo devolver a login.php con mensaje de error.
En caso afirmativo crear variable $_SESSION con los datos y redirigir a inicio.php
*/
require 'Medoo.php';
if($_POST){
    $user = $_POST['username'];
    $pass = $_POST['pass'];
    $conexion = getDatabase($user,$pass);
    if($conexion!=null){
        $_SESSION['user'] = $user;
        $_SESSION['pass'] = $pass;
        header("../inicio.php");
        exit;
    }else{
        $_POST['error'] = true;
        header("../index.php");
        exit;
    }
}else{
    header("../index.php");
    exit;
}
?>