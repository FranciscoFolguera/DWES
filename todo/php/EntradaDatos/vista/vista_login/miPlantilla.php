
<?php
session_start();

include_once './login.php';

if (isset($_SESSION['login'])&&isset($_SESSION['sig_in'])) {
    $_POST['submit']='login';
}
if (!isset($_POST['submit'])) {
    /*
    if (isset($_POST['dni']) && isset($_POST['password'])) {
        $dni = filtrado($_POST['dni']);
        $password = filtrado($_POST['password']);
    } else {
        $dni = '0000000Z';
        $password = 'Nohay2sin*3';
    }
     
     */
    ?>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        DNI: <input type="text" name="dni" ><br>
        Password: <input type="password" name="password" required="required"><br>

        <input type="submit" name="submit" value="login">

        <input type="submit" name="submit" value="registrar">
    </form>
    <?php
} else {


    $action = $_POST["submit"];
    if (strcmp($action, 'login')==0) {


        if (isset($_SESSION['sig_in'])) {
            if (isset($_SESSION['ERR_C'])) {
                $err_c = $_SESSION['ERR_C'];
                echo "<h4>$err_c</h4>";
            }


            unset($_SESSION['ERR_C']);


            muestra_tabla();
            ?>
            <form action="./login.php" method="POST">
                  Comentario:   <textarea name="coment" rows="10" cols="30"></textarea>

              <!--<input type="text" name="coment"><br>-->
                Fecha: <input type="date" name="fecha_c" disabled="disabled"><br>
                <input type="submit" name="submit" value="registrar_c">
            </form>

            <?php
        } else {

            $dni = filtrado($_POST['dni']);
            $password = filtrado($_POST['password']);
            //$password= verify($password, $hash);
            $accede = accede_usuario($dni, $password);
            if ($accede === 32) {

                $_SESSION['sig_in'] = 1;

                $_SESSION['login'] = 1;
                $_POST['submit'] = 'login';
                //header('Location: index.php');
            } else {
                echo "<h2>$accede</h2>";
            }
            $archivoActual = $_SERVER['PHP_SELF'];
            header("Refresh:3; $archivoActual");
        }
    } else if (strcmp($action, 'registrar')==0) {

        if (isset($_SESSION['err_registro'])) {
           
            $dni = filtrado($_POST['dni']);
            $password = filtrado($_POST['password']);
            ?>
            <form action="./registro.php" method="POST">
                DNI: <input type="text" name="dni" ><br>
                Password: <input type="password" name="password" ><br>
                Nombre: <input type="text" name="nombre"><br>
                Telefono: <input type="text" name="telefono"><br>
                Fecha nacimiento: <input type="date" name="fecha_n"><br>
                Email: <input type="email" name="email" value="sadasdas@gmail.com"><br>
                Sexo:<br>
                <input type="radio" name="gender" value="H" checked> Hombre<br>
                <input type="radio" name="gender" value="M"> Mujer<br>
                <input type="radio" name="gender" value="O"> Other

                <input type="submit" name="submit" value="registrar">
            </form>

            <?php
            //$err = $_SESSION['err_registro'];
            //echo "<h2>$err</h2>";
            unset($_SESSION['err_registro']);
        } else {
          
            $dni = filtrado($_POST['dni']);
            $password = filtrado($_POST['password']);
            ?>
            <form action="./registro.php" method="POST">
                DNI: <input type="text" name="dni" ><br>
                Password: <input type="password" name="password" ><br>
                Nombre: <input type="text" name="nombre"><br>
                Telefono: <input type="text" name="telefono"><br>
                Fecha nacimiento: <input type="date" name="fecha_n"><br>
                Email: <input type="email" name="email" value="sadasdas@gmail.com"><br>
                Sexo:<br>
                <input type="radio" name="gender" value="H" checked> Hombre<br>
                <input type="radio" name="gender" value="M"> Mujer<br>
                <input type="radio" name="gender" value="O"> Other

                <input type="submit" name="submit" value="registrar">
            </form>

            <?php
        }
    }
}