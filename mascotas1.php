<HTML>
	<HEAD>
	<TITLE>
	MASCOTAS DISPONIBLES
	</TITLE>
	</HEAD>
	<BODY>
<form action="mascotas2.php" method="post">
<select name="mascota">

<?php

	$conn_string = "host=localhost dbname=tienda user=admin password=hola123,";
	$conexion = pg_connect($conn_string);
	if(!$conexion){
		echo"<CENTER>
		Error: no se pudo conectar a la bd';
		</CENTER>";
		exit;
		}
		

	$query = "SELECT nombre,cantidad,imagen FROM producto";
	$result = pg_query($query) or die('La consulta fallo: ' . pg_last_error());
	
	if(!$result)
	{
		echo "ocurrio un error.\n";
		exit;
	}
	
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

		
	pg_close($conexion);
?>
<br>
</select>

<INPUT type="submit" value="Guardar"> <INPUT type="reset">
</form>
	</BODY>
	</HEAD>
</HTML>


