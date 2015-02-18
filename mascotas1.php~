<HTML>
	<HEAD>
	<TITLE>
	MASCOTAS DISPONIBLES
	</TITLE>
	</HEAD>
	<BODY>
<form action="updateform.php" method="post">
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
		

	$query = "SELECT nombre FROM producto";
	$result = pg_query($query);
	if(!$result)
	{
		echo "ocurrio un error.\n";
		exit;
	}
	while($row = pg_fetch_assoc($result)){
		echo '<option value="'.htmlspecialchars($row['nombre']).'">'.htmlspecialchars($row['nombre']).'</option>';
		#echo "<br/>\n";
		}

		
	pg_close($conexion);
?>
</select>
</form>
	</BODY>
	</HEAD>
</HTML>

