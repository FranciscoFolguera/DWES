<?php
session_start();

if(!isset($_SESSION['login'])){
    die ("No puedes estar aqui");
}
$nombre=$_SESSION['login'];
echo "<h2>Bienvenido de nuevo $nombre</h2>";