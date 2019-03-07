var text = "Primero compruebe si existe el cliente";
var datos_cliente1 = "";
var datos_cliente2 = "";

var cliente1Inser = "";
var nc_libre = false;
var dni1_libre = false;
var dni2_libre = false;
var c_creada;
document.addEventListener("readystatechange", cargarEventosOCuenta, false);
function cargarEventosOCuenta() {
    if (document.readyState === "complete") {

        //document.getElementById("myCheck").addEventListener("click", habilitaNuevoCliente2);
        document.getElementById("bEnviar").addEventListener("click", sawlGrabar);
        document.getElementById("myCheck").addEventListener("click", habilitaNuevoCliente2);
        document.getElementById("inputDNI2").addEventListener("change", habilitaNuevoCliente2);
        document.getElementById("inputImporte").addEventListener("change", importe);



    }
}
function importe() {
    var importe = parseInt(document.getElementById("inputImporte").value);
    if (importe <= 0) {
        document.getElementById("inputImporte").value = 1;
    }

}

function comporbarNcuentaExist() {
    deshabilitaDivErr();
    var n_c = document.getElementById("inputNcuenta").value;

    var url = "http://192.168.103.155/GitDWES/todo/Saanti/BankApplication/modelo/dao/CuentaDAO.php?";
    $.ajax({
        url: url,
        type: 'GET',
        dataType: 'json',
        data: {select_num_cuenta: n_c},
        asycn: false,
        success: function (data) {
            console.log(data.datos);
            if (data.datos[0]) {
                /// console.log(data.datos[0]);
                var div = document.getElementById("err");
                var err = "Ese nº de cuenya ya esta en uso";
                mensajeErr(div, err);
            } else if (data.datos === 1) {
                nc_libre = true;

            }




        },
        error: function () {
            alert('Error exist cuenta!');


        }
    });



}
function sawlGrabar() {
    var realizado = false;
    // alert('yeeeeee');
    swal({
        title: "¿Desea crear esa cuenta?",
        //text: "Una vez que lo borres no habrá vuelta atrás",
        icon: "warning",
        buttons: true,
        dangerMode: true

    })
            .then((willDelete) => {
                if (willDelete) {
                    //  alert('heeeeeeee');
                    console.log(c_creada);
                    borrarCuenta();
                    console.log(c_creada);
                    if (c_creada === true) {
                        swal("La cuenta ha sido borrada", {
                            icon: "success",
                        });
                        realizado = true;
                        deshabilitaTablas();
                        deshabilitaDivErr();
                    } else {
                        swal("No se ha borrado:" + c_creada);
                    }

                } else {
                    swal("Operación cancelada", {
                        icon: "error", });
                }
            });
    return realizado;

}
function checkNcuenta() {
    var err = true;
    if (nc_libre !== true) {
        err = "Error con el numero de cuenta";
    } else {

    }
    return err;
}
function validaCliente1() {
    if (datos_cliente1 === false) {
        datos_cliente1 = new Array();
        datos_cliente1[0] = document.getElementById("inputDNI1").value;
        datos_cliente1[1] = document.getElementById("inputNombre1").value;
        datos_cliente1[2] = document.getElementById("inputLocation1").value;
        datos_cliente1[3] = document.getElementById("inputTelefono1").value;
        datos_cliente1[4] = document.getElementById("inputEmail1").value;
        datos_cliente1[5] = document.getElementById("inputBirthday1").value;
        datos_cliente1[6] = document.getElementById("inputFechaA1").value;
        datos_cliente1[7] = 0;
        datos_cliente1[8] = 0;


    }
}
function comporbarClienteExist() {
    var cok = ComprobarNcuenta();
    console.log(cok);
    if (cok === true) {
        var c_exist = comporbarNcuentaExist();
        if (nc_libre) {
            var dni = document.getElementById("inputDNI1").value;
            dehabilata_tabla_c1();
            if (ComprobarDNI1(dni)) {
                var url = "http://192.168.103.155/GitDWES/todo/Saanti/BankApplication/modelo/dao/ClienteDAO.php?";
                $.ajax({
                    url: url,
                    type: 'GET',
                    dataType: 'json',
                    data: {iduser: dni},
                    ansyc: false,
                    success: function (data) {

                        console.log(data);

                        if (data.datos === "vacio") {
                            datos_cliente1 = false;
                            habilitaNuevoCliente();

                        } else {
                            var x;
                            text = "";
                            datos_cliente1 = data.datos;
                            var tableReg = document.getElementById('tc1');
                            muestra_t_cliente(tableReg, datos_cliente1);
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
            } else {
                var div = document.getElementById("err");
                var err = "Formato de DNI invalido";
                mensajeErr(div, err);
            }


        }

    } else {
        document.getElementById("err").style.display = "block";
        document.getElementById("err").innerHTML = "Ese nº de cuenta no es valido";
    }


}
function comporbarCliente2Exist() {

    var dni = document.getElementById("inputDNI2").value;
    var dni1 = document.getElementById("inputDNI1").value;

    dehabilata_tabla_c2();
    if (ComprobarDNI1(dni)) {
        if (dni !== dni1) {
            var url = "../modelo/dao/ClienteDAO.php?";
            $.ajax({
                url: url,
                type: 'GET',
                dataType: 'json',
                data: {iduser: dni},
                ansyc: false,
                success: function (data) {

                    console.log(data);

                    if (data.datos === "vacio") {
                        datos_cliente2 = false;

                        habilita_form_c2();

                    } else {
                        var x;
                        text = "";
                        datos_cliente2 = data.datos;
                        var tableReg = document.getElementById('tc2');
                        muestra_t_cliente(tableReg, datos_cliente2);
                        for (x in data.datos) {
                            text += data.datos[x] + " ";
                        }
                        deshabilitaNuevoCliente2();
                        alert(text);
                    }



                },
                error: function () {
                    alert('Error!');

                }
            });
        } else {
            var div = document.getElementById("err");
            var err = "No puede ser igual el dni de los dos titulares";
            mensajeErr(div, err);
        }

    } else {
        var div = document.getElementById("err");
        var err = "Formato de DNI titular 2 invalido";
        mensajeErr(div, err);
    }





}

function ComprobarDNI1(dni) {

    //var dni = document.getElementById("dni1").value();
    var expreg = /^[0-9]{8}[A-Z]{1}$/g;
    var valido = false;
    if (expreg.test(dni) === true) {

        valido = true;
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

    var nCuenta = document.getElementById("inputNcuenta").value;
    alert(nCuenta);
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
        // cargarEventosMovi();
        ok = true;
    }
    return ok;
}



function deshabilitaNuevoCliente() {

    document.getElementById("cliente1").style.display = "none";
    document.getElementById("nombreCliente1").style.display = "none";

}
function deshabilitaNuevoCliente2() {

    document.getElementById("cliente2").style.display = "none";
    document.getElementById("nombreCliente2").style.display = "none";

}
function habilitaNuevoCliente() {

    var utc = new Date().toJSON().slice(0, 10);
    document.getElementById("inputFechaA1").innerHTML = 'utc';

    document.getElementById("cliente1").style.display = "block";
    document.getElementById("nombreCliente1").style.display = "block";


}
function habilitaNuevoCliente2() {
    var checkBox = document.getElementById("myCheck");

    if (checkBox.checked === true) {
        document.getElementById("inputDNI2").disabled = false;

    } else {
        document.getElementById("inputDNI2").disabled = true;
    }



}
function habilita_form_c2() {
    var utc = new Date().toJSON().slice(0, 10);
    document.getElementById("inputFechaA2").innerHTML = 'utc';

    document.getElementById("cliente2").style.display = "block";
    document.getElementById("nombreCliente2").style.display = "block";
}
function mostrarDatos() {
    alert(text);
    alert(datosC['cl_dni']);
}
function muestra_t_cliente(tableReg, lista) {
    // console.log('Dentro: '+data);
    //var tableReg = document.getElementById('table_movi');
    tableReg.style.display = "block";
    var cellsOfRow = "";
    var found = false;
    for (var i = 1; i < tableReg.rows.length; i++) {
        cellsOfRow = tableReg.rows[i].getElementsByTagName('td');
        found = false;
        // Recorremos todas las celdas
        for (var j = 0; j < cellsOfRow.length && !found; j++) {
            //console.log('yee: ' + lista);
            cellsOfRow[j].innerHTML = lista[j];

        }

    }
}
function dehabilata_tabla_c1() {
    document.getElementById("tc1").style.display = "none";
}
function dehabilata_tabla_c2() {
    document.getElementById("tc2").style.display = "none";
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
    var url = "../modelo/dao/ClienteDAO.php?" + objLlamada;
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
function mensajeErr(div, err) {
    div.style.display = "block";
    div.style.color = "red";
    div.innerHTML = err;
}
function deshabilitaDivErr() {
    document.getElementById('err').style.display = "none";
}