<HTML>
<HEAD>
<TITLE>TIENDA</TITLE>
</HEAD>

<CENTER> 
<H1>VALIDAR</H1>
</CENTER>
<BR><BR>
<CENTER>
<?php 

$mascota = $_POST[mascota];
$numero = $_POST[numero];

?>

<BODY bgcolor="#ffffff" text="#000000" link="#0000ff" vlink="#800080" alink="#ff0000">
<FORM action="validarUsuario.php" method="post">
    <P>
    <LABEL for="nombre"><?=$mascota?> </LABEL>
              
    <LABEL for="apellido"><?=$numero?> </LABEL>
              
    <INPUT type="submit" value="Enviar"> <INPUT type="reset">
    </P>
 </FORM>
</BODY>
</CENTER>
</HTML> 

