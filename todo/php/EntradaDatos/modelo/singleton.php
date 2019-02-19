<?php


class Singleton {

    private $ldb;
    private $filas = array();
    private static $instancia;

    private function __construct() {

        $this->ldb = new PDO("mysql:host=localhost;dbname=entrada_datos;charset=UTF8", 'usama', '1234');
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

    public function obtenerConex() {
        return $this->ldb;
    }
   

}



