document.addEventListener("readystatechange", cargarEventosMovi, false);


function cogerMovi() {
    var url = "http://localhost/GitDWES/todo/Saanti/BankApplication/modelo/dao/MovimientoDAO.php?";
    var f_nc = document.getElementById("nCuenta").value;
    var f_priMovi = document.getElementById("priMovi").value;
    var f_lastMovi = document.getElementById("lastMovi").value;
    $.ajax({
        type: "POST",
        url: url,
dataType:'json',
        data: {select_movi: 1, nCuenta: f_nc, priMovi: f_priMovi, lastMovi: f_lastMovi},
        success: function (data)
        {
          
            if(Array.isArray(data.datos)){
                muestra_t_cliente2(data.datos);
            }else{
                var div= document.getElementById("err");
                var err=data.datos;
                mensajeErr(div,err);
            }
        }

    });
}


function cargarEventosMovi() {
    //alert(document.readyState);
    if (document.readyState === "complete") {
        // deshabilitaEnvioMov();
        n = new Date();
        y = n.getFullYear();
        m = n.getMonth() + 1;
        d = n.getDate();
        document.getElementById("lastMovi").innerHTML = d + "/" + m + "/" + y;
        document.getElementById("bCuenta").addEventListener("click", ComprobarNcuenta);
        document.getElementById("bEnviar").addEventListener("click", cogerMovi);




    }

}

function muestra_t_cliente2(data) {
    var tableReg = document.getElementById('table_movi');
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
