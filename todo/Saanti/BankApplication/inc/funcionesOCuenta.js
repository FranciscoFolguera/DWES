var text = "Primero compruebe si existe el cliente";
var datosC = "";
var cliente1Inser = "";
document.addEventListener("readystatechange", cargarEventosOCuenta, false);
window.onload = function () {
    $('#bEnviar').click(function () {

        var url = "http://localhost/GitDWES/todo/Saanti/BankApplication/vista/open_cuenta.php?";
        $.ajax({
            type: "POST",
            url: url,

            data: $("#form").serialize(),
            success: function (data)
            {
                $('#resp').html(data);
            }

        });

    });
    n = new Date();
    y = n.getFullYear();
    m = n.getMonth() + 1;
    d = n.getDate();
    document.getElementById("inputFechaA1").innerHTML = d + "-" + m + "-" + y;


};

function comporbarClienteExist() {

    var dni = document.getElementById("inputDNI1").value;

    var url = "http://localhost/GitDWES/todo/Saanti/BankApplication/modelo/dao/ClienteDAO.php?";
    $.ajax({
        url: url,
        type: 'GET',
        dataType: 'json',
        data: {iduser: dni},
        success: function (data) {

            alert(data.datos);
            datosC = data.datos;
            console.log(data.datos);
            if (data.datos === "vacio") {
                habilitaNuevoCliente();

            } else {
                var x;
                text = "";
                habilitaTabla();
                for (x in data.datos) {
                    text += data.datos[x] + " ";
                }
                deshabilitaNuevoCliente();
                alert(text);
            }



        },
        error: function () {
            alert('Error!');

        }
    });
}

function ComprobarDNI1() {

    var dni = document.getElementById("dni1").value();
    var expreg = /^[0-9]{8}[A-Z]{1}$/g;
    var valido = false;
    if (expreg.test(dni) === true) {

        valido = true;
    } else {


    }
    return valido;
}


function ComprobarImporte() {
    var valido = false;
    var importe = document.getElementById("salario").value();
    if (importe > 0) {
        valido = true;
    }
    return valido;
}
function ComprobarNcuenta() {
    var ok = false;


    var nCuenta = document.getElementById("nCuenta").value;
    var cadena = nCuenta.toString();
    var miniCadena = cadena.substring(0, 9);
    var ultNum = parseInt(cadena.substring(9, 10));
    var suma = 0;
    for (i = 0; i < miniCadena.length; i++) {
        var carac = parseInt(miniCadena.charAt(i));
        suma += carac;

    }

    var resto = suma % 9;

    if (resto === ultNum) {
        cargarEventosMovi();
        ok = true;
    } else {
    }

    return ok;
}
function cargarEventosOCuenta() {
    if (document.readyState === "complete") {

        document.getElementById("dni2").addEventListener("click", habilitaSecTitular);


    }
}

function habilitaSecTitular() {
    document.getElementById("dni2").disabled = false;
}
function deshabilitaNuevoCliente() {

    document.getElementById("cliente1").style.display = "none";
    document.getElementById("nombreCliente1").style.display = "none";

}
function habilitaNuevoCliente() {

    var utc = new Date().toJSON().slice(0, 10);
    document.getElementById("inputFechaA1").innerHTML = 'utc';

    document.getElementById("cliente1").style.display = "block";
    document.getElementById("nombreCliente1").style.display = "block";


}
function mostrarDatos() {
    alert(text);
    alert(datosC['cl_dni']);
}
function habilitaTabla() {
    alert('heeeeee');
    document.getElementById("tc1").style.display = "block";

    var nombre = datosC['cl_nombre'];
    document.getElementById("tcNombre1").innerHTML = nombre;

    var dni = datosC['cl_dni'];
    document.getElementById("tcDNI1").innerHTML = dni;

    var direcc = datosC['cl_direccion'];
    document.getElementById("tcDirecc1").innerHTML = direcc;

    var telefono = datosC['cl_telefono'];
    document.getElementById("tcTelefono1").innerHTML = telefono;

    var email = datosC['cl_email'];
    document.getElementById("tcEmail1").innerHTML = email;

    var birthday = datosC['cl_fnacimiento'];
    document.getElementById("tcBirthday1").innerHTML = birthday;

    var fApertura = datosC['cl_fcliente'];
    document.getElementById("tcApertura1").innerHTML = fApertura;

    var nCuenta = datosC['cl_ncuenta'];
    document.getElementById("tcNCuentas1").innerHTML = nCuenta;

    var salario = datosC['cl_salario'];
    document.getElementById("tcSalario1").innerHTML = salario;
}
function crearCliente() {
    var errCliente = false;
    var arrayCliente = document.getElementsByClassName('cl1');
    var arrayDatos = new Array();

    for (var i = 0; i < arrayCliente.length; i++) {
        arrayDatos[i] = (arrayCliente[i].value);
    }
    var objLlamada = {lista: arrayDatos};
    alert(objLlamada);
    alert('Cliente:  ' + arrayDatos);
    var url = "http://localhost/GitDWES/todo/Saanti/BankApplication/modelo/dao/ClienteDAO.php?" + objLlamada;
    // console.log(arrayDatos);
    $.ajax({
        url: url,
        type: 'GET',
        dataType: 'json',
        data: {lista: arrayDatos},
        success: function (data) {

            errCliente = true;

        },
        error: function (requestObject, error, errorThrown) {
            alert(error);
            alert(errorThrown);
        }
    });
    return errCliente;
}