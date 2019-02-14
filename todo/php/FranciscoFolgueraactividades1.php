<!DOCTYPE html>
<html>
	<head>
		<title>Actividades PHP</title>
		 <link rel="stylesheet" type="text/css" href="actividad1Css.css">
		 <meta charset="UTF-8">
	</head>
	<body>
	<?php 
	
			
			echo "<h1>Francisco Folguera Sánchez</h1>";
			
			echo"<pre>";
			
				

			//ACTIVIDAD 1
				echo"<p>";
				echo("ACTIVIDAD 1 \n");
				echo"<p>";

					$var1= 5;
					$var2= 10;
					
					//Creamos una variable auxiliar, varAux
					$varAux= $var1;
					$var1= $var2;
					$var2= $varAux;
					print("$var1  $var2");		
		
				
			//ACTIVIDAD 2
				echo"<p>";
				echo"<p>";

				echo("ACTIVIDAD 2 \n");
				echo"<p>";

					$var1= 5;
					$var2= 10;
					
					print("La suma de las variables 1 y 2 es: "); echo($var1+$var2);
					echo"<p>";

					print("La resta de las variables 1 y 2 es: "); echo($var1-$var2);
					echo"<p>";

					print("La division de las variables 1 y 2 es: "); echo($var1/$var2);
					echo"<p>";

					print("La multiplicacion de las variables 1 y 2 es: "); echo($var1*$var2);
					
			//ACTIVIDAD 3
				echo"<p>";
				echo"<p>";

				echo("ACTIVIDAD 3 \n");
				echo"<p>";		
					
						$numMan= 20;
						$numWoman= 5;
						$total= $numMan+ $numWoman;
						
						print("El numero total de alumnos es: "); echo($total);
						echo"<p>";
						print("El porcentaje de ninos es: "); echo(($numMan*100)/$total)."%";
						echo"<p>";
						print("El numero total de ninas es: "); echo(($numWoman*100)/$total)."%";

			

			//ACTIVIDAD 4
			
			echo"<p>";
				echo"<p>";

				echo("ACTIVIDAD 4 \n");
				echo"<p>";
			print("Esta es la tabla del 7");
			echo"<p>";
			
			$numTa=7;
			$Rows=10;
			$Cols=2;
			
				echo '<table>';
					for($i=1;$i<=$Rows;$i++){
						$resultado=$numTa*$i;
						echo '<tr>';
						for($j=1;$j<=$Cols;$j++){ 
							if($j===1){
								echo "<td>$i</td>";
							}
							if($j===2){
								echo "<td>$resultado</td>";
							}
						}
						echo '</tr>';
											}
				echo '</table>';
				
				
			//ACTIVIDAD 5	
			echo"<p>";
				echo"<p>";

				echo("ACTIVIDAD 5 \n");
				echo"<p>";
			
			$Cols=2;
			
			$listaArr= array("nombre"=>"Bruce", "apellido 1"=>"Wayne", "apellido 2"=>"Batman", "direccion"=>"Gotham City", "telefono"=>"516561656");
			
				echo '<table>';
					foreach($listaArr as $key_arr => $vall_arr){
						
						echo '<tr>';
						for($j=1;$j<=$Cols;$j++){ 
							if($j===1){
								echo "<td>$key_arr</td>";
							}
							if($j===2){
								echo "<td>$vall_arr</td>";
							}
						}
						echo '</tr>';
						
						
											}
				echo '</table>';
			
			
				
			//ACTIVIDAD 5	
			echo"<p>";
				echo"<p>";

				echo("ACTIVIDAD 6 \n");
				echo"<p>";
			
			$Cols=2;
			
			$playList= array("Lose yourself", "Desarraigo", "Hello cotto", "Opening One Piece", "NA NA NA NA BATMAAN");
			
			echo"<ol>";
					foreach($playList as $i){
						
					echo"<li>$i</li>";
					}	
			echo"</ol>";
			
			
			echo"</pre>";
			
			

			
			
	?>

	</body>
</html>