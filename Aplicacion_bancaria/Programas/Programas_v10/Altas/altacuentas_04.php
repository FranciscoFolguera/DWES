<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
  <meta content="text/html; charset=UTF-8" http-equiv="content-type">
  <title>Alta de cuentas (Fase 3)</title>
</head>
<body>
Sesion: <?php echo $_GET['sesion'];?>
<br>
<br>
<?php
  if ($_GET['f_imp'] == 0) {
     die ("MENSAJE: El importe de apertura debe ser mayor de cero<br>");
  }
  $con = mysqli_connect("localhost", "root", "nohay2sin3") or
         die ("No se pudo establecer la conexión con el servidor MySQL");
  $db = mysqli_select_db($con, 'Banco');
  if (!$db) {
     die ('No se puede seleccionar la B.D. Banco:' . mysqli_error($con));
  };
  if ($_GET['existe1'] == 0) {
    $sql = 'INSERT INTO clientes (cl_dni, cl_nom, cl_dir, cl_tel, cl_ema, cl_fna, cl_fcl, cl_ncu, cl_sal) VALUES (';
    $sql .= '"' . $_GET['f_dni1'] . '", ';
    $sql .= '"' . $_GET['f_nom1'] . '", ';
    $sql .= '"' . $_GET['f_dir1'] . '", ';
    $sql .= '"' . $_GET['f_tel1'] . '", ';
    $sql .= '"' . $_GET['f_ema1'] . '", ';
    $sql .= '"' . $_GET['f_fna1'] . '", ';
    $sql .= '"' . $_GET['f_fcl1'] . '", ';
    $sql .= '"' . $_GET['f_ncu1'] . '", ';
    $sql .= '"' . $_GET['f_imp']  . '")';
    $result = mysqli_query($con, $sql) or
          die ("MENSAJE: Error al grabar el primer titular<br>");
		echo $sql . "<br>";
  } else {
    $cuentas = $_GET['f_ncu1'] + 1;
    $importe = $_GET['f_sal1'] + $_GET['f_imp'];
    $sql = 'UPDATE clientes SET cl_ncu = ' . $cuentas . ', cl_sal = ' . $importe . ' WHERE cl_dni = "' . $_GET['f_dni1'] .'"';
    $resul = mysqli_query($con, $sql) or
             die ("MENSAJE: Error al modificar el primer titular");
 		echo $sql . "<br>";
  }
  if ($_GET['f_dni2'] != NULL) {
    if ($_GET['existe2'] == 0) {
      $sql = 'INSERT INTO clientes (cl_dni, cl_nom, cl_dir, cl_tel, cl_ema, cl_fna, cl_fcl, cl_ncu, cl_sal) VALUES (';
      $sql .= '"' . $_GET['f_dni2'] . '", ';
      $sql .= '"' . $_GET['f_nom2'] . '", ';
      $sql .= '"' . $_GET['f_dir2'] . '", ';
      $sql .= '"' . $_GET['f_tel2'] . '", ';
      $sql .= '"' . $_GET['f_ema2'] . '", ';
      $sql .= '"' . $_GET['f_fna2'] . '", ';
      $sql .= '"' . $_GET['f_fcl2'] . '", ';
      $sql .= '"' . $_GET['f_ncu2'] . '", ';
      $sql .= '"' . $_GET['f_imp']  . '")';
      $result = mysqli_query($con, $sql) or
            die ("MENSAJE: Error al grabar el segundo titular<br>");
   		echo $sql . "<br>";
    } else {
      $cuentas = $_GET['f_ncu2'] + 1;
      $importe = $_GET['f_sal2'] + $_GET['f_imp'];
      $sql = 'UPDATE clientes SET cl_ncu = ' . $cuentas . ', cl_sal = ' . $importe . ' WHERE cl_dni = "' . $_GET['f_dni2'] .'"';
      $resul = mysqli_query($con, $sql) or
               die ("MENSAJE: Error al modificar el segundo titular");
  		echo $sql . "<br>";
    }
  }  
    $sql = 'INSERT INTO cuentas (cu_ncu, cu_dn1, cu_dn2, cu_sal) VALUES (';
    $sql .= '"' . $_GET['f_cue']  . '", ';
    $sql .= '"' . $_GET['f_dni1'] . '", ';
    $sql .= '"' . $_GET['f_dni2'] . '", ';
    $sql .= '"' . $_GET['f_imp']  . '")';
    $result = mysqli_query($con, $sql) or
          die ("MENSAJE: Error al grabar la cuenta<br>");
 		echo $sql . "<br>";
    $sql = 'INSERT INTO movimientos (mo_ncu, mo_fec, mo_hor, mo_des, mo_imp) VALUES (';
    $sql .= '"' . $_GET['f_cue'] . '", ';
    $sql .= '"' . date("Y-m-d") . '", ';
    $sql .= '"' . date("His") . '", ';
    $sql .= '"Apertura de cuenta", ';
    $sql .= '"' . $_GET['f_imp']  . '")';
    $result = mysqli_query($con, $sql) or
          die ("MENSAJE: Error al grabar el movimiento<br>");
		echo $sql . "<br>";
?>
ACTUALIZACIÓN REALIZADA<br><br>
<a href="altacuentas.php">Más altas</a>
</body>
</html>
