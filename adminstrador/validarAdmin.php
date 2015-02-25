<HTML>
	<HEAD><TITLE>TIENDA</TITLE></HEAD>

	<CENTER> 
		<H1>VALIDAR</H1>
	</CENTER>
	<BR><BR>

	<CENTER>
	
	<?php 
		require_once("../Usuario.php");
		
		session_start();

		$user = $_POST[user];
		$password = $_POST[pass];

		// Conectando y seleccionado la base de datos  
		$dbconn = pg_connect("host=localhost dbname=tienda user=admin password=hola123,");
		
		if(!$dbconn){
			die('No se ha podido conectar: ' . pg_last_error());
		}
		else{
			//echo "si se conecto";
			$usuario = new Usuario($user,$password);
			
			$query = "SELECT id_admin,username,password FROM usuario WHERE username ='".$usuario->getUserName()."' and password = '".$usuario->getPassword()."'";
			// Realizando una consulta SQL
		
			$result = pg_query($query) or die('La consulta fallo: ' . pg_last_error());	

			if(!$result){
				echo "no exito";
			}
			else{
				//echo "exito";
				$registro = pg_fetch_array($result); 
				echo pg_num_rows($result);
				echo pg_num_fields($result);
				
				// Si es un usuario valido
				if($registro["id_admin"]=="t" && pg_num_rows($result)==1 && $registro["username"]==$usuario->getUserName() && $registro["password"]==$usuario->getPassword()){			
					header ('location: formulario.php');
				}elseif($registro["id_admin"]=="f" && pg_num_rows($result)==1 && $registro["username"]==$usuario->getUserName() && $registro["password"]==$usuario->getPassword()){			
					header ('location: /mascotas.php');
				}elseif($registro["id_admin"]=="t" && pg_num_rows($result)==1 && $registro["username"]==$usuario->getUserName() && $registro["password"]==""){
					header('location: index.php');
				}elseif($usuario->getUserName()=="" || $usuario->getPassword()==""){
					header ('location: index.php');
				}elseif($usuario->getUserName()!=="" && $usuario->getPassword()!==""){
					header ('location: index.php');
				}
				
			}
		}
	?>

	<BODY bgcolor="#ffffff" text="#000000" link="#0000ff" vlink="#800080" alink="#ff0000">

		<FORM action="validarAdmin.php" method="post">
		<P>
    			<LABEL for="nombre"><?=$password?> </LABEL>
              		<LABEL for="apellido"><?=$user?> </LABEL>
              
    			<INPUT type="submit" value="Enviar"> <INPUT type="reset">
    		</P>
 		</FORM>
	</BODY>
	</CENTER>
</HTML> 

