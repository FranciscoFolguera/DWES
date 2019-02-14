<?php
        require_once  'modelo/bd_mysql.php';

class Presentadores {

    public function getPresentadores() {
        $conexion = new Conceta('radio');
        $conexion->obtenerConex();
        try {
            $query = $conexion->obtenerConex()->query('SELECT * FROM presentadores');
            $rows = array();
            $query->setFetchMode(PDO::FETCH_ASSOC);
            $rows = $query->fetchAll();

            return $rows;
        } catch (Exception $ex) {
            echo"todo mal";
            echo("error al ejecutar la orden: " . $ex->getMessage());
        }
        $conexion->cierraConexion();
    }

}


