<?php

include_once './connection/singleton_mysqli.php';

function select_usuario($login) {

    $conBD = Singleton::singleton();



    /*
     * DE esta manera hacemos una select pasando valores

     */
    $stmt = $conBD->obtenerConex()->prepare("SELECT * FROM usuario where login=?");
    $stmt->bind_param("s", $login);
    $stmt->execute();

    //  $fila=$stmt->fetch();

    /* vincular las variables de resultados */
    $stmt->bind_result($nombre, $código);

    /* obtener los valores */
    while ($stmt->fetch()) {
        printf("%s (%s)\n", $nombre, $código);
    }
}

function select_usuarios() {

    $conBD = Singleton::singleton();
    $filas = array();


    $resultado = $conBD->obtenerConex()->query("SELECT * FROM usuario");

//    if ($resultado) {
//
//        $row_cnt = $resultado->num_rows;
//    }
    while ($row = $resultado->fetch_assoc()) {
        array_push($filas, $row);
    }

    return $filas;
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

function insert_usuario($login, $pass) {

    $conBD = Singleton::singleton();



    $stmt = $conBD->obtenerConex()->prepare("INSERT INTO usuario (login, clave) VALUES (?, ?)");
    $stmt->bind_param('ss', $login, $pass);

    
    //  print_r($q);
    return $stmt->execute();
    //Devuelve TRUE si lo añadido FALSE si no
}

function delete_usuario($login) {

    $conBD = Singleton::singleton();


    $stmt_delete = $conBD->obtenerConex()->prepare("DELETE from usuario where login=?");
    $stmt_delete->bind_param("s", $login);

    return    $stmt_delete->execute();

}

function update_usuario($n_nombre, $login) {

    $conBD = Singleton::singleton();




    
$stmt = $conBD->obtenerConex()->prepare("UPDATE usuario SET login =? WHERE login =?");
    //$sql = "UPDATE usuario SET login =? WHERE login =?";
    $stmt->bind_param("ss", $n_nombre,$login);

  
    return $stmt->execute();
    //return $q->execute($datos);
    //Devuelve TRUE si lo añadido FALSE si no
}



