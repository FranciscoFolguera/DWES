<?php

//session_start();

include 'header.php';


define("ADMINISTRADOR", 1);
define("REGISTRADO", 2);
define("ERROR_NORESGISTRADO", -1);
define("ERROR_PASSWORD", -2);
define("ERROR_EXPIRADO", -3);

function vaildaUser($nombre, $contraseña) {
    $tipoUsuario = 0;
    $error = 0;
    $erroUsuario = false;
    $bien=false;
    $año = date("Y") + 1;
    $fechaVal = date("j, n, $año");
    $hoy = date("j, n, Y");

    // $arrayUsuario = array($nombre => array("contraseña" => $contraseña, "fechaExp" => "", "tipo" => $tipoUsuario));

    $arrayUsuario = array(
        "kiko" => array("contraseña" => "4444", "fechaExp" => $fechaVal, "tipo" => ADMINISTRADOR),
        "rafa" => array("contraseña" => "4444", "fechaExp" => $fechaVal, "tipo" => REGISTRADO));


    foreach ($arrayUsuario as $key => $value) {
        if ($key === $nombre) {

            $erroUsuario = true;
            if ($erroUsuario === true) {
                foreach ($value as $key2 => $value2) {
                    if ($key2 === "contraseña") {
                        if ($value2 === $contraseña) {
                            $bien=true;
                        } else{
                            $error = ERROR_PASSWORD;
                        }
                    }if($key2==="tipo"||$bien===true){
                        $tipoUsuario=$value2;
                    }
                    /*
                      if ($key2 === "fechaExp") {

                      }

                     */
                }
            }
        }
    }
    if ($erroUsuario === false) {
        $error = ERROR_NORESGISTRADO;
    }
    if ($error >= 0) {
        return $tipoUsuario;
    } else {
        return $error;
    }
}

include 'footer.php';
?>

