<?php

class Coche {

    private $velocidad;
    private $color;
    private $propiedades = Array();

//    function getVelocidad() {
//        return $this->velocidad;
//    }
//
    private function controlVelocidad($valor) {
        if ($valor > 0 && $valor <= 200) {
            $this->velocidad = $valor;
        }
    }

    public function __get($nombre) {
        echo"Se esta solocitando la propiedad $nombre" . "<br>";
        $valorRetorno="";
        
        switch ($nombre) {
            case'velocidad':
            case 'color':
               $valorRetorno= $this->$nombre;
                break;
            default :
               if(array_key_exists($nombre, $this->propiedades)){
                   $valorRetorno=$this->propiedades[$nombre];
               }
        }
        return $valorRetorno;
    
    }

    public function __set($nombre, $valor) {
        echo "Se esta estableciendo la propiedad $nombre con el valor $valor <br>";
        switch ($nombre) {
            case'velocidad':
                $this->controlVelocidad($valor);
                break;
            case 'color':
                break;
            default :
                $this->propiedades[$nombre] = $valor;
        }
    }

}

//Programa

$fordFiesta = new Coche();

$fordFiesta->velocidad = 198;
$fordFiesta->color = "amarillo";
$fordFiesta->puertas = 5;
echo"<pre>";
print_r($fordFiesta);
echo"</pre>";

echo"La propiedad puertas es: ".$fordFiesta->puertas."<br>";
echo"La propiedad velocidad es: ".$fordFiesta->velocidad."<br>";
echo"La propiedad faros es: ".$fordFiesta->faros."<br>";