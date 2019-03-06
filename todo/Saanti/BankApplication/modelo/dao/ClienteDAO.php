<?php

include_once '../../modelo/conexion/conexion.php';
include_once '../../modelo/clases/Cliente.php';
if (isset($_GET['iduser'])) {



    $lista = selectCliente($_GET['iduser']);
//$lista= selectCliente('01234567M');
    $d = ['datos' => $lista];

    $objeto = json_encode($d);
    echo $objeto;
}

function selectCliente($cl_dni) {

    $connection = new conectaBD('banco');
    //$movimiento = new Movimiento();

    $rows = array();



    $datos = array(':par1' => $cl_dni);
    $sql = ' SELECT * FROM clientes WHERE cl_dni=:par1';
    $q = $connection->obtenerConex()->prepare($sql);
    $q->execute($datos);

    $q->setFetchMode();
    $rows = $q->fetchAll();

    if (empty($rows)) {
        $rows = 'vacio';

        return$rows;
    } else {
        return $rows[0];
    }
}

function insertCliente($dni, $nombre, $direccion, $telefono, $email, $nacimiento, $cliente, $nCuenta, $salario) {
    try {
        include_once '../../modelo/conexion/conexion.php';
        $conexion = new conectaBD('banco');

        $datos = array(':par1' => $dni, ':par2' => $nombre, ':par3' => $direccion, ':par4' => $telefono, ':par5' => $email, ':par6' => $nacimiento, ':par7' => $cliente, ':par8' => $nCuenta, ':par9' => $salario);
        $sql = ' INSERT INTO clientes (cl_dni,cl_nombre,cl_direccion,cl_telefono,cl_email,cl_fnacimiento,cl_fcliente,cl_ncuenta,cl_salario)
                                        VALUES ( :par1 , :par2 , :par3, :par4, :par5, :par6, :par7, :par8, :par9) ';
        $q = $conexion->obtenerConex()->prepare($sql);


        $realizado = $q->execute($datos);
        $intResultado = ($realizado) ? $q->rowCount() : 0;

        return $intResultado;
    } catch (PDOException $e) {
        return 'Connection Failed: ' . $e->getMessage();
    }
}

function meterClientes() {
    include_once '../../modelo/conexion/conexion.php';

    $conexion = new conectaBD('banco');


    //print_r(['clave'=>'valor']);
    $listaCliente = $_GET['lista'];
    //$listaCliente = explode(',', $x);
    //echo ($listaCliente);



    $dni = $listaCliente[0];
    $nombre = $listaCliente[1];
    $direccion = $listaCliente[2];
    $telefono = $listaCliente[3];
    $email = $listaCliente[4];
    $fnacimiento = $listaCliente[5];
    $ncuenta = 1;
    $salario = $listaCliente[6];
    $fcliente = "2017-02-24";
    $resultado = insertCliente($dni, $nombre, $direccion, $telefono, $email, $fnacimiento, $fcliente, $ncuenta, $salario);
    return $resultado;
}

if (isset($_GET['lista'])) {

    $resultado = meterClientes($_GET['lista']);

    $asdasd = new stdClass();
    $asdasd->datos = $resultado;
    //  print_r($asdasd);
    $objeto = json_encode($asdasd);
    //print_r($objeto);
    echo $objeto;
}