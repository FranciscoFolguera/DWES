<?php

include './includes/header.php';

//Crea la base de datos
// $link = mysqli_connect("localhost", "root", "1234") or die("No se ha podido acceder al servidorde la base de datos");

$conex = new mysqli("localhost", "root", "1234");

if (mysqli_connect_errno()) {
    printf("Conecxión fallida: %s\n", mysqli_connect_error());
    
}

$bancoCreado = false;
$bbddBanco = mysqli_select_db($conex, "banco");
if (!$bbddBanco) {

    echo "<h3>ERROR de conexión con la  base de datos</h3>";
} else {

    echo "<h3>Database exists!</h3>";
    $bancoCreado = true;
}



if ($bancoCreado === false) {
    $sql = 'CREATE DATABASE banco';
    if (mysqli_query($conex, $sql)) {
        echo "<h3>La base de datos banco se creó correctamente</h3>";
    } else {
        echo "<h3>Error al crear la base de datos: " . mysqli_error() . "</h3>";
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


    $resultadoQuery = $conex->prepare("INSERT INTO clientes (cl_dni, cl_nombre, cl_direccion, cl_telefono, cl_email, cl_fnacimiento, cl_fcliente, cl_ncuenta, cl_salario)"
            . " VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    
    $cl_dni="12678M"; $cl_nombre="batman"; $cl_direccion="Vistas"; $cl_telefono="9161"; $cl_email="jesus@gmail.com"; $cl_fnacimiento="1998-08-18"; $cl_fcliente="2018-12-20"; $cl_ncuenta=2; $cl_salario=87654321;
    $resultadoQuery->bind_param('sssssssii', $cl_dni, $cl_nombre, $cl_direccion,$cl_telefono, $cl_email, $cl_fnacimiento, $_cl_fcliente, $cl_ncuenta, $cl_salario);

    $resultadoQuery->execute();
    if ($resultadoQuery) {
        echo "<h3>modificiación completada</h3>";
    } else {
        echo "<h3>error</h3>";
    }
    echo "<h4>Clientes creada</h4>";
} else {
    echo "<h4>Clientes NO creada</h4>";
    
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
    echo "<h4>CUENTAS creada</h4>";
} else {
     echo "<h4>CUENTAS NO creada</h4>";
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
        echo "<h4>MOVIMIENTOS creada</h4>";

} else {
    echo "<h4>MOVIMIENTOS NO creada</h4>";
}



include './includes/footer.php';
