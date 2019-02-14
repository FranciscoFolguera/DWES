<?php

function getTodosLosPresentadoresMYSLI() {
    $conexion = mysqli_connect("localhost", "root", "1234") or die("No se ha podido acceder al servidorde la base de datos");

    mysqli_select_db($conexion, "radio") or die("no se ha podido acceder a la base de datos");
    mysqli_set_charset($conexion, 'UTF8');
    
    $resultado = $conexion->query('SELECT * FROM presentadores');
   

    if ($resultado) {
        $row_cnt = $resultado->num_rows;
        $presentadores = array();

        while ($row_cnt > 0) {
            $resultado->data_seek($row_cnt--);
           $presentadores[] = $resultado->fetch_assoc();
            
        }
    } else {
        echo "<h2>Error al realizar la select</h2>";
    }
    mysqli_close($conexion);
    return $presentadores;
}


