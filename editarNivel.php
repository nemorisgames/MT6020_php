<?php
include("funciones.php");
   $dbaddress='localhost'; $dbuser='root'; $dbpass=''; $dbname='mt6020';
   
$dbcnx = mysql_connect($dbaddress,$dbuser,$dbpass)or die("Could not connect: " . mysql_error());
mysql_select_db($dbname, $dbcnx) or die ('Unable to select the database: ' . mysql_error());
//$validar=mysql_query("Select IdAdministrador from Administrador Where IdAdministrador=\"".$idAdmin."\"") or die("-1");
//aqui ver si existe y devolver
//$query0=mysql_query("UPDATE `Nivel` SET `TiempoVuelta`=\"".$_POST["tiempoVuelta"]."\",`TiempoFaena`=\"".$_POST["tiempoFaena"]."\",`CantidadVueltas`=\"".$_POST["reps"]."\",`ChoqueZipper`=\"".$_POST["zipper"]."\",`AreaExtraccion`=\"".$_POST["area"]."\",`CamionMercedes`=\"".$_POST["mercedes"]."\",`IntPosterior`=\"".$_POST["intp"]."\",`IntPosteriorDer`=\"".$_POST["intpd"]."\",`IntPosteriorIzq`=\"".$_POST["intpi"]."\",`IntMedioDer`=\"".$_POST["intmd"]."\",`IntCabina`=\"".$_POST["cabina"]."\",`IntBrazo`=\"".$_POST["intb"]."\",`ExitoPreguntas`=\"".$_POST["preguntas"]."\",`CantPreguntas`=\"".$_POST["cantpreguntas"]."\",`minimoCargar`=\"".$_POST["cargarMin"]."\",`maximoCargar`=\"".$_POST["cargarMax"]."\",`TonelajeALlevar`=\"".$_POST["tonelaje"]."\",`CaidaPermitida`=\"".$_POST["caidaPer"]."\",`descuentoChoque`=\"".$_POST["descChoque"]."\",`checklist1`=\"".$_POST["check1"]."\",`checklist2`=\"".$_POST["check2"]."\",`descuentoTunel`=\"".$_POST["descArea"]."\",`descuentoCamion`=\"".$_POST["descCamion"]."\" WHERE IdNivel=\"".$_POST["idniv"]."\"") or die("-2");

//echo "UPDATE instancemodule SET time = \"".$_POST["tiempoFaena"]."\", aprovalPercentageQuestions = \"".$_POST["preguntas"]."\", questionsNumber=\"".$_POST["cantpreguntas"]."\", aprovalPercentageCheck1=\"".$_POST["check1"]."\", aprovalPercentageCheck2=\"".$_POST["check2"]."\" where id = \"".$_POST["idniv"]."\"";
$query = mysql_query("UPDATE instancemodule SET time = \"".$_POST["tiempoFaena"]."\", aprovalPercentageQuestions = \"".$_POST["preguntas"]."\", questionsNumber=\"".$_POST["cantpreguntas"]."\", aprovalPercentageCheck1=\"".$_POST["check1"]."\", aprovalPercentageCheck2=\"".$_POST["check2"]."\" where id = \"".$_POST["idniv"]."\"") or die("-3");

