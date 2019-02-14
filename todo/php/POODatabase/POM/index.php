<?php

class conectaBD {

    protected $db;

    function __construct() {
        $dsn = 'mysql:host=localhost;dbname=prueba;charset=utf8';
        $usuario = 'root';
        $pass = '1234';
        try {
            $this->db = new PDO($dsn, $usuario, $pass);
        } catch (PDOException $e) {
            die("¡Error!: " . $e->getMessage() . "<br/>");
        }
    }

    public function getConBD() {
        return $this->db;
    }

}

$c1 = new conectaBD();
$id_c1 = $c1->getConBD();
foreach ($id_c1->query(' SELECT * from tabla1') as $fila) {
    print_r($fila);
}
$c1 = NULL;
