<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Listado de movimientos (Fase 0)</title>
</head>
<body>
<?php if (!isset($_GET['sesion'])) { ?>
  Sesión: 0<br><br>
LISTADO DE MOVIMIENTOS<br />
======================<br /><br />
  <form method="get" action="listado.php">
    Número de cuenta:&nbsp;<input maxlength="10" size="10" name="f_cue" value="10 dígitos">
    <br>
    <br>
    MENSAJE: Todo correcto<br><br>
    <input name="sesion" value="1" type="hidden">
    <input value="ENVIAR" type="submit">
  </form>
<?php } else { ?>
Sesion: <?php echo $_GET['sesion'];?>
<br>
<br>
LISTADO DE MOVIMIENTOS<br />
======================<br /><br />
  Número de cuenta:&nbsp;
  <?php
    echo '<input maxlength="10" size="10" name="f_cue" readonly="readonly"' .
         'value="' . $_GET['f_cue'] . '" type="text"><br /><br />';
    $con = mysqli_connect("localhost", "root", "Nohay2sin3") or
           die("No se pudo establecer la conexión con el servidor MySQL");
    $db = mysqli_select_db($con, 'Banco');
    if (!$db) {
       die ('No se puede seleccionar la B.D. Banco:' . mysqli_error($con));
    };
    $sql = 'SELECT * FROM movimientos WHERE mo_ncu = "' . $_GET['f_cue'] . '"';
    $resul = mysqli_query ($con, $sql) or
             die ('Error en el acceso a la base de datos: ' . mysqli_error($con));
    if (mysqli_fetch_array($resul)){
      echo '<table border="1">';
      echo '<tr>';
      echo '<td> FECHA </td><td> DESCRIPCIÓN </td><td> IMPORTE </td>';
      echo '</tr>';

      while ($fila = mysqli_fetch_assoc($resul)) {
          echo '<tr>';
          echo '<td>' . $fila['mo_fec'] . '</td><td>' . $fila['mo_des'] . '</td><td align="right">' . $fila['mo_imp'] . '</td>';
          echo '</tr>';
      }

      echo '</table>';
    } else {
      echo '<script>alert("RESULTADO: Sin movimientos");</script>';
    }

    // Libera la memoria del resultado
    mysql_free_result($resul);
    // Cierra la conexión con la base de datos
    mysql_close($con);
  ?>
<br><br>
<a href="listado.php">Más listados</a>
<?php } ?>
</body>
</html>
