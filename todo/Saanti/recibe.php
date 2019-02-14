

<!DOCTYPE html>
<html lang="ES">
	<head>
		<title>Actividades 2 PHP</title>
		
		 
		 <meta name="author" content="Francisco Folguera ">
		 <meta charset="UTF-8">
	</head>
	<body>
<?php 
	
			
				echo "<h1>Francisco Folguera Sánchez</h1>";
				$Err= false;
				$nombre= $pwd= $edad= "";
				$ErrNombre= $ErrPwd= $ErrEdad="";
			
			function filtrado($datos){
				$datos=trim($datos); //Elimina espacios antes y despues de los datos
				$datos= stripslashes($datos); //Elimina los /
				$datos= htmlspecialchars($datos);// Traduce caracteres especiales en entidades H
				return $datos;
			}
			
			
							$nombre= filtrado($_REQUEST['nombre']);
							echo "<p>Nombre: $nombre</p>";
							
							$edad= $_REQUEST['edad']; 
							echo "<p>Edad: $edad</p>";
							
							
				
				
			
			
			?>
			<?php					
					
?>	</body>
</html>
	

	