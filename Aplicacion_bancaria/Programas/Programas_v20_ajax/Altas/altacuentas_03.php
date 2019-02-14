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
<form method="get" action="altacuentas_04.php">
  Número de cuenta:&nbsp;
<?php
   echo '<input maxlength="10" size="10" name="f_cue" readonly="readonly"' .
        'value="' . $_GET['f_cue'] . '" type="text">';
   echo '<h3>PRIMER TITULAR</h3>';
   echo 'DNI: <input maxlength="9" size="9" name="f_dni1" readonly="readonly"' .
        'value="' . $_GET['f_dni1'] . '" type="text"><br>';
   echo 'Nombre.- <input maxlength="50" size="50" name="f_nom1" type="text"' .
        'value="' . $_GET['f_nom1'] . '" readonly="readonly"><br>';
   echo 'Dirección.- <input maxlength="60" size="60" name="f_dir1" type="text"' .
        'value="' . $_GET['f_dir1'] . '" readonly="readonly"><br>';
   echo 'Teléfono.- <input maxlength="9" size="9" name="f_tel1" type="text"' .
        'value="' . $_GET['f_tel1'] . '" readonly="readonly"><br>';
   echo 'e-mail.- <input maxlength="65" size="65" name="f_ema1" type="text"' .
        'value="' . $_GET['f_ema1'] . '" readonly="readonly"><br>';
   echo 'Fecha de nacimiento.- <input maxlength="10" size="10" name="f_fna1" type="text"' .
        'value="' . $_GET['f_fna1'] . '" readonly="readonly"><br>';
   echo 'Fecha de alta.- <input maxlength="10" size="10" name="f_fcl1" type="text"' .
        'value="' . $_GET['f_fcl1'] . '" readonly="readonly"><br>';
   echo 'Número de cuentas abiertas.- <input maxlength="2" size="2" name="f_ncu1" type="text"' .
        'value="' . $_GET['f_ncu1'] . '" readonly="readonly"><br>';
   echo 'Saldo.- <input maxlength="8" size="8" name="f_sal1" type="text"' .
        'value="' . $_GET['f_sal1'] . '" readonly="readonly">';
   $existetit1 = $_GET['existe1'];
   echo '<h3>SEGUNDO TITULAR (Opcional)</h3>';
   echo 'DNI: <input maxlength="9" size="9" name="f_dni2" readonly="readonly"' .
           'value="' . $_GET['f_dni2'] . '" type="text"><br>';
if ($_GET['f_dni2'] != NULL) {
  if ($_GET['f_dni1'] != $_GET['f_dni2']) {
    $con = mysqli_connect("localhost", "root", "nohay2sin3") or
           die ("No se pudo establecer la conexión con el servidor MySQL");
    $db = mysqli_select_db($con, 'Banco');
    if (!$db) {
       die ('No se puede seleccionar la B.D. Banco:' . mysqli_error($con));
    };
    $sql = 'SELECT * FROM clientes WHERE cl_dni = "' . $_GET['f_dni2'] . '"';
    $resul = mysqli_query ($con, $sql) or
             die ('Error en el acceso a la tabla de clientes: ' . mysqli_error($con));
    if ($fila = mysqli_fetch_array($resul, MYSQL_ASSOC)) {
      echo 'Nombre.- <input maxlength="50" size="50" name="f_nom2" type="text" ' .
           'value="' . $fila['cl_nom'] . '" readonly="readonly"><br>';
      echo 'Dirección.- <input maxlength="60" size="60" name="f_dir2" type="text" ' .
           'value="' . $fila['cl_dir'] . '" readonly="readonly"><br>';
      echo 'Teléfono.- <input maxlength="9" size="9" name="f_tel2" type="text" ' .
           'value="' . $fila['cl_tel'] . '" readonly="readonly"><br>';
      echo 'e-mail.- <input maxlength="65" size="65" name="f_ema2" type="text" ' .
           'value="' . $fila['cl_ema'] . '" readonly="readonly"><br>';
      echo 'Fecha de nacimiento.- <input maxlength="10" size="10" name="f_fna2" type="text" ' .
           'value="' . $fila['cl_fna'] . '" readonly="readonly"><br>';
      echo 'Fecha de alta.- <input maxlength="10" size="10" name="f_fcl2" type="text" ' .
           'value="' . $fila['cl_fcl'] . '" readonly="readonly"><br>';
      echo 'Número de cuentas abiertas.- <input maxlength="2" size="2" name="f_ncu2" type="text" ' .
           'value="' . $fila['cl_ncu'] . '" readonly="readonly"><br>';
      echo 'Saldo.- <input maxlength="8" size="8" name="f_sal2" type="text" ' .
           'value="' . $fila['cl_sal'] . '" readonly="readonly"><br>';
      $existetit2 = 1;
    } else {
      echo 'Nombre.- <input maxlength="50" size="50" name="f_nom2" type="text"><br>';
      echo 'Dirección.- <input maxlength="60" size="60" name="f_dir2" type="text"><br>';
      echo 'Teléfono.- <input maxlength="9" size="9" name="f_tel2" value="nnnnnnnnn" type="text"><br>';
      echo 'e-mail.- <input maxlength="65" size="65" name="f_ema2" value="usuario@dominio" type="text"><br>';
      echo 'Fecha de nacimiento.- <input maxlength="10" size="10" name="f_fna2" value="aaaa-mm-dd" type="text"><br>';
      echo 'Fecha de alta.- <input maxlength="10" size="10" name="f_fcl2" value="' .
           date("Y-m-d") . '" type="text" readonly="readonly"><br>';
      echo 'Número de cuentas abiertas.- <input maxlength="2" size="2" name="f_ncu2" type="text" ' .
           'value="1" readonly="readonly"><br>';
      echo 'Saldo.- <input maxlength="8" size="8" name="f_sal2" type="text" ' .
           'value="0" readonly="readonly"><br>';
      $existetit2 = 0;
    };
    echo '<br>Importe de apertura: <input maxlength="8" size="8" name="f_imp" type="text" value="0">';
    echo '<br><br>MENSAJE: Todo correcto<br><br>';
    echo '<input name="sesion" value="4" type="hidden">';
    echo '<input name="existe1" value="' . $existetit1 . '" type="hidden">';
    echo '<input name="existe2" value="' . $existetit2 . '" type="hidden">';
    echo '<input value="ENVIAR" type="submit">';
  } else {
    echo "<br><br>MENSAJE: Los dos dnis son iguales";
  };
} else {  
  echo '<br>Importe de apertura: <input maxlength="8" size="8" name="f_imp" type="text" value="0">';
  echo '<br><br>MENSAJE: Todo correcto<br><br>';
  echo '<input name="sesion" value="4" type="hidden">';
  echo '<input name="existe1" value="' . $existetit1 . '" type="hidden">';
  echo '<input name="existe2" value="' . $existetit2 . '" type="hidden">';
  echo '<input value="ENVIAR" type="submit">';
};
?>
</form>
</body>
</html>
