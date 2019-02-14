<?php

include './includes/header.php';

//Crea la base de datos
// $link = mysqli_connect("localhost", "root", "1234") or die("No se ha podido acceder al servidorde la base de datos");

$conex = mysqli_connect("localhost", "root", "1234");
if (!$conex) {
    die('No pudo conectarse: ' . mysqli_error());
}

$sql = 'DROP DATABASE banco';
if (mysqli_query($conex, $sql)) {
    echo "Banco borrada\n";

} else {
    echo 'Error al borrar la base de datos';
}

include './includes/footer.php';
