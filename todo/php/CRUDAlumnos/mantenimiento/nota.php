<?php
include_once '../include/header.php';
?>
<h3>CRUD de NOTAS</h3>
<?php
session_start();
include '../include/funciones.php';

$conex = mysqli_connect("localhost", "root", "1234", "clasedaw18");
//$conex = new mysqli("db4free.net", "lauraperez", "iesetgc2018", "clasedaw18");


if (mysqli_connect_errno()) {
    printf("Conecxión fallida: %s\n", mysqli_connect_error());
    exit();
}

$resultadoAlum = mysqli_query($conex, "SELECT * FROM alumnos");

if ($resultadoAlum) {

    $row_cnt = mysqli_num_rows($resultadoAlum);
}
?>
<div class="tablas">
    <table>
        <tr>
            <th>ID</th>
            <th>NOMBRE</th>
            <th>FECHA NACIMIENTO</th>
            <th>MAYOR EDAD</th>
        </tr>
        <?php
        while ($row = mysqli_fetch_assoc($resultadoAlum)) {
            $id_alumno = $row["ID"];
            ?>
            <tr>
                <td><?php echo $id_alumno; ?></td> 
                <td><?php echo $row["NOMBRE"]; ?></td>
                <td><?php echo $row["FECHA_NACIMIENTO"]; ?></td>      
                <td><?php echo $row["MAYOR_EDAD"]; ?></td>


            </tr>
            <?php
        }

        if (isset($_GET["id"])) {
            $idGet = $_GET["id"];
            $_SESSION['id'] = $idGet;
        }
        ?>
    </table>
    <?php
    $resultado_asig = mysqli_query($conex, "SELECT * FROM asignaturas");

    if ($resultado_asig) {

        $row_cnt_asig = mysqli_num_rows($resultado_asig);
    }
    ?>
    <table>
        <tr>
            <th>ID</th>
            <th>NOMBRE</th>
            <th>FECHA NACIMIENTO</th>
            <th>MAYOR EDAD</th>
        </tr>
        <?php
        while ($row = mysqli_fetch_assoc($resultado_asig)) {
            $id_asignatura = $row["ID"];
            ?>
            <tr>
                <td><?php echo$id_asignatura; ?></td> 
                <td><?php echo $row["NOMBRE"]; ?></td>
                <td><?php echo $row["CURSO"]; ?></td>      
                <td><?php echo $row["CICLO"]; ?></td>


            </tr>
            <?php
        }

        if (isset($_GET["id"])) {
            $idGet = $_GET["id"];
            $_SESSION['id'] = $idGet;
        }
        ?>
    </table>
</div>

<?php
echo "<h1>La sesion de la nota ";
echo $_SESSION['nota'];
echo "</h1>";
if (!isset($_SESSION['nota'])) {
    //no se ha enivado
    ?>
    <form action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?> method="GET">
        <div class="tablas">
            ID_ALUMNO: <input type="number" name="id_alGET" required="required"><br>
            ID_ASIGNATURA: <input type="number" name="id_asigGET" required="required"><br>
        </div>

        NOTA: <input type="number" name="nota" disabled="disabled" ><br>
        <input type="submit" name="submit" value="check">
    </form>
    <?php
} else {
    
    ?>
    <form action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?> method="GET">
        <div class="tablas">
            ID_ALUMNO: <input type="number" name="id_alGET" readonly="readonly" value=<?php echo $_SESSION['id_alum']; ?>><br>
            ID_ASIGNATURA: <input type="number" name="id_asigGET"  readonly="readonly" value=<?php echo $_SESSION['id_asig']; ?>><br>
        </div>
        NOTA: <input type="number" name="nota" required="required"><br>

        <input type="submit" name="submit" value="modificar">
    </form>
    <?php
}

if (isset($_GET['submit']) && ($_GET['submit']) === 'check') {

    echo "<h3>holaaaaaaaaaaa</h3>";
    $id_alumGET = $_GET['id_alGET'];
    $id_asigGET = $_GET['id_asigGET'];

    $stmt_select_nota = mysqli_prepare($conex, "SELECT nota FROM notas where id_alumno=? and id_asignatura=?");
    mysqli_stmt_bind_param($stmt_select_nota, 'ii', $id_alumGET, $id_asigGET);
    mysqli_stmt_execute($stmt_select_nota);



    mysqli_stmt_bind_result($stmt_select_nota, $nota);

    mysqli_stmt_fetch($stmt_select_nota);

    $_SESSION['nota'] = $nota;
    $_SESSION['id_alum'] = $id_alumGET;
    $_SESSION['id_asig'] = $id_asigGET;
     echo "<h3>$nota</h3>"; echo "<h3>holaaaaaaaaaaa</h3>";
      echo "<h3>holaaaaaaaaaaa</h3>";
      var_dump($_SESSION);
     
}
if (isset($_GET['submit']) && ($_GET['submit']) === 'modificar') {
    echo "<pre>";
    var_dump( $_GET);
    echo "</pre>";
    $id_alumGET = $_GET['id_alGET'];
    $id_asigGET = $_GET['id_asigGET'];
    $nota_GET = $_GET['nota'];

    $stmt_update = mysqli_prepare($conex, "UPDATE notas SET nota=? WHERE id_alumno=? and id_asignatura=?");

    mysqli_stmt_bind_param($stmt_update, 'iii', $nota_GET, $id_alumGET, $id_asigGET);
    mysqli_stmt_execute($stmt_update);


    $archivoActual = $_SERVER['PHP_SELF'];
  header("Refresh:2; $archivoActual");
        
}

/*
  if (isset($_GET['submit'])) {
  $archivoActual = $_SERVER['PHP_SELF'];
  header("Refresh:2; $archivoActual");
  }
 */
$conex->close();

/*
SELECT a.ID as 'id Alumno',a.NOMBRE as 'nombre alumno', s.ID as'id Asignatura', s.NOMBRE as 'nombre asignatura', n.NOTA FROM alumnos a JOIN notas n ON n.ID_ALUMNO= a.ID JOIN asignaturas s on s.ID= n.ID_ASIGNATURA  */