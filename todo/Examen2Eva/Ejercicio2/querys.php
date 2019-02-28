<?php

include_once './conexion.php';
include_once './funciones.php';

//include_once './singleton.php';



function accede_usuario($usuario, $password) {

    $conBD = Singleton::singleton();

    $valor = true;
    $stmt = $conBD->obtenerConex()->prepare("SELECT * FROM usuarios where nombre=?");
    $stmt->bind_param("s", $usuario);
    $stmt->execute();

    $rows = $stmt->fetch();

    if (!$rows) {
        $valor = false;
    }



    return $valor;
}

function accede_pass($usuario, $password) {

    $conBD = Singleton::singleton();

    $valor = true;
    $stmt = $conBD->obtenerConex()->prepare("SELECT contrasena FROM usuarios where nombre=?");
    $stmt->bind_param("s", $usuario);
    $stmt->execute();

    $hash = $stmt->fetch();
    if (!verify_fc($password, $hash[0])) {
        $valor = false;
    }



    return $valor;
}

function insert_usuario($nombre, $apellido, $password, $fecha, $h_ini, $h_fin, $intentos) {

    $conBD = Singleton::singleton();

    $password = hash_fc($password);

    $stmt = $conBD->obtenerConex()->prepare("INSERT INTO usuarios (nombre,apellidos,contrasena,fecha_validez,hora_ini,hora_fin,intentos) VALUES (?,?,?,?,?,?,?)");
    $stmt->bind_param('ssssssi', $nombre, $apellido, $password, $fecha, $h_ini, $h_fin, $intentos);



    return $stmt->execute();
}

/*
  Con esta query hemos insertado dos usuarios
 * insert_usuario('usama', 'sanz', '1234', '2021-12-23', '08:00', '20:00', '0');
 */


