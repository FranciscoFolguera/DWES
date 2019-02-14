<?php

include './includes/header.php';

//Crea la base de datos
// $link = mysqli_connect("localhost", "root", "1234") or die("No se ha podido acceder al servidorde la base de datos");

$conex = mysqli_connect("localhost", "root", "1234");
if (!$conex) {
    die('No pudo conectarse: ' . mysqli_error());
}
$bancoCreado = false;
$bbddBanco = mysqli_select_db($conex, "banco");
if (!$bbddBanco) {

    echo 'ERROR de conexión con la  base de datos';
} else {

    echo "Database exists!";
    $bancoCreado = true;
}



if ($bancoCreado === false) {
    $sql = 'CREATE DATABASE banco';
    if (mysqli_query($conex, $sql)) {
        echo "La base de datos banco se creó correctamente\n";
    } else {
        echo 'Error al crear la base de datos: ' . mysqli_error() . "\n";
    }
}
$conex = mysqli_connect("localhost", "root", "1234", "banco");
//if (mysqli_query($enlace, $sql)) {
$bancoCreado = true;


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

if ($conex->query($sql) === TRUE) {
    echo "MyGuests tabla clientes con éxito";
} else {
    echo "Crear una tabla de datos de error:";
}
$sql = "CREATE TABLE cuentas (
                              cu_ncu VARCHAR(10)  NOT NULL, 
                              cu_dni1 VARCHAR(9)   NOT NULL, 
                              cu_dni2 VARCHAR(9), 
                              cu_salario INT(8)      NOT NULL, 
                              PRIMARY KEY (cu_ncu), 
                              FOREIGN KEY (cu_dni1) REFERENCES clientes(cl_dni),
                              FOREIGN KEY (cu_dni2) REFERENCES clientes(cl_dni)
                              ) ENGINE = InnoDB;";
if ($conex->query($sql) === TRUE) {
    echo "Tabla cuentas con éxito";
} else {
    echo "Crear una tabla de datos de error:";
}
$sql = "CREATE TABLE movimientos (
                                  mo_ncu VARCHAR(10)  NOT NULL,  
                                  mo_fecha DATE         NOT NULL, 
                                  mo_hora VARCHAR(6)   NOT NULL, 
                                  mo_concepto VARCHAR(80)  NOT NULL,
                                  mo_importe INT(8)       NOT NULL, 
PRIMARY KEY (mo_ncu, mo_fecha, mo_hora)) ENGINE = InnoDB;";
//}

if ($conex->query($sql) === TRUE) {
    echo "Tabla movimientos con éxito";
} else {
    echo "Crear una tabla de datos de error:";
}



include './includes/footer.php';
