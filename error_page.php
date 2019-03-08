<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Liga baloncesto</title>
    <link rel="stylesheet" type="text/css" href="css\estilos.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
</head>
<body>
<?php
require 'funciones\check_conexion.php';

$error = $_GET['reason'];
echo "<div class='error'>$error</div>";

echo "<br/><br/>" . "<a href='resultados.php' class='error'>Volver a la tabla</button>";

?>
</body>