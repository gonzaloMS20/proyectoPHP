<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">

<HTML>
	<HEAD>
		<TITLE>TIENDA</TITLE>
		<META http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	</HEAD>
	<CENTER> 
		<H1>BIENVANIDO A LA TIENDA DE MASCOTAS</H1>
	</CENTER>
	<BR><BR>

	<CENTER>

	<BODY bgcolor="#ffffff" text="#000000" link="#0000ff" vlink="#800080" alink="#ff0000">
	
		<FORM action="acciones.php" method="post">
    		<P>
    			<LABEL for="cantidad">cantidad: </LABEL>
              			<INPUT type="text" name="cant" id="cant_"><BR>
              	<LABEL for="precio">precio:  </LABEL>
              			<INPUT type="text" name="prec" id="prec_"><BR>
              	<LABEL for="nombre">nombre:  </LABEL>
              			<INPUT type="text" name="nomb" id="nomb_"><BR>
              	
    			<INPUT type="submit" value="Enviar"> <INPUT type="reset">
    		</P>
 		</FORM>
 		<?php
	echo '<a href="'.$_SERVER['HTTP_REFERER'].'">Regresar</a>';
	?>
	</BODY>
	</CENTER>
</HTML> 
