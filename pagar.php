<?php 
	session_start();
	
	$usuario=$_SESSION['user'];
	$password=$_SESSION['pass'];
	
	if ($usuario=="" || $password==""){
		header ('location: index.php');
	}
	
	$usuario=$_SESSION['user'];
	$password=$_SESSION['pass'];
	$carrito=$_SESSION['carrito'];
					
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

			<H2>SE REALIZO TU COMPRA:</H2>	

			<FORM action="mostrarCarrito.php" method="post">
		
<?php

	$conn_string = 'host=localhost dbname=tienda user=admin password=hola123,';
					$conexion = pg_connect($conn_string);
					
					if(!$conexion){
						echo "<CENTER>
						Error: no se pudo conectar a la bd';
						</CENTER>";
						exit;
					}else{
					
						$venta="insert into venta (total) values (".$_SESSION['total'].")";
						
						$result = pg_query($venta) or die('La consulta fallo: ' . pg_last_error());
						
						foreach($_SESSION['carrito'] as $mas => $value ){
					        
							$query = "SELECT precio,cantidad FROM producto where nombre = '".$mas."'";
		
							$result = pg_query($query) or die('La consulta fallo: ' . pg_last_error());

							if(!$result){
		
								echo "ocurrio un error.\n";
								exit;
							}else{
						
								while($row = pg_fetch_assoc($result)){
	
									echo '<P>'.$mas.'| cantidad => '.$value.' | costo  =>'.$row['precio'].'</P>';
									$total=$total+$value*$row['precio'];
									$_SESSION['total']=$_SESSION['total']+$value*$row['precio']; 
									//print "toal ".$total;
								}
							}
						}	
						print "<H4> TOTAL A PAGAR ".$_SESSION['total']."</H4>";
						 
						
					}
					session_destroy();

?>
				
				
				
				<INPUT type="submit" name="op" value="Selir">
			</FORM>
		</BODY>
	</CENTER>
</HTML> 

