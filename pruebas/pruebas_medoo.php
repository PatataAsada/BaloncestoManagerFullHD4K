<?php
/**
 * Created by PhpStorm.
 * User: Rickdam
 * Date: 01/02/2019
 * Time: 10:16
 */

include '..\funciones\funciones.php';

/* 1)Testeo para sacar consulta con registros -> SUCCESS
 * 2)Testeo para sacar consulta que devuelve 0 registros -> SUCCESS
 * 3)Testeo para sacar consulta que devuelve error -> SUCCESS
 * */

$tabla = "SAKTAKA";
$campos = array($tabla, ["nombre", "altura"], true);
$header = array("NOMBRE", "ALTURA");
paintTablesFromQuery(
    "root",
    "",
    $campos,
    $tabla,
    $header,
    false);