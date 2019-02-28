<?php

include_once './conexion.php';
//include_once './bienvenido.php';
include_once './funciones.php';
include_once './querys.php';
session_start();

if(!isset($_POST['submit'])){
    ?>
     <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        Usuario: <input type="text" name="usuario" ><br>
        Password: <input type="password" name="password" required="required"><br>

        <input type="submit" name="submit">

       
    </form>
<?php
}else{
    $user= filtrado($_POST['usuario']);
    $pass= filtrado($_POST['password']);
   if( accede_usuario($user, $pass)){
       $tes=accede_pass($user, $pass);
       if($tes){
           echo 'bieeeeen';
       }
      
   }else{
       echo "<h4>Ese usuario no esxiste en la base datos</h4>";
   }
}