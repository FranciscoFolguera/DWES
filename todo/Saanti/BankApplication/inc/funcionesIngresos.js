document.addEventListener("readystatechange", cargarEventosMovi, false);
var c_exis;


function ComprobarConcepto() {

    var dni = document.getElementById("f_concepto").value;
    var expreg = /^[a-zA-Z]+$/;
    var valido = false;
    if (expreg.test(dni) === true) {

        valido = true;
    }
   
    return valido;
}
function cargarEventosMovi() {
    //alert(document.readyState);
    if (document.readyState === "complete") {
        //deshabilitaEnvioMov();

        document.getElementById("bCuenta").addEventListener("click", ComprobarNcuenta);
        document.getElementById("bEnviar").addEventListener("click", realizarMovimineto);
    }

}
function realizarMovimineto() {
    alert('Dentro de la fc');
    var check_dni = ComprobarConcepto();
        alert('Despues');

    var check_im = document.getElementById("f_impore").value;
    var div = document.getElementById("err");
console.log(check_im);
    if (!check_dni && (check_im === 0)) {
        var err = "El importe tiene que ser distinto de 0 y el concepto tiene que tener 10 carac. minimo";
        mensajeErr(div, err);
    }else if(!check_dni){
         var err = "El concepto tiene que tener 10 carac. minimo";
        mensajeErr(div, err);
        
    }else if (check_im===0) {
         var err = "El importe tiene que ser distinto de 0";
        mensajeErr(div, err);
    }else{
        var confor=conforidadMov(check_im);
        alert(confor);
        div.style.display = "none";
    }

}
function conforidadMov(check_im) {
    var conforme=false;
  var txt;
  if (confirm("Se va a realizar un movimiento de "+check_im)) {
    txt = "Confirmas";
    conforme=true;
  } else {
    txt = "Cancelar movimiento";
  }
    return conforme;
  
}
function comporbarNcuentaExist() {

    var n_c = document.getElementById("nCuenta").value;
    alert('He entrado el f' + n_c);
    var url = "http://localhost/GitDWES/todo/Saanti/BankApplication/modelo/dao/CuentaDAO.php?";
    $.ajax({
        url: url,
        type: 'GET',
        dataType: 'json',
        data: {select_cuenta: n_c},
        success: function (data) {


            if (data.datos[0]) {
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
    document.getElementById("f_impore").disabled = false;
    document.getElementById("bEnviar").disabled = false;

}

function mensajeErr(div, err) {
    div.style.display = "block";
    div.style.color = "red";
    div.innerHTML = err;
}
