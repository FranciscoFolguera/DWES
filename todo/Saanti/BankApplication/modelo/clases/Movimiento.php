<?php

class Movimiento {

    private $mo_ncu;
    private $mo_fecha;
    private $mo_hora;
    private $mo_concepto;
    private $mo_importe;
    
    function __construct($mo_ncu=null, $mo_fecha=null, $mo_hora=null, $mo_concepto=null, $mo_importe=null) {
        $this->mo_ncu = $mo_ncu;
        $this->mo_fecha = $mo_fecha;
        $this->mo_hora = $mo_hora;
        $this->mo_concepto = $mo_concepto;
        $this->mo_importe = $mo_importe;
    }
    function getMo_ncu() {
        return $this->mo_ncu;
    }

    function getMo_fecha() {
        return $this->mo_fecha;
    }

    function getMo_hora() {
        return $this->mo_hora;
    }

    function getMo_concepto() {
        return $this->mo_concepto;
    }

    function getMo_importe() {
        return $this->mo_importe;
    }

    function setMo_ncu($mo_ncu) {
        $this->mo_ncu = $mo_ncu;
    }

    function setMo_fecha($mo_fecha) {
        $this->mo_fecha = $mo_fecha;
    }

    function setMo_hora($mo_hora) {
        $this->mo_hora = $mo_hora;
    }

    function setMo_concepto($mo_concepto) {
        $this->mo_concepto = $mo_concepto;
    }

    function setMo_importe($mo_importe) {
        $this->mo_importe = $mo_importe;
    }



}
