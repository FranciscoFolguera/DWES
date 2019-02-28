<?php

function filtrado($datos) {
    $datos = trim($datos);
    $datos = stripslashes($datos);
    $datos = htmlspecialchars($datos);
    return $datos;
}

function test_comentario($coment) {
    $expresion = '/^[a-zA-Z0-9 ,.]{3,}$/';
    //$expresion = '/(?=.*[a-zA-Z0-9])|((?=.*[a-zA-Z0-9])-(?=.*[a-zA-Z0-9]))|((?=.*[a-zA-Z0-9])-(?=.*[a-zA-Z0-9]))/';
    if (preg_match($expresion, $coment)) {
        return true;
    }
    return false;
}
