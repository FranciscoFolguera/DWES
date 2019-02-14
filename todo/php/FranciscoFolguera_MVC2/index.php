<?php


require_once './modelo/modelo.php';

$presentador= new Presentadores();
$presentadores= $presentador->getPresentadores();

require './vista/vista_registro.php';
