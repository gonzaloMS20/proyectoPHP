<HTML>
	<HEAD><TITLE>TIENDA</TITLE></HEAD>

	<CENTER> 
		<H1>VALIDAR</H1>
	</CENTER>
	<BR><BR>

	<CENTER>
	
	<?php 
		require_once("Usuario.php");

		$nombre = $_POST[nombre];
		$apPaterno = $_POST[apPat];
		$apMaterno = $_POST[apMat];
		$user = $_POST[user];
		$password = $_POST[pass];

		// Conectando y seleccionado la base de datos  
		$dbconn = pg_connect("host=localhost dbname=tienda user=admin password=hola123,");
		
		if(!$dbconn){
			die('No se ha podido conectar: ' . pg_last_error());
		}
		else{
			//echo "si se conecto";
			//$usuario = new Usuario($nombre,$apPaterno,$apMaterno,$userName,$password);
			$usuario = new Usuario;
			$usuario->construct2($nombre,$apPaterno,$apMaterno,$user,$password);
			//print "get nom >>>>>>>"$usuario->getNombre();
			$query = "INSERT INTO usuario (nombre,ap_paterno,ap_materno,username,password) 
			VALUES ('".$usuario->getNombre()."','".$usuario->getApPaterno()."','".$usuario->getApMaterno()."','".$usuario->getUserName()."','".$usuario->getPassword()."')";
			
			// Realizando una consulta SQL
		
			$result = pg_query($query) or die('La consulta fallo: ' . pg_last_error());	

			if(!$result){
				echo "no exito";
			}
			else{
	
				echo "exito";
				 
				
				
			
			}
		}
	?>

	<BODY bgcolor="#ffffff" text="#000000" link="#0000ff" vlink="#800080" alink="#ff0000">
	REGISTRADO

	</BODY>
	</CENTER>
</HTML> 

