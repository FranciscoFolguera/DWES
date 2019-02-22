<?php

function rand_color() {

    $lista_colores = array
        (
        array(249, 5, 5),
        array(26, 164, 228)
            // array("Saab",5,2),
            // array("Land Rover",17,15)
    );
    $num = rand(0, count($lista_colores) - 1);

    return $lista_colores[$num];
}

function rand_text() {
    $lista_carac = array('a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'z', 'y', 'z',
        'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z',
        0, 1, 2, 3, 4, 5, 6, 7, 8, 9);
    $carac= count($lista_carac)-1;
    $texto ="";
    for($i=0;$i<7;$i++){
            $num = rand(0, $carac);

        $texto.=$lista_carac[$num];
    }
    return $texto;
}
function filtrado($datos) {
    $datos = trim($datos); //Elimina espacios antes y despues de los datos
    $datos = stripslashes($datos); //Elimina los /
    $datos = htmlspecialchars($datos); // Traduce caracteres especiales en entidades H
    return $datos;
}