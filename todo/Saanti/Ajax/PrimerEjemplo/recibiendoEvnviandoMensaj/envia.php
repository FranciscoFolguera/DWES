<?php
?>



<html>
<head>
   <title>Ajax Simple</title>

   <script src="../../JQueryFile/jquery-3.3.1.js" type="text/javascript"></script>
<script>
$(document).ready(function(){
   $("#enlaceajax").click(function(evento){
      evento.preventDefault();
      $("#destino").load("recibe.php",{nombre:"Francisco",edad:"20",telefono:"15645645"});
   });
});
</script>
</head>
<body>

<a href="#" id="enlaceajax">Haz clic!</a>
<br>
<div id="destino"></div>

</body>
</html> 