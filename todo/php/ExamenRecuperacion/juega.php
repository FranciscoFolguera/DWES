<?php

include_once './inc/header.php';
include_once './inc/funciones.php';
include_once './concurso.php';
session_start();
echo "<h2>Esto es la pagina de juega</h2>";
if (!isset($_SESSION['concurso'])) {
    //die("No se ha cargado el objeto concurso en la sesion");
}

$tema = $_SESSION['tema'];


$contadorPreguntas = 0;
$concurso = new Concurso($tema, 0);

if (!isset($_SESSION['lista_p'])) {
    $lista = $concurso->cargaPreguntas($tema);
   $concurso->setListaPreguntas($lista);
   
    $_SESSION['lista_p'] = $lista;
    $_SESSION['puntuacion']=0;
    $concurso->setIndiceMas1();
    //$indice=$_SESSION['indice_p'];
} else {
    $lista = $_SESSION['lista_p'];
}
//$concurso->setIndice($indice);
 $concurso->setListaPreguntas($lista);
//$concurso->setListaPreguntas($lista);
$pregunta = $concurso->cogerPregunta();
echo "<h3>$pregunta</h3>";
echo "<h3>Pista: </h3>";


if (!isset($_GET['enviar'])) {
    include './inc/formJuego.php';
} else {
    $opcion = $_GET['enviar'];

    if ($opcion === 'COMPROBAR') {
       
        $respuestaForm = $_GET['respuesta'];
        $acertado = $concurso->esCorrecta($respuestaForm, $contadorPreguntas);
        
       echo " $respuestaForm ------> $acertado";
        if ($acertado === true) {
            echo "<h3>Has acertado enhorabuena</h3>";
            $concurso->setIndiceMas1();
            $_SESSION['puntuacion']=$_SESSION['puntuacion']+1;
        } else {
            echo "<h3>Has fallado </h3>";
        }
        header('Location:juega.php');

    } else if ($opcion === 'PISTA') {

        $pista = $concurso->getPista(0);
        echo "esta es la pista $pista";
    } else if ($opcion === 'VER SOLUCION') {

        $concurso->esCorrecta($respuestaForm, $contadorPreguntas);
    } else if ($opcion === 'SIGUIENTE') {

        $concurso->esCorrecta($respuestaForm, $contadorPreguntas);
    }
}
$puntuacion= $_SESSION['puntuacion'];
echo "<h3>Puntuación: $puntuacion</h3>";

//$concurso ->getPregunta($contadorPreguntas);

include_once './inc/footer.php';
