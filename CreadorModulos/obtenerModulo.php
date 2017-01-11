<?php
include("funciones.php");
   $dbaddress='localhost'; $dbuser='root'; $dbpass=''; $dbname='mt6020';
   
$dbcnx = mysql_connect($dbaddress,$dbuser,$dbpass)or die("Could not connect: " . mysql_error());
mysql_select_db($dbname, $dbcnx) or die ('Unable to select the database: ' . mysql_error());


$query=mysql_query("SELECT * FROM Module WHERE id = ".$_POST['id']) or die("-2");
$salida = "";

while($resultQuery = mysql_fetch_array($query)){

  $salida=$salida.$resultQuery['name']."|".$resultQuery['fk_moduleType']."|".$resultQuery['name']."*";

};

echo $salida;

mysql_close($dbcnx);
?>