<!DOCTYPE html>
<html lang="es">
<head>
<title>Alvaro Curiel</title>
<meta charset="UTF-8">
<meta name="viewport"  content="width=device-width, initial-scale=1.0">
</head>
<body>
<?php
    include_once 'funciones.php';
    include_once 'concurso.php';
    if(!isset($_POST['aceptar']))
    {
?>
	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
	Nombre:  <input type="text" name="nombre" required="required"><br><br>
	Tema:    <input type="radio" name="tema" value="paises.txt" checked><label>Paises</label>
                 <input type="radio" name="tema" value="libros.txt"><label>Libros</label>
                 <input type="submit" name="aceptar" value="aceptar">
	</form>
<?php
    }
    else
    {
        $nombre = filtrado($_POST['nombre']);
        $tema = filtrado($_POST['tema']);
        session_start();
        $_SESSION['nombre']= $nombre;
        $_SESSION['tema']=$tema;
        $_SESSION['concurso']= new Concurso($nombre);
        header('Location: juega.php');
    }	
?>
</body>
</html>