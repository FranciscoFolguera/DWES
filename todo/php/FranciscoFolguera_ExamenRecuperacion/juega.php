<?php

include_once './inc/header.php';
include_once './inc/funciones.php';
include_once './concurso.php';
session_start();
echo "<h2>Esto es la pagina de juega</h2>";
if (!isset($_SESSION['concurso'])) {
    //die("No se ha cargado el objeto concurso en la sesion");
}

$tema=$_SESSION['tema'];


$contadorPreguntas = 0;
$concurso = new Concurso($tema,0);

$lista=$concurso->cargaPreguntas($tema);
$concurso->setListaPreguntas($lista);
$pregunta=$concurso->cogerPregunta(0);
echo "<h3>$pregunta</h3>";

if (!isset($_GET['enviar'])) {
    include './inc/formJuego.php';
} else {
    $opcion=$_GET['enviar'];
    
    if ($opcion==='COMPROBAR') {
        echo "<h3>hola</h3>";
        $respuestaForm = $_GET['respuesta'];
        $acertado=$concurso->esCorrecta($respuestaForm, $contadorPreguntas);
        if($acertado===true){
            echo "<h3>Has acertado enhorabuena</h3>";
        }else{
             echo "<h3>Has fallado</h3>";
        }
        
        
    } else if ($opcion==='PISTA') {
       
        $pista=$concurso->getPista(0);
        echo "esta es la pista $pista";
    } else if ($opcion==='VER SOLUCION') {
       
        $concurso->esCorrecta($respuestaForm, $contadorPreguntas);
    } else if ($opcion==='SIGUIENTE') {
        
        $concurso->esCorrecta($respuestaForm, $contadorPreguntas);
    }
}



//$concurso ->getPregunta($contadorPreguntas);

include_once './inc/footer.php';
