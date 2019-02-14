<?php 
	
			include '../inc/header.php';
			
				echo "<h1>Francisco Folguera Sánchez</h1>";
			
			
			
			
			
				
				
					
			//ACTIVIDAD 18
			
			echo"<br>";
				echo("<h3>ACTIVIDAD 18 </h3>");
				echo"<br>";
				
				echo"<p>Intoruduce un mes (nº) en la  URL de la siguiente manera: .php?mes=nº </p>";

				$mes= @$_GET['mes'] or die ("falta el nº de mes, error ");
				
				
				switch ($mes) {
						case 1:
						case 2:
						case 3:
							echo "Primer trimestre";
							break;
						case 4:
						case 5:
						case 6:
							echo "Segundo trimestre";
							break;
						case 7:
						case 8:
						case 9:
							echo "Tercer trimestre";
							break;
						case 10:
						case 11: 
						case 12:
							echo "Cuarto trimestre";
							break;
							
						default:
							echo "ERROR, introduce un nº del 1 al 12";
				}
				
				
				
			//ACTIVIDAD 19
			
			echo"<br>";
				echo("<h3>ACTIVIDAD 19 </h3>");
				echo"<br>";
			
			$Err19="";
			$Errnum1=$Errnum2="";
				
			//$num1= @$_GET['num1'] or die ("falta el nº1, error ");
			//$num2= @$_GET['num2'] or die ("falta el nº2, error ");

			//	echo"<p>Intoruduce un mes (nº) en la  URL de la siguiente manera: .php?mes=nº </p>";
			
			$num1=60;
			$num2=2;
			
			
			@!($num1<0) or die ("El nº1 debe ser positivo");
			@!($num2<0) or die ("El nº2 debe ser positivo");
			@!($num1<$num2) or die("El nº1 tiene que ser mayor que el nº 2");
			@!($num2==0) or die ("EL divisor debe ser distinto de 0");
		
			$resultado= $num1/$num2;
			echo"<p>El resultado es: $resultado</p>";
			
			//ACTIVIDAD 20
			
				echo"<br>";
				echo("<h3>ACTIVIDAD 20 </h3>");
				echo"<br>";
				
			$num1=50;
			$num2=13;
			$modulo=$num1%$num2;
			
			if($modulo==0){
				echo"<p>Division exacta</p>";
			}else if ($modulo==1){
				echo"<p>Sobra 1</p>";
			}else if($modulo==2){
				echo"<p>Sobra 2</p>";
			}else if($modulo>2){
				echo"<p>Sobra mas de 2</p>";
			}else{
				echo"<p>ERROR</p>";
			}
				
			
			
			//ACTIVIDAD 21
			
				echo"<br>";
				echo("<h3>ACTIVIDAD 21 </h3>");
				echo"<br>";
				
				$listaNum21= Array();
				$media=0;
				$sumar=0;
				$aux;
				for($ind=0; $ind<10; $ind++){
					
					array_push($listaNum21,$aux=rand(1,50));
					
				}
				
				foreach($listaNum21 as $key_arr => $vall_arr){
					
					$sumar+=$vall_arr;
				}
				$media=$sumar/count($listaNum21);
				echo"<p>La media es: $media</p>";
			
			//ACTIVIDAD 22
			
				
				echo"<br>";
				echo("<h3>ACTIVIDAD 22 </h3>");
				echo"<br>";
				$num=rand(1,50);
				echo"<p>Nº: $num</p>";
				
				$contador=0;
				
				for($ind22=2; $ind22<=(($num/2)+1); $ind22++){
					
					if($num%$ind22===0){
						$contador++;
						
					}
					if($contador>=1){
						echo"<p> ESTE nº, $num , no es primo </p>";
						break;
					}
				}
				if($contador===0){
					echo"<p> El nº, $num , es primo </p>";
				}
				
			//ACTIVIDAD 23
			
				
				echo"<br>";
				echo("<h3>ACTIVIDAD 23 </h3>");
				echo"<br>";	
				
				$num=rand(1,50);
				echo"<p>Nº: $num</p>";
				
					echo"<p>Los divisores de $num son: </p>";

				for($ind22=2; $ind22<=$num; $ind22++){
					
					if($num%$ind22===0){
						echo $ind22.", ";
						
					}
				}
				
			//ACTIVIDAD 24
			
				
				echo"<br>";
				echo("<h3>ACTIVIDAD 24 </h3>");
				echo"<br>";		
				
			
				$num1=rand(1,50);
				echo"<p>Nº uno: $num1</p>";	
				
				$num2=rand(1,50);
				echo"<p>Nº dos: $num2</p>";	
				
				$operacion=rand(1,4);
				echo"<p>$operacion</p>";
				

				switch ($operacion) {
						case 1:
							echo"La suma entre $num1 y $num2 es:  " .$num1+=$num2;
							break;
						case 2:
							echo"La resta entre $num1 y $num2 es:  " .$num1-=$num2;
							break;
						case 3:
							echo"La multiplicaion entre $num1 y $num2 es:  " .$num1*$num2;
							break;
						case 4:
							echo"La division entre $num1 y $num2 es:  " .$num1/$num2;
							break;
						
							
						default:
							echo "ERROR ";
				}
				
			//ACTIVIDAD 25
			
				
				echo"<br>";
				echo("<h3>ACTIVIDAD 25 </h3>");
				echo"<br>";			
				
				include '../inc/funciones.php';	

				$num=rand(1,50);
				echo"<p>$num</p>";	
				
				es_primo($num);
				
			//ACTIVIDAD 26
			
				
				echo"<br>";
				echo("<h3>ACTIVIDAD 26 </h3>");
				echo"<br>";		
				
				$cantidad=0;
				$multiplos=array();
				
			
			do{
				
				
				
				for($i=1; $i<=20; $i++){
					
					$multiplos[]=($i*35);
					$cantidad++;
				}
				
				
			}while($cantidad!=20);
			
				foreach($multiplos as $key_arr5 => $vall_arr5){
					echo"<p>$key_arr5=>>>>>$vall_arr5</p>";
				}	
				
			include '../inc/footer.php';				

					
					
?>

	