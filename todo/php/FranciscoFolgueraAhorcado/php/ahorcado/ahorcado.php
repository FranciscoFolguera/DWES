<?php 
			function filtrado($datos){
				$datos=trim($datos); //Elimina espacios antes y despues de los datos
				$datos= stripslashes($datos); //Elimina los /
				$datos= htmlspecialchars($datos);// Traduce caracteres especiales en entidades H
				return $datos;
			}
			function imprimirPalabra($listPalabra,$listaLetra){
				
				foreach($listPalabra as $key_Palabra => $vall_Palabra){
								
								foreach($listaLetra as $key_Letra => $vall_Letra){
									
									if($vall_Letra==$vall_Palabra){
										$cont=1;
										break;
									}else{
										$cont=0;
									}
								}
								if($cont==1){
									echo"$vall_Letra";
									
								}else {
									echo" _ ";

									$resuelto=false;
								}
								
							}
			}
			function imprimirListaLetra($listaLetra){
				$fichero= fopen("../../txt/ahorcado/letras.txt" ,'a+');
				fclose($fichero);
				$archivo = file( "../../txt/ahorcado/letras.txt"  ); 
				$lineas = count( $archivo ); 
				for( $i = 0; $i < $lineas; $i++ ){ 
						
							$listaLetra[$i] = filtrado($archivo[$i]); 						
				}
				echo'<h2 class="rojo">Letras utilizadas: ';
					foreach($listaLetra as $key_Letra => $vall_Letra){
								echo"$vall_Letra, ";
								}
					echo"</h2>";
			}
			
			
			include '../../inc/headerAhorcado.php';
		
				
			$fichero= fopen("../../txt/ahorcado/fallos.txt" ,'r+');
								$contador= fread($fichero, 8);
								
								rewind($fichero);
								fwrite($fichero,$contador);
								fclose($fichero);
			
			switch ($contador) {
									case 0:
										$imagen='src="../../img/ahorcado/start.png"';		
									
									break;
									case 1:
											$imagen='src="../../img/ahorcado/1.png"';		
											
											
									break;
									case 2:
											$imagen='src="../../img/ahorcado/2.png"';	
																			
											
									break;
									case 3:
											$imagen='src="../../img/ahorcado/3.png"';
													
											
									break;
									case 4:
											$imagen='src="../../img/ahorcado/4.png"';		
											
									break;
									case 5:
											$imagen='src="../../img/ahorcado/5.png"';		
										
											
									break;
									case 6:									
											
											header('Location: gameOver.php');											
									break;					
									default:
									header('Location: error.php');	

												$fichero= fopen("../../txt/ahorcado/fallos.txt" ,'r+');
												//$contador= fread($fichero, 8);
												$contador=0;
												rewind($fichero);
												fwrite($fichero,$contador);
												fclose($fichero);
									break;
							}
							
			$letra= $respuesta= "";
			$Err=false;
			$ErrLetra= $ErrRespuesta="";
			
				$palabra="ORDENADOR";
			
			
			$listaLetra= array();
			
			imprimirListaLetra($listaLetra);
			
			
			
			
			
			$listaPalabra= array();
			$numLetras=strlen ($palabra);
			
			
				
			
		
			
			
			if(!isset($_POST['aceptar'])){
				//no se ha enivado
			?>
			
			
			<?php 
					include'../../inc/bodyAhorcado.php';
			?>
			
			<div class="barritas">
				<?php
					for($i=0;$i<$numLetras;$i++){
						echo " _ ";
					}
				?>
			</div>
			<?php
			} 
			
			else{
			
				
				$Err=false;
				
				
				
				$ErrLetra= $ErrRespuesta="";
				if ((empty($_POST['letra'])) &&(empty($_POST['respuesta']))){
					
					$ErrLetra="Rellena uno de los dos campos.";
				}else if((strlen($_POST['letra'])>=1) &&(strlen($_POST['respuesta'])>=1)){
						$ErrLetra="Solo puedes rellenar uno de los dos campos.";
						$Err= true;
				};
				
				 
				
				if($Err==true){
					include'../../inc/bodyAhorcado.php';
					
				}else{
					include'../../inc/bodyAhorcado.php';
						
						
						$conAcierto=0;
						$resuelto=true;
						
						
						 if(strlen($_POST['letra'])>=1){
							
							
							
							$letra=$_POST['letra'];
							$letra = strtoupper($letra);
							$fichero= fopen("../../txt/ahorcado/letras.txt" ,'a+');
							fwrite($fichero,$letra."\n");
							fclose($fichero);
						
							$archivo = file( "../../txt/ahorcado/letras.txt"  ); 
							$lineas = count( $archivo ); 

							for( $i = 0; $i < $lineas; $i++ ){ 
						
								$listaLetra[$i] = filtrado($archivo[$i]); 

							
							}
						
							
						
							echo'<div class="barritas">';
						
							$listPalabra=str_split($palabra);
							
							$cont=0;
							imprimirPalabra($listaPalabra,$listaLetra);
							foreach($listPalabra as $key_Palabra => $vall_Palabra){
								
								foreach($listaLetra as $key_Letra => $vall_Letra){
									
									if($vall_Letra==$vall_Palabra){
										$cont=1;
										break;
									}else{
										$cont=0;
									}
								}
								if($cont==1){
									echo"$vall_Letra";
									
								}else {
									echo" _ ";

									$resuelto=false;
								}
								
							}
							foreach($listPalabra as $key_Palabra => $vall_Palabra){
								
								if(end($listaLetra)==$vall_Palabra){
									$conAcierto=1;
								}
							}
							
							
							
							
							echo'</div>';
							
						
						}else if (strlen($_POST['respuesta'])>=1){
							
							$respuesta=$_POST['respuesta'];
							$respuesta = strtoupper($respuesta);
							if($respuesta==$palabra){
								
								$resuelto=true;
							}else{
								$conAcierto=0;
								$resuelto=false;
							}
						}else if((strlen($_POST['letra'])<=1) &&(strlen($_POST['respuesta'])<=1)){
						$ErrLetra="TIENES QUE LLENAR UNO DE LOS CAMPOS";
						$resuelto=false;
						}
						if($resuelto==true){
							header('Location: ahorcadoResuelto.php');
						};
						if($conAcierto==0){
								$fichero= fopen("../../txt/ahorcado/fallos.txt" ,'r+');
								$contador= fread($fichero, 8);
								$contador++;
								rewind($fichero);
								fwrite($fichero,$contador);
								fclose($fichero);
								echo"$contador C";
						};
							
							echo"<h3>Fallos ----->$contador</h3>";
							
						
				}
				
				
			
			}
			?>
			<?php
			
			include '../../inc/footer.php';				
?>

	