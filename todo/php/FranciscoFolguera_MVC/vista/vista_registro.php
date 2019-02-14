
<?php ?>
<!DOCTYPE html>
<html lang="ES">
    <head>
        <title>CRUD de alumnos y asignaturas</title>			 
        <meta name="author" content="Francisco Folguera ">
        <meta charset="UTF-8">
    </head>
    <body>

        <h1>Listado de PRESENTADORES</h1>
        <?php
        foreach ($presentadores as $key => $fila) {
            
?>
        <h4>Este es el presentador:  <?php echo $key+=1;?></h4>
        <?php
            foreach ($fila as $clave => $valor) {
                echo $clave ." :".$valor." ";
            }
            
        }
        ?>


    </body>
</html>