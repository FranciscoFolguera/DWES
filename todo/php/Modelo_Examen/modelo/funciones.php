<?php

function test_nombre($nombre) {
    $expresion = '/^[a-zA-Z0-9 ]{2,}$/';
    //$expresion = '/(?=.*[a-zA-Z0-9])|((?=.*[a-zA-Z0-9])-(?=.*[a-zA-Z0-9]))|((?=.*[a-zA-Z0-9])-(?=.*[a-zA-Z0-9]))/';
    if (preg_match($expresion, $nombre)) {
        return true;
    }
    return false;
}
function test_password($password) {
    $expresion = '/(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])/';
    if (preg_match($expresion, $password)) {
        return true;
    }
    return false;
}
function test_email($email) {
    $patron = "/^[a-zA-Z0-9]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,3}$/";
    if (preg_match($patron, $email)) {
        return true;
    }
    return false;
}

function test_telefono($telefono) {
    $expresion = '/^[9][1][0-9]{7}$/';
    if (preg_match($expresion, $telefono)) {
        return true;
    }
    return false;
}

function test_articulo($articulo) {
    $expresion = '/^[A-Z]{3}+[-][0-9]{3,5}$/';
    if (preg_match($expresion, $articulo)) {
        return true;
    }
    return false;
}

function test_ip($ip) {
    $expresion = "/^(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])([.](\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])){3}$/";
    if (preg_match($expresion, $ip)) {
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

function test_comentario($coment) {
    $expresion = '/^[a-zA-Z0-9 ,.;]{10,}$/';
    //$expresion = '/(?=.*[a-zA-Z0-9])|((?=.*[a-zA-Z0-9])-(?=.*[a-zA-Z0-9]))|((?=.*[a-zA-Z0-9])-(?=.*[a-zA-Z0-9]))/';
    if (preg_match($expresion, $coment)) {
        return true;
    }
    return false;
}

function hash_fc($password) {
    return password_hash($password, PASSWORD_DEFAULT, ['cost' => 15]);
}

function verify_fc($password, $hash) {
    return password_verify($password, $hash);
}

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
