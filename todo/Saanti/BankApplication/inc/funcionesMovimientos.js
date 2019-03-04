document.addEventListener("readystatechange", cargarEventosMovi, false);

window.onload = function () {
    $('#bEnviar').click(function () {

        var url = "http://localhost/GitDWES/todo/Saanti/BankApplication/vista/movimiento.php?";
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


function cargarEventosMovi() {
    //alert(document.readyState);
    if (document.readyState === "complete") {
        // deshabilitaEnvioMov();

        document.getElementById("bCuenta").addEventListener("click", ComprobarNcuenta);




    }

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
        habilitaEnvioMov();
        ok = true;
    } else {


        var err = "Nº de cuenta incorrecto";
        mensajeErr(div, err);
    }
    return ok;
}
function ComprobarFecha() {
    var ok = false;

    var priMovi = document.getElementById("priMovi").value;
    var partsFir = priMovi.split('-');
    var primFecha = new Date(partsFir[0], partsFir[1] - 1, partsFir[2]);


    var lastMovi = document.getElementById("lastMovi").value;
    var partsLast = lastMovi.split('-');
    var lastFecha = new Date(partsLast[0], partsLast[1] - 1, partsLast[2]);

    if (primFecha < lastFecha) {
        ok = true;
    }
    return ok;
}
function ComprobarMovimiento() {
    var ok = false;

    var fecha = ComprobarFecha();
    var cuenta = ComprobarNcuenta();
    if ((fecha === true) && (cuenta === true)) {
        ok = true;

    }
    return ok;
}


function habilitaEnvioMov() {
    document.getElementById("priMovi").disabled = false;
    document.getElementById("lastMovi").disabled = false;
    document.getElementById("bEnviar").disabled = false;

}
function deshabilitaEnvioMov() {
    document.getElementById("priMovi").disabled = true;
    document.getElementById("lastMovi").disabled = true;
    document.getElementById("bEnviar").disabled = true;

}
function mensajeErr(div, err) {
    div.style.display = "block";
    div.style.color = "red";
    div.innerHTML = err;
}
