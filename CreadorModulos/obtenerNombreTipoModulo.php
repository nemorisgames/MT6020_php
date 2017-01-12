<?php
$dbaddress='localhost'; $dbuser='root'; $dbpass=''; $dbname='mt6020';
   
$dbcnx = mysql_connect($dbaddress,$dbuser,$dbpass)or die("Could not connect: " . mysql_error());
mysql_select_db($dbname, $dbcnx) or die ('Unable to select the database: ' . mysql_error());


$query=mysql_query("SELECT name FROM ModuleType WHERE id = ".$_POST['idTipoModulo']) or die("-2");
$salida = mysql_result($query, 0);

echo $salida;

mysql_close($dbcnx);

?>