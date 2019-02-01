<?php
require 'Medoo.php';

use Medoo\Medoo;

function getDatabase($username, $password)
{
    return new Medoo([
        'database_type' => 'mysql',
        'database_name' => 'baloncesto',
        'server' => 'localhost',
        'username' => $username,
        'password' => $password,
        'option' => array(
            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION
        )
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
    //$sql_data reemplazaría la consulta para volverse un array asociativo donde guardar la información para pasarle al select
    //$sql_data -> [0]Tabla, ([1]Joins ||&& [1]Campos), [2]Where
    //TODO si la consulta no trae datos, habilitar botones y funcionalidad para que pueda introducirlos

    $database = getDatabase($username, $password);

    $data = $database->select($sql_data[0], $sql_data[1], $sql_data[2]);

    if ($data && $data > 0) {
        //Si devuelve true o es mayor de 0 es que la consulta está bien y el select devuelve datos
        echo "<hr/>";
        echo "<table border style='margin: 0 auto' width='45%'>";

        echo "<tr id='cabeza'>";
        echo "<table border style='margin: 0 auto' width='45%' class='tabla'>";
        echo "<tr class='cabeza'>";
        foreach ($header as $value) {
            //cabecera de la tabla
            echo "<th>" . $value . "</th>";
        }
        echo "</tr>";

        foreach ($data as $value) {
            //cuerpo de la tabla
            echo "<tr id='cuerpo'>";
            foreach ($sql_data[1] as $index) {
                echo "<td><b>" . $value[$index] . "</td></b>";
            }
            echo "<tr class='cuerpo'>";
            echo "<td><b>" . $value . "</td></b>";
            echo "</tr>";
        }
        echo "</table>";

        //Si $sql_data[2] devuelve true es que se consulta TODA la tabla, si no es que contiene un where
        if (is_bool($sql_data[2])) {
            $count = $database->count($sql_data[0]);
        } else {
            $count = count($data);
        }

        echo "<div style=\"text-align: center;\"><h3><b>" . "Número de $entity: " . $count . "</h3></b>";
        echo "<div style=\"text-align: center;\" class='error'><h3><b>" . "Número de $entity: " . $database->count($sql_data[0], $sql_data[1], $sql_data[2]) . "</h3></b>";
        goBack($isBack);
    } else if (empty($data)) {
        //Si devuelve 0 la consulta no tiene registros que devolver
        echo "<div style=\"text-align: center;\" class='error'><b>" . "LA CONSULTA DEVOLVIÓ 0 RESULTADOS PARA EL VALOR INTRODUCIDO -> 0 " . $entity . "</b>";
        goBack($isBack);
    } else if (!$data) {
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
