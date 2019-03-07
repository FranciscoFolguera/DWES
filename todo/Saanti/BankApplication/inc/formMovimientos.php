    <table class="table table-striped" style="display: none" id="table_movi">

        <tbody>
            <tr>
                <th colspan="4">Cuenta</th>
            </tr>
            <tr>
                <th scope="row">Nº de cuenta</th>
                <th scope="row">Fecha</th>
                <th scope="row">Hora</th>
                <th scope="row">Concepto</th>
                <th scope="row">Importe</th>

            </tr>
            <tr>

                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>





            </tr>
        </tbody>
    </table>
<div id="info">
    
</div>
    <form action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?> method="POST" onsubmit="return ComprobarMovimiento()" id="form">
        Nº de cuenta    <input id="nCuenta" type="number" name="nCuenta" required="required" value="10000000033"><br>
        Fecha primer movimiento   <input type="date" name="priMovi" id="priMovi" required="required" value="2014-02-20" disabled="disabled"><br>
        Fecha ultimo movimiento   <input type="date" name="lastMovi" id="lastMovi" required="required"  disabled="disabled"><br>


    </form>
    <button type="button"  id="bCuenta">Comprobar cuenta</button>
    <button type="button"  id="bEnviar" disabled="disabled">Enviar</button>
    <div id="resp"></div>
    <div id="err"></div>
