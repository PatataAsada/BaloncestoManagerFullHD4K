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

function paintTablesFromQuery($username, $password, $query, $entity, $header, $isBack)
{
    //$query reemplazaría la consulta para volverse un array asociativo donde guardar la información para pasarle al select
    //TODO Error handling
    //$query -> [0]Tabla, ([1]Joins ||&& [1]Campos), [2]Where

    $database = getDatabase($username, $password);

    $data = $database->select($query[0], $query[1], $query[2]);

    if (mysqli_errno($database) == 0) {
        if (mysqli_num_rows($data) > 0) {
            echo "<hr/>";
            echo "<table border style='margin: 0 auto' width='45%'>";
            echo "<tr id='cabeza'>";
            foreach ($header as $value) {
                echo "<th>" . $value . "</th>";
            }
            echo "</tr>";
            while ($rows = mysqli_fetch_array($data)) {
                echo "<tr id='cuerpo'>";
                for ($i = 0; $i < mysqli_num_fields($data); $i++) {
                    echo "<td><b>" . $rows[$i] . "</td></b>";
                }
                echo "</tr>";
            }
            echo "</table>";
            echo "<div style=\"text-align: center;\"><h3><b>" . "Número de $entity: " . mysqli_num_rows($data) . "</h3></b>";
            goBack($isBack);
        } else {
            echo "<div style=\"text-align: center;\"><b>" . "LA CONSULTA DEVOLVIÓ 0 RESULTADOS PARA EL VALOR INTRODUCIDO -> 0 " . $entity . "</b>";
            goBack($isBack);
        }
    } else {
        echo "<div style=\"text-align: center;\"><b>" . "Error code: " . mysqli_errno($database) . " - " . mysqli_error($database) . "</b>";
        goBack($isBack);
    }
}

/**
 * @param $isBack
 */
function goBack($isBack)
{
    if ($isBack) {
        echo "<br/><br/>" . "<button type=\"button\" onclick=\"history.back();\">Volver al formulario</button>";
    }
}
