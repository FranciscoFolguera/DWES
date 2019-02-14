<!DOCTYPE>
<html lang="es">
<head>
   <title>Formulario simple</title>
   <link rel="stylesheet" type="text/css" href="estilo.css">
</head>

<body>

<h1>Formulario simple</h1>

<?php
/* requisitos: revisar las variables de entorno del php.ini
; Whether to allow HTTP file uploads.
; http://php.net/file-uploads
file_uploads=On

; Temporary directory for HTTP uploaded files (will use system default if not
; specified).
; http://php.net/upload-tmp-dir
upload_tmp_dir="C:\xampp\tmp"

; Maximum allowed size for uploaded files.
; http://php.net/upload-max-filesize
upload_max_filesize=2M

; Maximum number of files that can be uploaded via a single request
max_file_uploads=20


- El tamaño del fichero también se puede establecer en el formulario
<INPUT TYPE=”HIDDEN” NAME=”MAX_FILE_SIZE” VALUE='102400'>
<INPUT TYPE=”FILE” NAME="fichero">

*/
?>
<form class="borde" action="<?php echo htmlspecialchars("ficheroC_dos.php")?>"
			method="POST" enctype="multipart/form-data">
	
	<!--INPUT tipo FILE -->
	<div> 
		<label for="fichero"> Fichero a subir </label> 
		<input type="file" id="fichero" name="fichero">
	</div>

	<div>
			<input type="submit" name="aceptar" value="Aceptar"><br>	<br>

	</div>
	<!--
FILE
-->
	
	
</form>

</body>
</html>
