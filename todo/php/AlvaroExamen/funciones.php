<?php
    if (!defined('SEPARADOR_CAMPO'))
    {
        define('SEPARADOR_CAMPO',"|");
    }
	
    function filtrado($datos)
    {
        $datos = trim($datos);
        $datos = stripslashes ($datos);
        $datos = htmlspecialchars($datos);
        return $datos;
    }

    function leerPreguntas($nombre)
    {
        $array=array();
        
        $fichero = @fopen($nombre,'r');
        if(!$fichero)
        {
            die("Error al abrir el fichero");
        }
        else
        {
            while(!feof($fichero)) 
            {
                $linea = fgets($fichero);
                $linea = trim($linea);
                if (!empty($linea)) 
                {
                    array_push($array,$linea);
                }
            }
        }
        fclose($fichero);
        echo '<pre>';
	print_r($array);
	echo '</pre>';
        return $array;
    }
?>

