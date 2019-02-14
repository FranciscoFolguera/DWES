<?php

class Conceta {

    private $conn = null;

    public function __construct($database = '') {
        $dsn = "mysql:host=localhost;dbname=$database;charset=UTF8";
        try {
            $this->conn = new PDO($dsn, 'root', '1234');
            //echo"Conectado a la base de datos RADIO";
        } catch (PDOException $ex) {
            die("ERROR 1" . $ex->getMessage() . "<br/>");
        }
    }

    public function obtenerConex() {
        return $this->conn;
    }
    public function cierraConexion(){
        $this->conn=null;
                
    }

}
