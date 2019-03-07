    
<div id="err" style="display: none"></div>
<table class="table table-striped" style="display: none" id="tc1">

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
<table class="table table-striped" style="display: none" id="tc2">

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
<form  method="POST" onsubmit="return ComprobarDNI1()" id="form">
    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="inputNcuenta">Nº de cuenta</label>
            <input type="text" class="form-control" id="inputNcuenta" placeholder="0000000022">
        </div>

    </div>
    <h3>Primer titular</h3>

    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="inputDNI1">DNI Titular 1</label>
            <input type="text" class="form-control cl1" id="inputDNI1" placeholder="01234567M" required="required">
        </div>
        <div class="form-group col-md-4" style="display: none" id="nombreCliente1"  required="required">
            <label for="inputNombre1">Nombre Titular 1</label>
            <input type="text" class="form-control cl1" id="inputNombre1" placeholder="Alberto"  required="required">
        </div>


    </div>
    <div id="cliente1" style="display: none">
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="inputLocation1">Direccion</label>
                <input type="text" class="form-control cl1" id="inputLocation1" placeholder="Calle betanzos"  required="required">
            </div>
            <div class="form-group col-md-4">
                <label for="inputTelefono1">Telefono</label>
                <input type="text" class="form-control cl1" id="inputTelefono1" placeholder="916102233"  required="required">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="inputEmail1">Email</label>
                <input type="email" class="form-control cl1" id="inputEmail1" placeholder="tucorreo@gmail.com"  required="required">
            </div>
            <div class="form-group col-md-4">
                <label for="inputBirthday1">Fecha de nacimiento</label>
                <input type="date" class="form-control cl1" id="inputBirthday1" placeholder="12-04-1995"  required="required">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="inputFechaA1">Fecha de apertura de cuenta</label>
                <input type="text" class="form-control " id="inputFechaA1">
            </div>

        </div>
    </div>



    <input type="number" name="sal" id="salario">

</form>
<h3>Segundo titular</h3>
Añadir 2º titular: <input type="checkbox" id="myCheck">

<form  method="POST" onsubmit="return ComprobarDNI1()" id="form_c_2">

    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="inputDNI1">DNI Titular 2</label>
            <input type="text" class="form-control cl1" id="inputDNI2" placeholder="01234567M" required="required" disabled="disabled">
        </div>
        <div class="form-group col-md-4" style="display: none" id="nombreCliente2"  required="required">
            <label for="inputNombre1">Nombre Titular 2</label>
            <input type="text" class="form-control cl1" id="inputNombre2" placeholder="Alberto"  required="required">
        </div>


    </div>
    <div id="cliente2" style="display: none">
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="inputLocation1">Direccion</label>
                <input type="text" class="form-control cl1" id="inputLocation2" placeholder="Calle betanzos"  required="required">
            </div>
            <div class="form-group col-md-4">
                <label for="inputTelefono1">Telefono</label>
                <input type="text" class="form-control cl1" id="inputTelefono2" placeholder="916102233"  required="required">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="inputEmail1">Email</label>
                <input type="email" class="form-control cl1" id="inputEmail2" placeholder="tucorreo@gmail.com"  required="required">
            </div>
            <div class="form-group col-md-4">
                <label for="inputBirthday1">Fecha de nacimiento</label>
                <input type="date" class="form-control cl1" id="inputBirthday2" placeholder="12-04-1995"  required="required">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="inputFechaA1">Fecha de apertura de cuenta</label>
                <input type="text" class="form-control " id="inputFechaA2">
            </div>

        </div>
    </div>




</form>

<div class="form-group col-md-4">
    <label for="inputImporte">Importe</label>
    <input type="number" class="form-control cl1" id="inputImporte" placeholder="2000€"  required="required">
</div>


<button type="button"  onclick="comporbarClienteExist()" >Comprobar Cliente</button>
<button type="button"  onclick="comporbarCliente2Exist()">Comprobar Cliente 2</button>
<button type="button"  id="bEnviar">Crear cuenta</button>


<div id="resp"></div>


