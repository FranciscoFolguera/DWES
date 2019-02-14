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
				
			?>
			<form  method="get"   action ="recibe.php">

				
				
						<div>
							<label for="first_name" >Nombre de usuario</label>
							<input id="first_name"  type="text" class="validate" name="nombre">
							
						</div>
						
						<div>
							<label for="eddad_f" >Edad</label>
							<input id="eddad_f"  type="number" class="validate" name="edad">
							
						</div>
						
			
				<div><input type="submit" name="aceptar" value="ENVIAR"></div>	
				
			</form>
	
			<?php
			
			

					
					
?>
	</body>
</html>
	