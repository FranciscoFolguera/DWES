<?php

function rand_color() {

    $lista_colores = array
        (
        array(249, 5, 5),
       array(26, 164, 228),
        array(20, 150, 90)
            // array("Saab",5,2),
            // array("Land Rover",17,15)
    );
    $num = rand(0, count($lista_colores) - 1);

    return $lista_colores[$num];
}
/*
 * 
 * 1º rojo 2º azul 3º verde
 */

function rand_forma() {

    $lista_forma = array
        (
        array(100, 100),
       array(50, 200),
        array(200, 50)
            // array("Saab",5,2),
            // array("Land Rover",17,15)
    );
    $num = rand(0, count($lista_forma) - 1);

    return $lista_forma[$num];
}

