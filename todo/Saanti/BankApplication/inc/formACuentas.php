
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

<form action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?> method="POST" onsubmit="return ComprobarDNI1()" id="form">
    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="inputNcuenta">Nº de cuenta</label>
            <input type="text" class="form-control" id="inputNcuenta" placeholder="0000000022">
        </div>

    </div>
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
            <div class="form-group col-md-4">
                <label for="inputNombre1">Salario</label>
                <input type="text" class="form-control cl1" id="inputNombre1" placeholder="Alberto"  required="required">
            </div>
        </div>
    </div>

    Nº de cuenta    <input type="text" name="nCuenta" placeholder="0000000033"><br>

    <div style="display: none"> Nombre          <input type="text" name="name1" id="nameeeesdsdee" placeholder="Pedro" ></div>
    Direccion       <input type="text" name="location1" id="location1" placeholder="Calle Betanzos"><br>
    Teléfono       <input type="text" name="tele1" id="tele1" placeholder="916102233"><br>
    Correo Electrónico    <input type="email" name="correo1" id="correo1" placeholder="916102233"><br>
    DNI cliente 2   <input type="text" name="dni2" id="dni2" disabled="disabled"><br>
    <button type="button" onclick="habilitaSecTitular()" id="bCuenta">Añadir 2º Cliente</button>

    Importe         <input type="number" name="sal" id="salario">

</form>

<button type="button"  id="bEnviar">Enviar</button>

<button type="button"  onclick="comporbarClienteExist()" id="bEnviar">Comprobar Cliente</button>
<button type="button"  onclick="mostrarDatos()" id="bEnviar">Mostrar datos</button>
<button type="button"  onclick="crearCliente()" id="bEnviar">Crear Cliente</button>

<div id="resp"></div>


