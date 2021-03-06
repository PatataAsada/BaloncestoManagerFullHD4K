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
    try {
        $data = $database->select($sql_data[0], $sql_data[1], $sql_data[2]);
        if ($data && $data > 0) {
            //Si devuelve true o es mayor de 0 es que la consulta está bien y el select devuelve datos
            if ($sql_data[0] == "equipos") {
                echo "<table class='tablita'>";
            }
            if ($sql_data[0] == "partidos") {
                echo "<table class='tablote'>";
            }

            echo "<tr>";
            foreach ($header as $value) {
                //cabecera de la tabla
                echo "<th>" . $value . "</th>";
            }
            echo "</tr>";

            foreach ($data as $value) {
                //cuerpo de la tabla
                echo "<tr>";
                foreach ($sql_data[1] as $index) {
                    echo "<td>" . $value[$index] . "</td>";
                }
                //<i class="far fa-edit"></i> esto es para el boton de editar.
                //<i class='far fa-trash-alt'></i> este es para el boton de eliminar.

                //Formulario de actualizar
                echo "<td><form action='crear_modificar.php' method='POST'>";
                foreach ($value as $dato) {
                    echo "<input name='result[]' type='hidden' value='$dato'>";
                }
                echo "<input name='tipo' type='hidden' value='$sql_data[0]'>";

                echo "<button type='submit' name='opcion' value='actualizar' id='edit-delete'><i class='far fa-edit'></i></button>";
                echo "</form></td>";

                //Formulario de eliminar
                echo "<td><form action='funciones/eliminar.php' method='POST'>";
                $tabla = $sql_data[0];
                echo "<input name='tabla' type='hidden' value='$tabla'/>";
                $pk = $value[getPrimaryFieldName($tabla)];
                echo "<input name='pk' type='hidden' value='$pk'>";

                echo "<button type='submit' name='opcion' value='borrar' id='edit-delete'><i class='fas fa-trash-alt'></i></button>";

                echo "</form></td>";
                echo "</tr>";
                //TODO Pasar todos los $value[$index] (o el $value del primer foreach) al botón de editar + pasar $value[0] para el botón de borrar
            }
            echo "</table>";

            //Si $sql_data[2] devuelve true es que se consulta TODA la tabla, si no es que contiene un array where
            if (is_bool($sql_data[2])) {
                $count = $database->count($sql_data[0]);
            } else {
                $count = count($data);
            }

            echo "<div style=\"text-align: center;\"><h3><b>" . "Número de $entity: " . $count . "</h3></b>";
            goBack($isBack);
        } else if (empty($data)) {
            //Si devuelve 0 la consulta no tiene registros que devolver
            echo "<div style=\"text-align: center;\" class='error'><b>" . "No hay resultados de partidos aun </b>";
            goBack($isBack);
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $database = null;
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

function insert($username, $password, $sql_data)
{
    $database = getDatabase($username, $password);
    try {
        if ($insertedRows = $database->insert($sql_data[0], $sql_data[1])->rowCount()) {
            echo $sql_data[1][getPrimaryFieldName($sql_data[0])] . " añadido";
        }
    } catch (Exception $e) {
        echo $e->getMessage();
    }
    $database = null;
}

//Método de prueba
function delete($username, $password, $sql_data)
{
    $database = getDatabase($username, $password);
    try {
        if ($deletedRows = $database->delete($sql_data[0], $sql_data[1])->rowCount() > 0) {
            echo $deletedRows . " filas de la tabla " . $sql_data[0] . " eliminadas";
        } else {
            echo "El registro que quieres deletear no está en la BD";
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $database = null;
}

//Funcion para imprimir "error al login"
function post_error($mensaje)
{
    print "<div class='error'><h1>$mensaje</h1></div>";
}

function getPrimaryFieldName($table)
{
    if ($table == "equipos") {
        return "nombre";
    } else if ($table == "partidos") {
        return "codigo";
    }
    return -1;
}

/*MÉTODOS PARA BORRAR O ACTUALIZAR EL REGISTRO DE LA TABLA*/
function deleteByGivenPrimaryKey($username, $password, $table, $id)
{
    //TODO Usar en paintTablesFromQuery
    $database = getDatabase($username, $password);
    try {
        if ($deletedRows = $database->delete($table, [getPrimaryFieldName($table) => $id])->rowCount() > 0) {
            echo "El registro " . $id . " de la tabla " . $table . " ha sido eliminado";
        } else {
            echo "El registro que quieres deletear no está en la BD";
        }
    } catch (PDOException $e) {
        post_error($e->getMessage());
    }
    $database = null;
}

function update($username, $password, $sql_data)
{
    //TODO Usar en paintTablesFromQuery
    $database = getDatabase($username, $password);
    try {
        if ($updatedRows = $database->update($sql_data[0], $sql_data[1], $sql_data[2])->rowCount() > 0) {
            echo "El registro " . $sql_data[2][getPrimaryFieldName($sql_data[0])] . " de la tabla " . $sql_data[0] . " ha sido actualizado";
        } else {
            echo "Todos los campos ya están actualizados, pruebe a insertar un nuevo dato";
        }
    } catch (Exception $e) {
        echo $e->getMessage();
    }
    $database = null;
}

//Funciones para los botones de eliminar y editar
function delete_data($primary_key, $tabla)
{
    if ($tabla == "partidos") {
        deleteByGivenPrimaryKey($_SESSION['user'], $_SESSION['pass'], $tabla, $primary_key);
        header("Location: ../resultados.php");
        exit();
    }
    if ($tabla == "equipos") {
        deleteByGivenPrimaryKey($_SESSION['user'], $_SESSION['pass'], $tabla, $primary_key);
        header("Location: ../equipos.php");
        exit();
    }
}

function edit_data($data, $tabla)
{
    if ($tabla == "partidos") {
        $_SESSION['resultado'] = $data;
        header("Location: crear_modificar_resultado.php");
        exit();
    }
    if ($tabla == "equipos") {
        $_SESSION['equipo'] = $data;
        header("Location: crear_modificar_equipo.php");
        exit();
    }
}

function getLiga($username, $password)
{
    $database = getDatabase($username, $password);
    $liga = array();
    try {
        $liga = $database->get('liga',
            ['nombre', 'anio_inicio', 'anio_fin', 'descripcion']);
    } catch (Exception $e) {
        post_error($e->getMessage());
    }
    $database = null;

    if (!empty($liga)) {
        return $liga;
    } else {
        return -1;
    }

}

function getAllPrimaryValues($username, $password, $table)
{
    $arrayCampos = array();
    $arrayResultados = array();
    $database = getDatabase($username, $password);

    if (getPrimaryFieldName($table) == 'nombre') {
        $arrayCampos = ['nombre', 'ciudad', 'num_socios', 'anio'];
    } else if (getPrimaryFieldName($table) == 'codigo') {
        $arrayCampos = ['codigo', 'equipo_local', 'equipo_visitante', 'puntos_local', 'puntos_visitantes', 'temporada'];
    }

    try {
        $data = $database->select($table, $arrayCampos, true);

        if ($data && $data > 0) {
            foreach ($data as $values) {
                array_unshift($arrayResultados, $values[getPrimaryFieldName($table)]);
            }
        }
    } catch (Exception $e) {
        post_error($e->getMessage());
    }
    $database = null;
    return $arrayResultados;
}
/*--------------------------------------------------------*/