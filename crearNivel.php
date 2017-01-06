<?php
$idAdmin=$_POST['admin'];
$nombre=$_POST['nombre'];
$numero=$_POST['numero'];
//tiempos
$tiempoVuelta=$_POST['tiempoVuelta'];
$tiempoFaena=$_POST['tiempoFaena'];
//$tiempoEmin=$_POST['tiempoEmin'];
//$tiempoEmax=$_POST['tiempoEmax'];
//datos
$tonelaje=$_POST['tonelaje'];
$fallaInducida = $_POST['fallaInducida'];
$caidaPer=$_POST['caidaPer'];
$reps=$_POST['reps'];

//$cargarMin=$_POST['cargarMin'];
//$cargarMax=$_POST['cargarMax'];


//choques
//$zipper=$_POST['zipper'];
$intpd=$_POST['intpd'];
$intpi=$_POST['intpi'];
$intmd=$_POST['intmd'];
$intp=$_POST['intp'];
$intb=$_POST['intb'];
$cabina=$_POST['cabina'];

$area=$_POST['area'];
$descArea=$_POST['descArea'];
$mercedes=$_POST['mercedes'];
$descCamion=$_POST['descCamion'];

$check1=$_POST['check1'];
$check2=$_POST['check2'];

$descChoque=$_POST['descChoque'];


//pruebas
$orden=$_POST['orden'];

$cantpreguntas=$_POST['cantpreguntas'];
$preguntas=$_POST['preguntas'];

include("funciones.php");
   $dbaddress='localhost'; $dbuser='root'; $dbpass=''; $dbname='mt6020';
   
$dbcnx = mysql_connect($dbaddress,$dbuser,$dbpass)or die("Could not connect: " . mysql_error());
mysql_select_db($dbname, $dbcnx) or die ('Unable to select the database: ' . mysql_error());

$query0=mysql_query("Select name from instancemodule where name=\"".$nombre."\"") or die("-2");
$result = mysql_fetch_array($query0);
$respuesta=$result[0];

