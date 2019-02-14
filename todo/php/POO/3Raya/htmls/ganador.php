<?php

include '../includes/header.php';
include '../Clases/Ficha.php';
include '../Clases/Tablero.php';
include '../Clases/Jugador.php';
// 
session_start();


$jugador2 = $_SESSION['jugador2'];
$jugador1 = $_SESSION['jugador1'];
$nombre1 = $jugador1->getNombre();
$nombre2 = $jugador2->getNombre();
$puntos1 = $jugador1->getPuntos();
$puntos2 = $jugador2->getPuntos();


echo "$nombre1 tiene una puntuacion total de $puntos1 puntos";
echo "<br>$nombre2 tiene una puntuacion total de $puntos2 puntos<br>";
if ($jugador1->getPuntos() < $jugador2->getPuntos()) {
    echo"<br><h2>Ha ganado $nombre2</h2>";
} else if ($jugador1->getPuntos() > $jugador2->getPuntos()) {
    echo"<br><h2>Ha ganado $nombre1</h2>";
} else {
    echo"<br><h2>Ha habido empate</h2>";
}

include '../includes/footer.php';
