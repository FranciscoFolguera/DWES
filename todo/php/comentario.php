<?php 
			
			function filtrado($datos){
				$datos=trim($datos); //Elimina espacios antes y despues de los datos
				$datos= stripslashes($datos); //Elimina los /
				$datos= htmlspecialchars($datos);// Traduce caracteres especiales en entidades H
				return $datos;
			}
			
			include '../inc/materialize.php';
			
				echo "<h1>Francisco Folguera Sánchez</h1>";
				$Err= false;
				$nombre= $comment=  "";
				$ErrNombre= $ErrComent= "";
			
			
			
			 if(!isset($_POST['aceptar'])){
				//no se ha enivado
			?>
			
			
			<?php 
					include '../inc/formComentario.php';
			?>
		    
			
			
			<?php
			} 
			
			else{
				
				$Err=false;

				$ErrNombre= $ErrComent="";
				
				 if (empty($_POST['nombre'])){
					$Err= true;
					$ErrNombre= "El nombre es requerido";
				};
				  if (empty($_POST['comment'])){
					$Err= true;
					$ErrComent= "El comentario es requerido";
				};
				
				if($Err==true){
					include '../inc/formComentario.php';
					
				}else{
						//PROCESAR EL FORMULARIO
						
							$fichero= fopen("../txt/datos.txt" ,'a+');
							//$contador= fread($fichero, 32);
							
							//$contador= $nombre;
							//rewind($fichero);
							$nombre= filtrado($_REQUEST['nombre']);
							$comentario= filtrado($_REQUEST['comment']);

							fwrite($fichero,'--------------------------------------------------------------------------'."\n");
							fwrite($fichero,$nombre."\n");
							fwrite($fichero,$comentario."\n");
							fclose($fichero);
							
							
							?>
							
							<div>
									<div>Los datos de cargaron correctamente</div>
									<div>Pulse <a href="../txt/datos.txt">aquí</a> para ver los datos.</div>
							</div>
							<?php
							
							
							
							
				}
				
			
			}
			?>
		
			<?php
			
			
			
			include '../inc/footerMaterialize.php';				

					
					
?>

	