<?php

if (!defined('SEPARADOR_CAMPO')) {
    define('SEPARADOR_CAMPO', '|');
}
//$fichero='hola.txt';

$fichero = 'libros.txt';

function leerPreguntas($fichero) {
    //--- Ponemos elarroba antes de fopen para que si da error se silencie ---//
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

$preguntas = leerPreguntas($fichero);
echo "<pre>";
//print_r($preguntas);

function array_lineas() {
    //--- Devuelve un array de arrays con un array de pregunta,pista,solucion sin lineas en blanco ---//
    $lineas = @file('libros.txt', FILE_SKIP_EMPTY_LINES | FILE_IGNORE_NEW_LINES);
    $listaPreguntas = array();
    if ($lineas) {
        for ($i = 0; $i < count($lineas); $i++) {
            //   var_dump($lineas);
            $linea = $lineas[$i];
            //$pregunta=array();
            $pregunta = explode(SEPARADOR_CAMPO, $linea);
            //print_r(explode(SEPARADOR_CAMPO, $linea));


            array_push($listaPreguntas, $pregunta);
        }
        return $listaPreguntas;
    } else {
        echo'No se ha podido abrir el fichero';
    }
}

function escribir_lineas() {
    $fichero = fopen('vacio.txt', 'a');

    if ($fichero) {
        fwrite($fichero, "Esto es una linea de prueba".PHP_EOL);
    } else {
        echo'No se ha podido abrir el fichero';
    }
}

function leer_fichero() {
    $file = fopen("vacio.txt", "r");

    while (!feof($file)) {

        echo fgets($file) . "<br />";
    }

    fclose($file);
}

//$array_n_blanco = array_lineas();
////print_r($array_n_blanco);
//escribir_lineas();
//leer_fichero();
