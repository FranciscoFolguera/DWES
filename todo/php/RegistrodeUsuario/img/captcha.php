<?php
include_once './funciones.php';
session_start();

$captcha = imagecreatefrompng("fondo.png");
$texto = rand_text();
$c= rand_color();
for ($i = 0; $i < strlen($texto); $i++) {
//Elegir un color

    $color = imagecolorallocate($captcha, $c[0], $c[1], $c[2]);
    // $color = imagecolorallocate($captcha, rand_color());
    $ordenada = rand(240, 250); //Elegir una ordenada
    $abscisa = $i * 40 + rand(95, 100); //Elegir una abscisa
    $angulo = rand(-10, 50); //Elegir un ángulo
//Escribir el carácter en la imagen
    $fuente= dirname(__FILE__).'./arial.ttf';
    $letra = substr($texto, $i, 1);
    imagettftext($captcha, 24, $angulo, $abscisa, $ordenada, $color, $fuente, $letra);
}
header("Content-Disposition:inline ; filename=captcha.jpg");
header("Content-type:image/jpeg");

imagejpeg($captcha);
$_SESSION['captcha']=$texto;
?>