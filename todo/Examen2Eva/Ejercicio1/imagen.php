<?php
include_once './funciones.php';
session_start();
if(!isset($_SESSION['color'])){
    
    $listacolor= array();
    $listaforma= array();
    $_SESSION['color']=$listacolor;
    $_SESSION['forma']=$listaforma;

}else{
   $listacolor= $_SESSION['color'];
   $listaforma= $_SESSION['forma'];
}
$color=rand_color();
array_push($listacolor, $color);
//print_r($color);
$forma= rand_forma();
array_push($listaforma, $forma);
$imagen= imagecreate($forma[0], $forma[1]); // ancho x alto
// establece color de fondo
$fondo= imagecolorallocate($imagen,$color[0],$color[1],$color[2]);
// envía imagen tras la cabecera
header("Content-type: image/png");
$_SESSION['color']=$listacolor;
$_SESSION['forma']=$listaforma;

 imagepng($imagen);



