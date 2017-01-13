<?php
error_reporting(E_ALL ^ E_DEPRECATED);
$dbaddress='localhost'; $dbuser='root'; $dbpass=''; $dbname='mt6020';

$dbcnx = mysql_connect($dbaddress,$dbuser,$dbpass)or die("Could not connect: " . mysql_error());
mysql_select_db($dbname, $dbcnx) or die ('Unable to select the database: ' . mysql_error());

mysql_query("SET NAMES 'utf8'");

$query=mysql_query("SELECT * FROM Structure WHERE fk_informationPageDesign IN (SELECT id FROM InformationPageDesign WHERE fk_slider = ".$_POST['id'].") ORDER BY orderStructure") or die("-2");
$salida = "";

while($resultQuery = mysql_fetch_array($query)){
  $salida=$salida.$resultQuery['id']."|".$resultQuery['icon']."|".$resultQuery['fontColor']."|".$resultQuery['text']."*";
};

echo rtrim($salida,"*");

mysql_close($dbcnx);
?>
