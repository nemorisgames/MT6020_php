<?php
error_reporting(E_ALL ^ E_DEPRECATED);
$dbaddress='localhost'; $dbuser='root'; $dbpass=''; $dbname='mt6020';

$dbcnx = mysql_connect($dbaddress,$dbuser,$dbpass)or die("Could not connect: " . mysql_error());
mysql_select_db($dbname, $dbcnx) or die ('Unable to select the database: ' . mysql_error());

mysql_query("SET NAMES 'utf8'");

$query=mysql_query("INSERT INTO InformationModuleDetail (fk_realizationModule, fk_questionID, fk_informationModuleAnswers) VALUES (1,".$_POST['preguntaID'].",".$_POST['respuestaUsuarioID'].")") or die("-2");
echo " ".$query;

mysql_close($dbcnx);
?>
