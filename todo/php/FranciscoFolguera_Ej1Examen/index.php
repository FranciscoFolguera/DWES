<?php

include './inc/header.php';
include './inc/funciones.php';

session_start();

function filtrado($datos) {
    $datos = trim($datos); //Elimina espacios antes y despues de los datos
    $datos = stripslashes($datos); //Elimina los /
    $datos = htmlspecialchars($datos); // Traduce caracteres especiales en entidades H
    return $datos;
}

$Err = false;
$nombre = $pwd = "";
$ErrNombre = $ErrPwd = $ErrLoging = "";
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
if (!isset($_POST['aceptar'])) {
    //no se ha enivado
    ?>


    <?php

    include'./inc/formLogin.php';
    ?>



    <?php

} else {
    $Err = false;

    $ErrNombre = $ErrPwd = "";

    if (empty($_POST['login'])) {
        $Err = true;
        $ErrNombre = "El nombre es requerido";
    };

    if (empty($_POST['password'])) {

        $Err = true;
        $ErrPwd = "La contraseña es requerido";
    };




    if ($Err === true) {
        include './inc/formLogin.php';
    } else {
        $contraseña = $_POST['password'];

        $nombre = filtrado($_POST['login']);
        $num = vaildaUser($nombre, $contraseña);

       
        $opcion = $_SESSION['tipoUser'];
        
        if ($num === 1) {
            $_SESSION['login'] = $nombre;
            $_SESSION['tipoUser'] = "ADMINISTRADOR";
            header("Location: menu.php");
        } else if ($num === 2) {
            $_SESSION['login'] = $nombre;
            $_SESSION['tipoUser'] = "REGISTRADO";
            header("Location: menu.php");
        } else if ($num === -1) {
            echo 'Error, ese usuario no esta regustrado';
        } else if ($num === -2) {
            echo 'Error, en la contraseña';
        } else if ($num === -3) {
            echo 'Error, en la fecha de validacion';
        }
    }
}


include './inc/footer.php';
