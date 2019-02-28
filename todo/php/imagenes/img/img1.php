<?php



$imagen= imagecreate(30, 30); // ancho x alto
// establece color de fondo
$fondo= imagecolorallocate($imagen,0,150,150);
// envía imagen tras la cabecera
header("Content-type: image/png");
imagepng($imagen);

