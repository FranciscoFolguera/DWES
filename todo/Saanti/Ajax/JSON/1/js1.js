function ejecutarAjax() {
     $("#cargando").css("visibility", " visible");
    
    $.ajax({
        // la URL para la petición
        url: 'miTxt.txt',

        success: function (txt) {
            
            alert('Cargado con exito');
            $("#contenido").html(txt);
            $("#cargando").css("visibility", " hidden");
        },
        

        // código a ejecutar si la petición falla;
        // son pasados como argumentos a la función
        // el objeto de la petición en crudo y código de estatus de la petición
        error: function (xhr, status) {
            alert('Disculpe, existió un problema');
        },

        // código a ejecutar sin importar si la petición falló o no
        complete: function (xhr, status) {
            alert('Petición realizada');
        }
    });
}
