

<form action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?> method="POST" onsubmit="return ComprobarMovimiento()" id="form">
    Nº de cuenta    <input id="nCuenta" type="number" name="nCuenta" required="required" value="10000000033"><br>
    Fecha primer movimiento   <input type="date" name="priMovi" id="priMovi" required="required" value="2014-02-20" disabled="disabled"><br>
    Fecha ultimo movimiento   <input type="date" name="lastMovi" id="lastMovi" required="required" value="2019-01-31" disabled="disables"><br>
   
    
</form>
<button type="button" onclick="ComprobarNcuenta()" id="bCuenta">Comprobar cuenta</button>
<button type="button"  id="bEnviar" disabled="disabled">Enviar</button>
 <div id="resp"></div>