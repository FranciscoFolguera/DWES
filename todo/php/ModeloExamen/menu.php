<?php

session_start();
include_once './include/header.php';
include_once './include/funciones.php';

$listaNombres = array("kiko", "rafa", "usama", "victor");
$listaPasswords = array("1111", "2222", "3333", "4444");


$ruta = 'index.php';
if (isset($_SESSION['nombre'])) {
    $nombre = $_SESSION['nombre'];
    $password = $_SESSION['password'];

    $id = usuarioDistintNombres($listaNombres, $listaPasswords, $nombre, $password);

    if($id<0){
         echo'<p>Esos credenciales son incorrectos<a href="index.php">intentalo de nuevo</a></p>';
    }else{
        switch ($id) {
      
        case 0:
            imprimirMenuAdmin();
            break;
        case 1:
        case 2:
            imprimirMenuUser();
            break;
    }
    
    }
} else {
    echo'<p>NO tienes permisos,pulsa <a href="index.php">aquí</a> para registrate</p>';
}


include_once './include/footer.php';
