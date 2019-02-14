<?php 
	
			include '../inc/header.php';
			
				echo "<h1>Francisco Folguera Sánchez</h1>";
			
			
			$nombre= $_REQUEST['nombreApe'];
			echo "<p>Nombre: $nombre</p>";
			
			$edad= $_REQUEST['edad'];
			echo "<p>Edad: $edad</p>";
			
			$sexo= $_REQUEST['sexo'];
			echo "<p>Sexo: $sexo</p>";
			
			$estado= $_REQUEST['estado'];
			foreach($estado as $estado){
				print("$estado<br>\n");
			}
			$actualizar= $_REQUEST['actualizar'];
			if($actualizar){
				echo"<p>Se han actualizado los datos</p>";
			}
			
			$clave= $_REQUEST['contra'];
			echo "<p>Contraseña: $clave</p>";
			
			include '../inc/footer.php';				

					
					
?>

	