<?php
session_start();
include_once './modelo/querys.php';
include_once './modelo/funciones.php';

$ERR='El usuario se ha creado satisfactoriamente';
$dni= filtrado($_POST['dni']);
$password= filtrado($_POST['password']);
$nombre= filtrado($_POST['nombre']);
$telefono= filtrado($_POST['telefono']);
$fecha= filtrado($_POST['fecha_n']);
$email= filtrado($_POST['email']);
$sexo= filtrado($_POST['gender']);

$valor=select_usuarios($dni);
if($valor===-1){
    $ERR= "el DNI: $dni ya esta en uso, pon otro";

}else{
    $password= hash_fc($password);
    $creado = insert_usuario($dni, $nombre, $telefono, $password, $fecha, $sexo, $email);
    if(!$creado){
       $ERR= 'no se ha podido crear ese usuario'; 
 
    }
}
$_SESSION['err_registro']=$ERR;


echo "<h3>$ERR</h3>";
$_POST['dni']=$dni;
$_POST['password']=$password;
//header("Refresh:3; index.php?dni=$dni&password=$password");
//header("Location: index.php");
               
header("Refresh:2; index.php?");