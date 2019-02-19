/* Objetos para enviar/recibir información */
var lista="";
function datos_para_movimientos (txtcue, txtfinicial, txtffinal) {
         this.cuenta        = txtcue;
         this.fecha_inicial = txtfinicial;
         this.fecha_final   = txtffinal;
}

/* Escuchadores de eventos */
document.addEventListener("readystatechange", cargarEventos, false);
function cargarEventos(evento) {
  if (document.readyState == "complete") {
     document.getElementById("cuenta").addEventListener("focus", limpiarCuenta, false);
     document.getElementById("btn_cuenta").addEventListener("click", validaCuenta, false);
     document.getElementById("btn_mostrar").addEventListener("click", mostrarMovim, false);
     ponerFechas();
  }
}
function ponerFechas() {
         var hoy = new Date();
         var hace_un_mes = new Date();
         hace_un_mes.setMonth(hoy.getMonth() - 1);
         var laFecha = "";
         laFecha += hoy.getFullYear() + "-";
         if (hoy.getMonth() < 9) {
            laFecha += "0";
         }
         laFecha += (hoy.getMonth() + 1) + "-";
         if (hoy.getDate() < 10) {
            laFecha += "0";
         }
         laFecha += hoy.getDate();
         document.getElementById("f_final").value = laFecha;
         var laFecha = "";
         laFecha += hace_un_mes.getFullYear() + "-";
         if (hace_un_mes.getMonth() < 9) {
            laFecha += "0";
         }
         laFecha += (hace_un_mes.getMonth() + 1) + "-";
         if (hace_un_mes.getDate() < 10) {
            laFecha += "0";
         }
         laFecha += hace_un_mes.getDate();
         document.getElementById("f_inicial").value = laFecha;
         document.getElementById("f_inicial").disabled = true;
         document.getElementById("f_final").disabled = true;
         document.getElementById("btn_mostrar").disabled = true;
}
function limpiarCuenta(evento) {
         document.getElementById("cuenta").value = "";
         document.getElementById("p_error").innerHTML = "Por favor, introduzca datos correctos";
}
function validaCuenta() {
         document.getElementById("btn_cuenta").disabled = true;
         if (cuentaBuena()) {
            document.getElementById("p_error").innerHTML = "Cuenta correcta. Introduzca fechas";
            document.getElementById("f_inicial").disabled = false;
            document.getElementById("f_final").disabled = false;
            document.getElementById("btn_mostrar").disabled = false;
            document.getElementById("cuenta").disabled = true;
         } else {
            document.getElementById("btn_cuenta").disabled = false;
            document.getElementById("cuenta").disabled = false;
//            document.getElementById("p_error").innerHTML = "Error: número de cuenta no válido";
         }
}
function cuentaBuena() {
         var cue = document.getElementById("cuenta").value;
         if (cue.length != 10) {
            document.getElementById("p_error").innerHTML = "Error: el número de cuenta no tiene 10 dígitos";
            return false;
         }
         if (isNaN(cue)) {
            document.getElementById("p_error").innerHTML = "Error: Introduzca solo números en el número de cuenta";
            return false;
         }
         var tot = 0;
         for (var i=0; i<9; i++) {
             tot += parseInt(cue.charAt(i))
         }
         if ((tot % 9) != parseInt(cue.charAt(9))) {
            document.getElementById("p_error").innerHTML = "Error: Dígito de control erroneo";
            return false;
         }
         return true;
}
function mostrarMovim(evento) {
         evento.target.disabled = true;
         document.getElementById("f_inicial").disabled = true;
         document.getElementById("f_final").disabled = true;
         var cu = document.getElementById("cuenta").value;
         var f1 = document.getElementById("f_inicial").value;
         var f2 = document.getElementById("f_final").value;
         var mis_datos = new datos_para_movimientos(cu, f1, f2);
         var mis_datos_JSON = JSON.stringify(mis_datos);
         var url = "http://localhost/Listados/listado_01.php?x=" + mis_datos_JSON;
         var peticion = new XMLHttpRequest();
         peticion.addEventListener("readystatechange", gestionarRespuesta, false);
         peticion.open("GET", url, true);
         peticion.send(null);
}
function gestionarRespuesta(evento) {
	 if (evento.target.readyState == 4 && evento.target.status == 200) {
//for (var prop in evento.target) {document.write(prop + ".- " + evento.target[prop]+ "<br />")};
alert(evento.target.responseText);
           pintarTabla(evento.target.responseText);
         }
}

/*		document.getElementById("encabezado").innerHTML = evento.target.getAllResponseHeaders();
		document.getElementById("datos").innerHTML = evento.target.responseText;
		document.getElementById("boton").disabled = false;
*/

function pintarTabla(datos){
         var mis_movis = JSON.parse(datos);
         document.getElementById("mostrar_error").style.display = "none";
         document.getElementById("mostrar_movi").style.display = "block";
         for (var i=0; i<mis_movis.length; i++) {
             var fila = document.createElement("tr");
             for (var j=0; j<4; j++) {
                 var celda = document.createElement("td");
                 var texto = document.createTextNode(mis_movis[i][j]);
                 celda.appendChild(texto);
                 fila.appendChild(celda);
             }
             document.getElementById("movimientos").appendChild(fila);
         }
}
function mostrarMovimientos(){
	
		var fila= parseInt(prompt("Introduce el numero de fila"));
		alert(fila);
		var url = "http://localhost/DWES/Aplicacion_bancaria/Programas/Programas_v20_ajax/Listados/listado_01.php?";
		alert('pruieba 1');
    $.ajax({
        url: url,
        type: 'GET',
        dataType: 'json',
       // data: {filaSele: fila},
        success: function (data) {
console.log(data);
alert(data.valor);
alert(data);
alert(data.movi[0]['fecha']);


        },
		error: function () {
            alert('Error!');

        }
    });
}

/*
function mostrarMenu(evento) {
  evento.preventDefault();
  var elMenu = document.getElementsByTagName("nav")[0];
}
*/
