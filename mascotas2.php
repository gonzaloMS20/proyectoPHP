<?php 
	session_start();
	
	$usuario=$_SESSION['user'];
	$password=$_SESSION['pass'];

	echo '<P>hola'.$usuario.'</P>';
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<HTML>
	<HEAD>
		<TITLE>TIENDA</TITLE>
		<META http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	</HEAD>
	<CENTER> 
		<H1>MIRA A TU MASCOTA</H1>
	</CENTER>
	<BR><BR>

	<CENTER>

		<BODY bgcolor="#ffffff" text="#000000" link="#0000ff" vlink="#800080" alink="#ff0000">

			<H2>SELECCIONA TU MASCOTA:</H2>	

			<FORM action="validarUsuario.php" method="post">
				<TABLE 	border="1" width="300">
				<TR>
					<TD><STRONG>MASCOTA<STRING/></TD>
					<TD><STRONG>NOMBRE<STRING/></TD>
					<TD><STRONG>DESCRIPCION<STRING/></TD>
					<TD><STRONG>DISPONIBLES<STRING/></TD>
					<TD><STRONG>PRECIO<STRING/></TD>
				</TR>
<?php

	$mascota = $_POST[mascota];
	
	print $mascota;
	
	$conn_string = 'host=localhost dbname=tienda user=postgres password=hola123,';
	$conexion = pg_connect($conn_string);
	
	if(!$conexion){
		echo "<CENTER>
		Error: no se pudo conectar a la bd';
		</CENTER>";
		exit;
	}else{

		$query = "SELECT * FROM producto where nombre = '".$mascota."'";
		
		$result = pg_query($query) or die('La consulta fallo: ' . pg_last_error());

		if(!$result){
		
			echo "ocurrio un error.\n";
			exit;
		}else{
			$registro = pg_fetch_array($result);
			
			$queryImg = "SELECT lo_export(".$registro["imagen"].",'/var/www/img/".$registro["nombre"].".png') from producto where nombre='".$mascota."'"; 
			
			$resultImg = pg_query($queryImg) or die('La consulta fallo: ' . pg_last_error());
			
			echo '<TR>
					<TD><img src="/img/'.$registro["nombre"].'.png" width="200" height="200"></TD>
					<TD>'.$registro["nombre"].'</TD>
					<TD>'.$registro["descripcion"].'</TD>
					<TD>'.$registro["cantidad"].'</TD>
					<TD>'.$registro["precio"].'</TD>
				</TR>';

		}
		
	}

?>
				</TABLE>
				<BR>   
				<INPUT type="submit" value="Comprar"> 
			</FORM>
			<FORM method="post" action="mascotas1.php">
				<INPUT type="submit" name="op" value="Regresar">
			</FORM>
		</BODY>
	</CENTER>
</HTML> 

