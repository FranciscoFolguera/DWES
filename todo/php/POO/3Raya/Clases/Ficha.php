<?php

Class Ficha {

    private $nombre;
    private $imagen;
    
   

    function __construct($nombre, $imagen) {
        $this->nombre = $nombre;
        $this->imagen = $imagen;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getImagen() {
        return $this->imagen;
    }

    function etiquetaImg($alt, $alto, $ancho, $imagen= null) {
      $imagen=$this->getImagen();
        $urlImagen='<img src="'.$imagen.'" alt="'.$alt.'" width="'.$ancho.'" height="'.$alto.'">';
     // echo "$urlImagen";
        return $urlImagen;
        
    }

}
