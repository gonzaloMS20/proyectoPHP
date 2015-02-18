<HTML>
	<HEAD><TITLE>TIENDA</TITLE></HEAD>

	<CENTER> 
		<H1>TIENDA DE MASCOTAS</H1>
		<H2>REGISTRO DE USUARIO</H2>
	</CENTER>
	<BR><BR>

	<CENTER>

	<BODY bgcolor="#ffffff" text="#000000" link="#0000ff" vlink="#800080" alink="#ff0000">
	
		<H3>Ingresa tus tados para registarte en nuestra tienda</H3>
		<FORM action="registrarUsuario.php" method="post">
    		<P>
    			<LABEL for="nombre">NOMBRE(S): </LABEL>
              			<INPUT type="text" name="nombre" id="nombre"><BR>
    			<LABEL for="apPaterno">APELLIDO PATERNO: </LABEL>
              			<INPUT type="text" name="apPat" id="apPat"><BR>
    			<LABEL for="apMaterno">APELLIDO MATERNO: </LABEL>
    				<INPUT type="text" name="apMat" id="apMat"><BR>
    			<LABEL for="userName">NOMBRE DE USUARIO: </LABEL>
    				<INPUT type="text" name="user" id="user"><BR>
    			<LABEL for="password">PASSWORD: </LABEL>
              			<INPUT type="password" name="pass" id="pass"><BR><BR>
 
    			<INPUT type="submit" value="Guardar"> <INPUT type="reset">
    		</P>
 		</FORM>

 		<FORM method="post" action="index.php"><BR>
			<INPUT type="submit" name="op" value="Regresar">
		</FORM>
	</BODY>
	</CENTER>
</HTML> 

