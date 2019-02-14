<?php

function crearTClientes() {
    include_once './modelo/conexion/conexion.php';

    $conexion = new conectaBD('banco');

    try {
        $sql = " CREATE TABLE clientes (
            cl_dni VARCHAR(9)  NOT NULL, 
            cl_nombre VARCHAR(50) NOT NULL, 
            cl_direccion VARCHAR(60) NOT NULL, 
            cl_telefono VARCHAR(9)  NOT NULL, 
            cl_email VARCHAR(65) NOT NULL, 
            cl_fnacimiento DATE, 
            cl_fcliente DATE        NOT NULL, 
            cl_ncuenta TINYINT(2)  NOT NULL, 
            cl_salario INT(8)      NOT NULL, 
            PRIMARY KEY (cl_dni)) ENGINE = InnoDB;";

        echo"<h3>sf</h3>";
        $conexion->obtenerConex()->exec($sql);
        echo"<h3>sf</h3>";
    } catch (PDOException $ex) {
        echo $ex->getMessage();
    }
}

function insertCliente($dni, $nombre, $direccion, $telefono, $email, $nacimiento, $cliente, $nCuenta, $salario) {
    include_once './modelo/conexion/conexion.php';
    $conexion = new conectaBD('banco');
    echo '2';
    $datos = array(':par1' => $dni, ':par2' => $nombre, ':par3' => $direccion, ':par4' => $telefono, ':par5' => $email, ':par6' => $nacimiento, ':par7' => $cliente, ':par8' => $nCuenta, ':par9' => $salario);
    $sql = ' INSERT INTO clientes (cl_dni,cl_nombre,cl_direccion,cl_telefono,cl_email,cl_fnacimiento,cl_fcliente,cl_ncuenta,cl_salario)
                                        VALUES ( :par1 , :par2 , :par3, :par4, :par5, :par6, :par7, :par8, :par9) ';
    $q = $conexion->obtenerConex()->prepare($sql);

    return $q->execute($datos);
}

function meterClientes() {
    include_once './modelo/conexion/conexion.php';

    $conexion = new conectaBD('banco');

    $dni = "76543210B";
    $nombre = "Bruce";
    $direccion = "Raftel";
    $telefono = "999888777";
    $email = "batman@gmail.com";
    $fnacimiento = "1996-05-12";
    $fcliente = "2017-02-24";
    $ncuenta = 3;
    $salario = 4515622;
    insertCliente($dni, $nombre, $direccion, $telefono, $email, $fnacimiento, $fcliente, $ncuenta, $salario);
}


function crearTCuentas() {
    include_once './modelo/conexion/conexion.php';

    $conexion = new conectaBD('banco');

    try {
        $sql = "CREATE TABLE cuentas (
                              cu_ncu VARCHAR(10)  NOT NULL, 
                              cu_dni1 VARCHAR(9)   NOT NULL, 
                              cu_dni2 VARCHAR(9), 
                              cu_salario INT(8)      NOT NULL, 
                              PRIMARY KEY (cu_ncu), 
                              FOREIGN KEY (cu_dni1) REFERENCES clientes(cl_dni),
                              FOREIGN KEY (cu_dni2) REFERENCES clientes(cl_dni)
                              ) ENGINE = InnoDB;";

        echo"<h3>sf</h3>";
        $conexion->obtenerConex()->exec($sql);
        echo"<h3>sf</h3>";
    } catch (PDOException $ex) {
        echo $ex->getMessage();
    }
}

function insertCuenta($ncuenta, $dni1, $dni2, $salario) {
    include_once './modelo/conexion/conexion.php';
    $conexion = new conectaBD('banco');

    $datos = array(':par1' => $ncuenta, ':par2' => $dni1, ':par3' => $dni2, ':par4' => $salario);
    $sql = ' INSERT INTO cuentas (cu_ncu,cu_dni1,cu_dni2,cu_salario)
                                        VALUES ( :par1 , :par2 , :par3, :par4) ';
    $q = $conexion->obtenerConex()->prepare($sql);

    return $q->execute($datos);
}

function meterCuentas() {
    include_once './modelo/conexion/conexion.php';

    $conexion = new conectaBD('banco');

    $ncuenta = '0000000033';
    $dni = '01234567M';
    $salario = 1500000;
    insertCuenta($ncuenta, $dni, $dni = null, $salario);
}


function crearTMovimientos() {
    include_once './modelo/conexion/conexion.php';

    $conexion = new conectaBD('banco');

    try {
        $sql = "CREATE TABLE movimientos (
                                  mo_ncu VARCHAR(10)  NOT NULL,  
                                  mo_fecha DATE         NOT NULL, 
                                  mo_hora VARCHAR(6)   NOT NULL, 
                                  mo_concepto VARCHAR(80)  NOT NULL,
                                  mo_importe INT(8)       NOT NULL, 
PRIMARY KEY (mo_ncu, mo_fecha, mo_hora)) ENGINE = InnoDB;";

        echo"<h3>sf</h3>";
        $conexion->obtenerConex()->exec($sql);
        echo"<h3>sf</h3>";
    } catch (PDOException $ex) {
        echo $ex->getMessage();
    }
}

function insertMovimiento($ncuenta, $fecha, $hora, $concepto, $importe) {
    include_once './modelo/conexion/conexion.php';
    $conexion = new conectaBD('banco');

    $datos = array(':par1' => $ncuenta, ':par2' => $fecha, ':par3' => $hora, ':par4' => $concepto, ':par5' => $importe);
    $sql = ' INSERT INTO movimientos (mo_ncu,mo_fecha,mo_hora,mo_concepto,mo_importe)
                                        VALUES ( :par1 , :par2 , :par3, :par4, :par5) ';
    $q = $conexion->obtenerConex()->prepare($sql);

    return $q->execute($datos);
}

function meterMovimientos() {
    include_once './modelo/conexion/conexion.php';

    $conexion = new conectaBD('banco');

    $ncuenta = '0000000033';
    $fecha = "2015-02-03";
    $hora = "09:15";
    $concepto = 'prueba de movimiento 2';
    $importe = 200;
    
    insertMovimiento($ncuenta, $fecha, $hora, $concepto, $importe);
}
