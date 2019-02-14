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

$sql2 = 'SELECT * FROM programas';
$filas2=$bbdd->consulta($sql2);
$bbdd->muestra($filas2);

$sql1 = 'SELECT * FROM invitados';
$filas1=$bbdd->consulta($sql1);
$bbdd->muestra($filas1);

include_once './include/footer.php';

