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

    function __construct($nombre = null, $indice = null, $listaPreguntas = null) {
        $this->nombre = $nombre;
        $this->indice = $indice;
        $this->listaPreguntas = $listaPreguntas;
    }

    public function cargaPreguntas($tema) {
        include_once './inc/funciones.php';
        $listaPreguntas = array();
        if ($tema === Concurso::PAISES) {
            $fichero = 'paises.txt';
            $listaPreguntas = leerPreguntas($fichero);
            shuffle($listaPreguntas);
            
        } else {
            $fichero = 'libros.txt';
            $listaPreguntas = leerPreguntas($fichero);
            shuffle($listaPreguntas);
            
        }
        return $listaPreguntas;
    }

    function cogerPregunta($indice) {

        $lista = $this->getListaPreguntas();

        $pregunta = "";


        foreach ($lista[$indice] as $key => $value) {
            if ($key === 0) {
                $pregunta = $value;
            }
        }
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

    public function getSolucion($indice) {
        $listaP = $this->getListaPreguntas();
        $respuesta = "";


        foreach ($listaP[$indice] as $key => $value) {
            if ($key === 1) {
                $respuesta = $value;
            }
        }
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
public function esCorrecta($respuestaForm, $indice) {
        $esCorrecta = false;
        $respuestaPregunta = $this->getSolucion($indice);
        if ($respuestaForm === $respuestaPregunta) {
            $esCorrecta = true;
        }
        return $esCorrecta;
    }
    /*
      public function siguientePregunta($indice,$listaP){
      $siguientePregunta=true;
      $numeroPreguntas=count($listaP)--;

      if($indice>=$numeroPreguntas){
      $siguientePregunta=false;
      }
      return $siguientePregunta;
      } */
}
