<?php

include_once './modelo/singleton.php';
//include_once './singleton.php';

define("LOGIN", 32);
define("ERROR_SI_EXISTE", -1);
define("ERROR_NO_EXISTE", 'ERROR! Ese usuario no existe');

define("ERROR_PASSWORD", 'ERROR! Contraseña o DNI incorrecto');
define("ERROR_SENTENCIA", -3);

function accede_usuario($dni,$password) {

    $conBD = Singleton::singleton();

    $valor = LOGIN;


    $datos = array(':par1' => $dni);
    $sql = ' SELECT * FROM login WHERE dni=:par1';
    $q = $conBD->obtenerConex()->prepare($sql);
    $q->execute($datos);
    $user = $q->fetch();

    if (($user)) {
        $datos2 = array(':par1' => $dni, ':par2' => $password);
        $sql = ' SELECT * FROM login WHERE dni=:par1 and password=:par2';
        $qu = $conBD->obtenerConex()->prepare($sql);
        $qu->execute($datos2);
        $user = $qu->fetch();
        if(!$user){
            $valor=ERROR_PASSWORD;
        }
    } else {
        $valor = ERROR_NO_EXISTE;
    }



    return $valor;
}

function select_usuarios($dni) {

    $conBD = Singleton::singleton();

    $valor = "";


    $datos = array(':par1' => $dni);
    $sql = ' SELECT * FROM login WHERE dni=:par1';
    $q = $conBD->obtenerConex()->prepare($sql);
    $q->execute($datos);
    $user = $q->fetch();

    if (($user)) {
        $valor = ERROR_SI_EXISTE;
        //echo $valor;
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

function insert_comentario($comentario) {

    $conBD = Singleton::singleton();

    $hoy = date("Y-m-d");
    $datos = array(':par1' => $comentario, ':par2' => $hoy);
    $sql = ' INSERT INTO comentarios (comentario,fecha)
                                        VALUES ( :par1 , :par2) ';
    $q = $conBD->obtenerConex()->prepare($sql);
    return $q->execute($datos);
}

//insert_comentario('Usama tiene autismo', '2017-05-20');
//select_comentarios();
//select_usuarios('49039275E');
//select_usuarios('49039275G');
//insert_usuario('49099575G', 'rafa', '6112001699', '1234', '2015-05-10', 'M', 'sucorreo@gmail.com');