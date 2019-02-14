<?php
include_once 'funciones.php';

if (!defined('PAISES'))
{
    define('PAISES',"paises.txt");
}

if (!defined('LIBROS'))
{
    define('LIBROS',"libros.txt");
}

class Concurso 
{
    
	private $nombre;
	private $datos = array(array());
        private $indice=-1;

	function __construct()
        {
            
        }
		
}
?>