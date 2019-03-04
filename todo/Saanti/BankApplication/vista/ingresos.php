<?php

include_once '../inc/headerIngresos.php';
include_once '../inc/func_ser_movi.php';

if (!isset($_POST['nCuenta'])) {

    include '../inc/formIngresos.php';
} else {
    include '../modelo/dao/MovimientoDAO.php';
    include_once '../modelo/clases/Movimiento.php';
    $mo_ncu = $_POST['nCuenta'];

    if (valida_n_cuenta($mo_ncu)) {
        
    }else {
        echo "<h3>Nº de cuenta incorrecto</h3>";
    }
}
