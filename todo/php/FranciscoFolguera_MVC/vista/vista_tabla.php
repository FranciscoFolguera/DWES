<?php

?>
<!DOCTYPE html>
<html lang="ES">
	<head>
		<title>CRUD de alumnos y asignaturas</title>			 
		<meta name="author" content="Francisco Folguera ">
		<meta charset="UTF-8">
	</head>
	<body>
	
<h1>Listado de PRESENTADORES</h1>

<table>
    <thead>
        <tr>
            <?php
             foreach ($presentadores[0] as $clave => $valor) {
                 ?>
            <th>
                <?php echo $clave ?>
            </th>
               <?php
            }
            ?>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($presentadores as $key => $fila) {

            ?> <tr>
                <?php
                foreach ($fila as $clave => $valor) {
                         ?>
            <td>
                <?php echo $valor ?>
            </td>
               <?php
                }
                ?> </tr>
                <?php
            }
            ?>
    </tbody>
</table>

	</body>
</html>