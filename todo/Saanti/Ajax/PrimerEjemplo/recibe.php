<?php

include '../includes/header.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */




if (filter_input_array(INPUT_POST)) 
  {
    $campos = array (array("nombre" => "nombre", "tipo" => "texto", "valor" => filter_input(INPUT_POST, "nombre")),
        array("nombre" => "edad", "tipo" => "number", "valor" => filter_input(INPUT_POST, "edad")),
	array("nombre" => "telefono", "tipo" => "number", "valor" => filter_input(INPUT_POST, "telefono")));
  }
  foreach ($campos as $clave => $valor) {
   
    echo "{$clave} => {$valor} ";
    print_r($array);
}
    
include '../includes/footer.php';
?>

