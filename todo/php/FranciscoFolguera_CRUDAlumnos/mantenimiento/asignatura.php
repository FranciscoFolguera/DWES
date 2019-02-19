<?php
include_once '../include/header.php';
?>
<h3>CRUD de ASIGNATURAS</h3>
<?php
session_start();
include '../include/funciones.php';
include '../conex/conex_PDO.php';

$conex = new conectaBD('clasedaw18');



//$resultado = $conex->obtenerConex()->query("SELECT * FROM asignaturas");
$resultado = $conex->consulta("SELECT * FROM asignaturas");
/*
  if ($resultado) {

  $row_cnt = $resultado->num_rows;
  }
 * 
 */

$numFilas = count($resultado);
?>
<table>
    <tr>
        <th>ID</th>
        <th>NOMBRE</th>
        <th>CURSO</th>
        <th>CICLO</th>
    </tr>
    <?php
    for ($i = 0; $i < $numFilas; $i++) {
        $id = $resultado[$i]["ID"];
        ?>
        <tr>
            <td><a href="<?php echo"http://localhost/GitDWES/todo/php/CRUDAlumnos/mantenimiento/asignatura.php?id=$id"; ?>"><?php echo $resultado[$i]["ID"]; ?></a></td> 
            <td><?php echo $resultado[$i]["NOMBRE"]; ?></td>
            <td><?php echo $resultado[$i]["CURSO"]; ?></td>      
            <td><?php echo $resultado[$i]["CICLO"]; ?></td>


        </tr>
        <?php
    }
    if (isset($_GET["id"])) {
        $idGet = $_GET["id"];
        $_SESSION['id'] = $idGet;
        //echo $idGet;
        $resultadoGET = $conex->consulta("SELECT id,nombre,curso,ciclo FROM asignaturas where id=$idGet");
        //  print_r($resultadoGET);
        if ($resultadoGET) {

            //  $row_cnt = $resultadoGET->num_rows;
            

            $cursoGET = $resultadoGET[0]["curso"];
            $cicloGET = $resultadoGET[0]["ciclo"];
            $nombreGET = $resultadoGET[0]["nombre"];
        }
    }
    ?>
</table>
<?php
if (!isset($_GET['submit'])) {
    //no se ha enivado
    if (!isset($_GET['id'])) {
        $nombreGET = $cursoGET = $cicloGET = "";
        ?>
        <form action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?> method="GET">
            Nombre: <input type="text" name="name" ><br>
            Curso: <input type="text" name="curso" ><br>
            Curso: <input type="text" name="ciclo" ><br>

            <input type="submit" name="submit" value="crear">
            <input type="submit" name="submit" value="eliminar">
            <input type="submit" name="submit" value="modificar">
        </form>
        <?php
    }else{
    ?>
    <form action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?> method="GET">

        Nombre: <input type="text" name="name" value=<?php echo $nombreGET; ?>><br>
        Curso: <input type="text" name="curso" value=<?php echo $cursoGET; ?>><br>
        Curso: <input type="text" name="ciclo" value=<?php echo $cicloGET; ?>><br>

        <input type="submit" name="submit" value="crear">
        <input type="submit" name="submit" value="eliminar">
        <input type="submit" name="submit" value="modificar">
    </form>
    <?php
    }
} 

if (isset($_GET['submit']) && isset($_SESSION['id'])) {
    $nombreForm = filtrado($_GET['name']);
    $cursoForm = filtrado($_GET['curso']);
    $cicloForm = filtrado($_GET['ciclo']);
    $action = filtrado($_GET["submit"]);
    $idQuery = $_SESSION['id'];
    echo "<h2>$action y $idQuery</h2>";

    if ($action === "modificar") {
        if (test_nombre($nombreForm) && test_nombre($cursoForm) && test_nombre($cicloForm)) {
            echo "se va a cambiar a $nombreForm , $cursoForm ,$cicloForm";
            $resultadoQuery = $conex->updateAsignatura($nombreForm, $cursoForm, $cicloForm, $idQuery);
            if ($resultadoQuery) {
                echo "modificiación completada";
            } else {
                echo "error";
            }
        } else {
            echo "<h2>A donde vas xooooooooooooooooooooooooorro</h2>";
        }
    }
    if ($action === "eliminar") {
        $stmt_delete = $conex->deleteAsignatura($idQuery);


        if ($stmt_delete == true) {
            echo 'usuario borrado';
        } else {
            $stmt_select_asignatura = $conex->selectAsignatura($idQuery);

            var_dump($stmt_select_asignatura);
            print_r($stmt_select_asignatura);

            if ($stmt_select_asignatura) {
                echo 'no se puede borrar el alumno porque esta referenciado en otras tablas';
            }
        }
        //$resultadoQuery->close();
    }
}
if (isset($_GET['submit']) && $_GET['submit'] === "crear") {

    if (test_nombre($nombreForm) && test_nombre($cursoForm) && test_nombre($cicloForm)) {


        $resultadoQuery = $conex->insertAsignatura($nombreForm, $cursoForm, $cicloForm);

        if ($resultadoQuery) {
            echo "se ha creado satisfactoriamenre completada";
        } else {
            echo "error";
        }
        // $resultadoQuery->close();
    }
}
if (isset($_GET['submit'])) {
    $archivoActual = $_SERVER['PHP_SELF'];
    header("Refresh:2; $archivoActual");
}
$conex->close();

include_once '../include/footer.php';
