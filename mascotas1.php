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
<form action="updateform.php" method="post">
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
</form>
<?php
		
		echo "<form method=\"post\">
			<input type=submit name=enviar value=\"enviar\"/></form>";
		if($_POST[enviar]){
			}
		
		
	pg_close($conexion);

?>
	</BODY>
	</HEAD>
</HTML>

