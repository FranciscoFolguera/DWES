<?php

class Cliente{
    
    private $cl_dni;
    private $cl_nombre;
    private $cl_direccion;
    private $cl_telefono;
    private $cl_email;
    private $cl_fnacimiento;
    private $cl_fcliente;
    private $cl_ncuenta;
    private $cl_salario;
    
    function __construct($cl_dni=null,$cl_nombre=null, $cl_direccion=null, $cl_telefono=null, $cl_email=null, $cl_fnacimiento=null, $cl_fcliente=null, $cl_ncuenta=null, $cl_salario=null) {
        $this->cl_dni=$cl_dni;
        $this->cl_nombre = $cl_nombre;
        $this->cl_direccion = $cl_direccion;
        $this->cl_telefono = $cl_telefono;
        $this->cl_email = $cl_email;
        $this->cl_fnacimiento = $cl_fnacimiento;
        $this->cl_fcliente = $cl_fcliente;
        $this->cl_ncuenta = $cl_ncuenta;
        $this->cl_salario = $cl_salario;
    }
    function getCl_dni() {
        return $this->cl_dni;
    }

    function getCl_nombre() {
        return $this->cl_nombre;
    }

    function getCl_direccion() {
        return $this->cl_direccion;
    }

    function getCl_telefono() {
        return $this->cl_telefono;
    }

    function getCl_email() {
        return $this->cl_email;
    }

    function getCl_fnacimiento() {
        return $this->cl_fnacimiento;
    }

    function getCl_fcliente() {
        return $this->cl_fcliente;
    }

    function getCl_ncuenta() {
        return $this->cl_ncuenta;
    }

    function getCl_salario() {
        return $this->cl_salario;
    }

   

    function setCl_nombre($cl_nombre) {
        $this->cl_nombre = $cl_nombre;
    }

    function setCl_direccion($cl_direccion) {
        $this->cl_direccion = $cl_direccion;
    }

    function setCl_telefono($cl_telefono) {
        $this->cl_telefono = $cl_telefono;
    }

    function setCl_email($cl_email) {
        $this->cl_email = $cl_email;
    }

    function setCl_fnacimiento($cl_fnacimiento) {
        $this->cl_fnacimiento = $cl_fnacimiento;
    }

    function setCl_fcliente($cl_fcliente) {
        $this->cl_fcliente = $cl_fcliente;
    }

    function setCl_ncuenta($cl_ncuenta) {
        $this->cl_ncuenta = $cl_ncuenta;
    }

    function setCl_salario($cl_salario) {
        $this->cl_salario = $cl_salario;
    }


}