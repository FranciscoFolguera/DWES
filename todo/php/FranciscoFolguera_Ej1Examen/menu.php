<?php

session_start();
include './inc/header.php';



function añadirRegistro($nombre, $fecha, $opcion) {
    $fichero = fopen("fichero/registro.log.txt", 'a+');

    fwrite($fichero, $nombre . "\n");
    fwrite($fichero, $fecha . "\n");
    fwrite($fichero, $opcion . "\n");
    fclose($fichero);
}

if (isset($_SESSION['login'])) {
    $nombre = $_SESSION['login'];
    $opcion = $_SESSION['tipoUser'];
    $fecha = date("j, n, Y");

    //Añadimos el regitro al fichero

    añadirRegistro($nombre, $fecha, $opcion);
    //Le saludamos
    echo"<p>Bienvenido $nombre </p>";
    if ($opcion === "ADMINISTRADOR") {
        echo "<h3>este es tu menu de administrador</h3>";
        echo '<br> <a href="juego.php">Juego de cartas</a>' . '<br>';
        echo '<a href="chat.php">Chat</a>' . '<br>';
        echo '<a href="index.php">Salir</a>' . '<br>';
    } else if ($opcion === "REGISTRADO") {
        echo "<h3>este es tu menu de regustrado</h3>";
        echo '<br> <a href="jueho.php">Juego de cartas</a>' . '<br>';
        echo '<a href="index.php">Salir</a>' . '<br>';
    }




    //$fecha= date(10, 8, 2020);
} else {
    echo'<p>NO tienes permisos,pulsa <a href="index.php">aquí</a> para registrate</p>';
}





include './inc/footer.php';
