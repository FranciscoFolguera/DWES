<?php

function hash_fc($password) {
    return password_hash($password, PASSWORD_DEFAULT, ['cost' => 15]);
}

function verify_fc($password, $hash) {
    return password_verify($password, $hash);
}

function filtrado($datos) {
    $datos = trim($datos);
    $datos = stripslashes($datos);
    $datos = htmlspecialchars($datos);
    return $datos;
}
