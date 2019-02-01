<?php
require 'Medoo.php';

use Medoo\Medoo;

function getDatabase($username, $password)
{
    return new Medoo([
        'database_type' => 'mysql',
        'database_name' => 'nba',
        'server' => 'localhost',
        'username' => $username,
        'password' => $password
    ]);
}

/**
 * @param $username -> nombre de usuario
 * @param $password -> contraseña de usuario
 * @param $sql_data -> array con datos para la select
 * @param $entity -> entidad para información adicional (Ej: empleados)
 * @param $header -> array para establecer los valores de cabececera de tabla
 * @param $isBack -> booleano para indicar si se quieren activar los botones de retroceso en la página web
 */
function paintTablesFromQuery($username, $password, $sql_data, $entity, $header, $isBack)
{
    //TODO testeo
    //$sql_data reemplazaría la consulta para volverse un array asociativo donde guardar la información para pasarle al select
    //$sql_data -> [0]Tabla, ([1]Joins ||&& [1]Campos), [2]Where

    $database = getDatabase($username, $password);

    $data = $database->select($sql_data[0], $sql_data[1], $sql_data[2]);

    if ($data || $data > 0) {
        //Si devuelve true o es mayor de 0 es que la consulta está bien y el select devuelve datos
        echo "<hr/>";
        echo "<table border style='margin: 0 auto' width='45%' class='tabla'>";
        echo "<tr class='cabeza'>";
        foreach ($header as $value) {
            //cabecera de la tabla
            echo "<th>" . $value . "</th>";
        }
        echo "</tr>";
        foreach ($data as $value) {
            //cuerpo de la tabla
            echo "<tr class='cuerpo'>";
            echo "<td><b>" . $value . "</td></b>";
            echo "</tr>";
        }
        echo "</table>";
        echo "<div style=\"text-align: center;\" class='error'><h3><b>" . "Número de $entity: " . $database->count($sql_data[0], $sql_data[1], $sql_data[2]) . "</h3></b>";
        goBack($isBack);
    } else if ($data == 0) {
        //Si devuelve 0 la consulta no tiene registros que devolver
        echo "<div style=\"text-align: center;\" class='error'><b>" . "LA CONSULTA DEVOLVIÓ 0 RESULTADOS PARA EL VALOR INTRODUCIDO -> 0 " . $entity . "</b>";
        goBack($isBack);
    } else {
        //Posible error
        echo "<div style=\"text-align: center;\" class='error'><b>" . "PDO::errorCode(): " . $database->pdo->errorCode() . " - " . $database->pdo->errorInfo() . "</b>";
        goBack($isBack);
    }
}

/**
 * @param $isBack
 */
function goBack($isBack)
{
    if ($isBack) {
        echo "<br/><br/>" . "<button type=\"button\" onclick=\"history.back();\" class='button'>Volver al formulario</button>";
    }
}
