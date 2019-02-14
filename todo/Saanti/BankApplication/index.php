<?php

include './modelo/conexion/modelo.php';

include_once './inc/header.php';
$ruta=dirname(htmlspecialchars($_SERVER["PHP_SELF"]));

?>

<div>Listado de<a href="<?php echo $ruta; ?>/vista/movimiento.php"> movimientos</a></div>
<div>Apertura de<a href="<?php echo $ruta; ?>/vista/open_cuenta.php"> cuentas</a></div>

<?php


include_once './inc/footer.php';
