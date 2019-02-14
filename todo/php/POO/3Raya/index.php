<?php

include './includes/header.php';
include './Clases/Ficha.php';
include './Clases/Tablero.php';
include './Clases/Jugador.php';
// 

session_start();

$Err = false;
$nombre1 = $nombre2 = $ficha1 = $ficha2 = "";
$ErrNombre1 = $ErrNombre2 = $ErrNombre = $ErrFicha1 = $ErrFicha2 = $ErrFicha = "";

function filtrado($datos) {
    $datos = trim($datos); //Elimina espacios antes y despues de los datos
    $datos = stripslashes($datos); //Elimina los /
    $datos = htmlspecialchars($datos); // Traduce caracteres especiales en entidades H
    return $datos;
}

function comprobarFila($tablero, $filaFicha, $columnaFicha) {
    $puntos = 0;
    $tresEnRaya = false;
    $ficha = $tablero->verFicha($filaFicha, $columnaFicha);

    for ($columna = 0; $columna < 3; $columna++) {

        $fichaDentro = $tablero->verFicha($filaFicha, $columna);
        if ($ficha === $fichaDentro) {
            $puntos++;
        }
    }

    if ($puntos === 3) {
        $tresEnRaya = true;
    }
    return $tresEnRaya;
}

function comprobarColumna($tablero, $filaFicha, $columnaFicha) {
    $puntos = 0;
    $tresEnRaya = false;
    $ficha = $tablero->verFicha($filaFicha, $columnaFicha);

    for ($fila = 0; $fila < 3; $fila++) {

        $fichaDentro = $tablero->verFicha($fila, $columnaFicha);
        if ($ficha === $fichaDentro) {
            $puntos++;
        }
    }
    if ($puntos === 3) {
        $tresEnRaya = true;
    }
    return $tresEnRaya;
}

function comprobarDiagonal1($tablero, $filaFicha, $columnaFicha) {
    $puntos = 0;
    $tresEnRaya = false;
    $ficha = $tablero->verFicha($filaFicha, $columnaFicha);
    if ($filaFicha == $columnaFicha) {


        for ($diago = 0; $diago < 3; $diago++) {



            $fichaDentro = $tablero->verFicha($diago, $diago);
            if ($ficha === $fichaDentro) {
                $puntos++;
            }
        }
    }
    if ($puntos === 3) {
        $tresEnRaya = true;
    }
    return $tresEnRaya;
}

function comprobarDiagonal2($tablero, $filaFicha, $columnaFicha) {
    $puntos = 0;
    $tresEnRaya = false;
    $ficha = $tablero->verFicha($filaFicha, $columnaFicha);
    if (($filaFicha == 0 && $columnaFicha == 2) || ($filaFicha == 1 && $columnaFicha == 1) || ($filaFicha == 2 && $columnaFicha == 0)) {


        $fila = 2;
        for ($columna = 0; $columna < 3; $columna++) {


            $fichaDentro = $tablero->verFicha($fila, $columna);


            if ($ficha === $fichaDentro) {
                $puntos++;
            }
            $fila--;
        }
    }
    if ($puntos === 3) {
        $tresEnRaya = true;
    }
    return $tresEnRaya;
}

function comprobarDiagonal($tablero, $filaFicha, $columnaFicha) {
    $tresEnRaya = comprobarDiagonal1($tablero, $filaFicha, $columnaFicha);
    if ($tresEnRaya == false) {
        $tresEnRaya = comprobarDiagonal2($tablero, $filaFicha, $columnaFicha);
    }
    return $tresEnRaya;
}

function comprobar3Raya($tablero, $filaFicha, $columnaFicha) {
    //  $tresEnRaya = false;

    $tresEnRaya = comprobarColumna($tablero, $filaFicha, $columnaFicha);
    if ($tresEnRaya == false) {
        $tresEnRaya = comprobarFila($tablero, $filaFicha, $columnaFicha);
        if ($tresEnRaya == false) {
            $tresEnRaya = comprobarDiagonal($tablero, $filaFicha, $columnaFicha);
        }
    }
    return $tresEnRaya;
}

