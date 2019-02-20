<?php
session_start();
include_once './modelo/querys.php';

$ERR='El usuario se ha creado satidfactoriamenzte';
$dni=$_POST['dni'];
$password=$_POST['password'];
$nombre=$_POST['nombre'];
$telefono=$_POST['telefono'];
$fecha=$_POST['fecha_n'];
$email=$_POST['email'];
$sexo=$_POST['gender'];

$valor=select_usuarios($dni);
if($valor===-1){
    $ERR= "el DNI: $dni ya esta en uso, pon otro";

}else{
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
               
header("Refresh:3; index.php?");