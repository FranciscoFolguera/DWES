<?php

include_once '../inc/headerCuenta.php';

if (!isset($_POST['nCuenta'])) {
    include '../inc/formACuentas.php';
} else {
    include '../modelo/dao/CuentaDAO.php';
    include_once '../modelo/clases/Cuenta.php';
    echo "<h2>---------------------------------------------------</h2>";
    print_r($_POST);
    $cuenta = new Cuenta();
    $cu_ncu = $_POST['nCuenta'];

    $cuentaExiste = selectCuenta($cu_ncu);

    echo"<pre>";
    print_r($cuentaExiste);

    echo "</pre>";
    if (count($cuentaExiste) > 0) {
        echo "<h2>Esta cuenta ya está dade de alta, prueba con otr nº de cuenta</h2>";
    } else {
        require_once '../modelo/dao/ClienteDAO.php';
        require_once '../modelo/clases/Cliente.php';
        $cliente = new Cliente();
        $cl_dni = $_POST['dni1'];
        $clienteExistente = selectCliente($cl_dni);

        echo"<pre>";
        print_r($clienteExistente);

        echo "</pre>";
        if(count($clienteExistente)>0){
            
        }else{
            
        }
    }
}