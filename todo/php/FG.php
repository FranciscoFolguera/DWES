<?php 
	
			include '../inc/materialize.php';
			
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
			
			 if(!isset($_POST['aceptar'])){
				//no se ha enivado
			?>
			
			
			<?php 
					include '../inc/form.php';
			?>
		    
			
			
			<?php
			} 
			
			else{
				
				$Err=false;

				$ErrNombre= $ErrPwd= $ErrEdad="";
				if (empty($_POST['edad'])){
					$Err= true;
					$ErrEdad="La edad es requerida";
				};
				 if (empty($_POST['nombre'])){
					$Err= true;
					$ErrNombre= "El nombre es requerido";
				};
				  if (empty($_POST['contra'])){
					$Err= true;
					$ErrPwd= "La contraseña es requerido";
				};
				
				if($Err==true){
					include '../inc/form.php';
					
				}else{
						//PROCESAR EL FORMULARIO
							$nombre= filtrado($_REQUEST['nombre']);
							echo "<p>Nombre: $nombre</p>";
							
							$edad= $_REQUEST['edad']; 
							echo "<p>Edad: $edad</p>";
							
							$sexo= $_REQUEST['sexo'];
							echo "<p>Sexo: $sexo</p>";
							
							
							$estado= $_REQUEST['estado'];
							foreach($estado as $estado){
								print("$estado \n");
							}
							/*
							$actualizar= $_REQUEST['actualizar'];
							if($actualizar){
								echo"<p>Se han actualizado los datos</p>";
							}*/
							
							
							$comentario= filtrado($_REQUEST['comment']);
							echo "<p>Nombre: $comentario</p>";
							
							$ciudad= filtrado($_REQUEST['city']);
							echo "<p>Nombre: $ciudad</p>";
							
							$clave= $_REQUEST['contra'];
							echo "<p>Contraseña: $clave</p>";
							/*
							$car = $_REQUEST['carlist'];
							foreach($car as $value){
								echo "<p>$value</p>";
							}
							*/
				}
				
			
			}
			?>
			<?php
			
			
			
			include '../inc/footerMaterialize.php';				

					
					
?>

	