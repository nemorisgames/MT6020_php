<?php
//NO SE PUEDE ENVIAR UN CORREO DE CONFIRMACION POR ESTA VIA
//SIN UN CORREO REAL DEL USUARIO ESTO NO TIENE SENTIDO
//SE CONTINUA MOSTRANDO UN MENSAJE DE QUE ES MUY NECESARIO INGRESAR UN CORREO REAL
//include 'funciones.php';

//ERRORES
//-1: USUARIO YA EXISTE
//-2: ERROR EN QUERY

$username_quitar=$_POST['username'];
$password_quitar=$_POST['password'];
$nombreReal=$_POST['nombre'];
$sexo=$_POST['sexo'];
$mail=$_POST['mail'];
$estado=$_POST['estado'];
$direccion=$_POST['direccion'];
$edad=$_POST['edad'];

include("funciones.php");
   $dbaddress='localhost'; $dbuser='root'; $dbpass=''; $dbname='mt6020';
   
$dbcnx = mysql_connect($dbaddress,$dbuser,$dbpass)
or die("Could not connect: " . mysql_error());
mysql_select_db($dbname, $dbcnx) or die ('Unable to select the database: ' . mysql_error());


$query = mysql_query("select id from user where user = \"" . $username_quitar . "\"")
or die("-2");


$result = mysql_fetch_array($query);
$respuesta=$result[0];

if($respuesta!=""){ 
	echo "ya creado"; 
	return; 
}
//a�adimos a la tabla user
else{
	$query = mysql_query("insert into user(user, pass, name, gender, email, address) values (\"" . $username_quitar . "\",\"" . md5($password_quitar). "\" ,\"" . $nombreReal . "\" ,\"" . $sexo . "\",\"".$mail."\",\"".$direccion."\")") or die("-3");
	
	//rescatamos el id de usuario
	$query = mysql_query("select id from user where user = \"" . $username_quitar . "\"")
	or die("-2");
	$result = mysql_fetch_array($query);
	$id_user=$result[0];
	
	echo $id_user;
	}


?>