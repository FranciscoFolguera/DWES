<?php
include './inc/header.php';
$baseDato= new mysqli("localhost", "root", "1234","dwes");


$sentenciaCreate = $baseDato->prepare("INSERT INTO usuario (login, clave) VALUES (?, ?)");
$sentenciaCreate->bind_param('ss', $nombre, $clave);

//Se establecen los parametros para crear los usuarios y se ejecuta el insert
$nombre = "Jesus";
$clave = "1213";
$sentenciaCreate->execute();

$nombre = "Alba";
$clave = "6545646";
$sentenciaCreate->execute();
// Mensaje de éxito en la inserción

echo "Se han creado los usuario<br>";

//Preparamos la sentencia del delete
$sentenciaDelete= $baseDato->prepare("DELETE FROM usuario where login=?");
$sentenciaDelete->bind_param('s', $nombre);

//Elegimos el usuario  y ejecutamos la sentencia delete 
$nombre = "Jesus";
$sentenciaDelete->execute();

echo "Se ha borrado el usuario $nombre<br>";


//Preparamos la sentencia del select
$sentenciaSelect= $baseDato->prepare("SELECT * FROM usuario");

//lo vinculamos
$sentenciaSelect->bind_result($name, $numer);
$sentenciaSelect->execute();
   while ($sentenciaSelect->fetch()) {
        echo"<br>";
        echo 'Nombre: '.$name.'<br>';
        echo 'Contraseña: '.$numer.'<br>';
       
  }

 	include './inc/footer.php';		