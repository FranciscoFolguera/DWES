<?php

include_once './include/header.php';


class conectaBD {

    private $conn = null;

    public function __construct($database = '') {
        $dsn = "mysql:host=localhost;dbname=$database;charset=UTF8";
        try {
            $this->conn = new PDO($dsn, 'kiko', '1234');
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
            $query= $this->conn->query($select);
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

}

$bbdd = new conectaBD('radio');

echo "<h3>Hacemos una select de la tabla presentadores, la unica en la que tiene privilegios</h3>";
$sql2 = 'SELECT * FROM presentadores';
$filas2=$bbdd->consulta($sql2);
$bbdd->muestra($filas2);
echo "<h3>intentamos un select en otra tabla</h3>";
$sql3 = 'SELECT * FROM programas';
$filas3=$bbdd->consulta($sql3);
$bbdd->muestra($filas3);





include_once './include/footer.php';

