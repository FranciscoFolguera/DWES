<?php


require_once './modelo/modelo.php';

$presentadores= getTodosLosPresentadoresMYSLI();

require './vista/vista_tabla.php';
