<?php

session_start();
include './inc/header.php';
include './clases/clases.php';

if (isset($_SESSION['login'])) {
    $nombre = $_SESSION['login'];

    $baraja = new Baraja();

    $baraja->barajar($baraja);
    if (!isset($_POST['aceptar'])) {

        include'./inc/formJuego.php';
        

    }else{
        $baraja->sacarCarta($mazo);
    }
} else {
    echo'<p>NO tienes permisos,pulsa <a href="index.php">aquí</a> para registrate</p>';
}

include './inc/footer.php';
