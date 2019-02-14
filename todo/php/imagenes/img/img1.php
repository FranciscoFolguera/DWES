<?php



$imagen= imagecreate(300, 30); // ancho x alto
// establece color de fondo
$fondo= imagecolorallocate($imagen,0,255,255);
// envía imagen tras la cabecera
header("Content-type: image/png");
imagepng($imagen);

