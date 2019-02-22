<?php

include_once './modelo/querys.php';
include_once './modelo/funciones.php';
if(!isset($_SESSION)){
    session_start();

}
if(isset($_POST['dni'])&&isset($_POST['password'])){
    $dni= filtrado($_POST['dni']);
    $password= filtrado($_POST['password']);
}
function muestra_tabla() {
    $rows = select_comentarios();




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
if(isset($_POST['submit'])){
    if (strcmp($_POST['submit'], 'registrar_c') === 0) {
    $comentario = filtrado($_POST['coment']);
    

    $valido = test_comentario($comentario);
    if ($valido) {
        $insertado = insert_comentario($comentario);
        if (!$insertado) {
        
            $_SESSION['ERR_C']='ERROR AL INSERTAR EL COMENTARIO';
        }
    }else{
        $_SESSION['ERR_C']='El comentario es demasiado corto o has puesto caracteres invalidos. Solo se permiten Letras, nºs ,.; ';
    }
    $_POST['submit']='login';
     header('Location: index.php');
}

}


       
    