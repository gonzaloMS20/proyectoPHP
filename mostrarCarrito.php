<?php 
	session_start();
	
	$usuario=$_SESSION['user'];
	$password=$_SESSION['pass'];
	
	if ($usuario=="" || $password==""){
		header ('location: index.php');
	}
	
	$_SESSION['cantidad']= $_POST[cantidad];
	$_SESSION['total']=0;
	
	if((!is_numeric($_POST[cantidad]) || $_POST[cantidad]="") && $_GET[opcion]=="" && $_GET[borrar]=="" ){
		header ('location: comprarMascota.php');
	}
	
	$usuario=$_SESSION['user'];
	$password=$_SESSION['pass'];
	$carrito=$_SESSION['carrito'];
	$mascota=$_SESSION['mascota'];
	
	
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
	</CENTER>
	
	<BODY bgcolor="#ffffff" text="#000000" link="#0000ff" vlink="#800080" alink="#ff0000">
	<CENTER>
		<H3>TUS MASCOTAS SON:</H3>
		
    		<?php 	
			
		$opcion=$_GET[opcion];
			
		if($_GET[opcion]=="" && $_GET[borrar]==""){
			$_SESSION['carrito'][$mascota]= $_SESSION['cantidad'];
		}
		
		
		while($i = current($_SESSION['carrito'])){
			echo '<P>'.key($_SESSION['carrito']).'</P>';	
			next($_SESSION['carrito']);
		}
		?>
		<td><input type="button" value="Modificar" onClick="location.href='mostrarCarrito.php? opcion=modificar'"></td>
		<td><input type="button" value="Vaciar" onClick="location.href='mostrarCarrito.php? opcion=vaciar'"></td>
		<td><input type="button" value="Pagar" onClick="location.href='mostrarCarrito.php? opcion=pagar'"></td>
 		</CENTER>
 		<CENTER>
		<?php 
	
		switch($_GET[opcion]){
			case "modificar":
				
					print '
					<form method="get">';
					
						foreach($_SESSION['carrito'] as $mas => $value ){
							//echo '<P>'.$mas.'</P>';
							echo  '<input type="checkbox" name="borrar[]" value="'.$mas.'"/> '.$mas.'<br/>';
							//echo '<P>'.$value.'</P>';
					        }
					 print '<input type="submit" value="Borrar" />
					</form>';
					
		
					
			break;
			
			case "vaciar":
				
					print "vaciar";
					foreach($_SESSION['carrito'] as $i => $value ){
						unset($_SESSION['carrito'][$i]);
					}
			break;
			
			case "pagar":
				
					print '
					<FORM action="pagar.php" method="post">';
					
					$conn_string = 'host=localhost dbname=tienda user=admin password=hola123,';
					$conexion = pg_connect($conn_string);
					
					if(!$conexion){
						echo "<CENTER>
						Error: no se pudo conectar a la bd';
						</CENTER>";
						exit;
					}else{

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
						 
						//print '<td><input type="button" value="Pagar" onClick="location.href='."'mostrarCarrito.php? opcion=pagado'".'"></td>';			
						print '<INPUT type="submit" value="Comprar">';
						print '
							</form>';
					}
					
			break;
		
		}	
		
		
			$seleccionados = $_GET[borrar];
			for($i=0; $i < count($seleccionados); $i++){
			    		
			    		unset($_SESSION['carrito'][$seleccionados[$i]]);
			
			}
			
		
		?>
		</CENTER>
		<CENTER>
 		<FORM method="post" action="mascotas.php"><BR>
			<INPUT type="submit" name="op" value="Regresar">
		</FORM>
		</CENTER>
	</BODY>
</HTML> 

