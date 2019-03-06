document.addEventListener("readystatechange", cargarEventosMovi, false);

var c_sal;
var lista_cuenta;
var lista_cliente_1;
var lista_cliente_2;
var c_borrada;

function cargarEventosMovi() {
    //alert(document.readyState);
    if (document.readyState === "complete") {

        document.getElementById("nCuenta").addEventListener("blur", ComprobarNcuenta, true);
        document.getElementById("bCuenta").addEventListener("click", cerrarCuenta);

    }

}
function ComprobarNcuenta() {
    var ok = false;
    habilitaClick();
    var nCuenta = document.getElementById("nCuenta").value;
    // alert(nCuenta);
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
        comporbarNcuentaExist();
        // console.log(lista_cuenta);
        ok = true;
    }
    return ok;
}
function cerrarCuenta() {
//    muestra_t_cuenta();
//    muestra_t_clientes();
    c_sal = parseInt(c_sal);
    if (c_sal > 0) {
        swal("PAPAPO ERROR 1 cuenta 0", "No se pueden borrar cuentas con dinero", "info", {
            button: "Aww yiss!",
        });




    } else {
        sawlBorrar();

    }
}

function sawlBorrar() {
    var realizado = false;
    swal({
        title: "¿Desea eliminar esa cuenta?",
        text: "Una vez que lo borres no habrá vuelta atrás",
        icon: "warning",
        buttons: true,
        dangerMode: true

    })
            .then((willDelete) => {
                if (willDelete) {
                    //  alert('heeeeeeee');
                    console.log(c_borrada);
                    borrarCuenta();
                    console.log(c_borrada);
                    if (c_borrada === true) {
                        swal("La cuenta ha sido borrada", {
                            icon: "success",
                        });
                        realizado = true;
                        deshabilitaTablas();
                        deshabilitaDivErr();
                    } else {
                        swal("No se ha borrado:" + c_borrada);
                    }

                } else {
                    swal("Operación cancelada", {
                        icon: "error", });
                }
            });
    return realizado;

}
function muestra_t_cuenta() {
    var tableReg = document.getElementById('table_cuenta');
    tableReg.style.display = "block";
    var cellsOfRow = "";
    var found = false;
    for (var i = 1; i < tableReg.rows.length; i++) {
        cellsOfRow = tableReg.rows[i].getElementsByTagName('td');
        found = false;
        // Recorremos todas las celdas
        for (var j = 0; j < cellsOfRow.length && !found; j++) {
            cellsOfRow[j].innerHTML = lista_cuenta[j];

        }

    }
}

function muestra_t_clientes() {
    muestra_t_cliente1();
    if (lista_cliente_2 !== -1) {
        muestra_t_cliente2();
    }
}
function muestra_t_cliente1() {
    var tableReg = document.getElementById('table_cliente1');
    tableReg.style.display = "block";
    var cellsOfRow = "";
    var found = false;
    for (var i = 1; i < tableReg.rows.length; i++) {
        cellsOfRow = tableReg.rows[i].getElementsByTagName('td');
        found = false;
        // Recorremos todas las celdas
        for (var j = 0; j < cellsOfRow.length && !found; j++) {
            cellsOfRow[j].innerHTML = lista_cliente_1[j];

        }

    }
}
function muestra_t_cliente2() {
    var tableReg = document.getElementById('table_cliente2');
    tableReg.style.display = "block";
    var cellsOfRow = "";
    var found = false;
    for (var i = 1; i < tableReg.rows.length; i++) {
        cellsOfRow = tableReg.rows[i].getElementsByTagName('td');
        found = false;
        // Recorremos todas las celdas
        for (var j = 0; j < cellsOfRow.length && !found; j++) {
            cellsOfRow[j].innerHTML = lista_cliente_2[j];

        }

    }
}
function comporbarNcuentaExist() {
    deshabilitaDivErr();
    deshabilitaTablas();
    var n_c = document.getElementById("nCuenta").value;
    var url = "http://localhost/GitDWES/todo/Saanti/BankApplication/modelo/dao/CuentaDAO.php?";
    $.ajax({
        url: url,
        type: 'GET',
        dataType: 'json',
        data: {select_cuenta_cliente: n_c},
        asycn: false,
        success: function (data) {
            console.log(data);

            if (data.cuenta !== null) {
                lista_cuenta = data.cuenta[0];
                c_sal = parseInt(data.cuenta[0]['cu_salario']);

                lista_cliente_1 = data.cliente1[0];
                if (data.cliente2 !== null) {
                    lista_cliente_2 = data.cliente2[0];

                } else {
                    lista_cliente_2 = -1;
                }
                muestra_t_clientes();
                muestra_t_cuenta();



                //habilitaIngresos();

            } else {
                var div = document.getElementById("err");
                var err = "Ese numero de cuenta no existe";
                mensajeErr(div, err);
                deshabilitaClick();
            }



        },
        error: function (xhr, ajaxOptions, thrownError) {
            console.log(xhr.status);
            console.log(thrownError);
            console.log(xhr.responseText);
        }
    });




}
function borrarCuenta() {
    var n_c = document.getElementById("nCuenta").value;
    var url = "http://localhost/GitDWES/todo/Saanti/BankApplication/modelo/dao/CuentaDAO.php?";
    var nc_cli2;
    if (lista_cliente_2 === -1) {
        nc_cli2 = -1;
    } else {
        nc_cli2 = lista_cliente_2['cl_ncuenta'];
    }
    $.ajax({
        url: url,
        type: 'GET',
        dataType: 'json',
        data: {delete_cuenta: n_c, importe: c_sal, dni1: lista_cuenta['cu_dni1'], dni2: lista_cuenta['cu_dni2'], nc_cli1: lista_cliente_1['cl_ncuenta'], nc_cli2: nc_cli2},
        async: false,
        success: function (data) {

            c_borrada = data.datos;

        },
        error: function (xhr, ajaxOptions, thrownError) {
            console.log(xhr.status);
            console.log(thrownError);
            console.log(xhr.responseText);
            c_borrada = "ERROR 404";
        }
    });
}
function mensajeErr(div, err) {
    div.style.display = "block";
    div.style.color = "red";
    div.innerHTML = err;
}
function deshabilitaTablas() {
    document.getElementById('table_cuenta').style.display = "none";
    document.getElementById('table_cliente1').style.display = "none";
    document.getElementById('table_cliente2').style.display = "none";
}
function deshabilitaDivErr() {
    document.getElementById('err').style.display = "none";
}
function deshabilitaClick() {
    document.getElementById("bCuenta").disabled = true;

}
function habilitaClick(){
        document.getElementById("bCuenta").disabled = false;

}