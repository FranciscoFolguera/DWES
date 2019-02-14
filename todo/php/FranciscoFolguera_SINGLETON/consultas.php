<?php

include_once './include/header.php';
include_once './singleton.php';

$conBD = Singleton::singleton();

echo "<h2>lista de Presentadores: </h2>";

$presentador = $conBD->presentadores();
$conBD->muestra($presentador);


echo "<h2>lista de invitados: </h2>";
$invitado = $conBD->invitados();
$conBD->muestra($invitado);

include_once './include/footer.php';