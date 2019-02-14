<?php 
	
			include '../inc/header.php';
			
				echo "<h1>Francisco Folguera Sánchez</h1>";
			
			
			$fichero= fopen("../txt/visitas.txt" ,'r+');
			
			$contador= fread($fichero, 8);
					

			echo"<p>Esta e sla visita nº: $contador</p>";
				$contador++;
			rewind($fichero);
		
			fwrite($fichero,$contador);
			fclose($fichero);
			
			
			/*
			$lineas= file ("../../visitas.txt");
			foreach($lineas as $n=>$dato){
				
					echo "linea $n: ".htmlspecialchars($dato)."<br>";
			}
			*/
			include '../inc/footer.php';				

					
					
?>

	