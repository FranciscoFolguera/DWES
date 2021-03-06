<?php

//http://localhost/GitDWES/todo/Saanti/BankApplication/modelo/dao/CuentaDAO.php?select_cuenta=0000000022
include_once '../../modelo/conexion/conexion.php';
include_once '../../modelo/clases/Cuenta.php';
include_once '../../inc/func_ser_movi.php';

//include_once '../clases/Cuenta.php';
//include_once '../conexion/conexion.php';
function deleteCuenta(Cuenta $cuenta, $ncuenta_c1, $ncuenta_c2) {
    $n_cuenta = $cuenta->getCu_ncu();
    $c_salario = $cuenta->getCu_salario();


    $connection = new conectaBD('banco');
    $err = "";

    //$importe_viejo = $cuenta->getCu_salario();
    $dni1 = $cuenta->getCu_dni1();
    $dni2 = $cuenta->getCu_dni2();

    // $importe += $importe_viejo;
    // creamos una bandera
    $result_transaccion = true;

// iniciamos transacción 
    $connection->obtenerConex()->setAttribute(PDO::ATTR_AUTOCOMMIT, 0);
    $connection->obtenerConex()->beginTransaction();
    $hoy = date("Y-m-d");
    $hourMin = date('H:i:s');

    $datos1 = array(':par1' => $n_cuenta);
    $sql = "DELETE FROM cuentas where cu_ncu=:par1";
    $q1 = $connection->obtenerConex()->prepare($sql);

    if (!$q1->execute($datos1)) {
        $err = 'Error al eleminar la cuenta';
        $result_transaccion = false;
    }

    $datos2 = array(':par1' => $n_cuenta);
    $sql2 = "DELETE FROM movimientos where mo_ncu=:par1";
    $q2 = $connection->obtenerConex()->prepare($sql2);

    if (!$q2->execute($datos2)) {
        $err = 'Error al eleminar la cuenta de movimientos';
        $result_transaccion = false;
    }

    if ($ncuenta_c1 === 1) {
        $datos3 = array(':par1' => $dni1);
        $sql3 = "DELETE FROM clientes  where cl_dni=:par1";
        $q3 = $connection->obtenerConex()->prepare($sql3);

        if (!$q3->execute($datos3)) {
            $err = 'Error al cambiar el eliminar el cliente1';

            $result_transaccion = false;
        }
    } else if ($ncuenta_c1 > 1) {
        $datos3 = array(':par1' => $dni1);
        $sql3 = "UPDATE clientes set  cl_ncuenta=(cl_ncuenta-1) where cl_dni=:par1";
        $q3 = $connection->obtenerConex()->prepare($sql3);

        if (!$q3->execute($datos3)) {
            $err = 'Error al cambiar el nº del cliente1';

            $result_transaccion = false;
        }
    }




    if ($dni2 != null) {
        if ($ncuenta_c2 === 1) {
            $datos3 = array(':par1' => $dni2);
            $sql3 = "DELTE FROM clientes  where cl_dni=:par1";
            $q3 = $connection->obtenerConex()->prepare($sql3);

            if (!$q3->execute($datos3)) {
                $err = 'Error al cambiar el eliminar el cliente2';

                $result_transaccion = false;
            }
        } else if ($ncuenta_c2 > 1) {
            $datos3 = array(':par1' => $dni2);
            $sql3 = "UPDATE clientes set  cl_ncuenta=(cl_ncuenta-1) where cl_dni=:par1";
            $q3 = $connection->obtenerConex()->prepare($sql3);

            if (!$q3->execute($datos3)) {
                $err = 'Error al cambiar el nº del cliente2';

                $result_transaccion = false;
            }
        }
    }






    if ($result_transaccion === true) {
        $err = true;
        $connection->obtenerConex()->commit();
    } else {

        $connection->obtenerConex()->rollback();
    }


    return $err;
}

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

function check_num_cuenta($cu_ncu) {
    $connection = new conectaBD('banco');



    $datos = array(':par1' => $cu_ncu);
    $sql = ' SELECT cu_ncu FROM cuentas WHERE cu_ncu=:par1';
    $q = $connection->obtenerConex()->prepare($sql);

    if (!$q->execute($datos)) {
        return -1;
    }
    $q->setFetchMode();
    $q->store_result();
    if ($q->num_rows() > 0) {
        $rows = 1;
    } else {
        $rows = 0;
    }

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
if (isset($_GET['select_num_cuenta'])) {
    $nCuenta = $_GET['select_num_cuenta'];
    $asdasd = new stdClass();

    if (valida_n_cuenta($nCuenta)) {
        $filas = selectCuenta($nCuenta);
        if (count($filas) > 0) {
            $asdasd->datos = $filas;
        } else {
            $asdasd->datos = 1;
        }
    }else{
        $asdasd->datos = 2;
    }



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
        if (count($filas) === 2) {
            $asdasd->cuenta = $filas[0];
            $asdasd->cliente1 = $filas[1];
            $asdasd->cliente2 = null;
        } else {
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

if (isset($_GET['delete_cuenta'])) {
    $mo_ncu = $_GET['delete_cuenta'];
    if (valida_n_cuenta($mo_ncu)) {
        $cu_dni1 = $_GET['dni1'];
        $cu_dni2 = $_GET['dni2'];
        $importe = $_GET['importe'];
        $nc_cli1 = $_GET['nc_cli1'];
        $nc_cli2 = $_GET['nc_cli2'];
        $cuenta = new Cuenta($mo_ncu, $cu_dni1, $cu_dni2, $importe);
        $err = deleteCuenta($cuenta, $nc_cli1, $nc_cli2);
    } else {
        $err = "Nº de cuenta incorrecto";
    }
    $asdasd = new stdClass();
    $asdasd->datos = $err;
    //  print_r($asdasd);
    $objeto = json_encode($asdasd);
    //print_r($objeto);
    echo $objeto;
}