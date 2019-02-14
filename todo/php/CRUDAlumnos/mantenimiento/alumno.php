<?php
include_once '../include/header.php';
?>
<h3>CRUD de ALUMNOS</h3>
<?php
session_start();
include '../include/funciones.php';

$conex = new mysqli("localhost", "root", "1234", "clasedaw18");
//$conex = new mysqli("db4free.net", "lauraperez", "iesetgc2018", "clasedaw18");


if (mysqli_connect_errno()) {
    printf("Conecxión fallida: %s\n", mysqli_connect_error());
    exit();
}

$resultado = $conex->query("SELECT * FROM alumnos");

if ($resultado) {

    $row_cnt = $resultado->num_rows;
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
    while ($row = $resultado->fetch_assoc()) {
        $id = $row["ID"];
        ?>
        <tr>
            <td><a href="<?php echo"http://localhost/GitDWES/todo/php/CRUDAlumnos/mantenimiento/alumno.php?id=$id"; ?>"><?php echo $row["ID"]; ?></a></td> 
            <td><?php echo $row["NOMBRE"]; ?></td>
            <td><?php echo $row["FECHA_NACIMIENTO"]; ?></td>      
            <td><?php echo $row["MAYOR_EDAD"]; ?></td>


        </tr>
        <?php
    }

    if (isset($_GET["id"])) {
        $idGet = $_GET["id"];
        $_SESSION['id'] = $idGet;
        //echo $idGet;
        // $resultadoGET = $conex->query("SELECT id,nombre,fecha_nacimiento FROM alumnos where id=$idGet");
        

        $stmt = $conex->prepare("SELECT id,nombre,fecha_nacimiento FROM alumnos where id=?");
        $stmt->bind_param("i", $idGet);
        $stmt->execute();
        $result = $stmt->get_result();
        //if ($result->num_rows === 0) exit('No rows');
        while ($row = $result->fetch_assoc()) {
            $fechaNacGET = $row['fecha_nacimiento'];
            $nombreGET = $row['nombre'];
            
        }
        //var_export($names);
    }
    ?>
</table>
<?php
if (!isset($_GET['submit'])) {
    //no se ha enivado
    if (!isset($_GET['id'])) {
        $nombreGET = $fechaNacGET = "";
         ?>
    <form action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?> method="GET">
        Nombre: <input type="text" name="name"><br>
        Fecha de nacimiento: <input type="date" name="fechaNac"><br>
        <input type="submit" name="submit" value="crear">
        <input type="submit" name="submit" value="eliminar">
        <input type="submit" name="submit" value="modificar">
    </form>
    <?php
    }else{
    ?>
    <form action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?> method="GET">
        Nombre: <input type="text" name="name" value=<?php echo $nombreGET; ?>><br>
        Fecha de nacimiento: <input type="date" name="fechaNac" value=<?php echo $fechaNacGET; ?>><br>
        <input type="submit" name="submit" value="crear">
        <input type="submit" name="submit" value="eliminar">
        <input type="submit" name="submit" value="modificar">
    </form>
    <?php
    }
} 

if (isset($_GET['submit']) && isset($_SESSION['id'])) {
    $nombreForm = ($_GET['name']);
    $fechaForm = ($_GET['fechaNac']);
    $action = $_GET["submit"];
    $idQuery = $_SESSION['id'];
    echo "<h2>$action y $idQuery</h2>";

    if ($action === "modificar") {
        
        if (test_nombre($nombreForm) && strcmp($fechaForm, "") !== 0) {
        $mayor = getAge($fechaForm);


       echo "se va a cambiar a $nombreForm y $fechaForm";
        
        $stmt_update = $conex->prepare("UPDATE alumnos set NOMBRE=?, FECHA_NACIMIENTO=?, MAYOR_EDAD=? where ID=?");
        $stmt_update->bind_param("ssii", $nombreForm,$fechaForm,$idQuery,$mayor);
        $result=$stmt_update->execute();
        echo 'bieeeeeeeeen';
        var_dump($result);
    }else{
        echo "<h2>A donde vas zorro</h2>";
    }
        
       
    }
    if ($action === "eliminar") {
      
        $stmt_delete= $conex->prepare("DELETE from alumnos where ID=?");
        $stmt_delete->bind_param("i", $idQuery);
        $result_delete=$stmt_delete->execute();
       
      if($result_delete==true){
        echo 'usuario borrado';  
      }else{
           $stmt_select_nota = $conex->prepare("SELECT id_alumno FROM notas where id_alumno=?");
        $stmt_select_nota->bind_param("i", $idQuery);
        $stmt_select_nota->execute();
        $result = $stmt_select_nota->get_result();
        //if ($result->num_rows === 0) exit('No rows');
        $referenciado = $result->fetch_assoc();
       
            if($referenciado>0){
                echo 'no se puede borrar el alumno porque esta referenciado en otras tablas';
            }
        
      }
        //$resultadoQuery->close();
    }
}
if (isset($_GET['submit']) && $_GET['submit'] === "crear") {
    $nombreForm = filtrado($_GET['name']);

    $fechaForm = filtrado($_GET['fechaNac']);

    if (test_nombre($nombreForm) && strcmp($fechaForm, "") !== 0) {
        $mayor = getAge($fechaForm);


        $resultadoQuery = $conex->prepare("INSERT INTO alumnos (NOMBRE, FECHA_NACIMIENTO, MAYOR_EDAD) VALUES (?, ?, ?)");
        $resultadoQuery->bind_param('ssi', $nombreForm, $fechaForm, $mayor);

        $resultadoQuery->execute();
        if ($resultadoQuery) {
            echo "modificiación completada";
        } else {
            echo "error";
        }
        $resultadoQuery->close();
    }else{
        echo "<h2>A donde vas zorro</h2>";
    }
}
if(isset($_GET['submit'])){
    $archivoActual = $_SERVER['PHP_SELF'];
header("Refresh:2; $archivoActual");
}

$conex->close();
