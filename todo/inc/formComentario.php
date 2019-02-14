<form  method="post"   action ="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

				
				
				<div class="row">
						<div class="input-field col s4">
							<input id="first_name" type="text" class="validate" name="nombre" >
							<label for="first_name" >First Name</label>
							<?php echo"<span>$ErrNombre</span>";?>
						</div>
						
				</div>

				
					
				
				<div>
					Comment: <textarea name="comment" rows="2" cols="2"> </textarea>
					<?php echo"<span>$ErrComent</span>";?>
				</div>
				<br>
				<br>
				<br>
				
				
				
				
					
				<div><input type="submit" name="aceptar" value="ENVIAR"></div>	
				
			</form>
	