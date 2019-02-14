<!DOCTYPE html>
<html lang="es">
<head>
<title>Alvaro Curiel</title>
<meta charset="UTF-8">
<meta name="viewport"  content="width=device-width, initial-scale=1.0">
<link href="./css/estilos.css" rel="stylesheet" type="text/css"/>
</head>
<body>
<?php
include_once 'funciones.php';
include_once 'concurso.php';
session_start();
if(isset($_SESSION['usuario'])&& $_SESSION['concurso'])
{
    $usuario = $_SESSION['usuario'];
    $tema = $_SESSION['tema'];
    leerPreguntas($tema);
}
else
{
	die( "No tiene permisos para acceder a esta página");
}

?>
</body>
</html>