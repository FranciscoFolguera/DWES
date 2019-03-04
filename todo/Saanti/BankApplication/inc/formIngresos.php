

<form action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?> method="POST" onsubmit="return ComprobarMovimiento()" id="form">
    Nº de cuenta    <input id="nCuenta" type="number" name="nCuenta" required="required" value="10000000033"><br>

    Concepto   <input id="f_concepto" type="text" name="f_concepto" required="required" disabled="disabled"><br>
    Importe    <input id="f_impore" type="number" name="f_impore" required="required" value="200" disabled="disabled"><br>

</form>
<button type="button"  id="bCuenta">Comprobar cuenta</button>
<button type="button"  id="bEnviar" disabled="disabled" onclick="sdfdfds()">Enviar</button>
<div id="resp"></div>
<div id="err"></div>