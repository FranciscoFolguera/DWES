<?php

include_once '../inc/headerVista.php';
include_once '../inc/func_ser_movi.php';

if (!isset($_POST['nCuenta'])) {
  
    include '../inc/formMovimientos.php';
      

}
else {
    
    include '../modelo/dao/MovimientoDAO.php';
    include_once '../modelo/clases/Movimiento.php';
    
    $mo_ncu = $_POST['nCuenta'];
    $fechaInicial = $_POST['priMovi'];
    $fechaFinal = $_POST['lastMovi'];
    if (valida_n_cuenta($mo_ncu)) {
        
        $movimiento = new Movimiento($mo_ncu);

        $filas = selectMovimientos($movimiento, $fechaInicial, $fechaFinal);
        if ($filas === -1) {
            echo "<h4>Ese Nº de cuenta no existe</h4>";
        } else {
            $numFilas = count($filas);
            if ($numFilas === 0) {
                echo "<h4>No hay movimientos entre esas fechas para ese Nº de cuenta</h4>";
            } else if ($numFilas > 0) {
                muestra($filas);
            } else {
                echo "<h4>Error desconocido</h4>";
            }
        }
      
    } else {
        echo "<h3>Nº de cuenta incorrecto</h3>";
    }
}


include_once '../inc/footer.php';
