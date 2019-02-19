<?php

class conectaBD {

    private $conn = null;

    public function __construct($database = '') {
        $dsn = "mysql:host=localhost;dbname=$database;charset=UTF8";
        try {
            $this->conn = new PDO($dsn, 'root', '1234');
            echo"Conectado a la base de datos CRUD";
        } catch (PDOException $ex) {
            die("ERROR 1" . $ex->getMessage() . "<br/>");
        }
    }

    public function __destruct() {
        $this->conn = null;
    }
    public function close(){
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

   public function obtenerConex() {
        return $this->conn;
    }

    public function insertAsignatura($nombre, $curso, $ciclo) {
        $datos = array(':par1' => $nombre, ':par2' => $curso, ':par3' => $ciclo);
        $sql = ' INSERT INTO asignaturas (nombre,curso,ciclo)
                                        VALUES ( :par1 , :par2 , :par3) ';
        $q = $this->conn->prepare($sql);
        return $q->execute($datos);
    }

    public function updateAsignatura($nombre, $curso, $ciclo, $id) {
        $datos = array(':par1' => $nombre, ':par2' => $curso, ':par3' => $ciclo, ':par4' => $id);
        $sql = ' UPDATE asignaturas SET NOMBRE= :par1 , CURSO= :par2, CICLO= :par3 WHERE id=:par4 ';
        $q = $this->conn->prepare($sql);
        return $q->execute($datos);
    }

    public function deleteAsignatura($id) { // Prepara y ejecuta consulta
        $datos = array(':par1' => $id);
        $sql = ' DELETE FROM asignaturas WHERE id=:par1 ';
        $q = $this->conn->prepare($sql);
        return $q->execute($datos);
    }

    

    public function selectAsignatura($id) { // Prepara y ejecuta consulta
        $datos = array(':par1' => $id);
        $sql = ' SELECT id FROM asignaturas WHERE id=:par1 ';
        $q = $this->conn->prepare($sql);
        return $q->execute($datos);
    }

}
