<?php

function getAge($fecha) {
    $mayorEdad=true;
    $mayor = 18;

    //Creamos objeto fecha desde los valores recibidos
    $nacio = DateTime::createFromFormat('Y-m-d', $fecha);

    //Calculamos usando diff y la fecha actual
    $calculo = $nacio->diff(new DateTime());

    //Obtenemos la edad
    $edad = $calculo->y;

    if ($edad < $mayor) {
    
        $mayorEdad=false;
    }
    return $mayorEdad;
}
function test_nombre($nombre) {
    $expresion = '/^[a-zA-Z0-9 ]{2,}$/';
    //$expresion = '/(?=.*[a-zA-Z0-9])|((?=.*[a-zA-Z0-9])-(?=.*[a-zA-Z0-9]))|((?=.*[a-zA-Z0-9])-(?=.*[a-zA-Z0-9]))/';
    if (preg_match($expresion, $nombre)) {
        return true;
    }
    return false;
}

function filtrado($datos) {
    $datos = trim($datos);
    $datos = stripslashes($datos);
    $datos = htmlspecialchars($datos);
    return $datos;
}
