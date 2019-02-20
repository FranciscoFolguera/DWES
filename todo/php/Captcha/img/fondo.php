<?php
$nombre_archivo = 'fondo.jpg';
$porcentaje = 0.1;
header('Content-Type: image/jpg');
// Obtener nuevos tamaños
$datos = getimagesize($nombre_archivo);
$n_ancho = $datos[0] * $porcentaje;
$n_alto = $datos[1]* $porcentaje;
// Cargar
$thumb = imagecreate ($n_ancho, $n_alto);
$origen = imagecreatefromjpeg($nombre_archivo);
// Cambiar el tamaño
imagecopyresized($thumb, $origen, 0, 0, 0, 0, $n_ancho, $n_alto, $datos[1], $datos[1]);
// Enviar
imagejpeg($thumb);
imagedestroy($thumb);