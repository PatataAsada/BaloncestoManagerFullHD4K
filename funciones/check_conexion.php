<?php
session_start();
if($_SESSION['user']==""&&$_SESSION['pass']==""){
    header("Location: index.php");
}

//Por si me muevo a otra pagina despues de meterme a actualizar algo pues elimino los datos antiguos.
function eliminar_old(){
    if(isset($_SESSION['old'])){
        unset($_SESSION['old']);
    }
}
?>