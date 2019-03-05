<table class="table table-striped" style="display: none" id="table_cliente1">

    <tbody>
        <tr>
            <th colspan="9">Titular 1</th>
        </tr>
        <tr>
            <th scope="row">DNI</th>
            <th scope="row">Nombre</th>
            <th scope="row">Direccion</th>
            <th scope="row">Telefono</th>
            <th scope="row">Email</th>
            <th scope="row">F. Nacimiento</th>
            <th scope="row">F. Cliente</th>
            <th scope="row">Nº Cuentas</th>
            <th scope="row">Salario</th>

        </tr>
        <tr>
            <td id="tcDNI1"></td>
            <td id="tcNombre1"></td>
            <td id="tcDirecc1"></td>
            <td id="tcTelefono1"></td>
            <td id="tcEmail1"></td>
            <td id="tcBirthday1"></td>
            <td id="tcApertura1"></td>
            <td id="tcNCuentas1"></td>
            <td id="tcSalario1"></td>


           

        </tr>
    </tbody>
</table>
<table class="table table-striped" style="display: none" id="table_cliente2">

    <tbody>
        <tr>
            <th colspan="9">Titular 2</th>
        </tr>
        <tr>
            <th scope="row">DNI</th>
            <th scope="row">Nombre</th>
            <th scope="row">Direccion</th>
            <th scope="row">Telefono</th>
            <th scope="row">Email</th>
            <th scope="row">F. Nacimiento</th>
            <th scope="row">F. Cliente</th>
            <th scope="row">Nº Cuentas</th>
            <th scope="row">Salario</th>

        </tr>
        <tr>
            <td id="tcDNI1"></td>
            <td id="tcNombre1"></td>
            <td id="tcDirecc1"></td>
            <td id="tcTelefono1"></td>
            <td id="tcEmail1"></td>
            <td id="tcBirthday1"></td>
            <td id="tcApertura1"></td>
            <td id="tcNCuentas1"></td>
            <td id="tcSalario1"></td>


           

        </tr>
    </tbody>
</table>
<table class="table table-striped" style="display: none" id="table_cuenta">

    <tbody>
        <tr>
            <th colspan="9">Cuenta</th>
        </tr>
        <tr>
            <th scope="row">Nº de cuenta</th>
            <th scope="row">DNI titular 1</th>
            <th scope="row">DNI titular 2</th>
            <th scope="row">Salario</th>
            
        </tr>
        <tr>
           
            <td id="t_c_numero"></td>
            <td id="t_c_dni1"></td>
            <td id="t_c_dni2"></td>
            <td id="t_c_salario"></td>


           

        </tr>
    </tbody>
</table>

<form action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?> method="POST" onsubmit="return ComprobarMovimiento()" id="form">
    Nº de cuenta    <input id="nCuenta" type="number" name="nCuenta" required="required" value="10000000033"><br>


</form>
<button type="button"  id="bCuenta">Cerrar cuenta</button>
<div id="err"></div>