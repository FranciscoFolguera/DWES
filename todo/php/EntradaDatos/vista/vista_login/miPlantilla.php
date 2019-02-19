
<?php
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
    $dni = $_GET['dni'];
    $password = $_GET['password'];
    $action = $_GET["submit"];

    if ($action === "login") {
        
    } else {
        ?>
        <form action="./registro.php" method="GET">
            DNI: <input type="text" name="dni" value=<?php echo $dni; ?>><br>
            Password: <input type="text" name="password" value=<?php echo $password; ?>><br>
            Nombre: <input type="text" name="nombre"><br>
            Telefono: <input type="date" name="telefono"><br>
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