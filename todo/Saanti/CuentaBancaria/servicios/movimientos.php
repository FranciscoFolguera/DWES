<?php

include_once '../includes/header.php';

if ((!isset($_GET['nCuenta'])) && (!isset($_GET['priMovi'])) && (!isset($_GET['lastMovi']))) {
    include'../includes/formMovimientos.php';
} else {
    $nCuenta = $_GET['nCuenta'];
    $firstMovi = $_GET['priMovi'];
    $lastMovi = $_GET['lastMovi'];

    $conex = new mysqli("localhost", "root", "1234", "banco");

    if (mysqli_connect_errno()) {
        printf("Conecxión fallida: %s\n", mysqli_connect_error());
        exit();
    }

    $queryCuenta = $conex->prepare("SELECT mo_ncu FROM WHERE mo_ncu=? ");
    $queryCuenta->bind_param('i', $nCuenta);

    $queryCuenta->execute();
    if ($queryCuenta) {
        echo "modificiación completada";
    } else {
        echo "error";
    }
}

include_once '../includes/footer.php';
