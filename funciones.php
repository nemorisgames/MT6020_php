<?php
error_reporting(0);
function conectar(){
	$link = mysql_connect('localhost', 'root', '');
	if (!$link) {
		die('Not connected : ' . mysql_error());
	}
	$db_selected = mysql_select_db('mt6020', $link);
	if (!$db_selected) {
		die ('Can\'t use DB : ' . mysql_error());
	}
	mysql_set_charset('utf8');
	//return $db_selected;
}
conectar();

function ejecutarQuery($query){
	$result = mysql_query($query);
	if (!$result) {
		$message  = 'Invalid query: ' . mysql_error() . "\n";
		$message .= 'Whole query: ' . $query;
		die($message);
	}
	return $result;
}
if($_GET['operacion'] != ""){
switch($_GET['operacion']){
	case 0: buscarImagen($_POST['username']); break;
	case 1: cambiarInteres($_POST['username'], $_POST['edad'], $_POST['interes'], $_POST['imagen']); break;
	case 2: traerInformacion($_POST['username']); break;
	//case 1: actualizarPrecio($_POST['idFarmacia'], $_POST['idProducto'], $_POST['precio']); break;
}
}

function traerInformacion($username){
	$query=ejecutarQuery("select nombre, edad, sexo, interes from usuario where username = \"".$username."\"");
	$result = mysql_fetch_array($query);
	if($result[0] == "") echo -1;
	echo $result[0]."|".$result[1]."|".$result[2]."|".$result[3];
}

function cambiarInteres($username, $edad, $interes, $imagen){
	$result=ejecutarQuery("update usuario set interes=".$interes.", foto = '".$imagen."', edad = ".$edad." where username='".$username."'");
}

function buscarImagen($username){
	$query=ejecutarQuery("select foto from usuario where username = \"".$username."\"");
	$result = mysql_fetch_array($query);
	if($result[0] == "") echo -1;
	echo $result[0];
}


?>