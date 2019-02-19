<?php

include_once './modelo/querys.php';

$dni=$_GET['dni'];
$password=$_GET['password'];
$nombre=$_GET['nombre'];
$telefono=$_GET['telefono'];
$fecha=$_GET['fecha_n'];
$email=$_GET['email'];
$genero=$_GET['gender'];

$valor=select_usuarios($dni);
if($valor===32){
    
}



