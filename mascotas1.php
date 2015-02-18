<HTML>
	<HEAD>
	<TITLE>
	MASCOTAS DISPONIBLES
	</TITLE>
	</HEAD>
	<BODY>
<<<<<<< HEAD
<form action="mascotas2.php" method="post">
<select name="mascota">
=======
>>>>>>> bfc40396c9b71d1da2bfd3e8ce5b727b61758393

<?php

	$conn_string = "host=localhost dbname=tienda user=admin password=hola123,";
	$conexion = pg_connect($conn_string);
	if(!$conexion){
		echo"<CENTER>
		Error: no se pudo conectar a la bd';
		</CENTER>";
		exit;
		}

<<<<<<< HEAD
	$query = "SELECT nombre,cantidad,imagen FROM producto";
	$result = pg_query($query) or die('La consulta fallo: ' . pg_last_error());
	
=======

	$query = "SELECT nombre,cantidad FROM producto";
	$result = pg_query($query);
>>>>>>> bfc40396c9b71d1da2bfd3e8ce5b727b61758393
	if(!$result)
	{
		echo "ocurrio un error.\n";
		exit;
	}
<<<<<<< HEAD
	
	//$row = pg_fetch_assoc($result);
	while($row = pg_fetch_assoc($result)){
	
		echo '<option value="'.$row['nombre'].'">'.$row['nombre'].'</option>';
		//echo '<img src="imagenes/cerdo.png">';
		$q = "SELECT imagen FROM producto WHERE nombre = '".$row['nombre']."'";
		
		print  '<br><h1>hola</h1>';
		//print '<p>'.$q.'</p>';
		//$registro = pg_query($q) or die('La consulta fallo: ' . pg_last_error());
		//$imagenes = pg_fetch_array($registro);
		 //echo '<br><img src="'.$imagenes["imagen"].'><br>';
		#echo "<br/>\n";
	}
=======
?>
<form method="post">
<select name="mascota">
<?php
	while($row = pg_fetch_assoc($result)){	
		echo '<option value="'.htmlspecialchars($row['nombre']).'">'.htmlspecialchars($row['nombre']).'</option>';
		echo "<br/>\n";
		}
		
		
		$cantidad = $_POST['cuantos'];
		print ($cantidad);
		echo "<input type=text value=\"$cantidad\"/>";		
		?>

</select>
>>>>>>> bfc40396c9b71d1da2bfd3e8ce5b727b61758393

<?php
		
		echo "
			<input type=submit name=enviar value=\"enviar\"/>";
		if($_POST[enviar]){
			}
		
		echo "
			<input type=submit name=total value=\"total\"/>";
		if($_POST[total]){
			}
	pg_close($conexion);

?>
<<<<<<< HEAD
<br>
</select>

<INPUT type="submit" value="Guardar"> <INPUT type="reset">
=======
>>>>>>> bfc40396c9b71d1da2bfd3e8ce5b727b61758393
</form>
	</BODY>
	</HEAD>
</HTML>


