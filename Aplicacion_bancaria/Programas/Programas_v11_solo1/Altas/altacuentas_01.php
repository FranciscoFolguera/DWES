<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
  <meta content="text/html; charset=UTF-8" http-equiv="content-type">
  <title>Alta de cuentas (Fase 1)</title>
</head>
<body>
Sesion: <?php echo $_GET['sesion'];?>
<br>
<br>
<form method="get" action="altacuentas_02.php">
  Número de cuenta:&nbsp;
  <?php
    echo '<input maxlength="10" size="10" name="f_cue" readonly="readonly"' .
         'value="' . $_GET['f_cue'] . '" type="text">';
    $con = mysqli_connect("localhost", "root", "nohay2sin3") or
           die("No se pudo establecer la conexión con el servidor MySQL");
    $db = mysqli_select_db($con, 'Banco');
    if (!$db) {
       die ('No se puede seleccionar la B.D. Banco:' . mysqli_error($con));
    };
    $sql = 'SELECT * FROM cuentas WHERE cu_ncu = "' . $_GET['f_cue'] . '"';
    $resul = mysqli_query ($con, $sql) or
             die ('Error en el acceso a la base de datos: ' . mysqli_error($con));
    if (mysqli_fetch_array($resul)) {
       echo '<br><br>MENSAJE: La cuenta ya está dada de alta';
    } else {
  ?>
  <h3>PRIMER TITULAR</h3>
  DNI: <input maxlength="9" size="9" name="f_dni1" type="text">
  <br>
  <br>
  MENSAJE: Todo correcto<br><br>
  <input name="sesion" value="2" type="hidden">
  <input value="ENVIAR" type="submit"></form>
  <?php
    }
  ?>
</form>
</body>
</html>
