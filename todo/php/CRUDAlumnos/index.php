<?php

include_once './include/header.php';
//Nos conectamos al servidor
/*
$servidor="https://db4free.net";
$base="clasedaw18";
$usr="lauraperez";
$pwd="iesetgc2018";
$puerto="3306";
*/
$conex = new mysqli("localhost", "root", "1234","clasedaw18");

if (mysqli_connect_errno()) {
    printf("Conecxión fallida: %s\n", mysqli_connect_error());
    exit();
}
?>
<div>Pulsa en uno de los siguientes enlaces</div>
<ul>
    <li>Mantenimiento de <a href="mantenimiento/alumno.php">alumnos</a></li>
    <li>Mantenimiento de <a href="mantenimiento/asignatura.php">asignaturas</a></li>
    <li>Mantenimiento de <a href="mantenimiento/nota.php">notas</a></li>
</ul>  
<?php
include_once './include/footer.php';