if ((isset($_POST['aceptar']))) {
    //no se ha enivado


    $Err = false;

    $ErrNombre1 = $ErrNombre2 = $ErrNombre = $ErrFicha1 = $ErrFicha2 = $ErrFicha = "";

    if (empty($_POST['nombre1'])) {
        $Err = true;
        $ErrNombre1 = "Tienes que poner un nombre al jugador 1";
    };
    if (empty($_POST['nombre2'])) {
        $Err = true;
        $ErrNombre2 = "Tienes que poner un nombre al jugador 2";
    };
    if (empty($_POST['ficha1'])) {
        $Err = true;
        $ErrFicha1 = "Selecciona una ficha";
    };
    if (empty($_POST['ficha2'])) {
        $Err = true;
        $ErrFicha2 = "Selecciona una ficha";
    };

    $ficha1 = $_REQUEST['ficha1'];
    $ficha2 = $_REQUEST['ficha2'];
    if ($ficha1 == $ficha2) {
        $Err = true;
        $ErrFicha = "Las fichas no pueden ser iguales";
    }

    $nombre1 = $_REQUEST['nombre1'];
    $nombre2 = $_REQUEST['nombre2'];
    if ($nombre1 == $nombre2) {
        $Err = true;
        $ErrNombre = "Los nombres no pueden ser iguales";
    }

    if ($Err == false) {
        $nombre1 = $_REQUEST['nombre1'];
        $nombre2 = $_REQUEST['nombre2'];
        $ficha1 = $_REQUEST['ficha1'];
        $ficha2 = $_REQUEST['ficha2'];

        $nombre1 = filtrado($nombre1);
        $nombre2 = filtrado($nombre2);



//Creamos a los jugadores
        //$jugador1 = new Jugador($nombre1, $ficha1);
//Creamos las fichas
        $fichaJoker = new Ficha("Ficha joker", "images/joker.png");
        $fichaBatman = new Ficha("Ficha batman", "images/batman.png");


        if ($ficha1 == "B") {
            //$fichaBatman = new Ficha("Ficha batman", "images/batman.png");
            $jugador1 = new Jugador($nombre1, $fichaBatman);
            $jugador2 = new Jugador($nombre2, $fichaJoker);
        } else if ($ficha1 == "J") {
            $jugador1 = new Jugador($nombre1, $fichaJoker);
            $jugador2 = new Jugador($nombre2, $fichaBatman);
        }
//Creamos el tag imagen de cada ficha 
        $joker = $fichaJoker->etiquetaImg("Ficha numero 1", "90", "90", "images/joker.png");
        $batman = $fichaBatman->etiquetaImg("Ficha numero 1", "90", "90", "images/batman.png");

        /*
          Creamos dos jugadores:
          -Les asignamos un nombre y una ficha
         */




        $_SESSION['jugador1'] = $jugador1;
        $_SESSION['jugador2'] = $jugador2;
        $tablero = new Tablero($fichaJoker, $fichaBatman);
        $_SESSION['tablero'] = $tablero;



        $_SESSION['newGame'] = "false";


        $tablero->iniciar();
        $tablero->mostrar();
    }
}
if (!isset($_SESSION['tablero'])) {

    include './htmls/form.php';
} else {

    // $newGame = $_SESSION['newJuego'];
    //if($newGa)//
    $jugador1 = $_SESSION['jugador1'];
    $jugador2 = $_SESSION['jugador2'];
    $tablero = $_SESSION['tablero'];

    $fichasPlayer1 = Array();
    $fichasPlayer2 = Array();
    $nombre1 = $jugador1->getNombre();
    $nombre2 = $jugador2->getNombre();

    if (isset($_GET['fila'])) {

        if (isset($_GET['columna'])) {


            $fila = $_GET['fila'];
            $columna = $_GET['columna'];
            // $_SESSION['newGame'];

           

            //$tablero->ponerFicha($fila, $columna, $joker);
            $fichaActual = $tablero->getFicha();
            $tablero->ponerFicha($fila, $columna, $fichaActual->etiquetaImg($fichaActual->getNombre(), 100, 100));

            $tres = comprobar3Raya($tablero, $fila, $columna);

            if ($tres === true) {

                $punto = 1;
                $turno = $tablero->getTurno();
                $nombreGanador = "";
                if ($turno == 1) {
                    $nombreGanador = $jugador1->getNombre();

                    $jugador1->sumaPuntos($punto);
                } else if ($turno == 2) {
                    $jugador2->sumaPuntos($punto);
                    $nombreGanador = $jugador2->getNombre();
                }

                $tablero->mostrarFinalizado();

                echo"<h2>Ha ganado 1 punto $nombreGanador </h2>";

                $tablero->iniciar();
                $tablero->mostrar();

                $_SESSION['newGame'] = "true";
                
               
            } else if ($tres === false) {
                $tablero->mostrar();
            }


            $punto1 = $jugador1->getPuntos();
            $punto2 = $jugador2->getPuntos();
            echo"<h3>$nombre1 tiene $punto1 puntos </h3>";
            echo"<h3>$nombre2 tiene $punto2 puntos </h3>";

            echo 'Si quieres salir del juego pulsa <a href="http://localhost/GitDWES/todo/php/POO/3Raya/htmls/ganador.php">aquí</a>';






            $tablero->cambioTurno();
        }
    }

    $_SESSION['tablero'] = $tablero;
}

include './includes/footer.php';
?>