<?php
session_start();
//include_once './imagen.php';
if (!isset($_SESSION['color'])) {
    $_SESSION['forma'] = 0;
    $_SESSION['color'] = 0;
}
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>

        <div>
            <img src='creaimagen.php' alt=''  vspace='1' align='top' ><br>
            <img src='creaimagen_1.php' alt=''  vspace='1' align='top' ><br>
            <img src='creaimagen_1_1.php' alt=''  vspace='1' align='top' ><br>

            <?php
            echo "<pre>";
            print_r($_SESSION);
            // session_destroy();
            $puntos = 0;
            $listaforma = $_SESSION['forma'];
            $listacolor = $_SESSION['color'];

            if (($listaforma[0] === $listaforma[1]) && $listaforma[0] === $listaforma[2]) {
                $puntos = 5;
            }
            if (($listacolor[0] === $listacolor[1]) && $listacolor[0] === $listacolor[2]) {
                $puntos = 20;
            }
            if ((($listaforma[0] === $listaforma[1]) && $listaforma[0] === $listaforma[2]) && (($listacolor[0] === $listacolor[1]) && $listacolor[0] === $listacolor[2])) {
                $puntos = 100;
            }
            echo "<h2>Estos son tus puntos $puntos</h2>";
            ?>
        </div>






    </body>
</html>
<?php
session_destroy();
