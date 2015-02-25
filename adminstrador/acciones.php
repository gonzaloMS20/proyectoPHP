

<?php
$cant_=$_POST['cant'];
$prec_=$_POST['prec'];
$nomb_=$_POST['nomb'];
$desc_=$_POST['desc'];
$ima_=$_POST['ima'];

	$conn_string = "host=localhost dbname=tienda user=admin password=hola123,";
	$conexion = pg_connect($conn_string);
	$uploaddir = '/var/www';
	$uploadfile=$uploaddir.basename($_FILES['userfile']['$ima']);
	$name = $_POST['ima'];
	
	if(!$conexion){
		echo "<CENTER>
		Error: no se pudo conectar a la bd';
		</CENTER>";
		exit;
	}else{

		$query = "INSERT INTO producto (cantidad,precio,nombre,descripcion,imagen) 
		VALUES ($cant_,$prec_,'$nomb_','$desc_',lo_import('$uploadfile'));";
		
		$result = pg_query($query) or die('Error al insertar datos: ' . pg_last_error());
		
		$cmdtuples = pg_affected_rows($result);
		echo $cmdtuples . " datos registrados.\n";
		
		echo "<hr>";
		pg_free_result($result);
		pg_close($conn_string);
	}

?>
