<?php

include_once './singleton.php';

define("LOGIN", 32);
define("ERROR_NO_EXISTE", -1);
define("ERROR_PASSWORD", -2);
define("ERROR_SENTENCIA", -3);

function select_usuarios($dni, $password) {

    $conBD = Singleton::singleton();

    $valor = "";


    $datos = array(':par1' => $dni);
    $sql = ' SELECT DNI FROM login WHERE dni=:par1';
    $q = $conBD->obtenerConex()->prepare($sql);
    $exist = $q->execute($datos);
    if ($exist) {
        $valor=LOGIN;
    }
    return $valor;
}

function insert_usuario($dni, $nombre, $telefono, $password, $fecha, $sexo, $email) {

    $conBD = Singleton::singleton();


    $datos = array(':par1' => $dni, ':par2' => $nombre, ':par3' => $telefono, ':par4' => $password, ':par5' => $fecha, ':par6' => $sexo, ':par7' => $email);
    $sql = ' INSERT INTO login VALUES ( :par1 , :par2 , :par3, :par4, :par5, :par6, :par7) ';
    $q = $conBD->obtenerConex()->prepare($sql);
    return $q->execute($datos);
}

function select_comentarios() {

    $conBD = Singleton::singleton();


   // $sql = ' SELECT * from comentarios ORDER BY fecha DESC';
    $filas = null;
    $query = $conBD->obtenerConex()->prepare("SELECT * from comentarios ORDER BY fecha DESC");
    $query->setFetchMode(PDO::FETCH_ASSOC);

    $query->execute();

    if ($query->rowCount() > 0) {

        while ($row = $query->fetch()) {
           $filas[] = $row;
        }
        
        return $filas;
    }
}

function insert_comentario($comentario, $fecha) {

    $conBD = Singleton::singleton();


    $datos = array(':par1' => $comentario, ':par2' => $fecha);
    $sql = ' INSERT INTO comentarios (comentario,fecha)
                                        VALUES ( :par1 , :par2) ';
    $q = $conBD->obtenerConex()->prepare($sql);
    return $q->execute($datos);
}

//insert_comentario('Usama tiene autismo', '2017-05-20');
//select_comentarios();
//insert_usuario('49099575G', 'rafa', '6112001699', '1234', '2015-05-10', 'M', 'sucorreo@gmail.com');