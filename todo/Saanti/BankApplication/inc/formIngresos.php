

<form action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?> method="POST" onsubmit="return ComprobarMovimiento()" id="form">
    Nº de cuenta    <input id="nCuenta" type="number" name="nCuenta" required="required" value="10000000033"><br>

    Concepto   <input id="f_concepto" type="text" name="f_concepto" required="required" disabled="disabled"><br>
    Importe    <input id="f_importe" type="number" name="f_importe" required="required"  disabled="disabled" min="1" value="1"><br>
    <input type="radio" name="operation" value="ingresar" checked="checked" id="ingresar"> Ingreso<br>
    <input type="radio" name="operation" value="retirar" id="retirar"> Reintegro<br>
   
</form>
<button type="button"  id="bCuenta">Comprobar cuenta</button>
<button type="button"  id="bEnviar" disabled="disabled">Enviar</button>
<div id="resp"></div>
<div id="err"></div>