<form  method="post"   action ="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

				
				
						<div>
							<label for="first_name" >Nombre de usuario</label>
							<input id="first_name"  type="text" class="validate" name="nombre">
							<?php echo"<span>$ErrNombre</span>";?>
						</div>
						
			
				<div>
					Contraseña: <input type="password" name="contra" >
					<?php echo"<span>$ErrPwd</span>";?>
				</div>
				
				<div>
					<?php
					echo"$ErrLoging";
					?>
				</div>	
				<div><input type="submit" name="aceptar" value="ENVIAR"></div>	
				
			</form>
	