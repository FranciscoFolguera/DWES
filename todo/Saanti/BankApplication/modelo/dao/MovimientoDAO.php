<?php

//include_once '../modelo/conexion/singleton_mysqli.php';
include_once '../clases/Movimiento.php';
include_once '../clases/Cuenta.php';
include_once '../../inc/func_ser_movi.php';
    include_once '../conexion/conexion.php';

//include_once '../conexion/conexion.php';
//include_once '../../modelo/clases/Movimiento.php';

function selectTododMovimientos() {
    $connection = new conectaBD('banco');
    try {
        $select = 'SELECT * FROM movimientos';
        $query = $connection->obtenerConex()->query($select);
        $rows = array();
        $query->setFetchMode(PDO::FETCH_ASSOC);
        $rows = $query->fetchAll();

        return $rows;
    } catch (Exception $ex) {
        echo"todo mal";
        echo("error al ejecutar la orden: " . $ex->getMessage());
    }
}

function selectMovimientos(Movimiento $movimiento, $fechaInicial, $fechaFinal) {

    $connection = new conectaBD('banco');
    //$movimiento = new Movimiento();
    $mo_ncu = $movimiento->getMo_ncu();

    $fallos = -1;


    $datos = array(':par1' => $mo_ncu);
    $sql = ' SELECT * FROM cuentas WHERE (cu_ncu=:par1) ';
    $q = $connection->obtenerConex()->prepare($sql);
    $q->execute($datos);
    $rows1 = array();
    $q->setFetchMode(PDO::FETCH_ASSOC);
    $rows1 = $q->fetchAll();

    if (count($rows1) > 0) {
        $datos = array(':par1' => $mo_ncu, ':par2' => $fechaInicial, ':par3' => $fechaFinal);
        $sql = ' SELECT * FROM movimientos WHERE ((mo_ncu=:par1) and (mo_fecha BETWEEN :par2 AND :par3))';
        $q = $connection->obtenerConex()->prepare($sql);
        $q->execute($datos);
        $rows = array();
        $q->setFetchMode();
        $rows = $q->fetchAll();
        if (count($rows) > 0) {
            return $rows;
        } else {
            return "No hay movimientos entre esas fechas para ese Nº de cuenta";
        }
    } else {

        return "No existe ese numero de cuenta";
    }
}

function muestra($rows) {

    try {
        echo "<table border=1>";
        echo"<tr>";
        foreach ($rows[0] as $clave => $valor) {
            echo "<th>" . $clave . "</th>";
        }
        echo"</tr>";
        foreach ($rows as $key => $fila) {

            echo"<tr>";
            foreach ($fila as $clave => $valor) {
                echo"<td>" . $valor . "</td>";
            }
            echo "</tr>";
        }


        echo"</table>";
    } catch (PDOException $ex) {
        echo("No se ha podido realizar esa consulta: " . $ex->getMessage() . "<br/>");
    }
}

function insertMovimiento(Cuenta $cuenta, $importe, $concepto) {
    $mo_ncu = $cuenta->getCu_ncu();

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

    $datos1 = array(':par1' => $mo_ncu, ':par2' => $importe);
    $sql = "UPDATE cuentas set cu_salario=(cu_salario+:par2) where cu_ncu=:par1";
    $q1 = $connection->obtenerConex()->prepare($sql);

    if (!$q1->execute($datos1)) {
        $err = 'Error al cambiar el salario de la cuenta';
        $result_transaccion = false;
    }

    $datos2 = array(':par1' => $dni1, ':par2' => $importe);
    $sql2 = "UPDATE clientes set cl_salario=(cl_salario+:par2) where cl_dni=:par1";
    $q2 = $connection->obtenerConex()->prepare($sql2);

    if (!$q2->execute($datos2)) {
        $err = 'Error al cambiar el salario del cliente1';
        $result_transaccion = false;
    }

    if ($dni2 != null) {
        $datos2 = array(':par1' => $dni2, ':par2' => $importe);
        $sql2 = "UPDATE clientes set cl_salario=(cl_salario+:par2) where cl_dni=:par1";
        $q2 = $connection->obtenerConex()->prepare($sql2);

        if (!$q2->execute($datos2)) {
            $err = 'Error al cambiar el salario del cliente2';

            $result_transaccion = false;
        }
    }




    $datos3 = array(':par1' => $mo_ncu, ':par2' => $hoy, ':par3' => $hourMin, ':par4' => $concepto, ':par5' => $importe);
    $sql3 = "INSERT into movimientos VALUES(:par1,:par2,:par3,:par4,:par5)";
    $q3 = $connection->obtenerConex()->prepare($sql3);

    if (!$q3->execute($datos3)) {
        $err = 'Error al cambiar al registrar el movimiento';
        $result_transaccion = false;
    }

    if ($result_transaccion === true) {
        $err = 'Operación realizada con exito';
        $connection->obtenerConex()->commit();
    } else {

        $connection->obtenerConex()->rollback();
    }


    return $err;
}

if ($_POST['select_movi']) {
    $mo_ncu = $_POST['nCuenta'];
    $fechaInicial = $_POST['priMovi'];
    $fechaFinal = $_POST['lastMovi'];

    if (valida_n_cuenta($mo_ncu)) {

        $movimiento = new Movimiento($mo_ncu);
        $err = selectMovimientos($movimiento, $fechaInicial, $fechaFinal);
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

if (isset($_GET['nCuenta'])) {
    $mo_ncu = $_GET['nCuenta'];
    if (valida_n_cuenta($mo_ncu)) {
        $cu_dni1 = $_GET['dni1'];
        $cu_dni2 = $_GET['dni2'];
        $importe = $_GET['importe'];
        $concepto = $_GET['concepto'];
        $cuenta = new Cuenta($mo_ncu, $cu_dni1, $cu_dni2);
        $err = insertMovimiento($cuenta, $importe, $concepto);
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