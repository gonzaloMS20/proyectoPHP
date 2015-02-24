<HTML>
	<HEAD>
	<TITLE>
	MASCOTAS DISPONIBLES
	</TITLE>
	</HEAD>
	<BODY>

<?php

	$conn_string = "host=localhost dbname=tienda user=admin password=hola123,";
	$conexion = pg_connect($conn_string);
	if(!$conexion){
		echo"<CENTER>
		Error: no se pudo conectar a la bd';
		</CENTER>";
		exit;
		}


	$query = "SELECT nombre,cantidad FROM producto";
	$result = pg_query($query);
	if(!$result)
	{
		echo "ocurrio un error.\n";
		exit;
	}
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
</form>
	</BODY>
	</HEAD>
</HTML>

