<?php 
			session_start();
			function filtrado($datos){
				$datos=trim($datos); //Elimina espacios antes y despues de los datos
				$datos= stripslashes($datos); //Elimina los /
				$datos= htmlspecialchars($datos);// Traduce caracteres especiales en entidades H
				return $datos;
			}
			include '../inc/header.php';
			
				echo "<h1>Francisco Folguera Sánchez</h1>";
			
			
				$Err= false;
				$nombre= $pwd="";
				$ErrNombre= $ErrPwd= $ErrLoging="";
				
				//$Logeado=false;
				
			
			
			
			 if(!isset($_POST['aceptar'])){
				//no se ha enivado
			?>
			
			
			<?php 
					include'../inc/formLogin.php';
			?>
		    
			
			
			<?php
			} 
			else{
				
			
			$Err=false;

				$ErrNombre= $ErrPwd="";
				
				 if (empty($_POST['nombre'])){
					$Err= true;
					$ErrNombre= "El nombre es requerido";
				};
				
				if (empty($_POST['contra']) ){
					
					$Err= true;
					$ErrPwd= "La contraseña es requerido";
				};
				
				
				
				
				if($Err===true){
					include '../inc/formLogin.php';
					
				}else{
					$pwd=$_POST['contra'];
					
					$nombre=filtrado($_POST['nombre']);
					
				
					
					if($pwd==4444){
						
						
						$_SESSION['name']=$nombre;

						header("Location: usuario_registrado.php");
					}else if($pwd!=4444){
						$ErrLoging="No tienes los permisos necesarios para acceder a este sitio web, nombre de usuario y contraseña erroneos";
						include '../inc/formLogin.php';
					}
					

				}
			
			}
			?>
			<?php
			
			
			
			include '../inc/footer.php';				

					
					
?>

	