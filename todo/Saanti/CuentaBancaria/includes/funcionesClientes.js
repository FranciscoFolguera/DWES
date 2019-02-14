

function ComprobarDNI1() {
    alert("holad fdgdf");
    var dni = document.getElementById("dni1").value();
    var expreg = /^[0-9]{8}[A-Z]{1}$/g;
    var valido = false;
    alert("hola2");
    if (expreg.test(dni) === true) {
        alert("EL DNI ES CORRECTO");
        valido = true;
    } else {
        alert(" ERROR!!!!!!!! EL DNI NO ES CORRECTO");

    }
    return valido;
}
function ComprobarNcuenta(nCuenta) {
        alert("hola2");

    var cadena = nCuenta.toString();
   var miniCadena=cadena.substring(0, 9);
    alert(miniCadena);
}

function Mensaje() {
    alert("hola del mensaje");
}