
<?php
function filtrado($datos){
				$datos=trim($datos); //Elimina espacios antes y despues de los datos
				$datos= stripslashes($datos); //Elimina los /
				$datos= htmlspecialchars($datos);// Traduce caracteres especiales en entidades H
				return $datos;
			}
function validar($usuario,$contra){
	
	/*
		Esta funcción filtra el nombre y contraseña de tal manera que ambos campos tienen que estar "rellenados"
	*/
		$validado=false;
		filtrado($usuario);
		filtrado($contra);
			
			if((strlen($usuario)>=1)&&(strlen($contra)>=1)){
				
				$validado=true;
			}
		return $validado;
	
}

function comprobarSesion(){
	/*
		Comprueba si la sesión se ha iniciado, sino es así redirecciona a entrada.php
	*/
	session_start();
	
	if(!isset($_SESSION['usuario'])){
		header('Location: entrada.php');
	};
	
}

function articulos(){
	/*
		Me creo un array por cada artículo con su nombre, cantidad y precio	
			- Posterioremente creamos un array productos donde metemos cada articulo	
			- Los mostramos en una tabla
	*/
	
	$botellaAgua = array("nombre"=>"botellaAgua","existencias"=>15,"precio"=>1.5);
	$lechuga = array("nombre"=>"lechuga","existencias"=>5,"precio"=>0.78);
	$patatas = array("nombre"=>"patatas","existencias"=>13,"precio"=>1.2);
	$chocolate = array("nombre"=>"chocolate","existencias"=>4,"precio"=>2.3);
	$pan = array("nombre"=>"pan","existencias"=>30,"precio"=>0.45);
	
	
	
    $productos =array($botellaAgua,$lechuga,$patatas,$chocolate,$pan);
	
	?>
	<table>
			<tr>
				<td>SI PULSAS COMPRAS 1</td>
				<td>NOMBRE</td>
				<td>EXISTENCIAS</td>
				<td>PRECIO</td>
				
			</tr>
	<?php
	
	foreach($productos as $key_arrP => $vall_arrP){
		
		?>
			<tr>
		<?php
				

		
		foreach($vall_arrP as $key_arr => $vall_arr){
			

			if($key_arr=="nombre"){
				echo"<td >Comprar <a href=\"compra.php?articulo=$vall_arr\"> aquí</a> 1 </td>";
			}
			
						?>
							<td> 
							<?php
								echo $vall_arr;
							?>	
							</td>
						<?php
		}
		
		
		
		?>
			</tr>
		<?php
		
	}
	
		?>
			</table>
		<?php
}


function mostrar_carrito(){
	
	
	?>
	<h3>Mi carrito</h3>
	<table>
			<tr>
				<td>PRODUCTO</td>
				<td>CANTIDAD</td>
				
			</tr>
	<?php
	
	
	
	foreach($_SESSION['carrito'] as $key_arr => $vall_arr){
		echo"<tr>";
		echo"<td> $key_arr </td>";
		echo"<td> $vall_arr </td>";
		echo"</tr>";
	}
	
	?>
			</table>
	<?php
}

?>
