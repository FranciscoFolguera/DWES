<?php

include './inc/header.php';

// Nos conectamos a la base de datos
$baseDatos = mysqli_connect("localhost", "root", "1234") or die("No se ha podido acceder al servidorde la base de datos");

mysqli_select_db($baseDatos, "radio") or die("no se ha podido acceder a la base de datos");


//Ejercicio 1
echo"<h2>Ejercicio 1</h2>";



if ($resultado = $baseDatos->query("SELECT nombre FROM programas")) {

    $row_cnt = $resultado->num_rows;

}


//$resultado = $baseDatos->query("SELECT nombre FROM programas");


while ($row_cnt>0) {
    $resultado->data_seek($row_cnt--);
    $fila = $resultado->fetch_assoc();
    echo " nombre = " . $fila['nombre'] . "<br>";
    
}


//Ejercicio 2
echo"<h2>Ejercicio 2</h2>";

$baseDatos->real_query("SELECT * FROM invitados");
$resultado2 = $baseDatos->store_result();
while ($fila = $resultado2->fetch_assoc()) {
    echo $fila['nombre'];
    echo "<br>";
}

//Ejercicio 3
echo"<h2>Ejercicio 3</h2>";
$conexion = new mysqli("localhost", "root", "1234", "radio");
if ($conexion->connect_error) {
    echo "Fallo al conectarse: " . $id->connect_error;
}
$conexion->set_charset('utf8');
$select = 'SELECT DISTINCT especialidad as Nombre FROM invitados;'
        . 'SELECT DISTINCT nombre as Nombre FROM programas;'
        . 'SELECT DISTINCT edificio as Nombre FROM locutorio;'
        . "INSERT INTO radio.invitados(dni,nombre,apellidos,especialidad) VALUES ('52451545B' , 'Batman' , 'Joker' , 'Deportes');"
        . "INSERT INTO radio.colaboran (cod_programa,dni_invitadod) VALUES (2,'52451545B');";

if ($conexion->multi_query($select)) {

    //recorre cada resultado de sentencia
    do {
        /* almacenar primer juego de resultados */
        if ($resultado = $conexion->store_result()) {

            while ($fila = $resultado->fetch_array()) {

                if (isset($fila['Nombre'])) {
                    echo ($fila['Nombre'] . '<br>');
                }
            }
            $resultado->free();
        }
        /* mostrar divisor */
        if ($conexion->more_results()) {
            echo("----------------- <br>");
        }
    } while ($conexion->next_result());
}

include './inc/footer.php';
