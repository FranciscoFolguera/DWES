<?php

include '../inc/header.php';

echo "<h1>Francisco Folguera Sánchez</h1>";
$Err = false;
$nombre = $pwd = $edad = "";
$ErrNombre = $ErrPwd = $ErrEdad = "";

function filtrado($datos) {
    $datos = trim($datos); //Elimina espacios antes y despues de los datos
    $datos = stripslashes($datos); //Elimina los /
    $datos = htmlspecialchars($datos); // Traduce caracteres especiales en entidades H
    return $datos;
}

if (!isset($_POST['aceptar'])) {
    //no se ha enivado
    ?>


    <?php

    include '../inc/form.php';
    ?>



    <?php

} else {

    $Err = false;

    $ErrNombre = $ErrPwd = $ErrEdad = "";

    if (empty(filtrado($_POST['nombre']))) {
        $Err = true;
        $ErrNombre = "El nombre es requerido";
    };

    if ((empty(filtrado($_POST['contra1']))) || (empty(filtrado($_POST['contra2'])))) {
        $Err = true;
        $ErrPwd = "Debes";
    };
    if (($_POST['contra1']) != ($_POST['contra2'])) {
        $Err = true;
        $ErrPwd = "Las contraseñas no coinciden";
    };


    if ($Err == true) {
        include '../inc/form.php';
    } else {

        $clave = $_REQUEST['contra1'];
        echo "<p>Contraseña: $clave</p>";
        $nombre = filtrado($_REQUEST['nombre']);
        echo "<p>Nombre: $nombre</p>";

        // Nos conectamos a la base de datos
        $link = mysqli_connect("localhost", "root", "1234") or die("No se ha podido acceder al servidorde la base de datos");

        mysqli_select_db($link, "dwes") or die("no se ha podido acceder a la base de datos");
        //realizamos conulta





        $consulta = mysqli_query($link, "select * from usuario where login = '$nombre'");
        $numfilas = mysqli_num_rows($consulta);
        echo "CONTROL:   $numfilas";


        if ($numfilas == 0) {
            $consulta = mysqli_query($link, "INSERT INTO usuario VALUES ('$nombre','$clave')");

            echo'<p>Enhorabuena se ha regitrado correctamente</p>';
            echo"<div>Su nombre: $nombre y su contraseña: $clave</div>";
        } else {
            header("Location: nombreUsado.php");
        }


        mysqli_close($link);
    }
}
?>
<?php

include '../inc/footer.php';
?>

