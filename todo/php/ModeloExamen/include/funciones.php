<?php

function filtrado($datos) {
    $datos = trim($datos); //Elimina espacios antes y despues de los datos
    $datos = stripslashes($datos); //Elimina los /
    $datos = htmlspecialchars($datos); // Traduce caracteres especiales en entidades H
    return $datos;
}

function usuario($listaNombres, $listaPasswords, $nombre, $passwords) {
    //con muchos nombres iguales
    $encontrado = -3;
    $claveNombre = -1;
    $clavePassword = -2;
    foreach ($listaNombres as $clave => $valor) {
        if ($valor === $nombre) {
            //el nombre es igual al que se pasa del formulario
            $claveNombre = $clave;
            foreach ($listaPasswords as $claveC => $valorC) {
                //la contraseña es igual a la del formulario
                if ($valorC === $passwords) {
                    $clavePassword = $claveC;
                    if ($clavePassword === $claveNombre) {
                        //comprobamos si es el nombre y la contraseña pertenecen a la misma persona
                        $encontrado = $clavePassword;
                    }
                }
            }
        }
    }
    return $encontrado;
}

function usuarioDistintNombres($listaNombres, $listaPasswords, $nombre, $password) {
    //con muchos nombres iguales
    $encontrado = -3;
    $claveNombre = -1;
    $clavePassword = -2;
    foreach ($listaNombres as $clave => $valor) {
        if ($valor === $nombre) {
            //el nombre es igual al que se pasa del formulario
            $claveNombre = $clave;
        }
    }
    foreach ($listaPasswords as $claveC => $valorC) {
        //la contraseña es igual a la del formulario
        if ($valorC === $password) {
            $clavePassword = $claveC;
        }
    }
    if ($clavePassword === $claveNombre) {
        //comprobamos si es el nombre y la contraseña pertenecen a la misma persona
        $encontrado = $clavePassword;
    }
    return $encontrado;
}

function imprimirMenuAdmin(){
    
    ?>
<a href="">Menu admin</a>
<a href=""></a>
<a href=""></a>
<?php
}
function imprimirMenuUser(){
    
    ?>
<a href="">Menu user</a>
<a href=""></a>
<a href=""></a>
<?php
}