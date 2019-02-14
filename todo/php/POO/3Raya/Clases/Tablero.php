<?php

class Tablero {

    private $ficha1;
    private $ficha2;
    private $turno;
    private $tablero = [[], [], []];

    function getFicha() {
        if ($this->turno == 1) {
            return $this->ficha1;
        } else if ($this->turno == 2) {
            return $this->ficha2;
        }
    }

    function cambioTurno() {
        if ($this->turno == 1) {
            return $this->turno = 2;
        } else if ($this->turno == 2) {
            return $this->turno = 1;
        }
    }

    function getTurno() {
        if ($this->turno == 1) {
            return $this->turno = 1;
        } else if ($this->turno == 2) {
            return $this->turno = 2;
        }
    }

    function __construct($ficha1, $ficha2) {
        $this->ficha1 = $ficha1;
        $this->ficha2 = $ficha2;
        $this->turno = 1;
    }

    function getTablero() {
        return $this->tablero;
    }

    function iniciar() {

        for ($fila = 0; $fila < 3; $fila++) {

            for ($columna = 0; $columna < 3; $columna++) {

                $url = htmlspecialchars($_SERVER["PHP_SELF"]);
                $url = $url . "?fila=$fila&columna=$columna";



                $this->tablero[$fila][$columna] = '<a href="' . $url . '">____</a>';
            }
        }
    }

    function mostrar() {


        echo '<table class="tablero">';
        for ($fila = 0; $fila < 3; $fila++) {
            echo'<tr>';
            for ($columna = 0; $columna < 3; $columna++) {
                echo'<td style="height:105px; width:105px;">';
                echo $this->tablero[$fila][$columna];
                echo"</td>";
            }
            echo'</tr>';
        }
        echo '</table>';
    }

    function mostrarFinalizado() {


        echo '<table class="tablero">';
        for ($fila = 0; $fila < 3; $fila++) {
            echo'<tr>';
            for ($columna = 0; $columna < 3; $columna++) {
                  $url = htmlspecialchars($_SERVER["PHP_SELF"]);
                $url = $url . "?fila=$fila&columna=$columna";
                echo"<td>";
                if ($this->tablero[$fila][$columna] == '<a href="' . $url . '">____</a>') {
                    echo $this->tablero[$fila][$columna] = "";
                    
                } else {
                    echo $this->tablero[$fila][$columna];
                  
                }




                echo"</td>";
            }
            echo'</tr>';
        }
        echo '</table>';
    }

    function seleccionado() {
        echo "<div>HOLA</div>";
    }

    function ponerFicha($fila, $columna, $url) {
        $this->tablero[$fila][$columna] = $url;
    }

    function verFicha($fila, $columna) {
        return $this->tablero[$fila][$columna];
    }

}
