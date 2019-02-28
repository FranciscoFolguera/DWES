<?php

//include_once './modelo/singleton.php';
include_once './modelo/singleton.php';
include_once './modelo/funciones.php';

function select_products($desc) {

    $conBD = Conexion::singleton();

    //$user=array();

    $datos = array(':par1' => $desc);
    $sql = ' SELECT idFabricante, idProducto, descripcion, precio FROM productos WHERE idFabricante=:par1';
    $q = $conBD->obtenerConex()->prepare($sql);
    $q->execute($datos);
    $user = $q->fetchAll(PDO::FETCH_ASSOC);





    return $user;
}

function muestra($rows) {


    echo "<table>";
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
}

if (isset($_POST['desc'])) {
    $desc = filtrado($_POST['desc']);

    if (test_comentario($desc)) {
        $rows = select_products($desc);
        if (count($rows) > 0) {
            muestra($rows);
        } else {
            echo"<h4>no se ha encontrado productos con esa descripcion</h4>";
        }
    } else {
        echo"<h4>La descripcion solo admite nºs, letras ., espacios y 3 caracteres minimo</h4>";
    }
}
