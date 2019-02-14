<?php

if (!defined('SEPARADOR_CAMPO')) {
    define('SEPARADOR_CAMPO', '|');
}

function filtrado($datos) {
    $datos = trim($datos);
    $datos = stripslashes($datos);
    $datos = htmlspecialchars($datos);
    return $datos;
}

function leerPreguntas($fichero) {
    $listaPreguntas = array();
    if (!$fp = fopen($fichero, 'r')) {
        echo'No se ha podido abrir el fichero';
    } else {
        while (!feof($fp)) {
            $linea = fgets($fp);
            //$pregunta=array();
            $pregunta = explode(SEPARADOR_CAMPO, $linea);
            //print_r(explode(SEPARADOR_CAMPO, $linea));


            array_push($listaPreguntas, $pregunta);
        }
        return $listaPreguntas;
    }
}




