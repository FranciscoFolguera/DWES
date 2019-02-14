<?php

include '../../includes/header.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */




if (filter_input_array(INPUT_POST)) 
  {
    $campos = array (
        array("nombre" => "nombre", "tipo" => "texto", "valor" => filter_input(INPUT_POST, "nombre")),
        array("edad" => "edad", "tipo" => "number", "valor" => filter_input(INPUT_POST, "edad")),
	array("telefono" => "telefono", "tipo" => "number", "valor" => filter_input(INPUT_POST, "telefono")));
  }
  foreach ($campos as $clave => $valor) {
   
      foreach ($clave as $key => $value) {
          echo "$value";
      }
}
    
include '../../includes/footer.php';
?>

