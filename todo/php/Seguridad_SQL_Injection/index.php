<?php

include_once './include/header.php';

if (!isset($_POST['nombre'])) {
    include './include/formLogin.php';
} else {
    
    
    //mysqliInjection();
    pdoQuote();
}

function mysqliInjection() {
$nombre = $_POST['nombre'];
    $password = $_POST['contra'];
    $conn = mysqli_connect("localhost", "root", "1234", "dwes");

    $orden = ("select * from usuario where login='$nombre' and clave='$password'");
    $resultado = mysqli_query($conn, $orden);

 
    if (mysqli_num_rows($resultado) > 0) {
        $row = mysqli_fetch_assoc($resultado);
        if(count($row)>0){
           session_start();
           $_SESSION['nombre']=$nombre;
           $_SESSION['clave']=$nombre;
           header('Location: acreditado.php');
       }

    } else {
        echo "0 results";
    }
}
//' or 1='1
function pdoQuote() {

    

    try {
        
        $conn = new PDO("mysql:host=localhost;dbname=dwes;charset=UTF8", 'root', '1234');
         $nombre=$conn->quote($_POST['nombre']);
         $password=$conn->quote($_POST['contra']);
         
         $orden =("select * from usuario where login=$nombre and clave=$password");


         $q=$conn->query($orden);
         $q->fetchAll();
        
       if($q->rowCount()>0){
           session_start();
           $_SESSION['nombre']=$nombre;
           $_SESSION['clave']=$nombre;
           header('Location: acreditado.php');
       }
       
        $conn = null;
    } catch (PDOException $e) {
        print "¡Error!: " . $e->getMessage() . "<br/>";
        die();
    }
}

include_once './include/footer.php';
