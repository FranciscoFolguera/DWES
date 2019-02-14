<?php

session_start();
include_once './include/header.php';
include_once './include/funciones.php';


$ErrNombre = $ErrLoging = $ErrPwd = '';
if (!isset($_GET['aceptar'])) {
    //no se ha enivado

    include'./include/formLogin.php';
} else {


    $Err = false;

    $ErrNombre = $ErrPwd = "";

    if (empty($_GET['nombre'])) {
        $Err = true;
        $ErrNombre = "El nombre es requerido";
    };

    if (empty($_GET['password'])) {

        $Err = true;
        $ErrPwd = "La contraseña es requerido";
    };




    if ($Err === true) {
        include './include/formLogin.php';
    } else {
        $pwd = $_GET['password'];

        $nombre = filtrado($_GET['nombre']);






        $_SESSION['nombre'] = $nombre;
        $_SESSION['password'] = $pwd;
        header("Location: menu.php");
    }
}
include_once './include/footer.php';
