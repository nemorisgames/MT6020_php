<?php
include("funciones.php");
   $dbaddress='localhost'; $dbuser='root'; $dbpass=''; $dbname='mt6020';
   
$dbcnx = mysql_connect($dbaddress,$dbuser,$dbpass)
or die("Could not connect: " . mysql_error());
mysql_select_db($dbname, $dbcnx) or die ('Unable to select the database: ' . mysql_error());
if($_POST["id"]=="todos"){
	$query = mysql_query("select a.user , a.id from user a")or die("Error en la query" . mysql_error());
	$salida="";
	while($resultQuery = mysql_fetch_array($query)){
	  $salida=$salida.$resultQuery['id']."|".$resultQuery['user']."*";
	};
}
else{
	//echo "select a.user , a.id from user a, supervisor_user b where b.fk_user=a.id and b.fk_supervisor  = \"" . $_POST["id"] . "\"";
	$query = mysql_query("select a.user , a.id from user a, supervisor_user b where b.fk_user=a.id and b.fk_supervisor  = \"" . $_POST["id"] . "\"")
	or die("Error en la query" . mysql_error());
	$salida="";
	while($resultQuery = mysql_fetch_array($query)){
	  $salida=$salida.$resultQuery['id']."|".$resultQuery['user']."*";
	};
}
echo $salida;
?>