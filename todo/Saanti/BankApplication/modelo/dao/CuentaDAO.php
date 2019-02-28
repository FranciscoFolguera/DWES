<?php

include_once '../modelo/conexion/conexion.php';
include_once '../modelo/clases/Cuenta.php';
//include_once '../clases/Cuenta.php';
//include_once '../conexion/conexion.php';

function selectCuenta($cu_ncu) {

    $connection = new conectaBD('banco');



    $datos = array(':par1' => $cu_ncu);
    $sql = ' SELECT cu_ncu FROM cuentas WHERE cu_ncu=:par1';
    $q = $connection->obtenerConex()->prepare($sql);

    if (!$q->execute($datos)) {
        return -1;
    }
    $q->setFetchMode(PDO::FETCH_ASSOC);
    $rows = array();
    $rows = $q->fetchAll();

    return $rows;
}

if (isset($_GET['comprobar_cuenta'])) {

    $resultado = selectCuenta($_GET['comprobar_cuenta']);

    $asdasd = new stdClass();
    $asdasd->datos = $resultado;
    //  print_r($asdasd);
    $objeto = json_encode($asdasd);
    //print_r($objeto);
    echo $objeto;
}