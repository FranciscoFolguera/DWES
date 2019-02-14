<?php


header("Content-type: image/jpeg");

$imagen2 = imagecreatefromjpeg("java.jpg");


// Voltea imagen verticalmente
imageflip($imagen2, IMG_FLIP_VERTICAL);
// Enviar
imagejpeg($imagen2);
imagedestroy($imagen2);