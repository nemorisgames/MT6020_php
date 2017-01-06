<?php
include("funciones.php");
   $dbaddress='localhost'; $dbuser='root'; $dbpass=''; $dbname='mt6020';
   
$dbcnx = mysql_connect($dbaddress,$dbuser,$dbpass)
or die("Could not connect: " . mysql_error());
mysql_select_db($dbname, $dbcnx) or die ('Unable to select the database: ' . mysql_error());

$query0 = mysql_query("SELECT count(*) as repeticiones FROM realizationmodule where fk_instancemodule = (select fk_instancemodule from realizationmodule where id = \"" . $_POST["id"] . "\")")
or die("Error en la query" . mysql_error());
$repeticiones = 0;
while($resultQuery = mysql_fetch_array($query0)){
$repeticiones = $resultQuery['repeticiones'];
}
$query0 = mysql_query("SELECT u.id, u.user, r.dateIni
FROM user u, realizationmodule r
WHERE u.id = r.fk_user
AND r.id = \"" . $_POST["id"] . "\"" )
or die("Error en la query" . mysql_error());

$salida="";
while($resultQuery = mysql_fetch_array($query0)){
	//agregar los campos del historial
  $salida=$resultQuery['id'].'*'.$repeticiones.'*'.$resultQuery['dateIni'].'|';
};

