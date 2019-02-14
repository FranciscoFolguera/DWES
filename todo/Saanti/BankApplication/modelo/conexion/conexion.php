<?php

class conectaBD {

    private $conn = null;

    public function __construct($database = '') {
        $dsn = "mysql:host=localhost;dbname=$database;charset=UTF8";
        try {
            $this->conn = new PDO($dsn, 'root', '1234');
          
        } catch (PDOException $ex) {
            echo "<h2>Conexion fallida</h2>";
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
            $query->setFetchMode(PDO::FETCH_ASSOC);
            $rows = $query->fetchAll();

            return $rows;
        } catch (Exception $ex) {
            echo"todo mal";
            echo("error al ejecutar la orden: " . $ex->getMessage());
        }
    }
    
    public function obtenerConex(){
    return $this->conn;
    }

}
