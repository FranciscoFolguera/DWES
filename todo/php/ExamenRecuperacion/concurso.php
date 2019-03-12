<?php

class Concurso {

    const PAISES = 'pais';
    const LIBROS = 'libro';

    private $nombre;
    private $indice = -1;
    private $listaPreguntas = array();

    function setListaPreguntas($listaPreguntas) {
        $this->listaPreguntas = $listaPreguntas;
    }

    function getListaPreguntas() {
        return $this->listaPreguntas;
    }
    function setIndiceMas1() {
        $this->indice = $this->indice+1;
    }

        function __construct($nombre = null, $listaPreguntas = null) {
        $this->nombre = $nombre;
        //$this->indice = $indice;
        $this->listaPreguntas = $listaPreguntas;
    }

    public function cargaPreguntas($tema) {
        include_once './inc/funciones.php';

        if ($tema === Concurso::PAISES) {
            $fichero = 'paises.txt';
            $this->listaPreguntas = leerPreguntas($fichero);
            shuffle($this->listaPreguntas);
        } else if ($tema === Concurso::LIBROS) {
            $fichero = 'libros.txt';
            $this->listaPreguntas = leerPreguntas($fichero);
            shuffle($this->listaPreguntas);
        }

        return $this->listaPreguntas;
    }

    function cogerPregunta() {
       echo $this->indice;
        $pregunta = $this->listaPreguntas [$this->indice][0];
        return $pregunta;
    }

    public function getPista($indice) {
        $lista = $this->getListaPreguntas();
        $pista = "";


        foreach ($lista[$indice] as $key => $value) {
            if ($key === 2) {
                $pista = $value;
            }
        }
        return $pista;
    }

    public function getSolucion() {
        $respuesta = $this->listaPreguntas [$this->indice][1];
       echo $respuesta;
        return $respuesta;
    }

    public function getPregunta($indice) {
        $listaP = leerPreguntas($fichero);
        $pregunta = "";


        foreach ($listaP[$indice] as $key => $value) {
            if ($key === 0) {
                $pregunta = $value;
            }
        }
        return $pregunta;
    }

    public function esCorrecta($respuestaForm) {
        $esCorrecta = false;
        $respuestaPregunta = $this->getSolucion();
        
       

        if ($respuestaForm === $respuestaPregunta) {
            $esCorrecta = true;
        }
        return $esCorrecta;
    }

    public function siguientePregunta($indice, $listaP) {
        $siguientePregunta = true;
        $numeroPreguntas = count($listaP) -1;

        if ($indice >= $numeroPreguntas) {
            $siguientePregunta = false;
        }
        return $siguientePregunta;
    }

}