$query = mysql_query("select i.id as idInstance, r.percentageQuestions, r.time, r.percentageCheck1, r.percentageCheck2, r.dateIni from realizationmodule r, instancemodule i, module m where r.fk_instancemodule = i.id and i.fk_module = m.id and r.id = \"" . $_POST["id"] . "\"")
or die("Error en la query" . mysql_error());
while($resultQuery = mysql_fetch_array($query)){
	//agregar los campos del historial
	//$salida .= $resultQuery['IdNivel'].'*'.$resultQuery['PorPreguntas'].'*'.$resultQuery['TiempoEmpleado'].'*'.$resultQuery['Check1'].'*'.$resultQuery['revFunc1'].'*'.$resultQuery['revCab1'].'*'.$resultQuery['revEst1'].'*'.$resultQuery['prevRies1'].'*'.$resultQuery['Check2'].'*'.$resultQuery['revFunc2'].'*'.$resultQuery['revCab2'].'*'.$resultQuery['revEst2'].'*'.$resultQuery['prevRies2'].'*'.$resultQuery['OrdenEj'].'*'.$resultQuery['MotorPunta'].'*'.$resultQuery['BaldePunta'].'*'.$resultQuery['VueltasCorrectas'].'*'.$resultQuery['EntregaNombrada'].'*'.$resultQuery['TonelajeTotal'].'*'.$resultQuery['CaidaMat'].'*'.$resultQuery['CorrectoCarguio'].'*'.$resultQuery['Patinaje'].'*'.$resultQuery['IntMaquina'].'*'.$resultQuery['IntPost'].'*'.$resultQuery['IntPostIzq'].'*'.$resultQuery['IntPostDer'].'*'.$resultQuery['IntMedioDer'].'*'.$resultQuery['IntCabina'].'*'.$resultQuery['IntBalde'].'*'.$resultQuery['Zipper'].'*'.$resultQuery['CantZipper'].'*'.$resultQuery['Tunel'].'*'.$resultQuery['CantTunel'].'*'.$resultQuery['Camion'].'*'.$resultQuery['CantCamion'].'*'.$resultQuery['Traslado'].'*'.$resultQuery['CantVueltas'].'*'.$resultQuery['EntregaNombradaSup'].'*'.$resultQuery['TerminoFaena'].'*'.$resultQuery['Fecha'].'*'.$resultQuery['NumPreguntasContestadas'].'*'.$resultQuery['OrdenEjecucionTiempo'].'*'.$resultQuery['PuntoPartidaTiempo'].'*'.$resultQuery['FallaOperacional'].'*'.$resultQuery['TonelajeMinimoCarga'].'*'.$resultQuery['TonelajeMaximoCarga'].'*'.$resultQuery['CamionetaMinimo'].'*'.$resultQuery['CamionetaDescuento'].'*'.$resultQuery['CamionetaIntegridad'].'*'.$resultQuery['CamionMinimo'].'*'.$resultQuery['CamionDescuento'].'*'.$resultQuery['CamionIntegridad'].'*'.$resultQuery['PreguntasFaena1'].'*'.$resultQuery['PreguntasFaena2'].'*'.$resultQuery['PreguntasFaena3'].'*'.$resultQuery['PreguntasFaena4'];
	$nVueltas = 0;
	$tonelaje = 0;
	$perdida = 0;
	$tonelajeCorrecto = 0;
	$queryVueltas = mysql_query("select * from loadCicle l, realizationmodule r, operationalmoduledetail o where o.fk_realizationmodule = r.id and l.fk_operationalModuleDetail = o.id and r.id = \"" . $_POST["id"] . "\"") or die("Error en la query vueltas" . mysql_error());
	while($resultQueryVueltas = mysql_fetch_array($queryVueltas)){
		$nVueltas++;
		$tonelaje += $resultQueryVueltas['load'];
		$perdida += $resultQueryVueltas['fall'];
		$tonelajeCorrecto += $resultQueryVueltas['unload'];
	}
	$tiempoPorVueltaMin = 0;
	$numeroVueltasMin = 0;
	$tiempoVueltaPromedio = 0;
	$integridadFrontal = 0;
	$integridadLateralMotorDerecho = 0;
	$integridadLateralMotorIzquierdo = 0;
	$integridadLateralTolvaDerecho = 0;
	$integridadLateralTolvaIzquierdo = 0;
	$integridadTraseraTolva = 0;
	$integridadSumatoria = 0;
	$integridadDescuentoColision = 0;
	$tunelntegridad = 0;
	$tunelValorFinal = 0;
	$metaTonelaje = 0;
	$porcentagePerdidaMinima = 0;
	$fallaOperacional = 0;
	$integridadBuzonCarga = 0;
	$integridadBuzonDescuento = 0;
	$queryOperacional = mysql_query("SELECT * FROM realizationmodule r, operationalmoduledetail o LEFT JOIN loadCicle l ON l.fk_operationalModuleDetail = o.id WHERE o.fk_realizationmodule = r.id AND r.id = \"" . $_POST["id"] . "\"") or die("Error en la query operacional" . mysql_error());
	while($resultQueryOperacional = mysql_fetch_array($queryOperacional)){
		if($resultQueryOperacional['d.VariableName'] == "tiempoPorVueltaMin") $tiempoPorVueltaMin = $resultQueryOperacional['value'];
		if($resultQueryOperacional['d.VariableName'] == "numeroVueltasMin") $numeroVueltasMin = $resultQueryOperacional['value'];
		if($resultQueryOperacional['d.VariableName'] == "tiempoVueltaPromedio") $tiempoVueltaPromedio = $resultQueryOperacional['value'];
		if($resultQueryOperacional['d.VariableName'] == "integridadFrontal") $integridadFrontal = $resultQueryOperacional['value'];
		if($resultQueryOperacional['d.VariableName'] == "integridadLateralMotorDerecho") $integridadLateralMotorDerecho = $resultQueryOperacional['value'];
		if($resultQueryOperacional['d.VariableName'] == "integridadLateralMotorIzquierdo") $integridadLateralMotorIzquierdo = $resultQueryOperacional['value'];
		if($resultQueryOperacional['d.VariableName'] == "integridadLateralTolvaDerecho") $tiempoPorVueltaMin = $integridadLateralTolvaDerecho['value'];
		if($resultQueryOperacional['d.VariableName'] == "integridadLateralTolvaIzquierdo") $integridadLateralTolvaIzquierdo = $resultQueryOperacional['value'];
		if($resultQueryOperacional['d.VariableName'] == "integridadTraseraTolva") $integridadTraseraTolva = $resultQueryOperacional['value'];
		if($resultQueryOperacional['d.VariableName'] == "integridadSumatoria") $integridadSumatoria = $resultQueryOperacional['value'];
		if($resultQueryOperacional['d.VariableName'] == "integridadDescuentoColision") $integridadDescuentoColision = $resultQueryOperacional['value'];
		if($resultQueryOperacional['d.VariableName'] == "tunelntegridad") $tunelntegridad = $resultQueryOperacional['value'];
		//if($resultQueryOperacional['d.VariableName'] == "integridadSumatoria") $integridadSumatoria = $resultQueryOperacional['value'];
		if($resultQueryOperacional['d.VariableName'] == "tunelValorFinal") $tunelValorFinal = $resultQueryOperacional['value'];
		if($resultQueryOperacional['d.VariableName'] == "metaTonelaje") $metaTonelaje = $resultQueryOperacional['value'];
		if($resultQueryOperacional['d.VariableName'] == "porcentagePerdidaMinima") $porcentagePerdidaMinima = $resultQueryOperacional['value'];
		if($resultQueryOperacional['d.VariableName'] == "fallaOperacional") $fallaOperacional = $resultQueryOperacional['value'];
		if($resultQueryOperacional['d.VariableName'] == "integridadBuzonCarga") $integridadBuzonCarga = $resultQueryOperacional['value'];
		if($resultQueryOperacional['d.VariableName'] == "integridadBuzonDescuento") $integridadBuzonDescuento = $resultQueryOperacional['value'];

	}
	$salida .= $resultQuery['idInstance'].'*'.$resultQuery['percentageQuestions'].'*'.$resultQuery['time'].'*'.$resultQuery['percentageCheck1'].'*0*0*0*0*'.$resultQuery['percentageCheck2'].'*0*0*0*0*0*0*0*'.$nVueltas.'*0*'.$tonelaje.'*'.$perdida.'*'.$tonelajeCorrecto.'*0*0*'.$integridadFrontal.'*'.$integridadLateralMotorDerecho.'*'.$integridadLateralMotorIzquierdo.'*'.$integridadLateralTolvaDerecho.'*'.$integridadLateralTolvaIzquierdo.'*'.$integridadTraseraTolva.'*0*0*'.
	$tunelValorFinal.'*0*'.$integridadBuzonCarga.'*0*'.$metaTonelaje.'*'.$numeroVueltasMin.'*0*0*'.$resultQuery['dateIni'].'*0*0*0*'.$fallaOperacional.'*0*0*0*0*0*0*'.
	$integridadBuzonDescuento.'*'.$integridadBuzonCarga.'*0*0*0*0';
};

