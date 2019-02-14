<?php 
			function filtrado($datos){
				$datos=trim($datos); //Elimina espacios antes y despues de los datos
				$datos= stripslashes($datos); //Elimina los /
				$datos= htmlspecialchars($datos);// Traduce caracteres especiales en entidades H
				return $datos;
			}
			include '../../inc/headerAhorcado.php';
			
			
				$imagen="../../img/ahorcado/start.png";		
				echo'<img src="'.$imagen.'" alt="Smiley face">';	
			
			
			
			$letra= $respuesta= "";
			$Err=false;
			$ErrLetra= $ErrRespuesta="";
			
			$palabra="AGUACATE";
			
			$listaLetra= array();
			
			$listaPalabra= array();
			$numLetras=strlen ($palabra);
			
			
				
			
			echo"<p>$numLetras<p>";
			
			
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
			?>
		    
			
			
			<?php
			} 
			
			else{
				
				$Err=false;
				
				
				
				$ErrLetra= $ErrRespuesta="";
				if ((empty($_POST['letra'])) &&(empty($_POST['respuesta']))){
					$Err= true;
					$ErrLetra="Rellena uno de los dos campos.";
				};
				
				 
				
				if($Err==true){
					include'../../inc/bodyAhorcado.php';
					
				}else{
					include'../../inc/bodyAhorcado.php';
					
					
					echo'<div class="barritas">';
				
						for($i=0;$i<$numLetras;$i++){
							echo " _ ";
						}
				
					echo'</div>';
				
					
						if(strlen($_POST['letra'])>=1){
							$listaLetra=array("A");
							
							echo"<p>TODO OK</p>";
							
							$letra= filtrado($_REQUEST['letra']);
							echo"<p>TODO OK2</p>";
							
						
									

						
							echo'<div class="barritas">';
							
							
							$listPalabra=str_split($palabra);
							
						
							foreach($listPalabra as $key_arrP => $vall_arrP){
								$cont=0;
								
							
								foreach($listaLetra as $key_arrL => $vall_arrL){
									
									if($vall_arrP==$vall_arrL){
										
										$cont=1;
									}else{
										
									}
								}
								
								if($cont==1){
									echo $vall_arrP;
								}else{
									echo " _ ";
								}
							}	

												
							
							
							echo'</div>';
							
							
						}
						
						
							
							
				}
				
			
			}
			?>
			<?php
			
			include '../../inc/footer.php';				
?>

	