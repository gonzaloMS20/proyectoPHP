<?php 
	session_start();
	
	$usuario=$_SESSION['user'];
	$password=$_SESSION['pass'];
	$carrito=$_SESSION['carrito'];
	$mascota=$_SESSION['mascota'];
	
	echo '<P>hola'.$mascota.'</P>';
	
	$opcion=$_GET[opcion];
	print $opcion;
	
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<HTML>
	<HEAD>
		<TITLE>TIENDA</TITLE>
		<META http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	</HEAD>
	<CENTER>
		<H1>TIENDA DE MASCOTAS</H1>
		<H2>CARITO DE COMPRAS</H2>
	<BR><BR>

	<BODY bgcolor="#ffffff" text="#000000" link="#0000ff" vlink="#800080" alink="#ff0000">
	
		<H3>TUS MASCOTAS SON:</H3>
		
    		<?php 
	
		array_push($_SESSION['carrito'],$mascota);
		
		foreach($_SESSION['carrito'] as $mas){
			echo '<P>'.$mas.'</P>';
		}
		
		?>
		<td><input type="button" value="Modificar" onClick="location.href='mostrarCarrito.php? opcion=modificar'"></td>
		<td><input type="button" value="Vaciar" onClick="location.href='mostrarCarrito.php? opcion=vaciar'"></td>
		<td><input type="button" value="Pagar" onClick="location.href='mostrarCarrito.php? opcion=pagar'"></td>
 		
		<?php 
	
		switch($_GET[opcion]){
			case "modificar":
				
					print "modifical";
			break;
			
			case "vaciar":
				
					print "vaciar";
			break;
			
			case "pagar":
				
					print "pagar";
			break;
		
		}	
		
		?>
 		<FORM method="post" action="mascotas.php"><BR>
			<INPUT type="submit" name="op" value="Regresar">
		</FORM>
	</BODY>
	</CENTER>
</HTML> 

