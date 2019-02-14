		
	<?php 
	
			include '../inc/header.php';
			
			echo "<h1>Francisco Folguera Sánchez</h1>";
			
			
				

			
			//ACTIVIDAD 12
				/*
					2 columnas de tamaño fijo. Color aleatorio (Random)
					
						-Los 3 randoms seleccionan la intensidad y el brillo de los colores
					
				*/
			
				$var1= rand(1,360);
				$var2= rand(1,100);
				$var3= rand(1,100);
				
				$color= ("($var1, $var2%, $var3%)");
				//echo"<p>$color</p>";
				
				$var1= rand(1,360);
				$var2= rand(1,100);
				$var3= rand(1,100);
				$color2= ("($var1, $var2%, $var3%)");
				//echo"<p>$color2</p>";

				echo"<br>";
				echo("<h3>ACTIVIDAD 12 </h3>");
				echo"<br>";
				
				
				echo'<table class="tabla12">';
				
					echo'<tr>';
						echo'<th style= "background-color: hsl'.$color.'"></th>';
						echo'<th style= "background-color: hsl'.$color2.'"></th>';
					echo'</tr>';
					
					
				echo'</table>';

			
			//ACTIVIDAD 13
			
				/*
				Crear unta tabla con el código del ejercicio 12 en ella
				*/
				echo"<br>";
				echo("<h3>ACTIVIDAD 13 </h3>");
				echo"<br>";
				
				
				echo'<table class="tabla12">';
				
					echo'<tr>';
						
						echo'<th>
								
								$var1= rand(1,360);
				$var2= rand(1,100);
				$var3= rand(1,100);
				
				$color= ("($var1, $var2%, $var3%)");
				//echo"<p>$color</p>";
				
				$var1= rand(1,360);
				$var2= rand(1,100);
				$var3= rand(1,100);
				$color2= ("($var1, $var2%, $var3%)");
				//echo"<p>$color2</p>";			
											
								//echo"<p>$color2</p>";

				echo"<br>";
				echo("<h3>ACTIVIDAD 12 </h3>");
				echo"<br>";
				
				
						
											
						
						</th>';
					echo'</tr>';
					
					
				echo'</table>';
					
				
			//ACTIVIDAD 14
					/*
						Crear 4 varibales y que se muestren aleatoriamente
							-Para eso se ha utilizado la función rand
					*/
					
				echo"<br>";
				echo("<h3>ACTIVIDAD 14 </h3>");
				echo"<br>";
				
				$msg1="Prueba de texto ";
				$msg2="Esto es un párrafo";
				$msg3="Mensaje de prueba";
				$msg4="Bonita variable";
				
	
				  $numAl= rand(1,4);
				$variable="msg".$numAl;
				
				echo'<p>' . $$variable. '</p>';
				
			
				
			//ACTIVIDAD 15
			
					/*
						Almacenar en un array los 10 primeros nºs pares
						-Se crea un array vacio sin longitud.
						-Em el primer for se introduce en el array el valor de la variable $ind15
						-En el segundo recorre el array y la imprim
					
					*/
			
				echo"<br>";
				echo("<h3>ACTIVIDAD 15 </h3>");
				echo"<br>";
				
				$listaNums= array();
				
				for( $ind15=0;  $ind15<=19; $ind15++){
					
					if($ind15%2==0){
						$listaNums[]=($ind15);
						
						
						
					}
				}
				foreach($listaNums as $key_arr => $vall_arr){
					echo"<p>$key_arr=>>>>>$vall_arr</p>";
				}
			
			
			//ACTIVIDAD 16
			
			
				/*
						Tabla de 4 x 4 en donde cada celda irá una potenciaTabla
						
							- Se ha creado una función (potenciaTabla) donde imprime dicha tabla con los valores correrpodientes
							- Recibe la base y el exponente
				*/
				echo"<br>";
				echo("<h3>ACTIVIDAD 16 </h3>");
				echo"<br>";

				
				function potenciaTabla($base,$exponente ){
					echo'<table class="tabla12">';
					for($j=1; $j<=4; $j++){
						echo'<tr>';
						for($indx=1; $indx<=$exponente; $indx++){
							
							
							echo'<th>'
							.  pow($base,$indx).'
							</th>';
						
						}
						echo'</tr>';
						$base++;
					}
					echo'</table>';
				}
				
				potenciaTabla(1,4);
				
				
				
				
			//ACTIVIDAD 17
			
			
				/*
						Se crea una tabla de 4 columnas y de filas indefinidas
						Se imprime cada imagen en una celda, cuando se llenan 4 celdas se pasa a la siguiente filas
						Las imágene se cogen de la carpeta 
				*/
				echo"<br>";
				echo("<h3>ACTIVIDAD 17 </h3>");
				echo"<br>";
	
				
				
				echo'<table >';
				$contador=0;
				$handle = opendir('../img/'); 
				$contador=0;
					while($file = readdir($handle)){
						
							if($file !== '.' && $file !== '..'){
								
								if($contador===0){
									echo'<tr>';
								}
										echo'<td><img class="image" src="../img/'.$file.'" border="0"/></td>';
										$contador++;
										
								if($contador===4){
									echo'</tr>';
									$contador=0;

								}
								
							}
						
					}
				
					closedir($handle);
				echo'</table>';
				
				
				

				
				
				
				
			include '../inc/footer.php';				
	?>

	