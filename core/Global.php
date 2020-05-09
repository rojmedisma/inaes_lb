<?php
/**
 * Archivo que contiene todas las variables globales, la mayoría sacadas del archivo config
 */

global $globales;
global $mysqli;
$dir_confg = str_replace('htdocs', '', $_SERVER['DOCUMENT_ROOT']) . 'config/';
$global = parse_ini_file($dir_confg . 'inaes_lb.ini', true);
foreach ($global as $grupo => $valores) {
	foreach ($valores as $campo => $valor)
		$globales[$grupo][$campo] = $valor;
}
foreach ($globales["configuracion"] as $var_nom => $var_val){
	define(strtoupper($var_nom), $var_val);
}