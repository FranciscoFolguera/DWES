<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Laura Pérez</title>
        <meta charset="UTF-8">
        <meta name="viewport"  content="width=device-width, initial-scale=1.0">
        <link href="./css/estilos.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <?php
        include_once("./inc/funciones.php");
        include_once("clases.php");
        session_start();
        if (!isset($_SESSION['usuario'])) {
            die("no tiene permisos para ejecutar esta página");
        }

        if (!isset($_GET['aceptar'])) {
            ?>

            <form method="get" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                Cookie:  <input type="text" name="cookie" required="required"><br><br>
                Valor: <input type="text" name="valor" required="required"><br><br>
                <input type="submit" name="aceptar" value="registrar">
            </form>
            <?php
        } else {
            $cookie = $_GET['cookie'];
            $value = $_GET['valor'];
            $int = 20;
            setcookie($cookie, $value, time() + $int);
            ver($_COOKIE);
            ver($_SESSION);
            $lista = array();
            $lista[0] = 'pepe';
            $lista[1] = 'ss';
            $lista[2] = 'carlos';
            
            ver($lista);
            
            unset($lista[0]);
                        ver($lista);
                        $lista[0]='ssdfggag';
                        ver($lista);
                        foreach ($lista as $key => $value) {
                            echo $key. "->>>>>".$value."<br>";
                        }

           
        }
        ?>


    </body>
</html>