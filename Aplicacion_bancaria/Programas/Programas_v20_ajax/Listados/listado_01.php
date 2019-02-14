  <?php
 $clasecaca= new stdClass();
 $clasecaca->valor=null;
 
$movimientos = array
  (
  array('fecha'=>"2019-01-15", "10:15", "Apertura de cuenta", 1200),
  array("2019-01-17", "10:05", "Ingreso en efectivo", 100),
  array("2019-01-18", "09:15", "Reintegro en ventanilla", 800),
  array("2019-01-14", "08:35", "Recibo Movistar", 60)
  );
  $clasecaca->movi=$movimientos;
  $caca='este es el texto';
  $clasecaca->valor=$caca;
  $myJSON = json_encode($clasecaca);

//$myJSON = json_encode($movimientos[$_GET['filaSele']]);
//$myJSON = json_encode($movimientos);

echo $myJSON;

/*
    echo '<input maxlength="10" size="10" name="f_cue" readonly="readonly"' .
         'value="' . $_GET['f_cue'] . '" type="text"><br /><br />';
    $con = mysqli_connect("localhost", "root", "nohay2sin3") or
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
*/
  ?>
