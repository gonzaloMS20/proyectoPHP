<HTML>
	<HEAD><TITLE>TIENDA</TITLE></HEAD>

	<CENTER> 
		<H1>REGISTAR</H1>
	</CENTER>
	<BR><BR>

	<CENTER>
	
	<?php 
		require_once("../Usuario.php");

		$idAdmin = "true";
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
			$usuario = new Usuario;
			$usuario->construct2($idAdmin,$nombre,$apPaterno,$apMaterno,$user,$password);
			
			$query = "INSERT INTO usuario (id_admin,nombre,ap_paterno,ap_materno,username,password) 
			VALUES ('".$usuario->getIdAdmin()."','".$usuario->getNombre()."','".$usuario->getApPaterno()."','".$usuario->getApMaterno()."','".$usuario->getUserName()."','".$usuario->getPassword()."')";
			
			// Realizando una consulta SQL
		
			print $query;		
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

