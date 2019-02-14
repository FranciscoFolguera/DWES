<?php 
	
			include '../inc/header.php';
			
				echo "<h1>Include funciones</h1>";
			
			
			
			function divisores($num){
				
				echo"<p>Nº: $num</p>";
					$contador=0;
				
				echo"<p>Los divisores de $num son: </p>";

				for($ind22=1; $ind22<=$num; $ind22++){
					
					if($num%$ind22===0){
						echo $ind22.", ";
						$contador++;
						
					}
				}
				return $contador;
			}
			
			function es_primo($num){
				$primo=true;
				$contador=divisores($num);
				
				
				
				if($contador<=2){
					echo"<p> El nº, $num , es primo </p>";
				}if($contador>=3){
					echo"<p>El nº, $num, no es primo</p>";
				}
				
				
			}
			
			
			
			
			
			
			include '../inc/footer.php';				

					
					
?>

	