


	<form  method="post"  enctype="multipart/form-data" action ="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

						<div>
							<input id="first_name" type="text" class="validate" name="letra" maxlength="1">
							<label for="first_name" >Letra</label>
							
						</div>
						<div>
							<input id="last_name" type="text" class="validate" name="respuesta">
							<label for="last_name">Respuesta</label>
						</div>
						<div><input type="submit" name="aceptar" value="ENVIAR"></div>	
						
						<div>Pista:Informática </div>
					
						<div>
						<img <?php echo "$imagen"; ?> alt="dibujo" class="imagen">
						</div>
						
						
				
	</form>
	