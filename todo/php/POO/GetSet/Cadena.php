<?php

class Cadena {

    private $texto = "";
    private $metodosPermitidos = array("stroupper", "str_split", "str_repeat", "crypt");

    function getTexto() {
        return $this->texto;
    }

    function setTexto($texto) {
        $this->texto = $texto;
    }

    public function __call($nombreMetodo, $argumento) {

        $aux = null;
        array_unshift($argumento, $this->texto);
        
        if(in_array($nombreMetodo, $this->metodosPermitidos)){
            $aux= call_user_func($nombreMetodo,$argumento);
        }else{
            die("El metodo $nombreMetodo no existe");
        }
        return $aux;
    }

}
//programa
$c= new Cadena();
$c->setTexto('Hola-mundo');
$nuevo_texto=$c->str_split();
echo 'el texto obtenido con str_split es: ';
print_r($nuevo_texto);

//Metodos que existen

echo $c->strtoupper()."<br>";
echo $c->str_repeat(3)."<br>";
echo $c->crypt(1)."<br>";
//metdodos que no existen

echo $c->strlen();
echo"<pre>";
print_r($c);
echo"</pre>";


