<?php

function selectCuenta($cu_ncu) {
    include_once '../modelo/conexion/conexion.php';
    include_once '../modelo/clases/Cuenta.php';
    $connection = new conectaBD('banco');
    //$movimiento = new Movimiento();
  
    

    try {
        
        
       
        $datos = array(':par1' => $cu_ncu);
        $sql = ' SELECT cu_ncu FROM cuentas WHERE cu_ncu=:par1';
        $q = $connection->obtenerConex()->prepare($sql);
        $q->execute($datos);
        $rows = array();
        $q->setFetchMode(PDO::FETCH_ASSOC);
        $rows = $q->fetchAll();
        return $rows;
    } catch (Exception $ex) {
        echo"todo mal";
        echo("error al ejecutar la orden: " . $ex->getMessage());
    }
}
if(isset($_GET['funcion']) && !empty($_GET['funcion'])) {
    $funcion = $_GET['funcion'];

    //En función del parámetro que nos llegue ejecutamos una función u otra
    switch($funcion) {
        case 'selectCuenta': 
            $a -> accion1();
            break;
        case 'funcion2': 
            $b -> accion2();
            break;
    }
}