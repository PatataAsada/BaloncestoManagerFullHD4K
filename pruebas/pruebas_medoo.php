<?php
/**
 * Created by PhpStorm.
 * User: Rickdam
 * Date: 01/02/2019
 * Time: 10:16
 */

include '..\funciones\funciones.php';

//TODO README: Todas las funciones están operativas.

/*Variables para probar las funciones. Pon a true el tipo de sql que quieras probar*/
$try_select = false;
$try_insert = false;
$try_update = false;
$try_delete = false;
$username = "root";
$password = "";

// !SELECT TEST
/* 1)Testeo para sacar consulta con registros -> SUCCESS
 * 2)Testeo para sacar consulta que devuelve 0 registros -> SUCCESS
 * 3)Testeo para sacar consulta que devuelve error -> SUCCESS
 * */

if ($try_select) {
    //El nombre de tabla es wakanda porque es para forzar un error deliberadamente.
    //Si quieres probar que devuelva registros, pon equipos, partidos ...

    $tabla = "equipos"; // -> nombre de la tabla a consultar

    //Array multidimensional contenedor de los campos que debe devolver la consulta
    $campos = array($tabla, //->tabla especificada anteriormente
        array( //-> array con campos
            "nombre",
            "ciudad",
            "num_socios",
            "anio"),
        true); //-> si este campo es true se quiere consultar toda la tabla, de lo contrario se añadiría un nuevo array con el where
    //Ejemplo: array("num_socios[>]" => 13 ... )

    //Array que contiene los nombres para la cabecera de la tabla
    $header = array("NOMBRE", "CIUDAD", "NUM_SOCIOS", "AÑO");

    echo $campos[1][0];

    paintTablesFromQuery(
        $username,
        $password,
        $campos,
        $tabla,
        $header,
        false); //si se pone true muestra el botón para volver a la página anterior

    //-> https://medoo.in/api/select
}

/*-----------------------------------------------------------------------------------*/


// !INSERCIÓN TEST
if ($try_insert) {
    //Si ejecutas esta prueba de inserción insertará el equipo 'Sakataka'


    $tabla = "equipos"; // -> nombre de la tabla donde realizar la inserción

    //Array multidimensional que contiene todos los campos necesarios para insertar un registro en la tabla que se indique
    $campos_para_insertar = array(
        $tabla, //-> tabla especificada anteriormente
        array( //-> array donde se indican los pares (nombre_columna : valor) para insertar
            "nombre" => "Sakataka",
            "ciudad" => "Wakanda for ever",
            "num_socios" => "230",
            "anio" => strtotime(time())
        ));


    insert(
        $username,
        $password,
        $campos_para_insertar);

    //-> https://medoo.in/api/insert
}

/*-----------------------------------------------------------------------------------*/


// !UPDATE TEST
if ($try_update) {
    //Actualizará el/los campos dándole el nombre de la tabla, el/los campos a actualizar y la primary key con el valor
    update(
        $username,
        $password,
        array("equipos", //tabla
            array("ciudad" => "Wakanda"), //SETS (Pueden indicarse más campos)
            array("nombre" => "Sakataka"))); //WHERE (Pueden indicarse más condiciones)

    //RECOMENDACIÓN = Como el formulario tendrá todos los campos, al ejecutar este método pásalos todos al array de SETS.
    //Si el usuario no cambia nada y le da a guardar le dará un aviso, no produce error. Si cambia 1 o varios se actualizarán.
    //A la hora de ejecutarlo habrá que tener en cuenta que no deje ningún campo vacío si no puede ser NULL.

    //->https://medoo.in/api/update
}

/*-----------------------------------------------------------------------------------*/


//  !DELECIÓN TEST
if ($try_delete) {
    //Este ejemplo eliminará el registro de la tabla que indiques con el valor de la primary key
    $tabla = "equipos";
    $pk_id = "Sakataka";

    deleteByGivenPrimaryKey(
        $username,
        $password,
        $tabla,
        $pk_id);

    //Este método estará dentro del botoncito de eliminar de cada fila de la tabla. Tanto este como el update irán en conjunción...
    //... con el de pintar la tabla.

    //->https://medoo.in/api/delete
}

/*---------------------------------------------------------------------------------------*/

//$pipo = getLiga('root', '');
//print_r($pipo);

print_r(getAllPrimaryValues($username, $password, 'equipos'));