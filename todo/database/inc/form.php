<form  method="post"  enctype="multipart/form-data" action ="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

				
				
				
						<div>
							
							Nombre de usuario:<input id="first_name" type="text" class="validate" name="nombre" >
							<?php echo"<span>$ErrNombre</span>";?>
						</div>
					
				

				<div>
					Contraseña: <input type="password" name="contra1" >
					
				</div>
				<div>
					Repetir contraseña: <input type="password" name="contra2" >
					
				</div>
				<?php echo"<div>$ErrPwd</div>";?>
					
				<div><input type="submit" name="aceptar" value="ENVIAR"></div>	
				
			</form>
	