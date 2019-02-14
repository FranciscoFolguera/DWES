<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//DEFINO LAS CONSTANTES SEGUN EL PALO
define("OROS", "OROS");
define("COPAS", "COPAS");
define("ESPADAS", "ESPADAS");
define("BASTOS", "BASTOS");


//DEFINO LAS CONSTANTES SEGUN EL Nº
define("ASS", 15);
define("TRES", 3);
define("SOTA", 10);
define("CABALLO", 11);
define("REY", 12);

Class Carta {

    private $palo;
    private $valor;

    function __construct($palo, $valor) {
        $this->palo = $palo;
        $this->valor = $valor;
    }

    function imprime() {
        echo "$this->valor de $this->palo";
    }

    function puntos() {
      if($this->valor===1){
          return 15;
      }else if($this->valor===3){
          return 13;
      }else{
          return $this->valor;
      }
    }

}

Class Baraja {

    private $mazo = [[], [], [], []];

    function __construct() {

        for ($tipo = 0; $tipo < 4; $tipo++) {
            $palo = "";
            if ($tipo === 1) {
                $palo = OROS;
            } else if ($tipo === 2) {
                $palo = COPAS;
            } else if ($tipo === 3) {
                $palo = ESPADAS;
            } else {
                $palo = BASTOS;
            }

            for ($num = 0; $num < 10; $num++) {

                if ($num <=6) {
                    $this->mazo[$palo][ASS] = new Carta($palo, $num+1);
                } if($num>6){
                    $this->mazo[$palo][ASS] = new Carta($palo, $num+3);
                }
            }
        }
    }

    function barajar($mazo) {
        array_rand($mazo, 2);
        //array_ra
    }

    function sacarCarta($mazo) {

        shift($mazo);
    }

    function deolverCarta($mazo, $carta) {
        array_push($mazo, $carta);
    }

}
