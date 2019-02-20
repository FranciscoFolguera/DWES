<?php

$captcha = imagecreatefromjpeg("fondo.jpg");
$texto = 'JUEVES';
for ($i = 0; $i < strlen($texto); $i++) {
//Elegir un color
    $color = imagecolorallocate($captcha, rand(0, 255), rand(0, 255), rand(0, 255));
    $ordenada = rand(25, 75); //Elegir una ordenada
    $abscisa = $i * 40 + rand(10, 20); //Elegir una abscisa
    $angulo = rand(0, 75); //Elegir un ángulo
//Escribir el carácter en la imagen
    $letra = substr($texto, $i, 1);
    imagettftext($captcha, 24, $angulo, $abscisa, $ordenada, $color, 'arial.ttf', $letra);
}
header("Content-Disposition:inline ; filename=captcha.jpg");
header("Content-type:image/jpeg");

imagejpeg($captcha);
?>