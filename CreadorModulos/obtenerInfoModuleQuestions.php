<?php
error_reporting(E_ALL ^ E_DEPRECATED);
$dbaddress='localhost'; $dbuser='root'; $dbpass=''; $dbname='mt6020';

$dbcnx = mysql_connect($dbaddress,$dbuser,$dbpass)or die("Could not connect: " . mysql_error());
mysql_select_db($dbname, $dbcnx) or die ('Unable to select the database: ' . mysql_error());

mysql_query("SET NAMES 'utf8'");

$query=mysql_query("SELECT * FROM InformationModuleQuestion WHERE fk_module = ".$_POST['idModule']) or die("-2");
$salida = "";

while($resultQuery = mysql_fetch_array($query)){
  $salida=$salida.$resultQuery['id']."|".$resultQuery['question']."*";
};

echo rtrim($salida,"*");

mysql_close($dbcnx);
?>
