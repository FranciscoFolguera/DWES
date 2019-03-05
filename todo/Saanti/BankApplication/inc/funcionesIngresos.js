document.addEventListener("readystatechange", cargarEventosMovi, false);
var c_sal;
var c_dni1;
var c_dni2;
var check;
function ComprobarConcepto() {

    var dni = document.getElementById("f_concepto").value;
    var expreg = /^[a-zA-Z ]+$/;
    var valido = false;
    if (expreg.test(dni) === true) {

        valido = true;
    }

    return valido;
}
function cargarEventosMovi() {
    //alert(document.readyState);
    if (document.readyState === "complete") {

        document.getElementById("f_importe").addEventListener("blur", checkImporte);
        document.getElementById("bCuenta").addEventListener("click", ComprobarNcuenta);
        document.getElementById("bEnviar").addEventListener("click", realizarMovimineto);
    }

}
function checkImporte() {

    if (document.getElementById("f_importe").value < 1) {
        document.getElementById("f_importe").value = 0;
    }
}
function realizarMovimineto() {
    var check_dni = ComprobarConcepto();


    var check_im = parseInt(document.getElementById("f_importe").value);
    var div = document.getElementById("err");
    if (!check_dni && (check_im === 0)) {
        var err = "El importe tiene que ser distinto de 0 y el concepto tiene que tener 10 carac. minimo";
        mensajeErr(div, err);
    } else if (!check_dni) {
        var err = "El concepto tiene que tener 10 carac. minimo";
        mensajeErr(div, err);

    } else if (check_im === 0 || check_im === "") {
        var err = "El importe tiene que ser distinto de 0";
        mensajeErr(div, err);
    } else {
        var confor = conformidadMov(check_im);
        console.log(c_sal);
        console.log(check_im);
        if (confor === 2) {
            if (c_sal < check_im) {

                alert("El dinero que quieres retirar es mayor que el que tienes en la cuenta");
            } else {
                check_im = -check_im;

                grabarRegistro(check_im);
            }
        } else if (confor === 1) {
            grabarRegistro(check_im);
        }

        console.log("c_sal: " + c_sal);
        div.style.display = "none";
    }

}
function conformidadMov(check_im) {
    var conforme = false;
    var operation = document.getElementById("retirar").value;
    if (document.getElementById("ingresar").checked === true) {
        operation = document.getElementById("ingresar").value;
    }
    var txt;

    if (confirm("Se va a " + operation + " " + check_im + "€")) {
        txt = "Confirmas";
        if (operation === "ingresar") {
            conforme = 1;
        } else {
            conforme = 2;
        }
    } else {
        txt = "Cancelar movimiento";
    }
    return conforme;

}
function comporbarNcuentaExist() {

    var n_c = document.getElementById("nCuenta").value;
    var url = "http://localhost/GitDWES/todo/Saanti/BankApplication/modelo/dao/CuentaDAO.php?";
    $.ajax({
        url: url,
        type: 'GET',
        dataType: 'json',
        data: {select_cuenta: n_c},
        success: function (data) {


            if (data.datos[0]) {
                c_sal = parseInt(data.datos[0]['cu_salario']);
                c_dni1 = data.datos[0]['cu_dni1'];
                c_dni2 = data.datos[0]['cu_dni2'];
                ;
                console.log(c_sal);
                console.log(c_dni1);
                console.log(c_dni2);
                habilitaIngresos();

            } else {
                var div = document.getElementById("err");
                var err = "Ese numero de cuenta no existe";
                mensajeErr(div, err);
            }



        },
        error: function (xhr, ajaxOptions, thrownError) {
            console.log(xhr.status);
            console.log(thrownError);
            console.log(xhr.responseText);
        }
    });




}
function grabarRegistro(importe) {
    var n_c = document.getElementById("nCuenta").value;
   
    var concepto = document.getElementById("f_concepto").value;
    
    var url = "http://localhost/GitDWES/todo/Saanti/BankApplication/modelo/dao/MovimientoDAO.php?";
    $.ajax({
        url: url,
        type: 'GET',
        dataType: 'json',
        data: {nCuenta: n_c, importe: importe, concepto: concepto, dni1: c_dni1, dni2: c_dni2},
        success: function (data) {

            alert(data.datos);
            deshabilitaIngresos();



        },
        error: function (xhr, ajaxOptions, thrownError) {
            console.log(xhr.status);
            console.log(thrownError);
            console.log(xhr.responseText);
        }
    });




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
    var div = document.getElementById("err");

    if (resto === ultNum) {
        //cargarEventosMovi();
        div.style.display = "none";

        comporbarNcuentaExist();


        ok = true;
    } else {


        var err = "Nº de cuenta incorrecto";
        mensajeErr(div, err);
    }
    return ok;
}

function habilitaIngresos() {

    document.getElementById("f_concepto").disabled = false;
    document.getElementById("f_importe").disabled = false;
    document.getElementById("bEnviar").disabled = false;
    document.getElementById("bCuenta").disabled=true;
    document.getElementById("nCuenta").readOnly = true;

}
function deshabilitaIngresos() {

    document.getElementById("f_concepto").disabled = true;
    document.getElementById("f_importe").disabled = true;
    document.getElementById("bEnviar").disabled = true;
        document.getElementById("bCuenta").disabled=false;

    document.getElementById("nCuenta").readOnly = false;

}
function mensajeErr(div, err) {
    div.style.display = "block";
    div.style.color = "red";
    div.innerHTML = err;
}
