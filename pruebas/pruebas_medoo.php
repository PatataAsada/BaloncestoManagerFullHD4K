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

//$tabla = "WAKANDA";
//$campos = array($tabla, [
//    "nombre",
//    "ciudad",
//    "num_socios",
//    "anio"], true);
//$header = array("NOMBRE", "CIUDAD", "NUM_SOCIOS", "AÑO");
//
//
//paintTablesFromQuery(
//    "root",
//    "",
//    $campos,
//    $tabla,
//    $header,
//    false);
/*-----------------------------------------------------------------------------------*/
//$tabla = "jugadores";
//insert("root", "", array($tabla, [
//    "nombre" => "Haramburi",
//    "ciudad" => "Wakanda for ever",
//    "num_socios" => "230",
//    "anio" => strtotime("now")
//]));


/*---------------------------------------------------------------------------------------*/
$tabla = "equipos";
$where = "";
