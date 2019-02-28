<?php

function selectTododMovimientos() {
    include_once '../modelo/conexion/conexion.php';
    $connection = new conectaBD('banco');
    try {
        $select = 'SELECT * FROM movimientos';
        $query = $connection->obtenerConex()->query($select);
        $rows = array();
        $query->setFetchMode(PDO::FETCH_ASSOC);
        $rows = $query->fetchAll();

        return $rows;
    } catch (Exception $ex) {
        echo"todo mal";
        echo("error al ejecutar la orden: " . $ex->getMessage());
    }
}

function selectMovimientos(Movimiento $movimiento, $fechaInicial, $fechaFinal) {
    include_once '../modelo/conexion/conexion.php';
    include_once '../modelo/clases/Movimiento.php';
    $connection = new conectaBD('banco');
    //$movimiento = new Movimiento();
    $mo_ncu = $movimiento->getMo_ncu();

    $fallos = -1;
    try {

        $datos = array(':par1' => $mo_ncu);
        $sql = ' SELECT * FROM cuentas WHERE (cu_ncu=:par1) ';
        $q = $connection->obtenerConex()->prepare($sql);
        $q->execute($datos);
        $rows1 = array();
            $q->setFetchMode(PDO::FETCH_ASSOC);
            $rows1 = $q->fetchAll();
            //var_dump($rows1);
     //   var_dump($cuenta_existe);
        if (count($rows1)>0) {
            $datos = array(':par1' => $mo_ncu, ':par2' => $fechaInicial, ':par3' => $fechaFinal);
            $sql = ' SELECT * FROM movimientos WHERE ((mo_ncu=:par1) and (mo_fecha BETWEEN :par2 AND :par3))';
            $q = $connection->obtenerConex()->prepare($sql);
            $q->execute($datos);
            $rows = array();
            $q->setFetchMode(PDO::FETCH_ASSOC);
            $rows = $q->fetchAll();
            return $rows;
        }else{
            echo "todo esta mal";
            return $fallos;
        }
    } catch (Exception $ex) {
        echo"todo mal";
        echo("error al ejecutar la orden: " . $ex->getMessage());
    }
}

function muestra($rows) {

    try {
        echo "<table border=1>";
        echo"<tr>";
        foreach ($rows[0] as $clave => $valor) {
            echo "<th>" . $clave . "</th>";
        }
        echo"</tr>";
        foreach ($rows as $key => $fila) {

            echo"<tr>";
            foreach ($fila as $clave => $valor) {
                echo"<td>" . $valor . "</td>";
            }
            echo "</tr>";
        }


        echo"</table>";
    } catch (PDOException $ex) {
        echo("No se ha podido realizar esa consulta: " . $ex->getMessage() . "<br/>");
    }
}
