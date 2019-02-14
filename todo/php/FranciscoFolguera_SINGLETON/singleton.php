<?php


class Singleton {

    private $ldb;
    private $filas = array();
    private static $instancia;

    private function __construct() {

        $this->ldb = new PDO("mysql:host=localhost;dbname=radio;charset=UTF8", 'root', '1234');
    }

    public static function singleton() { {
            if (!isset(self::$instancia)) {
                $miclase = __CLASS__;
                self::$instancia = new $miclase;
            }
            return self::$instancia;
        }
    }

    public function __clone() {
        trigger_error('La clonación de este objeto no está permitida', E_USER_ERROR);
    }

    public function presentadores() {

      $this->filas=null;
        $query = $this->ldb->prepare("SELECT * FROM presentadores");
                $query->setFetchMode(PDO::FETCH_ASSOC);

        $query->execute();

        if ($query->rowCount() > 0) {

            while ($row = $query->fetch()) {
                $this->filas[] = $row;
            }
            return $this->filas;
        }
    }

    public function invitados() {
              $this->filas=null;

        $query = $this->ldb->prepare("SELECT * FROM invitados");
        $query->setFetchMode(PDO::FETCH_ASSOC);
        $query->execute();
        if ($query->rowCount() > 0) {
            while ($row = $query->fetch()) {
                $this->filas[] = $row;
            }
            return $this->filas;
        }
    }

    public function muestra($rows) {

        try {
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



