

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

		$query = "DELETE FROM producto where nombre='$nomb_';";
		
		$result = pg_query($query) or die('Error al insertar datos: ' . pg_last_error());
		
		$cmdtuples = pg_affected_rows($result);
		echo $cmdtuples . " datos eliminados.\n";
		
		echo "<hr>";
		pg_free_result($result);
		pg_close($conn_string);
	}
echo '<a href="'.$_SERVER['HTTP_REFERER'].'">Regresar</a>';
?>
