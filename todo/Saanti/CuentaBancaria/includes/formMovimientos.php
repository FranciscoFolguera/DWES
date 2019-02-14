<?php

?>


<form action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?> method="GET" onsubmit="return ComprobarDNI1()">
    Nº de cuenta    <input type="text" name="nCuenta" ><br>
    Fecha primer movimiento   <input type="date" name="priMovi" id="priMovi"><br>
    Fecha ultimo movimiento   <input type="date" name="lastMovi" id="lastMovi"><br>
   
    <input type="submit" name="submit" value="crear">
</form>