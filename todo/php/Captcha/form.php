<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
<?php
session_start();
if (!isset($_POST['submit'])) {
    ?>
    <h1> Formulario de registro </h1>
    <form action='form.php' method='POST'>
        Nombre: <input type='text' name='nombre' ><br>
        Email : <input type='text' name='email' ><br>
        Introduzca código de seguridad: <img src='img/captcha.php' alt='' width='75' height='20' vspace='1' align='top' >
        <input type='text' name='captcha' size='8' maxlength='10'><br>
        <input type='submit' name='submit' value='Enviar'>
    </form>
    <img src="img/fondo.php">
    <img src="img/captcha.php">
    <img src="img/img1.php">
    <?php
} else {
    If ($_SESSION['captcha'] == $_POST['captcha']) {
        ?>
        <h2> Registro correcto</h2>
        <?php
    } else {
        ?>
        <a href='form.php'>Intentar de nuevo </a>
        <?php
    }
}
?>
    </body>
</html>