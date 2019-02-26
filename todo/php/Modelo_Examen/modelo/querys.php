<?php

//include_once './modelo/connection/singleton.php';
include_once './connection/singleton.php';

function select_usuarios($dni) {

    $conBD = Singleton::singleton();




    $datos = array(':par1' => $dni);
    $sql = ' SELECT * FROM usuario where login=:par1';
    $q = $conBD->obtenerConex()->prepare($sql);
    $q->execute($datos);
    //Con rowCount vemos si una select nos ha devuleto $user = $q->rowCount();
    //fetch devuelve un array de una sola fila asociativo y numerico
    //fetch devuelve un array asociativo y numerico
    //array asociativp $q->fetchAll(PDO::FETCH_ASSOC);
    $user = $q->fetchAll(PDO::FETCH_ASSOC);
    echo "<pre>";
    print_r($user);
    if (($user)) {
        echo 'todo guay';
        //echo $valor;
    } else {
        echo'para nada';
    }
}

function insert_usuario($login, $pass) {

    $conBD = Singleton::singleton();


    $datos = array(':par1' => $login, ':par2' => $pass);
    $sql = ' INSERT INTO usuario VALUES ( :par1 , :par2)';
    $q = $conBD->obtenerConex()->prepare($sql);
    //  print_r($q);
    return $q->execute($datos);
    //Devuelve TRUE si lo añadido FALSE si no
}

function delete_usuario($login) {

    $conBD = Singleton::singleton();


    $datos = array(':par1' => $login);
    $sql = 'DELETE FROM usuario where login=:par1';
    $q = $conBD->obtenerConex()->prepare($sql);
    //  print_r($q);
    return $q->execute($datos);

    //Devuelve TRUE si lo añadido FALSE si no
}

function update_usuario($n_nombre,$login) {

    $conBD = Singleton::singleton();


   

    $datos = array(':par1' => $n_nombre,':par2'=>$login);
  
    $sql = "UPDATE usuario SET login =:par1 WHERE login =:par2";
    $stmt = $conBD->obtenerConex()->prepare($sql);
   return $stmt->execute($datos);
    //return $q->execute($datos);

    //Devuelve TRUE si lo añadido FALSE si no
}

///$fila = select_usuarios('kiko');
//print_r($fila);
//$ins = insert_usuario('sa2d', 'hhj');
//if ($ins) {
//    echo 'insertado';
//} else {
//    echo 'no insertado';
//}
//$del = delete_usuario('sa55556655d');
//print_r($del);
//if ($del===true) {
//    echo 'borrado';
//} else {
//    echo 'no borrado';
//}
$ins = update_usuario('radasdsadsa','rafael');
var_dump($ins);
