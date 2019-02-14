<!DOCTYPE>
<html lang="es">
<head>
   <title>Formulario simple</title>
   <link rel="stylesheet" type="text/css" href="estilo.css">
</head>

<body>
<?php
	/*Array
(
    [archivo2] => Array
        (
          [name] => loquesea.txt
          [type] => text/plain
          [tmp_name] => C:\ejemplos\loquesea.txt
          [error] => 0
          [size] => 27890
        )
)	*/
	// en vez de en $_POST, consultamos la variable en $_FILES y obtenemos un array
	$fichero = $_FILES['fichero'];
	
	echo "<pre>";
	print_r($fichero);
	echo "</pre>";

	/* TRATAMIENTO DEL FICHERO 
	si se ha subido correctamente el fichero:
		Asignar un nombre al fichero
		Mover el fichero a su ubicación definitiva
	si no:
		Mostrar un mensaje de error
	fsi
	*/

	if (is_uploaded_file ($_FILES['fichero']['tmp_name']))
	{
	   $nombreDirectorio = $_SERVER['DOCUMENT_ROOT']."/Archivos/"; 
	   $idUnico = time();
	   $nombreFichero = $idUnico . "-" . $_FILES['fichero']['name'];
	   $nombreFichero = $_SERVER['DOCUMENT_ROOT']."/Archivos/".$nombreFichero; 
		if (move_uploaded_file ($_FILES['fichero']['tmp_name'],   $nombreFichero)){
				echo "El fichero se ha movido correctamente <br>";
		}else{
			echo "Se ha producido un error al mover el fichero <br>";
		}
	}
	else{
		print ("No se ha podido subir el fichero\n");
		switch ($_FILES['fichero']['error']) {
        case UPLOAD_ERR_OK:
            break;
        case UPLOAD_ERR_NO_FILE:
            throw new RuntimeException('-- NO SE HA ENVIADO NINGÚN FICHERO --');
        case UPLOAD_ERR_INI_SIZE:
        case UPLOAD_ERR_FORM_SIZE:
            throw new RuntimeException('-- SUPERA EL TAMAÑO PERMITIDO --');
		case UPLOAD_ERR_NO_TMP_DIR:
			throw new RuntimeException('-- No existe la carpeta temporal --');
		case UPLOAD_ERR_CANT_WRITE:
			throw new RuntimeException('-- No se puede escribir en el disco --');
        default:
            throw new RuntimeException('Unknown errors.');
		}
	}
	
?>
</body>
</html>
