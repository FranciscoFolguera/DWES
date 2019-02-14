<?php

class Cuenta{
    
    private $cu_ncu;
    private $cu_dni1;
    private $cu_dni2;
    private $cu_salario;
    
    function __construct($cu_ncu=null, $cu_dni1=null, $cu_dni2=null, $cu_salario=null) {
        $this->cu_ncu = $cu_ncu;
        $this->cu_dni1 = $cu_dni1;
        $this->cu_dni2 = $cu_dni2;
        $this->cu_salario = $cu_salario;
    }
    function getCu_ncu() {
        return $this->cu_ncu;
    }

    function getCu_dni1() {
        return $this->cu_dni1;
    }

    function getCu_dni2() {
        return $this->cu_dni2;
    }

    function getCu_salario() {
        return $this->cu_salario;
    }


}