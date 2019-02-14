<?php

include_once './inc/header.php';
include_once './inc/funciones.php';

if (!isset($_GET['aceptar'])) {


    include'./inc/formLogin.php';
} else {
    include_once './concurso.php';
    $tema = filtrado($_GET['tema']);

    $concurso = new Concurso();
    
    $correcto=true;
    switch ($tema) {
        case $concurso::PAISES:
            echo "<h2>$tema</h2>";
            session_start();
            $_SESSION['tema'] = $tema;
            break;
        case $concurso::LIBROS:
            session_start();
            $_SESSION['tema'] = $tema;
            break;

        default:
            $correcto=false;
           
            break;
    }
    if($correcto===true){
         $_SESSION['usuario']=$usuario;
      
      header('Location: juega.php');
    }else{
         include_once './inc/formLogin.php';
    }
}
include_once './inc/footer.php';
