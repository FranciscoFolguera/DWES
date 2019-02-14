<?php

include_once './include/header.php';

function test_email($email) {
    $patron = "/^[a-zA-Z0-9]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,3}$/";
    if (preg_match($patron, $email)) {
        return true;
    }
    return false;
}

function test_telefono($telefono) {
    $expresion = '/^[9][1][0-9]{7}$/';
    if (preg_match($expresion, $telefono)) {
        return true;
    }
    return false;
}

function test_articulo($articulo) {
    $expresion = '/^[A-Z]{3}+[-][0-9]{3,5}$/';
    if (preg_match($expresion, $articulo)) {
        return true;
    }
    return false;
}

function test_ip($ip) {
    $expresion = "/^(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])([.](\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])){3}$/";
    if (preg_match($expresion, $ip)) {
        return true;
    }
    return false;
}
function test_password($password) {
    $expresion = '/[0-9]+[a-z]+[A-Z]+/';
    if (preg_match($expresion, $password)) {
        return true;
    }
    return false;
}


function test_password($password) {
    $expresion = '/(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])/';
    if (preg_match($expresion, $password)) {
        return true;
    }
    return false;
}

function test_nombre($nombre) {
    $expresion = '/^[a-zA-Z0-9]{2,}$/';
    if (preg_match($expresion, $nombre)) {
        return true;
    }
    return false;
}

//---------------- Se examina la validez de algunos correos

$correos = array('luis@ab.com', 'luis.garcia@ab.jz.es', 'luis.@ab.com', 'x@ab.jz..es');
for ($i = 0; $i < count($correos); $i++) {
    if (test_email($correos[$i]))
        echo " el email <strong>$correos[$i]</strong> es correcto <br>";
    else
        echo " el email <strong>$correos[$i]</strong> es erroneo <br>";
}

echo "<h3>Lista numeros de telefono:</h3>";
$telefono = array('916122031', '9161002233444', '906100233');
for ($i = 0; $i < count($telefono); $i++) {
    if (test_telefono($telefono[$i]))
        echo " El telefono <strong>$telefono[$i]</strong> es correcto <br>";
    else
        echo " El telefono <strong>$telefono[$i]</strong> es erroneo <br>";
}

echo "<h3>Lista de artículos: </h3>";
$articulo = array('AbC-1243', 'ABC-124355', 'AC-1243', 'ABC-12345');
for ($i = 0; $i < count($articulo); $i++) {
    if (test_articulo($articulo[$i]))
        echo " El articulo <strong>$articulo[$i]</strong> es correcto <br>";
    else
        echo " El articulo <strong>$articulo[$i]</strong> es erroneo <br>";
}


echo "<h3>Lista de IPs: </h3>";
$ip = array('692.123.250.1', '2052.150.2.3', '256.20.30.5', '255.20.190.30');
for ($i = 0; $i < count($ip); $i++) {
    if (test_ip($ip[$i]))
        echo " La ip <strong>$ip[$i]</strong> es correcto <br>";
    else
        echo " La ip <strong>$ip[$i]</strong> es erroneo <br>";
}

echo "<h3>Lista de CONTRASEÑAS: </h3>";
$password = array('692Acn', '20c5', 'AC-b1243', 'ABC-12345');
for ($i = 0; $i < count($password); $i++) {
    if (test_password($password[$i]))
        echo " La contraseña <strong>$password[$i]</strong> es correcto <br>";
    else
        echo " La contraseña <strong>$password[$i]</strong> es erroneo <br>";
}

echo "<h3>Lista de Nombres: </h3>";
$nombre = array('2', '20c5', 'A0', 'ABC-12345','d');
for ($i = 0; $i < count($nombre); $i++) {
    if (test_nombre($nombre[$i]))
        echo " La nombre <strong>$nombre[$i]</strong> es correcto <br>";
    else
        echo " La nombre <strong>$nombre[$i]</strong> es erroneo <br>";
}

include_once './include/footer.php';

