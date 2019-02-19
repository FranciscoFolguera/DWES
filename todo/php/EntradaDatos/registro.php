<?php
session_start();
echo "<h3> he entrado en registro</h3>";
include_once './modelo/querys.php';

$ERR=0;
$dni=$_GET['dni'];
$password=$_GET['password'];
$nombre=$_GET['nombre'];
$telefono=$_GET['telefono'];
$fecha=$_GET['fecha_n'];
$email=$_GET['email'];
$sexo=$_GET['gender'];

$valor=select_usuarios($dni);
if($valor===-1){
    echo $dni;
    $ERR= 'ese DNI ya esta en uso, pon otro';
            echo "<h3> $ERR</h3>";

}else{
    $creado = insert_usuario($dni, $nombre, $telefono, $password, $fecha, $sexo, $email);
    if(!$creado){
       $ERR= 'no se ha podido crear ese usuari failo'; 
               echo "<h3> $ERR</h3>";

    }else{
        $ERR´=0;
        echo "<h3> $ERR</h3>";

        header('Location: index.php?');
    }
}
$_SESSION['err_registro']=$ERR;
if($ERR!=0){
    
    header("Location: index.php?dni=$dni&password=$password&submit=registrar");
     $_SESSION['accede']=0;
}else{
    $_SESSION['accede']=1;
    header("Location: index.php?submit=login");
}