$query2=mysql_query("UPDATE instancemodule_detail i_d, detail d SET i_d.aproval = \"" . $_POST["tiempoVuelta"] . "\" WHERE i_d.fk_instancemodule = \"".$_POST["idniv"]."\" and d.id = i_d.fk_detail and d.VariableName = \"tiempoPorVueltaMin\"") or die("-40");
$query2=mysql_query("UPDATE instancemodule_detail i_d, detail d SET i_d.aproval = \"" . $_POST["reps"] . "\" WHERE i_d.fk_instancemodule = \"".$_POST["idniv"]."\" and d.id = i_d.fk_detail and d.VariableName = \"numeroVueltasMin\"") or die("-41");
$query2=mysql_query("UPDATE instancemodule_detail i_d, detail d SET i_d.aproval = \"" . $_POST["intp"] . "\" WHERE i_d.fk_instancemodule = \"".$_POST["idniv"]."\" and d.id = i_d.fk_detail and d.VariableName = \"integridadFrontal\"") or die("-42");
$query2=mysql_query("UPDATE instancemodule_detail i_d, detail d SET i_d.aproval = \"" . $_POST["intpd"] . "\" WHERE i_d.fk_instancemodule = \"".$_POST["idniv"]."\" and d.id = i_d.fk_detail and d.VariableName = \"integridadLateralMotorDerecho\"") or die("-43");
$query2=mysql_query("UPDATE instancemodule_detail i_d, detail d SET i_d.aproval = \"" . $_POST["intpi"] . "\" WHERE i_d.fk_instancemodule = \"".$_POST["idniv"]."\" and d.id = i_d.fk_detail and d.VariableName = \"integridadLateralMotorIzquierdo\"") or die("-44");
$query2=mysql_query("UPDATE instancemodule_detail i_d, detail d SET i_d.aproval = \"" . $_POST["intmd"] . "\" WHERE i_d.fk_instancemodule = \"".$_POST["idniv"]."\" and d.id = i_d.fk_detail and d.VariableName = \"integridadLateralTolvaDerecho\"") or die("-45");
$query2=mysql_query("UPDATE instancemodule_detail i_d, detail d SET i_d.aproval = \"" . $_POST["intb"] . "\" WHERE i_d.fk_instancemodule = \"".$_POST["idniv"]."\" and d.id = i_d.fk_detail and d.VariableName = \"integridadLateralTolvaIzquierdo\"") or die("-46");
$query2=mysql_query("UPDATE instancemodule_detail i_d, detail d SET i_d.aproval = \"" . $_POST["cabina"] . "\" WHERE i_d.fk_instancemodule = \"".$_POST["idniv"]."\" and d.id = i_d.fk_detail and d.VariableName = \"integridadTraseraTolva\"") or die("-47");
$query2=mysql_query("UPDATE instancemodule_detail i_d, detail d SET i_d.aproval = \"" . $_POST["descChoque"] . "\" WHERE i_d.fk_instancemodule = \"".$_POST["idniv"]."\" and d.id = i_d.fk_detail and d.VariableName = \"integridadDescuentoColision\"") or die("-48");
$query2=mysql_query("UPDATE instancemodule_detail i_d, detail d SET i_d.aproval = \"" . $_POST["area"] . "\" WHERE i_d.fk_instancemodule = \"".$_POST["idniv"]."\" and d.id = i_d.fk_detail and d.VariableName = \"tunelIntegridad\"") or die("-49");
$query2=mysql_query("UPDATE instancemodule_detail i_d, detail d SET i_d.aproval = \"" . $_POST["descArea"] . "\" WHERE i_d.fk_instancemodule = \"".$_POST["idniv"]."\" and d.id = i_d.fk_detail and d.VariableName = \"tunelDescuentoColision\"") or die("-50");
$query2=mysql_query("UPDATE instancemodule_detail i_d, detail d SET i_d.aproval = \"" . $_POST["tonelaje"] . "\" WHERE i_d.fk_instancemodule = \"".$_POST["idniv"]."\" and d.id = i_d.fk_detail and d.VariableName = \"metaTonelaje\"") or die("-51");
$query2=mysql_query("UPDATE instancemodule_detail i_d, detail d SET i_d.aproval = \"" . $_POST["caidaPer"] . "\" WHERE i_d.fk_instancemodule = \"".$_POST["idniv"]."\" and d.id = i_d.fk_detail and d.VariableName = \"porcentagePerdidaMinima\"") or die("-52");
$query2=mysql_query("UPDATE instancemodule_detail i_d, detail d SET i_d.aproval = \"" . $_POST["fallaInducida"] . "\" WHERE i_d.fk_instancemodule = \"".$_POST["idniv"]."\" and d.id = i_d.fk_detail and d.VariableName = \"fallaOperacional\"") or die("-53");
$query2=mysql_query("UPDATE instancemodule_detail i_d, detail d SET i_d.aproval = \"" . $_POST["mercedes"] . "\" WHERE i_d.fk_instancemodule = \"".$_POST["idniv"]."\" and d.id = i_d.fk_detail and d.VariableName = \"integridadBuzonCarga\"") or die("-54");
$query2=mysql_query("UPDATE instancemodule_detail i_d, detail d SET i_d.aproval = \"" . $_POST["descCamion"] . "\" WHERE i_d.fk_instancemodule = \"".$_POST["idniv"]."\" and d.id = i_d.fk_detail and d.VariableName = \"integridadBuzonDescuento\"") or die("-55");


echo "correcto";
?>