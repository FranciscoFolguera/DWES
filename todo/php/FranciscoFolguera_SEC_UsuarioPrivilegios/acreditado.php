<?php
session_start();
include_once './include/header.php';

if(!isset($_SESSION['nombre'])){
    die('no puedes estar aqui');
}
echo "<h2>Bienvenido ". $_SESSION['nombre']." </h2>";
include_once './include/footer.php';

