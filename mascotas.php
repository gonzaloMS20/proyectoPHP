<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<HTML>
	<HEAD>
		<TITLE>TIENDA</TITLE>
		<META http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	</HEAD>
	<CENTER> 
		<H1>MASCOTAS DISPONIBLES EN NUESTRA TIENDA</H1>
	</CENTER>
	<BR><BR>
<?php 
	session_start();
	
	$usuario=$_SESSION['user'];
	$password=$_SESSION['pass'];
	
	if ($usuario=="" || $password==""){
		header ('location: index.php');
	}

?>

	<CENTER>

	<BODY bgcolor="#ffffff" text="#000000" link="#0000ff" vlink="#800080" alink="#ff0000">

		<H2>SELECCIONA TU MASCOTA:</H2>	
		<FORM action="comprarMascota.php" method="post">

			<SELECT name="mascota" MULTIPLE>

<?php

	$conn_string = "host=localhost dbname=tienda user=admin password=hola123,";
	$conexion = pg_connect($conn_string);
	
	if(!$conexion){
		echo "<CENTER>
		Error: no se pudo conectar a la bd';
		</CENTER>";
		exit;
	}else{

		$query = "SELECT nombre FROM producto";
		$result = pg_query($query) or die('La consulta fallo: ' . pg_last_error());

		if(!$result){
		
			echo "ocurrio un error.\n";
			exit;
		}else{

			while($row = pg_fetch_assoc($result)){
	
				echo '<option value="'.$row['nombre'].'">'.$row['nombre'].'</option>';
			}
		}
		
	}

?>
			
			</SELECT>
			<BR></BR>
			<INPUT type="submit" value="Ver Mascota"><INPUT type="reset">
		</FORM>
	</BODY>
	</CENTER>
</HTML>


