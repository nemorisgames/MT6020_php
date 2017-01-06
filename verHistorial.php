<?php

include("funciones.php");

   $dbaddress='localhost'; $dbuser='root'; $dbpass=''; $dbname='mt6020';

   

$dbcnx = mysql_connect($dbaddress,$dbuser,$dbpass)

or die("Could not connect: " . mysql_error());

mysql_select_db($dbname, $dbcnx) or die ('Unable to select the database: ' . mysql_error());

$query = mysql_query("select a.dateIni, a.id, m.name from realizationmodule a, user u, instancemodule i, module m where a.fk_instancemodule = i.id and i.fk_module = m.id and u.id = a.fk_user and u.id  = \"" . $_POST["id"] . "\"")

or die("Error en la query" . mysql_error());

$salida="";

while($resultQuery = mysql_fetch_array($query)){

  $salida=$salida.$resultQuery['dateIni']."|".$resultQuery['id']."|".$resultQuery['name']."*";

};

echo $salida;

?>