<?php

Class Jugador {

    private $nombre;
    private $ficha;
    private $puntos;

    function __construct($nombre, $ficha) {
        $this->nombre = $nombre;
        $this->ficha = $ficha;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getFicha() {
        return $this->ficha;
    }

    function getPuntos() {
        return $this->puntos;
    }

    function sumaPuntos($puntos=1) {

      //  $puntos;
        $this->puntos+=$puntos;
        return $puntos;
    }

}
