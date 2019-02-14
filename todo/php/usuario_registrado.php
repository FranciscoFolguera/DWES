<?php 
			session_start();
			include '../inc/header.php';
			
			
			echo "<h1>Francisco Folguera Sásssssssssssssssssssssnchez</h1>";
			
			if(isset($_SESSION['name'])){
				$var=$_SESSION['name'];
				echo"<p>Bienvenido $var </p>";
			}else{
				echo'<p>NO tienes permisos,pulsa <a href="login.php">aquí</a> para registrate</p>';
			}
			
			
			
			
			
			include '../inc/footer.php';				

					
					
?>

	