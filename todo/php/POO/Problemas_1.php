<?php
include '../../inc/headerPOO1.php';
?>
<h1>Francisco Folguera Sánchez</h1>
<?php ?>
<h3>Problema  1</h3>
<?php

class Cabecera {

    private $titulo;
    private $posicionTitulo;
    private $colorFond;
    private $colorLetra;

    function __construct($titulo, $posicionTitulo, $colorFond, $colorLetra) {
        $this->titulo = $titulo;
        $this->posicionTitulo = $posicionTitulo;
        $this->colorFond = $colorFond;
        $this->colorLetra = $colorLetra;
    }

    public function crearTitulo() {
        echo '<div style="font-size:50px;text-align:' . $this->posicionTitulo . ';color:';
        echo $this->colorLetra . ';background-color:' . $this->colorFond . ';">';
        echo $this->titulo;
        echo '</div>';
    }

}

$cabecera = new Cabecera('Título del ejercio 1', 'center', '#FAD7A0', '#283747');
$cabecera->crearTitulo();
//$cabecera->clasCss();
?>
<h3>Problema  2</h3>
<?php

class Tabla {

    private $numFilas;
    private $numColumnas;
    private $listaDatos = [];

    public function __construct($numFilas, $numColumnas) {
        $this->numFilas = $numFilas;
        $this->numColumnas = $numColumnas;
    }

    public function cargarDato($dato, $rowDato, $colDato, $colorFuente, $colorFondo) {
        $oDato = new Dato($dato, $rowDato, $colDato, $colorFuente, $colorFondo);
        array_push($this->listaDatos, $oDato);
    }

    public function escribirTabla() {
        ?>
        <table style="border: 3px solid lightgrey">
            <?php
            for ($i = 0; $i < $this->numFilas; $i++) {
                echo '<tr>';
                for ($j = 0, $dato = false; $j < $this->numColumnas; $j++, $dato = false) {
                    ?>
                    <td style="border: 3px solid lightgrey">
                        <?php
                        for ($iniceLista = 0; $iniceLista < count($this->listaDatos); $iniceLista++) {
                            $actual = $this->listaDatos[$iniceLista];
                            if ($actual->getRow() === $i && $actual->getCol() === $j) {
                                $dato = true;
                                ?>
                                <span style="background-color: <?php echo $actual->getFondo(); ?>;color: <?php echo $actual->getColor(); ?>"> <?php echo $actual->getDato(); ?></span>
                                <?php
                            }
                        }
                        if (!$dato) {
                            echo 'vacio';
                        }
                        echo '</td>';
                    }
                    echo '</tr>';
                }
                echo '</table>';
            }

        }

        class Dato {

            private $dato;
            private $row;
            private $col;
            private $color;
            private $fondo;

            function __construct($dato, $row, $col, $color, $fondo) {
                $this->dato = $dato;
                $this->row = $row;
                $this->col = $col;
                $this->color = $color;
                $this->fondo = $fondo;
            }

            function getDato() {
                return $this->dato;
            }

            function getRow() {
                return $this->row;
            }

            function getCol() {
                return $this->col;
            }

            function getColor() {
                return $this->color;
            }

            function getFondo() {
                return $this->fondo;
            }

            function setDato($dato) {
                $this->dato = $dato;
            }

            function setRow($row) {
                $this->row = $row;
            }

            function setCol($col) {
                $this->col = $col;
            }

            function setColor($color) {
                $this->color = $color;
            }

            function setFondo($fondo) {
                $this->fondo = $fondo;
            }

        }

        $tabla = new Tabla(5, 5);
        $tabla->cargarDato('HOLA', 1, 2, 'yellow', 'grey');
		$tabla->cargarDato('MUNDO', 1, 4, 'blue', 'red');
        $tabla->cargarDato('MUNDO', 3, 2, 'blue', 'red');
        $tabla->escribirTabla();
        ?>
        <h3>Problema  3</h3>
        <?php

        class Web {

            private $links;
            private $titulos;

            function __construct($links, $titulos) {
                $this->links = $links;
                $this->titulos = $titulos;
            }

            function getLinks() {
                return $this->links;
            }

            function getTitulos() {
                return $this->titulos;
            }

        }

        class Menu {

            private $miPagina = Array();
            private $mostrar;

            public function addPagina(Web $pagina) {
                $this->miPagina[] = $pagina;
            }

            public function mostrarVertical() {
                echo'<ul>';

                foreach ($this->miPagina as $valor) {


                    echo'<li> <a href="' . $valor->getLinks();
                    echo'">' . $valor->getTitulos();
                    echo'</a></li>';
                }

                echo'</ul>';
            }

            private function mostrarHorizontal() {


                foreach ($this->miPagina as $valor) {


                    echo' <a href="' . $valor->getLinks();
                    echo'">' . $valor->getTitulos();
                    echo'</a>';
                }
            }

            public function mostrar($mostrar) {

                if ($mostrar == "horizontal") {
                    $this->mostrarHorizontal();
                } else if ($mostrar == "vertical") {
                    $this->mostrarVertical();
                }
            }

        }

        $pagin1 = new Web('https://www.google.com/', 'Google');
        $pagin2 = new Web('https://www.youtube.com/', 'Youtube');
        $pagin3 = new Web('https://es.wikipedia.org/wiki/Wikipedia:Portada', 'Wikipedia');
        $pagin4 = new Web('http://php.net/manual/es/index.php', 'Manual PHP');


        $menu = new Menu();
        $menu->addPagina($pagin1);
        $menu->addPagina($pagin2);
        $menu->addPagina($pagin3);
        $menu->addPagina($pagin4);

        $menu->mostrar("vertical");
        $menu->mostrar("horizontal");
        ?>

        <?php
        include '../../inc/footer.php';
        ?>

