<?php

include './inc/header.php';

$conex = new mysqli("localhost", "root", "1234", "radio");





$conex->autocommit(false);
$result_transaccion = true;
$conex->begin_transaction();


if (!$conex->query("INSERT INTO radio.invitados(dni,nombre,apellidos,especialidad) VALUES ('52171545J' , 'Aprobado' , 'Manobanda' , 'Deportes')")) {
    // registramos el fallo
    $result_transaccion = false;
}

if (!$conex->query("INSERT INTO radio.programas(codigo,nombre,duracion,hora_inicio,cod_locutorio,dni_presentador) VALUES ('28' , 'Un programa' , '60' , '10:00:00' , '106' , '22222222B')")) {
    // registramos el fallo
    $result_transaccion = false;
}
if (!$conex->query("INSERT INTO radio.colaboran(cod_programa,dni_invitado,fecha) VALUES ('28' , '52171545J' , '2018-01-27 10:00:00' )")) {
    // registramos el fallo
    $result_transaccion = false;
}

if ($result_transaccion) {
    // consignamos
    $conex->commit();
    echo"Logrado<br>";
} else {
    // revertimos
    $conex->rollback();
    echo"Fallo<br>";
}


$conex->query("INSERT INTO radio.colaboran(cod_programa,dni_invitado,fecha) VALUES ('4' , '52171545J' , '2019-01-27 10:00:00' )");
$conex->rollback();
//SELECT nombre from programas WHERE codigo in (select cod_programa FROM colaboran where dni_invitado='88888888M')
$resultado = $conex->query("SELECT nombre,dni FROM invitados");
//$resultado->data_seek(0);
echo "<h2>Nombre de los invitados:</h2>";
while ($fila = $resultado->fetch_assoc()) {
    echo $fila['nombre'] . "<br>";
    $dniInvitado = $fila['dni'];

    
}
$resultado2 = $conex->query("SELECT i.nombre as nombre,p.nombre as programa from invitados i join colaboran c on i.dni=c.dni_invitado join programas p on c.cod_programa=p.codigo");

    while ($filas = $resultado2->fetch_array()) {
        echo "Nombre del invitado: ". $filas['nombre'].", ha ido al programa: " .$filas['programa']."<br>";
    }
include './inc/footer.php';
