<?php

include_once '../inc/headerVista.php';

if (!isset($_POST['nCuenta'])) {
    include '../inc/formMovimientos.php';
} else {
   echo "<h2>holaaa 1</h2>";
    include '../modelo/dao/MovimientoDAO.php';
    include_once '../modelo/clases/Movimiento.php';
    //$datos = $_POST['datos'];
    $mo_ncu = $_POST['nCuenta'];
    $fechaInicial = $_POST['priMovi'];
    $fechaFinal = $_POST['lastMovi'];
   
    


    $movimiento = new Movimiento($mo_ncu);
    $filas = selectMovimientos($movimiento, $fechaInicial, $fechaFinal);
    $numFilas = count($filas);
    if ($numFilas > 0) {
        muestra($filas);
    }
}


include_once '../inc/footer.php';
