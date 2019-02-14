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
};
function cargarEventosMovi() {
    //alert(document.readyState);
    if (document.readyState === "complete") {
        // document.getElementById("priMovi").addEventListener("click", habilitaEnvioMov);
        // document.getElementById("lastMovi").addEventListener("click", habilitaEnvioMov);
        document.getElementById("bCuenta").addEventListener("click", habilitaEnvioMov);


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

    if (resto === ultNum) {
        cargarEventosMovi();
        ok = true;
    } else {
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

function enviarForm() {
    // document.getElementById("form").submit();
    /*
     
     $('#bEnviar').click(function(){
     alert("pene");
     var url = "http://localhost/GitDWES/todo/Saanti/BankApplication/vista/movimiento.php?";
     $.ajax({                        
     type: "POST",                 
     url: url,                     
     data: $("#form").serialize(), 
     success: function(data)             
     {
     $('#resp').html(data);               
     }
     
     });
     alert('hola 1');
     });
     alert('hola 222');
     */
}