if($respuesta!=""){ 
	echo "ya creado"; 
	return; 
}
else{
	//echo "INSERT INTO Nivel (NumeroNivel, TiempoVuelta, TiempoFaena, tiempoExtMin, tiempoExtMax, CantidadVueltas, ChoqueZipper, AreaExtraccion, CamionMercedes, IntPosterior, IntPosteriorDer, IntPosteriorIzq, IntMedioDer, IntCabina, IntBrazo, descuentoChoque, ExitoPreguntas, CantPreguntas, descuentoTunel, descuentoCamion, checklist1, checklist2, minimoCargar, maximoCargar, TonelajeALlevar, CaidaPermitida) values (\"". $numero . "\",\"".$tiempoVuelta."\",\"".$tiempoFaena."\",\"".$tiempoEmin."\",\"".$tiempoEmax."\",\"".$reps."\",\"".$zipper."\",\"".$area."\",\"".$mercedes."\",\"".$intp."\",\"".$intpd."\",\"".$intpi."\",\"".$intmd."\",\"".$cabina."\",\"".$intb."\",\"". $descChoque."\",\"". $preguntas."\",\"". $cantpreguntas."\",\"".$descArea."\",\"".$descCamion."\",\"".$check1."\",\"".$check2."\",\"".$cargarMin."\",\"".$cargarMax."\",\"".$tonelaje."\",\"".$caidaPer."\")";
	//$query = mysql_query("INSERT INTO Nivel (NumeroNivel, TiempoVuelta, TiempoFaena, tiempoExtMin, tiempoExtMax, CantidadVueltas, ChoqueZipper, AreaExtraccion, CamionMercedes, IntPosterior, IntPosteriorDer, IntPosteriorIzq, IntMedioDer, IntCabina, IntBrazo, descuentoChoque, ExitoPreguntas, CantPreguntas, descuentoTunel, descuentoCamion, checklist1, checklist2, minimoCargar, maximoCargar, TonelajeALlevar, CaidaPermitida) values (\"". $numero . "\",\"".$tiempoVuelta."\",\"".$tiempoFaena."\",\"".$tiempoEmin."\",\"".$tiempoEmax."\",\"".$reps."\",\"".$zipper."\",\"".$area."\",\"".$mercedes."\",\"".$intp."\",\"".$intpd."\",\"".$intpi."\",\"".$intmd."\",\"".$cabina."\",\"".$intb."\",\"". $descChoque."\",\"". $preguntas."\",\"". $cantpreguntas."\",\"".$descArea."\",\"".$descCamion."\",\"".$check1."\",\"".$check2."\",\"".$cargarMin."\",\"".$cargarMax."\",\"".$tonelaje."\",\"".$caidaPer."\")") or die("-3");
	$query = mysql_query("INSERT INTO instancemodule (fk_module, fk_supervisor, name, time, aprovalPercentageQuestions, questionsNumber, aprovalPercentageCheck1, aprovalPercentageCheck2) select id,".$idAdmin.",\"". $nombre . "\",\"".$tiempoFaena."\",\"".$preguntas."\",\"".$cantpreguntas."\",\"".$check1."\",\"".$check2."\" from module where name = \"".$numero."\"") or die("-3");
	
	$idNivel=mysql_insert_id();
	
	//$query2=mysql_query("insert into Administrador_Nivel(IdAdministrador,Nombre,IdNivel) values(\"" . $idAdmin . "\",\"".$nombre."\",\"".$idNivel."\")") or die("-4");

	$query2=mysql_query("insert into instancemodule_detail(fk_instancemodule,fk_detail,aproval) select \"" . $idNivel . "\", id ,\"".$tiempoVuelta."\" from detail where VariableName = \"tiempoPorVueltaMin\"") or die("-4");
	$query2=mysql_query("insert into instancemodule_detail(fk_instancemodule,fk_detail,aproval) select \"" . $idNivel . "\", id ,\"".$reps."\" from detail where VariableName = \"numeroVueltasMin\"") or die("-4");
	//$query2=mysql_query("insert into instancemodule_detail(fk_instancemodule,fk_detail,aproval) select \"" . $idNivel . "\", id ,\"".$tst."\" from detail where VariableName = \"tiempoPorVueltaPromedio\"") or die("-4");
	$query2=mysql_query("insert into instancemodule_detail(fk_instancemodule,fk_detail,aproval) select \"" . $idNivel . "\", id ,\"".$intp."\" from detail where VariableName = \"integridadFrontal\"") or die("-4");
	$query2=mysql_query("insert into instancemodule_detail(fk_instancemodule,fk_detail,aproval) select \"" . $idNivel . "\", id ,\"".$intpd."\" from detail where VariableName = \"integridadLateralMotorDerecho\"") or die("-4");
	$query2=mysql_query("insert into instancemodule_detail(fk_instancemodule,fk_detail,aproval) select \"" . $idNivel . "\", id ,\"".$intpi."\" from detail where VariableName = \"integridadLateralMotorIzquierdo\"") or die("-4");
	$query2=mysql_query("insert into instancemodule_detail(fk_instancemodule,fk_detail,aproval) select \"" . $idNivel . "\", id ,\"".$intmd."\" from detail where VariableName = \"integridadLateralTolvaDerecho\"") or die("-4");
	$query2=mysql_query("insert into instancemodule_detail(fk_instancemodule,fk_detail,aproval) select \"" . $idNivel . "\", id ,\"".$intb."\" from detail where VariableName = \"integridadLateralTolvaIzquierdo\"") or die("-4");
	$query2=mysql_query("insert into instancemodule_detail(fk_instancemodule,fk_detail,aproval) select \"" . $idNivel . "\", id ,\"".$cabina."\" from detail where VariableName = \"integridadTraseraTolva\"") or die("-4");
	//$query2=mysql_query("insert into instancemodule_detail(fk_instancemodule,fk_detail,aproval) select \"" . $idNivel . "\", id ,\"".$tst."\" from detail where VariableName = \"integridadSumatoria\"") or die("-4");
	$query2=mysql_query("insert into instancemodule_detail(fk_instancemodule,fk_detail,aproval) select \"" . $idNivel . "\", id ,\"".$descChoque."\" from detail where VariableName = \"integridadDescuentoColision\"") or die("-4");
	$query2=mysql_query("insert into instancemodule_detail(fk_instancemodule,fk_detail,aproval) select \"" . $idNivel . "\", id ,\"".$area."\" from detail where VariableName = \"tunelIntegridad\"") or die("-4");
	$query2=mysql_query("insert into instancemodule_detail(fk_instancemodule,fk_detail,aproval) select \"" . $idNivel . "\", id ,\"".$descArea."\" from detail where VariableName = \"tunelDescuentoColision\"") or die("-4");
	$query2=mysql_query("insert into instancemodule_detail(fk_instancemodule,fk_detail,aproval) select \"" . $idNivel . "\", id ,\"".0."\" from detail where VariableName = \"tunelValorFinal\"") or die("-4");
	$query2=mysql_query("insert into instancemodule_detail(fk_instancemodule,fk_detail,aproval) select \"" . $idNivel . "\", id ,\"".$tonelaje."\" from detail where VariableName = \"metaTonelaje\"") or die("-4");
	$query2=mysql_query("insert into instancemodule_detail(fk_instancemodule,fk_detail,aproval) select \"" . $idNivel . "\", id ,\"".$caidaPer."\" from detail where VariableName = \"porcentagePerdidaMinima\"") or die("-4");
	$query2=mysql_query("insert into instancemodule_detail(fk_instancemodule,fk_detail,aproval) select \"" . $idNivel . "\", id ,\"".$fallaInducida."\" from detail where VariableName = \"fallaOperacional\"") or die("-4");
	$query2=mysql_query("insert into instancemodule_detail(fk_instancemodule,fk_detail,aproval) select \"" . $idNivel . "\", id ,\"".$mercedes."\" from detail where VariableName = \"integridadBuzonCarga\"") or die("-4");
	$query2=mysql_query("insert into instancemodule_detail(fk_instancemodule,fk_detail,aproval) select \"" . $idNivel . "\", id ,\"".$descCamion."\" from detail where VariableName = \"integridadBuzonDescuento\"") or die("-4");

	echo "correcto";
}
?>