<?php
include("funciones.php");
   $dbaddress='localhost'; $dbuser='root'; $dbpass=''; $dbname='mt6020';
   
$dbcnx = mysql_connect($dbaddress,$dbuser,$dbpass)
or die("Could not connect: " . mysql_error());
mysql_select_db($dbname, $dbcnx) or die ('Unable to select the database: ' . mysql_error());
$idalumno=$_POST["idAlumno"];
$idadmin=$_POST["idAdmin"];

$query = mysql_query("INSERT INTO supervisor_user(fk_user, fk_supervisor) values( \"" .$idalumno. "\", \"" .$idadmin. "\")")or die("Error en la query" . mysql_error());


echo "correcto";
?>