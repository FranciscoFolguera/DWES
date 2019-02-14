<?php

include_once './include/header.php';

class conectaBD { 

    private $conn = null;

    public function __construct($database = '') {
        $dsn = "mysql:host=localhost;dbname=$database;charset=UTF8";
        try {
            $this->conn = new PDO($dsn, 'root', '1234');
            echo"Conectado a la base de datos RADIO";
        } catch (PDOException $ex) {
            die("ERROR 1" . $ex->getMessage() . "<br/>");
        }
    }

    public function __destruct() {
        $this->conn = null;
    }

    public function consulta($select) {
        try {
            $query = $this->conn->query($select);
            $rows = array();
//$query = $this->conn->prepare($select);
            $query->setFetchMode(PDO::FETCH_ASSOC);
            while ($result = $query->fetch()) {
                $rows[] = $result;
            }
            return $rows;
        } catch (Exception $ex) {
            echo"todo mal";
            echo("error al ejecutar la orden: " . $ex->getMessage());
        }
    }

   
    public function muestra($rows) {  
        
       try{
            echo "<table>";
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

    public function insertFila($dni, $nombre, $apellido, $sueldo) {
        $datos = array(':par1' => $dni, ':par2' => $nombre, ':par3' => $apellido, ':par4' => $sueldo);
        $sql = ' INSERT INTO presentadores (dni,nombre,apellidos,sueldo)
                                        VALUES ( :par1 , :par2 , :par3, :par4) ';
        $q = $this->conn->prepare($sql);
        return $q->execute($datos);
    }

    public function cambioApellido($dni, $apellido) {
        $datos = array(':par1' => $dni, ':par2' => $apellido);
        $sql = ' UPDATE presentadores SET apellidos= :par2 WHERE dni=:par1 ';
        $q = $this->conn->prepare($sql);
        return $q->execute($datos);
    }

    public function borraPresentador($dni) { // Prepara y ejecuta consulta
        $datos = array(':par1' => $dni);
        $sql = ' DELETE FROM presentadores WHERE dni=:par1 ';
        $q = $this->conn->prepare($sql);
        return $q->execute($datos);
    }

}

$bbdd = new conectaBD('radio');



//consulta despues del insert
if ($bbdd->insertFila('01234567M', 'Arroba', 'Policia', 2100) !== false) {
    echo ' se inserto con exito';
    echo "<br>";
} else {
    echo 'error al insertar';
}
//consulta despues del insert
$sql = 'SELECT * FROM presentadores';
$filas = $bbdd->consulta($sql);
$bbdd->muestra($filas);


//modificamos el apellido de Arroba
if ($bbdd->cambioApellido('01234567M', 'Bombero') !== false) {
    echo ' se ha cambiado el apellido con exito';
        echo "<br>";

} else {
    echo 'error al cambiar el apellido';
}

//Consulta despues del update
$sql2 = 'SELECT * FROM presentadores';
$filas2 = $bbdd->consulta($sql2);
$bbdd->muestra($filas2);

if($bbdd->borraPresentador('01234567M')!==false){
    echo ' se ha borrado con exito';
        echo "<br>";

} else {
    echo 'error al borrar el presntador';
}

$sql3 = 'SELECT * FROM presentadores';
$filas3 = $bbdd->consulta($sql3);
$bbdd->muestra($filas3);

include_once './include/footer.php';

