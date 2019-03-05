<?php

//http://localhost/GitDWES/todo/Saanti/BankApplication/modelo/dao/CuentaDAO.php?select_cuenta=0000000022
include_once '../../modelo/conexion/conexion.php';
include_once '../../modelo/clases/Cuenta.php';

//include_once '../clases/Cuenta.php';
//include_once '../conexion/conexion.php';

function selectCuenta($cu_ncu) {

    $connection = new conectaBD('banco');



    $datos = array(':par1' => $cu_ncu);
    $sql = ' SELECT cu_ncu,cu_salario,cu_dni1,cu_dni2 FROM cuentas WHERE cu_ncu=:par1';
    $q = $connection->obtenerConex()->prepare($sql);

    if (!$q->execute($datos)) {
        return -1;
    }
    $q->setFetchMode();
    $rows = array();
    $rows = $q->fetchAll();

    return $rows;
}

function select_Cuenta_Cliente($cu_ncu) {

    $connection = new conectaBD('banco');
    $err = false;
    $lista = array();

    $datos = array(':par1' => $cu_ncu);
    $sql = ' SELECT * FROM cuentas WHERE cu_ncu=:par1';
    $q = $connection->obtenerConex()->prepare($sql);

    if (!$q->execute($datos)) {

        return -1;
    } else {
        $q->setFetchMode();
        $rows = array();
        $rows = $q->fetchAll();
        // var_dump($rows);
        if (count($rows) != 0) {
            array_push($lista, $rows);


            $datos2 = array(':par1' => $rows[0]['cu_dni1']);
            $sql2 = ' SELECT * FROM clientes WHERE cl_dni=:par1';
            $q2 = $connection->obtenerConex()->prepare($sql2);
            if (!$q2->execute($datos2)) {
                return -1;
            }
            $q2->setFetchMode();
            $rows2 = array();
            $rows2 = $q2->fetchAll();
            array_push($lista, $rows2);
            if ($rows[0]['cu_dni2'] != null) {
                $datos3 = array(':par1' => $rows[0]['cu_dni2']);
                $sql3 = ' SELECT * FROM clientes WHERE cl_dni=:par1';
                $q3 = $connection->obtenerConex()->prepare($sql3);
                if (!$q3->execute($datos3)) {
                    return -1;
                }
                $q3->setFetchMode();
                $rows3 = array();
                $rows3 = $q3->fetchAll();
                array_push($lista, $rows3);
            }
        }

        // var_dump($rows2);
    }


    return $lista;
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
if (isset($_GET['select_cuenta'])) {
    $nCuenta = $_GET['select_cuenta'];

    $filas = selectCuenta($nCuenta);
    $asdasd = new stdClass();
    $asdasd->datos = $filas;
    $objeto = json_encode($asdasd);

//    
    header('Content-type: application/json; charset=utf-8');
    echo $objeto;
//    echo '{"firstName":"John", "lastName":"Doe"}';
}

if (isset($_GET['select_cuenta_cliente'])) {
    $nCuenta = $_GET['select_cuenta_cliente'];

    $filas = select_Cuenta_Cliente($nCuenta);

   
    $asdasd = new stdClass();
    if (count($filas) === 0) {
        $asdasd->cuenta = null;
        $asdasd->cliente1 = null;
        $asdasd->cliente2 = null;
    } else {
        if (count($filas) === 2){
              $asdasd->cuenta = $filas[0];
        $asdasd->cliente1 = $filas[1];
         $asdasd->cliente2 =null;
        }else{
             $asdasd->cuenta = $filas[0];
        $asdasd->cliente1 = $filas[1];
        $asdasd->cliente2 = $filas[2];
        }
       
    }

    $objeto = json_encode($asdasd);

//    
    header('Content-type: application/json; charset=utf-8');
    echo $objeto;
//    echo '{"firstName":"John", "lastName":"Doe"}';
}