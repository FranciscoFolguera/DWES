
<?php
session_start();
if (!isset($_GET['submit'])) {
    ?>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="GET">
        DNI: <input type="text" name="dni"><br>
        Password: <input type="text" name="password"><br>
        <input type="submit" name="submit" value="login">

        <input type="submit" name="submit" value="registrar">
    </form>

    <?php
} else {
    //recordar filtrado

    $action = $_GET["submit"];

    if ($action === "login") {

        include_once './login.php';


        if (isset($_SESSION['sig_in'])) {
            if (isset($_SESSION['ERR_C'])) {
                $err_c = $_SESSION['ERR_C'];
                echo "<h4>$err_c</h4>";
            }
            unset($_SESSION['ERR_C']);


            muestra_tabla();
            ?>
            <form action="./login.php" method="GET">
                Comentario: <input type="text" name="coment"><br>
                Fecha: <input type="date" name="fecha_c" disabled="disabled"><br>
                <input type="submit" name="submit" value="registrar_c">
            </form>

            <?php
        } else {
            echo "estoy aqui";
            $dni = filtrado($_GET['dni']);
            $password = filtrado($_GET['password']);
            $accede = accede_usuario($dni, $password);
            if ($accede === 32) {
                echo 'ahora qui';
                $_SESSION['sig_in'] = 1;
                //$archivoActual = $_SERVER['PHP_SELF']."?submit=login";
              $_GET['submit']='login';
            } else {
                echo "<h2>$accede</h2>";
            }
                          $archivoActual = $_SERVER['PHP_SELF'];
  
                header("Refresh:2; $archivoActual");
        }
    } else if ($_SESSION['err_registro'] != null) {
        $dni = $_GET['dni'];
        $password = $_GET['password'];
        ?>
        <form action="./registro.php" method="GET">
            DNI: <input type="text" name="dni" value=<?php echo $dni; ?>><br>
            Password: <input type="text" name="password" value=<?php echo $password; ?>><br>
            Nombre: <input type="text" name="nombre"><br>
            Telefono: <input type="text" name="telefono"><br>
            Fecha nacimiento: <input type="date" name="fecha_n"><br>
            Email: <input type="email" name="email" value=<?php echo $password; ?>><br>
            Sexo:
            <input type="radio" name="gender" value="male" checked> Male<br>
            <input type="radio" name="gender" value="female"> Female<br>
            <input type="radio" name="gender" value="other"> Other

            <input type="submit" name="submit" value="registrar">
        </form>

        <?php
        $err = $_SESSION['err_registro'];
        echo "<h2>$err</h2>";
    } else {
        $dni = $_GET['dni'];
        $password = $_GET['password'];
        ?>
        <form action="./registro.php" method="GET">
            DNI: <input type="text" name="dni" value=<?php echo $dni; ?>><br>
            Password: <input type="text" name="password" value=<?php echo $password; ?>><br>
            Nombre: <input type="text" name="nombre"><br>
            Telefono: <input type="text" name="telefono"><br>
            Fecha nacimiento: <input type="date" name="fecha_n"><br>
            Email: <input type="email" name="email" value=<?php echo $password; ?>><br>
            Sexo:
            <input type="radio" name="gender" value="male" checked> Male<br>
            <input type="radio" name="gender" value="female"> Female<br>
            <input type="radio" name="gender" value="other"> Other

            <input type="submit" name="submit" value="registrar">
        </form>

        <?php
    }
}