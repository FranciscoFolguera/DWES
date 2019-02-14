<form  method="post"  enctype="multipart/form-data" action ="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

				
				
				<div class="row">
						<div class="input-field col s4">
							<input id="first_name" type="text" class="validate" name="nombre" >
							<label for="first_name" >First Name</label>
							<?php echo"<span>$ErrNombre</span>";?>
						</div>
						<div class="input-field col s4">
							<input id="last_name" type="text" class="validate">
							<label for="last_name">Last Name</label>
						</div>
						<div class="input-field col s1">
								<input type="number" name="edad">
								<label for="edad">Edad</label>
								<?php echo"<span>$ErrEdad</span>";?>
						</div>
				</div>

				
				<div>Sexo: 
					<label>
							<input name="sexo" type="radio" value="H" checked="checked"/>
							<span>Hombre</span>
						  </label>
						
						  <label>
							<input class="with-gap" name="sexo" type="radio"  value="M"/>
							<span>Mujer</span>
					</label>
				</div>
				
				<div>
					Estado civil:
					
					
					 <label>
							<input type="checkbox"  class="filled-in"  name="estado[]"value="casado" />
							<span>Casado</span>
					</label>
						
						
					<label>
							<input type="checkbox" class="filled-in"  name="estado[]" value="soltero" />
							<span>Soltero</span>
					</label>
					<label>
							<input type="checkbox" class="filled-in" checked="checked" name="estado[]" value="divorciado"/>
							<span>Divorciado</span>
					</label>
					<label>
							<input type="checkbox" class="filled-in" checked="checked" name="estado[]" value="viudo"/>
							<span>Soltero</span>
					</label>
				</div>
				
				<div>
					Comment: <textarea name="comment" rows="5" cols="40"> </textarea>
				</div>
				<br>
				<br>
				<br>
				<div class="input-field col s12">
					
					<select multiple>
					  <option value="Zoro">Zoro</option>
					  <option value="Sanji">Sanji</option>
					  <option value="Law">Law</option>
					  <option value="Luffy" >Luffy</option>
					</select>
					<label>One Piece</label>
				</div>
				<br>
				<br>
				<br>
				
				<label> Superhéreo favorito</label>
				<input list="superheroes" name="list"/>
				<datalist id="superheroes">
					<option label="Iron Man" value="I.M.">
					<option label="Batman" value="Batman">
					<option label="Hulk" value="H">
				</datalist>
				<br>
				<!--
				<div>Coche
					<select name="carlist[]" multiple="multiple" size="3">
						  <option value="volvo">Volvo</option>
						  <option value="saab">Saab</option>
						  <option value="opel">Opel</option>
						  <option value="audi">Audi</option>
					</select>
					
					
				</div>
				-->
				
				<div>Ciudad
					<select name="city" >
						  <option value="Madrid">Madrid</option>
						  <option value="Merida">Merida</option>
						  <option value="Valencia">Valencia</option>
						  <option value="Almeria">Almeria</option>
					</select>
					
					
				</div>
			

				<div>
					Contraseña: <input type="password" name="contra" >
					<?php echo"<span>$ErrPwd</span>";?>
				</div>
				
					
				<div><input type="submit" name="aceptar" value="ENVIAR"></div>	
				
			</form>
	