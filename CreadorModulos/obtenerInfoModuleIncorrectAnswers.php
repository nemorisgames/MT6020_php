<?php
error_reporting(E_ALL ^ E_DEPRECATED);
$dbaddress='localhost'; $dbuser='root'; $dbpass=''; $dbname='mt6020';

$dbcnx = mysql_connect($dbaddress,$dbuser,$dbpass)or die("Could not connect: " . mysql_error());
mysql_select_db($dbname, $dbcnx) or die ('Unable to select the database: ' . mysql_error());

mysql_query("SET NAMES 'utf8'");

$query=mysql_query("SELECT * FROM InformationModuleAnswers WHERE fk_informationModuleQuestions = ".$_POST['preguntaID']." AND Correct = 'False' ORDER BY RAND() LIMIT 3") or die("-2");
$salida = "";

while($resultQuery = mysql_fetch_array($query)){
  $salida=$salida.$resultQuery['id']."|".$resultQuery['text']."*";
};

echo $salida;

mysql_close($dbcnx);
?>
