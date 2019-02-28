<?php

class Conexion {

    private $ldb;
    private $filas = array();
    private static $instancia;

    const USUARIO = 'kikoex2';
    const PASSWORD = '1234';

    private function __construct() {

        $this->ldb = new PDO("mysql:host=localhost;dbname=examen;charset=UTF8", Conexion::USUARIO, Conexion::PASSWORD);
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
