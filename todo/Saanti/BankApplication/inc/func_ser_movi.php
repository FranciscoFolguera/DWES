<?php

function valida_n_cuenta($ncuenta){
    
   $miniCadena = substr($ncuenta, 0, -1);  // devuelve todos los digitos menos el ultimo
   $ultNum= substr($ncuenta, -1); //devuelve el ultimo digito
    $ultNum= intval($ultNum);
    $suma=0;
    for($i=0;$i<strlen($miniCadena);$i++){
        $carac= intval($miniCadena[$i]);
        $suma+=$carac;
    }
     $resto = $suma % 9;

    if ($resto === $ultNum) {
        
        return true;
    }else{
         
        return false;
    }
    
}



//INSERT INTO `cuentas`(`cu_ncu`, `cu_dni1`, `cu_dni2`, `cu_salario`) VALUES ('0000000011','76543210B',null,2000)