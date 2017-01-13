<?php
$dbaddress='localhost'; $dbuser='root'; $dbpass=''; $dbname='mt6020';

$dbcnx = mysql_connect($dbaddress,$dbuser,$dbpass)
or die("Could not connect: " . mysql_error());
mysql_select_db($dbname, $dbcnx) or die ('Unable to select the database: ' . mysql_error());
mysql_query("SET NAMES 'utf8'");

$query = mysql_query("SELECT * FROM module");
echo $query;

$salida="";
while($resultQuery = mysql_fetch_array($query)){
	$salida=$salida.$resultQuery['fk_moduleType'].'*'.$resultQuery['name'].'|';
};

echo rtrim($salida,"|");

?>
