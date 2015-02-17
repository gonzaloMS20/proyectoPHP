<HTML>
	<HEAD><TITLE>TIENDA</TITLE></HEAD>

	<CENTER> 
		<H1>VALIDAR</H1>
	</CENTER>
	<BR><BR>

	<CENTER>
	
	<?php 
		require_once("Usuario.php");

		$password = $_POST[pass];
		$user = $_POST[user];

		// Conectando y seleccionado la base de datos  
		$dbconn = pg_connect("host=localhost dbname=tienda user=admin password=hola123,")
		    or die('No se ha podido conectar: ' . pg_last_error());
		    
		echo "si se conecto";
		
		$U = new Usuario($user,$password);
		
		//echo "user".$usuario->getUserName();
		//echo "pass".$usuario->getPassword();
		
		// Realizando una consulta SQL
		$query = 'SELECT * FROM usuario WHERE username ="'.$U->getUserName().'" && password = "'.$U->getPassword().'"';
		
		$result = pg_query($query) or die('La consulta fallo: ' . pg_last_error());
		
		echo $result;

		if(strcmp("gonzalo",$user)==0){
	?>

		<h1>si</h1>

	<?php 
		}
		else{
			echo "el usuario no existe";
		}
	?>

	<BODY bgcolor="#ffffff" text="#000000" link="#0000ff" vlink="#800080" alink="#ff0000">

		<FORM action="validarUsuario.php" method="post">
		<P>
    			<LABEL for="nombre"><?=$password?> </LABEL>
              		<LABEL for="apellido"><?=$user?> </LABEL>
              
    			<INPUT type="submit" value="Enviar"> <INPUT type="reset">
    		</P>
 		</FORM>
	</BODY>
	</CENTER>
</HTML> 

