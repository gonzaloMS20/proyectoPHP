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

$password =$_POST[num];
$user = $_POST[user];

if(strcmp("leti",$user)==0){
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

