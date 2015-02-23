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

$numero =$_POST[num];
$mascota = $_POST[mas];

?>

<?php
//conexion
$dbconn = pg_connect("host=localhost dbname=tienda user=admin password=hola123,") 
or die('No se ha podido conectar: '.pg_last_error());
//consulta
$query = 'SELECT * FROM producto';
$result = pg_query($query) or die ('La consulta fallo: '.pg_last_error());
//imprimiendo los resultados en HTML

//echo "<table>\n";
//while($line = pg_fetch_array($result,null,PGSQL_ASSOC)){
//	echo "\t<tr>\n";
//	foreach ($line as $col_value){
//	echo "\t\t<td>$col_value</td>\n"
//	}
//	echo "\t</tr>\n"; 
//	}
//	echo "</table>\n";
//liberando 
pg_free_result($result);	
//cerrando
pg_close($dbconn);
?>

<BODY bgcolor="#ffffff" text="#000000" link="#0000ff" vlink="#800080" alink="#ff0000">
<FORM action="validarUsuario.php" method="post">
    <P>
    <LABEL for="nombre"><?=$numero?> </LABEL>
              
    <LABEL for="apellido"><?=$mascota?> </LABEL>
              
    <INPUT type="submit" value="Enviar"> <INPUT type="reset">
    </P>
 </FORM>
</BODY>
</CENTER>
</HTML> 