$salida .= "|";
//datos de checklist
/*
$query2 = mysql_query("select * from checklist where fk_historial = \"" . $_POST["id"] . "\"")
or die("Error en la query" . mysql_error());
while($resultQuery = mysql_fetch_array($query2)){
	//agregar los campos del historial
  $salida .= $resultQuery['CheckRFNivPet'].'*'.$resultQuery['ResultadoCheckRFNivPet'].'*'.$resultQuery['CheckRFNivAceMot'].'*'.$resultQuery['ResultadoCheckRFNivAceMot'].'*'.$resultQuery['CheckRFNivAceHid'].'*'.$resultQuery['ResultadoCheckRFNivAceHid'].'*'.$resultQuery['CheckRFEstLuc'].'*'.$resultQuery['ResultadoCheckRFEstLuc'].'*'.$resultQuery['CheckRFEstNeu'].'*'.$resultQuery['ResultadoCheckRFEstNeu'].'*'.$resultQuery['CheckRFNivRef'].'*'.$resultQuery['ResultadoCheckRFNivRef'].'*'.$resultQuery['CheckRFNivAceTra'].'*'.$resultQuery['ResultadoCheckRFNivAceTra'].'*'.$resultQuery['CheckREBal'].'*'.$resultQuery['ResultadoCheckREBal'].'*'.$resultQuery['CheckREAn'].'*'.$resultQuery['ResultadoCheckREAnt'].'*'.$resultQuery['CheckREArtCen'].'*'.$resultQuery['ResultadoCheckREArtCen'].'*'.$resultQuery['CheckREPasGen'].'*'.$resultQuery['ResultadoCheckREPasGen'].'*'.$resultQuery['CheckREFug'].'*'.$resultQuery['ResultadoCheckREFug'].'*'.$resultQuery['CheckRCLimPar'].'*'.$resultQuery['ResultadoCheckRCLimPar'].'*'.$resultQuery['CheckRCCab'].'*'.$resultQuery['ResultadoCheckRCCab'].'*'.$resultQuery['CheckRCMan'].'*'.$resultQuery['ResultadoCheckRCMan'].'*'.$resultQuery['CheckRCLucGen'].'*'.$resultQuery['ResultadoCheckRCLucGen'].'*'.$resultQuery['CheckRCMonDis'].'*'.$resultQuery['ResultadoCheckRCMonDis'].'*'.$resultQuery['CheckRCAseCab'].'*'.$resultQuery['ResultadoCheckRCAseCab'].'*'.$resultQuery['CheckRCBoc'].'*'.$resultQuery['ResultadoCheckRCBoc'].'*'.$resultQuery['CheckPREstExtMan'].'*'.$resultQuery['ResultadoCheckPREstExtMan'].'*'.$resultQuery['CheckPREstExtInc'].'*'.$resultQuery['ResultadoCheckPREstExtInc'].'*'.$resultQuery['CheckPREstEsc'].'*'.$resultQuery['ResultadoCheckPREstEsc'].'*'.$resultQuery['CheckPRSalEme'].'*'.$resultQuery['ResultadoCheckPRSalEme'].'*'.$resultQuery['CheckPRSenMov'].'*'.$resultQuery['ResultadoCheckPRSenMov'].'*'.$resultQuery['CheckRCTemAceMot'].'*'.$resultQuery['ResultadoCheckRCTemAceMot'].'*'.$resultQuery['CheckRCTemAceTra'].'*'.$resultQuery['ResultadoCheckRCTemAceTra'].'*'.$resultQuery['CheckRCVen'].'*'.$resultQuery['ResultadoCheckRCVen'].'*'.$resultQuery['CheckRCJoy'].'*'.$resultQuery['ResultadoCheckRCJoy'].'*'.$resultQuery['CheckRCPed'].'*'.$resultQuery['ResultadoCheckRCPed'].'*';
};
if(substr($salida, strlen($salida) - 1, 1) != "|")
	$salida = substr($salida, 0, strlen($salida) - 1);
*/
$salida .= "|";
//datos de vuelta
/*
$query3 = mysql_query("select * from vuelta where fk_historial = \"" . $_POST["id"] . "\" order by numVuelta asc")
or die("Error en la query" . mysql_error());
while($resultQuery = mysql_fetch_array($query3)){
	//agregar los campos del historial
  	$salida .= $resultQuery['numVuelta'].'*'.$resultQuery['tiempo'].'*';
};
if(substr($salida, strlen($salida) - 1, 1) != "|")
	$salida = substr($salida, 0, strlen($salida) - 1);
*/
$salida .= "|";
//datos de ciclo carguio
/*
$query4 = mysql_query("select * from cicloCarguio where fk_historial = \"" . $_POST["id"] . "\"")
or die("Error en la query" . mysql_error());
while($resultQuery = mysql_fetch_array($query4)){
	//agregar los campos del historial
  	$salida .= $resultQuery['numciclo'].'*'.$resultQuery['carguio'].'*'.$resultQuery['patinaje'].'*'.$resultQuery['levante'].'*'.$resultQuery['caida'].'*'.$resultQuery['vaciado'].'*'.$resultQuery['tiempo'].'*';
};
$salida = substr($salida, 0, strlen($salida) - 1);
*/
echo $salida;
?>