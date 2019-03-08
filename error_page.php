<?php
require 'funciones\check_conexion.php';

$error = $_GET['reason'];
echo $error;

echo "<br/><br/>" . "<button type=\"button\" onclick=\"history.back();\" class='button'>Volver al formulario</button>";

