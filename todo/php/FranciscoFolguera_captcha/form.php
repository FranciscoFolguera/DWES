<html>
    <head>
       <title>Captcha</title>	
        <meta name="author" content="Francisco Folguera ">
        <meta charset="UTF-8">
    </head>
    <body>
        <?php
        session_start();
        include_once './img/funciones.php';
        if (!isset($_POST['submit'])) {
            $colr = rand_color();
            $texto = rand_text();
            ?>
            <h1> Formulario de registro </h1>
            <form action='form.php' method='POST'>
                Nombre: <input type='text' name='nombre' ><br>

                <div>
                    <img src='img/captcha.php' alt='' width='500' height='500' vspace='1' align='top' ><br>

                    Introduzca código de seguridad: 
                    <input type='text' name='captcha' size='8' maxlength='10'><br>
                </div>
                <input type='submit' name='submit' value='Enviar'>
            </form>
            
            
            <?php
            
        } else {

            if (strcmp($_SESSION['captcha'], filtrado($_POST['captcha']))==0) {
                $link = mysqli_connect("localhost", "root", "1234") or die("No se ha podido acceder al servidorde la base de datos");

                mysqli_select_db($link, "dwes") or die("no se ha podido acceder a la base de datos");
                //realizamos conulta
                $nombre = filtrado($_POST['nombre']);
                $consulta = mysqli_query($link, "select * from usuario where login = '$nombre'");
                $numfilas = mysqli_num_rows($consulta);
               
                print_r($numfilas);
                if ($numfilas !=0) {
                    $_SESSION['login'] = $nombre;

                       
  
                   header("Location: resgistrado.php");
                }else{
                    echo "<h4>Ese usuario no esta registrado</h4>";
                     $archivoActual = $_SERVER['PHP_SELF'];
                    header("Refresh:2; $archivoActual");
                }
                ?>
               
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